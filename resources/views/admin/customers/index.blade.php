@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-2xl shadow-sm p-6">
    <h1 class="text-2xl font-bold text-[#1f2937] mb-6">Customers</h1>

    @if($customers->count())
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3">ID</th>
                        <th class="text-left py-3">Name</th>
                        <th class="text-left py-3">Email</th>
                        <th class="text-left py-3">Orders</th>
                        <th class="text-left py-3">Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr class="border-b">
                            <td class="py-3">{{ $customer->id }}</td>
                            <td class="py-3">{{ $customer->name }}</td>
                            <td class="py-3">{{ $customer->email }}</td>
                            <td class="py-3">{{ $customer->orders_count }}</td>
                            <td class="py-3">{{ $customer->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $customers->links() }}
        </div>
    @else
        <p class="text-gray-500">No customers found.</p>
    @endif
</div>
@endsection