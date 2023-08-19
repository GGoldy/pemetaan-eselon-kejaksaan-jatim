@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4 py-4">
        <form action="{{ route('jabatans.update', ['jabatan' => $jabatan->id]) }}" method="POST">
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
                            <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                            <input class="form-control @error('nama_jabatan') is-invalid @enderror" type="text"
                                name="nama_jabatan" id="nama_jabatan"
                                value="{{ $errors->any() ? old('nama_jabatan') : $jabatan->nama_jabatan }}"
                                placeholder="Masukkan Nama Jabatan">
                            @error('nama_jabatan')
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
