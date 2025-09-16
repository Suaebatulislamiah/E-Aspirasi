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

// Semua user yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Khusus admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', function () {
            return "Selamat datang Admin!";
        });
       // Route::resource('user', UserController::class);
    //   Route::resource('masyarakat', MasyarakatController::class);
        Route::resource('anggotadprd', AnggotadprdController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('kecamatan', KecamatanController::class);
        Route::resource('desa', DesaController::class);
        Route::resource('aspirasi', AspirasiController::class);
        Route::get('/api/desa-by-kecamatan/{id}', function($id) {
    return Desa::where('kecamatan_id', $id)->get();
        });


    });
    // Khusus petugas biasa
    Route::middleware(['role:masyarakat'])->group(function () {
        Route::get('/masyarakat', function () {
            return "Selamat datang petugas!";
        });
        //Route::resource('/petugas', FiturPetugasController::class);
    });
    Route::resource('masyarakat', MasyarakatController::class);
 });
