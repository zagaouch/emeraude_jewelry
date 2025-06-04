@extends('admin.layouts.app')

@section('title', 'Créer une Remise')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Créer une Nouvelle Remise</h1>
        </div>
    </div>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('admin.discounts.store') }}" method="POST">
            @csrf
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                            <input type="text" name="code" id="code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-1">
                            <label for="montant_remise" class="block text-sm font-medium text-gray-700">Montant</label>
                            <input type="number" step="0.01" name="montant_remise" id="montant_remise" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="col-span-3 sm:col-span-1">
                            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                            <select id="type" name="type" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                <option value="percentage">Pourcentage (%)</option>
                                <option value="fixed">Montant Fixe (DH)</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="date_expiration" class="block text-sm font-medium text-gray-700">Date d'Expiration</label>
                            <input type="datetime-local" name="date_expiration" id="date_expiration" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-1">
                            <label for="max_uses" class="block text-sm font-medium text-gray-700">Utilisations Maximales</label>
                            <input type="number" name="max_uses" id="max_uses" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Créer la Remise
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection