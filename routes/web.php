<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware(['auth:admin', 'role:GOD,Admin'])->group(function () {
    include __DIR__ . "/_/admin.php";
});

Route::prefix('mahasiswa',)->middleware('auth:mahasiswa')->group(function () {
    include __DIR__ . "/_/mahasiswa.php";
});

Route::get('auth/login/admin', [AuthController::class, 'loginAdmin'])->name('login');
Route::get('auth/login/mahasiswa', [AuthController::class, 'loginMahasiswa'])->name('login');
Route::post('auth/login/admin', [AuthController::class, 'loginProsesAdmin']);
Route::post('auth/login/mahasiswa', [AuthController::class, 'loginProsesMahasiswa']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/god-mode', [AuthController::class, 'addAdmin']);
