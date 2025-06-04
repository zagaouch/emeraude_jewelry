<!-- resources/views/admin/orders/index.blade.php -->
@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Orders Management</h1>
    
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($orders as $order)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">#{{ $order->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                          <!-- modification span kolllha bavh tzid shipped -->
                    @php
                        $statusClass = match($order->status) {
                            'completed' => 'bg-green-100 text-green-800',
                            'cancelled' => 'bg-red-100 text-red-800',
                            'shipped' => 'bg-green-100 text-green-400',
                            default => 'bg-yellow-100 text-yellow-800',
                        };
                    @endphp

                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                        {{ ucfirst($order->status) }}
                    </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($order->total, 2) }} DH</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.orders.show', $order) }}" class="text-emerald-600 hover:text-emerald-900 mr-3">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>
@endsection