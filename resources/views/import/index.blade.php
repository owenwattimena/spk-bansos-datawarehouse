@extends('templates.index')
@section('content')
<div class="container-xl px-4 mt-5">
    <!-- Custom page header alternative example-->
    <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
        <div class="me-4 mb-3 mb-sm-0">
            <h1 class="mb-0">Import</h1>
            <div class="small">
                <span class="fw-500 text-primary">Import database kependudukan dalam <a href="{{ asset('assets/excel/DATA OK.xlsx') }}" target="_blank" style="text-decoration: underline;">format Excel (.xlsx)</a>.</span>
            </div>
        </div>
    </div>

    <!-- Illustration dashboard card example-->
    <div class="card card-waves mb-4 mt-5">
        <div class="card-body p-5">
            <div class="row align-items-center justify-content-between">
                <div class="col">
                    <form id="import-form" action="{{ route('import.post') }}" method="POST" enctype="multipart/form-data" onsubmit="showConfirmationModal(event)">
                        @csrf
                        {{-- <small class="text-danger">Perhatian!!! Data yang lama akan terhapus dan digantikan dengan data kependudukan yang baru di import.</small> --}}
                        <div class="mb-3">
                            <input type="file" name="file" class="form-control" id="exampleFormControlSelect1" required>
                        </div>
                        <button class="btn btn-primary p-3" type="submit" >
                            <i class="ms-1" data-feather="download"></i> Import
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script>
    function showConfirmationModal(event) {
        event.preventDefault();
        swal.fire({
            title: 'Yakin ingin mengimport data?'
            , text: `{{ $totalPopulation }} data kependudukan akan dihapus. Tetap Import?.`
            , icon: 'info'
            , showCancelButton: true
            , confirmButtonText: 'Import'
            , cancelButtonText: 'Batal'
            , reverseButtons: true
        , }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('import-form').submit();
            }
        });
    }

</script>
@endsection
