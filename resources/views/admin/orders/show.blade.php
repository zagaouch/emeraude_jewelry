@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Order #{{ $order->id }}</h1>
        <div class="flex space-x-2">
            <a href="{{ route('admin.orders.invoice', $order->id) }}" 
               class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Download Invoice
            </a>
            <a href="{{ route('admin.orders.index') }}" 
               class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to orders
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Order Details Card -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-lg font-medium">Order Details</h2>
                    <span class="px-3 py-1 rounded-full text-xs font-medium 
                        @if($order->status === 'completed') bg-green-100 text-green-800
                        @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                        @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                        @else bg-yellow-100 text-yellow-800 @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Customer Information</h3>
                        <div class="mt-2 space-y-1">
                            <p class="text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ $order->user->name }}
                            </p>
                            <p class="text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                {{ $order->user->email }}
                            </p>
                            <p class="text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                {{ $order->user->phone ?? 'N/A' }}
                            </p>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Shipping Information</h3>
                        <div class="mt-2 space-y-1">
                            <p class="text-sm flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 mt-0.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>
                                    {{ $order->shipping_address }}<br>
                                    {{ $order->shipping_city }}, {{ $order->shipping_country }} {{ $order->shipping_zip }}
                                </span>
                            </p>
                            <p class="text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                </svg>
                                {{ $order->shipping_method ?? 'Standard Shipping' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Items Card -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-medium">Order Items</h2>
                </div>
                <div class="divide-y divide-gray-200">
                    @foreach($order->items as $item)
                    <div class="px-6 py-4 flex">
                        <div class="flex-shrink-0 h-20 w-20 rounded-md overflow-hidden border border-gray-200">
                            @if($item->product->image)
                            <img src="{{ asset('storage/'.$item->product->image) }}" class="h-full w-full object-cover">
                            @else
                            <div class="h-full w-full bg-gray-100 flex items-center justify-center">
                                <svg class="h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            @endif
                        </div>
                        <div class="ml-4 flex-1">
                            <div class="flex justify-between">
                                <h3 class="text-sm font-medium text-gray-900">{{ $item->product->nom }}</h3>
                                <p class="ml-4 text-sm font-medium text-gray-900">{{ number_format($item->price, 2) }} DH</p>
                            </div>
                            <div class="mt-1 text-sm text-gray-500">SKU: {{ $item->product->sku ?? 'N/A' }}</div>
                            <div class="mt-1 text-sm text-gray-500">Quantity: {{ $item->quantity }}</div>
                            <div class="mt-1 text-sm font-medium text-gray-900">Total: {{ number_format($item->price * $item->quantity, 2) }} DH</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="px-6 py-4 border-t border-gray-200">
                    <div class="flex justify-between">
                        <div class="text-sm text-gray-500">Subtotal</div>
                        <div class="text-sm font-medium">{{ number_format($order->subtotal, 2) }} DH</div>
                    </div>
                    <div class="flex justify-between mt-2">
                        <div class="text-sm text-gray-500">Shipping</div>
                        <div class="text-sm font-medium">{{ number_format($order->shipping, 2) }} DH</div>
                    </div>
                    @if($order->discount > 0)
                    <div class="flex justify-between mt-2">
                        <div class="text-sm text-gray-500">Discount</div>
                        <div class="text-sm font-medium text-green-600">-{{ number_format($order->discount, 2) }} DH</div>
                    </div>
                    @endif
                    <div class="flex justify-between mt-4 pt-4 border-t border-gray-200">
                        <div class="text-base font-medium">Total</div>
                        <div class="text-base font-bold">{{ number_format($order->total, 2) }} DH</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            <!-- Order Summary Card -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-medium">Order Summary</h2>
                </div>
                <div class="px-6 py-4 space-y-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Payment Method</h3>
                        <p class="mt-1 text-sm flex items-center">
                            @if($order->payment_method === 'credit_card')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            @endif
                            {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}
                        </p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Order Date</h3>
                        <p class="mt-1 text-sm">{{ $order->created_at->format('M j, Y \a\t g:i a') }}</p>
                    </div>
                    @if($order->notes)
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Customer Notes</h3>
                        <p class="mt-1 text-sm text-gray-700 italic">"{{ $order->notes }}"</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Update Status Card -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-medium">Update Status</h2>
                </div>
                <div class="px-6 py-4">
                    <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Order Status</label>
                                <select name="status" id="status" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm rounded-md">
                                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                                    <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                            
                            <div>
                                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                                    Update Order
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection