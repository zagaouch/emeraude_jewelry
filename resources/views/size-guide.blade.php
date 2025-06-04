@extends('layouts.app')

@section('content')
<div class="bg-emerald-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-emerald-800 mb-4">Guide des Tailles</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Trouvez la taille parfaite pour vos bijoux Emeraude Jewelry
            </p>
        </div>

        <!-- Size Guide Navigation -->
        <div class="mb-8 flex flex-wrap justify-center gap-2">
            <a href="#bagues" class="px-4 py-2 bg-emerald-600 text-white rounded-full text-sm font-medium">Bagues</a>
            <a href="#colliers" class="px-4 py-2 bg-white text-emerald-700 border border-emerald-200 rounded-full text-sm font-medium hover:bg-emerald-50">Colliers</a>
            <a href="#bracelets" class="px-4 py-2 bg-white text-emerald-700 border border-emerald-200 rounded-full text-sm font-medium hover:bg-emerald-50">Bracelets</a>
            <a href="#boucles" class="px-4 py-2 bg-white text-emerald-700 border border-emerald-200 rounded-full text-sm font-medium hover:bg-emerald-50">Boucles d'oreilles</a>
        </div>

        <!-- Rings Size Guide -->
        <div id="bagues" class="bg-white p-8 rounded-xl shadow-lg border border-emerald-100 mb-12">
            <div class="flex items-center mb-6">
                <div class="bg-emerald-100 p-3 rounded-full mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6m6-6v12m6-6a2 2 0 100-4 2 2 0 000 4z" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-emerald-800">Guide des Tailles de Bagues</h2>
            </div>

            <div class="mb-6">
                <h3 class="font-medium text-emerald-700 mb-3">Comment mesurer votre taille de doigt</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-emerald-50 p-4 rounded-lg">
                        <h4 class="font-medium text-emerald-800 mb-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                            </svg>
                            Méthode 1 : Avec un baguier
                        </h4>
                        <p class="text-gray-600 text-sm">Utilisez notre baguier imprimable ou essayez différentes tailles dans une bijouterie pour trouver votre taille parfaite.</p>
                    </div>
                    <div class="bg-emerald-50 p-4 rounded-lg">
                        <h4 class="font-medium text-emerald-800 mb-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                            </svg>
                            Méthode 2 : Mesurez votre doigt
                        </h4>
                        <p class="text-gray-600 text-sm">Enroulez une bande de papier autour de votre doigt, marquez le point de rencontre et mesurez la longueur en mm.</p>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <h3 class="font-medium text-emerald-700 mb-3">Tableau des tailles internationales</h3>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-emerald-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-emerald-800 uppercase tracking-wider">France</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-emerald-800 uppercase tracking-wider">Diamètre (mm)</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-emerald-800 uppercase tracking-wider">Circonférence (mm)</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-emerald-800 uppercase tracking-wider">USA/Canada</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-emerald-800 uppercase tracking-wider">UK/Australie</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">44</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">14.0 mm</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">44.0 mm</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">F½</td>
                        </tr>
                        <tr class="bg-emerald-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">46</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">14.6 mm</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">46.0 mm</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">4</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">H</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Necklaces Size Guide -->
        <div id="colliers" class="bg-white p-8 rounded-xl shadow-lg border border-emerald-100 mb-12">
            <div class="flex items-center mb-6">
                <div class="bg-emerald-100 p-3 rounded-full mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 15.536c-1.171 1.952-3.07 1.952-4.242 0-1.172-1.953-1.172-5.119 0-7.072 1.171-1.952 3.07-1.952 4.242 0M8 10.5h4m-4 3h4m9-1.5a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-emerald-800">Guide des Tailles de Colliers</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="font-medium text-emerald-700 mb-3">Longueurs standards</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">38 cm</span>
                            <span>Collier ras du cou (collier choker)</span>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">42-45 cm</span>
                            <span>Collier princesse (au niveau de la clavicule)</span>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">50-60 cm</span>
                            <span>Collier matinée (s'arrête entre les seins)</span>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">70-90 cm</span>
                            <span>Collier opéra (peut être porté en double tour)</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-medium text-emerald-700 mb-3">Comment choisir</h3>
                    <div class="bg-emerald-50 p-4 rounded-lg">
                        <p class="text-gray-600 mb-3">Pour déterminer la longueur idéale :</p>
                        <ol class="list-decimal pl-5 space-y-1 text-sm">
                            <li>Mesurez votre tour de cou avec un mètre ruban</li>
                            <li>Ajoutez 5-10 cm selon l'effet désiré</li>
                            <li>Pour les pendentifs, considérez leur longueur supplémentaire</li>
                        </ol>
                        <p class="mt-3 text-gray-600 text-sm">Nos colliers sont ajustables sur ±2 cm pour plus de flexibilité.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bracelets Size Guide -->
        <div id="bracelets" class="bg-white p-8 rounded-xl shadow-lg border border-emerald-100 mb-12">
            <div class="flex items-center mb-6">
                <div class="bg-emerald-100 p-3 rounded-full mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 15.536c-1.171 1.952-3.07 1.952-4.242 0-1.172-1.953-1.172-5.119 0-7.072 1.171-1.952 3.07-1.952 4.242 0M8 10.5h4m-4 3h4m9-1.5a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-emerald-800">Guide des Tailles de Colliers</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="font-medium text-emerald-700 mb-3">Longueurs standards</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">38 cm</span>
                            <span>Collier ras du cou (collier choker)</span>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">42-45 cm</span>
                            <span>Collier princesse (au niveau de la clavicule)</span>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">50-60 cm</span>
                            <span>Collier matinée (s'arrête entre les seins)</span>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">70-90 cm</span>
                            <span>Collier opéra (peut être porté en double tour)</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-medium text-emerald-700 mb-3">Comment choisir</h3>
                    <div class="bg-emerald-50 p-4 rounded-lg">
                        <p class="text-gray-600 mb-3">Pour déterminer la longueur idéale :</p>
                        <ol class="list-decimal pl-5 space-y-1 text-sm">
                            <li>Mesurez votre tour de cou avec un mètre ruban</li>
                            <li>Ajoutez 5-10 cm selon l'effet désiré</li>
                            <li>Pour les pendentifs, considérez leur longueur supplémentaire</li>
                        </ol>
                        <p class="mt-3 text-gray-600 text-sm">Nos colliers sont ajustables sur ±2 cm pour plus de flexibilité.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Boucles d'or Size Guide -->
        <div id="boucles" class="bg-white p-8 rounded-xl shadow-lg border border-emerald-100 mb-12">
            <div class="flex items-center mb-6">
                <div class="bg-emerald-100 p-3 rounded-full mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 15.536c-1.171 1.952-3.07 1.952-4.242 0-1.172-1.953-1.172-5.119 0-7.072 1.171-1.952 3.07-1.952 4.242 0M8 10.5h4m-4 3h4m9-1.5a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-emerald-800">Guide des Tailles de Colliers</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="font-medium text-emerald-700 mb-3">Longueurs standards</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">38 cm</span>
                            <span>Collier ras du cou (collier choker)</span>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">42-45 cm</span>
                            <span>Collier princesse (au niveau de la clavicule)</span>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">50-60 cm</span>
                            <span>Collier matinée (s'arrête entre les seins)</span>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">70-90 cm</span>
                            <span>Collier opéra (peut être porté en double tour)</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-medium text-emerald-700 mb-3">Comment choisir</h3>
                    <div class="bg-emerald-50 p-4 rounded-lg">
                        <p class="text-gray-600 mb-3">Pour déterminer la longueur idéale :</p>
                        <ol class="list-decimal pl-5 space-y-1 text-sm">
                            <li>Mesurez votre tour de cou avec un mètre ruban</li>
                            <li>Ajoutez 5-10 cm selon l'effet désiré</li>
                            <li>Pour les pendentifs, considérez leur longueur supplémentaire</li>
                        </ol>
                        <p class="mt-3 text-gray-600 text-sm">Nos colliers sont ajustables sur ±2 cm pour plus de flexibilité.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Help Section -->
        <div class="text-center bg-white p-8 rounded-xl shadow-lg border border-emerald-100">
            <h3 class="text-lg font-medium text-emerald-800 mb-4">Besoin d'aide pour choisir votre taille ?</h3>
            <p class="text-gray-600 mb-6">Notre équipe de conseillers est disponible pour vous guider.</p>
            <a href="{{ route('contact.show') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                Contactez-nous
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection