@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jumlah Pegawai</h1>
        <div class="d-flex justify-content-between align-items-center">
            <p class="my-0">
                Daftar Jumlah Pegawai dari masing - masing satuan kerja yang berada pada wilayahkerja Kejaksaan Tinggi Jawa
                Timur
            </p>
            <a class="btn btn-dark text-center" href="{{ route('jumlahs.create') }}" style="white-space:nowrap;">Tambah
                Jumlah Pegawai</a>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-end m-4">
        <a class="btn btn-dark" href="{{ route('jumlahs.deleteMultiple') }}">Delete Multiple</a>
    </div>
    <div class="container d-flex align-items-center justify-content-center">
        <div class="row tabres">
            <div class="table-responsive border p-3 rounded-3">
                <table class="table table-bordered table-hover table-striped mb-0 bg-white display responsive"
                    width="100%" id="jumlahTable">
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
                        @php
                            $index = 1;
                        @endphp
                        @foreach ($satkers as $satker)
                            @foreach ($satker->jabatans as $jabatan)
                                <tr>
                                    <td>{{ $index }}</td>
                                    @php
                                        $index += 1;
                                    @endphp
                                    <td>{{ $satker->nama }}</td>
                                    <td>{{ $jabatan->nama_jabatan }}</td>
                                    <td>{{ $jabatan->pivot->jumlah }}</td>

                                    <td>
                                        <div class="d-flex justify-content-center align-items-center w-100 h-100">
                                            <div>
                                                <a type="submit" href="{{ route('jumlahs.edit', $jabatan->pivot->id) }}"
                                                    class="btn btn-outline-dark btn-sm me-2"><i
                                                        class="bi bi-pencil-square"></i></a>
                                            </div>
                                            <div>
                                                <form id="deleteForm{{ $jabatan->pivot->id }}" class=""
                                                    action="{{ route('jumlahs.destroy', $jabatan->pivot->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-outline-dark btn-sm"
                                                        onclick="submitDeleteForm('deleteForm{{ $jabatan->pivot->id }}')">
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
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#jumlahTable').DataTable({
                responsive: true,
                columnDefs: [{
                        responsivePriority: 1,
                        targets: 2
                    },
                    {
                        responsivePriority: 2,
                        targets: -1
                    },
                    {
                        responsivePriority: 3,
                        targets: 3
                    }
                ]
            });
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
