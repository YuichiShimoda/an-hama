<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\News;
use App\Models\WeeklyMenu;
use App\Models\PressRelease;
use Illuminate\View\View;

class FrontController extends Controller
{
    public function __construct() {
        $today = Carbon::today();
        $oneWeekLater = Carbon::today()->addWeek();
        $thisWeeklyMenu = WeeklyMenu::whereDate('start_day', '<=', $today)->whereDate('end_day', '>=', $today)->orderBy('id', 'desc')->first();
        $nextWeeklyMenu = WeeklyMenu::where('start_day', '>', $today)->where('start_day', '<=', $oneWeekLater)->orderBy('id', 'desc')->first();
        $pr = PressRelease::where('start', '<=', $today)->where('end', '>=', $today)->orderBy('id', 'desc')->first();
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
        // $news = News::orderBy('id', 'desc')->limit(3)->get();
        return view('home', ['news' => $news, 'weeklyMenu' => $this->weeklyMenu, 'pressRelease' => $this->pressRelease]);
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
}
