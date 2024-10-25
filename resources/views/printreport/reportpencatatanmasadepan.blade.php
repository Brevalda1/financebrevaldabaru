<!DOCTYPE html>
<html>
<head>
    <title>Daftar Rekening Perusahaan</title>
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
    <h1>Daftar Pencatatan Masa Depan</h1>
        <p>Kode Perusahaan: {{ $kodeperus }}</p>
    {{-- <p>Total Gaji Pegawai: Rp{{ $sum }}</p> --}}
    {{-- <p>Total Biaya Non Budgeting: Rp{{ $nonbudget }}</p> --}}
    {{-- <p>Total Semua: Rp{{ $totalsemua }}</p> --}}


    <h2>Data Daftar Pencatatan Masa Depan</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Pencatatan</th>
                <th>Nama Pencatatan</th>
                <th>Jumlah Pencatatan</th>
                <th>Harga</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $showpencatatanmasadepan)
                <tr>
                    <th scope="row">{{ $showpencatatanmasadepan->kode_pencatatan_biaya_masa_depan }}</th>
                    <td>{{ $showpencatatanmasadepan->nama_pencatatan_biaya_masa_depan }}</td>
                    <td>{{ $showpencatatanmasadepan->jumlah_pencatatan_biaya_masa_depan }}</td>
                    <td>{{ $showpencatatanmasadepan->harga_pencatatan_biaya_masa_depan }}</td>
                    <td>{{ $showpencatatanmasadepan->keterangan_pencatatan_biaya_masa_depan }}</td>
                    <td>{{ $showpencatatanmasadepan->created_at }}</td>
                 
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
