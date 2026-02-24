@csrf
{{-- Titre --}}
<div>
    <label for="title" class="block text-xs font-black text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-3 ml-1">Titre du document</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-indigo-500">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
        </div>
        <input type="text" name="title" id="title" required value="{{ old('title', $document->title ?? '') }}"
               class="block w-full pl-12 pr-4 py-4 bg-gray-50 dark:bg-gray-700/50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 font-bold text-gray-900 dark:text-white placeholder-gray-400 transition"
               placeholder="Ex: Contrat de prestation">
    </div>
</div>

{{-- Catégorie --}}
<div>
    <label for="category_id" class="block text-xs font-black text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-3 ml-1">Catégorie</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-purple-500">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
        </div>
        <select name="category_id" id="category_id" required
                class="block w-full pl-12 pr-4 py-4 bg-gray-50 dark:bg-gray-700/50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 font-bold text-gray-900 dark:text-white transition appearance-none">
            <option value="" disabled {{ !isset($document) ? 'selected' : '' }}>Choisir une catégorie</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ (old('category_id', $document->category_id ?? '') == $category->id) ? 'selected' : '' }}>
            {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>
</div>

{{-- Upload de fichier --}}
<div>
    <label class="block text-xs font-black text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-3 ml-1">
        Fichier {{ isset($document) ? '(Laisser vide pour garder l\'actuel)' : '' }}
    </label>
    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-100 dark:border-gray-700 border-dashed rounded-[2rem] bg-gray-50 dark:bg-gray-700/30 hover:bg-indigo-50/50 dark:hover:bg-indigo-900/20 transition duration-300 group">
        <div class="space-y-2 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-300 dark:text-gray-600 group-hover:text-indigo-400 transition" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div class="flex text-sm text-gray-600 dark:text-gray-400 font-bold justify-center">
                <label for="file_path" class="relative cursor-pointer rounded-md text-indigo-600 dark:text-indigo-400 hover:text-indigo-500">
                    <span>{{ isset($document) ? 'Remplacer le fichier' : 'Sélectionner un fichier' }}</span>
                    <input id="file_path" name="file_path" type="file" class="sr-only" {{ isset($document) ? '' : 'required' }} onchange="updateFileName(this)">
                </label>
            </div>
            <p class="text-xs text-gray-400 dark:text-gray-500 font-black" id="file-name">
                @if(isset($document))
                <span class="text-amber-500">Actuel : {{ basename($document->file_path) }}</span>
                @else
                PDF, PNG, JPG (Max 10MB)
                @endif
            </p>
        </div>
    </div>
</div>
