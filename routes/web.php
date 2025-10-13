<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('guest/dashboard');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Login

Route::get('login', [AuthController::class, 'index'])->name('login.show');

