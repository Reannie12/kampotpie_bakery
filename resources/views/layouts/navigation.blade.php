<nav x-data="{ open: false }" class="bg-amber-50 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('products.index') }}" class="flex items-center space-x-2">
                    <img src="/image/logokampotpie.jpg" alt="Bakery Logo" class="h-10 w-10 rounded-full">
                    <span class="text-xl font-bold text-brown-700">Kampot Pie & Ice Cream</span>
                </a>
            </div>

            <!-- Menu Links -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('products.index') }}" class="text-brown-700 hover:text-pink-600 font-medium">Home</a>
                <a href="{{ route('products.index') }}" class="text-brown-700 hover:text-pink-600 font-medium">Menu</a>
                <a href="{{ route('dashboard') }}" class="text-brown-700 hover:text-pink-600 font-medium">Dashboard</a>
                <a href="{{ route('contact') }}" class="text-brown-700 hover:text-pink-600 font-medium">Contact</a>
            </div>

            <!-- Right Side (Auth / CTA) -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <span class="text-brown-700 font-semibold">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Log Out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">Login</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Register</a>
                @endauth
            </div>

            <!-- Mobile Hamburger -->
            <div class="md:hidden flex items-center">
                <button @click="open = ! open" class="text-brown-700 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-white shadow">
        <div class="px-4 pt-2 pb-3 space-y-2">
            <a href="{{ route('products.index') }}" class="block text-brown-700 hover:text-pink-600">Home</a>
            <a href="{{ route('products.index') }}" class="block text-brown-700 hover:text-pink-600">Menu</a>
            <a href="{{ route('dashboard') }}" class="block text-brown-700 hover:text-pink-600">Dashboard</a>
            <a href="{{ route('contact') }}" class="block text-brown-700 hover:text-pink-600">Contact</a>
        </div>
        <div class="border-t px-4 py-3">
            @auth
                <div class="font-medium text-brown-700">{{ Auth::user()->name }}</div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="mt-2 w-full px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Log Out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block w-full px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600 text-center">Login</a>
                <a href="{{ route('register') }}" class="block w-full mt-2 px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-center">Register</a>
            @endauth
        </div>
    </div>
</nav>
