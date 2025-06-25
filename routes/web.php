<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoiceController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\WeeklyMenuController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\AnalyticsController;





// TOP
Route::get('/', [App\Http\Controllers\FrontController::class, 'home'])->name('home');

// こだわり
Route::get('passion', [App\Http\Controllers\FrontController::class, 'passion'])->name('passion');

// メニュー
Route::get('menu', [App\Http\Controllers\FrontController::class, 'menu'])->name('menu');

// 店舗情報
Route::get('info', [App\Http\Controllers\FrontController::class, 'info'])->name('info');

// コインパーキング
Route::get('parking', [App\Http\Controllers\FrontController::class, 'parking'])->name('parking');

// アンケート
Route::get('voice', [App\Http\Controllers\FrontController::class, 'voice'])->name('voice');
Route::post('voice', [VoiceController::class, 'submit'])->name('voice.submit');
















Auth::routes();

Route::get('admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
Route::get('task', [App\Http\Controllers\HomeController::class, 'task'])->name('task');
Route::post('task/update', [App\Http\Controllers\HomeController::class, 'taskUpdate'])->name('task.update');
Route::post('task/delete', [App\Http\Controllers\HomeController::class, 'taskDelete'])->name('task.delete');
Route::get('holiday', [App\Http\Controllers\HomeController::class, 'holiday'])->name('holiday');

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::resource('news', NewsController::class);
    Route::resource('weekly-menu', WeeklyMenuController::class);
    Route::resource('task', TaskController::class);
    Route::get('analytics', [AnalyticsController::class, 'analytics'])->name('analytics');
});
















use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

Route::get('/generate-sitemap', function () {
    // 新しいサイトマップオブジェクトを作成
    $sitemap = Sitemap::create()
        // ホームページを追加
        ->add(Url::create('/')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0))

        // /passionページを追加
        ->add(Url::create('/passion')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.8))

        // /menuページを追加
        ->add(Url::create('/menu')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.8))

        // /infoページを追加
        ->add(Url::create('/info')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.6))

        // /voiceページを追加
        ->add(Url::create('/voice')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.6));

    // サイトマップを public/sitemap.xml に書き込む
    $sitemap->writeToFile(public_path('sitemap.xml'));

    return 'Sitemap generated!';
});