<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">¡Bienvenido de vuelta!</h2>
        <p class="text-gray-600">Accede a tu cuenta de StudyConnect</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')" class="text-gray-700 font-medium" />
            <x-text-input id="email" 
                class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-200" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus 
                autocomplete="username"
                placeholder="tu-email@universidad.edu.pe" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Contraseña')" class="text-gray-700 font-medium" />
            <x-text-input id="password" 
                class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-200"
                type="password"
                name="password"
                required 
                autocomplete="current-password"
                placeholder="Tu contraseña segura" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" 
                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" 
                    name="remember">
                <span class="ms-2 text-sm text-gray-600">Recordarme</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-blue-600 hover:text-blue-800 hover:underline transition duration-200" 
                   href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <!-- Login Button -->
        <div class="space-y-4">
            <button type="submit" 
                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold py-3 px-4 rounded-lg shadow-lg transform transition duration-200 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Iniciar Sesión
            </button>

            <div class="text-center">
                <span class="text-gray-600">¿No tienes cuenta?</span>
                <a href="{{ route('register') }}" 
                   class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition duration-200 ml-1">
                    Regístrate aquí
                </a>
            </div>
        </div>
    </form>

    <!-- Quick Login for Testing -->
    @if (app()->environment('local'))
        <div class="mt-6 pt-6 border-t border-gray-200">
            <p class="text-xs text-gray-500 text-center mb-3">🧪 Acceso rápido para testing:</p>
            <button onclick="quickLogin()" 
                class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm py-2 px-4 rounded border transition duration-200">
                Login como usuario de prueba
            </button>
        </div>

        <script>
            function quickLogin() {
                document.getElementById('email').value = 'test@studyconnect.com';
                document.getElementById('password').value = 'password';
            }
        </script>
    @endif
</x-guest-layout>