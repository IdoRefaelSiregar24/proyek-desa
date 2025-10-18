<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProyekAdminController;
use App\Http\Controllers\DashboardAdminController;

Route::get('/', function () {
    return view('guest/dashboard');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Auth Routhes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.show');
Route::get('register', [AuthController::class, 'showRegisterFrom'])->name('register.show');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');

// Warga Routes
Route::resource('warga', DashboardAdminController::class);

// Proyek Routes
Route::resource('proyek', ProyekAdminController::class);
