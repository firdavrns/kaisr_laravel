<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/login', [AuthController::class, 'loginProcess'])->name('auth.login.process');
Route::get('/auth/logout', [AuthController::class, 'logoutProcess'])->name('auth.logout.process');

Route::middleware(['auth.custom'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::post('/produk/update', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/delete/{id}', [ProdukController::class, 'delete'])->name('produk.delete');

    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::post('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::post('/pelanggan/update', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::delete('/pelanggan/delete/{id}', [PelangganController::class, 'delete'])->name('pelanggan.delete');

    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::post('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
    Route::get('/pengguna/edit/{id}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::post('/pengguna/update', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/delete/{id}', [PenggunaController::class, 'delete'])->name('pengguna.delete');

    Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::post('/penjualan/store', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::get('/penjualan/new/{nota}', [PenjualanController::class, 'new'])->name('penjualan.new');

    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
});
