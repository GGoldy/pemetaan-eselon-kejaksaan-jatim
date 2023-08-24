@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jumlah Pegawai</h1>
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Daftar Jumlah Pegawai dari masing - masing satuan kerja yang berada pada
                    wilayah
                    kerja Kejaksaan Tinggi Jawa Timur</li>
            </ol>
            <a class="btn btn-dark" href="{{ route('jumlahs.create') }}">Buat Jumlah Pegawai</a>
        </div>
    </div>
    <hr>
    <div class="table-responsive border p-3 rounded-3 m-4">
        <table class="table table-bordered table-hover table-striped mb-0 bg-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Satuan Kerja</th>
                    <th>Jabatan</th>
                    <th>Jumlah Pegawai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($satkers as $index => $satker)
                    @foreach ($satker->jabatans as $jabatan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $satker->nama }}</td>
                            <td>{{ $jabatan->nama_jabatan }}</td>
                            <td>{{ $jabatan->pivot->jumlah }}</td>

                            <td>
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <a type="submit" href="{{ route('jumlahs.edit', $jabatan->pivot->id) }}"
                                            class="btn btn-outline-dark btn-sm me-2"><i class="bi bi-pencil-square"></i></a>
                                    </div>
                                    <div>
                                        <form action="{{ route('jumlahs.destroy', $jabatan->pivot->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-dark btn-sm ">
                                                <i class="bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </td>
                    @endforeach

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
