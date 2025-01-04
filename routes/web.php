<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TransactionController;
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

Route::group(['middleware' => ['auth']], function () {
    // POS
    Route::get('/pos', [App\Http\Controllers\TransactionController::class, 'pos'])->name('pos');
    Route::post('/transactions/store', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/transaksi', [App\Http\Controllers\TransactionController::class, 'transaksi'])->name('transaksi');
    Route::get('/transactions/{id}', [TransactionController::class, 'getTransactionDetails']);
    Route::post('/transactions/filter', [TransactionController::class, 'filterTransactions'])->name('transactions.filter');
    
    Route::get('/struk', [TransactionController::class, 'struk'])->name('struk');
    Route::get('/struk-id', [TransactionController::class, 'strukWithId'])->name('struk_with_id');
    Route::get('/penjualan/data/{period}', [SaleController::class, 'getSalesData']);
    Route::get('/keuangan', [App\Http\Controllers\FinanceController::class, 'index'])->name('keuangan');
    Route::get('/penjualan', [App\Http\Controllers\SaleController::class, 'index'])->name('penjualan');
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