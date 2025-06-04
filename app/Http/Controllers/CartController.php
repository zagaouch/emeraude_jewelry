<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);
        $total = 0;
        
        // Calculate total and get product details
        foreach ($cartItems as $id => $item) {
            $product = Product::find($id);
            if ($product) {
                $cartItems[$id]['product'] = $product;
                $price = $product->on_sale ? $product->sale_price : $product->prix;
                $total += $price * $item['quantity'];
            }
        }

        return view('cart.index', compact('cartItems', 'total'));
    }

    // app/Http/Controllers/CartController.php
    // app/Http/Controllers/CartController.php
// app/Http/Controllers/CartController.php
public function add(Request $request, $productId)
{
    $product = Product::findOrFail($productId);
    
    $cart = session()->get('cart', []);

    if (isset($cart[$productId])) {
        $cart[$productId]['quantity']++;
    } else {
        $cart[$productId] = [
            'quantity' => 1,
            // Don't store price in session to avoid inconsistency
            // We'll get fresh price data at checkout
        ];
    }

    session()->put('cart', $cart);
    
    return redirect()->back()->with('success', 'Produit ajouté au panier!');
}
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Panier mis à jour');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Produit supprimé');
        }
    }
}