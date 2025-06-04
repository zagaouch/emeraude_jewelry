@extends('admin.layouts.app')

@section('title', isset($product) ? 'Edit Product' : 'Create Product')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">{{ isset($product) ? 'Edit' : 'Add New' }} Jewelry Product</h1>
        </div>
    </div>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif
            
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="nom" class="block text-sm font-medium text-gray-700">Product Name</label>
                            <input type="text" name="nom" id="nom" value="{{ old('nom', $product->nom ?? '') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('nom')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">{{ old('description', $product->description ?? '') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-1">
                            <label for="prix" class="block text-sm font-medium text-gray-700">Price ($)</label>
                            <input type="number" step="0.01" name="prix" id="prix" value="{{ old('prix', $product->prix ?? '') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('prix')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-3 sm:col-span-1">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                            <select id="category_id" name="category_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                    {{ $category->nom }}
                                </option>
                                
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Product Image</label>
                        @if(isset($product) && $product->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Current product image" class="h-32 w-32 object-cover">
                            </div>
                        @endif
                        <div class="mt-2">
                            <input type="file" name="image" class="py-2 px-3 border border-gray-300 rounded-md text-sm">
                        </div>
                        @error('image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ isset($product) ? 'Update' : 'Save' }} Product
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection