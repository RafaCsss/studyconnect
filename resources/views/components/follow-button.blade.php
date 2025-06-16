@props(['user', 'isFollowing' => false, 'size' => 'default'])

@php
    $sizeClasses = [
        'small' => 'px-3 py-1.5 text-sm',
        'default' => 'px-4 py-2 text-sm',
        'large' => 'px-6 py-3 text-base',
    ];
    
    $classes = $sizeClasses[$size] ?? $sizeClasses['default'];
@endphp

<button 
    data-follow-button
    data-user-id="{{ $user->id }}"
    data-user-name="{{ $user->name }}"
    data-is-following="{{ $isFollowing ? 'true' : 'false' }}"
    class="follow-btn {{ $classes }} font-medium rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 {{ $isFollowing ? 'bg-gray-200 text-gray-700 hover:bg-gray-300 focus:ring-gray-500' : 'study-gradient study-gradient-hover text-white focus:ring-blue-500' }}"
>
    <span class="follow-text">
        {{ $isFollowing ? '✓ Siguiendo' : '+ Seguir' }}
    </span>
    <span class="loading-text hidden">
        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-current inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Cargando...
    </span>
</button>
