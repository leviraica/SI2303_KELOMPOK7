@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Produk</h1>

        @if($products->isEmpty())
            <p>Produk tidak ditemukan.</p>
        @else
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
