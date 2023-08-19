@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4 py-4">

        <form action="{{ route('satkers.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-9">
                    <div class="mb-3 text-center">
                        <i class="bi bi-building fs-1"></i>
                        <h4>Buat Satker</h4>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-12 mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama"
                                id="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Satuan Kerja">
                            @error('nama')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="longitude" class="form-label">Koordinat Longitude</label>
                            <input class="form-control @error('longitude') is-invalid @enderror" type="text"
                                name="longitude" id="longitude" value="{{ old('longitude') }}"
                                placeholder="Masukkan Koordinat Longitude">
                            @error('longitude')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="latitude" class="form-label">Koordinat Latitude</label>
                            <input class="form-control @error('latitude') is-invalid @enderror" type="text"
                                name="latitude" id="latitude" value="{{ old('latitude') }}"
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
