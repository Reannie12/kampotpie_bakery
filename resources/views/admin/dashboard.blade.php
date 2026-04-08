@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <p class="text-sm text-gray-500">Total Orders</p>
            <h2 class="text-3xl font-bold text-[#1f2937] mt-3">{{ $totalOrders }}</h2>
            <p class="text-sm text-gray-400 mt-2">All time orders</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <p class="text-sm text-gray-500">Today Orders</p>
            <h2 class="text-3xl font-bold text-[#1f2937] mt-3">{{ $todayOrders }}</h2>
            <p class="text-sm text-gray-400 mt-2">Orders placed today</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <p class="text-sm text-gray-500">Today Revenue</p>
            <h2 class="text-3xl font-bold text-[#1f2937] mt-3">${{ number_format($todayRevenue, 2) }}</h2>
            <p class="text-sm text-gray-400 mt-2">Completed orders today</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <p class="text-sm text-gray-500">Total Customers</p>
            <h2 class="text-3xl font-bold text-[#1f2937] mt-3">{{ $totalCustomers }}</h2>
            <p class="text-sm text-gray-400 mt-2">Registered user accounts</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <p class="text-sm text-gray-500">Pending Orders</p>
            <h2 class="text-3xl font-bold text-yellow-500 mt-3">{{ $pendingOrders }}</h2>
            <p class="text-sm text-gray-400 mt-2">Waiting for processing</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <p class="text-sm text-gray-500">Completed Orders</p>
            <h2 class="text-3xl font-bold text-green-600 mt-3">{{ $completedOrders }}</h2>
            <p class="text-sm text-gray-400 mt-2">Finished successfully</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <p class="text-sm text-gray-500">Total Revenue</p>
            <h2 class="text-3xl font-bold text-[#1f2937] mt-3">${{ number_format($revenue, 2) }}</h2>
            <p class="text-sm text-gray-400 mt-2">Completed orders only</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <p class="text-sm text-gray-500">Average Order</p>
            <h2 class="text-3xl font-bold text-[#1f2937] mt-3">${{ number_format($averageOrderValue, 2) }}</h2>
            <p class="text-sm text-gray-400 mt-2">
                Best seller:
                {{ $bestProduct ? $bestProduct->product_name : 'No sales yet' }}
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <div class="xl:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h2 class="text-xl font-bold text-[#1f2937]">Order Activity</h2>
                    <p class="text-sm text-gray-500">Last 7 days</p>
                </div>
            </div>
            <div class="h-[320px]">
                <canvas id="ordersChart"></canvas>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h2 class="text-xl font-bold text-[#1f2937]">Order Status</h2>
                    <p class="text-sm text-gray-500">Current breakdown</p>
                </div>
            </div>
            <div class="h-[320px] flex items-center justify-center">
                <canvas id="statusChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h2 class="text-xl font-bold text-[#1f2937]">Revenue Trend</h2>
                    <p class="text-sm text-gray-500">Last 7 days</p>
                </div>
            </div>
            <div class="h-[320px]">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h2 class="text-xl font-bold text-[#1f2937]">Top Products</h2>
                    <p class="text-sm text-gray-500">Best selling items</p>
                </div>
            </div>
            <div class="h-[320px]">
                <canvas id="topProductsChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <div class="xl:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-5">
                <h2 class="text-xl font-bold text-[#1f2937]">Recent Orders</h2>
                <a href="{{ route('admin.orders.index') }}" class="text-sm font-semibold text-blue-600 hover:underline">
                    View all
                </a>
            </div>

            @if($recentOrders->count())
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 pr-4 font-semibold text-gray-700">Order</th>
                                <th class="text-left py-3 pr-4 font-semibold text-gray-700">Customer</th>
                                <th class="text-left py-3 pr-4 font-semibold text-gray-700">Phone</th>
                                <th class="text-left py-3 pr-4 font-semibold text-gray-700">Amount</th>
                                <th class="text-left py-3 pr-4 font-semibold text-gray-700">Status</th>
                                <th class="text-left py-3 font-semibold text-gray-700">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentOrders as $order)
                                <tr class="border-b border-gray-100">
                                    <td class="py-4 pr-4 font-semibold text-[#1f2937]">#{{ $order->id }}</td>
                                    <td class="py-4 pr-4">{{ $order->name }}</td>
                                    <td class="py-4 pr-4">{{ $order->phone }}</td>
                                    <td class="py-4 pr-4 font-semibold">${{ number_format($order->total_amount, 2) }}</td>
                                    <td class="py-4 pr-4">
                                        @php
                                            $statusClasses = match($order->status) {
                                                'completed' => 'bg-green-100 text-green-700',
                                                'pending' => 'bg-yellow-100 text-yellow-700',
                                                'cancelled' => 'bg-red-100 text-red-700',
                                                default => 'bg-gray-100 text-gray-700',
                                            };
                                        @endphp

                                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusClasses }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="py-4">{{ $order->created_at->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500">No orders yet.</p>
            @endif
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-xl font-bold text-[#1f2937] mb-4">Low Stock Alert</h2>

                @if($lowStockProducts->count())
                    <div class="space-y-3">
                        @foreach($lowStockProducts as $product)
                            <div class="flex items-center justify-between rounded-xl border border-gray-100 p-4">
                                <div>
                                    <p class="font-semibold text-[#1f2937]">{{ $product->name }}</p>
                                    <p class="text-sm text-gray-500">${{ number_format($product->price, 2) }}</p>
                                </div>
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">
                                    Stock {{ $product->stock }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">No low stock products.</p>
                @endif
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-xl font-bold text-[#1f2937] mb-4">Recent Customers</h2>

                @if($recentCustomers->count())
                    <div class="space-y-3">
                        @foreach($recentCustomers as $customer)
                            <div class="flex items-center justify-between rounded-xl border border-gray-100 p-4">
                                <div>
                                    <p class="font-semibold text-[#1f2937]">{{ $customer->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $customer->phone }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-[#1f2937]">${{ number_format($customer->total_amount, 2) }}</p>
                                    <p class="text-xs text-gray-500">{{ $customer->created_at->format('d M') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">No customer activity yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ordersChartLabels = @json($ordersChartLabels);
    const ordersChartData = @json($ordersChartData);
    const revenueChartLabels = @json($revenueChartLabels);
    const revenueChartData = @json($revenueChartData);
    const statusChartLabels = @json($statusChartLabels);
    const statusChartData = @json($statusChartData);
    const topProductsChartLabels = @json($topProductsChartLabels);
    const topProductsChartData = @json($topProductsChartData);

    new Chart(document.getElementById('ordersChart'), {
        type: 'bar',
        data: {
            labels: ordersChartLabels,
            datasets: [{
                label: 'Orders',
                data: ordersChartData,
                backgroundColor: '#3b82f6',
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                }
            }
        }
    });

    new Chart(document.getElementById('statusChart'), {
        type: 'doughnut',
        data: {
            labels: statusChartLabels,
            datasets: [{
                data: statusChartData,
                backgroundColor: ['#facc15', '#22c55e', '#ef4444'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    new Chart(document.getElementById('revenueChart'), {
        type: 'line',
        data: {
            labels: revenueChartLabels,
            datasets: [{
                label: 'Revenue',
                data: revenueChartData,
                borderColor: '#10b981',
                backgroundColor: 'rgba(16,185,129,0.15)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    new Chart(document.getElementById('topProductsChart'), {
        type: 'bar',
        data: {
            labels: topProductsChartLabels,
            datasets: [{
                label: 'Sold',
                data: topProductsChartData,
                backgroundColor: '#8b5cf6',
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                }
            }
        }
    });
</script>
@endsection