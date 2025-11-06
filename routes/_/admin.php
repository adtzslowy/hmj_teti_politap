<?php

use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\ArsipController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DivisiController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\PendaftaranAnggotaController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\TambahAdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index']);
Route::get('profile', [DashboardController::class, 'profil']);
Route::get('profile/edit/{id}', [DashboardController::class, 'edit']);
Route::put('profile/{id}', [DashboardController::class, 'update']);

Route::prefix('divisi')->middleware(['auth', 'role:GOD'])->group(function() {
    Route::get('/', [DivisiController::class, 'index']);
    Route::get('/create', [DivisiController::class,'create']);
    Route::post('/', [DivisiController::class,'store']);
    Route::get('/show/{id}', [DivisiController::class,'show']);
    Route::get('/edit/{id}', [DivisiController::class,'edit']);
    Route::put('/{id}', [DivisiController::class, 'update']);
    Route::delete('/delete/{id}', [DivisiController::class,'destroy']);
});

Route::prefix('tambah-admin')->middleware(['auth', 'role:GOD'])->group(function () {
    Route::get('/', [TambahAdminController::class, 'index']);
    Route::get('/create', [TambahAdminController::class, 'create']);
    Route::post('/', [TambahAdminController::class, 'store']);
    Route::get('/edit/{id}', [TambahAdminController::class, 'edit']);
    Route::put('/{id}', [TambahAdminController::class, 'update']);
    Route::delete('/delete/{id}', [TambahAdminController::class,  'destroy']);
});

Route::prefix('arsip')->group(function () {
    Route::get('/', [ArsipController::class, 'index'])->name('arsip.index');
    Route::get('/create', [ArsipController::class, 'create']);
    Route::post('/', [ArsipController::class, 'store']);
    Route::get('/show/{id}', [ArsipController::class, 'show']);
    Route::get('/edit/{id}', [ArsipController::class, 'edit'])->name('arsip.edit');
    Route::put('/{id}', [ArsipController::class, 'update']);
    Route::delete('/delete/{id}', [ArsipController::class, 'destroy']);
});


Route::prefix('pengaduan-mahasiswa')->group(function() {
    Route::get('/', [PengaduanController::class, 'index']);
    Route::get('/detail/{id}', [PengaduanController::class,'show']);
    Route::put('/{id}', [PengaduanController::class, 'update']);
});

Route::prefix('anggota')->group(function () {
    Route::get('/', [AnggotaController::class, 'index']);
    Route::get('/create', [AnggotaController::class, 'create']);
    Route::post('/', [AnggotaController::class, 'store']);
    Route::get('/show/{id}', [AnggotaController::class, 'show']);
    Route::get('/edit/{id}', [AnggotaController::class, 'edit']);
    Route::put('/{id}', [AnggotaController::class, 'update']);
    Route::delete('/delete/{id}', [AnggotaController::class, 'destroy']);
});

Route::prefix('mahasiswa')->group(function () {
    Route::get('/', [MahasiswaController::class, 'index']);
    Route::get('/create', [MahasiswaController::class, 'create']);
    Route::post('/', [MahasiswaController::class, 'store']);
    Route::get('/edit/{id}', [MahasiswaController::class, 'edit']);
    Route::get('/show/{id}', [MahasiswaController::class, 'show']);
    Route::put('/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/delete/{id}', [MahasiswaController::class, 'destroy']);
    Route::post('/import', [MahasiswaController::class, 'import']);
});

Route::prefix('berita')->group(function () {
    Route::get('/', [BeritaController::class, 'index']);
    Route::get('/create', [BeritaController::class, 'create']);
    Route::post('/', [BeritaController::class, 'store']);
    Route::get('/edit/{id}', [BeritaController::class, 'edit']);
    Route::put('/{id}', [BeritaController::class,'update']);
    Route::get('/show/{id}', [BeritaController::class,'show']);
    Route::delete('/delete/{id}', [BeritaController::class,'destroy']);
});

Route::prefix('pendaftar')->group(function () {
    Route::get('/', [PendaftaranAnggotaController::class, 'index']);
    Route::post('/approved/{id}', [PendaftaranAnggotaController::class,'approved']);
    Route::post('/decline/{id}', [PendaftaranAnggotaController::class,'decline']);
    Route::delete('/delete/{id}', [PendaftaranAnggotaController::class,'destroy']);
});
