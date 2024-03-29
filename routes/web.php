<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\MasyarakatController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::view('welcome');

// Route User 

Route::get('/', [UserController::class, 'index'])->name('pekat.index');

// middleware masyarakat
Route::middleware(['masyarakat'])->group(function () {
    Route::get('/laporan/{siapa?}', [UserController::class, 'laporan'])->name('pekat.laporan');
    Route::post('/store', [UserController::class, 'storePengaduan'])->name('pekat.store');
    //logout
    Route::get('/logout', [UserController::class, 'logout'])->name('pekat.logout');
});

Route::middleware(['guest'])->group(function () {
    // masyarakat login
    Route::post('/login/auth', [UserController::class, 'login'])->name('pekat.login');
    //masyarakat register
    Route::get('/register', [UserController::class, 'formRegister'])->name('pekat.formRegister');
    Route::post('/register/auth', [UserController::class, 'register'])->name('pekat.register');
});

// group routes

Route::prefix('admin')->group(function () {
    // middleware
    Route::middleware(['admin'])->group(function () {
        //petugas
        Route::resource('petugas', PetugasController::class);
        //masyarakat
        Route::resource('masyarakat', MasyarakatController::class);
        //laporan
        Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::post('getLaporan', [LaporanController::class, 'getLaporan'])->name('laporan.getLaporan');
        Route::get('laporan/cetak/{dari}/{ke}', [LaporanController::class, 'cetakLaporan'])->name('laporan.cetakLaporan');
    });

    route::middleware(['petugas'])->group(function () {
        // for dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        // pengaduan
        Route::resource('pengaduan', PengaduanController::class);
        //tanggapan
        Route::post('/tanggapan/createOrUpdate', [TanggapanController::class, 'createOrUpdate'])->name('tanggapan.createOrUpdate');
        //logout
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });

    Route::middleware(['isGuest'])->group(function () {
        Route::get('/', [AdminController::class, 'formLogin'])->name('admin.formLogin');
        Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    });
});
