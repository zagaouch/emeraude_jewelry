@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:flex md:space-x-8">
            <!-- Checkout Form -->
            <div class="md:w-2/3">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Informations de livraison</h2>
                
                <form action="{{ route('checkout.store') }}" method="POST" class="bg-white shadow rounded-lg p-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Personal Information -->
                        <div class="md:col-span-2">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informations personnelles</h3>
                        </div>
                        
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Prénom</label>
                            <input type="text" id="first_name" name="first_name" 
                                   value="{{ old('first_name', $user->name ?? '') }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                        
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" id="last_name" name="last_name" 
                                   value="{{ old('last_name', $user->last_name ?? '') }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" 
                                   value="{{ old('email', $user->email ?? '') }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                            <input type="text" id="phone" name="phone" 
                                   value="{{ old('phone', $user->phone ?? '') }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                        
                        <!-- Shipping Address -->
                        <div class="md:col-span-2 mt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Adresse de livraison</h3>
                        </div>
                        
                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                            <input type="text" id="address" name="address" 
                                   value="{{ old('address', $user->address ?? '') }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                        
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">Ville</label>
                            <input type="text" id="city" name="city" 
                                   value="{{ old('city', $user->city ?? '') }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                        
                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-700">Pays</label>
                            <select id="country" name="country" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500">
                                <option value="France">France</option>
                                <option value="Belgique">Belgique</option>
                                <option value="Suisse">Suisse</option>
                                <option value="Luxembourg">Luxembourg</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="zip_code" class="block text-sm font-medium text-gray-700">Code postal</label>
                            <input type="text" id="zip_code" name="zip_code" 
                                   value="{{ old('zip_code', $user->zip_code ?? '') }}"
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                        
                        <!-- Payment Method -->
                        <div class="md:col-span-2 mt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Méthode de paiement</h3>
                            
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <input id="card" name="payment_method" type="radio" value="card" checked 
                                           class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300">
                                    <label for="card" class="ml-3 block text-sm font-medium text-gray-700">
                                        Carte de crédit
                                    </label>
                                </div>
                                
                                <div class="flex items-center">
                                    <input id="paypal" name="payment_method" type="radio" value="paypal" 
                                           class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300">
                                    <label for="paypal" class="ml-3 block text-sm font-medium text-gray-700">
                                        PayPal
                                    </label>
                                </div>
                                
                                <div class="flex items-center">
                                    <input id="bank_transfer" name="payment_method" type="radio" value="bank_transfer" 
                                           class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300">
                                    <label for="bank_transfer" class="ml-3 block text-sm font-medium text-gray-700">
                                        Virement bancaire
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 flex justify-end">
                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-md font-medium">
                            Passer la commande
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Order Summary -->
            <div class="md:w-1/3 mt-8 md:mt-0">
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-lg font-medium text-gray-900 mb-6">Récapitulatif de commande</h2>
                    
                    <div class="divide-y divide-gray-200">
                        <!-- resources/views/checkout/index.blade.php -->
            @foreach($cartItems as $id => $item)
            <div class="py-4 flex">
                <div class="flex-shrink-0 h-20 w-20 rounded-md overflow-hidden">
                    @if(!empty($item['image']))
                    <img src="{{ asset('storage/'.$item['image']) }}" 
                        class="h-full w-full object-cover"
                        alt="{{ $item['name'] }}">
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
                        <h3 class="text-sm font-medium text-gray-900">
                            {{ $item['name'] }}
                        </h3>
                        <p class="ml-4 text-sm font-medium text-gray-900">
                            {{ number_format($item['price'], 2) }} DH
                        </p>
                    </div>
                    
                    <div class="flex justify-between mt-1">
                        <p class="text-sm text-gray-500">
                            Quantité: {{ $item['quantity'] }}
                        </p>
                        <p class="text-sm font-medium text-gray-900">
                            {{ number_format($item['price'] * $item['quantity'], 2) }} DH
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
                    </div>
                    
                    <div class="mt-6 border-t border-gray-200 pt-6">
                        <div class="flex justify-between text-base font-medium text-gray-900">
                            <p>Total</p>
                            <p>{{ number_format($total, 2) }} DH</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection