<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer\Select_movie;
use App\Models\Payment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class PaymentcheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = "Payment History";

        if ($request->ajax()) {
            $data = Payment::with(['movie', 'user'])->latest('id')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('customer_name', function ($data) {
                        return $data->user->name;
                    })
                ->addColumn('movie_name', function ($data) {
                        return $data->movie->movie_name;
                    })
                ->addColumn('description', function ($data) {
                        return $data->movie->description;
                    })
                ->addColumn('movie_thumbnail', function ($data) {
                    $url = asset('uploads/' . $data->movie->movie_thumbnail);
                    return '<a href="' . $url . '"><img src="' . $url . '" border="0" width="60" class="img-rounded" align="center" /></a>';
                })
                ->addColumn('date', function ($data) {
                    return $data->created_at;
                })

                ->rawColumns(['customer_name','movie_name','movie_thumbnail', 'description', 'date'])
                ->make(true);
        }

        return view('backend.paymentcheck.index', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
