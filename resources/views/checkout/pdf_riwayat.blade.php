<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Riwayat Pembelian</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            padding: 30px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 40px;
            font-weight: 700;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .card {
            background-color: #ffffffcc;
            border: none;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 25px;
            padding: 0;
        }

        /* Hilangkan hover transform karena PDF gak support */
        /* .card:hover {
            transform: translateY(-5px);
        } */

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
