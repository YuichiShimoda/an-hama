<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeasonPasta extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_visible',
        'period',
        'reservation_at',
        'expired_at',
        'dish',
        'filename',
        'ingredient1',
        'ingredient2',
        'comment',
    ];

    protected $casts = [
        'reservation_at' => 'datetime',
        'expired_at' => 'datetime',
    ];
}