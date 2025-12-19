<!-- Script untuk preview thumbnail & media -->
<script>
    // Preview single thumbnail
    document.getElementById('thumbnail').addEventListener('change', function(e) {
        const [file] = this.files;
        if (file) {
            document.getElementById('previewThumbnail').src = URL.createObjectURL(file);
        }
    });

    // Preview multiple media (Gallery / Media Lainnya)
    document.getElementById('media_files').addEventListener('change', function(e) {
        const preview = document.getElementById('previewMedia');
        preview.innerHTML = '';
        Array.from(this.files).forEach(file => {
            const ext = file.name.split('.').pop().toLowerCase();
            let elem;
            if (['jpg', 'jpeg', 'png', 'gif'].includes(ext)) {
                elem = document.createElement('img');
                elem.src = URL.createObjectURL(file);
                elem.style.maxHeight = '100px';
                elem.classList.add('rounded');
            } else {
                elem = document.createElement('div');
                elem.textContent = file.name;
                elem.classList.add('border', 'p-1', 'rounded', 'bg-light');
            }
            preview.appendChild(elem);
        });
    });

    // Preview multiple media lokasi proyek
    document.getElementById('media_lokasi').addEventListener('change', function(e) {
        const preview = document.getElementById('previewMediaLokasi');
        preview.innerHTML = '';
        Array.from(this.files).forEach(file => {
            const ext = file.name.split('.').pop().toLowerCase();
            let elem;
            if (['jpg', 'jpeg', 'png', 'gif'].includes(ext)) {
                elem = document.createElement('img');
                elem.src = URL.createObjectURL(file);
                elem.style.maxHeight = '100px';
                elem.classList.add('rounded');
            } else {
                elem = document.createElement('div');
                elem.textContent = file.name;
                elem.classList.add('border', 'p-1', 'rounded', 'bg-light');
            }
            preview.appendChild(elem);
        });
    });
</script>
