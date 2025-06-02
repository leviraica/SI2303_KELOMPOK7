<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk {{ $distributor->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fc; /* warna abu terang */
            background-image: 
                radial-gradient(circle, #a4cafe 1px, transparent 0); /* warna biru muda */
            background-size: 24px 24px; /* jarak antar titik */
            background-position: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
        }

        h2 {
            color: #004085;
            font-weight: bold;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: 0.3s;
            background-color: #ffffffcc;
            border-radius: 8px;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            color: #333;
        }

        .btn-success {
            width: 100%;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-success:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .text-muted {
            color: #6c757d !important;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Produk dari {{ $distributor->name }}</h2>

        <!-- Tombol Kembali -->
        <div class="mb-4">
            <a href="{{ route('dashboard.index') }}" class="btn btn-primary">← Kembali ke Dashboard</a>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @forelse ($products as $product)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="card-text"><strong>Stok:</strong> {{ $product->stock }}</p>
                            @if (!empty($product->description))
                                <p class="card-text">{{ $product->description }}</p>
                            @endif
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <form method="POST" action="{{ route('keranjang.tambah') }}">
                                @csrf
                                <input type="hidden" name="nama" value="{{ $product->name }}">
                                <input type="hidden" name="harga" value="{{ $product->price }}">
                                <input type="number" name="jumlah" value="1" min="1" max="{{ $product->stock }}">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-success">+ Tambah ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Tidak ada produk tersedia dari distributor ini.</p>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
