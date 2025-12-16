<script>
document.addEventListener("DOMContentLoaded", function () {

    const mapEl = document.getElementById('map');
    if (!mapEl) return;

    // Ambil koordinat dari DB
    let lat = parseFloat(document.getElementById('db-lat')?.value);
    let lng = parseFloat(document.getElementById('db-lng')?.value);

    // 🔴 FALLBACK JIKA DATA KOSONG / TIDAK VALID
    if (isNaN(lat) || isNaN(lng)) {
        console.warn("Koordinat proyek tidak valid, menggunakan default lokasi");
        lat = -0.507068;      // default Desa / Indonesia
        lng = 101.447779;
    }

    // Init Map
    const map = L.map(mapEl).setView([lat, lng], 15);

    // Tile Layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Marker
    L.marker([lat, lng])
        .addTo(map)
        .bindPopup("Lokasi Proyek");

    /* ================= GEOJSON (OPSIONAL) ================= */
    const geojsonInput = document.getElementById('db-geojson');
    if (geojsonInput && geojsonInput.value) {
        try {
            const geojsonData = JSON.parse(geojsonInput.value);

            const geoLayer = L.geoJSON(geojsonData, {
                style: {
                    color: '#EF151B',
                    weight: 2,
                    fillOpacity: 0.3
                }
            }).addTo(map);

            map.fitBounds(geoLayer.getBounds());
        } catch (e) {
            console.error("GeoJSON tidak valid", e);
        }
    }

});
</script>
