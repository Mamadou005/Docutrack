<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DocuTrack | Gestion Intelligente de Documents</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class' }
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,800&display=swap" rel="stylesheet" />
</head>
<body class="antialiased font-sans bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">

<nav class="sticky top-0 z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-100 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 flex items-center justify-between h-20">
        <div class="flex items-center gap-2">
            <div class="bg-indigo-600 p-2 rounded-xl shadow-lg shadow-indigo-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <span class="text-2xl font-black tracking-tighter text-indigo-900 dark:text-white">DocuTrack</span>
        </div>

        <div class="flex gap-4 items-center">
            <button id="theme-toggle" class="p-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-xl transition">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path></svg>
            </button>

            @if (Route::has('login'))
            @auth
            <a href="{{ url('/dashboard') }}" class="px-5 py-2.5 rounded-xl bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 font-bold hover:bg-indigo-100 transition">Tableau de bord</a>
            @else
            <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 dark:text-gray-400 hover:text-indigo-600">Connexion</a>
            <a href="{{ route('register') }}" class="px-6 py-2.5 rounded-xl bg-indigo-600 text-white font-bold shadow-xl shadow-indigo-200 dark:shadow-none hover:bg-indigo-700 transition">Essai gratuit</a>
            @endauth
            @endif
        </div>
    </div>
</nav>

<header class="relative pt-16 pb-32 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div>
            <span class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-wide text-indigo-600 dark:text-indigo-400 uppercase bg-indigo-50 dark:bg-indigo-900/20 rounded-full italic">
                🚀 Simplifiez votre archivage
            </span>
            <h1 class="text-5xl lg:text-7xl font-extrabold text-gray-900 dark:text-white leading-[1.1] mb-8">
                Gérez vos documents en <span class="text-indigo-600 dark:text-indigo-400">toute simplicité.</span>
            </h1>
            <p class="text-xl text-gray-500 dark:text-gray-400 mb-10 leading-relaxed">
                Ne perdez plus de temps à chercher vos factures ou contrats. DocuTrack centralise tout pour vous, en toute sécurité.
            </p>
            <div class="flex flex-wrap gap-4 items-center">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-black text-lg shadow-2xl shadow-indigo-300 dark:shadow-none hover:scale-105 transition-transform">
                    Commencer maintenant
                </a>
                <div class="flex -space-x-2 overflow-hidden p-2 items-center">
                    <div class="flex -space-x-3">
                        <img class="inline-block h-10 w-10 rounded-full ring-4 ring-white dark:ring-gray-900" src="https://ui-avatars.com/api/?name=U1&background=random" alt="">
                        <img class="inline-block h-10 w-10 rounded-full ring-4 ring-white dark:ring-gray-900" src="https://ui-avatars.com/api/?name=U2&background=random" alt="">
                        <img class="inline-block h-10 w-10 rounded-full ring-4 ring-white dark:ring-gray-900" src="https://ui-avatars.com/api/?name=U3&background=random" alt="">
                    </div>
                    <span class="pl-4 text-sm font-bold text-gray-500 dark:text-gray-400">+500 utilisateurs</span>
                </div>
            </div>
        </div>

        <div class="relative flex justify-center lg:justify-end">
            <div class="absolute inset-0 bg-indigo-600/20 dark:bg-indigo-500/30 rounded-[3rem] rotate-3 scale-95 translate-x-4"></div>

            <div class="relative bg-white dark:bg-gray-800 p-2 rounded-[2.5rem] shadow-2xl border border-gray-100 dark:border-gray-700 transform -rotate-2 hover:rotate-0 transition-all duration-500 max-w-lg w-full overflow-hidden">
                <div class="rounded-[2rem] overflow-hidden bg-[#0f172a] aspect-square lg:aspect-video flex items-center justify-center">
                    <img src="{{ asset('images/logo-docutrack.png') }}"
                         alt="DocuTrack Logo"
                         class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                </div>
            </div>
        </div>
    </div>
</header>

<section class="py-24 bg-gray-50 dark:bg-gray-800/50 transition-colors">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center mb-16">
        <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-4">Pourquoi choisir DocuTrack ?</h2>
        <div class="h-1.5 w-20 bg-indigo-600 mx-auto rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white dark:bg-gray-800 p-10 rounded-[2.5rem] border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-xl transition duration-300">
            <div class="w-14 h-14 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-300 rounded-2xl flex items-center justify-center mb-8">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
            </div>
            <h3 class="text-xl font-extrabold mb-4 dark:text-white">Stockage Cloud</h3>
            <p class="text-gray-500 dark:text-gray-400 leading-relaxed">Vos documents sont accessibles partout, tout le temps.</p>
        </div>

        <div class="bg-white dark:bg-gray-800 p-10 rounded-[2.5rem] border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-xl transition duration-300 transform md:-translate-y-4">
            <div class="w-14 h-14 bg-green-50 dark:bg-green-900/30 text-green-600 dark:text-green-300 rounded-2xl flex items-center justify-center mb-8">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
            <h3 class="text-xl font-extrabold mb-4 dark:text-white">Sécurité Maximale</h3>
            <p class="text-gray-500 dark:text-gray-400 leading-relaxed">Cryptage de bout en bout pour garantir la confidentialité.</p>
        </div>

        <div class="bg-white dark:bg-gray-800 p-10 rounded-[2.5rem] border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-xl transition duration-300">
            <div class="w-14 h-14 bg-purple-50 dark:bg-purple-900/30 text-purple-600 dark:text-purple-300 rounded-2xl flex items-center justify-center mb-8">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
            </div>
            <h3 class="text-xl font-extrabold mb-4 dark:text-white">Tri Automatique</h3>
            <p class="text-gray-500 dark:text-gray-400 leading-relaxed">Classez vos fichiers par catégories personnalisables.</p>
        </div>
    </div>
</section>

<footer class="py-12 border-t border-gray-100 dark:border-gray-800 text-center">
    <p class="text-gray-400 dark:text-gray-500 font-medium">&copy; 2026 DocuTrack. Créé avec passion pour l'organisation.</p>
</footer>

<script>
    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    var themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function() {
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }
    });
</script>
</body>
</html>
