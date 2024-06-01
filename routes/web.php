<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProdiController;
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
            return redirect()->route('mk-list');
        } elseif (auth()->user()->role->role_name == 'prodi') {
            return redirect()->route('prodi-mklist');
        } else {
            return view('dashboard');
        }
    })->name('dashboard');

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('user-list');
Route::get('/admin/user-create', [\App\Http\Controllers\AdminController::class, 'create'])->name('user-create');
Route::post('/admin/user-store', [\App\Http\Controllers\AdminController::class, 'store'])->name('user-store');
Route::get('/admin/user-role', [\App\Http\Controllers\AdminController::class, 'showrole'])->name('user-role');
Route::get('/admin/beasiswa', [\App\Http\Controllers\AdminController::class, 'showbeasiswa'])->name('manage-beasiswa');


Route::get('/mahasiswa/dashboard', function () {
    return view('mahasiswa.dashboard');
})->middleware(['mahasiswa'])->name('mahasiswa.dashboard');

Route::get('/prodi/dashboard', function () {
    return view('prodi.dashboard');
})->middleware(['prodi'])->name('prodi.dashboard');


Route::get('/prodi', [\App\Http\Controllers\ProdiController::class, 'index'])->name('prodi-mklist');
Route::get('/prodi/matkul-create', [\App\Http\Controllers\ProdiController::class, 'create'])->name('prodi-mkcreate');
Route::post('/prodi/matkul-store', [\App\Http\Controllers\ProdiController::class, 'store'])->name('prodi-mkstore');

Route::get('/prodi-edit/{prodi}', [\App\Http\Controllers\ProdiController::class, 'edit'])->name('prodi-edit');
Route::post('/prodi-edit/{prodi}', [\App\Http\Controllers\ProdiController::class, 'update'])->name('prodi-update');
Route::get('/prodi-delete/{prodi}', [\App\Http\Controllers\ProdiController::class, 'destroy'])->name('prodi-delete');

Route::get('/prodi/hasilpolling', [\App\Http\Controllers\HasilPollingController::class, 'index'])->name('prodi-hasilpol');

// Route::get('/prodi/matkul', [\App\Http\Controllers\MatkulController::class, 'index'])->name('matkul-list');
// Route::get('/prodi/matkul-create', [\App\Http\Controllers\MatkulController::class, 'create'])->name('matkul-create');
// Route::post('/prodi/matkul-store', [\App\Http\Controllers\MatkulController::class, 'store'])->name('matkul-store');

Route::get('/mk', [\App\Http\Controllers\MataKuliahController::class,'index'])->name('mk-list');
Route::get('/mk-polling', [\App\Http\Controllers\MataKuliahController::class,'polling'])->name('mk-polling');
Route::post('/mk-store', [\App\Http\Controllers\MataKuliahController::class,'store'])->name('mk-store');
});

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
require __DIR__.'/auth.php';
