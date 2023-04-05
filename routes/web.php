<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserSaranController;
use App\Http\Controllers\UserBarangController;
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
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/barang', [UserBarangController::class, 'index'])->name('usearch');
Route::get('/barang/{id}', [UserBarangController::class, 'category']);

// User Interface
Route::group(['middleware' => ['auth:user']], function () {
    Route::get('/keranjang', [CartController::class, 'index']);
    Route::post('/cart/store', [CartController::class, 'store'])->name('ustore');
    Route::delete('/cart/{cart:id}', [CartController::class, 'destroy'])->name('udesroy');
    Route::put('/cart/plus/{cart:id}', [CartController::class, 'tambahQty'])->name('tambah-qty');
    Route::put('/cart/min/{cart:id}', [CartController::class, 'kurangQty'])->name('kurang-qty');

    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout');

    Route::get('/saran', [UserSaranController::class, 'index']);
    Route::post('/saran', [UserSaranController::class, 'store']);

    Route::get('/riwayat', [RiwayatController::class, 'index']);
});



// Admin Interface
Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/dashboard/barang', [BarangController::class, 'index'])->name('search');
    Route::get('/dashboard/barang/{id}', [BarangController::class, 'category']);
    Route::get('/dashboard/create', [BarangController::class, 'create']);
    Route::post('/dashboard/barang', [BarangController::class, 'store'])->name('store');
    Route::get('/dashboard/barang/edit/{product:id}', [BarangController::class, 'edit']);
    Route::put('/dashboard/barang/{product:id}', [BarangController::class, 'update']);
    Route::delete('/dashboard/barang/{product:id}', [BarangController::class, 'destroy']);

    Route::get('/dashboard/riwayat', [RiwayatController::class, 'indexAdmin']);
    Route::get('/dashboard/riwayat/cetak-Riwayat/{days}', [RiwayatController::class, 'cetakRiwayat'])->name("cetak-Riwayat");
    route::get('/dashboard/riwayat/cetak-detail/{history:id}', [RiwayatController::class, 'cetakDetail'])->name("cetakDetail");
    Route::delete('/dashboard/riwayat/{history:id}', [RiwayatController::class, 'destroy']);


    Route::get('/dashboard/carousel', [CarouselController::class, 'index']);
    Route::get('/dashboard/carousel/create', [CarouselController::class, 'create']);
    Route::post('/dashboard/carousel', [CarouselController::class, 'store']);
    Route::delete('/dashboard/carousel/{carousel:id}', [CarouselController::class, 'destroy']);

    Route::get('/dashboard/saran', [SaranController::class, 'index']);
    Route::get('/dashboard/saran/cetak-saran', [SaranController::class, 'cetakSaran'])->name("cetak-saran");
    Route::post('/dashboard/saran', [SaranController::class, 'store']);
    Route::delete('dashboard/saran/{saran:id}', [SaranController::class, 'destroy']);

    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/dashboard/admin/tambah', [AdminController::class, 'create'])->name('tAdmin');
    Route::post('/dashboard/admin/', [AdminController::class, 'store'])->name('tambah-Admin');
    Route::delete('/dashboard/admin/{admin:id}', [AdminController::class, 'destroy'])->name('delete-admin');
});
