<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:categories,nom',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Store the image
        $imagePath = $request->file('image')->store('category_images', 'public');
    
        // Create category with image path
        Category::create([
            'nom' => $validated['nom'],
            'image' => $imagePath
        ]);
    
        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category created successfully.');
    }
    
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:categories,nom,'.$category->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Handle image update if new image was uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($category->image);
            
            // Store new image
            $validated['image'] = $request->file('image')->store('category_images', 'public');
        }
    
        $category->update($validated);
    
        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category updated successfully.');
    }
    /**
     * Display the specified category.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

  
   
    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->products()->count() > 0) {
            return redirect()->back()
                             ->with('error', 'Cannot delete category with associated products.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category deleted successfully.');
    }
}