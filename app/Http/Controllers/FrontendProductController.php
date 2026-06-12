<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    public function index()
    {
        $products   = Product::where('status', 1)->latest()->paginate(12);
        $categories = Category::where('parent_id', 0)
                    ->with('children')
                    ->get();

        return view('partials.productlist', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product    = Product::findOrFail($id);
        $categories = Category::where('parent_id', 0)
                    ->with('children')
                    ->get();

        return view('partials.productlist', compact('product', 'categories'));
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

        return view('partials.productlist', compact('category', 'products', 'categories'));
    }
}
