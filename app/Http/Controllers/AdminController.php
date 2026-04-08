<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $today = Carbon::today();

        $totalOrders = Order::count();
        $todayOrders = Order::whereDate('created_at', $today)->count();

        $pendingOrders = Order::where('status', 'pending')->count();
        $completedOrders = Order::where('status', 'completed')->count();
        $cancelledOrders = Order::where('status', 'cancelled')->count();

        $revenue = Order::where('status', 'completed')->sum('total_amount');
        $todayRevenue = Order::where('status', 'completed')
            ->whereDate('created_at', $today)
            ->sum('total_amount');

        $totalCustomers = User::where('is_admin', 0)->count();

        $averageOrderValue = Order::where('status', 'completed')->avg('total_amount') ?? 0;

        $recentOrders = Order::latest()->take(8)->get();

        $lowStockProducts = Product::where('stock', '<=', 5)
            ->orderBy('stock')
            ->take(6)
            ->get();

        $topSellingProducts = OrderItem::select('product_name', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_name')
            ->orderByDesc('total_sold')
            ->take(6)
            ->get();

        $recentCustomers = Order::select('name', 'phone', 'created_at', 'total_amount')
            ->latest()
            ->take(6)
            ->get();

        $bestProduct = $topSellingProducts->first();

        $ordersChartLabels = [];
        $ordersChartData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $ordersChartLabels[] = $date->format('D');
            $ordersChartData[] = Order::whereDate('created_at', $date)->count();
        }

        $revenueChartLabels = [];
        $revenueChartData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $revenueChartLabels[] = $date->format('D');
            $revenueChartData[] = (float) Order::where('status', 'completed')
                ->whereDate('created_at', $date)
                ->sum('total_amount');
        }

        $statusChartLabels = ['Pending', 'Completed', 'Cancelled'];
        $statusChartData = [$pendingOrders, $completedOrders, $cancelledOrders];

        $topProductsChartLabels = $topSellingProducts->pluck('product_name');
        $topProductsChartData = $topSellingProducts->pluck('total_sold');

        return view('admin.dashboard', compact(
            'totalOrders',
            'todayOrders',
            'pendingOrders',
            'completedOrders',
            'cancelledOrders',
            'revenue',
            'todayRevenue',
            'totalCustomers',
            'averageOrderValue',
            'recentOrders',
            'lowStockProducts',
            'topSellingProducts',
            'recentCustomers',
            'bestProduct',
            'ordersChartLabels',
            'ordersChartData',
            'revenueChartLabels',
            'revenueChartData',
            'statusChartLabels',
            'statusChartData',
            'topProductsChartLabels',
            'topProductsChartData'
        ));
    }
}