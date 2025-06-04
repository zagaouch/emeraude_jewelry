<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-gray-500 text-sm font-medium">Products</h3>
            <p class="text-2xl font-bold">{{ $stats['products'] }}</p>
        </div>
        
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-gray-500 text-sm font-medium">Orders</h3>
            <p class="text-2xl font-bold">{{ $stats['orders'] }}</p>
        </div>
        
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-gray-500 text-sm font-medium">Users</h3>
            <p class="text-2xl font-bold">{{ $stats['users'] }}</p>
        </div>
        
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-gray-500 text-sm font-medium">Revenue</h3>
            <p class="text-2xl font-bold">{{ number_format($stats['revenue'], 2) }} DH</p>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-medium">Recent Orders</h2>
        </div>
        <div class="divide-y divide-gray-200">
            @foreach($recentOrders as $order)
            <div class="px-6 py-4 flex justify-between items-center">
                <div>
                    <p class="font-medium">Order #{{ $order->id }}</p>
                    <p class="text-sm text-gray-500">{{ $order->user->name }}</p>
                </div>
                <div class="text-right">
                    <p class="font-bold">{{ number_format($order->total, 2) }} DH</p>
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                        {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : 
                           ($order->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                <a href="{{ route('admin.orders.show', $order) }}" 
               class="text-emerald-600 hover:text-emerald-800"
               target="_blank">
               View
            </a>
            </div>
            @endforeach
        </div>
        <div class="px-6 py-4 border-t border-gray-200">
            <a href="{{ route('admin.orders.index') }}" class="text-emerald-600 hover:text-emerald-800">
                View all orders →
            </a>
        </div>
    </div>
</div>
@endsection