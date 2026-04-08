@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-2xl shadow-sm p-6">
    <h1 class="text-2xl font-bold text-[#1f2937] mb-6">Manage Orders</h1>

    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->count())
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3">Order ID</th>
                        <th class="text-left py-3">Customer</th>
                        <th class="text-left py-3">Phone</th>
                        <th class="text-left py-3">Total</th>
                        <th class="text-left py-3">Status</th>
                        <th class="text-left py-3">Date</th>
                        <th class="text-left py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="border-b">
                            <td class="py-3">#{{ $order->id }}</td>
                            <td class="py-3">{{ $order->name }}</td>
                            <td class="py-3">{{ $order->phone }}</td>
                            <td class="py-3">${{ number_format($order->total_amount, 2) }}</td>
                            <td class="py-3">{{ ucfirst($order->status) }}</td>
                            <td class="py-3">{{ $order->created_at->format('d M Y') }}</td>
                            <td class="py-3">
                                <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600 hover:underline">
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $orders->links() }}
        </div>
    @else
        <p class="text-gray-500">No orders found.</p>
    @endif
</div>
@endsection