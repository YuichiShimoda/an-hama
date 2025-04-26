<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoiceController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\WeeklyMenuController;






// TOP
Route::get('/', [App\Http\Controllers\FrontController::class, 'home'])->name('home');

// こだわり
Route::get('passion', [App\Http\Controllers\FrontController::class, 'passion'])->name('passion');

// メニュー
Route::get('menu', [App\Http\Controllers\FrontController::class, 'menu'])->name('menu');

// 店舗情報
Route::get('info', [App\Http\Controllers\FrontController::class, 'info'])->name('info');

// コインパーキング
Route::get("parking", function () {
	return view("parking");
})->name("parking");

// アンケート
Route::get("voice", function () {
	return view("voice");
})->name("voice");
Route::post('voice', [VoiceController::class, 'submit'])->name('voice.submit');
















Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::resource('news', NewsController::class);
    Route::resource('weekly-menu', WeeklyMenuController::class);
});