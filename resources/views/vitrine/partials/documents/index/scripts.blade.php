@push('scripts')
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
@endpush
