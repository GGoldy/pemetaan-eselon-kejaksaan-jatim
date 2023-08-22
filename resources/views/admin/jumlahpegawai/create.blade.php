@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4 py-4">

        <form action="{{ route('jumlahs.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-9">
                    <div class="mb-3 text-center">
                        <i class="bi bi-building fs-1"></i>
                        <h4>Buat Jumlah Pegawai</h4>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-12 mb-3">
                            <label for="satker" class="form-label">Satuan Kerja</label>
                            <select name="satker" id="satker" class="form-select">
                                @foreach ($satkers as $satker)
                                    <option value="{{ $satker->id }}"
                                        {{ old('satker') == $satker->id ? 'selected' : '' }}>
                                        {{ $satker->id . ' - ' . $satker->nama }}</option>
                                @endforeach
                            </select>
                            @error('satker')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-select">
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}"
                                        {{ old('jabatan') == $jabatan->id ? 'selected' : '' }}>
                                        {{ $jabatan->id . ' - ' . $jabatan->nama_jabatan }}</option>
                                @endforeach
                            </select>
                            @error('jabatan')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="jumlah" class="form-label">Jumlah Pegawai</label>
                            <input class="form-control @error('jumlah') is-invalid @enderror" type="number" name="jumlah"
                                id="jumlah" value="{{ old('jumlah') }}" placeholder="Masukkan Jumlah Pegawai">
                            @error('jumlah')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('jumlahs.index') }}" class="btn btn-outline-dark btn-lg mt-3">
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
