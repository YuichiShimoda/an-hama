<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\News;
use App\Models\WeeklyMenu;
use Illuminate\View\View;

class FrontController extends Controller
{
    public function __construct() {
        $today = Carbon::today();
        $oneWeekLater = Carbon::today()->addWeek();
        $thisWeeklyMenu = WeeklyMenu::whereDate('start_day', '<=', $today)->whereDate('end_day', '>=', $today)->orderBy('id', 'desc')->first();
        $nextWeeklyMenu = WeeklyMenu::where('start_day', '>', $today)->where('start_day', '<=', $oneWeekLater)->orderBy('id', 'desc')->first();
        $this->weeklyMenu = [
            'current' => optional($thisWeeklyMenu)->menu,
            'next' => optional($nextWeeklyMenu)->menu,
            'start_day' => optional($nextWeeklyMenu)->start_day,
        ];
    }

    public function home(): View
    {
        $news = News::orderBy('id', 'desc')->limit(3)->get();
        return view('home', ['news' => $news, 'weeklyMenu' => $this->weeklyMenu]);
    }

    public function passion(): View
    {
        return view('passion', ['weeklyMenu' => $this->weeklyMenu]);
    }

    public function menu(): View
    {
        return view('menu', ['weeklyMenu' => $this->weeklyMenu]);
    }

    public function info(): View
    {
        return view('info', ['weeklyMenu' => $this->weeklyMenu]);
    }

    public function parking(): View
    {
        return view('parking', ['weeklyMenu' => $this->weeklyMenu]);
    }

    public function voice(): View
    {
        return view('voice', ['weeklyMenu' => $this->weeklyMenu]);
    }
}
