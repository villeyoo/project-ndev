<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ScripterController;
use App\Http\Controllers\PolisiController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});
Route::get('/cekstatus', function () {
    return view('cek-status');
});

// Dashboard (pakai controller)
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware('auth');

// Route untuk Lowongan (prefix "dashboard")
Route::prefix('dashboard')->group(function () {
    Route::get('/tambah-lowongan', [LowonganController::class, 'create'])->name('lowongan.create');
    Route::post('/tambah-lowongan', [LowonganController::class, 'store'])->name('lowongan.store');
    Route::get('/list-lowongan', [LowonganController::class, 'list'])->name('lowongan.list');

    // 🔹 Tambahan untuk Edit & Delete
    Route::get('/lowongan/{id}/edit', [LowonganController::class, 'edit'])->name('lowongan.edit');
    Route::put('/lowongan/{id}', [LowonganController::class, 'update'])->name('lowongan.update');
    Route::delete('/lowongan/{id}', [LowonganController::class, 'destroy'])->name('lowongan.destroy');
});

Route::get('/admin/pelamar/scripter', [ScripterController::class, 'showScripter'])->name('pelamar.scripter');
Route::get('/admin/pelamar/polisi', [PolisiController::class, 'showPolisi'])->name('pelamar.polisi');
// Pastikan route POST sudah didefinisikan dengan benar
// Route untuk menampilkan daftar Content Creator
Route::get('/content-creator', [ContentController::class, 'index'])->name('content-creator.index');

// Route untuk menyimpan Content Creator (POST)
Route::post('/content-creator', [ContentController::class, 'store'])->name('content-creator.store');

// Route untuk menampilkan detail Content Creator berdasarkan ID
Route::get('/content-creator/{id}', [ContentController::class, 'show'])->name('content-creator.show');

Route::delete('/content-creator/{id}', [ContentController::class, 'destroy'])->name('content-creator.destroy');

// Route untuk verifikasi pengajuan menjadi Content Creator
Route::get('/content-creator/{id}/verify', [ContentController::class, 'verify'])->name('content-creator.verify');

// Route untuk mengupdate status pengajuan (diterima atau ditolak)
Route::put('/content-creator/{id}/verify', [ContentController::class, 'updateStatus'])->name('content-creator.updateStatus');



// Halaman cek status pendaftaran
Route::get('/cek-status', [StatusController::class, 'showForm'])->name('cek-status.form');
Route::post('/cek-status', [StatusController::class, 'checkStatus'])->name('cek-status.check');

Route::get('polisi', [PolisiController::class, 'showForm'])->name('polisi');

// Route untuk menyimpan data pendaftaran Polisi
Route::post('/polisi', [PolisiController::class, 'store'])->name('polisi.store');

Route::post('/polisi', [PolisiController::class, 'store'])->name('pelamar.polisi');

// Route untuk menampilkan daftar Polisi
Route::get('polisi', [PolisiController::class, 'index'])->name('polisi.index');

// Route untuk verifikasi Polisi

// Route untuk menampilkan halaman verifikasi polisi
Route::get('/polisi/{id}/verifikasi', [PolisiController::class, 'verifyPage'])->name('polisi.verify');

// Route untuk memproses verifikasi status polisi
Route::put('/polisi/{id}/verifikasi', [PolisiController::class, 'updateStatus'])->name('polisi.updateStatus');


// Route untuk melihat detail Polisi
Route::get('polisi/{id}', [PolisiController::class, 'show'])->name('polisi.show');

// Route untuk menghapus Polisi
Route::delete('polisi/{id}', [PolisiController::class, 'destroy'])->name('polisi.destroy');



// Halaman hire (list lowongan untuk user)
Route::get('/hire', [LowonganController::class, 'index']);


// Halaman form pendaftaran
Route::get('/daftar/form', [DaftarController::class, 'index'])->name('daftar.form');

// Route untuk submit form (POST)
Route::post('/daftar/submit', [DaftarController::class, 'submit'])->name('daftar.submit');


Route::post('/scripter', [ScripterController::class, 'store'])->name('pelamar.scripter');

Route::get('/pelamar/scripter', [ScripterController::class, 'index'])->name('scripter.index');

// Route untuk verifikasi Scripter
Route::get('/scripter/{id}/verifikasi', [ScripterController::class, 'verifyPage'])->name('scripter.verify');
Route::put('/scripter/{id}/verifikasi', [ScripterController::class, 'updateStatus'])->name('scripter.updateStatus');
// Route untuk melihat detail Scripter
Route::get('/scripter/{id}', [ScripterController::class, 'show'])->name('scripter.show');

// Route untuk menghapus Scripter
Route::delete('/scripter/{id}', [ScripterController::class, 'destroy'])->name('scripter.destroy');

// Rute untuk halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Rute untuk proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Rute untuk halaman dashboard (hanya untuk pengguna yang sudah login)

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');