<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use App\Http\Requests\NewsStoreRequest;
use App\Http\Requests\NewsUpdateRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $today = Carbon::today();
        $change_news = News::whereNotNull('reservation_day')->Where('reservation_day', '<', $today)->get();
        foreach ($change_news as $ele) {
            $newNews = $ele->replicate();
            $newNews->reservation_day = null;
            $newNews->created_at = now();
            $newNews->updated_at = now();
            $newNews->save();
            $ele->delete();
        }

        $news = News::whereNull('reservation_day')->orWhere('reservation_day', '<', $today)->get();
        $reservation_news = News::whereDate('reservation_day', '>', $today)->get();
        // $news = News::all();
        return view('admin.news.index', compact('news', 'reservation_news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsStoreRequest $request): RedirectResponse
    {
        News::create($request->validated());
        return redirect()->route('admin.news.index')->with('success', '登録完了');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news): View
    {
        return view('admin.news.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news): View
    {
        return view('admin.news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsUpdateRequest $request, News $news): RedirectResponse
    {
        if (empty($request->reservation_day) && !empty($news->reservation_day)) {
            $news->created_at = now();
            $news->save();
        }
        $news->update($request->validated());

        return redirect()->route('admin.news.index')->with('success','更新完了');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): RedirectResponse
    {
        $news->delete();

        return redirect()->route('admin.news.index')->with('success','削除完了');
    }
}