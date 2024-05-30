<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\TransaksiController;
use Database\Seeders\KategoriSeeder;
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

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/detail/{barang}', [FrontController::class, 'detail'])->name('detail');
Route::get('/kategori/{kategori}', [FrontController::class, 'kategori'])->name('kategori');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/pesanan/{pelanggan}', [FrontController::class, 'pesanan'])->name('pesanan')->middleware('auth');
Route::post('/pesanan/{pelanggan}/bayar', [FrontController::class, 'bayar'])->name('pesanan.bayar')->middleware('auth');
Route::post('/pesanan/{transaksi}/terima', [FrontController::class, 'terima'])->name('pesanan.terima')->middleware('auth');
Route::post('/pesanan/{transaksi}/review', [FrontController::class, 'review'])->name('pesanan.review')->middleware('auth');
Route::delete('/pesanan/{transaksi}/hapus', [FrontController::class, 'hapus'])->name('pesanan.hapus')->middleware('auth');

Route::get('/beli/{barang}', [TransaksiController::class, 'index'])->name('beli.index')->middleware('auth');
Route::post('/beli', [TransaksiController::class, 'store'])->name('beli.store')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/dashboard/pelanggan', PelangganController::class);
    Route::resource('/dashboard/rekening', RekeningController::class);
    Route::resource('/dashboard/kategori', KategoriController::class);
    Route::resource('/dashboard/barang', BarangController::class);
});
