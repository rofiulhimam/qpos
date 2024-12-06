<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/transaksi', [App\Http\Controllers\HomeController::class, 'transaksi'])->name('transaksi');
Route::get('/keuangan', [App\Http\Controllers\HomeController::class, 'keuangan'])->name('keuangan');
Route::get('/penjualan', [App\Http\Controllers\HomeController::class, 'penjualan'])->name('penjualan');
Route::get('/inventori', [App\Http\Controllers\HomeController::class, 'inventori'])->name('inventori');
Route::get('/add-inventori', [App\Http\Controllers\HomeController::class, 'add_inventori'])->name('add-inventori');
Route::get('/edit-inventori', [App\Http\Controllers\HomeController::class, 'edit_inventori'])->name('edit-inventori');
Route::get('/staff', [App\Http\Controllers\HomeController::class, 'staff'])->name('staff');
