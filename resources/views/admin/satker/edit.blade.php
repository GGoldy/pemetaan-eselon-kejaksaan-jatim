@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4 py-4">
        <form action="{{ route('satkers.update', ['satker' => $satker->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="p-4 bg-light rounded-3 border col-xl-9">
                    <div class="mb-3 text-center">
                        <i class="bi bi-building fs-1"></i>
                        <h4>Sunting Satuan Kerja</h4>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-12 mb-3">
                            <label for="nama" class="form-label">Nama Satuan Kerja</label>
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
                                <i class="bi-arrow-left-circle me-2"></i>Batal
                            </a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
{{-- @push('scripts')
    <script type="module">

    </script>
@endpush --}}
