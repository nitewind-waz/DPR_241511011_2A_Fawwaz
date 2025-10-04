<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KomponenGajiController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\PenggajianPublicController;

// ------------------ Authentication ------------------
// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ------------------ Dashboard ------------------
Route::get('/', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

    // =================== PUBLIC PENGGAJIAN ===================

Route::middleware(['auth'])->group(function () {
    Route::get('/penggajian', [PenggajianPublicController::class, 'index'])->name('penggajian.index');
    Route::get('/penggajian/{id_anggota}', [PenggajianPublicController::class, 'show'])->name('penggajian.show');
});


// ------------------ Admin Area ------------------
Route::prefix('admin')->middleware('auth')->group(function () {

    // ------------------ Anggota Management ------------------
    
    Route::middleware('role:Admin')->group(function () {
        Route::get('/anggota', [AnggotaController::class, 'adminIndex'])->name('admin.anggota.index');
        Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('admin.anggota.create');
        Route::post('/anggota', [AnggotaController::class, 'store'])->name('admin.anggota.store');
        Route::get('/anggota/{id_anggota}/edit', [AnggotaController::class, 'edit'])->name('admin.anggota.edit');
        Route::put('/anggota/{id_anggota}', [AnggotaController::class, 'update'])->name('admin.anggota.update');
        Route::delete('/anggota/{id_anggota}', [AnggotaController::class, 'destroy'])->name('admin.anggota.destroy');
    });

    // ------------------ Komponen Gaji Management ------------------
    
    Route::middleware('role:Admin')->group(function () {
        Route::get('/komponen_gaji', [KomponenGajiController::class, 'adminIndex'])->name('admin.komponen_gaji.index');
        Route::get('/komponen_gaji/create', [KomponenGajiController::class, 'create'])->name('admin.komponen_gaji.create');
        Route::post('/komponen_gaji', [KomponenGajiController::class, 'store'])->name('admin.komponen_gaji.store');
        Route::get('/komponen_gaji/{id_komponen_gaji}/edit', [KomponenGajiController::class, 'edit'])->name('admin.komponen_gaji.edit');
        Route::put('/komponen_gaji/{id_komponen_gaji}', [KomponenGajiController::class, 'update'])->name('admin.komponen_gaji.update');
        Route::delete('/komponen_gaji/{id_komponen_gaji}', [KomponenGajiController::class, 'destroy'])->name('admin.komponen_gaji.destroy');
    });

    // ------------------ Penggajian Management ------------------
    
    Route::middleware('role:Admin')->group(function () {
        Route::get('/penggajian', [PenggajianController::class, 'adminIndex'])->name('admin.penggajian.index');
        Route::get('/penggajian/create', [PenggajianController::class, 'create'])->name('admin.penggajian.create');
        Route::post('/penggajian', [PenggajianController::class, 'store'])->name('admin.penggajian.store');
        Route::get('/penggajian/{id}/edit', [PenggajianController::class, 'edit'])->name('admin.penggajian.edit');
        Route::put('/penggajian/{id}', [PenggajianController::class, 'update'])->name('admin.penggajian.update');
        Route::delete('/penggajian/{id}', [PenggajianController::class, 'destroy'])->name('admin.penggajian.destroy');
    });
});
