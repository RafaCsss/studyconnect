<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">¡Únete a StudyConnect!</h2>
        <p class="text-gray-600">Crea tu perfil académico y conecta con otros estudiantes</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre Completo')" class="text-gray-700 font-medium" />
            <x-text-input id="name" 
                class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-200" 
                type="text" 
                name="name" 
                :value="old('name')" 
                required 
                autofocus 
                autocomplete="name"
                placeholder="Ej: María García López" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')" class="text-gray-700 font-medium" />
            <x-text-input id="email" 
                class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-200" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autocomplete="username"
                placeholder="tu-email@universidad.edu.pe" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <p class="mt-1 text-xs text-gray-500">Preferiblemente tu email universitario</p>
        </div>

        <!-- Academic Fields Row 1 -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- University -->
            <div>
                <x-input-label for="university" :value="__('Universidad')" class="text-gray-700 font-medium" />
                <select id="university" name="university" 
                    class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-200" 
                    required>
                    <option value="">Selecciona tu universidad</option>
                    <option value="Universidad de Lima" {{ old('university') == 'Universidad de Lima' ? 'selected' : '' }}>Universidad de Lima</option>
                    <option value="Pontificia Universidad Católica del Perú" {{ old('university') == 'Pontificia Universidad Católica del Perú' ? 'selected' : '' }}>PUCP</option>
                    <option value="Universidad Nacional Mayor de San Marcos" {{ old('university') == 'Universidad Nacional Mayor de San Marcos' ? 'selected' : '' }}>UNMSM</option>
                    <option value="Universidad Nacional de Ingeniería" {{ old('university') == 'Universidad Nacional de Ingeniería' ? 'selected' : '' }}>UNI</option>
                    <option value="Universidad Peruana Cayetano Heredia" {{ old('university') == 'Universidad Peruana Cayetano Heredia' ? 'selected' : '' }}>UPCH</option>
                    <option value="Universidad del Pacífico" {{ old('university') == 'Universidad del Pacífico' ? 'selected' : '' }}>UP</option>
                    <option value="Universidad de Piura" {{ old('university') == 'Universidad de Piura' ? 'selected' : '' }}>UDEP</option>
                    <option value="Universidad San Martín de Porres" {{ old('university') == 'Universidad San Martín de Porres' ? 'selected' : '' }}>USMP</option>
                    <option value="Universidad Privada del Norte" {{ old('university') == 'Universidad Privada del Norte' ? 'selected' : '' }}>UPN</option>
                    <option value="Universidad Tecnológica del Perú" {{ old('university') == 'Universidad Tecnológica del Perú' ? 'selected' : '' }}>UTP</option>
                    <option value="Otra">Otra</option>
                </select>
                <x-input-error :messages="$errors->get('university')" class="mt-2" />
            </div>

            <!-- Semester -->
            <div>
                <x-input-label for="semester" :value="__('Ciclo/Semestre')" class="text-gray-700 font-medium" />
                <select id="semester" name="semester" 
                    class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-200" 
                    required>
                    <option value="">Selecciona</option>
                    <option value="1" {{ old('semester') == '1' ? 'selected' : '' }}>1° Ciclo</option>
                    <option value="2" {{ old('semester') == '2' ? 'selected' : '' }}>2° Ciclo</option>
                    <option value="3" {{ old('semester') == '3' ? 'selected' : '' }}>3° Ciclo</option>
                    <option value="4" {{ old('semester') == '4' ? 'selected' : '' }}>4° Ciclo</option>
                    <option value="5" {{ old('semester') == '5' ? 'selected' : '' }}>5° Ciclo</option>
                    <option value="6" {{ old('semester') == '6' ? 'selected' : '' }}>6° Ciclo</option>
                    <option value="7" {{ old('semester') == '7' ? 'selected' : '' }}>7° Ciclo</option>
                    <option value="8" {{ old('semester') == '8' ? 'selected' : '' }}>8° Ciclo</option>
                    <option value="9" {{ old('semester') == '9' ? 'selected' : '' }}>9° Ciclo</option>
                    <option value="10" {{ old('semester') == '10' ? 'selected' : '' }}>10° Ciclo</option>
                    <option value="11+" {{ old('semester') == '11+' ? 'selected' : '' }}>11° Ciclo o más</option>
                    <option value="Egresado" {{ old('semester') == 'Egresado' ? 'selected' : '' }}>Egresado</option>
                </select>
                <x-input-error :messages="$errors->get('semester')" class="mt-2" />
            </div>
        </div>

        <!-- Career -->
        <div>
            <x-input-label for="career" :value="__('Carrera')" class="text-gray-700 font-medium" />
            <x-text-input id="career" 
                class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-200" 
                type="text" 
                name="career" 
                :value="old('career')" 
                required 
                placeholder="Ej: Ingeniería de Sistemas, Administración, Medicina, etc." />
            <x-input-error :messages="$errors->get('career')" class="mt-2" />
        </div>

        <!-- Password Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Contraseña')" class="text-gray-700 font-medium" />
                <x-text-input id="password" 
                    class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-200"
                    type="password"
                    name="password"
                    required 
                    autocomplete="new-password"
                    placeholder="Mínimo 8 caracteres" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-gray-700 font-medium" />
                <x-text-input id="password_confirmation" 
                    class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-200"
                    type="password"
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password"
                    placeholder="Repite tu contraseña" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <!-- Terms and Register Button -->
        <div class="space-y-4">
            <div class="flex items-start">
                <input id="terms" type="checkbox" required
                    class="mt-1 rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                <label for="terms" class="ml-2 text-sm text-gray-600">
                    Acepto los <a href="#" class="text-blue-600 hover:underline">términos y condiciones</a> 
                    y la <a href="#" class="text-blue-600 hover:underline">política de privacidad</a> de StudyConnect
                </label>
            </div>

            <button type="submit" 
                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold py-3 px-4 rounded-lg shadow-lg transform transition duration-200 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Crear Mi Cuenta
            </button>

            <div class="text-center">
                <span class="text-gray-600">¿Ya tienes cuenta?</span>
                <a href="{{ route('login') }}" 
                   class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition duration-200 ml-1">
                    Inicia sesión
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>