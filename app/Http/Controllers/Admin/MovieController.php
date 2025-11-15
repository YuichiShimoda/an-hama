<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Http\Requests\MovieStoreRequest;
use App\Http\Requests\MovieUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MovieController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$visible_movie = Movie::where('is_visible', true)->get();
		$movie = Movie::all();
		return view('admin.movie.index', compact('visible_movie', 'movie'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$next_movies = Movie::where('expired_at', '>', now())->orWhereNull('expired_at')->pluck('title', 'id');
		return view('admin.movie.create', compact('next_movies'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(MovieStoreRequest $request)
	{
		$data = $request->validated();
		$data["movie"] = $request->file('movie')->getClientOriginalName();
		if ($data['expired_at']) {
			$data['expired_at'] = Carbon::parse($data['expired_at'])->endOfDay();
		}

		$uploadedFile = $request->file('movie');
		$originalFileNameBase = $data['filename'] ?? pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
		$filename = Str::slug($originalFileNameBase) . '.mp4';
		$directory = 'movie/uploader';
		Storage::disk('public_uploads')->putFileAs($directory, $uploadedFile, $filename);

		Movie::create($data);
		return redirect()->route('admin.movie.index')->with('success', '登録完了');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Movie $movie)
	{
		return view('admin.movie.show',compact('movie'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Movie $movie)
	{
		$next_movies = Movie::select('id', 'title')
			->where(function ($query) {
			$query->where('expired_at', '>', now())->orWhereNull('expired_at');
		});
		if (!empty($movie->id)) {
			$next_movies->where('id', '!=', $movie->id);
		}
		$next_movies = $next_movies->pluck('title', 'id');

		return view('admin.movie.edit',compact('movie', 'next_movies'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(MovieUpdateRequest $request, Movie $movie)
	{
		$data = $request->validated();
		if ($data['expired_at']) {
			$data['expired_at'] = Carbon::parse($data['expired_at'])->endOfDay();
		}

		if ($request['delete_movie']) {
			$validated = $request->validate([
				'movie' => 'required|file|mimetypes:video/mp4,video/webm|max:10240',
			],
			[
				'movie.required' => '必ず選択してください。',
				'movie.file' => 'ファイルを選択してください。',
				'movie.mimetypes' => '対応している動画形式は「 mp4 / webm 」のいずれかです。',
				'movie.max' => '10MBを超える動画はアップロードできません。',
			]);
			$data["movie"] = $request->file('movie')->getClientOriginalName();
			$uploadedFile = $request->file('movie');
			$originalFileNameBase = $data['filename'] ?? pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
			$filename = Str::slug($originalFileNameBase) . '.mp4';
			$directory = 'movie/uploader';
			Storage::disk('public_uploads')->putFileAs($directory, $uploadedFile, $filename);
		}

		$movie->update($data);

		return redirect()->route('admin.movie.index')->with('success','更新完了');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Movie $movie)
	{
		$movie->delete();
		return redirect()->route('admin.movie.index')->with('success','削除完了');
	}

	public function getMovie()
	{
		$movies = Movie::where('is_visible', true)
			->where(function($query) {
				$query->where('expired_at', '>', now())->orWhereNull('expired_at');
			})->get();
		$movies = $movies->map(function ($movie) {
			$movie->next_movie = array_values(array_filter([
				optional($movie->nextMovie1)->filename,
				optional($movie->nextMovie2)->filename,
				optional($movie->nextMovie3)->filename,
			]));
			unset($movie->next_movie_id1);
			unset($movie->next_movie_id2);
			unset($movie->next_movie_id3);
			return $movie;
		});
		return response()->json($movies);
	}
}
