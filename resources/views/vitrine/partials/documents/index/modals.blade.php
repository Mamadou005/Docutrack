<div id="previewModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-indigo-900/60 backdrop-blur-md" onclick="closePreview()"></div>
    <div class="relative bg-white dark:bg-gray-800 w-full max-w-5xl h-[85vh] rounded-[2.5rem] shadow-2xl overflow-hidden flex flex-col border border-white/20">
        <div class="flex items-center justify-between px-8 py-4 border-b border-gray-100 dark:border-gray-700">
            <h3 id="modalTitle" class="font-black text-indigo-900 dark:text-indigo-400 text-lg uppercase tracking-tight">Visualisation</h3>
            <button onclick="closePreview()" class="text-gray-400 hover:text-red-500 transition"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
        </div>
        <div class="flex-1 bg-gray-100 dark:bg-gray-900"><iframe id="previewFrame" src="" class="w-full h-full border-none"></iframe></div>
    </div>
</div>

<div id="deleteModal" class="fixed inset-0 z-[110] hidden flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-red-900/40 backdrop-blur-sm" onclick="closeDeleteModal()"></div>
    <div class="relative bg-white dark:bg-gray-800 w-full max-w-md rounded-[2.5rem] shadow-2xl p-8 text-center border border-white/20">
        <div class="w-20 h-20 bg-red-100 dark:bg-red-900/50 text-red-600 dark:text-red-400 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
        </div>
        <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-2 uppercase tracking-tight">Supprimer ?</h3>
        <p class="text-gray-500 dark:text-gray-400 font-medium mb-8">Voulez-vous vraiment supprimer <br><span id="deleteDocName" class="text-red-600 dark:text-red-400 font-bold"></span> ?</p>
        <div class="flex gap-4">
            <button onclick="closeDeleteModal()" class="flex-1 py-4 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300 font-black rounded-2xl transition uppercase text-sm tracking-widest">Annuler</button>
            <form id="deleteForm" method="POST" class="flex-1">
                @csrf @method('DELETE')
                <button type="submit" class="w-full py-4 bg-red-600 hover:bg-red-700 text-white font-black rounded-2xl shadow-lg shadow-red-200 dark:shadow-none transition uppercase text-sm tracking-widest">Confirmer</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openPreview(url, title) {
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('previewFrame').src = url;
        document.getElementById('previewModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    function closePreview() {
        document.getElementById('previewModal').classList.add('hidden');
        document.getElementById('previewFrame').src = '';
        document.body.style.overflow = 'auto';
    }
    function confirmDelete(actionUrl, docName) {
        document.getElementById('deleteDocName').innerText = docName;
        document.getElementById('deleteForm').action = actionUrl;
        document.getElementById('deleteModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
</script>
