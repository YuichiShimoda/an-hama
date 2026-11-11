<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\News;
use App\Models\WeeklyMenu;
use App\Models\PressRelease;
use App\Models\Video;
use App\Models\SeasonPasta;
use Illuminate\View\View;

class FrontController extends Controller
{
    public function __construct() {
        $today = Carbon::today();
        $oneWeekLater = Carbon::today()->addWeek();
        $thisWeeklyMenu = WeeklyMenu::whereDate('start_day', '<=', $today)->whereDate('end_day', '>=', $today)->orderBy('id', 'desc')->first();
        $nextWeeklyMenu = WeeklyMenu::where('start_day', '>', $today)->where('start_day', '<=', $oneWeekLater)->orderBy('id', 'desc')->first();
        $pr = PressRelease::whereDate('start', '<=', $today)->whereDate('end', '>=', $today)->orderBy('id', 'desc')->first();
        $this->weeklyMenu = [
            'current' => optional($thisWeeklyMenu)->menu,
            'next' => optional($nextWeeklyMenu)->menu,
            'start_day' => optional($nextWeeklyMenu)->start_day,
        ];
        $this->pressRelease = $pr;
    }

    public function home(): View
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
        $news = News::whereNull('reservation_day')->orWhere('reservation_day', '<', $today)->orderBy('id', 'desc')->get();
        $movie = Video::where('is_visible', true)->where('first_video', true)->where('expired_at', '>', now())->first();

        $seasonPasta = SeasonPasta::where('is_visible', 1)->where('reservation_at', '<=', now())->where('expired_at', '>=', now())->get();

        $season_pasta = SeasonPasta::orderBy('reservation_at')->get();
        $overlap_ids = [];
        foreach ($season_pasta as $i => $pasta) {
            foreach ($season_pasta as $j => $other) {
                if ($i >= $j) {
                    continue;
                }
                if ($pasta->reservation_at <= $other->expired_at && $pasta->expired_at >= $other->reservation_at) {
                    $overlap_ids[] = $pasta->id;
                    $overlap_ids[] = $other->id;
                }
            }
        }
        $overlap_ids = array_unique($overlap_ids);
        if ($seasonPasta->isNotEmpty() && !$overlap_ids) {
            $seasonPasta = $seasonPasta->first();
        } else {
            $seasonPasta = null;
        }

        return view('home', ['news' => $news, 'weeklyMenu' => $this->weeklyMenu, 'pressRelease' => $this->pressRelease, 'movie' => $movie, 'seasonPasta' => $seasonPasta]);
    }

    public function passion(): View
    {
        return view('passion', ['weeklyMenu' => $this->weeklyMenu, 'pressRelease' => $this->pressRelease]);
    }

    public function menu(): View
    {
        return view('menu', ['weeklyMenu' => $this->weeklyMenu, 'pressRelease' => $this->pressRelease]);
    }

    public function pizza(): View
    {
        return view('pizza', ['weeklyMenu' => $this->weeklyMenu, 'pressRelease' => $this->pressRelease]);
    }

    public function info(): View
    {
        return view('info', ['weeklyMenu' => $this->weeklyMenu, 'pressRelease' => $this->pressRelease]);
    }

    public function parking(): View
    {
        return view('parking', ['weeklyMenu' => $this->weeklyMenu, 'pressRelease' => $this->pressRelease]);
    }

    public function voice(): View
    {
        return view('voice', ['weeklyMenu' => $this->weeklyMenu, 'pressRelease' => $this->pressRelease]);
    }

    public function check(): View
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
        $news = News::whereNull('reservation_day')->orWhere('reservation_day', '<', $today)->orderBy('id', 'desc')->get();
        $movie = Video::where('is_visible', true)->where('first_video', true)->first();
        return view('check', ['news' => $news, 'weeklyMenu' => $this->weeklyMenu, 'pressRelease' => $this->pressRelease, 'movie' => $movie]);
    }

    public function test(): View
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
        $news = News::whereNull('reservation_day')->orWhere('reservation_day', '<', $today)->orderBy('id', 'desc')->get();
        $movie = Video::where('is_visible', true)->where('first_video', true)->where('expired_at', '>', now())->first();
        $seasonPasta = SeasonPasta::where('reservation_at', '<=', now())->where('expired_at', '>=', now())->get();

        $season_pasta = SeasonPasta::orderBy('reservation_at')->get();
        $overlap_ids = [];
        foreach ($season_pasta as $i => $pasta) {
            foreach ($season_pasta as $j => $other) {
                if ($i >= $j) {
                    continue;
                }
                if ($pasta->reservation_at <= $other->expired_at && $pasta->expired_at >= $other->reservation_at) {
                    $overlap_ids[] = $pasta->id;
                    $overlap_ids[] = $other->id;
                }
            }
        }
        $overlap_ids = array_unique($overlap_ids);
        if ($seasonPasta->count() === 1 && !$overlap_ids) {
            $seasonPasta = $seasonPasta->first();
        } else {
            $seasonPasta = null;
        }

        return view('test', ['news' => $news, 'weeklyMenu' => $this->weeklyMenu, 'pressRelease' => $this->pressRelease, 'movie' => $movie, 'seasonPasta' => $seasonPasta]);
    }
}
