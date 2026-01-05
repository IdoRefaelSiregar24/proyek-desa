    <script>
function loadProgress(tahapId, page = 1) {
    const params = new URLSearchParams(window.location.search);
    params.set("page", page);

    const container = document.getElementById('progress-container-' + tahapId);

    // Simpan apakah collapse terbuka
    const collapseEl = document.getElementById('collapse' + tahapId);
    const isOpen = collapseEl.classList.contains('show');

    fetch(`/tahapan/${tahapId}/progress?` + params.toString(), {
        headers: { "X-Requested-With": "XMLHttpRequest" }
    })
    .then(res => res.text())
    .then(html => {
        container.innerHTML = html;

        // Jika sebelumnya collapse terbuka, buka kembali
        if (isOpen) {
            const bsCollapse = bootstrap.Collapse.getOrCreateInstance(collapseEl);
            bsCollapse.show();
        }

        // Reattach pagination buttons
        container.querySelectorAll('.pagination-button').forEach(btn => {
            btn.addEventListener('click', function() {
                const page = this.dataset.page;
                loadProgress(tahapId, page);
            });
        });
    })
    .catch(err => console.error(err));
}

    </script>
