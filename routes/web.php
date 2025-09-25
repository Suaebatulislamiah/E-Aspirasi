<?php

use App\Models\Desa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\AnggotadprdController;

// Landing Page
Route::get('/', function () {
    return view('landing-page');
});

// Auth Routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');
});

// Profil DPRD
Route::view('/profil', 'profil')->name('profil');

// Semua user login
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // API untuk select desa berdasarkan kecamatan
    Route::get('/api/desa-by-kecamatan/{id}', function ($id) {
        return Desa::where('kecamatan_id', $id)->get();
    });

    // 👑 Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', function () {
            return redirect()->route('admin.aspirasi.index');
        })->name('admin');

        // Aspirasi Admin
        Route::get('/admin/aspirasi', [AspirasiController::class, 'adminIndex'])->name('admin.aspirasi.index');
        Route::get('/admin/aspirasi/create', [AspirasiController::class, 'createAdmin'])->name('admin.aspirasi.create');
        Route::get('/admin/aspirasi/{aspirasi}', [AspirasiController::class, 'show'])->name('admin.aspirasi.show');
        Route::get('/admin/aspirasi/{aspirasi}/edit', [AspirasiController::class, 'edit'])->name('admin.aspirasi.edit');
        Route::put('/admin/aspirasi/{aspirasi}', [AspirasiController::class, 'update'])->name('admin.aspirasi.update');
        Route::delete('/admin/aspirasi/{aspirasi}', [AspirasiController::class, 'destroy'])->name('admin.aspirasi.destroy');
        Route::post('/admin/aspirasi/{aspirasi}/tanggapan', [AspirasiController::class, 'tanggapan'])->name('aspirasi.tanggapan');

        // Anggota DPRD, Kecamatan, Desa, Kategori, Masyarakat
        Route::resource('anggotadprd', AnggotadprdController::class);
        Route::resource('kecamatan', KecamatanController::class);
        Route::resource('desa', DesaController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('masyarakat', MasyarakatController::class);
    });

    // 👥 Masyarakat
  Route::prefix('masyarakat/aspirasi')->group(function () {
    Route::get('/masyarakat/aspirasi', [AspirasiController::class, 'masyarakatIndex'])->name('masyarakat.aspirasi.index');
    Route::get('/create', [AspirasiController::class, 'createMasyarakat'])->name('masyarakat.aspirasi.create');
    Route::post('/store', [AspirasiController::class, 'store'])->name('masyarakat.aspirasi.store');
    Route::get('/{aspirasi}', [AspirasiController::class, 'showMasyarakat'])->name('masyarakat.aspirasi.show');
    Route::get('/{aspirasi}/edit', [AspirasiController::class, 'editMasyarakat'])->name('masyarakat.aspirasi.edit');
    Route::put('/{aspirasi}', [AspirasiController::class, 'updateMasyarakat'])->name('masyarakat.aspirasi.update');
    Route::delete('/{aspirasi}', [AspirasiController::class, 'destroyMasyarakat'])->name('masyarakat.aspirasi.destroy');
});
});