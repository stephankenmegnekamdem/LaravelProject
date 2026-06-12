<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    View::composer('layout.app', function ($view) {
        $categories = Category::where('parent_id', 0)
                        ->with('children')
                        ->get();

        $products = Product::where('status', 1)
                        ->latest()
                        ->take(12)
                        ->get();

        $view->with('categories', $categories);
        $view->with('products', $products);
    });
}
}
