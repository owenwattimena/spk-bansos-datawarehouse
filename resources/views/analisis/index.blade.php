@extends('templates.index')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
@endsection
@section('content')
<div class="container-xl px-4 mt-5">
    <!-- Custom page header alternative example-->
    <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
        <div class="me-4 mb-3 mb-sm-0">
            <h1 class="mb-0">Analisis</h1>
            <div class="small">
                <span class="fw-500 text-primary">Analisis datawarehouse</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a class="card lift h-100" href="#!">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <i class="feather-xl text-primary mb-3" data-feather="user"></i>
                            <h5>Total Penduduk</h5>
                            <div class="text-muted h5">{{ $totalPopulation }} Jiwa</div>
                        </div>
                        {{-- <img src="{{ asset('assets/img/illustrations/Family-bro-self.svg') }}" alt="..." style="width: 8rem" /> --}}
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="card lift h-100" href="#!">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <i class="feather-xl text-primary mb-3" data-feather="users"></i>
                            <h5>Total Kepala Keluarga</h5>
                            <div class="text-muted h5">{{ $totalHouseholdHeads }} KK</div>
                        </div>
                        {{-- <img src="{{ asset('assets/img/illustrations/Family-bro.svg') }}" alt="..." style="width: 8rem" /> --}}
                        {{-- <a href="https://storyset.com/people">People illustrations by Storyset</a> --}}
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- Illustration dashboard card example-->
    <div class="card card-waves mb-4 mt-5">
        <div class="card-body p-5">
            <div class="row align-items-center justify-content-between">
                <div class="col">
                    <a href="{{route('analisis.result')}}" class="btn btn-sm btn-primary mb-5">Lihat Hasil Analisis</a>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. KK</th>
                                    <th>No. Urut</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIK</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                    <th>Agama</th>
                                    <th>Pendidikan</th>
                                    <th>Pekerjaan</th>
                                    <th>Penghasilan</th>
                                    <th>Pengeluaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($populations as $key => $population)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $population->nomor_kk }}</td>
                                    <td>{{ $population->nomor_urut }}</td>
                                    <td>{{ $population->nama_lengkap }}</td>
                                    <td>{{ $population->nik }}</td>
                                    <td>{{ $population->tempat_lahir }}</td>
                                    <td>{{ $population->tanggal_lahir }}</td>
                                    <td>{{ $population->jenis_kelamin }}</td>
                                    <td>{{ $population->status_hubungan_dalam_keluarga }}</td>
                                    <td>{{ $population->agama }}</td>
                                    <td>{{ $population->pendidikan }}</td>
                                    <td>{{ $population->pekerjaan }}</td>
                                    <td>{{ $population->penghasilan }}</td>
                                    <td>{{ $population->pengeluaran }}</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td>Belum ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection
