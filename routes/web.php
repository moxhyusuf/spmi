<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelaksanaanController;
use App\Http\Controllers\StandarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/standar', StandarController::class);
    Route::resource('/indikator', IndikatorController::class);
    Route::resource('/pelaksanaan', PelaksanaanController::class);
    Route::resource('/laporan', LaporanController::class);
    Route::get('/laporan/export/pdf', [LaporanController::class, 'exportPdf'])->name('laporan.export.pdf');
    Route::get('/laporan/export/excel', [LaporanController::class, 'exportExcel'])->name('laporan.export.excel');
    Route::get('/akun', [AkunController::class, 'index'])->name('akun.index');
    Route::put('/akun/username', [AkunController::class, 'updateUsername'])->name('akun.update-username');
    Route::put('/akun/password', [AkunController::class, 'updatePassword'])->name('akun.update-password');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
});
