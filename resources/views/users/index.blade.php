<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('🔍 Explorar Estudiantes') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 animate-fade-in">
            
            <!-- Header con stats -->
            <div class="study-card mb-8 p-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">Descubre Estudiantes</h1>
                        <p class="text-gray-600">Conecta con compañeros de tu universidad y otras instituciones</p>
                    </div>
                    <div class="mt-4 sm:mt-0 flex items-center space-x-4 text-sm text-gray-500">
                        <span class="flex items-center">
                            👥 {{ $users->total() }} estudiantes
                        </span>
                        <span class="flex items-center">
                            🏫 {{ $universities->count() }} universidades
                        </span>
                    </div>
                </div>
            </div>

            <!-- Filtros de búsqueda -->
            <div class="study-card mb-8">
                <div class="p-6">
                    <form method="GET" action="{{ route('users.index') }}" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Búsqueda por nombre -->
                            <div>
                                <label for="search" class="block text-sm font-medium text-gray-700 mb-2">
                                    🔍 Buscar por nombre
                                </label>
                                <input type="text" 
                                       id="search" 
                                       name="search" 
                                       value="{{ $search }}"
                                       placeholder="Ej: Rafael, María..."
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            
                            <!-- Filtro por universidad -->
                            <div>
                                <label for="university" class="block text-sm font-medium text-gray-700 mb-2">
                                    🏫 Universidad
                                </label>
                                <select id="university" 
                                        name="university" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="">Todas las universidades</option>
                                    @foreach($universities as $uni)
                                        <option value="{{ $uni }}" {{ $selectedUniversity === $uni ? 'selected' : '' }}>
                                            {{ $uni }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <!-- Filtro por carrera -->
                            <div>
                                <label for="career" class="block text-sm font-medium text-gray-700 mb-2">
                                    🎓 Carrera
                                </label>
                                <select id="career" 
                                        name="career" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="">Todas las carreras</option>
                                    @foreach($careers as $career)
                                        <option value="{{ $career }}" {{ $selectedCareer === $career ? 'selected' : '' }}>
                                            {{ $career }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-3">
                            <button type="submit" 
                                    class="study-gradient study-gradient-hover text-white font-medium py-2 px-6 rounded-lg transition duration-200">
                                🔍 Buscar
                            </button>
                            @if($search || $selectedUniversity || $selectedCareer)
                                <a href="{{ route('users.index') }}" 
                                   class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-6 rounded-lg transition duration-200 text-center">
                                    ✕ Limpiar filtros
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <!-- Grid de usuarios -->
            @if($users->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    @foreach($users as $user)
                        <div class="study-card overflow-hidden hover:scale-105 transition-all duration-200">
                            <!-- Header del perfil -->
                            <div class="h-20 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 relative">
                                <div class="absolute inset-0 bg-black/20"></div>
                            </div>
                            
                            <!-- Contenido de la tarjeta -->
                            <div class="px-6 pb-6 -mt-10 relative">
                                <!-- Avatar -->
                                <div class="flex justify-center">
                                    <img src="{{ $user->avatar_url }}" 
                                         alt="{{ $user->name }}" 
                                         class="w-20 h-20 rounded-full border-4 border-white shadow-lg bg-white">
                                </div>
                                
                                <!-- Info del usuario -->
                                <div class="text-center mt-4">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-1">
                                        <a href="{{ route('users.show', $user) }}" 
                                           class="hover:text-blue-600 transition duration-200">
                                            {{ $user->name }}
                                        </a>
                                    </h3>
                                    <p class="text-gray-600 text-sm mb-1">🎓 {{ $user->career }}</p>
                                    <p class="text-gray-500 text-sm mb-3">🏫 {{ $user->university }}</p>
                                    
                                    @if($user->bio)
                                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($user->bio, 80) }}</p>
                                    @endif
                                </div>
                                
                                <!-- Stats -->
                                <div class="grid grid-cols-3 gap-2 mb-4 text-center">
                                    <div>
                                        <div class="text-lg font-bold text-blue-600">{{ $user->posts_count }}</div>
                                        <div class="text-xs text-gray-500">Posts</div>
                                    </div>
                                    <div>
                                        <div class="text-lg font-bold text-purple-600">{{ $user->followers_count }}</div>
                                        <div class="text-xs text-gray-500">Seguidores</div>
                                    </div>
                                    <div>
                                        <div class="text-lg font-bold text-indigo-600">{{ $user->following_count }}</div>
                                        <div class="text-xs text-gray-500">Siguiendo</div>
                                    </div>
                                </div>
                                
                                <!-- Botones de acción -->
                                <div class="flex flex-col sm:flex-row gap-2">
                                    <a href="{{ route('users.show', $user) }}" 
                                       class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg text-center text-sm transition duration-200">
                                        👁️ Ver perfil
                                    </a>
                                    <x-follow-button :user="$user" :isFollowing="in_array($user->id, $followingIds)" size="small" />
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Paginación -->
                <div class="study-card p-6">
                    {{ $users->withQueryString()->links() }}
                </div>
                
            @else
                <!-- Estado vacío -->
                <div class="study-card">
                    <div class="text-center py-16">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6 animate-float">
                            <svg class="w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">No se encontraron estudiantes</h3>
                        <p class="text-gray-600 mb-6">
                            @if($search || $selectedUniversity || $selectedCareer)
                                No hay estudiantes que coincidan con tus filtros de búsqueda.
                            @else
                                Aún no hay otros estudiantes registrados en la plataforma.
                            @endif
                        </p>
                        
                        @if($search || $selectedUniversity || $selectedCareer)
                            <a href="{{ route('users.index') }}" 
                               class="study-gradient study-gradient-hover text-white font-medium py-3 px-6 rounded-lg transition duration-200">
                                🔍 Ver todos los estudiantes
                            </a>
                        @endif
                    </div>
                </div>
            @endif
            
        </div>
    </div>
</x-app-layout>
