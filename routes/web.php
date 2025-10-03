<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggotaController;

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Menu Utama
Route::get('/', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


Route::prefix('admin')->middleware('auth')->group(function () {

    // ------------------ Anggota Management ------------------
    Route::get('/anggota', [AnggotaController::class, 'adminIndex'])->name('admin.anggota.index');
    Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('admin.anggota.create');
    Route::post('/anggota', [AnggotaController::class, 'store'])->name('admin.anggota.store');
    Route::get('/anggota/{id_anggota}/edit', [AnggotaController::class, 'edit'])->name('admin.anggota.edit');
    Route::put('/anggota/{id_anggota}', [AnggotaController::class, 'update'])->name('admin.anggota.update');
    Route::delete('/anggota/{id_anggota}', [AnggotaController::class, 'destroy'])->name('admin.anggota.destroy');
});
