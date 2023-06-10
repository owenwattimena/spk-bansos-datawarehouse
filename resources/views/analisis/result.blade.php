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
                <span class="fw-500 text-primary">Hasil Analisis Datawarehouse Penerima Bantuan Pemerintah<br>Negeri Haria, Kab. Maluku Tengah</span>
            </div>
        </div>
    </div>
    <div class="alert alert-info" role="alert">
        Daftar penerima bantuan berdasarkan analisis datawarehouse dengan kriteria<br>
        <strong>Jumlah Anggota Keluarga ≤ 3 Orang dan Penghasilan ≤ 1jt<br>
        Jumlah Anggota Keluarga ≥4 Orang dan Penghasilan ≤ 2jt<br></strong>
        Adalah sebagai berikut:
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="chart-pie"><canvas id="myPieChart" width="100%"></canvas></div>
                </div>
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
                            <h5>Total Penduduk Penerima Bantuan</h5>
                            <div class="text-muted h5">{{ $result->sum('jumlah_anggota_keluarga') ?? 0 }} Jiwa</div>
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
                            <h5>Total Keluarga Penerima Bantuan</h5>
                            <div class="text-muted h5">{{ $result->count() ?? 0 }} KK</div>
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
        <div class="card-header">
            Daftar Keluarga Penerima Bantuan
        </div>
        <div class="card-body p-5">
            <a href="{{ route('analisis.result.report') }}" class="btn btn-sm btn-warning mb-5"> <i class="feather-sm text-white" data-feather="download"></i> Donwload PDF</a>
            <div class="row align-items-center justify-content-between">
                <div class="col">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. KK</th>
                                    <th>Kepala Keluarga</th>
                                    {{-- <th>NIK</th> --}}
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Pendidikan</th>
                                    <th>Pekerjaan</th>
                                    <th>Anggota Keluarga</th>
                                    <th>Total Penghasilan</th>
                                    <th>Total Pengeluaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no=0;
                                @endphp
                                @forelse ($result as $key => $data)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $data->nomor_kk }}</td>
                                    <td>{{ $data->kepala_keluarga }}</td>
                                    {{-- <td>{{ $data->nik }}</td> --}}
                                    <td>{{ $data->tempat_lahir }}</td>
                                    <td>{{ $data->tanggal_lahir }}</td>
                                    <td>{{ $data->jenis_kelamin }}</td>
                                    <td>{{ $data->agama }}</td>
                                    <td>{{ $data->pendidikan }}</td>
                                    <td>{{ $data->pekerjaan }}</td>
                                    <td>{{ $data->jumlah_anggota_keluarga }}</td>
                                    <td>{{ $data->total_penghasilan }}</td>
                                    <td>{{ $data->total_pengeluaran }}</td>
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
{{-- <script src="{{ asset('assets') }}/demo/chart-pie-demo.js"></script> --}}
<script>
    const ctx = document.getElementById('myPieChart');
    new Chart(ctx, {
        type: 'pie'
        , data: {
            labels: ['Penerima (KK)', 'Bukan Penerima (KK)']
            , datasets: [{
                data: [`{{ $result->count() ?? 0 }}`, `{{ $totalHouseholdHeads - $result->count()}}`]
                , backgroundColor: [
                    // "rgba(0, 172, 105, 1)",
                    "rgba(88, 0, 232, 1)"
                    , "rgba(244,244,245,1)"
                ]
                , hoverBackgroundColor: [
                    // "rgba(0, 172, 105, 0.9)",
                    "rgba(88, 0, 232, 0.9)"
                    , "rgba(244,244,245,0.9)"
                ]
                , hoverBorderColor: "rgba(234, 236, 244, 1)"
            }]
        }
        , options: {
            maintainAspectRatio: false
            , tooltips: {
                backgroundColor: "rgb(255,255,255)"
                , bodyFontColor: "#858796"
                , borderColor: "#dddfeb"
                , borderWidth: 1
                , xPadding: 15
                , yPadding: 15
                , displayColors: false
                , caretPadding: 10
            }
            , plugins: {
                legend: {
                    position: 'top'
                , }
                , title: {
                    display: true
                    , text: 'Penerima VS Bukan Penerima'
                }
            }
        , }
    });

    let table = new DataTable('#myTable');

</script>
@endsection
