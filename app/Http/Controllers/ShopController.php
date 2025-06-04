<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
  
   
    // app/Http/Controllers/ShopController.php

// app/Http/Controllers/ShopController.php

public function show(Product $product)
{
    // Load related products
    $relatedProducts = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->withCount('reviews')
        ->inRandomOrder()
        ->limit(4)
        ->get();
    
    // Only load reviews with user information
    $product->load(['reviews.user']);
    
    return view('productsshow', [
        'product' => $product,
        'relatedProducts' => $relatedProducts
    ]);
}

public function index(Request $request)
{
    $query = Product::query()->with('category')->withCount('reviews');
    
    // Search functionality
    if ($request->has('q')) {
        $searchTerm = $request->input('q');
        $query->where(function($q) use ($searchTerm) {
            $q->where('nom', 'like', "%{$searchTerm}%")
              ->orWhere('description', 'like', "%{$searchTerm}%");
        });
    }
    
    // Category filter
    if ($request->has('category')) {
        $query->where('category_id', $request->input('category'));
    }
    
    // Price filter
    if ($request->has('price')) {
        switch ($request->input('price')) {
            case '1':
                $query->where('prix', '<', 100);
                break;
            case '2':
                $query->whereBetween('prix', [100, 300]);
                break;
            case '3':
                $query->whereBetween('prix', [300, 500]);
                break;
            case '4':
                $query->where('prix', '>', 500);
                break;
        }
    }
    
    // Sorting
    switch ($request->input('sort', 'newest')) {
        case 'price_asc':
            $query->orderBy('prix');
            break;
        case 'price_desc':
            $query->orderByDesc('prix');
            break;
        case 'popular':
            $query->orderByDesc('reviews_count');
            break;
        case 'newest':
        default:
            $query->orderByDesc('created_at');
            break;
    }
    
    $products = $query->paginate(12);
    $categories = Category::withCount('products')->get();
    
    return view('shop', compact('products', 'categories'));
}

public function search(Request $request)
{
    return $this->index($request);
}


}
