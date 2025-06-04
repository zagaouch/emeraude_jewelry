@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Jewelry Products</h1>
            <p class="mt-2 text-sm text-gray-700">Manage your jewelry collection</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('admin.products.create') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                Add Product
            </a>
        </div>
    </div>

    <div class="mt-8 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($products as $product)
                @php
                // Convert to array if it's an object
                $productArray = is_object($product) ? $product->toArray() : $product;
                // Get the image path safely
                $image = $productArray['image'] ?? null;
                @endphp

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex-shrink-0 h-10 w-10">
                            @if(!empty($image))
                            <img class="h-10 w-10 rounded-full"
                                src="{{ asset('storage/' . $image) }}"
                                alt="Product Image">
                            @else
                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ url('/admin/product/'. $product->id)}}">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $productArray['nom'] ?? 'N/A' }}
                            </div>
                        </a>
                        <div class="text-sm text-gray-500 truncate max-w-xs">
                            {{$productArray['description'] ?? ''}}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            {{ is_object($product) ? ($product->category->nom ?? 'N/A') : ($productArray['category']['nom'] ?? 'N/A') }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            ${{ number_format($productArray['prix'] ?? 0, 2) }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        @if(isset($productArray['id']))
                        <a href="{{ route('admin.products.edit', $productArray['id']) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                        <form action="{{ route('admin.products.destroy', $productArray['id']) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        @else
                        <span class="text-red-500">No ID</span>
                        @endif
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection