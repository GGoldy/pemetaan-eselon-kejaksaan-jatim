<!-- Content Map -->
<div class="map-wrapper">
    <div id="map">
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
        attribution: "Data Jumlah Pegawai dalam wilayah kerja Kejaksaan Tinggi Jawa Timur",
        maxZoom: 17,
        minZoom: 8,
    }).addTo(map);

    // Create a Leaflet control for the search input
    var searchControl = L.control({
        position: 'topright'
    });

    // Set the content of the control (your search input)
    searchControl.onAdd = function(map) {
        var div = L.DomUtil.create('div', 'search-control');
        div.innerHTML = `
        <div class="d-flex align-items-center justify-content-center me-2 mt-2 bg-white rounded">
            <i class="bi bi-search px-2 fs-5" ></i>
            <input oninput="filterSatker()" type="text" class="search rounded fs-5" id="inputFilter" name="inputFilter" style="border: none; outline:none;">
        </div>
    `;
        return div;
    };

    // Add the control to the map
    searchControl.addTo(map);

    // add marker to some places in map and give details
    const satkers = @json($satkers);
    var markers = [];

    satkers.forEach(function(satker) {
        var parts = satker.longalt.split(", ");
        var longitude = Number(parts[0]);
        var altitude = Number(parts[1]);

        // popup responsive for then put in bindPopup
        var popup = L.responsivePopup({
            offset: [10, 10]
        }).setContent(
            `<div> <h5> ${satker.nama} </h5><br>
                <h6>Daftar Pegawai : </h6>
                <table class='table table-hover table-bordered'>
                  <tr>
                  <th>Jabatan</th>
                  <th>Jumlah (Personil)</th>
                    </tr>

                  ${satker.jabatans.map(jabatan => `<tr><td>${jabatan.nama_jabatan}</td><td>${jabatan.pivot.jumlah}</td></tr>`).join('')}

                    </table></div>`);
        var marker = L.marker([longitude, altitude], {
                title: (satker.nama),
            })
            .addTo(map)
            .bindPopup(
                popup, {
                    className: 'popupStyle',
                    maxHeight: 400,
                    maxWidth: 1000,
                }
            )
        markers.push(marker)
    });

    // start filter function
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

            var popup = L.responsivePopup().setContent(
                ` <h5> ${satker.nama} </h5><br>
                <h6>Daftar Pegawai : </h6>
                <table class='table table-hover table-bordered'>
                  <tr>
                  <th>Jabatan</th>
                  <th>Jumlah (Personil)</th>
                    </tr>

                  ${satker.jabatans.map(jabatan => `<tr><td>${jabatan.nama_jabatan}</td><td>${jabatan.pivot.jumlah}</td></tr>`).join('')}

                    </table>`);

            var marker = L.marker([longitude, altitude])
                .addTo(map)
                .bindPopup(
                    popup, {
                        maxWidth: 325,
                        maxHeight: 175
                    }
                )
            markers.push(marker);
            console.log(markers.length);
            if (markers.length <= 1) {
                marker.openPopup();
            }
        });



        // You can now use the filteredSatkers array as needed, for example, to display on the map
        console.log(filteredSatkers);
    }
    // end filter function
</script>

<!-- End of Content Map -->
