<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu',
        'start_day',
        'end_day',
    ];
}