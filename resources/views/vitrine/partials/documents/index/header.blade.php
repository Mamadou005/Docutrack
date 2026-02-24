<x-slot name="header">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="font-black text-3xl text-indigo-900 dark:text-indigo-400 leading-tight">
                {{ __('Mes Documents') }}
            </h2>
            <p class="text-gray-500 dark:text-gray-400 text-sm font-medium mt-1">Gérez et organisez vos fichiers en toute sécurité.</p>
        </div>
        <a href="{{ route('documents.create') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-2xl font-black text-sm text-white uppercase tracking-widest hover:bg-indigo-700 shadow-lg shadow-indigo-200 dark:shadow-none transition-all active:scale-95">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Nouveau Document
        </a>
    </div>
</x-slot>
