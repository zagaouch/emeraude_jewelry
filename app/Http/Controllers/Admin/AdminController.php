<?php
// app/Http/Controllers/Admin/AdminController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'products' => Product::count(),
            'orders' => Order::count(),
            'users' => User::count(),
            'revenue' => Order::where('status', 'completed')->sum('total')
        ];

        $recentOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentOrders'));
    }
}