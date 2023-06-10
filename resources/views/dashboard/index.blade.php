@extends('templates.index')
@section('content')
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="activity"></i></div>
                        Dashboard
                    </h1>
                    {{-- <div class="page-header-subtitle">Example dashboard overview and content summary</div> --}}
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container-xl px-4 mt-n10">
    <div class="row">
        <div class="col-xxl-4 col-xl-12 mb-4">
            <div class="card h-100">
                <div class="card-body h-100 p-5">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-8">
                            <div class="text-center text-xl-center text-xxl-center mb-4 mb-xl-0 mb-xxl-4">
                                <h1 class="text-primary">SELAMAT DATANG DI</h1>
                                <p class="text-gray-700 mb-0">SISTEM PENDUKUNG KEPUTUSAN BANTUAN PEMERINTAH BERBASIS DATA WAREHOUSE PADA NEGERI HARIA KABUPATEN MALUKU TENGAH</p>
                            </div>
                        </div>
                        {{-- <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid" src="assets/img/illustrations/at-work.svg" style="max-width: 26rem" /></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
