<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersAdminController;
use App\Http\Controllers\WargaAdminController;
use App\Http\Controllers\ProyekAdminController;
use App\Http\Controllers\DashboardAdminController;

Route::get('/', function () {
    return view('guest/auth/login');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Auth Routhes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.show');
Route::get('register', [AuthController::class, 'showRegisterFrom'])->name('register.show');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::delete('delete', [AuthController::class, 'destroy'])->name('auth.destroy');


// Warga Admin Routes
Route::resource('warga-admin', WargaAdminController::class);

// Proyek Admin Routes
Route::resource('proyek-admin', ProyekAdminController::class);

// Warga Guest Routes
Route::resource('warga-guest', WargaController::class);

// Proyek Guest Routes
Route::resource('proyek-guest', ProyekController::class);

//Dashboard Admin Routes
Route::resource('dashboard-admin', DashboardAdminController::class);

//users admin routes
Route::resource('user-admin', UsersAdminController::class);

// Auth Admin Routes
Route::get('/admin/login', [AuthAdminController::class, 'index'])->name('login');
Route::post('/admin/login', [AuthAdminController::class, 'login'])->name('admin.login');
Route::get('/admin/register', [AuthAdminController::class, 'regis'])->name('register');
Route::post('/admin/register', [AuthAdminController::class, 'register'])->name('admin.register');


