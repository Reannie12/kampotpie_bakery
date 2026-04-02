<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

// Admin dashboard
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Admin product management (CRUD)
Route::resource('products', ProductController::class)->except(['index','show']);

// Admin category management (CRUD)
Route::resource('categories', CategoryController::class);
