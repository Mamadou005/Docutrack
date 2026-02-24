<x-guest-layout>
    <div class="text-center mb-6">
        <h2 class="text-2xl font-black text-white tracking-tight">Créer un compte</h2>
        <p class="text-purple-100 text-sm font-medium">Rejoignez DocuTrack aujourd'hui</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-xs font-bold text-white uppercase mb-1 ml-1">Nom Complet</label>
            <input type="text" name="name" :value="old('name')" required autofocus
                   class="w-full px-4 py-2.5 rounded-xl bg-white/90 border-none text-purple-900 focus:ring-2 focus:ring-purple-300 transition shadow-sm">
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-200 font-bold" />
        </div>

        <div>
            <label class="block text-xs font-bold text-white uppercase mb-1 ml-1">Email Pro</label>
            <input type="email" name="email" :value="old('email')" required
                   class="w-full px-4 py-2.5 rounded-xl bg-white/90 border-none text-purple-900 focus:ring-2 focus:ring-purple-300 transition shadow-sm">
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-200 font-bold" />
        </div>

        <div class="grid grid-cols-1 gap-4">
            <div>
                <label class="block text-xs font-bold text-white uppercase mb-1 ml-1">Mot de Passe</label>
                <input type="password" name="password" required
                       class="w-full px-4 py-2.5 rounded-xl bg-white/90 border-none text-purple-900 focus:ring-2 focus:ring-purple-300 transition shadow-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-white uppercase mb-1 ml-1">Confirmation</label>
                <input type="password" name="password_confirmation" required
                       class="w-full px-4 py-2.5 rounded-xl bg-white/90 border-none text-purple-900 focus:ring-2 focus:ring-purple-300 transition shadow-sm">
            </div>
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-200 font-bold" />

        <div class="flex flex-col items-center gap-4 pt-4">
            <button type="submit" class="w-full py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-xl shadow-lg transition duration-200 uppercase text-sm tracking-widest active:scale-95">
                S'inscrire
            </button>

            <a class="text-xs font-bold text-white/80 hover:text-white underline transition" href="{{ route('login') }}">
                Déjà un compte ? Connectez-vous
            </a>
        </div>
    </form>
</x-guest-layout>
