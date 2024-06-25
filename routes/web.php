<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

require __DIR__.'/auth.php';

Route::get('/', function () {
        return redirect('/login');
    });

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

Route::get('/prodi', [\App\Http\Controllers\ProdiController::class, 'index'])->name('prodi');
Route::get('/prodi/pengajuan', [\App\Http\Controllers\ProdiController::class, 'pengajuan'])->name('prodi_pengajuan');
Route::get('/prodi/mahasiswa', [\App\Http\Controllers\MahasiswaController::class, 'index'])->name('prodi_mahasiswa');
Route::get('/prodi/beasiswa', [\App\Http\Controllers\BeasiswaController::class, 'index'])->name('prodi_beasiswa');
Route::get('/prodi/timeline', [\App\Http\Controllers\BeasiswaController::class, 'timeline'])->name('prodi_timeline');
Route::get('/prodi/beasiswa/jenisbeasiswa', [\App\Http\Controllers\BeasiswaController::class, 'jenisbeasiswa'])->name('prodi_jenisbeasiswa');


Route::get('prodi/timeline/create', [\App\Http\Controllers\BeasiswaController::class, 'create'])->name('prodi_create');
Route::post('prodi/timeline/store', [\App\Http\Controllers\BeasiswaController::class, 'store'])->name('prodi_store');

Route::get('/fakultas', [\App\Http\Controllers\FakultasController::class, 'index'])->name('fakultas');
Route::get('/fakultas/dosen', [\App\Http\Controllers\FakultasController::class, 'dosen'])->name('fakultas_dosen');
Route::get('/fakultas/mahasiswa', [\App\Http\Controllers\MahasiswaController::class, 'index'])->name('fakultas_mahasiswa');
Route::get('/fakultas/beasiswa', [\App\Http\Controllers\BeasiswaController::class, 'index'])->name('fakultas_beasiswa');
Route::get('/fakultas/pengajuanbeasiswa', [\App\Http\Controllers\BeasiswaController::class, 'pengajuan'])->name('fakultas_pengajuan');

Route::get('/fakultas/timeline', [\App\Http\Controllers\BeasiswaController::class, 'timeline'])->name('fakultas_timeline');
Route::get('/fakultas/beasiswa/jenisbeasiswa', [\App\Http\Controllers\BeasiswaController::class, 'jenisbeasiswa'])->name('fakultas_jenisbeasiswa');

Route::get('fakultas/timeline/create', [\App\Http\Controllers\BeasiswaController::class, 'create'])->name('fakultas_create');
Route::post('fakultas/timeline/store', [\App\Http\Controllers\BeasiswaController::class, 'store'])->name('fakultas_store');





Route::post('/pengajuan/approve/{id}', [\App\Http\Controllers\BeasiswaController::class, 'approve'])->name('pengajuan.approve');
Route::post('/pengajuan/reject/{id}', [\App\Http\Controllers\BeasiswaController::class, 'reject'])->name('pengajuan.reject');





Route::get('/pb-registrasi', function () {
    return view('pengajuanbeasiswa.registrasi', [
        'mahasiswas' => \App\Models\Mahasiswa::all(),
        'beasiswas' => \App\Models\NamaBeasiswa::all(),
        'timelines' => \App\Models\TimelineBeasiswa::all(),
    ]);
})->name('registrasi-beasiswa');
Route::post('/pb-registrasi-beasiswa', [\App\Http\Controllers\PengajuanBeasiswaController::class,'store'])->name('pb-registrasi');

Route::post('/pb-upload-transkrip_nilai-beasiswa', [\App\Http\Controllers\PengajuanBeasiswaController::class, 'storeDokumen'])->name('pb-upload-transkrip_nilai-beasiswa');

Route::get('/pb-upload-transkrip_nilai', [\App\Http\Controllers\PengajuanBeasiswaController::class, 'showUploadDokumenForm'])->name('pb-upload-transkrip_nilai');
Route::post('/pb-upload-transkrip_nilai', [\App\Http\Controllers\PengajuanBeasiswaController::class, 'storeuploadBeasiswa'])->name('pb-upload-transkrip_nilai');

Route::get('/pb/{id}/edit', [\App\Http\Controllers\PengajuanBeasiswaController::class, 'edit'])->name('pb-edit');
Route::put('/pb/{id}', [\App\Http\Controllers\PengajuanBeasiswaController::class, 'update'])->name('pb-update');
Route::delete('/pb/{id}', [\App\Http\Controllers\PengajuanBeasiswaController::class, 'destroy'])->name('pb-destroy');

Route::middleware(['auth'])->group(function() {
    // Route for dashboard that requires authentication
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
