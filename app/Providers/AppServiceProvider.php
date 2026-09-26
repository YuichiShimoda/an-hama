<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Video;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('videos')) {
            Video::where('is_visible', true)
                ->where('expired_at', '<', now())
                ->update([
                    'is_visible' => 0,
                    'first_video' => 0,
                ]);
        }
    }
}
