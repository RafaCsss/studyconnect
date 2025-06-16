<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feed Principal') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 animate-fade-in">
            
            <!-- Welcome Header -->
            <div class="study-card mb-6 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold mb-1">¡Hola, {{ $user->name }}! 🎓</h1>
                            <p class="text-blue-100">Descubre qué están compartiendo tus compañeros de estudio</p>
                        </div>
                        <button class="bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200 border border-white/30">
                            ✏️ Crear Post
                        </button>
                    </div>
                </div>
                
                <!-- Quick Stats -->
                <div class="px-6 py-4 bg-white/50">
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <div class="text-lg font-bold text-blue-600">{{ $stats['total_posts'] }}</div>
                            <div class="text-xs text-gray-600">Posts en tu feed</div>
                        </div>
                        <div>
                            <div class="text-lg font-bold text-purple-600">{{ $stats['following_count'] }}</div>
                            <div class="text-xs text-gray-600">Estudiantes siguiendo</div>
                        </div>
                        <div>
                            <div class="text-lg font-bold text-green-600">{{ $stats['new_posts_today'] }}</div>
                            <div class="text-xs text-gray-600">Posts hoy</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Feed Posts -->
            <div class="space-y-6">
                @if($feedPosts->count() > 0)
                    @foreach($feedPosts as $post)
                        <x-post-card :post="$post" />
                    @endforeach
                    
                    <!-- Pagination -->
                    @if($feedPosts->hasPages())
                        <div class="study-card p-6">
                            {{ $feedPosts->links() }}
                        </div>
                    @endif
                @else
                    <!-- Empty State -->
                    <div class="study-card p-12 text-center">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6 animate-float">
                            <svg class="w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">¡Tu feed está esperando contenido! 📚</h3>
                        <p class="text-gray-600 mb-6 max-w-md mx-auto">
                            Sigue a más estudiantes para ver sus posts o comparte tu primera experiencia de estudio.
                        </p>
                        <div class="space-y-3">
                            <button class="study-gradient study-gradient-hover text-white font-medium py-3 px-6 rounded-lg transition duration-200 w-full sm:w-auto">
                                ✏️ Crear mi primer post
                            </button>
                            <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-3 px-6 rounded-lg transition duration-200 w-full sm:w-auto ml-0 sm:ml-3">
                                🔍 Buscar estudiantes
                            </button>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Floating Action Button (Mobile) -->
            <div class="fixed bottom-6 right-6 sm:hidden">
                <button class="study-gradient study-gradient-hover text-white p-4 rounded-full shadow-lg hover:shadow-xl transition duration-200">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Custom JavaScript for Feed Interactivity -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Like button functionality (reutilizado del perfil)
            const likeButtons = document.querySelectorAll('[data-like-button]');
            
            likeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const heart = this.querySelector('svg');
                    const count = this.querySelector('span');
                    
                    // Toggle like state (simulado - sin backend por ahora)
                    if (this.classList.contains('text-red-500')) {
                        this.classList.remove('text-red-500');
                        this.classList.add('text-gray-500');
                        count.textContent = parseInt(count.textContent) - 1;
                    } else {
                        this.classList.remove('text-gray-500');
                        this.classList.add('text-red-500');
                        count.textContent = parseInt(count.textContent) + 1;
                        
                        // Animación del corazón (reutilizada)
                        heart.style.transform = 'scale(1.3)';
                        setTimeout(() => {
                            heart.style.transform = 'scale(1)';
                        }, 200);
                    }
                });
            });
            
            // Smooth card hover effects (reutilizado)
            const cards = document.querySelectorAll('.study-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</x-app-layout>
