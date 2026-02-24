<div class="py-6 h-[calc(100vh-180px)]">
    <div class="max-w-7xl mx-auto h-full sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm border border-gray-100 dark:border-gray-700 sm:rounded-[2.5rem] h-full p-2">

            {{-- On inclut ici la logique d'affichage selon le type de fichier --}}
            @include('vitrine.partials.documents.view.content')

        </div>
    </div>
</div>
