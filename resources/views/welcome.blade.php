@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-amber-50 to-white">
    <div class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <h1 class="text-5xl md:text-6xl font-bold text-[#5c3d2e] leading-tight">
                Kampot Pie & Ice Cream
            </h1>
            <p class="mt-6 text-lg text-gray-600 max-w-xl">
                Welcome to our bakery website. Browse cakes, pies, pastries, drinks, and ice cream made with care.
            </p>

            <div class="mt-8 flex gap-4">
                <a href="{{ route('products.index') }}" class="px-6 py-3 bg-[#5c3d2e] text-white rounded-full font-semibold">
                    View Menu
                </a>
                <a href="{{ route('contact') }}" class="px-6 py-3 border border-[#5c3d2e] text-[#5c3d2e] rounded-full font-semibold">
                    Contact Us
                </a>
            </div>
        </div>

        <div class="flex justify-center">
            <img src="{{ asset('image/logokampotpie.jpg') }}" alt="Bakery Logo" class="w-80 h-80 object-cover rounded-full shadow-2xl">
        </div>
    </div>
</div>
@endsection