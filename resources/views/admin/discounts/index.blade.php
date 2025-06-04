@extends('admin.layouts.app')

@section('title', 'Gestion des Remises')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Gestion des Remises</h1>
            <p class="mt-2 text-sm text-gray-700">Gérez tous les codes de réduction et promotions</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('admin.discounts.create') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                Ajouter une Remise
            </a>
        </div>
    </div>

    <div class="mt-8 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Code
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Montant
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Type
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date d'Expiration
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Statut
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($discounts as $remise)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            <span class="font-mono bg-gray-100 px-2 py-1 rounded">{{ $remise->code }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            @if($remise->type === 'percentage')
                                {{ $remise->montant_remise }}%
                            @else
                                {{ number_format($remise->montant_remise, 2) }}DH
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            {{ ucfirst($remise->type === 'percentage' ? 'Pourcentage' : 'Montant Fixe') }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            {{ $remise->date_expiration ? $remise->date_expiration->format('d/m/Y') : 'Pas d\'expiration' }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            @if($remise->isActive()) bg-green-100 text-green-800
                            @else bg-red-100 text-red-800
                            @endif">
                            {{ $remise->isActive() ? 'Active' : 'Expirée' }}
                        </span>
                    </td>
                
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href=""
                            class="text-indigo-600 hover:text-indigo-900 mr-3">Modifier</a>
                            <form action=""
                                method="POST" class="inline">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette remise ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">
                        Aucune remise trouvée. <a href="{{ route('admin.discounts.create') }}" class="text-indigo-600 hover:text-indigo-900">Créer une remise</a>.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $discounts->links() }}
    </div>
</div>
@endsection