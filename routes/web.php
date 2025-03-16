<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();




// FRONTPAGES
Route::get('/', [HomeController::class, 'index'])->name('frontpages.index');
Route::get('/kontak-dan-informasi', [HomeController::class, 'kontak'])->name('frontpages.kontak');
Route::prefix('pengaduan')->group(function () {
    Route::get('/', [HomeController::class, 'pengaduan'])->name('frontpages.form-pengaduan');
    Route::get('/tracking-laporan', [HomeController::class, 'pantau_pengaduan'])->name('frontpages.form-pantau-pengaduan');
    Route::post('/kirim-laporan', [HomeController::class, 'pengaduan_store'])->name('frontpages.form-pengaduans-store');
});
Route::prefix('tentang')->group(function () {
    Route::get('/tentang', [HomeController::class, 'tentang'])->name('frontpages.tentang');
    Route::get('/alur-pengaduan', [HomeController::class, 'alur_pengaduan'])->name('frontpages.alur-pengaduan');
});
Route::middleware(['auth', 'admin'])->prefix('manage')->group(function () {
    Route::middleware('auth')->prefix('manage')->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/chart-data',  [AdminController::class, 'chartData'])->name('admin.chart-data');
        Route::prefix('data-pengaduan')->group(function () {
            Route::get('/', [AdminController::class, 'index_data_pengaduan'])->name('admin.index-data-pengaduan');
            Route::get('/edit', [AdminController::class, 'data_pengaduan_edit'])->name('admin.data-pengaduan-edit');
            Route::put('/update-status', [AdminController::class, 'data_pengaduan_update_status'])->name('admin.data-pengaduan-update-status');
            Route::get('/filter-data',  [AdminController::class, 'filter_data'])->name('admin.filter-data');
            Route::delete('/destroy', [AdminController::class, 'data_pengaduan_destroy'])->name('admin.data-pengaduan-destroy');
        });
        Route::prefix('data-pelapor')->group(function () {
            Route::get('/', [AdminController::class, 'index_data_pelapor'])->name('admin.index-data-pelapor');
            Route::get('/riwayat-pelapor', [AdminController::class, 'data_pelapor_riwayat'])->name('admin.data-pelapor-riwayat');
        });
        Route::get('data-terlapor', [AdminController::class, 'index_data_terlapor'])->name('admin.index-data-terlapor');
        // Master Data
        Route::prefix('master')->group(function () {
            Route::prefix('jenis-laporan')->group(function () {
                Route::get('/', [AdminController::class, 'index_jenis_laporan'])->name('admin.master.jenis-laporan');
                Route::post('/store', [AdminController::class, 'jenis_laporan_store'])->name('admin.master.jenis-laporan-store');
                Route::get('/edit', [AdminController::class, 'jenis_laporan_edit'])->name('admin.master.jenis-laporan-edit');
                Route::put('/update', [AdminController::class, 'jenis_laporan_update'])->name('admin.master.jenis-laporan-update');
                Route::delete('/destroy', [AdminController::class, 'jenis_laporan_destroy'])->name('admin.master.jenis-laporan-destroy');
            });
            Route::prefix('prioritas-laporan')->group(function () {
                Route::get('/', [AdminController::class, 'index_prioritas_laporan'])->name('admin.master.prioritas-laporan');
                Route::post('/store', [AdminController::class, 'prioritas_laporan_store'])->name('admin.master.prioritas-laporan-store');
                Route::get('/edit', [AdminController::class, 'prioritas_laporan_edit'])->name('admin.master.prioritas-laporan-edit');
                Route::put('/update', [AdminController::class, 'prioritas_laporan_update'])->name('admin.master.prioritas-laporan-update');
                Route::delete('/destroy', [AdminController::class, 'prioritas_laporan_destroy'])->name('admin.master.prioritas-laporan-destroy');
            });
        });
        Route::prefix('pengguna')->group(function () {
            Route::get('/', [AdminController::class, 'index_pengguna'])->name('admin.index-pengguna');
            Route::post('/store', [AdminController::class, 'pengguna_store'])->name('admin.pengguna-store');
            Route::get('/edit', [AdminController::class, 'pengguna_edit'])->name('admin.pengguna-edit');
            Route::put('/update', [AdminController::class, 'pengguna_update'])->name('admin.pengguna-update');
            Route::delete('/destroy', [AdminController::class, 'pengguna_destroy'])->name('admin.pengguna-destroy');
            Route::put('/update-password', [AdminController::class, 'pengguna_update_password'])->name('admin.pengguna-update-password');
        });
        // Pengaturan Sistem
        Route::prefix('pengaturan')->group(function () {
            Route::get('pengaturan-sistem', [AdminController::class, 'pengaturan_sistem'])->name('admin.pengaturan.pengaturan-sistem');
            Route::put('pengaturan-sistem-update', [AdminController::class, 'pengaturan_sistem_update'])->name('admin.pengaturan-sistem-update');
            Route::get('pengaturan-email', [AdminController::class, 'pengaturan_email'])->name('admin.pengaturan.pengaturan-email');
            Route::put('pengaturan-email-update', [AdminController::class, 'pengaturan_email_update'])->name('admin.pengaturan-email-update');
        });
    });
});
