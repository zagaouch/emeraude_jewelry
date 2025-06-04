<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Best Sellers (existing)
        $bestSellers = Product::where('is_best_seller', true)
            ->with('category')
            ->take(8)
            ->get();
        
        // New Products (added)
        $newProducts = Product::where('is_new', true)
            ->orWhere('created_at', '>', now()->subDays(30)) // Products from last 30 days
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();
        
        // Categories (existing)
        $categories = Category::withCount('products')->get();
        
        return view('welcome', compact('bestSellers', 'newProducts', 'categories'));
    }
}