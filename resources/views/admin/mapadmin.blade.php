@extends('layouts.admin')
@section('importsinhead')
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
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

        #searchdiv input:focus {
            outline: none;
        }
    </style>
@endsection
@section('content')
    @include('layouts.map')
@endsection
