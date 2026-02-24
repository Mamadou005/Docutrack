<x-slot name="header">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="font-black text-3xl text-amber-600 dark:text-amber-400 leading-tight">
                {{ __('Modifier le document') }}
            </h2>
            <p class="text-gray-500 dark:text-gray-400 text-sm font-medium mt-1">
                Modification de : <span class="font-bold italic">"{{ $document->title }}"</span>
            </p>
        </div>
        <a href="{{ route('documents.index') }}" class="inline-flex items-center px-6 py-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl font-black text-sm text-gray-600 dark:text-gray-400 uppercase tracking-widest hover:bg-gray-50 dark:hover:bg-gray-700 transition-all active:scale-95 shadow-sm">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Annuler
        </a>
    </div>
</x-slot>
