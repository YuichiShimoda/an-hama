<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $fillable = [
        'title',
        'movie',
        'filename',
        'suffix',
        'first_movie',
        'next_movie_id1',
        'next_movie_id2',
        'next_movie_id3',
        // 'conversion_type',
        'is_visible',
        'expired_at',
        'script',
        'memo',
    ];

    public function nextMovie1()
    {
        return $this->belongsTo(Movie::class, 'next_movie_id1');
    }
    public function nextMovie2()
    {
        return $this->belongsTo(Movie::class, 'next_movie_id2');
    }
    public function nextMovie3()
    {
        return $this->belongsTo(Movie::class, 'next_movie_id3');
    }
}
