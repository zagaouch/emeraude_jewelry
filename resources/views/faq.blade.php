@extends('layouts.app')

@section('content')
<div class="bg-emerald-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-emerald-800 mb-4">Foire Aux Questions</h1>
            <p class="text-lg text-gray-600">
                Trouvez les réponses aux questions les plus fréquentes sur nos bijoux, commandes et services.
            </p>
        </div>

        <!-- Search Bar -->
       

        <!-- FAQ Categories -->
        
        <!-- FAQ Accordion -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-emerald-100">
            <!-- Commandes Section -->
            <div class="border-b border-gray-200">
                <h3 class="px-6 py-4 bg-emerald-50 text-emerald-800 font-semibold flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                    </svg>
                    Commandes
                </h3>
                
                <div class="divide-y divide-gray-200">
                    <!-- Question 1 -->
                    <div x-data="{ open: false }" class="px-6 py-4">
                        <button @click="open = !open" class="flex justify-between items-center w-full text-left">
                            <span class="font-medium text-emerald-700">Comment puis-je suivre ma commande ?</span>
                            <svg :class="{ 'transform rotate-180': open }" class="h-5 w-5 text-emerald-500 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="mt-2 text-gray-600">
                            <p>Dès que votre commande est expédiée, vous recevrez un email de confirmation contenant votre numéro de suivi. Vous pouvez suivre l'état de votre livraison en cliquant sur ce numéro ou en le copiant sur le site de notre transporteur.</p>
                        </div>
                    </div>
                    
                    <!-- Question 2 -->
                    <div x-data="{ open: false }" class="px-6 py-4">
                        <button @click="open = !open" class="flex justify-between items-center w-full text-left">
                            <span class="font-medium text-emerald-700">Puis-je modifier ou annuler ma commande ?</span>
                            <svg :class="{ 'transform rotate-180': open }" class="h-5 w-5 text-emerald-500 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="mt-2 text-gray-600">
                            <p>Vous pouvez modifier ou annuler votre commande dans un délai de 1 heure après la passation. Après ce délai, veuillez nous contacter immédiatement à <a href="mailto:contact@emeraude-jewelry.com" class="text-emerald-600 hover:underline">contact@emeraude-jewelry.com</a> ou par téléphone au +33 1 23 45 67 89. Nous ferons de notre mieux pour répondre à votre demande.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Livraison Section -->
            <div class="border-b border-gray-200">
                <h3 class="px-6 py-4 bg-emerald-50 text-emerald-800 font-semibold flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                    </svg>
                    Livraison
                </h3>
                
                <div class="divide-y divide-gray-200">
                    <!-- Question 1 -->
                    <div x-data="{ open: false }" class="px-6 py-4">
                        <button @click="open = !open" class="flex justify-between items-center w-full text-left">
                            <span class="font-medium text-emerald-700">Quels sont les délais de livraison ?</span>
                            <svg :class="{ 'transform rotate-180': open }" class="h-5 w-5 text-emerald-500 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="mt-2 text-gray-600">
                            <ul class="list-disc pl-5 space-y-1">
                                <li>France métropolitaine: 2-3 jours ouvrables</li>
                                <li>Europe: 3-5 jours ouvrables</li>
                                <li>International: 5-10 jours ouvrables</li>
                            </ul>
                            <p class="mt-2">Les délais commencent à partir du moment où votre commande est expédiée. Vous recevrez un email de confirmation d'expédition.</p>
                        </div>
                    </div>
                    
                    <!-- Question 2 -->
                    <div x-data="{ open: false }" class="px-6 py-4">
                        <button @click="open = !open" class="flex justify-between items-center w-full text-left">
                            <span class="font-medium text-emerald-700">Livrez-vous à l'international ?</span>
                            <svg :class="{ 'transform rotate-180': open }" class="h-5 w-5 text-emerald-500 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="mt-2 text-gray-600">
                            <p>Oui, nous livrons dans le monde entier. Les frais et délais de livraison varient selon la destination :</p>
                            <ul class="list-disc pl-5 mt-2 space-y-1">
                                <li>Europe: 9,90€ (standard), 19,90€ (express)</li>
                                <li>Amérique du Nord: 14,90€ (standard), 29,90€ (express)</li>
                                <li>Asie/Océanie: 19,90€ (standard), 39,90€ (express)</li>
                            </ul>
                            <p class="mt-2">Les commandes internationales peuvent être soumises à des droits de douane et taxes locales à la charge du client.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="text-center p-8 bg-emerald-50">
                <h3 class="text-lg font-medium text-emerald-800 mb-4">Vous ne trouvez pas la réponse à votre question ?</h3>
                <p class="text-gray-600 mb-6">Notre équipe clientèle est disponible pour vous aider.</p>
                <a href="{{ route('contact.show') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                    Contactez-nous
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- AlpineJS for accordion functionality -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection