<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WeeklyMenu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\WeeklyMenuStoreRequest;
use App\Http\Requests\WeeklyMenuUpdateRequest;

class WeeklyMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $weekly_menu = WeeklyMenu::all();
        return view('admin.weekly-menu.index', compact('weekly_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.weekly-menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeeklyMenuStoreRequest $request): RedirectResponse
    {
        WeeklyMenu::create($request->validated());
        return redirect()->route('admin.weekly-menu.index')->with('success', '登録完了');
    }

    /**
     * Display the specified resource.
     */
    public function show(WeeklyMenu $weekly_menu): View
    {
        return view('admin.weekly-menu.show',compact('weekly_menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WeeklyMenu $weekly_menu): View
    {
        return view('admin.weekly-menu.edit',compact('weekly_menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeeklyMenuUpdateRequest $request, WeeklyMenu $weekly_menu): RedirectResponse
    {
        $weekly_menu->update($request->validated());

        return redirect()->route('admin.weekly-menu.index')->with('success','更新完了');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WeeklyMenu $weekly_menu): RedirectResponse
    {
        $weekly_menu->delete();

        return redirect()->route('admin.weekly-menu.index')->with('success','削除完了');
    }
}