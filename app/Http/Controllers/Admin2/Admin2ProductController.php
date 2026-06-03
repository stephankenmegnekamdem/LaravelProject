<?php

namespace App\Http\Controllers\Admin2;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Admin2ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
    return view('admin2.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
    return view('admin2.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        //
        $imagePath = null;
        if ($request->hasFile('image')) {
           $imagePath = $request->file('image')->store('products', 'public');
        }

       $product = new Product();
        $product  ->  category_id = $request->category_id;
        $product->user_id = 1;
          $product  ->  title = $request->title;
           $product  -> keywords = $request->keywords;
           $product  -> description = $request->description;
          $product  ->  detail = $request->detail;
           $product  -> price = $request->price;
           $product  -> image = $imagePath;
           $product  -> stock = $request->stock ?? 0;
           $product  -> minstock = $request->minstock ?? 0;
           $product  -> discount = $request->discount ?? 0;
           $product  -> status = $request->status ?? 0;


         $product->save();

        return redirect()
            ->route('admin2.product.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
         $product->load('category.parent.parent.parent');
        return view('admin2.products.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //

         $categories = Category::with('parent')->get();

    return view('admin2.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
{
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->image = $request->file('image')->store('products', 'public');
    }
    // No else — if no new image, $product->image stays untouched

    $product->category_id = $request->category_id;
    $product->user_id     = 1;
    $product->title       = $request->title;
    $product->keywords    = $request->keywords;
    $product->description = $request->description;
    $product->detail      = $request->detail;
    $product->price       = $request->price;
    $product->stock       = $request->stock ?? 0;
    $product->minstock    = $request->minstock ?? 0;
    $product->discount    = $request->discount ?? 0;
    $product->status      = $request->status ?? 0;

    $product->save();

    return redirect()
        ->route('admin2.product.index')
        ->with('success', 'Product Updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
         $product->delete();//
        return redirect()
            ->route('admin2.product.index')
            ->with('success', 'Product deleted successfully.');
    }
}
