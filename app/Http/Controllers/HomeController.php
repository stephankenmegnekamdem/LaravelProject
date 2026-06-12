<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $title      = 'Home Page';
        $message    = 'Welcome to Laravel MVC example';
        $products   = Product::where('status', 1)->latest()->paginate(12);
       $categories = Category::where('parent_id', 0)
                ->with('children')
                ->get();
        return view('partials.home', compact('title', 'message', 'products', 'categories'));
    }
    public function category($id)
{
    $category   = Category::with('children')->findOrFail($id);
    $products   = Product::where('category_id', $id)
                    ->where('status', 1)
                    ->paginate(12);
    $categories = Category::where('parent_id', 0)
                    ->with('children')
                    ->get();

    // reuse the home view but filtered by category
    return view('partials.home', compact('category', 'products', 'categories'));
}

public function product($id)
{
    $product    = Product::findOrFail($id);
    $categories = Category::where('parent_id', 0)
                    ->with('children')
                    ->get();

    return view('partials.productlist', compact('product', 'categories'));
}

public function shop()
    {
        $products   = Product::where('status', 1)->latest()->paginate(12);
        $categories = Category::where('parent_id', 0)
                        ->with('children')
                        ->get();

        return view('partials.shop', compact('products', 'categories'));
    }
}
