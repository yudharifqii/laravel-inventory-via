<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenanggungJawabController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/error', function () {
    return view('errors.404');
})->name('error');

Route::get('/login', [AuthController::class, 'index'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('loginPost');

Route::get('/logout', function () {
    return view('errors.404');
})->name('logoutGet');
Route::post('/logout', [AuthController::class, 'logout'])->name('logoutPost');

Route::get('/public/barang/{id}', [PublicController::class, 'index'])->name('publicBarang');

Route::middleware(['checklogin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboardPage');

    Route::get('/barang', [BarangController::class, 'index'])->name('barangPage');
    Route::get('/barang/tambah', [BarangController::class, 'create'])->name('barangAdd');
    Route::post('/barang/tambah', [BarangController::class, 'store'])->name('barangStore');
    Route::get('/barang/ubah/{id}', [BarangController::class, 'edit'])->name('barangEdit');
    Route::put('/barang/ubah/{id}', [barangController::class, 'update'])->name('barangUpdate');
    Route::get('/barang/detail/{id}', [BarangController::class, 'show'])->name('barangDetail');
    Route::delete('/barang/hapus/{id}', [barangController::class, 'destroy'])->name('barangDelete');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategoriPage');
    Route::get('/kategori/tambah', [KategoriController::class, 'create'])->name('kategoriAdd');
    Route::post('/kategori/tambah', [KategoriController::class, 'store'])->name('kategoriStore');
    Route::get('/kategori/ubah/{id}', [KategoriController::class, 'edit'])->name('kategoriEdit');
    Route::put('/kategori/ubah/{id}', [KategoriController::class, 'update'])->name('kategoriUpdate');
    Route::delete('/kategori/hapus/{id}', [KategoriController::class, 'destroy'])->name('kategoriDelete');

    Route::get('/pemasok', [PemasokController::class, 'index'])->name('pemasokPage');
    Route::get('/pemasok/tambah', [PemasokController::class, 'create'])->name('pemasokAdd');
    Route::post('/pemasok/tambah', [PemasokController::class, 'store'])->name('pemasokStore');
    Route::get('/pemasok/detail/{id}', [pemasokController::class, 'show'])->name('pemasokDetail');
    Route::get('/pemasok/ubah/{id}', [PemasokController::class, 'edit'])->name('pemasokEdit');
    Route::put('/pemasok/ubah/{id}', [PemasokController::class, 'update'])->name('pemasokUpdate');
    Route::delete('/pemasok/hapus/{id}', [PemasokController::class, 'destroy'])->name('pemasokDelete');

    Route::get('/penanggungjawab', [PenanggungJawabController::class, 'index'])->name('penanggungjawabPage');
    Route::get('/penanggungjawab/tambah', [PenanggungJawabController::class, 'create'])->name('penanggungjawabAdd');
    Route::post('/penanggungjawab/tambah', [PenanggungJawabController::class, 'store'])->name('penanggungjawabStore');
    Route::get('/penanggungjawab/ubah/{id}', [PenanggungJawabController::class, 'edit'])->name('penanggungjawabEdit');
    Route::put('/penanggungjawab/ubah/{id}', [PenanggungJawabController::class, 'update'])->name('penanggungjawabUpdate');
    Route::delete('/penanggungjawab/hapus/{id}', [PenanggungJawabController::class, 'destroy'])->name('penanggungjawabDelete');

    Route::get('/satuan', [SatuanController::class, 'index'])->name('satuanPage');
    Route::get('/satuan/tambah', [satuanController::class, 'create'])->name('satuanAdd');
    Route::post('/satuan/tambah', [satuanController::class, 'store'])->name('satuanStore');
    Route::get('/satuan/ubah/{id}', [satuanController::class, 'edit'])->name('satuanEdit');
    Route::put('/satuan/ubah/{id}', [satuanController::class, 'update'])->name('satuanUpdate');
    Route::delete('/satuan/hapus/{id}', [satuanController::class, 'destroy'])->name('satuanDelete');

    Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barang-masukPage');
    Route::get('/barang-masuk/tambah', [BarangMasukController::class, 'create'])->name('barang-masukAdd');
    Route::post('/barang-masuk/tambah', [BarangMasukController::class, 'store'])->name('barang-masukStore');
    Route::get('/barang-masuk/ubah/{id}', [BarangMasukController::class, 'edit'])->name('barang-masukEdit');
    Route::put('/barang-masuk/ubah/{id}', [BarangMasukController::class, 'update'])->name('barang-masukUpdate');
    Route::delete('/barang-masuk/hapus/{id}', [BarangMasukController::class, 'destroy'])->name('barang-masukDelete');

    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelianPage');
    Route::get('/pembelian/tambah', [PembelianController::class, 'create'])->name('pembelianAdd');
    Route::post('/pembelian/tambah', [PembelianController::class, 'store'])->name('pembelianStore');
    Route::get('/pembelian/ubah/{id}', [PembelianController::class, 'edit'])->name('pembelianEdit');
    Route::put('/pembelian/ubah/{id}', [PembelianController::class, 'update'])->name('pembelianUpdate');
    Route::get('/pembelian/detail/{id}', [pembelianController::class, 'show'])->name('pembelianDetail');
    Route::get('/pembelian/cetak/{id}', [pembelianController::class, 'cetak'])->name('pembelianCetak');
    Route::delete('/pembelian/hapus/{id}', [pembelianController::class, 'destroy'])->name('pembelianDelete');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profilePage');

    Route::middleware(['checkrole'])->group(function () {
        Route::get('/laporanbarang', [LaporanController::class, 'laporanbarang'])->name('laporanBarang');
        Route::get('/laporanbarangmasuk', [LaporanController::class, 'laporanbarangmasuk'])->name('laporanBarangMasuk');
        Route::get('/laporanrekapitulasi', [LaporanController::class, 'laporanrekapitulasi'])->name('laporanRekapitulasi');
        Route::get('/laporanpembelian', [LaporanController::class, 'laporanpembelian'])->name('laporanPembelian');

        Route::get('/user', [UserController::class, 'index'])->name('userPage');
        Route::get('/user/tambah', [userController::class, 'create'])->name('userAdd');
        Route::post('/user/tambah', [userController::class, 'store'])->name('userStore');
        Route::get('/user/ubah/{id}', [userController::class, 'edit'])->name('userEdit');
        Route::put('/user/ubah/{id}', [userController::class, 'update'])->name('userUpdate');
        Route::delete('/user/hapus/{id}', [userController::class, 'destroy'])->name('userDelete');
    });
});
