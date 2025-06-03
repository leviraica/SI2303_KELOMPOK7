@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">🧾 Riwayat Pembelian</h1>

    @if(count($riwayat) > 0)
        <div class="row">
            @foreach($riwayat as $pembelian)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-primary text-white fw-bold">
                        {{ $pembelian['nama'] }} <span class="float-end">{{ $pembelian['tanggal'] }}</span>
                    </div>
                    <div class="card-body">
                        <p><strong>📍 Alamat:</strong> {{ $pembelian['alamat'] }}</p>
                        <p><strong>📞 Telepon:</strong> {{ $pembelian['telepon'] }}</p>
                        <p><strong>💳 Metode Pembayaran:</strong> {{ ucfirst($pembelian['metode_pembayaran']) }}</p>

                        <h6 class="mt-3 fw-semibold">🛒 Produk Dibeli:</h6>
                        <ul class="ps-3">
                            @foreach($pembelian['items'] as $item)
                                <li>{{ $item['nama'] }} ({{ $item['jumlah'] }} x Rp {{ number_format($item['harga'], 0, ',', '.') }})</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center">
            Riwayat pembelian Anda masih kosong.
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('checkout.unduhRiwayat') }}" class="btn btn-success">
            ⬇ Unduh Riwayat Pembelian (PDF)
        </a>
        <a href="{{ route('dashboard.index') }}" class="btn btn-primary ms-2">
            ⬅ Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
