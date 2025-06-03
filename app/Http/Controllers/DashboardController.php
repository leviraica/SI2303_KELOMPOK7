<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;  // Pastikan ini ada
use App\Models\Product;      // Pastikan ini ada
use App\Models\UserRequest; 

class DashboardController extends Controller
{
    public function index()
    {
        $distributors = Distributor::all(); // Ambil semua distributor
        $products = Product::all(); // Ambil semua produk
        $userRequests = UserRequest::with(['product', 'distributor'])->get();

        $user = auth()->user();
        $orders = $user ? $user->orders : collect();

        // Kirim data ke view dashboard
        return view('dashboard.dashboard', compact('distributors', 'products', 'userRequests', 'orders'));
    }
}
