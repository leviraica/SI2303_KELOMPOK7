@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Keranjang Belanja</h2>

    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session()->get('error') }}</div>
    @endif

    @if (count($keranjang) > 0)
    <form action="{{ route('keranjang.checkout') }}" method="GET">
        <table class="table">
            <thead>
                <tr>
                    <th>Pilih</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keranjang as $index => $item)
                <tr>
                    <td>
                        <input type="checkbox" name="produk_terpilih[]" value="{{ $index }}">
                    </td>
                    <td>{{ $item['nama'] }}</td>
                    <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                    <td>{{ $item['jumlah'] }}</td>
                    <td>Rp {{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('keranjang.hapus', $index) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary mt-3">Pilih Produk untuk Checkout</button>
    </form>

    @else
        <div class="alert alert-warning">Keranjang Anda kosong!</div>
    @endif

    <!-- Tombol Kembali ke Dashboard Distributor -->
    <a href="{{ route('dashboard.index') }}" class="btn mt-3" style="background-color: #007bff; color: white;">
        ← Kembali ke Dashboard Distributor
    </a>

</div>
@endsection
