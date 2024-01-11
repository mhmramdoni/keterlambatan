<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\rombel;
use App\Models\rayon;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\latest;
use Carbon\Carbon;



class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //


        if (Auth::user()->role == 'ps') {

            // Data Peserta Didik
            $userRayonId = Auth::id();
            $userRayon = Rayon::where('user_id', $userRayonId)->first();
            $studentWithSameRayon = Student::where('rayon_id', $userRayon->id)->count();
            $RayonName = Rayon::where('rayon', $userRayon->rayon)->first();
            $UserRayonName = $RayonName->rayon;

                  
            // Data Keterlambatan Rayon dan Tanggal User Login
            $loginDate = Session::get('loginDate');
            $studentLatestSameRayon = Student::where('rayon_id', $userRayon->id)
            ->whereHas('latest', function ($query) {
                $today = Carbon::now()->toDateString();
                $query->whereDate('date_time_late', $today);
            })
            ->count();

            $formattedDate = Carbon::parse($loginDate)->format('d - F - Y');
            return view('dasboard', compact( 'formattedDate', 'studentWithSameRayon' , 'UserRayonName',  'studentLatestSameRayon'));
        } else {
            
            $siswa = Student::all();
            $rombel = Rombel::all();
            $rayon = Rayon::all();
            $ps = User::where('role', 'ps')->get();
            $admin = User::where('role', 'admin')->get();

           return view('dasboard', compact('siswa', 'rombel', 'rayon', 'ps', 'admin'));
        }

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
    public function show()
    {
       
    
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
