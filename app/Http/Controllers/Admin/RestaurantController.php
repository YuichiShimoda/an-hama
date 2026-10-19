<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\RestaurantStoreRequest;
use App\Http\Requests\RestaurantUpdateRequest;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $restaurant = Restaurant::all();
        return view('admin.restaurant.index', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RestaurantStoreRequest $request): RedirectResponse
    {
        Restaurant::create($request->validated());
        return redirect()->route('admin.restaurant.index')->with('success', '登録完了');
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant): View
    {
        return view('admin.restaurant.show',compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant): View
    {
        return view('admin.restaurant.edit',compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RestaurantUpdateRequest $request, Restaurant $restaurant): RedirectResponse
    {
        $restaurant->update($request->validated());

        return redirect()->route('admin.restaurant.index')->with('success','更新完了');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant): RedirectResponse
    {
        $restaurant->delete();

        return redirect()->route('admin.restaurant.index')->with('success','削除完了');
    }
}