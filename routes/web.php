<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatCampingController;
use App\Http\Controllers\UserController;

// BACKEND (DATA ALAT CAMPING)
Route::prefix('alat-camping')->group(function () {
    Route::get('/', [AlatCampingController::class, 'index'])->name('alat-camping.index'); // Daftar alat
    Route::get('/tambah', [AlatCampingController::class, 'create'])->name('alat-camping.create'); // Form tambah alat
    Route::post('/', [AlatCampingController::class, 'store'])->name('alat-camping.store'); // Tambah alat baru
    Route::get('/trashed', [AlatCampingController::class, 'trashed'])->name('alat-camping.trashed');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/download', [UserController::class, 'downloadCSV'])->name('users.download');

    Route::get('/{id}', [AlatCampingController::class, 'show'])->name('alatCamping.show'); // Detail alat
    Route::get('/{id}/edit', [AlatCampingController::class, 'edit'])->name('alat-camping.edit'); // Form edit alat
    Route::put('/{id}', [AlatCampingController::class, 'update'])->name('alat-camping.update'); // Update data alat

    Route::get('/alat-camping/trashed', [AlatCampingController::class, 'trashed'])->name('alat-camping.trashed');
    Route::patch('/alat-camping/{id}/restore', [AlatCampingController::class, 'restore'])->name('alat-camping.restore');
    Route::delete('/alat-camping/{id}/force-delete', [AlatCampingController::class, 'forceDelete'])->name('alat-camping.forceDelete');
    Route::delete('/alat-camping/{id}/soft-delete', [AlatCampingController::class, 'softDelete'])->name('alat-camping.softDelete');
});

// INTERFACE ADMIN
Route::prefix('admin')->group(function () {
    Route::view('/', 'admin/views/index')->name('admin.dashboard');
    Route::view('/profile', 'admin/user/user-profile')->name('admin.profile');

    // PEMINJAMAN
    Route::prefix('peminjaman')->group(function () {
        Route::view('/riwayat', 'admin/peminjaman/views/riwayat-pinjaman')->name('peminjaman.riwayat');
        Route::view('/belum-dikembalikan', 'admin/peminjaman/views/belum-dikembalikan')->name('peminjaman.belum-dikembalikan');
    });

    // PENGGUNA
    Route::get('/pengguna/list', [UserController::class, 'index'])->name('pengguna.list');

    // LAPORAN
    Route::prefix('laporan')->group(function () {
        Route::view('/transaksi', 'admin/laporan/views/laporan-transaksi')->name('laporan.transaksi');
        Route::view('/stok', 'admin/laporan/views/list-stok-alat')->name('laporan.stok');
    });

    // LOG
    Route::view('/log', 'admin/log/views/log')->name('admin.log');
});
