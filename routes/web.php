<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PendapatanController;

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

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    // route
    Route::get('penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::get('produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    // tabel user
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // tabel penjualan
    Route::get('/create/penjualan', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::post('/store/penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::get('/update/penjualan/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::post('/edit', [PenjualanController::class, 'edit'])->name('penjualan.edit');
    Route::get('/delete/{id}', [PenjualanController::class, 'delete'])->name('penjualan.delete');

    // tabel produk
    Route::get('/create/produk', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/store/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/update/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::post('/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::get('/delete/{id}', [ProdukController::class, 'delete'])->name('produk.delete');

    // tabel pelanggan
    Route::get('/create/pelanggan', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('/store/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('/update/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::post('/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::get('/delete/{id}', [PelangganController::class, 'delete'])->name('pelanggan.delete');
});

require __DIR__.'/auth.php';
