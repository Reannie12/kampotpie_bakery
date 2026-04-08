<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $customers = User::where('is_admin', 0)
            ->withCount('orders')
            ->latest()
            ->paginate(10);

        return view('admin.customers.index', compact('customers'));
    }
}