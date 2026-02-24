<div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm border border-gray-100 dark:border-gray-700 sm:rounded-[2.5rem] p-8 md:p-12">

            {{-- Changement de la route vers 'update' et ajout de l'ID du document --}}
            <form action="{{ route('documents.update', $document) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT') {{-- Indispensable pour que le contrôleur accepte la modification --}}

                {{-- On appelle le MÊME formulaire partagé --}}
                @include('vitrine.partials.documents.shared.form')

                <div class="pt-4">
                    {{-- On change la couleur en amber-500 pour différencier l'action de modification --}}
                    <button type="submit" class="w-full inline-flex items-center justify-center px-8 py-5 bg-amber-500 border border-transparent rounded-[1.5rem] font-black text-sm text-white uppercase tracking-[0.2em] hover:bg-amber-600 shadow-xl shadow-amber-100 dark:shadow-none transition-all active:scale-95">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Mettre à jour le document
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
