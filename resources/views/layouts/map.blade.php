<!-- Content Map -->

<div class="map-wrapper">
    <div id="map" class="d-grid" style="z-index: 1">
        <div id="searchdiv" class="d-flex align-items-center justify-content-center me-2 mt-2"
            style="z-index: 2 ;position:absolute; align-self:flex-start; justify-self:flex-end; background-color:white; border:1px solid black;">
            <i class="bi bi-search px-2" style="font-size: 2vw"></i>
            <input oninput="filterSatker()" type="text" class="search" id="inputFilter" name="inputFilter"
                style="border: none; font-size:2vw">
        </div>
    </div>

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

        L.Control.geocoder().addTo(map);

        // You can now use the filteredSatkers array as needed, for example, to display on the map
        console.log(filteredSatkers);
    }
</script>

<!-- End of Content Map -->
