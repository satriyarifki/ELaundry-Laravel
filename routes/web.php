<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/utama', \App\Http\Livewire\Utama::class);
    Route::get('/customer', \App\Http\Livewire\Customer::class);
    Route::get('/express', \App\Http\Livewire\Express::class);
    Route::get('/extend', \App\Http\Livewire\Extend::class);
    Route::get('/transaksi', \App\Http\Livewire\Transaksi::class);
    
});
