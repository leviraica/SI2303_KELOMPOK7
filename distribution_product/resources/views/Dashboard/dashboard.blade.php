<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Nunito', sans-serif;
        }

        h1 {
            color: #0056b3;
            margin-bottom: 30px;
        }

        .container {
            max-width: 1200px;
        }

        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 18px;
        }

        .card-footer {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .distributor-logo {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #007bff;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#"><i class="bi bi-box-seam"></i> Distributor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Edit Profil</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <span class="nav-link text-white">Halo, {{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->

    <div class="container mt-5">
        <h1 class="text-center fw-bold"><i class="bi bi-truck"></i> Dashboard Distributor</h1>

        <!-- Tombol Lihat Keranjang -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('keranjang.show') }}" class="btn btn-secondary">
                <i class="bi bi-cart-fill"></i> Lihat Keranjang
            </a>
        </div>

        <!-- Daftar Distributor -->
        <div class="card mb-5">
            <div class="card-header">
                Daftar Distributor
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach($distributors as $distributor)
                        <div class="col">
                            <div class="card h-100 shadow-sm p-3">
                                <div class="text-center">
                                    <img src="https://via.placeholder.com/80" alt="Logo" class="distributor-logo">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $distributor->name }}</h5>
                                    <p class="card-text"><strong>Email:</strong> {{ $distributor->email }}</p>
                                    <p class="card-text"><strong>Alamat:</strong> {{ $distributor->address }}</p>
                                    <p class="card-text"><strong>Telepon:</strong> {{ $distributor->phone_number }}</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('distributor.products', $distributor->id) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-box-arrow-up-right"></i> Lihat Produk
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Riwayat Pembelian -->
        <div class="card mt-4">
            <div class="card-header">
                Riwayat Pembelian
            </div>
            <div class="card-body">
                <h5 class="card-title mb-3">Daftar Pembelian Anda</h5>
                @if($orders->isEmpty())
                    <p class="text-muted">Anda belum memiliki riwayat pembelian.</p>
                @else
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>Tanggal</th>
                                <th>Jumlah Barang</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $order->items_count }}</td>
                                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
