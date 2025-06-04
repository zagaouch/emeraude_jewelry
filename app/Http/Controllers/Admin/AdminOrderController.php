<?php
// app/Http/Controllers/Admin/AdminOrderController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'items.product'])->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'items.product']);
        $pdf = Pdf::loadView('invoices.order', compact('order'));
        
        //return $pdf->stream('invoice-'.$order->id.'.pdf');
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        // zido shipped hna bach tsl7 f blad edite order
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled,shipped'
        ]);

        $order->update($validated);
        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully');
    }
}
