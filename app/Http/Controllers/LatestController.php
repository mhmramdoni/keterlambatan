<?php

namespace App\Http\Controllers;

use App\Models\latest;
use App\Models\student;
use App\Models\rayon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;
use Excel;
use App\Exports\LatestExport;
use App\Exports\PsExport;
use Carbon\Carbon;

class LatestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $telat = latest::all();
        // $telat = latest::latest()->get();
        $students = student::all();
        return view('latest.index', compact('telat', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $students = student::all();
        return view('latest.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'student_id' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'mimes:jpg,jpeg,png,gif|max:1024'

        ]);

        if ($request->hasFile('bukti')) {
            $bukti_file = $request->file('bukti');
            $bukti_nama = $bukti_file->hashName();
            $bukti_file->move(public_path('img'), $bukti_nama);

            $data_lates['bukti'] = $bukti_nama;
        }


        $date_time_late = \Carbon\Carbon::parse($request->date_time_late)->format('Y-m-d H:i:s');

        latest::create([
            'student_id' => $request->student_id,
            'date_time_late' => $date_time_late,
            'information' => $request->information,
            'bukti' => $bukti_nama
        ]);

        
        return redirect()->route('latest.home')->with('success', 'Berhasil menambah data!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $latest = latest::where( 'student_id', $id)->get();
        return view('latest.detail', compact('latest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $telat = latest::find($id);
        $students = student::all();
        return view('latest.edit', compact('telat', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'student_id' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            // 'bukti' => 'required',
            'bukti' => 'mimes:jpg,jpeg,png,gif|max:1024'

        ]);

        $date_time_late = \Carbon\Carbon::parse($request->date_time_late)->format('Y-m-d H:i:s');

        $dataToUpdate = [
            'student_id' => $request->student_id,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
        ];

        if ($request->hasFile('bukti')) {
            $bukti_file = $request->file('bukti');
            $bukti_nama = $bukti_file->hashName();
            $bukti_file->move(public_path('img'), $bukti_nama);

            $dataToUpdate['bukti'] = $bukti_nama;
        }

        latest::where('id', $id)->update($dataToUpdate);

        return redirect()->route('latest.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        latest::where('id', $id)->delete();
        $this->rekap();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }

   


    public function rekap()
    {

        $telat = Latest::all();
        $siswaKeterlambatan = $telat->groupBy('student_id')->map->count();
        $students = Student::with('latest')->select('id', 'name', 'nis')->distinct()->get();
        return view('latest.rekap', compact('telat', 'siswaKeterlambatan', 'students'));
    }



    public function downloadPDF($id)
    {
        $telat = Latest::with('student')->findOrFail($id);
        $pdf = PDF::loadView('latest.download', compact('telat'));
        return $pdf->download('Surat_Pernyataan_Keterlambatan.pdf');
    }


 
    public function review($id)
    {
      
        $telat = latest::where( 'student_id', $id)->first();
        return view('latest.print', compact('telat'));
    }


    public function exportExcel()
    {

        $telat = Latest::all();
        $students = Student::with('rombel', 'rayon','latest')->select('id', 'name', 'nis' , 'rombel_id', 'rayon_id')->distinct()->get();
        $export = new LatestExport($students);
        return Excel::download($export, 'rekap_keterlambatan.xlsx');
    }

    public function PSexportExcel()
    {
        $userRayonId = Auth::id();
        $userRayon = Rayon::where('user_id', $userRayonId)->first();

        $telat = Latest::whereHas('student', function ($query) use ($userRayon) {
            $query->where('rayon_id', $userRayon->id);
        })->get();

        $students = Student::with('rombel', 'rayon', 'latest')
            ->where('rayon_id', $userRayon->id)
            ->select('id', 'name', 'nis', 'rombel_id', 'rayon_id')
            ->distinct()
            ->get();

            $siswaKeterlambatan = $telat->groupBy('student_id')->map->count();

        $export = new PsExport($students, $siswaKeterlambatan);
        return Excel::download($export, 'rekap_keterlambatan.xlsx');
       
    }

    public function PsLatest()
    {
        $userRayonId = Auth::id();

        $userRayon = Rayon::where('user_id', $userRayonId)->first();

        $telat = Latest::whereHas('student', function ($query) use ($userRayon) {
            $query->where('rayon_id', $userRayon->id);
        })->latest()->get();

        $studentRayon = student::where('rayon_id', $userRayon->id)->get();

        return view('ps.latest.index', compact('telat' ,'studentRayon'));
    }

    public function Psrekap()
    {
        $userRayonId = Auth::id();
        $userRayon = Rayon::where('user_id', $userRayonId)->first();

        $telat = Latest::whereHas('student', function ($query) use ($userRayon) {
            $query->where('rayon_id', $userRayon->id);
        })->get();

        $siswaKeterlambatan = $telat->groupBy('student_id')->map->count();
       $students = Student::with('latest')->where('rayon_id', $userRayon->id)->select('id', 'name', 'nis')->distinct()->get();

        return view('ps.latest.rekap', compact('telat', 'siswaKeterlambatan', 'students'));
    }

}
