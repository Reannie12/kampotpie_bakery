@extends('layouts.app')

@section('content')
<div class="min-h-screen">
    <div class="max-w-7xl mx-auto px-6 pt-12 pb-24 flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 space-y-6">
            <h1 class="text-6xl font-serif-header text-[#1a1a1a]">
                 Sweet Moments Start Here
            </h1>
            <p class="text-gray-500 text-lg max-w-sm leading-relaxed">
                Discover Kampot’s finest pies and ice cream, crafted with love and tradition.
            </p>
            <div class="flex items-center space-x-4 pt-4">
                <a href="{{ route('products.index') }}" class="px-8 py-3 bg-[#5c3d2e] text-white rounded-full font-medium hover:scale-105 transition shadow-lg">
                    Shop Now
                </a>
                <span class="text-[#5c3d2e] font-bold cursor-pointer">→ Explore More</span>
            </div>
        </div>

        <div class="md:w-1/2 mt-12 md:mt-0 relative flex justify-center">
            <img src="/images/hero-cake.jpg" class="w-full max-w-[500px] object-contain drop-shadow-2xl" alt="Bakery Hero">
        </div>
    </div>

    <div class="bg-white/30 backdrop-blur-sm py-20 rounded-t-[3rem]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-serif-header text-[#1a1a1a]">Our Specialties</h2>
                <p class="text-gray-500 mt-2">Pick your favorite treat</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div class="bg-white rounded-[2.5rem] p-4 shadow-sm border border-orange-50/50 hover:shadow-xl transition-all group">
                        <div class="bg-[#FDF6E9] rounded-[2rem] overflow-hidden mb-6">
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" class="w-full h-64 object-cover group-hover:scale-110 transition duration-700" alt="{{ $product->name }}">
                            @else
                                <img src="{{ asset('images/placeholder.png') }}" class="w-full h-64 object-cover" alt="No image">
                            @endif
                        </div>

                        <div class="px-4 pb-4">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-[#1a1a1a]">{{ $product->name }}</h3>
                                    <p class="text-gray-400 text-sm italic">Freshly Baked</p>
                                </div>
                                <span class="bg-[#fdf6e9] text-[#5c3d2e] font-bold px-3 py-1 rounded-full text-sm">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between mt-6 border-t border-gray-50 pt-4">
                                <div class="flex space-x-4">
                                    <a href="{{ route('products.edit', $product->id) }}" class="text-xs font-bold text-gray-400 hover:text-yellow-600 uppercase tracking-tighter">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="text-xs font-bold text-gray-400 hover:text-red-600 uppercase tracking-tighter">Delete</button>
                                    </form>
                                </div>
                                <a href="{{ route('products.show', $product->id) }}" class="w-10 h-10 bg-[#5c3d2e] text-white rounded-full flex items-center justify-center hover:bg-black transition">
                                    →
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection