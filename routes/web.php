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

Route::get('/', function () {
    return view('login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('tagihan', \App\Http\Controllers\TagihanController::class);
    Route::resource('pembayaran', \App\Http\Controllers\PembayaranController::class);
    Route::post('laporanPembayaran', [\App\Http\Controllers\PembayaranController::class,'report'])->name('pembayaran.report');
    Route::post('filterPembayaran', [\App\Http\Controllers\PembayaranController::class,'filter'])->name('pembayaran.filter');
    Route::post('laporanTagihan', [\App\Http\Controllers\TagihanController::class,'report'])->name('tagihan.report');
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('role', \App\Http\Controllers\RoleController::class);


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/getData', [App\Http\Controllers\HomeController::class, 'getData'])->name('count.notifikasi');
    Route::post('/mark-as-read', [App\Http\Controllers\HomeController::class, 'markNotification'])->name('markNotification');
});

