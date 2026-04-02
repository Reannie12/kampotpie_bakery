<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {
            // Public routes
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Admin routes
            Route::middleware(['web','auth'])
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));
        });
    }
}
