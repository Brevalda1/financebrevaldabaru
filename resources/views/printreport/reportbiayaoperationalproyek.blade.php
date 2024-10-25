<!DOCTYPE html>
<html>
<head>
    <title>Laporan Detail Biaya Operational Proyek</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        h1, h2 {
            text-align: center;
        }
        .container {
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Laporan Biaya Operational Proyek</h1>

        <h2>Keterangan Proyek</h2>
        <h4>Kode Perusahaan: {{ $kodeperus }}</h4>
        <h4>Total budget Pengeluaran biaya operational proyek: Rp{{$suma}}</h4>
        <h4>Total Aktual Pengeluaran biaya operational proyek: Rp{{$sum2}}</h4>
        {{-- <h4>Total Aktual Pengeluaran: Rp{{ $sum2 }}</h4> --}}

        <h2>Data Biaya Operational Proyek</h2>
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Proyek</th>
                    <th>Budget</th>
                    <th>Keterangan</th>
                    <th>Tanggal Pelaksanaan</th>
                    <th>Total Biaya Yang Sudah di Keluarkan</th>
                    {{-- <th>Aksi</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $showbiayaoperationalproyek)
                    <tr>
                        <th scope="row">{{ $showbiayaoperationalproyek->kode_biaya_operational_proyek }}</th>
                        <td>{{ $showbiayaoperationalproyek->nama_biaya_operational_proyek }}</td>
                        <td>Rp{{ number_format($showbiayaoperationalproyek->budget_biaya_operational_proyek) }}</td>
                        <td>{{ $showbiayaoperationalproyek->keterangan_biaya_operational_proyek }}</td>
                        <td>{{ \Carbon\Carbon::parse($showbiayaoperationalproyek->tanggal_pelaksanaan_biaya_operational_proyek)->format('d M Y') }}</td>
                        <td>Rp{{ number_format($showbiayaoperationalproyek->total_biaya_detail) }}</td>
                        {{-- <td>
                            <a href="/reportdetailbiayaoperationalproyeka/{{ $showbiayaoperationalproyek->kode_biaya_operational_proyek }}">
                                <button class="btn btn-info">Lihat Detail</button>
                            </a>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($data->isEmpty())
            <p style="text-align: center;">Data tidak ditemukan</p>
        @endif

        {{-- Pagination --}}
        <div class="pagination">
            {{ $data->links() }}
        </div>
    </div>
</body>
</html>
