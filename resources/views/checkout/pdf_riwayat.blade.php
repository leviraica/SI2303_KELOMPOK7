<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1, h3 {
            text-align: center;
        }
        .card {
            border: 1px solid #ddd;
            margin-bottom: 15px;
            padding: 15px;
        }
        .card-header {
            font-weight: bold;
            font-size: 1.2em;
        }
    </style>
</head>
<body>

    <h1>Riwayat Pembelian</h1>

    @foreach($riwayat as $pembelian)
        <div class="card">
            <div class="card-header">
                <strong>{{ $pembelian['nama'] }}</strong> - {{ $pembelian['tanggal'] }}
            </div>
            <div class="card-body">
                <p><strong>Alamat:</strong> {{ $pembelian['alamat'] }}</p>
                <p><strong>Telepon:</strong> {{ $pembelian['telepon'] }}</p>
                <p><strong>Metode Pembayaran:</strong> {{ ucfirst($pembelian['metode_pembayaran']) }}</p>

                <h3>Produk:</h3>
                <ul>
                    @foreach($pembelian['items'] as $item)
                        <li>{{ $item['nama'] }} ({{ $item['jumlah'] }} x Rp {{ number_format($item['harga'], 0, ',', '.') }})</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach

</body>
</html>
