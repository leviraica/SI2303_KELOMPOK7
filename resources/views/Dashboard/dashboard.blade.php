<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet" />

    <style>
        body {
            background-color: #f8f9fa;
            background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='1' cy='1' r='1' fill='%2390caf9'/%3E%3C/svg%3E");
            font-family: 'Nunito', sans-serif;
            min-height: 100vh;
        }

        h1 {
            color: #0056b3;
            margin-bottom: 30px;
        }

        .container {
            max-width: 1200px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 18px;
            border-radius: 15px 15px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .card-footer {
            background-color: #f8f9fa;
            padding: 15px;
            text-align: center;
            border-radius: 0 0 15px 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #004a99;
            border-color: #004a99;
            box-shadow: 0 0 8px #004a99;
        }

        .btn-secondary {
            min-width: 160px;
        }

        /* --- Custom style for Keranjang Button --- */
        .btn-keranjang-blue {
            background: linear-gradient(90deg, #33aaff 0%, #007bff 100%);
            color: #fff;
            font-weight: bold;
            border: none;
            box-shadow: 0 4px 16px rgba(0,123,255,0.18);
            border-radius: 999px;
            padding: 12px 28px;
            transition: transform 0.18s, box-shadow 0.18s;
            position: relative;
            font-size: 1.1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        .btn-keranjang-blue:hover {
            background: linear-gradient(90deg, #007bff 0%, #0056b3 100%);
            transform: scale(1.05);
            box-shadow: 0 8px 28px rgba(0,123,255,0.27);
        }
        .btn-keranjang-blue .badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #ff4757;
            color: #fff;
            font-size: 0.9rem;
            padding: 4px 8px;
            border-radius: 999px;
        }

        @media (max-width: 991.98px) {
            .container {
                max-width: 98%;
            }
        }

        @media (max-width: 767.98px) {
            .card-body {
                padding: 12px;
            }
            h1 {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #007bff;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#"><i class="bi bi-box-seam"></i> Distribution Product</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Bisa ditambah menu lain di sini jika perlu -->
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
        <h1 class="text-center fw-bold"><i class="bi bi-box-seam"></i> Dashboard Distributor</h1>

        <!-- Tombol Lihat Keranjang -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('keranjang.show') }}" class="btn btn-keranjang-blue">
                <i class="bi bi-cart-fill fs-5"></i>
                <span>Lihat Keranjang</span>
                @if(isset($jumlahKeranjang) && $jumlahKeranjang > 0)
                    <span class="badge">{{ $jumlahKeranjang }}</span>
                @endif
            </a>
        </div>

        <!-- Daftar Distributor -->
        <div class="card mb-5">
            <div class="card-header">
                Daftar Distributor
            </div>
            <div class="card-body">
                @if($distributors->isEmpty())
                    <div class="text-center text-muted">Belum ada distributor tersedia.</div>
                @else
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach($distributors as $distributor)
                        <div class="col">
                            <div class="card h-100 shadow-sm p-3">
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
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
