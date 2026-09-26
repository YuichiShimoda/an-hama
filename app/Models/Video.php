<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';

    protected $fillable = [
        'title',
        'expired_at',
        'filename',
        'video',
        'btn_title',
        'is_visible',
        'script',
        'memo',
        'next_video_id1',
        'next_video_id2',
        'next_video_id3',
        'first_video',
    ];

    public function nextVideo1()
    {
        return $this->belongsTo(Video::class, 'next_video_id1');
    }
    public function nextVideo2()
    {
        return $this->belongsTo(Video::class, 'next_video_id2');
    }
    public function nextVideo3()
    {
        return $this->belongsTo(Video::class, 'next_video_id3');
    }
}
