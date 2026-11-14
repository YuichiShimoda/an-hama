<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\SeasonPasta;
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
        SeasonPasta::where('is_visible', 1)
            ->where('expired_at', '<', now())
            ->update([
                'is_visible' => 0,
            ]);
        Video::where('is_visible', true)
            ->where('expired_at', '<', now())
            ->update([
                'is_visible' => 0,
                'first_video' => 0,
            ]);
    }
}
