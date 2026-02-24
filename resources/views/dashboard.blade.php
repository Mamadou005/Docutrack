<x-app-layout>
    <div class="py-10 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="relative overflow-hidden bg-indigo-700 rounded-3xl shadow-xl mb-8">
                <div class="px-8 py-10 sm:px-12 sm:py-16 relative z-10">
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">
                        Gérez vos documents en <br class="hidden sm:block"> toute simplicité.
                    </h1>
                    <p class="text-indigo-100 text-lg max-w-md mb-8">
                        Centralisez, sécurisez et organisez tous vos fichiers importants au même endroit.
                    </p>
                    <div class="flex gap-4">
                        <a href="{{ route('documents.create') }}" class="bg-white text-indigo-700 px-6 py-3 rounded-xl font-bold hover:bg-indigo-50 transition shadow-lg">
                            + Nouveau Document
                        </a>
                        <a href="{{ route('documents.index') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-indigo-500 transition border border-indigo-400">
                            Voir la liste
                        </a>
                    </div>
                </div>
                <div class="absolute right-0 top-0 h-full w-1/3 opacity-20 hidden lg:block">
                    <svg class="h-full w-full" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="150" cy="50" r="80" fill="white" />
                        <rect x="100" y="120" width="100" height="100" rx="20" transform="rotate(-15 100 120)" fill="white" />
                    </svg>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white dark:bg-gray-800 p-8 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition">
                    <div class="bg-blue-50 dark:bg-blue-900/30 w-14 h-14 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase tracking-wider">Mes Documents</h3>
                    <p class="text-4xl font-black text-gray-900 dark:text-white mt-2">{{ $totalDocuments }}</p>
                    <p class="text-green-500 text-sm mt-2 font-medium">↑ Stockage sécurisé</p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-8 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition">
                    <div class="bg-purple-50 dark:bg-purple-900/30 w-14 h-14 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase tracking-wider">Catégories</h3>
                    <p class="text-4xl font-black text-gray-900 dark:text-white mt-2">{{ $totalCategories }}</p>
                    <p class="text-purple-500 text-sm mt-2 font-medium">Organisation optimale</p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-8 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition">
                    @if(Auth::user()->isAdmin())
                    <div class="bg-orange-50 dark:bg-orange-900/30 w-14 h-14 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase tracking-wider">Utilisateurs</h3>
                    <p class="text-4xl font-black text-gray-900 dark:text-white mt-2">{{ $totalUsers }}</p>
                    <a href="{{ route('admin.users.index') }}" class="text-indigo-600 text-xs font-bold mt-2 block hover:underline">Gérer les accès →</a>
                    @else
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Ajoutés Récemment</h3>
                    <div class="space-y-4">
                        @forelse($recentDocuments as $doc)
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-indigo-500"></div>
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300 truncate w-32">{{ $doc->title }}</span>
                            <span class="text-xs text-gray-400 ml-auto">{{ $doc->created_at->diffForHumans() }}</span>
                        </div>
                        @empty
                        <p class="text-sm text-gray-500 italic">Aucun document.</p>
                        @endforelse
                    </div>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex items-start gap-4 p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-sm">
                    <div class="p-3 bg-green-100 rounded-xl">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-width="3" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white">Efficacité garantie</h4>
                        <p class="text-sm text-gray-500">Retrouvez vos factures et contrats en moins de 5 secondes.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-sm">
                    <div class="p-3 bg-yellow-100 rounded-xl">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" stroke-width="2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white">Sécurité totale</h4>
                        <p class="text-sm text-gray-500">Vos données sont cryptées et stockées en toute confidentialité.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
