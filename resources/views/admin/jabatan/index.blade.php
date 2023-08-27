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
        <table class="table table-bordered table-hover table-striped mb-0 bg-white" id="jabatanTable">
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
                                    <form id="deleteForm{{ $jabatan->id }}" class=""
                                        action="{{ route('jabatans.destroy', $jabatan->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-dark btn-sm"
                                            onclick="submitDeleteForm('deleteForm{{ $jabatan->id }}')">
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#jabatanTable').DataTable();
        });

        function submitDeleteForm(formId) {
            event.preventDefault();
            Swal.fire({
                title: 'Hapus Satuan Kerja',
                text: "Yakin ingin menghapus satuan kerja?",
                icon: 'warning',
                showCancelButton: true, // Show the "Cancel" button
                confirmButtonText: 'Yes', // Text for the "Yes" button
                cancelButtonText: 'No', // Text for the "No" button
                buttonsStyling: false, // Disable SweetAlert's default styling for buttons
                customClass: {
                    confirmButton: 'btn btn-success mx-2', // Add classes to the "Yes" button
                    cancelButton: 'btn btn-danger mx-2' // Add classes to the "No" button
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
@endpush
