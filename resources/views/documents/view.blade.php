<x-app-layout>
    {{-- 1. Le Header avec bouton retour et téléchargement --}}
    @include('vitrine.partials.documents.view.header')

    {{-- 2. Le Wrapper structurel qui contient la logique d'affichage --}}
    @include('vitrine.partials.documents.view.wrapper')
</x-app-layout>
