<x-slot name="header">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
            <a href="{{ route('documents.index') }}" class="p-2 bg-gray-100 dark:bg-gray-700 rounded-xl text-gray-600 dark:text-gray-300 hover:bg-indigo-100 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-black text-2xl text-indigo-900 dark:text-indigo-400 leading-tight uppercase tracking-tighter">
                {{ $document->title }}
            </h2>
        </div>
        <a href="{{ asset('storage/' . $document->file_path) }}" download class="px-6 py-2 bg-indigo-600 text-white rounded-xl font-black text-xs uppercase tracking-widest hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 dark:shadow-none">
            Télécharger
        </a>
    </div>
</x-slot>
