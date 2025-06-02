@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $product->name }}</h1>

        <div class="card">
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
            <div class="card-body">
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali ke Daftar Produk</a>
            </div>
        </div>
    </div>
@endsection
