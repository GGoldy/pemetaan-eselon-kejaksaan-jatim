@extends('layouts.admin')
@section('importsinhead')
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

        @include('layouts.map')

    </div>
@endsection
