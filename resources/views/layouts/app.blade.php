<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kampot Pie Bakery</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(180deg, #fffaf5 0%, #f7eadf 100%);
            min-height: 100vh;
            color: #4b2e2b;
        }

        .font-display {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body>

<nav class="flex items-center justify-between px-6 py-4 bg-white shadow-sm">
    <a href="{{ route('home') }}" class="flex items-center gap-3">
        <img src="{{ asset('image/logokampotpie.jpg') }}"
             alt="Kampot Pie Logo"
             class="h-8 w-8 rounded-full object-cover">

        <span class="font-display text-xl font-bold text-[#4e2f24]">
            Kampot Pie & Ice Cream
        </span>
    </a>

    <div class="flex items-center gap-6 text-sm font-semibold">
        <a href="{{ route('products.index') }}" class="hover:text-[#c06c52] transition">
            Menu
        </a>

        <a href="{{ route('contact') }}" class="hover:text-[#c06c52] transition">
            Contact
        </a>

        @auth
            @php
                $cartCount = collect(session('cart', []))->sum('quantity');
            @endphp

            <a href="{{ route('cart.index') }}" class="flex items-center gap-2 hover:text-[#c06c52] transition">
                <span>Cart</span>
                @if($cartCount > 0)
                    <span class="inline-flex items-center justify-center min-w-[22px] h-[22px] rounded-full bg-[#8b5e3c] px-1.5 text-xs font-bold text-white">
                        {{ $cartCount }}
                    </span>
                @endif
            </a>

            <a href="{{ route('orders.index') }}" class="hover:text-[#c06c52] transition">
                Order History
            </a>
            @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" 
                class="px-3 py-1 rounded-full bg-[#4b2e2b] text-white hover:bg-[#c06c52] transition">
                    Admin Dashboard
                </a>
            @endif

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-red-500 hover:underline">
                    Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="hover:text-[#c06c52] transition">
                Login
            </a>

            <a href="{{ route('register') }}" class="hover:text-[#c06c52] transition">
                Register
            </a>
        @endauth
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="mt-16 text-center text-sm text-gray-500 py-6">
    © {{ date('Y') }} Kampot Pie & Ice Cream. All rights reserved.
</footer>

</body>
</html>