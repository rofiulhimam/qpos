<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\StaffController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/transaksi', [App\Http\Controllers\HomeController::class, 'transaksi'])->name('transaksi');
Route::get('/keuangan', [App\Http\Controllers\HomeController::class, 'keuangan'])->name('keuangan');
Route::get('/penjualan', [App\Http\Controllers\HomeController::class, 'penjualan'])->name('penjualan');

Route::group(['middleware' => ['auth']], function () {
    
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    // Kategori
    Route::get('/kategori', [App\Http\Controllers\CategoryController::class, 'index'])->name('kategori');
    Route::get('/form-kategori', [App\Http\Controllers\CategoryController::class, 'form_kategori'])->name('form-kategori');
    Route::match(['get', 'post', 'patch', 'delete'], '/kategori/crud', [CategoryController::class, 'categoryCrud'])->name('kategori_crud');

    // Inventori
    Route::get('/inventori', [App\Http\Controllers\InventoryController::class, 'index'])->name('inventori');
    Route::get('/form-inventori', [App\Http\Controllers\InventoryController::class, 'form_inventori'])->name('form-inventori');
    Route::match(['get', 'post', 'patch', 'delete'], '/inventori/crud', [InventoryController::class, 'inventoryCrud'])->name('inventori_crud');

    // Staff
    Route::get('/staff', [App\Http\Controllers\StaffController::class, 'index'])->name('staff');
    Route::get('/form-staff', [App\Http\Controllers\StaffController::class, 'form_staff'])->name('form-staff');
    Route::match(['get', 'post', 'patch', 'delete'], '/staff/crud', [StaffController::class, 'staffCrud'])->name('staff_crud');
});