<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeasonPasta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Requests\SeasonPastaStoreRequest;
use App\Http\Requests\SeasonPastaUpdateRequest;

class SeasonPastaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $season_pasta = SeasonPasta::all();
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
        $published_season_pasta = SeasonPasta::where('is_visible', 1)->where('reservation_at', '<=', now())->where('expired_at', '>=', now())->first();
        if (!$overlap_ids) {
            return view('admin.season-pasta.index', compact('published_season_pasta', 'season_pasta', 'overlap_ids'));
        } else {
            $overlap_error = '公開日時が重複するデータが存在します。';
            return view('admin.season-pasta.index', compact('published_season_pasta', 'season_pasta', 'overlap_ids', 'overlap_error'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tableName = (new SeasonPasta())->getTable();
        $status = DB::select("SHOW TABLE STATUS LIKE '{$tableName}'");
        $nextId = $status[0]->Auto_increment ?? 1;
        return view('admin.season-pasta.create', compact('nextId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeasonPastaStoreRequest $request): RedirectResponse
    {
        $season_pasta = $request->validated();

        $tableName = (new SeasonPasta())->getTable();
        $status = DB::select("SHOW TABLE STATUS LIKE '{$tableName}'");
        $nextId = $status[0]->Auto_increment ?? 1;

        $uploadedFile = $request->file('dish');
        $manager = new ImageManager(new Driver());
        $image = $manager->read($uploadedFile->getRealPath());

        $image->scaleDown(width: 800);
        $fileName = str_pad($nextId, 4, '0', STR_PAD_LEFT) . '.webp';
        $path = 'image/season-pasta/' . $fileName;
        Storage::disk('public_uploads')->put($path, $image->toWebp());
        $season_pasta["dish"] = $fileName;
        $season_pasta["filename"] = $request->filename;

        SeasonPasta::create($season_pasta);
        return redirect()->route('admin.season-pasta.index')->with('success', '登録完了');
    }

    /**
     * Display the specified resource.
     */
    public function show(SeasonPasta $season_pasta): View
    {
        return view('admin.season-pasta.show',compact('season_pasta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeasonPasta $season_pasta): View
    {
        return view('admin.season-pasta.edit',compact('season_pasta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeasonPastaUpdateRequest $request, SeasonPasta $season_pasta): RedirectResponse
    {
        // $season_pasta->update($request->validated());
        $data = $request->validated();
        unset($data['dish'], $data['dish_existing'], $data['delete_dish']);

        if ($request->hasFile('dish')) {
            $uploadedFile = $request->file('dish');
            $manager = new ImageManager(new Driver());
            $image = $manager->read($uploadedFile->getRealPath());

            $image->scaleDown(width: 800);
            $fileName = str_pad($season_pasta->id, 4, '0', STR_PAD_LEFT) . '.webp';
            $path = 'image/season-pasta/' . $fileName;
            Storage::disk('public_uploads')->put($path, $image->toWebp());
            $season_pasta->dish = $fileName;
            $season_pasta->filename = $request->filename;
        } elseif ($request->boolean('delete_dish')) {
            $season_pasta->dish = null;
        }

        $season_pasta->fill($data);
        $season_pasta->save();

        return redirect()->route('admin.season-pasta.index')->with('success','更新完了');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeasonPasta $season_pasta): RedirectResponse
    {
        $season_pasta->delete();

        return redirect()->route('admin.season-pasta.index')->with('success','削除完了');
    }
}