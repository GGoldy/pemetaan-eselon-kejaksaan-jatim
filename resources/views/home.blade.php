@extends('layouts.app')
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
            height: 100%;
            position: relative;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
        }

        #map {
            width: 100%;
            height: 100%;
        }

        #searchdiv input:focus {
            outline: none;
        }

        @media (max-width: 770px) {
            * {
                font-size: 2vw;
            }
        }
    </style>
@endsection
@section('content')
    @include('layouts.map')
@endsection
