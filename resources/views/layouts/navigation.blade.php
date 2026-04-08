<nav x-data="{ open: false }" class="bg-white/95 backdrop-blon border-b border-[#f1e4da] sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="h-11 w-11 rounded-full bg-gradient-to-br from-[#f8d7c4] to-[#f3b38f] flex items-center justify-center shadow-sm">
                        <span class="text-[#5a3825] text-lg font-bold">K</span>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-[#4b2e2b] leading-tight">Kampot Pie</p>
                        <p class="text-xs text-[#9a7b6f] -mt-0.5">Bakery & Ice Cream</p>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}"
                   class="text-[#5a3825] hover:text-pink-600 font-medium transition">
                    Home
                </a>

                <a href="{{ route('products.index') }}"
                   class="text-[#5a3825] hover:text-pink-600 font-medium transition">
                    Menu
                </a>

                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}"
                           class="text-[#5a3825] hover:text-pink-600 font-medium transition">
                            Admin Dashboard
                        </a>
                    @else
                        <a href="{{ route('contact') }}"
                           class="text-[#5a3825] hover:text-pink-600 font-medium transition">
                            Contact
                        </a>

                        <a href="{{ route('orders.index') }}"
                           class="text-[#5a3825] hover:text-pink-600 font-medium transition">
                            My Orders
                        </a>

                        <a href="{{ route('cart.index') }}"
                           class="text-[#5a3825] hover:text-pink-600 font-medium transition">
                            Cart
                        </a>
                    @endif
                @else
                    <a href="{{ route('contact') }}"
                       class="text-[#5a3825] hover:text-pink-600 font-medium transition">
                        Contact
                    </a>
                @endauth
            </div>

            <!-- Right Side -->
            <div class="hidden md:flex items-center gap-4">
                @auth
                    <div class="relative" x-data="{ dropdownOpen: false }">
                        <button @click="dropdownOpen = !dropdownOpen"
                                class="flex items-center gap-2 rounded-full border border-[#ead8cb] px-4 py-2 text-sm font-medium text-[#5a3825] hover:bg-[#fff6f0] transition">
                            {{ Auth::user()->name }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="dropdownOpen"
                             @click.away="dropdownOpen = false"
                             x-transition
                             class="absolute right-0 mt-3 w-52 rounded-2xl bg-white shadow-lg border border-[#f0e3d8] py-2 z-50">
                            <a href="{{ route('profile.edit') }}"
                               class="block px-4 py-2 text-sm text-[#5a3825] hover:bg-[#fff6f0]">
                                Profile
                            </a>

                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}"
                                   class="block px-4 py-2 text-sm text-[#5a3825] hover:bg-[#fff6f0]">
                                    Admin Dashboard
                                </a>
                            @else
                                <a href="{{ route('orders.index') }}"
                                   class="block px-4 py-2 text-sm text-[#5a3825] hover:bg-[#fff6f0]">
                                    My Orders
                                </a>

                                <a href="{{ route('cart.index') }}"
                                   class="block px-4 py-2 text-sm text-[#5a3825] hover:bg-[#fff6f0]">
                                    Cart
                                </a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                       class="text-[#5a3825] hover:text-pink-600 font-medium transition">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="rounded-full bg-pink-500 px-5 py-2.5 text-sm font-semibold text-white hover:bg-pink-600 transition shadow-sm">
                        Register
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-[#5a3825] hover:text-pink-600 hover:bg-[#fff6f0] transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }"
                              class="inline-flex"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }"
                              class="hidden"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden border-t border-[#f1e4da] bg-white">
        <div class="px-4 pt-4 pb-3 space-y-2">
            <a href="{{ route('home') }}"
               class="block rounded-lg px-3 py-2 text-[#5a3825] hover:bg-[#fff6f0] hover:text-pink-600">
                Home
            </a>

            <a href="{{ route('products.index') }}"
               class="block rounded-lg px-3 py-2 text-[#5a3825] hover:bg-[#fff6f0] hover:text-pink-600">
                Menu
            </a>

            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}"
                       class="block rounded-lg px-3 py-2 text-[#5a3825] hover:bg-[#fff6f0] hover:text-pink-600">
                        Admin Dashboard
                    </a>
                @else
                    <a href="{{ route('contact') }}"
                       class="block rounded-lg px-3 py-2 text-[#5a3825] hover:bg-[#fff6f0] hover:text-pink-600">
                        Contact
                    </a>

                    <a href="{{ route('orders.index') }}"
                       class="block rounded-lg px-3 py-2 text-[#5a3825] hover:bg-[#fff6f0] hover:text-pink-600">
                        My Orders
                    </a>

                    <a href="{{ route('cart.index') }}"
                       class="block rounded-lg px-3 py-2 text-[#5a3825] hover:bg-[#fff6f0] hover:text-pink-600">
                        Cart
                    </a>
                @endif

                <a href="{{ route('profile.edit') }}"
                   class="block rounded-lg px-3 py-2 text-[#5a3825] hover:bg-[#fff6f0] hover:text-pink-600">
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}" class="pt-2">
                    @csrf
                    <button type="submit"
                            class="w-full text-left rounded-lg px-3 py-2 text-red-600 hover:bg-red-50">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('contact') }}"
                   class="block rounded-lg px-3 py-2 text-[#5a3825] hover:bg-[#fff6f0] hover:text-pink-600">
                    Contact
                </a>

                <a href="{{ route('login') }}"
                   class="block rounded-lg px-3 py-2 text-[#5a3825] hover:bg-[#fff6f0] hover:text-pink-600">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="block rounded-lg px-3 py-2 text-pink-600 font-semibold hover:bg-pink-50">
                    Register
                </a>
            @endauth
        </div>
    </div>
</nav>