<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function show(Order $order)
{
    return view('orders.show', compact('order'));
}
public function invoice(Order $order)
{
    // Make sure you have a view for the invoice at resources/views/admin/orders/invoice.blade.php
    $pdf = Pdf::loadView('admin.orders.invoice', compact('order'));
    
    // Download the PDF with a filename
    return $pdf->download('invoice-'.$order->id.'.pdf');
}
}
