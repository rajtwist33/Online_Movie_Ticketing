<?php

namespace App\Http\Controllers\Customer;


use App\Models\Payment;
use App\Models\Check_seat;
use Illuminate\Http\Request;
use App\Models\Admin\Manage_movie;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer\Select_movie;

class HomeController extends Controller
{
    public function index()
    {
        $page = "";
        return view('customer.pages.movie_list', compact('page'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'seats' => 'required',
        ]);

        DB::beginTransaction();
        try {

            foreach ($request->seats as $key => $seat) {
                Check_seat::create([
                    'user_id'=>Auth::user()->id,
                    'seat_no' => $seat,
                    'movie_id' => $request->movie_id,
                ]);
            }

            Payment::create([
                'user_id' => Auth::user()->id,
                'movie_id' => $request->movie_id,
                'amount'=>$request->total_amount,
                'total_seats'=>$request->total_seats,
                'status' =>1,
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json(['error' => $ex->getMessage()], 500);
        }
        toastr()->success('You have booked your Seat!', 'Congrats', ['timeOut' => 5000]);
        return back();
    }


    public function show(string $id)
    {
        $data = Manage_movie::where('id', $id)->first();
        return view('customer.pages.movie_detail', compact('data'));
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
