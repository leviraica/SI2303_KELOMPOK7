<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Distributor</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-gradient {
            background: linear-gradient(135deg, #1e3a8a, #6d28d9); /* biru tua ke ungu */
        }
    </style>
</head>
<body class="bg-gradient min-h-screen p-6 text-gray-800 font-sans">

    <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl font-bold text-white text-center mb-10">Dashboard Distributor</h1>

        <!-- Grid Distributor -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($distributors as $distributor)
                <div class="bg-white rounded-2xl shadow-lg p-6 transform hover:scale-105 transition duration-300">
                    <h2 class="text-xl font-semibold text-purple-800 mb-2">{{ $distributor->name }}</h2>
                    <p class="text-sm text-gray-600"><strong>Email:</strong> {{ $distributor->email }}</p>
                    <p class="text-sm text-gray-600"><strong>Alamat:</strong> {{ $distributor->address }}</p>
                    <p class="text-sm text-gray-600"><strong>Telepon:</strong> {{ $distributor->phone_number }}</p>
                    
                    <div class="mt-4 flex justify-between">
                        <a href="#" class="bg-gradient-to-r from-purple-600 to-purple-800 text-white text-sm px-4 py-2 rounded-full shadow hover:from-purple-700 hover:to-purple-900">
                            Lihat Produk
                        </a>
                        <a href="#" class="text-blue-700 text-sm hover:underline">
                            + Keranjang
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
