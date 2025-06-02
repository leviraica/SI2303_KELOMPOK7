@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Halaman Checkout</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
        {{ session('error') }}
        </div>
    @endif


    <!-- Menampilkan Produk di Keranjang -->
    <h3>Produk dalam Keranjang</h3>

    @if(isset($keranjang) && count($keranjang) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($keranjang as $item)
                <tr>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['jumlah'] }}</td>
                    <td>Rp {{ number_format($item['harga'], 2, ',', '.') }}</td>
                    <td>Rp {{ number_format($item['jumlah'] * $item['harga'], 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Keranjang Anda kosong.</p>
    @endif

    <!-- Formulir Pengisian Data Pembeli -->
    <h3>Data Pengiriman</h3>
    <form action="{{ route('checkout.proses') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat Pengiriman</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="telepon">Nomor Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" required>
        </div>

        <!-- Pilih Metode Pembayaran -->
        <div class="form-group">
            <label for="metode_pembayaran">Metode Pembayaran</label>
            <select class="form-control" id="metode_pembayaran" name="metode_pembayaran" required>
                <option value="transfer_bank">Transfer Bank</option>
                <option value="cod">Cash on Delivery (COD)</option>
            </select>
        </div>

        <!-- Tombol Konfirmasi Pembelian -->
        <button type="submit" class="btn btn-primary">Konfirmasi Pembelian</button>
    </form>
</div>
@endsection
