<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-2 text-brown-700">Admin Dashboard</h1>
        <p class="text-gray-600 mb-8">This page is only for admin management.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white shadow rounded-2xl p-6">
                <h2 class="text-xl font-semibold mb-2">Manage Products</h2>
                <p class="text-gray-600 mb-4">View, edit, and delete bakery products.</p>
                <a href="{{ route('products.index') }}" class="inline-block px-4 py-2 bg-amber-700 text-white rounded hover:bg-amber-800">
                    View Products
                </a>
            </div>

            <div class="bg-white shadow rounded-2xl p-6">
                <h2 class="text-xl font-semibold mb-2">Add Product</h2>
                <p class="text-gray-600 mb-4">Create a new product for the menu.</p>
                <a href="{{ route('products.create') }}" class="inline-block px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">
                    Add New
                </a>
            </div>

            <div class="bg-white shadow rounded-2xl p-6">
                <h2 class="text-xl font-semibold mb-2">Profile</h2>
                <p class="text-gray-600 mb-4">Update your admin profile.</p>
                <a href="{{ route('profile.edit') }}" class="inline-block px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>
</x-app-layout>