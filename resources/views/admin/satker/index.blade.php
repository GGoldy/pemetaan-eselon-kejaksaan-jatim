@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Satker</h1>
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Daftar Satker yang berada di Jawa Timur</li>
            </ol>
            <a class="btn btn-dark" href="{{ route('satkers.create') }}">Create Satker</a>
        </div>
    </div>
    <hr>
    <div class="table-responsive border p-3 rounded-3 m-4">
        <table class="table table-bordered table-hover table-striped mb-0 bg-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Koordinat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($satkers as $index => $satker)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $satker->nama }}</td>
                        <td>{{ $satker->longalt }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <div>
                                    <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i
                                            class="bi bi-pencil-square"></i></button>
                                </div>
                                <div>
                                    <form action="{{ route('satkers.destroy', $satker->id) }}" method="POST">
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
