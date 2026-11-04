<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeasonPasta extends Model
{
    use HasFactory;

    protected $fillable = [
        'period',
        'dish',
        'ingredient1',
        'ingredient2',
        'reservation_at',
        'expired_at',
        'comment',
    ];

    protected $casts = [
        'reservation_at' => 'datetime',
        'expired_at' => 'datetime',
    ];
}