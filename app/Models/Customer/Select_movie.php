<?php

namespace App\Models\Customer;

use App\Models\Check_seat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Select_movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'movie_id',
    ];
    public function check_seat()
    {
        return $this->hasMany(Check_seat::class, 'selected_movie', 'id');
    }
}
