<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'distributorCount' => Distributor::count(),
            'productCount' => Product::count(),
            'customerCount' => User::where('role', 'customer')->count(),
            'recentDistributors' => Distributor::withCount('products')
                ->latest()
                ->take(5)
                ->get()
        ];

        return view('admin.dashboard', $data);
    }
}