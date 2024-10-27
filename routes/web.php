<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login-proses', [LoginController::class,'login_proses'])->name('login_proses');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');


Route::get('/buku', [BukuController::class,'index'])->name('buku.index');
Route::delete('/buku/{id}', 
[BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/buku/create', 
[BukuController::class, 'create'])->name('buku.create');
Route::post('/buku/store', 
[BukuController::class,'store'])->name('buku.store');
Route::get('/buku/{id}/edit', 
[BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])
->name('buku.update');
