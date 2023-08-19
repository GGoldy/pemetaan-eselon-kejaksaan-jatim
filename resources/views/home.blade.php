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
        }

        #map {
            width: 90vw;
            height: 80vh;
        }
    </style>
@endsection
@section('content')
    @include('layouts.map')
@endsection
