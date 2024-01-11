<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'role' => 'required',
        ]);

        $PassEmail = substr($request->email, 0, 3);

        $PassNama = substr($request->name, 0, 3);

        $BuatPassword = $PassEmail . $PassNama;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($BuatPassword),
        ]);

        return redirect()->route('user.home')->with('success', 'Berhasil menambah data!');
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
    public function edit($id)
    {
        //
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',

        ]);

        $user = [ 
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if($request->filled('password')){
            $user['password'] = bcrypt($request->password);
        }

        User::where('id', $id)->update($user);

        return redirect()->route('user.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        User::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        $user = $request->only(['email', 'password']);
        if(Auth::attempt($user)){

            $currentDate = Carbon::now()->toDateString();
            session(['loginDate' => $currentDate]);
            $loginDate = session('loginDate');
            $carbonLoginDate = Carbon::parse($loginDate);
            $formattedDate = $carbonLoginDate->format('d - F - Y');
            
            return redirect()->route('home.page');
        }else{
            return redirect()->back()->with('failed', 'Proses login gagal, silahkan coba kembali dengan data yang benar!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('logout', 'Anda telah logout!');
    }
}
