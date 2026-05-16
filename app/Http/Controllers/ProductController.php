<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   // Product listing page
    public function index()
    {
        $products = Product::with('categories')->paginate(12);
        return view('products.index', compact('products'));
    }

    // Single product page
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', compact('product'));
    }
}
