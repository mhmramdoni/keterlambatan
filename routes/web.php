<?php

use App\Http\Controllers\RombelController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LatestController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('IsGuest')->group(function () {
    Route::get('/', function () {
        return view ('login');
    })->name('login');
    Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth'); 
});
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/error-permission', function(){
    return view('errors.permission');
})->name('error.permission');


Route::prefix('/')->name('home.')->group(function(){
    Route::get('/Dashboard', [DashboardController::class, 'index'])->name('page');
});



Route::middleware(['IsLogin', 'IsAdmin'])->group(function () {
  

    Route::prefix('/rombel')->name('rombel.')->group(function(){
        Route::get('/', [RombelController::class, 'index'])->name('home');
        Route::get('/create', [RombelController::class, 'create'])->name('create');
        Route::post('/store', [RombelController::class, 'store'])->name('store');
        Route::get('/{id}', [RombelController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [RombelController::class, 'update'])->name('update');
        Route::delete('/{id}', [RombelController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/user')->name('user.')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('home');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/rayon')->name('rayon.')->group(function(){
        Route::get('/', [RayonController::class, 'index'])->name('home');
        Route::get('/create', [RayonController::class, 'create'])->name('create');
        Route::post('/store', [RayonController::class, 'store'])->name('store');
        Route::get('/{id}', [RayonController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [RayonController::class, 'update'])->name('update');
        Route::delete('/{id}', [RayonController::class, 'destroy'])->name('delete');;
    });


    Route::prefix('/student')->name('student.')->group(function(){
        Route::get('/', [StudentController::class, 'index'])->name('home');
        Route::get('/create', [StudentController::class, 'create'])->name('create');
        Route::post('/store', [StudentController::class, 'store'])->name('store');
        Route::get('/{id}', [StudentController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [StudentController::class, 'update'])->name('update');
        Route::delete('/{id}', [StudentController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/latest')->name('latest.')->group(function(){
        Route::get('/', [LatestController::class, 'index'])->name('home');
        Route::get('/rekap', [LatestController::class, 'rekap'])->name('rekap');
        Route::get('/create', [LatestController::class, 'create'])->name('create');
        Route::post('/store', [LatestController::class, 'store'])->name('store');
        Route::get('/review/{id}', [LatestController::class, 'review'])->name('review');
        Route::get('/download/{id}', [LatestController::class, 'downloadPDF'])->name('download');
        Route::get('/export-rekap', [LatestController::class, 'exportExcel'])->name('export');
        Route::get('/{id}', [LatestController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [LatestController::class, 'update'])->name('update');
        Route::get('/Detail/{id}', [LatestController::class, 'show'])->name('show');
        Route::delete('/{id}', [LatestController::class, 'destroy'])->name('delete');
     

    });

});

Route::middleware(['IsLogin', 'IsPS'])->group(function(){
    Route::prefix('/ps')->name('ps.')->group(function(){

        Route::prefix('/student')->name('student.')->group(function(){
            Route::get('/', [StudentController::class, 'PsIndex'])->name('home');
            Route::get('/create', [StudentController::class, 'create'])->name('create');
            Route::post('/store', [StudentController::class, 'store'])->name('store');
            Route::get('/{id}', [StudentController::class, 'edit'])->name('edit');
            Route::patch('/{id}', [StudentController::class, 'update'])->name('update');
            Route::delete('/{id}', [StudentController::class, 'destroy'])->name('delete');
        });

        Route::prefix('/latest')->name('latest.')->group(function(){
            Route::get('/', [LatestController::class, 'PsLatest'])->name('home');
            Route::get('/rekap', [LatestController::class, 'Psrekap'])->name('rekap');
            Route::get('/create', [LatestController::class, 'create'])->name('create');
            Route::post('/store', [LatestController::class, 'store'])->name('store');
            Route::get('/review/{id}', [LatestController::class, 'review'])->name('review');
            Route::get('/download/{id}', [LatestController::class, 'downloadPDF'])->name('download');
            Route::get('/export-rekap', [LatestController::class, 'PSexportExcel'])->name('export');
            Route::get('/{id}', [LatestController::class, 'edit'])->name('edit');
            Route::patch('/{id}', [LatestController::class, 'update'])->name('update');
            Route::get('/Detail/{id}', [LatestController::class, 'show'])->name('show');
            Route::delete('/{id}', [LatestController::class, 'destroy'])->name('delete');
    
        });

    });
});

