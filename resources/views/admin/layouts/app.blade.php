<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Jewelry Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white min-h-screen">
            <div class="p-4">
                <h1 class="text-xl font-bold">Jewelry Admin</h1>
            </div>
            <nav class="mt-4">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 hover:bg-gray-700">Dashboard</a>
                <a href="{{ route('admin.products.index') }}" class="block py-2 px-4 hover:bg-gray-700">Products</a>
                <a href="{{ route('admin.categories.index') }}" class="block py-2 px-4 hover:bg-gray-700">Categories</a>
                <a href="{{ route('admin.orders.index') }}" class="block py-2 px-4 hover:bg-gray-700">Orders</a>
                <a href="{{ route('admin.discounts.index') }}" class="block py-2 px-4 hover:bg-gray-700">Discount</a>
                <a href="{{ route('home') }}" class="block py-2 px-4 hover:bg-gray-700">store</a>
                <!-- Add more nav items as needed -->
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <header class="bg-white shadow p-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold">@yield('title')</h2>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-900">Logout</button>
                        
                    </form>
                </div>
            </header>

            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>