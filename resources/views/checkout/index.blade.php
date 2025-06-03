@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="text-center mb-4">
        <h1 class="display-5 fw-bold text-primary">🛒 Halaman Checkout</h1>
        <p class="text-muted">Pastikan data pesanan dan pengiriman Anda benar</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ✅ {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            ❌ {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Produk dalam Keranjang -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">🧺 Produk dalam Keranjang</h5>
        </div>
        <div class="card-body">
            @if(isset($keranjang) && count($keranjang) > 0)
                <table class="table table-hover">
                    <thead class="table-light">
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
                            <td><span class="fw-semibold">{{ $item['nama'] }}</span></td>
                            <td><span class="badge bg-info text-dark">{{ $item['jumlah'] }}</span></td>
                            <td>Rp {{ number_format($item['harga'], 2, ',', '.') }}</td>
                            <td class="text-success fw-bold">Rp {{ number_format($item['jumlah'] * $item['harga'], 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-danger">Keranjang Anda kosong.</p>
            @endif
        </div>
    </div>

    <!-- Formulir Pengiriman -->
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">📦 Data Pengiriman</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('checkout.proses') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">👤 Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">🏠 Alamat Pengiriman</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">📞 Nomor Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" required>
                </div>
                <div class="mb-4">
                    <label for="metode_pembayaran" class="form-label">💳 Metode Pembayaran</label>
                    <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" required>
                        <option value="">-- Pilih Metode --</option>
                        <option value="transfer_bank">Transfer Bank</option>
                        <option value="cod">Cash on Delivery (COD)</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-lg btn-primary w-100">
                    🔒 Konfirmasi Pembelian
                </button>
            </form>
        </div>
    </div>
</div>
@endsection