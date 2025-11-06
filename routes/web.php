<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('home');

Route::get('/admin/users', [AdminController::class, 'users'])->name('users');

Route::get('/admin/produk', [AdminController::class, 'produk'])->name('produk');

Route::get('/admin/toko', [AdminController::class, 'toko'])->name('toko');
