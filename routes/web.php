<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;

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

Route::get('/', [LandingPageController::class, 'index']);

Route::get('/login/admin', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/dashboard/barang', [BarangController::class, 'index'])->name('search');
// Route::get('/dashboard/barang/search', [BarangController::class, 'search'])->name('search');
Route::get('/dashboard/barang/{id}', [BarangController::class, 'category']);
Route::get('/dashboard/barang/create', [BarangController::class, 'create']);
Route::post('/dashboard/barang', [BarangController::class, 'store']);
Route::get('/dashboard/barang/edit/{product:id}', [BarangController::class, 'edit']);
Route::put('/dashboard/barang/{product:id}', [BarangController::class, 'update']);
Route::delete('/dashboard/barang/{product:id}', [BarangController::class, 'destroy']);



Route::get('/dashboard/riwayat', [RiwayatController::class, 'index']);

Route::get('/dashboard/saran', [SaranController::class, 'index']);
Route::post('/dashboard/saran', [SaranController::class, 'store']);
Route::delete('dashboard/saran/{saran:id}', [SaranController::class, 'destroy']);

Route::get('/dashboard/cart', [CartController::class, 'index']);
Route::post('/dashboard/cart/store', [CartController::class, 'store'])->name('store');
