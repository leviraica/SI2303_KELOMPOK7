<?php

namespace App\Http\Controllers;
use App\Models\Product;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::all(); // Mengambil semua distributor
        return view('distributors.index', compact('distributors')); // Mengirim data ke view
    }

    public function create()
    {
        return view('distributors.create'); // Menampilkan form untuk menambah distributor
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]);

        Distributor::create($request->all()); // Menyimpan distributor baru
        return redirect()->route('distributors.index')->with('success', 'Distributor berhasil ditambahkan!'); // Kembali ke daftar distributor
    }

    public function edit(Distributor $distributor)
    {
        return view('distributors.edit', compact('distributor')); // Menampilkan form untuk mengedit distributor
    }

    public function update(Request $request, Distributor $distributor)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]);

        $distributor->update($request->all()); // Memperbarui data distributor
        return redirect()->route('distributors.index')->with('success', 'Distributor berhasil diperbarui!'); // Kembali ke daftar distributor
    }

    public function destroy(Distributor $distributor)
    {
        $distributor->delete(); // Menghapus distributor
        return redirect()->route('distributors.index')->with('success', 'Distributor berhasil dihapus!'); // Kembali ke daftar distributor
    }



    public function products($id)
    {
        // Cari distributor berdasarkan ID
        $distributor = Distributor::findOrFail($id);

        // Ambil produk yang terkait dengan distributor tersebut
        $products = Product::where('distributor_id', $id)->get();

        // Kirim data distributor dan produk ke view
        return view('distributors.products', compact('distributor', 'products'));
    }

}



