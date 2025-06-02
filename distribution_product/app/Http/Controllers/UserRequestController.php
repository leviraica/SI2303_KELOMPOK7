<?php

namespace App\Http\Controllers;

use App\Models\UserRequest;
use App\Models\Product;
use App\Models\Distributor;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    public function index()
    {
        $requests = UserRequest::all(); // Mengambil semua permintaan
        return view('requests.index', compact('requests')); // Mengirim data ke view
    }

    public function create()
    {
        $products = Product::all(); // Mengambil semua produk untuk dropdown
        return view('requests.create', compact('products')); // Menampilkan form untuk menambah permintaan
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
        ]);

        UserRequest::create($request->all()); // Menyimpan permintaan baru
        return redirect()->route('user-requests.index')->with('success', 'Permintaan berhasil ditambahkan!'); // Kembali ke daftar permintaan
    }

    public function edit(UserRequest $userRequest)
    {
        $products = Product::all(); // Mengambil semua produk untuk dropdown
        return view('requests.edit', compact('userRequest', 'products')); // Menampilkan form untuk mengedit permintaan
    }

    public function update(Request $request, UserRequest $userRequest)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
        ]);

        $userRequest->update($request->all()); // Memperbarui data permintaan
        return redirect()->route('user-requests.index')->with('success', 'Permintaan berhasil diperbarui!'); // Kembali ke daftar permintaan
    }

    public function destroy(UserRequest $userRequest)
    {
        $userRequest->delete(); // Menghapus permintaan
        return redirect()->route('user-requests.index')->with('success', 'Permintaan berhasil dihapus!'); // Kembali ke daftar permintaan
    }
}