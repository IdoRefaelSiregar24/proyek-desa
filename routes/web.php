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

Route::get('/', function () {
    return view('pages.index');
});

// Route Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route Halaman About
Route::get('about', [DashboardController::class, 'about'])->name('about');

// Auth Routhes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.show');
Route::get('register', [AuthController::class, 'showRegisterFrom'])->name('register.show');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::delete('delete', [AuthController::class, 'destroy'])->name('auth.destroy');

Route::group(['middleware' => ['checkislogin', 'checkrole:User']], function () {

    // Warga (Read Only)
    Route::resource('warga-guest', WargaController::class);

    // Proyek (Read Only)
    Route::resource('proyek-guest', ProyekController::class);
    Route::get('/detail/{proyek_id}', [ProyekController::class, 'detail'])->name('detail-proyek');
    Route::get('/tahapan/{id}/progress', [ProyekController::class, 'getProgress'])->name('tahapan.progress');

    // Tahapan (Read Only)
    Route::resource('tahapan-guest', TahapanController::class);
    Route::get('/listTahapan/{proyek_id}', [TahapanController::class, 'listTahapan'])->name('listTahapan');

    // Progress (Read Only)
    Route::resource('progress-guest', ProgressController::class);
    Route::get('/listProgress/{proyek_id}', [ProgressController::class, 'listProgress'])->name('listProgress');

});

Route::group(['middleware' => ['checkislogin', 'checkrole:Surveyor']], function () {

    // Progress Input
    Route::get('/createProgress/{proyek_id}', [ProgressController::class, 'createProgress'])
        ->name('createProgress');
    Route::post('/progress-guest', [ProgressController::class, 'store'])
        ->name('progress-guest.store');

    // Upload foto progress
    Route::post('/media/upload', [MediaController::class, 'upload'])->name('media.upload');

});

Route::group(['middleware' => ['checkislogin', 'checkrole:Manajer Lapangan']], function () {

    // Kelola Tahapan
    Route::get('/createTahapan/{proyek_id}', [TahapanController::class, 'createTahapan'])
        ->name('createTahapan');
    Route::post('/tahapan-guest', [TahapanController::class, 'store'])
        ->name('tahapan-guest.store');

    // Update Tahapan
    Route::put('/tahapan-guest/{proyek}/{tahapan}', [TahapanController::class, 'update2'])
        ->name('tahapan-guest.update2');

    // Validasi Progress
    Route::put('/progress-guest/{progress}', [ProgressController::class, 'update'])
        ->name('progress.update');
});

Route::group(['middleware' => ['checkislogin', 'checkrole:Admin Proyek']], function () {

    Route::resource('proyek', ProyekController::class);
    Route::resource('tahapan', TahapanController::class);
    Route::resource('progress', ProgressController::class);
    Route::resource('warga', WargaController::class);

    // Media delete
    Route::delete('media/{id}', [MediaController::class, 'destroy'])->name('media.destroy');
});

Route::group(['middleware' => ['checkislogin', 'checkrole:Super Admin']], function () {

    Route::resource('users', UserController::class);
    // Route::resource('role-management', RoleController::class);
});






//Penerapan Middelware CheckIsLogin
// Route::group(['middleware' => ['checkislogin']], function () {
//     // Warga Guest Routes
//     Route::resource('warga-guest', WargaController::class);

//     // Proyek Guest Routes
//     Route::resource('proyek-guest', ProyekController::class);
//     Route::get('/detail/{proyek_id}', [ProyekController::class, 'detail'])->name('detail-proyek');
//     Route::get('/tahapan/{id}/progress', [ProyekController::class, 'getProgress'])
//         ->name('tahapan.progress');

//     // Tahapan Guest Routes
//     Route::resource('tahapan-guest', TahapanController::class);
//     Route::get('/listTahapan/{proyek_id}', [TahapanController::class, 'listTahapan'])->name('listTahapan');
//     Route::get('/createTahapan/{proyek_id}', [TahapanController::class, 'createTahapan'])->name('createTahapan');
//     Route::put('/tahapan-guest/{proyek}/{tahapan}', [TahapanController::class, 'update2'])
//         ->name('tahapan-guest.update2');


//     // Progress Guest Routes
//     Route::resource('progress-guest', ProgressController::class);
//     Route::get('/listProgress/{proyek_id}', [ProgressController::class, 'listProgress'])->name('listProgress');
//     // Route::get('/progress/create/{proyek_id}', [ProgressController::class, 'createProgress'])
// //     ->name('progress-guest-createProgress');
//     Route::get('/createProgress/{proyek_id}', [ProgressController::class, 'createProgress'])->name('createProgress');

//     // Media
//     Route::post('/media/upload', [MediaController::class, 'upload'])->name('media.upload');
//     Route::delete('media/{id}', [MediaController::class, 'destroy'])->name('media.destroy');
// });
