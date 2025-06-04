@extends('layouts.app')

@section('content')
<div class="bg-gray-50">
    <!-- Product Detail Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <!-- Breadcrumb Navigation -->
            <nav class="bg-gray-100 px-6 py-4" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('home') }}" class="text-emerald-600 hover:text-emerald-800">Accueil</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <a href="{{ route('shop') }}" class="ml-2 text-emerald-600 hover:text-emerald-800">Boutique</a>
                        </div>
                    </li>
                    @if($product->category)
                    <li>
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <a href="{{ route('admin.categories.show', $product->category->id) }}" class="ml-2 text-emerald-600 hover:text-emerald-800">{{ $product->category->nom }}</a>
                        </div>
                    </li>
                    @endif
                    <li>
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2 text-gray-500">{{ $product->nom }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="md:flex">
                <!-- Product Image -->
                <div class="md:w-1/2 p-6">
                    <div class="rounded-lg overflow-hidden">
                        @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->nom }}" class="w-full h-auto object-cover">
                        @else
                        <div class="bg-gray-100 aspect-square flex items-center justify-center">
                            <svg class="w-1/2 h-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Product Details -->
                <div class="md:w-1/2 p-6">
                    <!-- Product Header -->
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">{{ $product->nom }}</h1>
                            
                            @if($product->category)
                            <p class="text-gray-600 mt-2">
                                Catégorie: 
                                <a href="{{ route('admin.categories.show', $product->category->id) }}" class="text-emerald-600 hover:text-emerald-800">
                                    {{ $product->category->nom }}
                                </a>
                            </p>
                            @endif
                        </div>
                        
                        <!-- Wishlist Button -->
                        <button class="text-gray-400 hover:text-red-500 transition-colors" title="Ajouter à la wishlist">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Rating and Reviews -->
                    <div class="mt-4 flex items-center">
                        <div class="flex items-center">
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


<p>Average Rating: {{ number_format($average, 1) }} / 5</p>

{{-- Render stars based on average --}}
@for($i = 1; $i <= 5; $i++)
    <svg class="w-5 h-5 {{ $i <= round($average) ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
    </svg>
@endfor

                            <span class="ml-2 text-gray-600">{{ $product->note ?? '0' }}/5 ({{ $product->reviews->count() }} avis)</span>
                        </div>
                        <a href="#reviews" class="ml-4 text-sm text-emerald-600 hover:text-emerald-800">Voir les avis</a>
                    </div>
                    
                    <!-- Price -->
                    <div class="mt-6">
                        @if($product->on_sale)
                        <div class="flex items-center">
                            <span class="text-3xl font-bold text-gray-900">{{ number_format($product->sale_price, 2) }} DH</span>
                            <span class="ml-3 text-xl text-gray-500 line-through">{{ number_format($product->prix, 2) }} DH</span>
                            <span class="ml-3 px-2 py-1 bg-red-100 text-red-800 text-sm font-bold rounded-full">
                                -{{ $product->discount_percent }}%
                            </span>
                        </div>
                        @else
                        <span class="text-3xl font-bold text-gray-900">{{ number_format($product->prix, 2) }} DH</span>
                        @endif
                    </div>
                    
                    <!-- Add to Cart -->
                    <!-- In your product view -->
<form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <button type="submit" class="bg-emerald-600 text-white px-4 py-2 rounded">
        Add to Cart
    </button>
