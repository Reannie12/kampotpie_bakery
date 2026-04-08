@extends('layouts.app')

@section('content')
<section class="max-w-6xl mx-auto px-6 py-14">
    <div class="mb-10">
        <h1 class="font-display text-5xl text-[#4b2e2b]">Order History</h1>
        <p class="text-[#7a5c55] mt-3">View all your completed orders and receipts.</p>
    </div>

    @if($orders->count())
        <div class="space-y-6">
            @foreach($orders as $order)
                <div class="bg-white rounded-[2rem] shadow-sm border border-[#f1e4da] p-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-[#4b2e2b]">
                                Order #{{ $order->id }}
                            </h2>
                            <p class="text-[#7a5c55] mt-1">
                                {{ $order->created_at->format('d M Y, h:i A') }}
                            </p>
                        </div>

                        <div class="flex items-center gap-3">
                            <span class="text-sm font-semibold bg-[#fff1e8] text-[#a05c44] px-4 py-2 rounded-full">
                                {{ ucfirst($order->status) }}
                            </span>

                            <a href="{{ route('orders.show', $order->id) }}"
                               class="inline-flex items-center rounded-xl bg-[#8b5e3c] px-5 py-3 text-white font-semibold hover:bg-[#71482c] transition">
                                View Receipt
                            </a>
                        </div>
                    </div>

                    <div class="border-t border-[#f1e4da] pt-4">
                        <div class="space-y-3">
                            @foreach($order->items as $item)
                                <div class="flex justify-between items-center text-[#4b2e2b]">
                                    <div>
                                        <p class="font-semibold">{{ $item->product_name }}</p>
                                        <p class="text-sm text-[#7a5c55]">
                                            ${{ number_format($item->price, 2) }} × {{ $item->quantity }}
                                        </p>
                                    </div>
                                    <p class="font-semibold">
                                        ${{ number_format($item->subtotal, 2) }}
                                    </p>
                                </div>
                            @endforeach
                        </div>

                        <div class="border-t border-[#f1e4da] mt-4 pt-4 flex justify-between items-center">
                            <span class="text-lg font-bold text-[#4b2e2b]">Total</span>
                            <span class="text-2xl font-extrabold text-[#c06c52]">
                                ${{ number_format($order->total_amount, 2) }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="max-w-xl mx-auto rounded-[2rem] bg-white border border-[#f1e4da] shadow-sm px-8 py-12 text-center">
            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-[#fff3eb] flex items-center justify-center text-2xl">
                📦
            </div>

            <h2 class="text-2xl font-bold text-[#4b2e2b] mb-2">No orders yet</h2>
            <p class="text-[#7a5c55] mb-6">
                You haven’t placed any orders yet.
            </p>

            <a href="{{ route('products.index') }}"
               class="inline-flex items-center justify-center rounded-xl bg-[#8b5e3c] px-6 py-3 text-white font-semibold hover:bg-[#71482c] transition">
                Browse Menu
            </a>
        </div>
    @endif
</section>
@endsection