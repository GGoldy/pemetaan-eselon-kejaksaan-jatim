<!-- Content Map -->
<div class="map-wrapper">
    <div id="map"></div>
</div>

<script>
    // initialize the map
    var map = L.map("map").setView(
        [-7.681107274810605, 112.4458139235079],
        9
    );

    // load a tile layer
    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "Data Eselon Kejati Jawa Timur",
        maxZoom: 17,
        minZoom: 8,
    }).addTo(map);

    // add marker to some places in map and give details

    const satkers = @json($satkers);
    satkers.forEach(function(satker) {
        var parts = satker.longalt.split(", ");
        var longitude = Number(parts[0]);
        var altitude = Number(parts[1]);

        L.marker([longitude, altitude])
            .addTo(map)
            .bindPopup(satker.nama)
            .openPopup();
    });
</script>

<!-- End of Content Map -->
