@extends('layouts.app')

@section('content')
<section class="max-w-4xl mx-auto px-6 py-14">
    <div class="bg-white rounded-[2rem] shadow-sm p-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-4xl font-bold text-[#4b2e2b]">Order Receipt</h1>
                <p class="text-gray-500 mt-2">Transaction successful</p>
            </div>

            <div class="text-sm font-semibold bg-[#fff1e8] text-[#a05c44] px-4 py-2 rounded-full w-fit">
                {{ ucfirst($order->status) }}
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-8 mb-8">
            <div>
                <h2 class="text-lg font-semibold text-[#4b2e2b] mb-3">Order Info</h2>
                <div class="space-y-2 text-gray-700">
                    <p><span class="font-semibold">Order ID:</span> #{{ $order->id }}</p>
                    <p><span class="font-semibold">Date:</span> {{ $order->created_at->format('d M Y, h:i A') }}</p>
                    <p><span class="font-semibold">Payment:</span> Cash on Delivery</p>
                </div>
            </div>

            <div>
                <h2 class="text-lg font-semibold text-[#4b2e2b] mb-3">Customer Info</h2>
                <div class="space-y-2 text-gray-700">
                    <p><span class="font-semibold">Name:</span> {{ $order->name }}</p>
                    <p><span class="font-semibold">Phone:</span> {{ $order->phone }}</p>
                    <p><span class="font-semibold">Address:</span> {{ $order->address }}</p>
                </div>
            </div>
        </div>

        @if($order->note)
            <div class="mb-8 rounded-2xl bg-[#fff7f2] p-4">
                <h2 class="text-lg font-semibold text-[#4b2e2b] mb-2">Notes</h2>
                <p class="text-gray-700">{{ $order->note }}</p>
            </div>
        @endif

        <div class="rounded-2xl border border-[#f1e4da] overflow-hidden">
            <div class="bg-[#fff8f3] px-6 py-4 border-b border-[#f1e4da]">
                <h2 class="text-xl font-semibold text-[#4b2e2b]">Items Ordered</h2>
            </div>

            <div class="divide-y divide-[#f1e4da]">
                @foreach($order->items as $item)
                    <div class="flex items-center justify-between px-6 py-4">
                        <div>
                            <p class="font-semibold text-[#4b2e2b]">{{ $item->product_name }}</p>
                            <p class="text-sm text-gray-500">
                                ${{ number_format($item->price, 2) }} × {{ $item->quantity }}
                            </p>
                        </div>
                        <p class="font-semibold text-[#4b2e2b]">
                            ${{ number_format($item->subtotal, 2) }}
                        </p>
                    </div>
                @endforeach
            </div>

            <div class="bg-[#fff8f3] px-6 py-4 flex justify-between items-center">
                <span class="text-lg font-bold text-[#4b2e2b]">Total</span>
                <span class="text-2xl font-extrabold text-[#c06c52]">
                    ${{ number_format($order->total_amount, 2) }}
                </span>
            </div>
        </div>

        <div class="mt-8 flex flex-wrap gap-4">
            <a href="{{ route('orders.index') }}"
               class="inline-flex items-center rounded-xl bg-[#8b5e3c] px-5 py-3 text-white font-semibold hover:bg-[#71482c] transition">
                View Order History
            </a>

            <a href="{{ route('products.index') }}"
               class="inline-flex items-center rounded-xl border border-[#d9c2b1] px-5 py-3 text-[#4b2e2b] font-semibold hover:bg-[#fff8f3] transition">
                Continue Shopping
            </a>
        </div>
    </div>
</section>
@endsection