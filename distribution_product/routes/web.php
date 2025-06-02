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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
Route::view('/register', 'register.registrasi');
Route::post('register', [AuthController::class, 'registerProcess']);

// Route untuk tampilan welcome (gunakan halaman dashboard)
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

// Route untuk Distributor
Route::resource('distributors', DistributorController::class);

// Route untuk Product
Route::resource('products', ProductController::class);

// Route untuk Request
Route::resource('user-requests', UserRequestController::class);

// Route untuk login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login/process', [AuthController::class, 'login']);

// Routes yang hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {
    // Route untuk logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route untuk dashboard yang benar menggunakan OrderController
    Route::get('/dashboard', [OrderController::class, 'index'])->name('dashboard');
    // Route untuk riwayat pesanan (menampilkan daftar order user)
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    // Route untuk menyimpan order baru (biasanya dari checkout)
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

    // Route untuk melihat detail satu order
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

// Route untuk distributor products
Route::get('/distributor/{id}/products', [DistributorController::class, 'products'])->name('distributor.products');


// Route untuk keranjang
Route::get('/keranjang', [KeranjangController::class, 'show'])->name('keranjang.show');
Route::post('/keranjang/tambah', [KeranjangController::class, 'add'])->name('keranjang.tambah');
Route::delete('/keranjang/{index}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
Route::put('/keranjang/{index}', [KeranjangController::class, 'update'])->name('keranjang.update');
// Tambahkan route untuk checkout
Route::get('/keranjang/checkout', [KeranjangController::class, 'checkout'])->name('keranjang.checkout');
// Route untuk checkout
// Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
// Route::post('/checkout', [CheckoutController::class, 'proses'])->name('checkout.proses');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'proses'])->name('checkout.proses');
Route::post('/checkout', [KeranjangController::class, 'checkout'])->name('checkout.index');


Route::post('/checkout/proses', [CheckoutController::class, 'proses'])->name('checkout.proses');
Route::get('/checkout/riwayat', [CheckoutController::class, 'riwayat'])->name('riwayat.pembelian');
Route::post('/keranjang/checkout', [CheckoutController::class, 'checkout'])->name('keranjang.checkout');


// Route untuk riwayat pembelian
Route::get('/riwayat-pembelian', [CheckoutController::class, 'riwayat'])->name('riwayat.pembelian');

// Route untuk halaman Dashboard Distributor
Route::get('/distributor/{id}', [DistributorController::class, 'showDashboard'])->name('distributor.dashboard');

// Route untuk menampilkan daftar distributor
Route::get('/distributor', [DistributorController::class, 'index'])->name('distributor.index');

// Route untuk menampilkan daftar produk (produk untuk public)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/checkout/unduh-riwayat', [CheckoutController::class, 'unduhRiwayat'])->name('checkout.unduhRiwayat');



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
