<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $order->id }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
        
        body {
            font-family: 'Poppins', 'DejaVu Sans', sans-serif;
            color: #333;
            line-height: 1.6;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }
        
        .invoice-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 40px;
            background: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .header h1 {
            color: #4f46e5;
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }
        
        .invoice-meta {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        
        .invoice-number {
            font-weight: 500;
            color: #4f46e5;
        }
        
        .invoice-date {
            color: #6b7280;
        }
        
        .customer-info {
            background: #f9fafb;
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 30px;
        }
        
        .customer-info h2 {
            margin-top: 0;
            color: #4f46e5;
            font-size: 18px;
            font-weight: 500;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
        }
        
        .table thead {
            background-color: #4f46e5;
            color: white;
        }
        
        .table th {
            padding: 12px 15px;
            text-align: left;
            font-weight: 500;
        }
        
        .table td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }
        
        .table tr:last-child td {
            border-bottom: none;
        }
        
        .table tbody tr:hover {
            background-color: #f5f5ff;
        }
        
        .text-right {
            text-align: right;
        }
        
        .totals {
            margin-top: 30px;
            padding: 20px;
            background: #f9fafb;
            border-radius: 6px;
        }
        
        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .grand-total {
            font-size: 18px;
            font-weight: 600;
            color: #4f46e5;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
        }
        
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #6b7280;
            font-size: 14px;
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
        }
        
        .status-paid {
            background: #dcfce7;
            color: #166534;
        }
        
        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }
        
        .payment-method {
            display: flex;
            align-items: center;
            margin-top: 5px;
        }
        
        .payment-method svg {
            margin-right: 8px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="header">
            <h1>{{ config('app.name') }}</h1>
            <div class="invoice-meta">
                <span class="invoice-number">Invoice #{{ $order->id }}</span>
                <span class="invoice-date">Date: {{ $order->created_at->format('F j, Y') }}</span>
            </div>
        </div>

        <div class="customer-info">
            <h2>Bill To:</h2>
            <p><strong>{{ $order->user->name }}</strong></p>
            <p>{{ $order->shipping_address }}</p>
            <p>{{ $order->shipping_city }}, {{ $order->shipping_zip }}</p>
            <p>{{ $order->shipping_country }}</p>
            
            <div style="margin-top: 15px;">
                <span class="status-badge status-{{ $order->payment_status === 'paid' ? 'paid' : 'pending' }}">
                    {{ ucfirst($order->payment_status) }}
                </span>
                <div class="payment-method">
                    @if($order->payment_method === 'credit_card')
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    @endif
                    <span>{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</span>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th class="text-right">Price</th>
                    <th class="text-right">Quantity</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->nom }}</td>
                    <td class="text-right">{{ number_format($item->price, 2) }} €</td>
                    <td class="text-right">{{ $item->quantity }}</td>
                    <td class="text-right">{{ number_format($item->price * $item->quantity, 2) }} €</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="totals">
            @if($order->discount > 0)
            <div class="total-row">
                <span>Discount:</span>
                <span>-{{ number_format($order->discount, 2) }} €</span>
            </div>
            @endif
            <div class="total-row grand-total">
                <span>Grand Total:</span>
                <span>{{ number_format($order->total, 2) }} €</span>
            </div>

<div class="footer">
            <p>Thank you for your business!</p>
            <p>If you have any questions about this invoice, please contact our support team.</p>
        </div>


        </div>

        
    </div>
</body>
</html>