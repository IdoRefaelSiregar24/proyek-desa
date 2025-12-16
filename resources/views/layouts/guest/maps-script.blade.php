<script>
    document.addEventListener("DOMContentLoaded", function () {

        // Inisialisasi map
        var map = L.map('map').setView([-0.507068, 101.447779], 13);

        // Tile OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Layer gambar
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        // Kontrol draw
        var drawControl = new L.Control.Draw({
            draw: {
                polygon: true,
                rectangle: true,
                marker: true,
                polyline: false,
                circle: false,
                circlemarker: false
            },
            edit: {
                featureGroup: drawnItems
            }
        });
        map.addControl(drawControl);

        // Event saat gambar selesai
        map.on(L.Draw.Event.CREATED, function (e) {
            drawnItems.clearLayers();
            drawnItems.addLayer(e.layer);

            var geojsonData = drawnItems.toGeoJSON();
            document.getElementById('geojson').value = JSON.stringify(geojsonData);

            if (e.layerType === 'marker') {
                var latlng = e.layer.getLatLng();
                document.getElementById('lat').value = latlng.lat;
                document.getElementById('lng').value = latlng.lng;
            }
        });

        // FIX ukuran map
        setTimeout(function () {
            map.invalidateSize();
        }, 300);
    });
</script>
