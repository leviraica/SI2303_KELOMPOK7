@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
    <h2 class="mb-4" style="
        color: #007bff; 
        font-weight: 700; 
        font-size: 2.5rem; 
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        border-bottom: 3px solid #007bff;
        padding-bottom: 10px;
        letter-spacing: 1.5px;
    ">
        Keranjang Belanja

    </h2>

    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session()->get('error') }}</div>
    @endif

    @if (count($keranjang) > 0)
        <form action="{{ route('keranjang.checkout') }}" method="GET">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Pilih</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Aksi</th>
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
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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

    <a href="{{ route('dashboard.index') }}" class="btn mt-3" style="background-color: #007bff; color: white;">
        ← Kembali ke Dashboard Distributor
    </a>
@endsection
