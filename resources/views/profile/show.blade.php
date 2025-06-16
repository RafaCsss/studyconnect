<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mi Perfil') }}
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
                        <a href="{{ route('profile.edit') }}" 
                           class="bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200 border border-white/30">
                            ✏️ Editar Perfil
                        </a>
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
                    <div class="text-3xl font-bold text-purple-600 mb-1">{{ $stats['followers_count'] }}</div>
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

            <!-- Recent Posts Section -->
            <div class="study-card">
                <div class="px-6 py-4 border-b border-gray-200/50">
                    <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                        📝 Mis Posts Recientes
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
                                                    <!-- Botón eliminar post -->
                                                    <button onclick="deletePost({{ $post->id }})" 
                                                            class="flex items-center space-x-1 hover:text-red-500 transition duration-200 opacity-70 hover:opacity-100"
                                                            title="Eliminar post">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if($stats['posts_count'] > 10)
                            <div class="text-center mt-6">
                                <button class="study-gradient study-gradient-hover text-white font-medium py-2 px-6 rounded-lg transition duration-200">
                                    Ver todos mis posts ({{ $stats['posts_count'] }})
                                </button>
                            </div>
                        @endif
                        
                        <!-- Botón crear post cuando ya hay posts -->
                        @if($posts->count() > 0)
                            <div class="text-center mt-6">
                                <button onclick="openCreatePostModal()" 
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg transition duration-200">
                                    ✏️ Crear nuevo post
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="text-center py-12">
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 animate-float">
                                <svg class="w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No hay posts aún</h3>
                            <p class="text-gray-500 mb-4">¡Comparte tu primera experiencia de estudio con la comunidad!</p>
                            <button onclick="openCreatePostModal()" 
                                    class="study-gradient study-gradient-hover text-white font-medium py-2 px-6 rounded-lg transition duration-200">
                                ✏️ Crear mi primer post
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Crear Post -->
    <div id="createPostModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="study-card max-w-lg w-full animate-fade-in">
                <div class="px-6 py-4 border-b border-gray-200/50">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-gray-800">✏️ Crear Nuevo Post</h3>
                        <button onclick="closeCreatePostModal()" 
                                class="text-gray-400 hover:text-gray-600 transition duration-200">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <form action="{{ route('posts.store') }}" method="POST" class="p-6">
                    @csrf
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                            💬 ¿Qué estás estudiando?
                        </label>
                        <textarea name="content" 
                                  id="content" 
                                  rows="4" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                                  placeholder="Comparte tus experiencias de estudio, logros académicos, consejos o preguntas..."
                                  maxlength="1000"
                                  required></textarea>
                        <div class="flex justify-between mt-2">
                            <span class="text-sm text-gray-500">
                                📝 Máximo 1000 caracteres
                            </span>
                            <span id="charCount" class="text-sm text-gray-400">0/1000</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-end space-x-3">
                        <button type="button" 
                                onclick="closeCreatePostModal()"
                                class="px-4 py-2 text-gray-600 hover:text-gray-800 transition duration-200">
                            Cancelar
                        </button>
                        <button type="submit" 
                                class="study-gradient study-gradient-hover text-white font-medium py-2 px-6 rounded-lg transition duration-200">
                            🚀 Publicar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div id="successMessage" class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg z-50 animate-fade-in">
            ✓ {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div id="errorMessage" class="fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-lg z-50 animate-fade-in">
            ⚠ {{ session('error') }}
        </div>
    @endif

    <!-- Custom JavaScript for Profile Interactivity -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth hover effects for stats cards
            const statsCards = document.querySelectorAll('.study-card');
            
            statsCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Like button interactions
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
            
            // Character counter for textarea
            const textarea = document.getElementById('content');
            const charCount = document.getElementById('charCount');
            
            if (textarea && charCount) {
                textarea.addEventListener('input', function() {
                    const count = this.value.length;
                    charCount.textContent = `${count}/1000`;
                    
                    if (count > 800) {
                        charCount.classList.add('text-orange-500');
                        charCount.classList.remove('text-gray-400');
                    } else {
                        charCount.classList.remove('text-orange-500');
                        charCount.classList.add('text-gray-400');
                    }
                });
            }
            
            // Auto-hide success/error messages
            setTimeout(() => {
                const successMsg = document.getElementById('successMessage');
                const errorMsg = document.getElementById('errorMessage');
                if (successMsg) successMsg.style.display = 'none';
                if (errorMsg) errorMsg.style.display = 'none';
            }, 5000);
        });
        
        // Modal Functions
        function openCreatePostModal() {
            document.getElementById('createPostModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            // Focus on textarea
            setTimeout(() => {
                document.getElementById('content').focus();
            }, 100);
        }
        
        function closeCreatePostModal() {
            document.getElementById('createPostModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            // Reset form
            document.getElementById('content').value = '';
            document.getElementById('charCount').textContent = '0/1000';
        }
        
        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeCreatePostModal();
            }
        });
        
        // Close modal clicking outside
        document.getElementById('createPostModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeCreatePostModal();
            }
        });
        
        // Delete post function
        function deletePost(postId) {
            if (confirm('¿Estás seguro de que quieres eliminar este post?')) {
                // Create form and submit
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/posts/${postId}`;
                
                // Add CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                if (csrfToken) {
                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = csrfToken;
                    form.appendChild(csrfInput);
                }
                
                // Add method override for DELETE
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);
                
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</x-app-layout>
