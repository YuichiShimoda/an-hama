<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Http\Requests\VideoStoreRequest;
use App\Http\Requests\VideoUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VideoController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$visible_video = Video::where('is_visible', true)->get();
		$video = Video::all();
		$first_video = Video::where('is_visible', true)->where('first_video', true)->first();
		if ($first_video) {
			return view('admin.video.index', compact('visible_video', 'video', 'first_video'));
		} else {
			$first_video_error = 'スタンバイ動画の「 最初に再生 」設定が未選択です。';
			return view('admin.video.index', compact('visible_video', 'video', 'first_video', 'first_video_error'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$next_videos = Video::where('expired_at', '>', now())->orWhereNull('expired_at')->select('id', 'title', 'expired_at')->get();
		return view('admin.video.create', compact('next_videos'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(VideoStoreRequest $request)
	{
		$data = $request->validated();
		$data["filename"] = $request->filename;
		$data["video"] = $request->file('video')->getClientOriginalName();
		// if ($data['expired_at']) {
		// 	$data['expired_at'] = Carbon::parse($data['expired_at'])->endOfDay();
		// }
		$uploadedFile = $request->file('video');
		$originalFileNameBase = $data['filename'] ?? pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
		$filename = Str::slug($originalFileNameBase) . '.mp4';
		$directory = 'video/uploader';
		Storage::disk('public_uploads')->putFileAs($directory, $uploadedFile, $filename);

		Video::create($data);
		return redirect()->route('admin.video.index')->with('success', '登録完了');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Video $video)
	{
		return view('admin.video.show',compact('video'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Video $video)
	{
		$next_videos = Video::select('id', 'title')
			->where(function ($query) {
			$query->where('expired_at', '>', now())->orWhereNull('expired_at');
		});
		if (!empty($video->id)) {
			$next_videos->where('id', '!=', $video->id);
		}
		$next_videos = $next_videos->select('id', 'title', 'expired_at')->get();

		return view('admin.video.edit',compact('video', 'next_videos'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(VideoUpdateRequest $request, Video $video)
	{
		$data = $request->validated();
		$data["filename"] = $request->filename;
		// if ($data['expired_at']) {
		// 	$data['expired_at'] = Carbon::parse($data['expired_at'])->endOfDay();
		// }

		if ($request['delete_video']) {
			$validated = $request->validate([
				'video' => 'required|file|mimetypes:video/mp4,video/webm|max:10240',
			],
			[
				'video.required' => '必ず選択してください。',
				'video.file' => 'ファイルを選択してください。',
				'video.mimetypes' => '対応している動画形式は「 mp4 / webm 」のいずれかです。',
				'video.max' => '10MBを超える動画はアップロードできません。',
			]);
			$data["video"] = $request->file('video')->getClientOriginalName();
			$uploadedFile = $request->file('video');
			$originalFileNameBase = $data['filename'] ?? pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
			$filename = Str::slug($originalFileNameBase) . '.mp4';
			$directory = 'video/uploader';
			Storage::disk('public_uploads')->putFileAs($directory, $uploadedFile, $filename);
		}

		$video->update($data);

		return redirect()->route('admin.video.index')->with('success','更新完了');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Video $video)
	{
		$video->delete();
		return redirect()->route('admin.video.index')->with('success','削除完了');
	}

	public function getVideo()
	{
		$videos = Video::where('is_visible', true)
			->where(function($query) {
				$query->where('expired_at', '>', now())->orWhereNull('expired_at');
			})->get();
		$videos = $videos->map(function ($video) {
			$video->next_video = array_values(array_filter([
				optional($video->nextVideo1)->filename,
				optional($video->nextVideo2)->filename,
				optional($video->nextVideo3)->filename,
			]));
			unset($video->next_video_id1);
			unset($video->next_video_id2);
			unset($video->next_video_id3);
			return $video;
		});
		return response()->json($videos);
	}

	public function firstSet(Video $video)
	{
		Video::where('first_video', true)->update(['first_video' => false]);
		$video->first_video = true;
		$video->save();
		return redirect()->route('admin.video.index')->with('success', '変更完了');
	}

	public function firstReset(Video $video)
	{
		Video::where('first_video', true)->update(['first_video' => false]);
		return redirect()->route('admin.video.index')->with('success', 'リセット完了');
	}
}
