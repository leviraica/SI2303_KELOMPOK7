<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Mengambil semua produk
        return view('products.index', compact('products')); // Mengirim data ke view
    }

    public function create()
    {
        return view('products.create'); // Menampilkan form untuk menambah produk
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'distributor_id' => 'required|exists:distributors,id',
        ]);

        Product::create($request->all()); // Menyimpan produk baru
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!'); // Kembali ke daftar produk
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product')); // Menampilkan form untuk mengedit produk
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'distributor_id' => 'required|exists:distributors,id',
        ]);

        $product->update($request->all()); // Memperbarui data produk
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!'); // Kembali ke daftar produk
    }

    public function destroy(Product $product)
    {
        $product->delete(); // Menghapus produk
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!'); // Kembali ke daftar produk
    }

    public function show($id)
    {
        // Menampilkan detail produk berdasarkan ID
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}