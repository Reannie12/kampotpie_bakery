<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    public function dashboard()
    {
        $productCount = Product::count();
        $categoryCount = Category::count();
        $lowStock = Product::where('stock', '<', 5)->get();

        return view('admin.dashboard', compact('productCount', 'categoryCount', 'lowStock'));
    }
}
