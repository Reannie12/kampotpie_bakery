@extends('layouts.app')

@section('content')
<section class="max-w-6xl mx-auto px-6 py-14">
    <h1 class="text-4xl font-display text-[#4e2f24] mb-8">Your Cart</h1>

    @if(session('success'))
        <div class="mb-6 rounded-lg bg-green-100 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 rounded-lg bg-red-100 px-4 py-3 text-red-700">
            {{ session('error') }}
        </div>
    @endif

    @php $total = 0; @endphp

    @if(count($cart) > 0)
        <div class="bg-white rounded-[2rem] shadow-sm p-8">
            <div class="space-y-6">
                @foreach($cart as $id => $item)
                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                        $image = !empty($item['image'])
                            ? (str_starts_with($item['image'], 'products/') ? asset('storage/' . $item['image']) : asset($item['image']))
                            : asset('image/logokampotpie.jpg');
                    @endphp

                    <div class="flex items-center justify-between border-b pb-4 gap-6">
                        <div class="flex items-center gap-4">
                            <img src="{{ $image }}" alt="{{ $item['name'] }}" class="w-20 h-20 rounded-xl object-cover" onerror="this.src='{{ asset('image/logokampotpie.jpg') }}'">

                            <div>
                                <h2 class="text-xl font-semibold text-[#4e2f24]">{{ $item['name'] }}</h2>
                                <p class="text-gray-500">Price: ${{ number_format($item['price'], 2) }}</p>
                                <p class="text-gray-500">Quantity: {{ $item['quantity'] }}</p>
                            </div>
                        </div>

                        <div class="text-right">
                            <p class="text-lg font-bold text-[#c06c52]">
                                ${{ number_format($subtotal, 2) }}
                            </p>

                            <form action="{{ route('cart.remove', $id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-500 hover:underline">
                                    Remove
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <p class="text-2xl font-bold text-[#4e2f24]">
                    Total: ${{ number_format($total, 2) }}
                </p>

                <div class="flex gap-4">
                    <a href="{{ route('products.index') }}" class="rounded-full border border-[#d9b7a6] px-6 py-3 text-sm font-semibold text-[#6b4f4f] hover:bg-[#fff1e8] transition">
                        Continue Shopping
                    </a>

                    <a href="{{ route('checkout.index') }}" class="rounded-full bg-pink-500 px-6 py-3 text-sm font-semibold text-white hover:bg-pink-600 transition">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="bg-white rounded-[2rem] shadow-sm p-8 text-center">
            <p class="text-gray-600 mb-4">Your cart is empty.</p>
            <a href="{{ route('products.index') }}" class="rounded-full bg-[#5a3825] px-6 py-3 text-sm font-semibold text-white hover:bg-[#462b1d] transition">
                Browse Menu
            </a>
        </div>
    @endif
</section>
@endsection
