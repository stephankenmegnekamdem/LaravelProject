<?php

namespace App\Http\Controllers\Admin2;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $categories = Category::with('parent')->get();
    return view('admin2.categories.index', compact('categories'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $categories = Category::with('parent')->get();
    return view('admin2.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            //'parent_id' => 'nullable|exists:categories,id',
            'title' => 'required|string|max:255',
            'keywords' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           // 'status' => 'required|boolean',


        ]);

        $category = new Category();

        $category-> parent_id = $request->parent_id ?? 0;
        $category-> title = $request->title ;
        $category-> keywords = $request->keywords ;
        $category-> description = $request->description;
        $category-> status = $request->status ?? 0;
        if ($request->hasFile('image')) {
           $category->image = $request->file('image')->store('categories', 'public');
        }
       $category->save();

        return redirect()
            ->route('admin2.categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //

        $categories = Category::with('parent')->get();
        return view('admin2.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();//
        return redirect()
            ->route('admin2.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
