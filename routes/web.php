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

    // tabel produk
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk/save', [ProdukController::class, 'save'])->name('produk.save');
    Route::get('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::post('/produk/edit', [ProdukController::class, 'edit']);
    Route::get('/produk/delete/{id}', [ProdukController::class, 'delete'])->name('produk.delete');
    
    // tabel pelanggan
    Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('/pelanggan/save', [PelangganController::class, 'save'])->name('pelanggan.save');
    Route::get('/pelanggan/update/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::post('/pelanggan/edit', [PelangganController::class, 'edit']);
    Route::get('/pelanggan/delete/{id}', [PelangganController::class, 'delete'])->name('pelanggan.delete');
    
    // tabel penjualan
    Route::get('/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::post('/penjualan/save', [PenjualanController::class, 'save'])->name('penjualan.save');
    Route::get('/penjualan/update/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::post('/penjualan/edit', [PenjualanController::class, 'edit']);
    Route::get('/penjualan/delete/{id}', [PenjualanController::class, 'delete'])->name('penjualan.delete');
});

require __DIR__.'/auth.php';
