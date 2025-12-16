<script>
document.addEventListener("DOMContentLoaded", function () {

    if (!document.getElementById('map')) {
        console.error('DIV #map tidak ditemukan');
        return;
    }

    const lat = parseFloat(document.getElementById('db-lat')?.value);
    const lng = parseFloat(document.getElementById('db-lng')?.value);
    const geojsonStr = document.getElementById('db-geojson')?.value;

    if (isNaN(lat) || isNaN(lng)) {
        console.error('Koordinat tidak valid:', lat, lng);
        return;
    }

    const map = L.map('map').setView([lat, lng], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map);

    if (geojsonStr) {
        try {
            const geojson = JSON.parse(geojsonStr);
            const layer = L.geoJSON(geojson).addTo(map);
            map.fitBounds(layer.getBounds());
        } catch (e) {
            console.warn('GeoJSON invalid');
        }
    }

    setTimeout(() => {
        map.invalidateSize();
    }, 500);
});
</script>
