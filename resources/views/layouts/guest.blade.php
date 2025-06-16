<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'StudyConnect') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900 min-h-screen">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iMjAiIGN5PSIyMCIgcj0iMSIgZmlsbD0iIzMzMzMzMyIgZmlsbC1vcGFjaXR5PSIwLjEiLz4KPC9zdmc+')] opacity-40"></div>
        
        <div class="relative min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <!-- Logo/Brand Section -->
            <div class="text-center mb-8">
                <div class="flex items-center justify-center mb-4">
                    <!-- StudyConnect Logo -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-full p-4 border border-white/20">
                        <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                </div>
                <h1 class="text-4xl font-bold text-white mb-2">StudyConnect</h1>
                <p class="text-blue-100/80 text-lg">Conecta. Aprende. Crece.</p>
            </div>

            <!-- Auth Form Container -->
            <div class="w-full sm:max-w-md">
                <div class="bg-white/95 backdrop-blur-lg shadow-2xl border border-white/20 sm:rounded-2xl px-8 py-10">
                    {{ $slot }}
                </div>
                
                <!-- Footer Links -->
                <div class="text-center mt-6">
                    <p class="text-blue-100/70 text-sm">
                        ¿Primera vez aquí? 
                        <a href="{{ route('register') }}" class="text-white font-medium hover:underline">
                            Únete a la comunidad
                        </a>
                    </p>
                </div>
            </div>

            <!-- Features Preview -->
            <div class="mt-12 max-w-4xl mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M16 4h4v4h-4V4zM10 4h4v4h-4V4zM4 4h4v4H4V4zM16 10h4v4h-4v-4zM10 10h4v4h-4v-4zM4 10h4v4H4v-4zM16 16h4v4h-4v-4zM10 16h4v4h-4v-4zM4 16h4v4H4v-4z"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-2">Grupos de Estudio</h3>
                        <p class="text-blue-100/70 text-sm">Forma equipos con estudiantes de tu carrera</p>
                    </div>
                    
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                        <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                                <path d="M14 2v6h6"/>
                                <path d="M16 13H8"/>
                                <path d="M16 17H8"/>
                                <path d="M10 9H8"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-2">Recursos Compartidos</h3>
                        <p class="text-blue-100/70 text-sm">Accede a apuntes y materiales de estudio</p>
                    </div>
                    
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                        <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-2">Gamificación</h3>
                        <p class="text-blue-100/70 text-sm">Gana puntos y badges por tu progreso</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>