<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Manage_movie;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class ManagemovieController extends Controller
{
    public function index(Request $request)
    {
        $page = "Manage Movie";
        if ($request->ajax()) {
            $data = Manage_movie::latest('id')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('movie_thumbnail', function ($thumbnail) {
                    $url = asset('uploads/' . $thumbnail->movie_thumbnail);
                    return '<a href="'.$url.'"><img src="' . $url . '" border="0" width="60" class="img-rounded" align="center" /></a>';
                })
                ->addColumn('action', function ($row) {
                    $view = '<a href="' . route('manage_movie.show', $row->id) . '" class="edit btn btn-success btn-sm" >View</a>';
                    $edit = '<a href="' . route('manage_movie.edit', $row->id) . '" class="edit btn btn-primary btn-sm" >Edit</a>';
                    $delete =
                        '<a href="' . route('manage_movie.delete', $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletePost" onclick="return confirm(\'Are you sure you want to delete this Movie?\')">Delete</a>';

                    return $view . " " . $edit . " " . $delete;
                })
                ->rawColumns(['movie_thumbnail', 'action', 'description'])
                ->make(true);
        }

        return view('backend.manage_movie.index', compact('page'));
    }

    public function create()
    {
        $page = "Movie Manage | Create";
        return view('backend.manage_movie.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'movie_name' => 'required',
        ]);

        if (!empty($request->movie_thumbnail)) {
            $validated = $request->validate([
                'movie_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $file = $request->file('movie_thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/'), $filename);
            $data['movie_thumbnail'] = 'public/uploads/' . $filename;

            Manage_movie::updateOrCreate(
                ['id' => $request->data_id],
                [
                    'movie_name' => $request->movie_name,
                    'movie_thumbnail' => $filename,
                    'movie_trailer' => $request->movie_trailer,
                    'movie_url' => $request->movie_url,
                    'description' => $request->description,

                ]
            );
        } else {
            Manage_movie::updateOrCreate(
                ['id' => $request->data_id],
                [
                    'movie_name' => $request->movie_name,
                    'movie_trailer' => $request->movie_trailer,
                    'movie_url' => $request->movie_url,
                    'description' => $request->description,

                ]
            );
        }
        if ($request->data_id) {
            return redirect()->back()->with('success', 'Movie Successfully Updated');
        } else {
            return redirect()->route('manage_movie.index')->with('success', 'Movie Successfully Added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $page = "Manage Movie | Show";
        $data = Manage_movie::Where('id',$id)->first();
        return view('backend.manage_movie.show', compact('data', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = "Manage Movie | Edit";
        $data = Manage_movie::Where('id', $id)->first();
        return view('backend.manage_movie.edit', compact('data', 'page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $manage_movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $manage_movie)
    {
    }
    public function delete(Request $request, $id)
    {
        Manage_movie::find($id)->delete();
        return  back();
    }
}
