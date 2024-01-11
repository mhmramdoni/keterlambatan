<?php

namespace App\Http\Controllers;

use App\Models\rayon;
use App\Models\user;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rayons = Rayon::all();
        $users = User::all();
        return view('rayon.index', compact('rayons', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::all();
        return view('rayon.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',

        ]);

        Rayon::create([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,

        ]);
        //
        return redirect()->route('rayon.home')->with('success', 'Berhasil menambahkan data rayon!');
    }

    /**
     * Display the specified resource.
     */
    public function show(rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $rayon = Rayon::find($id);
        $users = User::all();
        return view('rayon.edit', compact('rayon', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    
           $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);
        

        //

        Rayon::where('id', $id)->update([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('rayon.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Rayon::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
        //
    }
}
