<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil de ') }}{{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 animate-fade-in">
            
            <!-- Profile Header Card -->
            <div class="study-card mb-8 overflow-hidden">
                <!-- Cover Background -->
                <div class="h-32 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 relative">
                    <div class="absolute inset-0 bg-black/20"></div>
                    <div class="absolute top-4 right-4">
                        <x-follow-button :user="$user" :isFollowing="$isFollowing" />
                    </div>
                </div>
                
                <!-- Profile Info -->
                <div class="px-8 pb-8 -mt-16 relative">
                    <div class="flex flex-col sm:flex-row items-start sm:items-end space-y-4 sm:space-y-0 sm:space-x-6">
                        <!-- Avatar -->
                        <div class="relative">
                            <img src="{{ $user->avatar_url }}" 
                                 alt="{{ $user->name }}" 
                                 class="w-32 h-32 rounded-full border-4 border-white shadow-lg bg-white">
                            <div class="absolute -bottom-2 -right-2 bg-green-500 w-8 h-8 rounded-full border-4 border-white flex items-center justify-center">
                                <span class="text-white text-xs font-bold">✓</span>
                            </div>
                        </div>
                        
                        <!-- User Info -->
                        <div class="flex-1 text-center sm:text-left">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $user->name }}</h1>
                            <div class="space-y-1">
                                <p class="text-lg text-gray-600">
                                    <span class="inline-flex items-center">
                                        🎓 {{ $user->career }}
                                    </span>
                                </p>
                                <p class="text-gray-500">
                                    <span class="inline-flex items-center">
                                        🏫 {{ $user->university }}
                                    </span>
                                </p>
                                <p class="text-gray-500">
                                    <span class="inline-flex items-center">
                                        📚 {{ $user->semester }}° Ciclo
                                    </span>
                                </p>
                            </div>
                            @if($user->bio)
                                <p class="mt-3 text-gray-700 max-w-md">{{ $user->bio }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="study-card p-6 text-center hover:scale-105 transition-transform duration-200">
                    <div class="text-3xl font-bold text-blue-600 mb-1">{{ $stats['posts_count'] }}</div>
                    <div class="text-gray-600 text-sm font-medium">Posts</div>
                </div>
                <div class="study-card p-6 text-center hover:scale-105 transition-transform duration-200">
                    <div class="text-3xl font-bold text-purple-600 mb-1" data-followers-count>{{ $stats['followers_count'] }}</div>
                    <div class="text-gray-600 text-sm font-medium">Seguidores</div>
                </div>
                <div class="study-card p-6 text-center hover:scale-105 transition-transform duration-200">
                    <div class="text-3xl font-bold text-indigo-600 mb-1">{{ $stats['following_count'] }}</div>
                    <div class="text-gray-600 text-sm font-medium">Siguiendo</div>
                </div>
                <div class="study-card p-6 text-center hover:scale-105 transition-transform duration-200">
                    <div class="text-3xl font-bold text-green-600 mb-1">{{ $stats['likes_received'] }}</div>
                    <div class="text-gray-600 text-sm font-medium">Likes</div>
                </div>
            </div>

            <!-- Navigation tabs -->
            <div class="study-card mb-8">
                <div class="border-b border-gray-200/50">
                    <nav class="-mb-px flex">
                        <button class="tab-button active" data-tab="posts">
                            <span class="text-sm font-medium">📝 Posts ({{ $stats['posts_count'] }})</span>
                        </button>
                        <button class="tab-button" data-tab="about">
                            <span class="text-sm font-medium">ℹ️ Acerca de</span>
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Tab content: Posts -->
            <div id="tab-posts" class="tab-content active">
                <div class="study-card">
                    <div class="px-6 py-4 border-b border-gray-200/50">
                        <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                            📝 Posts de {{ $user->name }}
                            @if($posts->count() > 0)
                                <span class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full animate-float">
                                    {{ $posts->count() }}
                                </span>
                            @endif
                        </h3>
                    </div>

                    <div class="p-6">
                        @if($posts->count() > 0)
                            <div class="space-y-6">
                                @foreach($posts as $post)
                                    <div class="bg-gray-50/50 rounded-xl p-5 border border-gray-200/50 hover:shadow-md transition duration-200">
                                        <div class="flex items-start space-x-3">
                                            <img src="{{ $user->avatar_url }}" 
                                                 alt="{{ $user->name }}" 
                                                 class="w-10 h-10 rounded-full">
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center space-x-2">
                                                    <h4 class="font-medium text-gray-900">{{ $user->name }}</h4>
                                                    <span class="text-gray-400">•</span>
                                                    <span class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                                                    @if($user->university)
                                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded-full">
                                                            🏫 {{ Str::limit($user->university, 20) }}
                                                        </span>
                                                    @endif
                                                </div>
                                                <p class="mt-2 text-gray-700 leading-relaxed">{{ $post->content }}</p>
                                                
                                                <!-- Post Actions -->
                                                <div class="flex items-center space-x-6 mt-4">
                                                    <div class="flex items-center space-x-2 text-gray-500">
                                                        <button data-like-button class="flex items-center space-x-1 hover:text-red-500 transition duration-200">
                                                            <svg class="w-5 h-5 transition-transform duration-200" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                                            </svg>
                                                            <span class="text-sm font-medium">{{ $post->likes_count }}</span>
                                                        </button>
                                                    </div>
                                                    <div class="flex items-center space-x-2 text-gray-500">
                                                        <button class="flex items-center space-x-1 hover:text-blue-500 transition duration-200">
                                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                                            </svg>
                                                            <span class="text-sm font-medium">{{ $post->comments_count }}</span>
                                                        </button>
                                                    </div>
                                                    <div class="flex items-center space-x-2 text-gray-500 ml-auto">
                                                        <button class="flex items-center space-x-1 hover:text-green-500 transition duration-200">
                                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="M7 4V2C7 1.45 7.45 1 8 1S9 1.45 9 2V4H15V2C15 1.45 15.45 1 16 1S17 1.45 17 2V4H20C21.1 4 22 4.9 22 6V20C22 21.1 21.1 22 20 22H4C2.9 22 2 21.1 2 20V6C2 4.9 2.9 4 4 4H7Z"/>
                                                            </svg>
                                                            <span class="text-xs">{{ $post->created_at->format('M d') }}</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Paginación de posts -->
                            @if($posts->hasPages())
                                <div class="mt-8">
                                    {{ $posts->links() }}
                                </div>
                            @endif
                        @else
                            <div class="text-center py-12">
                                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 animate-float">
                                    <svg class="w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">{{ $user->name }} no ha publicado aún</h3>
                                <p class="text-gray-500">Cuando publique algo, aparecerá aquí.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Tab content: About -->
            <div id="tab-about" class="tab-content hidden">
                <div class="study-card p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-6">ℹ️ Información Académica</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0">
                                        <span class="text-2xl">🏫</span>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">Universidad</h4>
                                        <p class="text-gray-600">{{ $user->university }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0">
                                        <span class="text-2xl">🎓</span>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">Carrera</h4>
                                        <p class="text-gray-600">{{ $user->career }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0">
                                        <span class="text-2xl">📚</span>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">Ciclo</h4>
                                        <p class="text-gray-600">{{ $user->semester }}° Ciclo</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            @if($user->bio)
                                <div class="bg-blue-50 rounded-lg p-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0">
                                            <span class="text-2xl">💭</span>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900 mb-2">Biografía</h4>
                                            <p class="text-gray-600 leading-relaxed">{{ $user->bio }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            <div class="bg-green-50 rounded-lg p-4">
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0">
                                        <span class="text-2xl">📅</span>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">Se unió</h4>
                                        <p class="text-gray-600">{{ $user->created_at->format('F Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions bar -->
            <div class="study-card p-4">
                <div class="flex flex-col sm:flex-row gap-3 justify-center items-center">
                    <a href="{{ route('users.index') }}" 
                       class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-6 rounded-lg transition duration-200">
                        ← Volver a Explorar
                    </a>
                    <x-follow-button :user="$user" :isFollowing="$isFollowing" size="large" />
                    <button class="bg-blue-100 hover:bg-blue-200 text-blue-700 font-medium py-2 px-6 rounded-lg transition duration-200">
                        💬 Enviar mensaje
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tab switching and like interactions -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab switching
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetTab = this.dataset.tab;
                    
                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => {
                        content.classList.remove('active');
                        content.classList.add('hidden');
                    });
                    
                    // Add active class to clicked button and corresponding content
                    this.classList.add('active');
                    const targetContent = document.getElementById(`tab-${targetTab}`);
                    if (targetContent) {
                        targetContent.classList.add('active');
                        targetContent.classList.remove('hidden');
                    }
                });
            });
            
            // Like button interactions (reused from profile)
            const likeButtons = document.querySelectorAll('[data-like-button]');
            
            likeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const heart = this.querySelector('svg');
                    const count = this.querySelector('span');
                    
                    // Toggle like state
                    if (this.classList.contains('text-red-500')) {
                        this.classList.remove('text-red-500');
                        this.classList.add('text-gray-500');
                        count.textContent = parseInt(count.textContent) - 1;
                    } else {
                        this.classList.remove('text-gray-500');
                        this.classList.add('text-red-500');
                        count.textContent = parseInt(count.textContent) + 1;
                        
                        // Add animation
                        heart.style.transform = 'scale(1.3)';
                        setTimeout(() => {
                            heart.style.transform = 'scale(1)';
                        }, 200);
                    }
                });
            });
        });
    </script>

    <style>
        .tab-button {
            @apply py-3 px-6 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 transition duration-200;
        }
        
        .tab-button.active {
            @apply border-blue-500 text-blue-600;
        }
    </style>
</x-app-layout>
