<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPORAN | {{ config('app.name') }}</title>
    <style>
        .heading-1 {
            font-size: 16pt;
        }

        .text-center {
            text-align: center;
        }

        .table-style {
            border-collapse: collapse;
            width: 100%;
            font-size: 8pt;
        }

        .table-style thead tr th,
        .table-style tbody tr td {
            border: 1px solid black !important;
            padding: 8px;
        }
        .footer {
            width: 100%;
            position: fixed;
            bottom: -30px;
            font-size: 10pt;
        }

        .pagenum:before {
            content: counter(page);
        }

        .float-right {
            float: right;
        }
        .text-right{
            text-align: right;
        }
        .text-grey{
            color: grey;
        }
    </style>
</head>
<body>
    <h1 class="heading-1 text-center">
        SISTEM PENDUKUNG KEPUTUSAN BANTUAN PEMERINTAH<br>
        NEGERI HARIA, KABUPATEN MALUKU TENGAH
    </h1>
    <hr>
    <p class="text-center">Laporan Hasil Analisis Datawarehouse</p>

    <table class="table-style">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nomor KK</th>
                <th>Kepala Keluarga</th>
                {{-- <th>NIK</th> --}}
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
                <th>Jumlah Anggota Keluarga</th>
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
                <td>Rp. {{ number_format($data->total_penghasilan) }}</td>
                <td>Rp. {{ number_format($data->total_pengeluaran) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="12">Belum ada data.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="footer text-grey">
        SPK Bantuan pemerintah Negeri Haria, Maluku Tengah - Laporan Hasil Analisis Datawarehouse <span class="float-right">Hal. <span class="pagenum"></span></span>
    </div>
</body>
</html>
