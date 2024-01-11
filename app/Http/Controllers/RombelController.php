<?php

namespace App\Http\Controllers;

use App\Models\rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rombels = rombel::all();
        return view('kelas.index', compact('rombels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'rombel' => 'required',

        ]);

        Rombel::create([
            'rombel' => $request->rombel,

        ]);
        //
        return redirect()->route('rombel.home')->with('success', 'Berhasil menambahkan data rayon!');

    }

    /**
     * Display the specified resource.
     */
    public function show(rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $rombel = Rombel::find($id);
        return view('kelas.edit', compact('rombel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'rombel' => 'required',
        ]);

        //

        Rombel::where('id', $id)->update([
            'rombel' => $request->rombel,
        ]);

        return redirect()->route('rombel.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        rombel::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
    
}
