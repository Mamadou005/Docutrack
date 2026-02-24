<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-black text-white tracking-tight">Bon retour !</h2>
        <p class="text-purple-100 font-medium mt-2">Connectez-vous à votre espace DocuTrack</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-bold text-white mb-1 ml-1">Adresse Email</label>
            <input type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                   class="w-full px-4 py-3 rounded-xl bg-white/90 border-none text-purple-900 focus:ring-4 focus:ring-purple-300 transition shadow-inner">
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-200" />
        </div>

        <div>
            <div class="flex justify-between items-center mb-1 ml-1">
                <label class="block text-sm font-bold text-white">Mot de Passe</label>
                @if (Route::has('password.request'))
                <a class="text-xs font-bold text-purple-200 hover:text-white transition" href="{{ route('password.request') }}">
                    Oublié ?
                </a>
                @endif
            </div>
            <input type="password" name="password" required autocomplete="current-password"
                   class="w-full px-4 py-3 rounded-xl bg-white/90 border-none text-purple-900 focus:ring-4 focus:ring-purple-300 transition shadow-inner">
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-200" />
        </div>

        <div class="block ml-1">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 bg-white/50" name="remember">
                <span class="ms-2 text-sm font-bold text-white">Se souvenir de moi</span>
            </label>
        </div>

        <div class="flex flex-col items-center gap-4 mt-8">
            <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-black text-lg rounded-2xl shadow-xl shadow-indigo-900/20 transform active:scale-95 transition duration-200 uppercase tracking-widest">
                Se connecter
            </button>

            @if (Route::has('register'))
            <p class="text-sm font-bold text-white">
                Pas encore de compte ?
                <a class="hover:text-purple-200 underline transition" href="{{ route('register') }}">
                    Créer un compte
                </a>
            </p>
            @endif
        </div>
    </form>
</x-guest-layout>
