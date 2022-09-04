<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [\App\Http\Controllers\TransaksiPembelianController::class,'index'])->name('transaksi.index');
Route::get('/transaksi/create', [\App\Http\Controllers\TransaksiPembelianController::class,'create'])->name('transaksi.create');
Route::post('/transaksi/store', [\App\Http\Controllers\TransaksiPembelianController::class,'store'])->name('transaksi.store');
Route::post('/transaksi/storetransaksi', [\App\Http\Controllers\TransaksiPembelianController::class,'storetransaksi'])->name('transaksi.storetransaksi');
Route::get('/transaksi/daftartransaksi', [\App\Http\Controllers\TransaksiPembelianController::class,'daftartransaksi'])->name('transaksi.daftartransaksi');

Route::get('/transaksi/action', [\App\Http\Controllers\TransaksiPembelianController::class, 'action'])->name('transaksi.action');