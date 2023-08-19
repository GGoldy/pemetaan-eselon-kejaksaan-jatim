@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 text-center">Edit Satker</h1>
        <hr>
        <form action="{{ route('satkers.update', ['tabel' => $satker->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi bi-geo-alt fs-1"></i>
                        <h4>Edit Satker</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama"
                                id="nama" value="{{ $errors->any() ? old('nama') : $satker->nama }}"
                                placeholder="Masukkan Nama">
                            @error('nama')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <?php
                        // Split the $satker->longalt string by comma and get the first part
                        $longaltParts = explode(', ', $satker->longalt);
                        $firstPart = $longaltParts[0];
                        $secondPart = $longaltParts[1];
                        ?>
                        <div class="col-md-6 mb-3">
                            <label for="longitude" class="form-label">Koordinat Longitude</label>
                            <input class="form-control @error('longitude') is-invalid @enderror" type="text"
                                name="longitude" id="longitude" value="{{ $errors->any() ? old('nama') : $firstPart }}"
                                placeholder="Masukkan Koordinat Longitude">
                            @error('longitude')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="latitude" class="form-label">Koordinat Latitude</label>
                            <input class="form-control @error('latitude') is-invalid @enderror" type="text"
                                name="latitude" id="latitude" value="{{ $errors->any() ? old('nama') : $secondPart }}"
                                placeholder="Masukkan Koordinat Latitude">
                            @error('latitude')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('satkers.index') }}" class="btn btn-outline-dark btn-lg mt-3">
                                <i class="bi-arrow-left-circle me-2"></i>Cancel
                            </a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr>
@endsection
{{-- @push('scripts')
    <script type="module">

    </script>
@endpush --}}