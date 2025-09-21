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
use App\Models\Anggotadprd;

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
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('admin.aspirasi.index');
    })->name('admin');
    Route::resource('anggotadprd', AnggotadprdController::class);
    Route::resource('Aspirasi', AnggotadprdController::class);
    Route::get('/admin/aspirasi', [AspirasiController::class, 'adminIndex'])->name('admin.aspirasi.index');
    Route::get('/admin/aspirasi/create', [AspirasiController::class, 'createAdmin'])->name('admin.aspirasi.create');
    Route::get('/admin/aspirasi/{aspirasi}', [AspirasiController::class, 'show'])->name('admin.aspirasi.show');
    Route::get('/admin/aspirasi/{aspirasi}/edit', [AspirasiController::class, 'edit'])->name('admin.aspirasi.edit');
    Route::put('/admin/aspirasi/{aspirasi}', [AspirasiController::class, 'update'])->name('admin.aspirasi.update');
    Route::delete('/admin/aspirasi/{aspirasi}', [AspirasiController::class, 'destroy'])->name('admin.aspirasi.destroy');
    Route::post('/admin/aspirasi/{aspirasi}/tanggapan', [AspirasiController::class, 'tanggapan'])->name('aspirasi.tanggapan');

    // Kategori routes
    Route::resource('kategori', KategoriController::class);
    Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/admin/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/admin/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/admin/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/admin/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/admin/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    // Masyarakat routes
    Route::get('/admin/masyarakat', [MasyarakatController::class, 'index'])->name('masyarakat.index');
    Route::get('/admin/masyarakat/create', [MasyarakatController::class, 'create'])->name('masyarakat.create');
    Route::post('/admin/masyarakat', [MasyarakatController::class, 'store'])->name('masyarakat.store');
    Route::get('/admin/masyarakat/{masyarakat}/edit', [MasyarakatController::class, 'edit'])->name('masyarakat.edit');
    Route::put('/admin/masyarakat/{masyarakat}', [MasyarakatController::class, 'update'])->name('masyarakat.update');
    Route::delete('/admin/masyarakat/{masyarakat}', [MasyarakatController::class, 'destroy'])->name('masyarakat.destroy');
});
});

// 👥 Masyarakat
Route::middleware(['auth', 'role:masyarakat'])->group(function () {
    Route::get('/masyarakat/aspirasi', [AspirasiController::class, 'masyarakatIndex'])->name('masyarakat.aspirasi.index');
    Route::get('/masyarakat/aspirasi/create', [AspirasiController::class, 'createMasyarakat'])->name('masyarakat.aspirasi.create');
    Route::post('/masyarakat/aspirasi/store', [AspirasiController::class, 'store'])->name('masyarakat.aspirasi.store');
});
    Route::get('/masyarakat/aspirasi', [AspirasiController::class, 'masyarakatIndex'])->name('masyarakat.aspirasi.index');
    Route::get('/masyarakat/aspirasi/create', [AspirasiController::class, 'createMasyarakat'])->name('masyarakat.aspirasi.create');
    Route::post('/masyarakat/aspirasi/store', [AspirasiController::class, 'store'])->name('masyarakat.aspirasi.store');
