<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MatkulController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

//Route::get('/starter', function(){
//    return view('starter' );
//});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
            if (auth()->user()->role->role_name == 'admin') {
                return redirect()->route('user-list');
            } elseif (auth()->user()->role->role_name == 'mahasiswa') {
                return redirect()->route('prodi-mklist');
            } elseif (auth()->user()->role->role_name == 'prodi') {
                return redirect()->route('prodi-mklist');
            } else {
                return view('dashboard');
            }
        })->name('dashboard');
    
    Route::get('/admin', [\App\Http\Controllers\UsersController\UsersController::class, 'index'])->name('user-list');
    Route::get('/admin/user-create', [\App\Http\Controllers\UsersController\UsersController::class, 'create'])->name('user-create');
    Route::post('/admin/user-store', [\App\Http\Controllers\UsersController\UsersController::class, 'store'])->name('user-store');
    
    Route::get('/admin/user-mahasiswa', [\App\Http\Controllers\UsersController\MahasiswaController::class, 'index'])->name('user-mahasiswalist');
    Route::get('/admin/create-user-mahasiswa', [\App\Http\Controllers\UsersController\MahasiswaController::class, 'create'])->name('user-mahasiswa-create');
    
    Route::get('/admin/user-prodi', [\App\Http\Controllers\UsersController\ProdiController::class, 'index'])->name('user-prodilist');
    Route::get('/admin/create-user-prodi', [\App\Http\Controllers\UsersController\ProdiController::class, 'create'])->name('user-prodi-create');
    
    Route::get('/admin/user-role', [\App\Http\Controllers\UsersController\RoleController::class, 'index'])->name('user-rolelist');
    Route::get('/admin/create-user-role', [\App\Http\Controllers\UsersController\RoleController::class, 'create'])->name('user-role-create');
    Route::post('/admin/user-role-store', [\App\Http\Controllers\UsersController\UsersController::class, 'store'])->name('user-role-store');


Route::get('/mahasiswa/dashboard', function () {
    return view('mahasiswa.dashboard');
})->middleware(['mahasiswa'])->name('mahasiswa.dashboard');

Route::get('/prodi/dashboard', function () {
    return view('prodi.dashboard');
})->middleware(['prodi'])->name('prodi.dashboard');

});

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

require __DIR__.'/auth.php';

Route::get('/pb', [\App\Http\Controllers\PengajuanBeasiswaController::class, 'index'])->name('pb-list');
Route::get('/pb-beasiswa', [\App\Http\Controllers\PengajuanBeasiswaController::class,'pengajuan'])->name('pb-beasiswa');


Route::get('/pb-registrasi', function () {
    return view('pengajuanbeasiswa.registrasi', [
        'mahasiswas' => \App\Models\Mahasiswa::all(),
        'beasiswas' => \App\Models\NamaBeasiswa::all(),
        'timelines' => \App\Models\TimelineBeasiswa::all(),
    ]);
})->name('registrasi-beasiswa');
Route::post('/pb-registrasi-beasiswa', [\App\Http\Controllers\PengajuanBeasiswaController::class,'store'])->name('pb-registrasi');

Route::post('/pb-upload-dokumen-beasiswa', [\App\Http\Controllers\PengajuanBeasiswaController::class,'storeDokumen'])->name('pb-upload-dokumen-beasiswa');

Route::get('/pb-upload-dokumen', [\App\Http\Controllers\PengajuanBeasiswaController::class, 'showUploadDokumenForm'])->name('pb-upload-dokumen');
Route::post('/pb-upload-dokumen', [\App\Http\Controllers\PengajuanBeasiswaController::class, 'storeuploadBeasiswa'])->name('pb-upload-dokumen');


Route::middleware(['auth'])->group(function() {
    // Route for dashboard that requires authentication
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
});
