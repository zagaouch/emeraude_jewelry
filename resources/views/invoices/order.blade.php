
<html>
<head>
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; }
        .total { margin-top: 20px; text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ config('app.name') }}</h1>
        <p>Invoice #{{ $order->id }}</p>
        <p>Date: {{ $order->created_at->format('d/m/Y') }}</p>
    </div>

    <div class="customer-info">
        <h2>Bill To:</h2>
        <p>{{ $order->user->name }}</p>
        <p>{{ $order->shipping_address }}</p>
        <p>{{ $order->shipping_city }}, {{ $order->shipping_zip }}</p>
        <p>{{ $order->shipping_country }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->nom }}</td>
                <td>{{ number_format($item->price, 2) }} DH</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price * $item->quantity, 2) }} DH</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        <h3>Subtotal: {{ number_format($order->subtotal, 2) }} DH</h3>
        <h3>Shipping: {{ number_format($order->shipping, 2) }} DH</h3>
        <h2>Grand Total: {{ number_format($order->total, 2) }} DH</h2>
    </div>

    <div class="footer">
        <p>Thank you for your business!</p>
    </div>
</body>
</html>