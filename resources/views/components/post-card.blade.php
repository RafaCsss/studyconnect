@props(['post', 'showUserInfo' => true])

<div class="study-card p-6 hover:shadow-xl transition-all duration-300 animate-fade-in">
    <div class="flex items-start space-x-4">
        @if($showUserInfo)
            <!-- User Avatar -->
            <img src="{{ $post->user->avatar_url }}" 
                 alt="{{ $post->user->name }}" 
                 class="w-12 h-12 rounded-full border-2 border-gray-200">
        @endif
        
        <div class="flex-1 min-w-0">
            @if($showUserInfo)
                <!-- User Info Header -->
                <div class="flex items-center space-x-2 mb-3">
                    <h4 class="font-semibold text-gray-900 hover:text-blue-600 transition cursor-pointer">{{ $post->user->name }}</h4>
                    <span class="text-gray-400">•</span>
                    <span class="text-sm text-gray-500">{{ $post->user->career }}</span>
                    <span class="text-gray-400">•</span>
                    <span class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                </div>
            @endif
            
            <!-- Post Content -->
            <div class="mb-4">
                <p class="text-gray-800 leading-relaxed">{{ $post->content }}</p>
            </div>
            
            <!-- Post Actions -->
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <!-- Like Button -->
                    <button data-like-button data-post-id="{{ $post->id }}" 
                            class="flex items-center space-x-2 text-gray-500 hover:text-red-500 transition duration-200 group">
                        <svg class="w-5 h-5 transition-transform duration-200 group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                        <span class="text-sm font-medium">{{ $post->likes_count }}</span>
                    </button>
                    
                    <!-- Comment Button -->
                    <button class="flex items-center space-x-2 text-gray-500 hover:text-blue-500 transition duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <span class="text-sm font-medium">{{ $post->comments_count }}</span>
                    </button>
                </div>
                
                <!-- University Tag -->
                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-1 rounded-full animate-float">
                    🏫 {{ $post->user->university }}
                </span>
            </div>
        </div>
    </div>
</div>
