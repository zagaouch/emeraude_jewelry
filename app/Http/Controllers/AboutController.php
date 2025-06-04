<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function about()
    {
        // Best Sellers (existing)
        
        
        return view('about');
    }
}