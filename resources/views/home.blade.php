@extends('layouts.app')
@section('importsinhead')
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <style>
        .map-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            position: relative;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
        }

        #map {
            width: 100%;
            height: 80vh;
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
