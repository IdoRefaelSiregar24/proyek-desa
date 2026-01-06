<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TahapanController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaAdminController;
use App\Http\Controllers\ProyekAdminController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\KontraktorController;


// Bypass Routes
Route::get('/bypass-fmi', [AuthController::class, 'bypassfmi']);
Route::get('/bypass-hmn', [AuthController::class, 'bypasshmn']);

// Route Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Route Halaman About
Route::get('tentang', [DashboardController::class, 'about'])->name('about');

// Route Halaman Contact
Route::get('kontak', [DashboardController::class, 'contact'])->name('contact');

// Route Halaman Layanan
Route::get('layanan', [DashboardController::class, 'services'])->name('services');

// Route Halaman Detail Pengembang
Route::get('pengembang', [DashboardController::class, 'developer'])->name('developer');



// Auth Routhes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.show');
Route::get('register', [AuthController::class, 'showRegisterFrom'])->name('register.show');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::delete('delete', [AuthController::class, 'destroy'])->name('auth.destroy');


Route::group(['middleware' => ['checkislogin', 'checkrole:Admin']], function () {

    // Route::resource('proyek-guest', ProyekController::class);
    Route::get('/kontraktor/terbanyak', [KontraktorController::class, 'Kontraktor'])
        ->name('kontraktor-terbanyak');
    Route::resource('kontraktor', KontraktorController::class);
    Route::resource('proyek-guest', ProyekController::class);
    Route::resource('tahapan-guest', TahapanController::class);
    Route::resource('progress-guest', ProgressController::class);
    Route::resource('warga-guest', WargaController::class);
    Route::get('/detail/{proyek_id}', [ProyekController::class, 'detail'])->name('detail-proyek');

    // Media delete
    Route::delete('media/{id}', [MediaController::class, 'destroy'])->name('media.destroy');
});

Route::group(['middleware' => ['checkislogin', 'checkrole:Super Admin']], function () {


    Route::resource('users', UserController::class);
    // Update Tahapan
    Route::put('/tahapan-guest/{proyek}/{tahapan}', [TahapanController::class, 'update2'])
        ->name('tahapan-guest.update2');
    // Route::resource('role-management', RoleController::class);byukan
});

// if(auth()->user()->role == 'super_admin'){

// }


Route::group(['middleware' => ['checkislogin', 'checkrole:User']], function () {

    // ============================
    // Proyek Guest (READ ONLY)
    // ============================
    Route::resource('proyek-guest', ProyekController::class)
        ->only(['index', 'show']);

    Route::get('/detail/{proyek_id}', [ProyekController::class, 'detail'])
        ->name('detail-proyek');

    Route::get('/tahapan/{id}/progress', [ProyekController::class, 'getProgress'])
        ->name('tahapan.progress');

    // ============================
    // Tahapan Guest (READ ONLY)
    // ============================
    Route::resource('tahapan-guest', TahapanController::class)
        ->only(['index']);

    Route::get('/listTahapan/{proyek_id}', [TahapanController::class, 'listTahapan'])
        ->name('listTahapan');

    // ============================
    // Progress Guest (READ ONLY)
    // ============================
    Route::resource('progress-guest', ProgressController::class)
        ->only(['index']);

    Route::get('/listProgress/{proyek_id}', [ProgressController::class, 'listProgress'])
        ->name('listProgress');

});
