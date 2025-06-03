@extends('layouts.app')

@section('title', 'Produk ' . $distributor->name)

@section('content')

    {{-- Tombol kembali full ke kiri layar --}}
    <div class="container-fluid mb-3" style="padding-left: 15px;">
        <a href="{{ route('dashboard.index') }}" class="btn btn-primary">← Kembali ke Dashboard</a>
    </div>

    {{-- Konten produk pakai container biasa --}}
    <div class="container py-4">

        <h2 style="
            color: #007bff; 
            font-weight: 700; 
            font-size: 2.5rem; 
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
            letter-spacing: 1.5px;
            text-align: center;
            margin-bottom: 40px;
        ">
            Produk dari {{ $distributor->name }}
        </h2>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @forelse ($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm" style="border-radius: 10px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="card-text"><strong>Stok:</strong> {{ $product->stock }}</p>
                            @if (!empty($product->description))
                                <p class="card-text text-muted">{{ $product->description }}</p>
                            @endif
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center bg-transparent border-0">
                            <form method="POST" action="{{ route('keranjang.tambah') }}" class="d-flex align-items-center w-100">
                                @csrf
                                <input type="hidden" name="nama" value="{{ $product->name }}">
                                <input type="hidden" name="harga" value="{{ $product->price }}">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="number" name="jumlah" value="1" min="1" max="{{ $product->stock }}" class="form-control me-2" style="width: 70px;">
                                <button type="submit" class="btn btn-success">+ Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="empty-message text-center mt-5 fst-italic text-secondary">Tidak ada produk tersedia dari distributor ini.</p>
            @endforelse
        </div>
    </div>

@endsection
