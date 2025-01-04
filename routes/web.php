<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('backend.login');

    });

Route::get('backend/beranda', [BerandaController::class, 'berandaBackend'])->name('backend.beranda');
Route::get('backend/beranda', [BerandaController::class, 'berandaBackend'])->name('backend.beranda')->middleware('auth');
Route::get('backend/login', [LoginController::class, 'loginBackend'])->name('backend.login');
Route::post('backend/login', [LoginController::class, 'authenticateBackend'])->name('backend.login');
Route::post('backend/logout', [LoginController::class, 'logoutBackend'])->name('backend.logout');

Route::resource('backend/user', UserController::class, ['as' => 'backend'])->middleware('auth');

Route::get('backend/laporan/formuser', [UserController::class, 'formUser'])->name('backend.laporan.formuser')->middleware('auth');
Route::post('backend/laporan/cetakuser', [UserController::class, 'cetakUser'])->name('backend.laporan.cetakuser')->middleware('auth');


// Barang Masuk
Route::get('/barang-masuk', [BarangController::class, 'daftarBarangMasuk'])->name('barang-masuk.daftar');
Route::get('/barang-masuk/form', [BarangController::class, 'formBarangMasuk'])->name('barang-masuk.form');
Route::post('/barang-masuk/simpan', [BarangController::class, 'simpanBarangMasuk'])->name('barang-masuk.simpan');
Route::get('/barang-masuk/edit/{id}', [BarangController::class, 'editBarangMasuk'])->name('barang-masuk.edit');
Route::put('/barang-masuk/update/{id}', [BarangController::class, 'updateBarangMasuk'])->name('barang-masuk.update');
Route::delete('/barang-masuk/delete/{id}', [BarangController::class, 'hapusBarangMasuk'])->name('barang-masuk.delete'); // <- Route untuk delete

// Barang Keluar
Route::get('/barang-keluar', [BarangController::class, 'daftarBarangKeluar'])->name('barang-keluar.daftar');
Route::get('/barang-keluar/form', [BarangController::class, 'formBarangKeluar'])->name('barang-keluar.form');
Route::post('/barang-keluar/simpan', [BarangController::class, 'simpanBarangKeluar'])->name('barang-keluar.simpan');
Route::get('/barang-keluar/edit/{id}', [BarangController::class, 'editBarangKeluar'])->name('barang-keluar.edit');
Route::put('/barang-keluar/update/{id}', [BarangController::class, 'updateBarangKeluar'])->name('barang-keluar.update');
Route::delete('/barang-keluar/delete/{id}', [BarangController::class, 'hapusBarangKeluar'])->name('barang-keluar.delete');

// Route::get('/stok-barang', [BarangController::class, 'daftarStok'])->name('stok-barang.daftar');

// Daftar Stok Barang
Route::get('/stok-barang', [BarangController::class, 'daftarStok'])->name('stok-barang.daftar');

// Form untuk menambah Stok Barang
Route::get('/stok-barang/form', [BarangController::class, 'formStok'])->name('stok-barang.form');

// Proses untuk menyimpan Stok Barang
Route::post('/stok-barang/simpan', [BarangController::class, 'simpanStok'])->name('stok-barang.simpan');

// Form Edit Stok Barang
Route::get('/stok-barang/edit/{id}', [BarangController::class, 'editStok'])->name('stok-barang.edit');

// Proses untuk update Stok Barang
Route::put('/stok-barang/update/{id}', [BarangController::class, 'updateStok'])->name('stok-barang.update');

// Hapus Stok Barang
Route::delete('/stok-barang/destroy/{id}', [BarangController::class, 'hapusStok'])->name('stok-barang.hapus');

// Laporan Stok Barang (Opsional, jika diperlukan)
Route::get('/stok-barang/laporan', [BarangController::class, 'formBarangMasukLaporan'])->name('stok-barang.laporan');
Route::post('/stok-barang/laporan/cetak', [BarangController::class, 'cetakBarangMasuk'])->name('stok-barang.cetak');

// Laporan Stok Barang
Route::get('/stok-barang/laporan', [BarangController::class, 'formStokLaporan'])->name('stok-barang.laporan');
Route::post('/stok-barang/laporan/cetak', [BarangController::class, 'cetakStok'])->name('stok-barang.cetak');

// Routes for Barang Masuk
Route::get('barang-masuk/laporan', [BarangController::class, 'formBarangMasukLaporan'])->name('barang-masuk.laporan');
Route::post('barang-masuk/cetak', [BarangController::class, 'cetakBarangMasuk'])->name('barang-masuk.cetak');

// Routes for Barang Keluar
Route::get('barang-keluar/laporan', [BarangController::class, 'formBarangKeluarLaporan'])->name('barang-keluar.laporan');
Route::post('barang-keluar/cetak', [BarangController::class, 'cetakBarangKeluar'])->name('barang-keluar.cetak');











