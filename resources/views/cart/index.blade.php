@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Votre Panier</h1>
        
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(empty($cartItems))
            <div class="bg-white rounded-lg shadow p-6 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h2 class="text-xl font-medium text-gray-900 mt-4">Votre panier est vide</h2>
                <p class="mt-2 text-gray-600">Parcourez nos produits et ajoutez des articles à votre panier</p>
                <a href="{{ route('shop') }}" class="mt-6 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700">
                    Continuer vos achats
                </a>
            </div>
        @else
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Récapitulatif de commande
                    </h3>
                </div>
                <div class="border-t border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Produit
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Prix
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Quantité
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($cartItems as $id => $item)
                                @if(isset($item['product']))
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-20 w-20">
                                                @if($item['product']->image)
                                                    <img class="h-20 w-20 object-cover rounded" src="{{ asset('storage/'.$item['product']->image) }}" alt="{{ $item['product']->nom }}">
                                                @else
                                                    <div class="h-20 w-20 bg-gray-100 rounded flex items-center justify-center">
                                                        <svg class="h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $item['product']->nom }}</div>
                                                <div class="text-sm text-gray-500">{{ $item['product']->category->nom ?? '' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            @if($item['product']->on_sale)
                                                <span class="font-bold">{{ number_format($item['product']->sale_price, 2) }} DH</span>
                                                <span class="text-xs text-gray-500 line-through ml-1">{{ number_format($item['product']->prix, 2) }} DH</span>
                                            @else
                                                <span class="font-bold">{{ number_format($item['product']->prix, 2) }} DH</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" 
                                                   class="w-20 p-2 border rounded-md text-center" onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        @php
                                            $price = $item['product']->on_sale ? $item['product']->sale_price : $item['product']->prix;
                                            $itemTotal = $price * $item['quantity'];
                                        @endphp
                                        {{ number_format($itemTotal, 2) }} DH
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-4 bg-gray-50 sm:px-6 flex justify-between items-center">
                    <div class="text-lg font-bold">
                        Total: {{ number_format($total, 2) }} DH
                    </div>
                    <div class="space-x-4">
                        <a href="{{ route('shop') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            Continuer vos achats
                        </a>
                        <a href="{{ route('checkout') }}" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-md font-medium text-center">
    Passer la commande
</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection