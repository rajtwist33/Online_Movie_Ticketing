<?php

namespace App\Models\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Manage_movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manage_movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'movie_name',
        'movie_thumbnail',
        'movie_trailer',
        'movie_url',
        'description',
    ];

    public static function
    getmovie(Request $request)
    {
        return Manage_movie::orderBy('id', 'DESC')->get();
    }
}
