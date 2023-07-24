<?php

namespace App\Models;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Admin\Manage_movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Html\Editor\Fields\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'movie_id',
        'amount',
        'total_seats',
        'status',
    ];

    public function movie(){
        return $this->BelongsTo(Manage_movie::class,'movie_id','id' );
    }
    public function user(){
        return $this->BelongsTo(User::class,'user_id','id' );
    }

    public static function basket(Request $request){
        return Payment::with(['user', 'movie'])->Where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
    }
    public static function count(Request $request){
        return Payment::where('user_id',Auth::user()->id)->count();
    }

}
