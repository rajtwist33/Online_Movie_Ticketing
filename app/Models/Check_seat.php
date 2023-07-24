<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check_seat extends Model
{
    use HasFactory;
    protected $fillable = [
        'seat_no',
        'user_id',
        'movie_id',
    ];

}
