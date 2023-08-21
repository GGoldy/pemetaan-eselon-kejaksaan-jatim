<!-- Content Map -->
<input oninput="filterSatker()" type="text" class="search" id="inputFilter" name="inputFilter">
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
    var markers = [];

    satkers.forEach(function(satker) {
        var parts = satker.longalt.split(", ");
        var longitude = Number(parts[0]);
        var altitude = Number(parts[1]);

        var marker = L.marker([longitude, altitude])
            .addTo(map)
            .bindPopup(satker.nama)
            .openPopup();

        markers.push(marker)
    });

    function filterSatker() {
        const inputFilter = document.getElementById("inputFilter").value.toLowerCase();

        const filteredSatkers = satkers.filter(satker => {
            // If the input is empty, show all satkers
            if (inputFilter.trim() === "") {
                return true;
            }

            // Check if the nama property contains the input text
            return satker.nama.toLowerCase().includes(inputFilter);
        });

        markers.forEach(function(marker) {
            map.removeLayer(marker);
        });
        markers = [];

        filteredSatkers.forEach(function(satker) {
            var parts = satker.longalt.split(", ");
            var longitude = Number(parts[0]);
            var altitude = Number(parts[1]);

            var marker = L.marker([longitude, altitude])
                .addTo(map)
                .bindPopup(satker.nama)
                .openPopup();

            markers.push(marker)
        });
        // You can now use the filteredSatkers array as needed, for example, to display on the map
        console.log(filteredSatkers);
    }
</script>

<!-- End of Content Map -->
