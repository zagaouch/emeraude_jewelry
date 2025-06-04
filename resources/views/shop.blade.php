@extends('layouts.app')

@section('content')
<div class="bg-gray-50">
    <!-- Shop Header -->
    <div class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Notre Collection</h1>
                    
                    <p class="mt-2 text-gray-600">Découvrez tous nos bijoux artisanaux</p>
                </div>
                
                <!-- Sort Control -->
                <div class="mt-4 md:mt-0">
                    <form method="GET" action="{{ route('shop') }}">
                        <label for="sort" class="sr-only">Trier par</label>
                        <select id="sort" name="sort" onchange="this.form.submit()" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm rounded-md">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Nouveautés</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Prix: Croissant</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Prix: Décroissant</option>
                            <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Les plus populaires</option>
                        </select>
                    </form>
                </div>
            </div>
            
            <!-- Active filters -->
            @if(request('category') || request('price'))
            <div class="mt-4">
                <div class="flex flex-wrap gap-2 items-center">
                    @if(request('category'))
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                        Catégorie: {{ \App\Models\Category::find(request('category'))->nom ?? '' }}
                        <a href="{{ url()->current() }}?{{ http_build_query(request()->except('category')) }}" class="ml-1.5 inline-flex text-emerald-400 hover:text-emerald-600">
                            <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                            </svg>
                        </a>
                    </span>
                    @endif
                    
                    @if(request('price'))
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                        @php
                            $priceRanges = [
                                '1' => 'Moins de 100 DH',
                                '2' => '100 DH - 300 DH',
                                '3' => '300 DH - 500 DH',
                                '4' => 'Plus de 500 DH'
                            ];
                        @endphp
                        Prix: {{ $priceRanges[request('price')] ?? '' }}
                        <a href="{{ url()->current() }}?{{ http_build_query(request()->except('price')) }}" class="ml-1.5 inline-flex text-emerald-400 hover:text-emerald-600">
                            <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                            </svg>
                        </a>
                    </span>
                    @endif
                    
                    <a href="{{ route('shop') }}" class="text-sm text-emerald-600 hover:text-emerald-800">Effacer tout</a>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Main Shop Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row">
            <!-- Filters Sidebar -->
            <div class="md:w-64 pr-8 mb-8 md:mb-0">
                <form method="GET" action="{{ route('shop') }}">
                    <div class="bg-white p-4 rounded-lg shadow-sm sticky top-4">
                        <!-- Categories Filter -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-3">Catégories</h3>
                            <ul class="space-y-2">
                                @foreach($categories as $category)
                                <li>
                                    <label class="flex items-center">
                                        <input type="radio" name="category" value="{{ $category->id }}" 
                                               {{ request('category') == $category->id ? 'checked' : '' }}
                                               class="h-4 w-4 border-gray-300 text-emerald-600 focus:ring-emerald-500">
                                        <span class="ml-3 text-gray-600">{{ $category->nom }}</span>
                                        <span class="ml-auto text-gray-400">({{ $category->products_count }})</span>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        
                        <!-- Price Filter -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-3">Prix</h3>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <input type="radio" id="price-all" name="price" value="" 
                                           {{ !request('price') ? 'checked' : '' }}
                                           class="h-4 w-4 border-gray-300 text-emerald-600 focus:ring-emerald-500">
                                    <label for="price-all" class="ml-3 text-sm text-gray-600">Tous les prix</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" id="price-1" name="price" value="1" 
                                           {{ request('price') == '1' ? 'checked' : '' }}
                                           class="h-4 w-4 border-gray-300 text-emerald-600 focus:ring-emerald-500">
                                    <label for="price-1" class="ml-3 text-sm text-gray-600">Moins de 100 DH</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" id="price-2" name="price" value="2" 
                                           {{ request('price') == '2' ? 'checked' : '' }}
                                           class="h-4 w-4 border-gray-300 text-emerald-600 focus:ring-emerald-500">
                                    <label for="price-2" class="ml-3 text-sm text-gray-600">100 DH - 300 DH</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" id="price-3" name="price" value="3" 
                                           {{ request('price') == '3' ? 'checked' : '' }}
                                           class="h-4 w-4 border-gray-300 text-emerald-600 focus:ring-emerald-500">
                                    <label for="price-3" class="ml-3 text-sm text-gray-600">300 DH - 500 DH</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" id="price-4" name="price" value="4" 
                                           {{ request('price') == '4' ? 'checked' : '' }}
                                           class="h-4 w-4 border-gray-300 text-emerald-600 focus:ring-emerald-500">
                                    <label for="price-4" class="ml-3 text-sm text-gray-600">Plus de 500 DH</label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="w-full px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700">
                            Appliquer les filtres
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Products Grid -->
            <div class="flex-1">
                @if($products->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($products as $product)
                        <div class="group relative bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300 border border-gray-100">
                            <!-- Product Badges -->
                            <div class="absolute top-2 left-2 z-10 space-y-1">
                                @if($product->on_sale)
                                <span class="block bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                    PROMO -{{ $product->discount_percent }}%
                                </span>
                                @endif
                                
                                @if($product->created_at->diffInDays() < 30)
                                <span class="block bg-emerald-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                    Nouveau
                                </span>
                                @endif
                            </div>
                            
                            <!-- Product Image -->
                            <a href="{{ route('products.show', $product) }}" class="block">
                                <div class="relative pb-[100%] overflow-hidden">
                                    @if($product->image)
                                        <img src="{{ asset('storage/'.$product->image) }}" 
                                             alt="{{ $product->nom }}" 
                                             class="absolute h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="absolute inset-0 bg-gray-100 flex items-center justify-center">
                                            <svg class="w-1/2 h-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </a>
                            
                            <!-- Product Details -->
                            <div class="p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <a href="{{ route('products.show', $product) }}" class="hover:text-emerald-600 transition-colors">
                                            <h3 class="text-lg font-semibold text-gray-900 line-clamp-2">
                                                {{ $product->nom }}
                                            </h3>
                                        </a>
                                        
                                        @if($product->category)
                                            <p class="text-gray-500 mt-1 text-sm">
                                                {{ $product->category->nom }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Rating Stars -->
                                <div class="flex items-center mt-2">
                                    <!-- function calculate average -->
                        @php
                    
    $sum = 0;
    $count = $product->reviews->count(); // Count total reviews
@endphp

@foreach($product->reviews as $review)
    @php
        $sum += $review->note;
    @endphp
@endforeach

@php
    $average = $count > 0 ? $sum / $count : 0;
@endphp


<p>{{ number_format($average, 1) }} / 5</p>

{{-- Render stars based on average --}}
@for($i = 1; $i <= 5; $i++)
    <svg class="w-5 h-5 {{ $i <= round($average) ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
    </svg>
@endfor
                                    <span class="text-xs text-gray-500 ml-1">({{ $product->reviews_count }})</span>
                                </div>
                                
                                <!-- Price & Add to Cart -->
                                <div class="mt-3 flex items-center justify-between">
                                    <div>
                                        @if($product->on_sale)
                                            <span class="text-lg font-bold text-gray-900">
                                                {{ number_format($product->sale_price, 2) }} DH
                                            </span>
                                            <span class="text-sm text-gray-500 line-through ml-2">
                                                {{ number_format($product->prix, 2) }} DH
                                            </span>
                                        @else
                                            <span class="text-lg font-bold text-gray-900">
                                                {{ number_format($product->prix, 2) }} DH
                                            </span>
                                        @endif
                                    </div>
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-white bg-emerald-600 hover:bg-emerald-700 px-3 py-1 rounded-full text-sm transition-colors duration-300" title="Ajouter au panier">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $products->appends(request()->query())->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900">Aucun produit trouvé</h3>
                        <p class="mt-1 text-gray-500">Essayez d'ajuster vos filtres de recherche.</p>
                        <div class="mt-6">
                            <a href="{{ route('shop') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                                Réinitialiser les filtres
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection