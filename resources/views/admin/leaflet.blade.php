@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <style>
        .map-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
        }

        #map {
            width: 90vw;
            height: 70vh;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex align-items-center justify-content-center my-3">
            <h3 class="mb-0 text-center">Pemetaan Satuan Kerja Kejaksaan Tinggi Jawa Timur</h3>
        </div>

        <!-- Content -->

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
                console.log('Name: ' + satker.nama);
                console.log('Koordinat: ' + satker.longalt);
                // koor = satker.longalt.split(',');
                // long = koor.slice(1);
                // alt = koor.slice(2);
                var parts = satker.longalt.split(", ");

                var longitude = Number(parts[0]);
                var altitude = Number(parts[1]);

                L.marker([longitude, altitude])
                    .addTo(map)
                    .bindPopup(satker.nama)
                    .openPopup();
            });
        </script>

        <!-- End of Content -->

    </div>
@endsection