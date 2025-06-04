@extends('layouts.app')

@section('content')
<div class="bg-emerald-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-emerald-800 mb-4">Livraison & Retours</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Découvrez nos politiques de livraison et de retour pour une expérience d'achat en toute sérénité.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Livraison Section -->
            <div class="bg-white p-8 rounded-xl shadow-lg border border-emerald-100">
                <div class="flex items-center mb-6">
                    <div class="bg-emerald-100 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-emerald-800">Livraison</h2>
                </div>

                <div class="space-y-6">
                    <div>
                        <h3 class="font-medium text-emerald-700 mb-2">Délais de livraison</h3>
                        <ul class="list-disc pl-5 space-y-1 text-gray-600">
                            <li>France métropolitaine: 2-3 jours ouvrables</li>
                            <li>Europe: 3-5 jours ouvrables</li>
                            <li>International: 5-10 jours ouvrables</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="font-medium text-emerald-700 mb-2">Frais de livraison</h3>
                        <ul class="list-disc pl-5 space-y-1 text-gray-600">
                            <li>Livraison standard offerte à partir de 150€ d'achat</li>
                            <li>France: 4,90€ (standard), 9,90€ (express)</li>
                            <li>Europe: 9,90€ (standard), 19,90€ (express)</li>
                            <li>International: 14,90€ (standard), 29,90€ (express)</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="font-medium text-emerald-700 mb-2">Suivi de commande</h3>
                        <p class="text-gray-600">
                            Toutes nos commandes sont expédiées avec un numéro de suivi. Vous recevrez un email de confirmation avec votre numéro de suivi dès que votre commande sera expédiée.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Retours Section -->
            <div class="bg-white p-8 rounded-xl shadow-lg border border-emerald-100">
                <div class="flex items-center mb-6">
                    <div class="bg-emerald-100 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-emerald-800">Retours & Échanges</h2>
                </div>

                <div class="space-y-6">
                    <div>
                        <h3 class="font-medium text-emerald-700 mb-2">Politique de retour</h3>
                        <p class="text-gray-600 mb-3">
                            Vous disposez de 14 jours à compter de la réception de votre commande pour nous retourner un article qui ne vous conviendrait pas.
                        </p>
                        <ul class="list-disc pl-5 space-y-1 text-gray-600">
                            <li>Articles doivent être neufs, non portés et dans leur emballage d'origine</li>
                            <li>Bijoux personnalisés ne peuvent être retournés</li>
                            <li>Le coût de retour est à la charge du client</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="font-medium text-emerald-700 mb-2">Processus de retour</h3>
                        <ol class="list-decimal pl-5 space-y-2 text-gray-600">
                            <li>Connectez-vous à votre compte et accédez à vos commandes</li>
                            <li>Sélectionnez l'article à retourner et suivez les instructions</li>
                            <li>Imprimez l'étiquette de retour fournie</li>
                            <li>Expédiez le colis dans les 7 jours suivant la demande de retour</li>
                        </ol>
                    </div>

                    <div>
                        <h3 class="font-medium text-emerald-700 mb-2">Remboursements</h3>
                        <p class="text-gray-600">
                            Une fois le retour reçu et inspecté, nous vous enverrons un email pour vous confirmer l'approbation de votre remboursement. Le remboursement sera effectué sous 5 jours ouvrables sur votre moyen de paiement original.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
    
    </div>
</div>
@endsection