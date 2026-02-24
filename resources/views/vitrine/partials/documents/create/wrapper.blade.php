<div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm border border-gray-100 dark:border-gray-700 sm:rounded-[2.5rem] p-8 md:p-12">

            <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                {{-- On appelle les champs ici, à l'intérieur du décor --}}
                @include('vitrine.partials.documents.shared.form')

                <div class="pt-4">
                    <button type="submit" class="w-full inline-flex items-center justify-center px-8 py-5 bg-indigo-600 border border-transparent rounded-[1.5rem] font-black text-sm text-white uppercase tracking-[0.2em] hover:bg-indigo-700 shadow-xl shadow-indigo-100 dark:shadow-none transition-all active:scale-95">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Enregistrer le document
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