</form>
                    
                    <!-- Product Description -->
                    <div class="mt-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Description</h2>
                        <div class="prose max-w-none text-gray-600">
                            {!! $product->description ?? '<p class="text-gray-500">Aucune description disponible</p>' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add this right before the Reviews Section -->
<div class="mt-12 bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900">Laisser un avis</h2>
    </div>
    
    <div class="p-6">
        @auth
            <form action="{{ route('reviews.store') }}" method="POST">
    @csrf
    <input type="hidden" name="produit_id" value="{{ $product->id }}">
    
    <!-- Rating -->
    <div class="mb-4">
        <label>Note</label>
        <select name="note" required class="form-control">
            <option value="1">1 ★</option>
            <option value="2">2 ★★</option>
            <option value="3" selected>3 ★★★</option>
            <option value="4">4 ★★★★</option>
            <option value="5">5 ★★★★★</option>
        </select>
    </div>
    
    <!-- Comment -->
    <div class="mb-4">
        <label>Commentaire</label>
        <textarea name="commentaire" required class="form-control" rows="3"></textarea>
    </div>
    
    <button type="submit" class="bg-emerald-600 text-white px-4 py-2 rounded">Envoyer</button>
</form>
        @else
            <div class="text-center py-4">
                <p class="text-gray-600">Vous devez être connecté pour laisser un avis.</p>
                <div class="mt-4">
                    <a href="{{ route('login') }}" class="text-emerald-600 hover:text-emerald-800 font-medium">Connectez-vous</a>
                    <span class="mx-2 text-gray-500">ou</span>
                    <a href="{{ route('register') }}" class="text-emerald-600 hover:text-emerald-800 font-medium">Créez un compte</a>
                </div>
            </div>
        @endauth
    </div>
</div>
        <!-- Reviews Section -->
        <div id="reviews" class="mt-12 bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-900">Avis clients</h2>
            </div>
            
            <div class="p-6">
                @if($product->reviews && $product->reviews->count() > 0)
                    @foreach($product->reviews as $review)
                    <div class="mb-6 pb-6 border-b border-gray-200 last:border-0 last:mb-0 last:pb-0">
                        <div class="flex items-center mb-2">
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $review->note ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>
                            <span class="ml-2 text-sm text-gray-600">{{ $review->created_at->format('d/m/Y') }}</span>
                        </div>
                        
                        <p class="text-gray-600 mt-1">{{ $review->commentaire }}</p>
                        <p class="text-sm text-gray-500 mt-2">- {{ $review->user->name ?? 'Anonyme' }}</p>
                    </div>
                    @endforeach
                @else
                    <div class="text-center py-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900">Aucun avis pour ce produit</h3>
                        <p class="mt-1 text-gray-500">Soyez le premier à laisser un commentaire.</p>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Related Products -->
        @if($relatedProducts && $relatedProducts->count() > 0)
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Vous pourriez aussi aimer</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $relatedProduct)
                <div class="group relative bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300 border border-gray-100">
                    <!-- Product Image -->
                    <a href="{{ route('products.show', $relatedProduct) }}" class="block">
                        <div class="relative pb-[100%] overflow-hidden">
                            @if($relatedProduct->image)
                                <img src="{{ asset('storage/'.$relatedProduct->image) }}" 
                                     alt="{{ $relatedProduct->nom }}" 
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
                        <a href="{{ route('products.show', $relatedProduct) }}" class="hover:text-emerald-600 transition-colors">
                            <h3 class="text-lg font-semibold text-gray-900 line-clamp-2">
                                {{ $relatedProduct->nom }}
                            </h3>
                        </a>
                        
                        <div class="mt-3 flex items-center justify-between">
                            <div>
                                @if($relatedProduct->on_sale)
                                    <span class="text-lg font-bold text-gray-900">
                                        {{ number_format($relatedProduct->sale_price, 2) }} DH
                                    </span>
                                    <span class="text-sm text-gray-500 line-through ml-2">
                                        {{ number_format($relatedProduct->prix, 2) }} DH
                                    </span>
                                @else
                                    <span class="text-lg font-bold text-gray-900">
                                        {{ number_format($relatedProduct->prix, 2) }} DH
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

<script>
    function incrementQuantity() {
        const quantityInput = document.getElementById('quantity');
        let quantity = parseInt(quantityInput.value);
        quantityInput.value = quantity + 1;
    }
    
    function decrementQuantity() {
        const quantityInput = document.getElementById('quantity');
        let quantity = parseInt(quantityInput.value);
        if (quantity > 1) {
            quantityInput.value = quantity - 1;
        }
    }
</script>
<script>
    // Set rating stars
    function setRating(rating) {
        // Update hidden input
        document.getElementById('rating-input').value = rating;
        
        // Update star display
        const stars = document.querySelectorAll('.review-star');
        stars.forEach(star => {
            const starRating = parseInt(star.getAttribute('data-rating'));
            if (starRating <= rating) {
                star.classList.remove('text-gray-300');
                star.classList.add('text-yellow-400');
            } else {
                star.classList.remove('text-yellow-400');
                star.classList.add('text-gray-300');
            }
        });
    }
    
    // Initialize rating if there was an old value
    document.addEventListener('DOMContentLoaded', function() {
        const oldRating = document.getElementById('rating-input').value;
        if (oldRating > 0) {
            setRating(oldRating);
        }
    });
</script>
@endsection