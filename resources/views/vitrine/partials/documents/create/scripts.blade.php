@push('scripts')
<script>
    function updateFileName(input) {
        if (input.files && input.files[0]) {
            const fileName = input.files[0].name;
            const label = document.getElementById('file-name');
            label.innerText = "Prêt : " + fileName;
            label.classList.remove('text-gray-400', 'dark:text-gray-500');
            label.classList.add('text-green-500', 'dark:text-green-400');
        }
    }
</script>
@endpush
