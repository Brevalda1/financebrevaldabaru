<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pencatatan Masa Depan</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Daftar Pencatatan Masa Depan</h1>
    <p>Periode: {{ $startDate }} sampai {{ $endDate }}</p>
    <p><strong>Biaya yang diperlukan untuk periode ini: Rp{{ number_format($totalBiaya, 2, ',', '.') }}</strong></p>
    
    <table>
        <thead>
            <tr>
                <th>Kode Pencatatan</th>
                <th>Nama Pencatatan</th>
                <th>Jumlah Pencatatan</th>
        
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $showpencatatanmasadepan)
                <tr>
                    <td>{{ $showpencatatanmasadepan->kode_pencatatan_biaya_masa_depan }}</td>
                    <td>{{ $showpencatatanmasadepan->nama_pencatatan_biaya_masa_depan }}</td>
                    <td>{{ $showpencatatanmasadepan->jumlah_pencatatan_biaya_masa_depan }}</td>
                
                    <td>{{ $showpencatatanmasadepan->keterangan_pencatatan_biaya_masa_depan }}</td>
                    <td>{{ $showpencatatanmasadepan->tanggal_pencatatan_biaya_masa_depan }}</td>
                    <td>{{ $showpencatatanmasadepan->harga_pencatatan_biaya_masa_depan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
