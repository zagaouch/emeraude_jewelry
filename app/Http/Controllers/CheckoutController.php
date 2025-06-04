<?php
// app/Http/Controllers/CheckoutController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Mail\OrderShipped;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
class CheckoutController extends Controller
{
    /**
     * Show the checkout page
     */
   
public function index()
{
    $cartItems = [];
    $sessionCart = session()->get('cart', []);
    $total = 0;
    
    foreach ($sessionCart as $productId => $item) {
        $product = Product::find($productId);
        
        if ($product) {
            $cartItems[$productId] = [
                'id' => $product->id,
                'name' => $product->nom,
                'price' => $product->on_sale ? $product->sale_price : $product->prix,
                'quantity' => $item['quantity'] ?? 1,
                'image' => $product->image // Add this line
            ];
            
            $total += $cartItems[$productId]['price'] * $cartItems[$productId]['quantity'];
        }
    }

    if (empty($cartItems)) {
        return redirect()->route('cart')->with('error', 'Your cart is empty');
    }

    return view('checkout.index', [
        'cartItems' => $cartItems,
        'total' => $total,
        'user' => Auth::user()
    ]);
}

    /**
     * Process the checkout
     */
    public function store(Request $request)
    {
        // Validate checkout data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'payment_method' => 'required|string|in:card,paypal,bank_transfer',
        ]);

        // Get cart items
        $cartItems = session()->get('cart', []);
        $subtotal = 0;

        // Calculate subtotal
        foreach ($cartItems as $id => $item) {
            $product = Product::find($id);
            if ($product) {
                $price = $product->on_sale ? $product->sale_price : $product->prix;
                $subtotal += $price * $item['quantity'];
            }
        }

        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'subtotal' => $subtotal,
            'shipping' => 0, // Add shipping calculation if needed
            'total' => $subtotal,
            'status' => 'pending',
            'shipping_address' => $validated['address'],
            'shipping_city' => $validated['city'],
            'shipping_country' => $validated['country'],
            'shipping_zip' => $validated['zip_code'],
            'payment_method' => $validated['payment_method']
        ]);

        // Create order items
        foreach ($cartItems as $id => $item) {
            $product = Product::find($id);
            if ($product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $item['quantity'],
                    'price' => $product->on_sale ? $product->sale_price : $product->prix
                ]);
            }
        }
    $order->load(['user', 'items.product']); // Load relationships
    $pdf = Pdf::loadView('invoices.order', compact('order'));

    // Send email
    Mail::to($order->user->email)->send(new OrderShipped($order, $pdf->output()));

        // Clear the cart
        session()->forget('cart');

        return redirect()->route('checkout.success')->with('order_id', $order->id);
    }

    /**
     * Show checkout success page
     */
    public function success()
    {
        if (!session()->has('order_id')) {
            return redirect()->route('home');
        }

        return view('checkout.success', [
            'orderId' => session('order_id')
        ]);
    }
}