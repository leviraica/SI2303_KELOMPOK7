<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function add(Request $request)
    {
        // Ambil data produk dari form
        $produk = [
            'id' => $request->input('id'),
            'nama' => $request->input('nama'),
            'harga' => $request->input('harga'),
            'jumlah' => $request->input('jumlah'),
        ];

        // Ambil keranjang yang sudah ada di session atau buat yang baru
        $keranjang = session()->get('keranjang', []);

        // Cek apakah produk sudah ada di keranjang
        $exists = false;
        foreach ($keranjang as &$item) {
            if ($item['id'] === $produk['id']) {
                $item['jumlah'] += $produk['jumlah'];
                $exists = true;
                break;
            }
        }

        // Jika produk belum ada di keranjang, tambahkan
        if (!$exists) {
            $keranjang[] = $produk;
        }

        // Simpan keranjang ke session
        session()->put('keranjang', $keranjang);

        return redirect()->route('keranjang.show');
    }

    public function show()
    {
        // Ambil data keranjang dari session
        $keranjang = session()->get('keranjang', []);
        return view('keranjang.show', compact('keranjang'));
    }

    public function hapus($index)
    {
        $keranjang = session()->get('keranjang', []);
        if (isset($keranjang[$index])) {
            unset($keranjang[$index]);
            // Reindex array setelah penghapusan
            $keranjang = array_values($keranjang);
            session()->put('keranjang', $keranjang);
        }

        return redirect()->route('keranjang.show');
    }

    public function checkout(Request $request)
    {
        // Mendapatkan produk yang dipilih
        $produk_terpilih = $request->input('produk_terpilih'); // Ini adalah array produk yang dipilih

        // Cek apakah ada produk yang dipilih
        if ($produk_terpilih) {
            $keranjang = session()->get('keranjang', []);
            $produkYangDipilih = [];

            foreach ($produk_terpilih as $index) {
                // Mengambil produk yang dipilih dari keranjang berdasarkan index
                if (isset($keranjang[$index])) {
                    $produkYangDipilih[] = $keranjang[$index];
                }
            }

            // Proses checkout dengan produk yang dipilih
            // Misalnya: buat order, simpan data ke database, dll.

            return view('checkout.index', ['keranjang' => $produkYangDipilih]);
        }

        // Jika tidak ada produk yang dipilih
        return redirect()->route('keranjang.show')->with('error', 'Pilih produk terlebih dahulu!');
    }

    public function update(Request $request, $index)
    {
        $keranjang = session()->get('keranjang', []);
        if (isset($keranjang[$index])) {
            $keranjang[$index]['jumlah'] = $request->jumlah;
            session()->put('keranjang', $keranjang);
        }

        return redirect()->route('keranjang.show');
    }


}
