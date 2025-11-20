<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::post('/admin/users/store',[AdminController::class, 'usersP'])->name('users.store');
    Route::post('/admin/users/update/{id}', [AdminController::class, 'usersU'])->name('users.update');
    Route::get('/admin/users/delete/{id}', [AdminController::class, 'usersD'])->name('users.delete');

    Route::get('/admin/produk', [ProdukController::class, 'produk'])->name('admin.produk');
    Route::post('/admin/produk/store', [ProdukController::class, 'produkS'])->name('produk.store');
    Route::post('/admin/produk/update/{id}', [ProdukController::class, 'produkU'])->name('produk.update');
    Route::get('/admin/produk/delete/{id}', [ProdukController::class, 'produkD'])->name('produk.delete');

    Route::get('/admin/toko', [TokoController::class, 'toko'])->name('admin.toko');
    Route::post('/admin/toko/create', [TokoController::class, 'tokoS'])->name('toko.store');
    Route::put('/admin/toko/update/{id}', [TokoController::class, 'tokoU'])->name('toko.update');
    Route::get('/admin/toko/delete/{id}', [TokoController::class, 'tokoD'])->name('toko.delete');

    Route::get('/admin/kategori', [KategoriController::class, 'kategori'])->name('admin.kategori');
    Route::post('/admin/kategori/store', [KategoriController::class, 'kategoriS'])->name('kategori.store');
    Route::post('/admin/kategori/update/{id}', [KategoriController::class, 'kategoriU'])->name('kategori.update');
    Route::get('/admin/kategori/delete/{id}', [KategoriController::class, 'kategoriD'])->name('kategori.delete');

});

Route::middleware(['member'])->group(function(){

});

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/toko', [HomeController::class, 'toko'])->name('toko');
Route::get('/toko/{id}', [TokoController::class, 'detailT'])->name('toko.detail');

Route::get('/produk', [HomeController::class, 'produk'])->name('produk');
Route::get('/produk/{id}', [ProdukController::class, 'detailP'])->name('produk.detail');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login/auth', [UserController::class, 'auth'])->name('login.auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
