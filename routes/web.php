<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatCampingController;

// BACKEND
Route::get('/alat-camping', [AlatCampingController::class, 'index'])->name('alat-camping.index');
Route::post('/alat-camping', [AlatCampingController::class, 'create'])->name('alat-camping.create');
Route::get('/alat-camping/{id}', [AlatCampingController::class, 'show'])->name('alat-camping.show');

// INTERFACE ADMIN
Route::prefix('admin')->group(function () {
    Route::view('/', 'admin/views/index')->name('admin.dashboard');
    Route::view('/profile', 'admin/user/user-profile')->name('admin.profile');

    // ALAT CAMPING
    Route::prefix('alat-camping')->group(function () {
        Route::view('/tambah', 'admin/alat-camping/views/tambah-alat')->name('alat-camping.create');
        Route::view('/daftar', 'admin/alat-camping/views/daftar-alat')->name('alat-camping.list');
        Route::view('/detail', 'admin/alat-camping/views/detail-alat')->name('alat-camping.detail');
    });

    // PEMINJAMAN
    Route::prefix('peminjaman')->group(function () {
        Route::view('/riwayat', 'admin/peminjaman/views/riwayat-pinjaman')->name('peminjaman.riwayat');
        Route::view('/belum-dikembalikan', 'admin/peminjaman/views/belum-dikembalikan')->name('peminjaman.belum-dikembalikan');
    });

    // PENGGUNA
    Route::view('/pengguna/list', 'admin/customer/views/list-customer')->name('pengguna.list');

    // LAPORAN
    Route::prefix('laporan')->group(function () {
        Route::view('/transaksi', 'admin/laporan/views/laporan-transaksi')->name('laporan.transaksi');
        Route::view('/stok', 'admin/laporan/views/list-stok-alat')->name('laporan.stok');
    });

    // LOG
    Route::view('/log', 'admin/log/views/log')->name('admin.log');
});
