// Follow/Unfollow functionality for StudyConnect
document.addEventListener('DOMContentLoaded', function() {
    let isProcessing = false; // Prevent multiple simultaneous requests
    
    // Follow/Unfollow functionality
    document.addEventListener('click', function(e) {
        const button = e.target.closest('[data-follow-button]');
        if (!button || isProcessing) return;
        
        e.preventDefault();
        e.stopPropagation();
        
        isProcessing = true;
        
        const userId = button.dataset.userId;
        const userName = button.dataset.userName;
        const isFollowing = button.dataset.isFollowing === 'true';
        const followText = button.querySelector('.follow-text');
        const loadingText = button.querySelector('.loading-text');
        
        // Mostrar loading
        followText.classList.add('hidden');
        loadingText.classList.remove('hidden');
        button.disabled = true;
        
        // Construir URL manualmente para evitar conflictos
        const baseUrl = window.location.origin;
        const action = isFollowing ? 'unfollow' : 'follow';
        const url = `${baseUrl}/${action}/${userId}`;
        const method = isFollowing ? 'DELETE' : 'POST';
        
        fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Actualizar estado del botón
                const newIsFollowing = !isFollowing;
                button.dataset.isFollowing = newIsFollowing.toString();
                
                // Actualizar clases y texto
                if (newIsFollowing) {
                    button.className = button.className.replace('study-gradient study-gradient-hover text-white focus:ring-blue-500', 'bg-gray-200 text-gray-700 hover:bg-gray-300 focus:ring-gray-500');
                    followText.textContent = '✓ Siguiendo';
                } else {
                    button.className = button.className.replace('bg-gray-200 text-gray-700 hover:bg-gray-300 focus:ring-gray-500', 'study-gradient study-gradient-hover text-white focus:ring-blue-500');
                    followText.textContent = '+ Seguir';
                }
                
                // Actualizar stats en la página si existen
                if (data.stats) {
                    const followersCount = document.querySelector('[data-followers-count]');
                    const followingCount = document.querySelector('[data-following-count]');
                    
                    if (followersCount) {
                        followersCount.textContent = data.stats.followers_count;
                    }
                    if (followingCount) {
                        followingCount.textContent = data.stats.following_count;
                    }
                }
                
                // Mostrar notificación
                showNotification(data.message, 'success');
                
            } else {
                showNotification(data.error || 'Error al procesar la solicitud', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Error de conexión', 'error');
        })
        .finally(() => {
            // Ocultar loading
            followText.classList.remove('hidden');
            loadingText.classList.add('hidden');
            button.disabled = false;
            isProcessing = false; // Allow new requests
        });
    });
    
    // Función para mostrar notificaciones
    function showNotification(message, type = 'info') {
        // Remover notificaciones existentes
        const existingNotifications = document.querySelectorAll('.study-notification');
        existingNotifications.forEach(notif => notif.remove());
        
        // Crear elemento de notificación
        const notification = document.createElement('div');
        notification.className = `study-notification fixed top-4 right-4 z-50 px-4 py-3 rounded-lg shadow-lg transform transition-all duration-300 translate-x-full ${
            type === 'success' ? 'bg-green-500 text-white' : 
            type === 'error' ? 'bg-red-500 text-white' : 
            'bg-blue-500 text-white'
        }`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        // Animar entrada
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);
        
        // Remover después de 3 segundos
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }
});
