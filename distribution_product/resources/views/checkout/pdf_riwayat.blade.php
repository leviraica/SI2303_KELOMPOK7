<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom, #f0f4f8, #d9e2ec);
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 40px;
            font-weight: 700;
        }

        .card {
            background-color: #ffffffcc;
            border: none;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 25px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background-color: #2c3e50;
            color: white;
            padding: 15px 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        .card-body p {
            margin-bottom: 8px;
            color: #333;
        }

        ul {
            padding-left: 20px;
        }

        ul li {
            margin-bottom: 6px;
        }
    </style>
</head>
<body>

    <h1>Riwayat Pembelian</h1>

    <div class="container">
        @foreach($riwayat as $pembelian)
            <div class="card">
                <div class="card-header">
                    {{ $pembelian['nama'] }} - {{ $pembelian['tanggal'] }}
                </div>
                <div class="card-body">
                    <p><strong>Alamat:</strong> {{ $pembelian['alamat'] }}</p>
                    <p><strong>Telepon:</strong> {{ $pembelian['telepon'] }}</p>
                    <p><strong>Metode Pembayaran:</strong> {{ ucfirst($pembelian['metode_pembayaran']) }}</p>

                    <h5 class="mt-3">Produk:</h5>
                    <ul>
                        @foreach($pembelian['items'] as $item)
                            <li>{{ $item['nama'] }} ({{ $item['jumlah'] }} x Rp {{ number_format($item['harga'], 0, ',', '.') }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>
