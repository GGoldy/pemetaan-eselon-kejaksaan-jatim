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
            height: 78vh;
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

        footer {
            height: 10vh;
        }

        nav {
            height: 12vh
        }

        .leaflet-popup-tip {
            display: none;
        }

        /* styling map popup */
        @media (max-width:576px) {
            .popupStyle {
                width: 90vw;
            }
        }

        @media (min-width:576px) and (max-width:1700px) {
            .popupStyle {
                width: 60vw;
            }
        }
    </style>
@endsection
@section('content')
    @include('layouts.map')
@endsection
