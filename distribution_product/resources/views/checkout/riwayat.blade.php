@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Riwayat Pembelian</h1>

    @if(count($riwayat) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Metode Pembayaran</th>
                    <th>Detail Pembelian</th>
                </tr>
            </thead>
            <tbody>
                @foreach($riwayat as $pembelian)
                <tr>
                    <td>{{ $pembelian['tanggal'] }}</td>
                    <td>{{ $pembelian['nama'] }}</td>
                    <td>{{ $pembelian['alamat'] }}</td>
                    <td>{{ $pembelian['telepon'] }}</td>
                    <td>{{ $pembelian['metode_pembayaran'] }}</td>
                    <td>
                        <ul>
                            @foreach($pembelian['items'] as $item)
                                <li>{{ $item['nama'] }} - {{ $item['jumlah'] }} x Rp {{ number_format($item['harga'], 0, ',', '.') }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Riwayat pembelian Anda kosong.</p>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('checkout.unduhRiwayat') }}" class="btn btn-success">Unduh Riwayat Pembelian (PDF)</a>
    </div>

     <!-- Tombol Kembali ke Dashboard -->
     <div class="text-center mt-4">
        <a href="{{ route('dashboard.index') }}" class="btn btn-primary">⬅ Kembali ke Dashboard</a>
    </div>
</div>
@endsection
