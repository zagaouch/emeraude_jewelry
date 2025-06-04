@extends('layouts.app')

@section('content')
<div class="bg-emerald-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-emerald-800 mb-4">Contactez-nous</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Nous sommes là pour répondre à vos questions sur nos bijoux. Remplissez le formulaire ci-dessous ou contactez-nous directement.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white p-8 rounded-xl shadow-lg border border-emerald-100">
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-emerald-700 mb-1">Votre nom</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                            placeholder="Jean Dupont">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-emerald-700 mb-1">Votre email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                            placeholder="jean@exemple.com">
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-emerald-700 mb-1">Sujet</label>
                        <select id="subject" name="subject"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="question">Question sur un produit</option>
                            <option value="order">Suivi de commande</option>
                            <option value="return">Retour/Échange</option>
                            <option value="other">Autre demande</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-emerald-700 mb-1">Votre message</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                            placeholder="Décrivez votre demande en détail..."></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-6 py-3 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition-colors">
                            Envoyer le message
                        </button>
                    </div>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="space-y-8">
                <div class="bg-white p-8 rounded-xl shadow-lg border border-emerald-100">
                    <h2 class="text-xl font-semibold text-emerald-800 mb-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Notre boutique
                    </h2>
                    <p class="text-gray-600">123 Rue des Bijoux<br>75001 fes , Maroce</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg border border-emerald-100">
                    <h2 class="text-xl font-semibold text-emerald-800 mb-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Contact direct
                    </h2>
                    <ul class="space-y-4 text-gray-600">
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            +33 1 23 45 67 89
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            contact@emeraude-jewelry.com
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg border border-emerald-100">
                    <h2 class="text-xl font-semibold text-emerald-800 mb-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Horaires d'ouverture
                    </h2>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex justify-between">
                            <span>Lundi - Vendredi</span>
                            <span>10h - 19h</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Samedi</span>
                            <span>10h - 20h</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Dimanche</span>
                            <span>Fermé</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif
</div>
@endsection