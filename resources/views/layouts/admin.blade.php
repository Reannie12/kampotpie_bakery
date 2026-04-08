<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Kampot Pie Bakery</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: linear-gradient(180deg, #fffaf5 0%, #f7eadf 100%); color: #4b2e2b; }
        .font-display { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="min-h-screen">
    <div class="min-h-screen lg:flex">
        <aside class="hidden lg:flex w-72 flex-col border-r border-[#eadfd6] bg-[#fff8f3] p-6">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 mb-8">
                <img src="{{ asset('image/logokampotpie.jpg') }}" alt="Logo" class="h-12 w-12 rounded-full object-cover border border-[#eadfd6]">
                <div>
                    <p class="font-bold text-[#4b2e2b]">Kampot Pie</p>
                    <p class="text-sm text-[#8a6c63]">Admin Panel</p>
                </div>
            </a>

            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block rounded-2xl px-4 py-3 font-semibold text-[#4b2e2b] hover:bg-white">
                    Admin Dashboard
                </a>
                <a href="{{ route('products.index') }}" class="block rounded-2xl px-4 py-3 font-semibold text-[#4b2e2b] hover:bg-white">
                    Menu Management
                </a>
                <a href="{{ route('admin.products.create') }}" class="block rounded-2xl px-4 py-3 font-semibold text-[#4b2e2b] hover:bg-white">
                    Add Product
                </a>
                <a href="{{ route('admin.orders.index') }}" class="block rounded-2xl px-4 py-3 font-semibold text-[#4b2e2b] hover:bg-white">
                    Orders
                </a>
                <a href="{{ route('admin.categories.index') }}" class="block rounded-2xl px-4 py-3 font-semibold text-[#4b2e2b] hover:bg-white">
                    Categories
                </a>
                <a href="{{ route('admin.customers.index') }}" class="block rounded-2xl px-4 py-3 font-semibold text-[#4b2e2b] hover:bg-white">
                    Customers
                </a>
                <a href="{{ route('home') }}" class="block rounded-2xl px-4 py-3 font-semibold text-[#4b2e2b] hover:bg-white">
                    View User Site
                </a>
            </nav>

            <div class="mt-auto pt-8">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full rounded-2xl bg-[#8b5e3c] px-4 py-3 text-sm font-semibold text-white hover:bg-[#71482c] transition">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 min-w-0">
            <header class="border-b border-[#eadfd6] bg-white/80 backdrop-blur">
                <div class="flex items-center justify-between px-4 py-4 sm:px-6">
                    <div>
                        <h1 class="font-display text-2xl text-[#4b2e2b]">Admin Dashboard</h1>
                        <p class="text-sm text-[#8a6c63]">Manage products, customers, and orders</p>
                    </div>
                </div>
            </header>

            <div class="lg:hidden border-b border-[#eadfd6] bg-[#fff8f3] px-4 py-3">
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('admin.dashboard') }}" class="rounded-full border border-[#e5d3c4] px-4 py-2 text-sm font-semibold text-[#4b2e2b]">Admin Dashboard</a>
                    <a href="{{ route('products.index') }}" class="rounded-full border border-[#e5d3c4] px-4 py-2 text-sm font-semibold text-[#4b2e2b]">Menu Management</a>
                    <a href="{{ route('admin.products.create') }}" class="rounded-full border border-[#e5d3c4] px-4 py-2 text-sm font-semibold text-[#4b2e2b]">Add Product</a>
                </div>
            </div>

            <main class="p-4 sm:p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
