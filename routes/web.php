<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('home');

Route::get('/admin/users', [AdminController::class, 'users'])->name('users');
Route::get('/admin/users/create',[AdminController::class, 'usersC'])->name('users.create');
Route::post('/admin/users/store',[AdminController::class, 'usersP'])->name('users.store');
Route::get('/admin/users/edit/{id}', [AdminController::class, 'usersE'])->name('users.edit');
Route::post('/admin/users/update/{id}', [AdminController::class, 'usersU'])->name('users.update');
Route::get('/admin/users/delete/{id}', [AdminController::class, 'usersD'])->name('users.delete');

Route::get('/admin/produk', [AdminController::class, 'produk'])->name('produk');

Route::get('/admin/toko', [AdminController::class, 'toko'])->name('toko');
