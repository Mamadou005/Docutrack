<x-app-layout>
    {{-- On appelle le header depuis le sous-dossier index --}}
    @include('vitrine.partials.documents.index.header')

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Les alertes peuvent être dans shared car elles servent partout --}}
            @include('vitrine.partials.documents.index.alerts')

            {{-- La table est spécifique à l'index --}}
            @include('vitrine.partials.documents.index.table')

        </div>
    </div>

    {{-- Les modals et scripts de l'index --}}
    @include('vitrine.partials.documents.index.modals')
    @include('vitrine.partials.documents.index.scripts')
</x-app-layout>
