<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

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
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 24px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #007bff;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#"><i class="bi bi-shield-lock"></i> Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.distributors.index') }}">Kelola Distributor</a>
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
        <h1 class="text-center fw-bold"><i class="bi bi-speedometer2"></i> Dashboard Admin</h1>

        <!-- Statistik -->
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
            <!-- Card Distributor -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div class="stats-icon bg-primary bg-opacity-10 text-primary mx-auto">
                            <i class="bi bi-building"></i>
                        </div>
                        <h5 class="card-title">Total Distributor</h5>
                        <h2 class="mb-0">{{ $distributorCount ?? 0 }}</h2>
                    </div>
                </div>
            </div>

            <!-- Card Produk -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div class="stats-icon bg-success bg-opacity-10 text-success mx-auto">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h5 class="card-title">Total Produk</h5>
                        <h2 class="mb-0">{{ $productCount ?? 0 }}</h2>
                    </div>
                </div>
            </div>

            <!-- Card Customer -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div class="stats-icon bg-info bg-opacity-10 text-info mx-auto">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="card-title">Total Customer</h5>
                        <h2 class="mb-0">{{ $customerCount ?? 0 }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daftar Distributor Terbaru -->
        <div class="card mb-5">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Distributor Terbaru</span>
                <a href="{{ route('admin.distributors.index') }}" class="btn btn-sm btn-light">
                    <i class="bi bi-eye"></i> Lihat Semua
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Jumlah Produk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentDistributors ?? [] as $distributor)
                                <tr>
                                    <td>{{ $distributor->name }}</td>
                                    <td>{{ $distributor->address }}</td>
                                    <td>{{ $distributor->phone }}</td>
                                    <td>{{ $distributor->products_count }}</td>
                                    <td>
                                        <a href="{{ route('admin.distributors.edit', $distributor) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Belum ada distributor</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 