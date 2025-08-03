<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PressRelease;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\PressReleaseStoreRequest;
use App\Http\Requests\PressReleaseUpdateRequest;

class PressReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $press_release = PressRelease::all();
        return view('admin.press-release.index', compact('press_release'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.press-release.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PressReleaseStoreRequest $request): RedirectResponse
    {
        PressRelease::create($request->validated());
        return redirect()->route('admin.press-release.index')->with('success', '登録完了');
    }

    /**
     * Display the specified resource.
     */
    public function show(PressRelease $press_release): View
    {
        return view('admin.press-release.show',compact('press_release'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PressRelease $press_release): View
    {
        return view('admin.press-release.edit',compact('press_release'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PressReleaseUpdateRequest $request, PressRelease $press_release): RedirectResponse
    {
        $press_release->update($request->validated());

        return redirect()->route('admin.press-release.index')->with('success','更新完了');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PressRelease $press_release): RedirectResponse
    {
        $press_release->delete();

        return redirect()->route('admin.press-release.index')->with('success','削除完了');
    }
}