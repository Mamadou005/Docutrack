<x-app-layout>
    {{-- 1. Le Header spécifique à l'édition --}}
    @include('vitrine.partials.documents.edit.header')

    {{-- 2. Le Wrapper (Structure + Formulaire) --}}
    @include('vitrine.partials.documents.edit.wrapper')

    {{-- 3. Les Scripts partagés (Correction du nom ici) --}}
    @include('vitrine.partials.documents.shared.scripts')
</x-app-layout>
