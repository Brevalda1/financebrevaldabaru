<!DOCTYPE html>
<html>
<head>
    <title>Laporan Operasional</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Laporan Operasional Biaya Operational non budgeting </h1>
        <p>Kode Perusahaan: {{ $kodeperus }}</p>
    {{-- <p>Total Gaji Pegawai: Rp{{ $sum }}</p> --}}
    <p>Total Biaya Non Budgeting: Rp{{ $nonbudget }}</p>
    {{-- <p>Total Semua: Rp{{ $totalsemua }}</p> --}}


    <h2>Data Biaya Operasional Non Budgeting</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Biaya</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $showbiayaoperationalnonbudgeting)
                <tr>
                    <th scope="row">{{ $showbiayaoperationalnonbudgeting->kode_operational_non_budgeting }}</th>
                    <td>{{ $showbiayaoperationalnonbudgeting->nama_operational_non_budgeting }}</td>
                    <td>{{ $showbiayaoperationalnonbudgeting->keterangan_operational_non_budgeting }}</td>
                    <td>{{ $showbiayaoperationalnonbudgeting->tanggal_operational_non_budgeting }}</td>
                    <td>{{ $showbiayaoperationalnonbudgeting->biaya_operational_non_budgeting }}</td>
                    {{-- <td>
                        <a href="/updatebiayaoperationalnonbudgetingform/{{ $showbiayaoperationalnonbudgeting->kode_operational_non_budgeting }}">
                            <button class="btn btn-info">Edit</button>
                        </a>
                        <a href="/deletebiayaoperationalnonbudgetingform/{{ $showbiayaoperationalnonbudgeting->kode_operational_non_budgeting }}">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
