@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jabatan</h1>
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Daftar Jabatan dari masing - masing satuan kerja yang berada pada wilayah
                    kerja Kejaksaan Tinggi Jawa Timur</li>
            </ol>
            <a class="btn btn-dark" href="{{ route('jabatans.create') }}">Buat jabatan</a>
        </div>
    </div>
    <hr>
    <div class="table-responsive border p-3 rounded-3 m-4">
        <table class="table table-bordered table-hover table-striped mb-0 bg-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jabatans as $index => $jabatan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $jabatan->nama_jabatan }}</td>

                        <td>
                            <div class="d-flex justify-content-center">
                                <div>
                                    <a type="submit" href="{{ route('jabatans.edit', $jabatan->id) }}"
                                        class="btn btn-outline-dark btn-sm me-2"><i class="bi bi-pencil-square"></i></a>
                                </div>
                                <div>
                                    <form action="{{ route('jabatans.destroy', $jabatan->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-dark btn-sm ">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
