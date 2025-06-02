<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Distributor $distributor)
    {
        $products = $distributor->products;
        return view('admin.distributors.products.index', compact('distributor', 'products'));
    }

    public function create(Distributor $distributor)
    {
        return view('admin.distributors.products.form', compact('distributor'));
    }

    public function store(Request $request, Distributor $distributor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $distributor->products()->create($validated);

        return redirect()
            ->route('admin.distributors.products.index', $distributor)
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Distributor $distributor, Product $product)
    {
        return view('admin.distributors.products.form', compact('distributor', 'product'));
    }

    public function update(Request $request, Distributor $distributor, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($validated);

        return redirect()
            ->route('admin.distributors.products.index', $distributor)
            ->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Distributor $distributor, Product $product)
    {
        $product->delete();

        return redirect()
            ->route('admin.distributors.products.index', $distributor)
            ->with('success', 'Produk berhasil dihapus');
    }
}