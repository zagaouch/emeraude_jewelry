<nav class="bg-white shadow-sm" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="flex items-center">
                    <img width="27" height="27" src="https://img.icons8.com/color/48/emerald.png" alt="logo emerald"/>
                    <span class="text-xl font-bold text-gray-800 ml-2">Emeraude Jewelry</span>
                </a>
            </div>

            <!-- Main Navigation (Desktop) -->
            <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Accueil</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">À Propos de Nous</a>
                <a href="{{ route('shop') }}" class="{{ request()->routeIs('shop') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Shop Now</a>
                <a href="{{ route('checkout') }}" class="{{ request()->routeIs('checkout') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Mes Commandes</a>
                <a href="{{ route('contact.show') }}" class="{{ request()->routeIs('contact.show') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Nous contacter</a>
            </div>

            <!-- Right Icons -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                <!-- panier -->
                <a href="{{ route('cart') }}" class="p-1 text-gray-400 hover:text-gray-500 relative">
                    <span class="sr-only">Panier</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </a>

                <!-- User Menu -->
                <div class="ml-3 relative">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                        <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="px-4 py-3">
                                    <div class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</div>
                                    <div class="text-sm text-gray-500">{{ auth()->user()->email }}</div>
                                </div>
                                <div class="border-t border-gray-200"></div>
                                <x-dropdown-link :href="route('profile.edit')">Mon compte</x-dropdown-link>
                                <x-dropdown-link :href="route('cart')">Mes commandes</x-dropdown-link>
                                <div class="border-t border-gray-200"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Déconnexion</x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <div class="flex space-x-4">
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-gray-900">Connexion</a>
                            <a href="{{ route('register') }}" class="text-sm text-gray-700 hover:text-gray-900">Inscription</a>
                        </div>
                    @endauth
                </div>
            </div>

            <!-- Mobile Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Accueil</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">À Propos de Nous</a>
            <a href="{{ route('shop') }}" class="{{ request()->routeIs('shop') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Shop Now</a>
            <a href="{{ route('checkout') }}" class="{{ request()->routeIs('checkout') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Mes Commandes</a>
            <a href="{{ route('contact.show') }}" class="{{ request()->routeIs('contact.show') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Nous contacter</a>
        </div>

        @auth
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                    <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-gray-800">{{ auth()->user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ auth()->user()->email }}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Mon compte</a>
                <a href="{{ route('cart') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Mes commandes</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        Déconnexion
                    </a>
                </form>
            </div>
        </div>
        @else
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="space-y-1">
                <a href="{{ route('login') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Connexion</a>
                <a href="{{ route('register') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Inscription</a>
            </div>
        </div>
        @endauth
    </div>
</nav>
<script src="//unpkg.com/alpinejs" defer></script>
