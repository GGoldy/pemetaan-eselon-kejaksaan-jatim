@extends('layouts.admin')
@section('importsinhead')
    {{-- Leaflet Library Import --}}
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />

    <script src="https://unpkg.com/leaflet-responsive-popup@1.0.0/leaflet.responsive.popup.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-responsive-popup@1.0.0/leaflet.responsive.popup.css" />
    <style>
        .map-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            width: 100%;
        }

        #map {
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
@section('content')
    @include('layouts.map')
@endsection
