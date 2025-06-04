@extends('admin.layouts.app')

@section('title', isset($category) ? 'Edit Category' : 'Create Category')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">{{ isset($category) ? 'Edit' : 'Create' }} Category</h1>
        </div>
    </div>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}" method="POST">
            @csrf
            @if(isset($category))
                @method('PUT')
            @endif
            
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="nom" class="block text-sm font-medium text-gray-700">Category Name</label>
                            <input type="text" name="nom" id="nom" value="{{ old('nom', $category->nom ?? '') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('nom')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ isset($category) ? 'Update' : 'Save' }} Category
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection