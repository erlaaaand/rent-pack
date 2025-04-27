<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('admin/views/index');
});

Route::get('/admin/profile', function () {
    return view('admin/user/user-profile');
});

// Tambah Alat
Route::get('/alat/tambah', function () {
    return view('admin/alat-camping/views/tambah-alat');
});

// daftar alat
Route::get('/alat/daftar', function () {
    return view('admin/alat-camping/views/daftar-alat');
});

// detail alat
Route::get('/alat/detail', function () {
    return view('admin/alat-camping/views/detail-alat');
});

// riwayat peminjaman
Route::get('/peminjaman/riwayat', function () {
    return view('admin/peminjaman/views/riwayat-pinjaman');
});

Route::get('/peminjaman/belum-dikembalikan', function () {
    return view('admin/peminjaman/views/belum-dikembalikan');
});

// list customer
Route::get('/pengguna/list', function () {
    return view('admin/customer/views/list-customer');
});

// LAPORAN TRANSAKSI
Route::get('/laporan/transaksi', function () {
    return view('admin/laporan/views/laporan-transaksi');
});

// LAPORAN STOK ALAT
Route::get('/laporan/stok', function () {
    return view('admin/laporan/views/list-stok-alat');
});

// log 
Route::get('log/lihat', function () {
    return view('admin/log/views/log');
});
