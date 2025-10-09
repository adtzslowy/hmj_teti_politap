<?php

use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index']);

// Anggota route
Route::get('anggota', [AnggotaController::class, 'index']);
Route::get('anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
