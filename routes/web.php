<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RumahSakitController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('rumah-sakit', RumahSakitController::class);
    Route::resource('pasien', PasienController::class);
    Route::get('/pasien/filter/{id}', [PasienController::class, 'filter'])->name('pasien.filter');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});