@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order #{{ $order->id }}</h1>
    
    <div class="card">
        <div class="card-body">
            <p><strong>Total:</strong> {{ number_format($order->total, 2) }}DH</p>
            <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
            <!-- Add more order details as needed -->
        </div>
    </div>
    
    <a href="{{ route('orders.index') }}" class="btn btn-primary mt-3">
        Back to Orders
    </a>
</div>
@endsection