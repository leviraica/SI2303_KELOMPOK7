<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserRequestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DistributorController as AdminDistributorController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

// Route untuk login dan register tetap dapat diakses publik
Route::view('/register', 'register.registrasi');
Route::post('register', [AuthController::class, 'registerProcess']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login/process', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk customer
Route::middleware(['auth', 'customer'])->group(function () {
    // Dashboard customer
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Route untuk keranjang
    Route::get('/keranjang', [KeranjangController::class, 'show'])->name('keranjang.show');
    Route::post('/keranjang/tambah', [KeranjangController::class, 'add'])->name('keranjang.tambah');
    Route::delete('/keranjang/{index}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
    Route::put('/keranjang/{index}', [KeranjangController::class, 'update'])->name('keranjang.update');
    Route::get('/keranjang/checkout', [KeranjangController::class, 'checkout'])->name('keranjang.checkout');

    // Route untuk checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'proses'])->name('checkout.proses');
    Route::get('/checkout/riwayat', [CheckoutController::class, 'riwayat'])->name('riwayat.pembelian');
    Route::get('/checkout/unduh-riwayat', [CheckoutController::class, 'unduhRiwayat'])->name('checkout.unduhRiwayat');
    

    // Route untuk order
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
});

// Route untuk admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('distributors', AdminDistributorController::class);
    Route::resource('distributors.products', AdminProductController::class);
});

// Route untuk Distributor
Route::resource('distributors', DistributorController::class);

// Route untuk Product
Route::resource('products', ProductController::class);

// Route untuk Request
Route::resource('user-requests', UserRequestController::class);

// Route untuk distributor products
Route::get('/distributor/{id}/products', [DistributorController::class, 'products'])->name('distributor.products');
