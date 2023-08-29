@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Satuan Kerja</h1>
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Daftar Satuan Kerja Kejaksaan Tinggi Jawa Timur</li>
            </ol>

        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-end m-4">
        <!-- First Button -->
        <a class="btn btn-dark" href="{{ route('satkers.index') }}">Cancel</a>
        <div class="mx-2"></div>
        <!-- Second Button -->
        @php
            $selectedIdsString = '';
        @endphp
        <form id="deleteForm" action="{{ route('satkers.deleteMultipleGo') }}" method="GET">
            @csrf
            <input type="hidden" name="selected_ids" id="selected_ids" value="{{ $selectedIdsString }}">
            <button type="submit" class="btn btn-danger" onclick="submitDeleteForm('deleteForm')">Delete Selected</button>
        </form>
    </div>
    <div class="table-responsive border p-3 rounded-3 m-4">
        <table class="table table-bordered table-hover table-striped mb-0 bg-white" id="satkerTable">
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
                                    <input type="checkbox" name="selected_ids[]" value="{{ $satker->id }}">
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
            $('#satkerTable').DataTable();
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

        function removeDuplicates(arr) {
            return [...new Set(arr)];
        }

        function removeDuplicatesFromArray(baseArray, removeArray) {
            // Create a Set from the second array for faster lookup
            const removeSet = new Set(removeArray);

            // Use filter() to create a new array with only unique elements
            const uniqueArray = baseArray.filter(item => !removeSet.has(item));

            return uniqueArray;
        }

        var selectedIds = [];
        var selectedIdsString;
        $('input[type="checkbox"]').on('change', function() {
            var allCheckboxes = $('input[type="checkbox"]');
            var unSelectedCheckboxes = [];

            allCheckboxes.each(function() {
                var checkbox = $(this);

                if (checkbox.is(':checked')) {
                    selectedIds.push(checkbox.val());
                } else {
                    unSelectedCheckboxes.push(checkbox.val())
                }
            });

            // Update the hidden input value
            // Convert the array to a comma-separated string

            selectedIds = removeDuplicatesFromArray(selectedIds, unSelectedCheckboxes);
            selectedIds = removeDuplicates(selectedIds)
            selectedIdsString = selectedIds.join(',')

            console.log(unSelectedCheckboxes)
            console.log(selectedIds)
            console.log(selectedIdsString)

            $('#selected_ids').val(selectedIdsString);
        });
    </script>
@endpush
