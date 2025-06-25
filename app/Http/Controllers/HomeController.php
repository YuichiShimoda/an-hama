<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\TaskUpdateRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }

    public function task()
    {
        $tasks = Task::all();
        $taskList = [];
        foreach ($tasks as $task) {
            $flg = '';
            if ($task->all_day) {
                $flg = true;
            } else {
                $flg = false;
            }
            $taskList[] = [
                'id' => $task->id,
                'title' => $task->title,
                'description' => $task->description,
                'start' => $task->start,
                'end' => $task->end,
                'allDay' => $flg,
                'backgroundColor' => $task->background_color,
                'extendedProps' => [
                    'backgroundColor' => $task->background_color,
                    'memo' => 'No Data',
                ],
            ];
        }
        return $taskList;
    }

    public function taskUpdate(TaskUpdateRequest $request, Task $task): RedirectResponse
    {
        $task = Task::findOrFail($request->id);
        $task->update($request->all());
        return redirect()->route('admin')->with('success', '更新完了');
    }

    public function taskDelete(Request $request, Task $task): RedirectResponse
    {
        $task = Task::findOrFail($request->id);
        $task->delete();
        return redirect()->route('admin')->with('success', '削除完了');
    }

    public function holiday(): JsonResponse
    {
        $url = 'https://holidays-jp.github.io/api/v1/date.json';
        $response = Http::get($url);
        if ($response->failed()) {
            return response()->json(['error' => '祝日の取得に失敗しました'], 500);
        }
        $holidays = $response->json();
        $events = [];
        foreach ($holidays as $date => $name) {
            $events[] = [
                // 'title' => $name,
                'start' => $date,
                'allDay' => true,
                'classNames' => 'fc-holiday',
                'display' => 'background'
            ];
        }
        return response()->json($events);
    }
}
