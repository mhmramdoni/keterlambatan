<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\rombel;
use App\Models\rayon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::with(['rayon', 'rombel'])->get();
        $rombel = rombel::all();
        $rayon = rayon::all();
        return view('siswa.index', compact('students', 'rombel', 'rayon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $rombel = rombel::all();
        $rayon = rayon::all();
        return view('siswa.create',compact('rombel', 'rayon'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'nis' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',

        ]);

        student::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
            
            

        ]);
        //
        return redirect()->route('student.home')->with('success', 'Berhasil menambahkan data rayon!');
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $student = student::find($id);
        $rombel = rombel::all();
        $rayon = rayon::all();
        return view('siswa.edit', compact('student', 'rombel', 'rayon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'nis'=> 'required',
            'rombel_id'=> 'required',
            'rayon_id'=> 'required',
        ]);

        //

        student::where('id', $id)->update([
            'name' => $request->name,
            'nis' => $request->nis,
            'rombel_id' => $request->rombel_id,
            'rayon_id'=> $request->rayon_id,
        ]);

        return redirect()->route('student.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        student::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }

    public function PsIndex()
    {
        $userRayonId = Auth::id();

        $userRayon = Rayon::where('user_id', $userRayonId)->first();
        $studentRayon = Student::where('rayon_id', $userRayon->id)->get();

        return view('ps.siswa.index', compact('studentRayon'));
    }

    
}
