<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaController;

Route::get('/', function () {
    return view('guest/dashboard');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Auth Routhes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.show');
Route::get('register', [AuthController::class, 'showRegisterFrom'])->name('register.show');

// Warga Routes
