<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index']);

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    include __DIR__ . "/_/admin.php";
});

Route::prefix('mahasiswa',)->middleware('auth:mahasiswa')->group(function () {
    include __DIR__ . "/_/mahasiswa.php";
});

Route::get('auth/login/admin', [AuthController::class, 'loginAdmin'])->name('login');
Route::get('auth/login/mahasiswa', [AuthController::class, 'loginMahasiswa'])->name('login_mhs');
Route::post('auth/login/admin', [AuthController::class, 'loginProsesAdmin']);
Route::post('auth/login/mahasiswa', [AuthController::class, 'loginProsesMahasiswa']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/god-mode', [AuthController::class, 'addAdmin']);
