<?php

use App\Http\Controllers\Mahasiswa\PendaftarController;
use App\Http\Controllers\Mahasiswa\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/profile', [DashboardController::class, 'profil']);
Route::get('/profile/edit/{id}', [DashboardController::class, 'edit']);
Route::put('/profile/{id}', [DashboardController::class, 'update']);


Route::prefix('pendaftaran-anggota')->group(function () {
    Route::get('/', [PendaftarController::class, 'index']);
    Route::get('/create', [PendaftarController::class, 'create']);
    Route::post('/', [PendaftarController::class,'store']);
});
