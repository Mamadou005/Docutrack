<script>
    function updateFileName(input) {
        const fileNameDisplay = document.getElementById('file-name');
        if (input.files && input.files[0]) {
            const fileName = input.files[0].name;
            fileNameDisplay.innerText = "Fichier choisi : " + fileName;
            fileNameDisplay.classList.remove('text-gray-400');
            fileNameDisplay.classList.add('text-indigo-600', 'dark:text-indigo-400', 'font-bold');
        }
    }
</script>
