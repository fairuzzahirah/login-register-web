<?php

use Illuminate\Support\Facades\Route;
use App\Models;
use Illuminate\Support\Facades\Mail;
use App\Http\Middleware;
use App\Mail\UserRegistered;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;


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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('/welcome');
});

// Routes for login and register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register_proses');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login_proses');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


    Route::group(['middleware' => ['admin']], function () {
        Route::get('/buku/create', [AdminController::class, 'create'])->name('buku.create');
        Route::post('/buku/store', [AdminController::class, 'store'])->name('buku.store');
        Route::get('/buku/{id}/edit', [AdminController::class, 'edit'])->name('buku.edit');
        Route::put('/buku/{id}', [AdminController::class, 'update'])->name('buku.update');
        Route::delete('/buku/{id}', [AdminController::class, 'destroy'])->name('buku.destroy');
        Route::get('/users', [UserController::class, 'index']);

    });
});

