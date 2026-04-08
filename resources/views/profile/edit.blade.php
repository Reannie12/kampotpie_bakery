<x-app-layout>
    <div class="min-h-screen bg-[#f7f1eb] py-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-[#4b2e2b]">My Profile</h1>
                <p class="text-gray-600 mt-2">Manage your account information and security settings.</p>
            </div>

            <!-- Profile Summary -->
            <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <div class="w-20 h-20 rounded-full bg-pink-100 flex items-center justify-center text-3xl font-bold text-pink-600">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <div>
                            <h2 class="text-2xl font-bold text-[#4b2e2b]">{{ Auth::user()->name }}</h2>
                            <p class="text-gray-600">{{ Auth::user()->email }}</p>
                            @if(auth()->user()->isAdmin())
                                <span class="inline-block mt-2 px-3 py-1 text-sm rounded-full bg-pink-100 text-pink-600 font-medium">
                                    Admin Account
                                </span>
                            @else
                                <span class="inline-block mt-2 px-3 py-1 text-sm rounded-full bg-amber-100 text-amber-700 font-medium">
                                    Customer Account
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 w-full md:w-auto">
                        <div class="bg-[#fffaf5] rounded-2xl px-5 py-4 border border-amber-100 min-w-[160px]">
                            <p class="text-sm text-gray-500">Account Type</p>
                            <p class="text-lg font-semibold text-[#4b2e2b]">
                                {{ auth()->user()->isAdmin() ? 'Admin' : 'Customer' }}
                            </p>
                        </div>

                        <div class="bg-[#fffaf5] rounded-2xl px-5 py-4 border border-amber-100 min-w-[160px]">
                            <p class="text-sm text-gray-500">Joined</p>
                            <p class="text-lg font-semibold text-[#4b2e2b]">
                                {{ Auth::user()->created_at ? Auth::user()->created_at->format('d M Y') : 'N/A' }}
                            </p>
                        </div>

                        <div class="bg-[#fffaf5] rounded-2xl px-5 py-4 border border-amber-100 min-w-[160px]">
                            <p class="text-sm text-gray-500">Status</p>
                            <p class="text-lg font-semibold text-green-600">Active</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Profile Info -->
                    <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-[#4b2e2b]">Profile Information</h2>
                            <p class="text-gray-600 mt-1">Update your name and email address.</p>
                        </div>

                        <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
                            @csrf
                            @method('PATCH')

                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    value="{{ old('name', Auth::user()->name) }}"
                                    required
                                    autofocus
                                    class="w-full rounded-2xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-pink-400 focus:border-pink-400"
                                >
                                @error('name')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email', Auth::user()->email) }}"
                                    required
                                    class="w-full rounded-2xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-pink-400 focus:border-pink-400"
                                >
                                @error('email')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="pt-2">
                                <button
                                    type="submit"
                                    class="px-6 py-3 bg-pink-500 text-white rounded-2xl font-semibold hover:bg-pink-600 transition"
                                >
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Password -->
                    <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-[#4b2e2b]">Change Password</h2>
                            <p class="text-gray-600 mt-1">Keep your account secure by updating your password regularly.</p>
                        </div>

                        <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                            @csrf
                            @method('PUT')

                            <div>
                                <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                                <input
                                    id="current_password"
                                    name="current_password"
                                    type="password"
                                    class="w-full rounded-2xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                                >
                                @error('current_password', 'updatePassword')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="w-full rounded-2xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                                >
                                @error('password', 'updatePassword')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                                <input
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    type="password"
                                    class="w-full rounded-2xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-amber-400 focus:border-amber-400"
                                >
                            </div>

                            <div class="pt-2">
                                <button
                                    type="submit"
                                    class="px-6 py-3 bg-amber-500 text-white rounded-2xl font-semibold hover:bg-amber-600 transition"
                                >
                                    Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Sidebar -->
                <div class="space-y-8">
                    <!-- Quick Actions -->
                    <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6">
                        <h3 class="text-xl font-bold text-[#4b2e2b] mb-4">Quick Actions</h3>

                        <div class="space-y-3">
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}"
                                   class="block w-full text-center px-4 py-3 rounded-2xl bg-[#4b2e2b] text-white font-medium hover:opacity-90 transition">
                                    Go to Admin Dashboard
                                </a>
                            @else
                                <a href="{{ route('products.index') }}"
                                   class="block w-full text-center px-4 py-3 rounded-2xl bg-[#4b2e2b] text-white font-medium hover:opacity-90 transition">
                                    Browse Menu
                                </a>

                                <a href="{{ route('orders.index') }}"
                                   class="block w-full text-center px-4 py-3 rounded-2xl bg-pink-500 text-white font-medium hover:bg-pink-600 transition">
                                    My Orders
                                </a>

                                <a href="{{ route('cart.index') }}"
                                   class="block w-full text-center px-4 py-3 rounded-2xl bg-amber-500 text-white font-medium hover:bg-amber-600 transition">
                                    My Cart
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Account Safety -->
                    <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6">
                        <h3 class="text-xl font-bold text-[#4b2e2b] mb-4">Account Safety</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li>Use a strong and unique password.</li>
                            <li>Keep your email updated.</li>
                            <li>Do not share your login with others.</li>
                        </ul>
                    </div>

                    <!-- Delete Account -->
                    <div class="bg-white rounded-3xl shadow-md border border-red-100 p-6">
                        <h3 class="text-xl font-bold text-red-600 mb-3">Danger Zone</h3>
                        <p class="text-gray-600 mb-4">Once you delete your account, this action cannot be undone.</p>

                        <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account?');">
                            @csrf
                            @method('DELETE')

                            <div class="mb-4">
                                <label for="delete_password" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                                <input
                                    id="delete_password"
                                    name="password"
                                    type="password"
                                    class="w-full rounded-2xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-red-400 focus:border-red-400"
                                >
                                @error('password', 'userDeletion')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <button
                                type="submit"
                                class="w-full px-4 py-3 bg-red-500 text-white rounded-2xl font-semibold hover:bg-red-600 transition"
                            >
                                Delete Account
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>