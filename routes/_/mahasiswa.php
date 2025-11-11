<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mahasiswa\DashboardController;
use App\Http\Controllers\Mahasiswa\PendaftarController;
use App\Http\Controllers\Mahasiswa\PengaduanController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard_mahasiswa');
Route::get('/profile', [DashboardController::class, 'profil']);
Route::get('/profile/edit/{id}', [DashboardController::class, 'edit']);
Route::put('/profile/{id}', [DashboardController::class, 'update']);


Route::prefix('pendaftaran-anggota')->group(function () {
    Route::get('/', [PendaftarController::class, 'index']);
    Route::get('/create', [PendaftarController::class, 'create']);
    Route::post('/', [PendaftarController::class,'store']);
});
Route::prefix('pengaduan-anggota')->group(function () {
    Route::get('/', [PengaduanController::class, 'index']);
    Route::get('/create', [PengaduanController::class, 'create']);
    Route::post('/', [PengaduanController::class,'store']);
});
