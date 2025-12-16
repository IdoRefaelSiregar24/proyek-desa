    <script>
        function loadProgress(tahapId, page = 1) {

            const params = new URLSearchParams(window.location.search);
            params.set("page", page);

            fetch(`/tahapan/${tahapId}/progress?` + params.toString(), {
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                .then(response => response.text())
                .then(html => {
                    document.getElementById('progress-container-' + tahapId).innerHTML = html;
                })
                .catch(err => console.error('Error:', err));
        }
    </script>
