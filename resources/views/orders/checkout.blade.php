@extends('layouts.app')

@section('content')
<section class="max-w-5xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold text-[#4b2e2b] mb-6">Checkout</h1>

    @if(session('error'))
        <div class="mb-4 rounded-lg bg-red-100 text-red-700 px-4 py-3">
            {{ session('error') }}
        </div>
    @endif

    @if(!isset($cart) || count($cart) === 0)
        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-600">Your cart is empty.</p>
            <a href="{{ route('products.index') }}"
               class="inline-block mt-4 bg-[#8b5e3c] text-white px-5 py-2 rounded-lg">
                Continue Shopping
            </a>
        </div>
    @else
        <div class="grid md:grid-cols-2 gap-8 items-start">
            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-xl font-semibold mb-4 text-[#4b2e2b]">Customer Information</h2>

                <form action="{{ route('orders.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block mb-1 font-medium">Full Name</label>
                        <input type="text"
                               name="customer_name"
                               value="{{ old('customer_name', auth()->user()->name ?? '') }}"
                               class="w-full border rounded-lg px-4 py-2">
                        @error('customer_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Phone</label>
                        <input type="text"
                               name="customer_phone"
                               value="{{ old('customer_phone') }}"
                               class="w-full border rounded-lg px-4 py-2">
                        @error('customer_phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Address</label>
                        <textarea name="customer_address"
                                  rows="4"
                                  class="w-full border rounded-lg px-4 py-2">{{ old('customer_address') }}</textarea>
                        @error('customer_address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Notes (Optional)</label>
                        <textarea name="notes"
                                  rows="3"
                                  class="w-full border rounded-lg px-4 py-2">{{ old('notes') }}</textarea>
                    </div>

                    <button type="submit"
                            class="w-full bg-pink-500 text-white py-3 rounded-xl font-bold text-lg hover:bg-pink-600 transition">
                        Confirm Order
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-xl font-semibold mb-4 text-[#4b2e2b]">Order Summary</h2>

                <div class="space-y-4">
                    @foreach($cart as $item)
                        <div class="flex justify-between border-b pb-3">
                            <div>
                                <p class="font-semibold">{{ $item['name'] }}</p>
                                <p class="text-sm text-gray-500">Qty: {{ $item['quantity'] }}</p>
                            </div>
                            <p class="font-semibold">${{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 border-t pt-4 flex justify-between text-lg font-bold">
                    <span>Total</span>
                    <span>${{ number_format($total ?? 0, 2) }}</span>
                </div>
            </div>
        </div>
    @endif
</section>
@endsection