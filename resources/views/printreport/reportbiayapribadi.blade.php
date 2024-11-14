<!DOCTYPE html>
<html>
<head>
    <title>Laporan Biaya Pribadi</title>
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
    </style>
</head>
<body>
    <h1>Laporan Biaya Pribadi</h1>
    <h4>Kode Perusahaan : {{$kodeperus}}</h4>
    <h4>Total Pengeluaran biaya Pribadi yang di terima : Rp{{$sum}}</h4>
    {{-- <h4>Total Pengeluaran Biaya Pribadi yang di tolak : Rp{{$nonbudget}}</h4> --}}

    <h2>Data Biaya Pribadi yang Disetujui</h2>
    <table>
        <thead>
            <tr>
                <th>kode</th>
                <th>Nama biaya</th>
                <th>satuan</th>
                {{-- <th>harga</th> --}}
                <th>tanggal</th>
                <th>jumlah</th>
                <th>approved</th>
                <th>harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $data as $showbiayapribadi)
                <tr>
                    <th scope="row">{{$showbiayapribadi->kode_biaya_pribadi}}</th>
                    <td>{{$showbiayapribadi->nama_biaya_pribadi}}</td>
                    <td>{{$showbiayapribadi->satuan_biaya_pribadi}}</td>
                    <td>{{$showbiayapribadi->tanggal_biaya_pribadi}}</td>
                    <td>{{$showbiayapribadi->jumlah_biaya_pribadi}}</td>
                    <td>{{$showbiayapribadi->approved_by_biaya_pribadi}}</td>
                    <td>Rp{{ number_format($showbiayapribadi->harga_biaya_pribadi, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
