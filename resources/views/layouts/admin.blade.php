<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 h-screen bg-gray-800 fixed">
            <div class="flex items-center justify-center h-16 bg-gray-900">
                <span class="text-white text-xl font-semibold">Admin Panel</span>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-gray-100 hover:bg-gray-700">
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.distributors.index') }}" class="flex items-center px-6 py-3 text-gray-100 hover:bg-gray-700">
                    <span>Distributors</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="ml-64 flex-1">
            <header class="bg-white shadow">
                <div class="px-6 py-4">
                    <h1 class="text-2xl font-semibold text-gray-800">@yield('header')</h1>
                </div>
            </header>

            <main class="p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html> 