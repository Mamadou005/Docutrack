<x-app-layout>
    {{-- 1. Le Header --}}
    @include('vitrine.partials.documents.create.header')

    {{-- 2. Le Contenu (Wrapper qui contient le formulaire) --}}
    @include('vitrine.partials.documents.create.wrapper')

    {{-- 3. Les Scripts --}}
    @include('vitrine.partials.documents.shared.scripts')
</x-app-layout>
