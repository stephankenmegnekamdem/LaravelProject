<?php

namespace App\Http\Controllers\Admin2;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $categories = Category::with('parent')->paginate(20);
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
           //'status' => 'required|boolean',


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
        $category->load('parent', 'children');
        return view('admin2.categories.show', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
{
    // ✅ Exclude the current category from parent options
    $categories = Category::where('id', '!=', $category->id)
        ->orderBy('title')
        ->get(['id', 'title']);

    return view('admin2.categories.edit', compact('category', 'categories'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validate incoming request
        $validated = $request->validate([
            'parent_id'   => 'nullable|integer|exists:categories,id',
            'title'       => 'required|string|max:255',
            'keywords'    => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'      => 'required|in:0,1',
        ]);

        // Update fields from validated data
        $category->parent_id   = $validated['parent_id'] ?? 0;
        $category->title       = $validated['title'];
        $category->keywords    = $validated['keywords'] ?? null;
        $category->description = $validated['description'] ?? null;
        $category->status      = $validated['status'];

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            // Store new image and save path
            $category->image = $request->file('image')->store('categories', 'public');
        }

        // Save updated category
        $category->save();

        // Redirect with success message
        return redirect()
            ->route('admin2.categories.index')
            ->with('success', 'Category updated successfully.');
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
