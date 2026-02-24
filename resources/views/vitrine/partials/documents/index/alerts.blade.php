@if(session('success'))
<div class="mb-6 p-4 bg-green-50 dark:bg-green-900/30 border-l-4 border-green-500 rounded-r-2xl shadow-sm flex items-center animate-in fade-in slide-in-from-top-4 duration-500">
    <svg class="w-6 h-6 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
    </svg>
    <span class="text-green-800 dark:text-green-200 font-bold">{{ session('success') }}</span>
</div>
@endif
