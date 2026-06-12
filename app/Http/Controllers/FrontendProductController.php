<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    //
    public function index()
    {
       // $products   = Product::where('status', 1)->latest()->paginate(12);
        //$categories = Category::where('status', 1)->get();

        //return view('frontend.products.index', compact('products', 'categories'));
        return view('partials.productlist');
    }
}
