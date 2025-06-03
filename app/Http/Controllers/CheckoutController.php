<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CheckoutController extends Controller
{
    public function index()
    {
        $keranjang = session()->get('keranjang', []);

        return view('checkout.index', compact('keranjang'));
    }

    public function proses(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|digits_between:10,15',
            'metode_pembayaran' => 'required|string',
        ]);

        $keranjang = session()->get('keranjang', []);
        if (empty($keranjang)) {
            return redirect()->route('checkout.index')->with('error', 'Keranjang Anda kosong.');
        }

        // --- PENGURANGAN STOK PRODUK (Tambahan) ---
        foreach ($keranjang as $item) {
            $product = Product::find($item['id']); 
            if ($product) {
                // Cek stok cukup
                if ($product->stock < $item['jumlah']) {
                    return redirect()->route('checkout.index')->with('error', "Stok produk {$product->name} tidak cukup!");
                }
                $product->stock -= $item['jumlah'];
                $product->save();
            }
        }
        // --- END PENGURANGAN STOK ---

        // Simpan data checkout ke session
        $riwayat = session()->get('riwayat_pembelian', []);
        $riwayat[] = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'metode_pembayaran' => $request->metode_pembayaran,
            'items' => $keranjang,
            'tanggal' => now()->format('d-m-Y H:i')
        ];
        session()->put('riwayat_pembelian', $riwayat);
        session()->forget('keranjang');

        return redirect()->route('riwayat.pembelian')->with('success', 'Checkout berhasil dan disimpan ke riwayat.');
    }

    public function riwayat()
    {
        // Ambil data riwayat dari session atau database
        $riwayat = session()->get('riwayat_pembelian', []);
        return view('checkout.riwayat', compact('riwayat'));
    }

    public function unduhRiwayat()
    {
        $riwayat = session()->get('riwayat_pembelian', []);
        $pdf = Pdf::loadView('checkout.pdf_riwayat', compact('riwayat'));
        return $pdf->download('riwayat_pembelian.pdf');

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

            return view('checkout', ['keranjang' => $produkYangDipilih]);
        }

        // Jika tidak ada produk yang dipilih
        return redirect()->route('keranjang.show')->with('error', 'Pilih produk terlebih dahulu!');
    }
}
