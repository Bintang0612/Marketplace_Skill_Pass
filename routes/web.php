<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('member.home');
})->name('home');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/admin/users', [AdminController::class, 'users'])->name('users');
    Route::get('/admin/users/create',[AdminController::class, 'usersC'])->name('users.create');
    Route::post('/admin/users/store',[AdminController::class, 'usersP'])->name('users.store');
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'usersE'])->name('users.edit');
    Route::post('/admin/users/update/{id}', [AdminController::class, 'usersU'])->name('users.update');
    Route::get('/admin/users/delete/{id}', [AdminController::class, 'usersD'])->name('users.delete');

    Route::get('/admin/produk', [AdminController::class, 'produk'])->name('produk');

    Route::get('/admin/toko', [AdminController::class, 'toko'])->name('toko');
});

Route::middleware(['member'])->group(function(){
    Route::get('/member/logout', [UserController::class, 'logoutM'])->name('logout.member');
});

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login/auth', [UserController::class, 'auth'])->name('login.auth');
