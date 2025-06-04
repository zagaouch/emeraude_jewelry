@extends('layouts.app')

@section('content')
<div class="bg-white">
    <!-- Hero Section - Enhanced with parallax effect -->
    <div class="relative bg-gray-900 overflow-hidden h-screen max-h-[80vh]">
        <div class="absolute inset-0 overflow-hidden">
                    <img src="https://images.pexels.com/photos/12495610/pexels-photo-12495610.jpeg" 
                 alt="Luxury gold chain jewelry"  
                         class="w-full h-full object-cover object-center">
                    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                </div>
        <div class="relative max-w-7xl mx-auto h-full flex flex-col justify-center px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl transform transition duration-700 ease-out translate-y-10 opacity-0 animate-fade-in-up">
                Notre Histoire
            </h1>
            <p class="mt-6 text-xl text-emerald-100 max-w-3xl mx-auto transform transition duration-700 ease-out translate-y-10 opacity-0 animate-fade-in-up delay-100">
                L'artisanat exceptionnel au service de votre élégance depuis 2010
            </p>
            <div class="mt-12 transform transition duration-700 ease-out translate-y-10 opacity-0 animate-fade-in-up delay-200">
                <svg class="h-12 w-12 mx-auto text-emerald-300 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
            <!-- Text Content - Enhanced typography -->
            <div class="prose prose-emerald prose-lg text-gray-600 lg:max-w-none">
                <h2 class="text-4xl font-bold text-gray-900 mb-8 font-serif tracking-tight">Emeraude Jewelry</h2>
                
                <p class="text-lg leading-relaxed">
                    Fondé en 2010 à Paris, <span class="text-emerald-600 font-medium">Emeraude Jewelry</span> incarne l'excellence de la joaillerie française. 
                    Notre maison allie savoir-faire traditionnel et créativité contemporaine pour vous 
                    offrir des pièces uniques.
                </p>
                
                <h3 class="text-2xl font-bold text-gray-900 mt-12 mb-6 border-l-4 border-emerald-500 pl-4">Notre Philosophie</h3>
                <p class="leading-relaxed">
                    Chaque bijou Emeraude est une œuvre d'art née de la passion de nos artisans. 
                    Nous sélectionnons uniquement les pierres et métaux les plus nobles pour créer 
                    des pièces qui traversent le temps.
                </p>
                
                <div class="mt-10 bg-emerald-50 p-6 rounded-lg border border-emerald-100">
                    <blockquote class="italic text-gray-700">
                        "Un bijou doit être comme son porteur : unique, authentique et éternel."
                        <footer class="mt-2 text-emerald-600 font-medium">— Sophie Laurent, Maître Joaillière</footer>
                    </blockquote>
                </div>
            </div>
            
            <!-- Image Gallery - Enhanced with hover effect -->
            
        </div>
        
        <!-- Team Section - Enhanced cards -->
        <div class="mt-32">
            <div class="text-center">
                <span class="text-emerald-600 font-semibold tracking-wider">NOTRE ÉQUIPE</span>
                <h2 class="text-4xl font-bold text-gray-900 mt-3 font-serif">Les Artisans Emeraude</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Des mains expertes et passionnées qui donnent vie à vos bijoux les plus précieux
                </p>
            </div>
            
            <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Member 1 - Enhanced with social links -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                    <div class="h-64 overflow-hidden relative">
                        <img class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500" 
                             src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" 
                             alt="Sophie Laurent">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <h3 class="text-xl font-semibold text-white">Sophie Laurent</h3>
                            <p class="text-emerald-300 mt-1">Maître Joaillière</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600">
                            Spécialiste en pierres précieuses avec 20 ans d'expérience. Diplômée de l'École des Arts Joailliers.
                        </p>
                        <div class="mt-6 flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-emerald-600 transition">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-emerald-600 transition">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Member 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                    <div class="h-64 overflow-hidden relative">
                        <img class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500" 
                             src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" 
                             alt="Jean Dubois">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <h3 class="text-xl font-semibold text-white">Jean Dubois</h3>
                            <p class="text-emerald-300 mt-1">Orfèvre</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600">
                            Expert en travail de l'or et des métaux précieux. Formé à la technique ancienne du repoussé.
                        </p>
                        <div class="mt-6 flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-emerald-600 transition">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Member 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                    <div class="h-64 overflow-hidden relative">
                        <img class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500" 
                             src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" 
                             alt="Élodie Martin">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <h3 class="text-xl font-semibold text-white">Élodie Martin</h3>
                            <p class="text-emerald-300 mt-1">Designer</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600">
                            Créatrice de nos collections contemporaines. Lauréate du Prix de Création Joaillière 2018.
                        </p>
                        <div class="mt-6 flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-emerald-600 transition">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-emerald-600 transition">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Member 4 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                    <div class="h-64 overflow-hidden relative">
                        <img class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500" 
                             src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" 
                             alt="Thomas Leroy">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <h3 class="text-xl font-semibold text-white">Thomas Leroy</h3>
                            <p class="text-emerald-300 mt-1">Expert Diamants</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600">
                            Certification et sélection des diamants selon les critères les plus exigeants du marché.
                        </p>
                        <div class="mt-6 flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-emerald-600 transition">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Values Section - Enhanced with icons -->
        <div class="mt-32">
            <div class="text-center">
                <span class="text-emerald-600 font-semibold tracking-wider">NOS VALEURS</span>
                <h2 class="text-4xl font-bold text-gray-900 mt-3 font-serif">L'Excellence Emeraude</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Les principes intangibles qui guident chaque création de notre maison
                </p>
            </div>
            
            <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-3">
                <!-- Value 1 - Enhanced with animated icon -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group">
                    <div class="p-8">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-emerald-100 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="mt-6 text-xl font-bold text-gray-900 group-hover:text-emerald-600 transition-colors duration-300">Authenticité</h3>
                        <p class="mt-4 text-gray-600 leading-relaxed">
                            Matériaux certifiés et traçabilité garantie pour chaque pièce que nous créons. Chaque bijou est accompagné de son certificat d'authenticité.
                        </p>
                    </div>
                </div>
                
                <!-- Value 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group">
                    <div class="p-8">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-emerald-100 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="mt-6 text-xl font-bold text-gray-900 group-hover:text-emerald-600 transition-colors duration-300">Créativité</h3>
                        <p class="mt-4 text-gray-600 leading-relaxed">
                            Designs uniques qui marient tradition et modernité pour des pièces intemporelles. Nos collections sont renouvelées chaque saison.
                        </p>
                    </div>
                </div>
                
                <!-- Value 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group">
                    <div class="p-8">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-emerald-100 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <h3 class="mt-6 text-xl font-bold text-gray-900 group-hover:text-emerald-600 transition-colors duration-300">Confiance</h3>
                        <p class="mt-4 text-gray-600 leading-relaxed">
                            Une relation transparente et durable avec chacun de nos clients. Service après-vente et entretien à vie de vos bijoux Emeraude.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- CTA Section - Enhanced with background pattern -->
    <div class="bg-emerald-700 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,0 L100,0 L100,100 L0,100 Z" fill="none" stroke="white" stroke-width="2" stroke-dasharray="5,5" />
            </svg>
        </div>
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-24 lg:px-8 lg:flex lg:items-center lg:justify-between relative">
            <div class="lg:w-1/2">
                <h2 class="text-4xl font-bold tracking-tight text-white sm:text-5xl font-serif">
                    <span class="block">Prêt à découvrir</span>
                    <span class="block text-emerald-200">l'excellence Emeraude ?</span>
                </h2>
                <p class="mt-4 text-lg text-emerald-100 max-w-xl">
                    Explorez nos collections ou prenez rendez-vous dans notre atelier parisien pour une expérience personnalisée.
                </p>
            </div>
            <div class="mt-8 flex flex-col sm:flex-row lg:mt-0 lg:flex-shrink-0 space-y-4 sm:space-y-0 sm:space-x-4">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('shop') }}" class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-lg font-medium rounded-md text-emerald-700 bg-white hover:bg-emerald-50 transition-colors duration-300">
                        <svg class="-ml-1 mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        Visiter la boutique
                    </a>
                </div>
                <div class="inline-flex rounded-md shadow">
                    <a href="/contactez-nous" class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-lg font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700 transition-colors duration-300">
                        <svg class="-ml-1 mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Nous contacter
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }
    .delay-100 {
        animation-delay: 0.1s;
    }
    .delay-200 {
        animation-delay: 0.2s;
    }
    .prose-emerald a {
        color: #059669;
        text-decoration: none;
        font-weight: 500;
    }
    .prose-emerald a:hover {
        text-decoration: underline;
    }
</style>

<!-- Optional: Add parallax.js for hero section effect -->
<script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var image = document.querySelector('[data-parallax="scroll"]');
        if(image) {
            new simpleParallax(image, {
                scale: 1.2,
                delay: 0.6,
                transition: 'cubic-bezier(0,0,0,1)'
            });
        }
    });
</script>
@endsection