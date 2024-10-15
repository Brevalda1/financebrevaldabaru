<!DOCTYPE html>
<html>
<head>
    <title>Laporan Biaya Lain-lain</title>
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
    <h1>Laporan Biaya Lain-lain</h1>
    <p>Kode Perusahaan: {{ $kodeperus }}</p>
    <p>Total Biaya Lain-lain: Rp{{ $sum }}</p>
    {{-- <p>Total Biaya Non-Budgeting: Rp{{ $nonbudget }}</p>
    <p>Total Semua: Rp{{ $totalsemua }}</p> --}}

    <h2>Data Biaya Lain-lain</h2>
    <table>
        <thead>
            <tr>
                <th>kode</th>
                <th>Nama biaya</th>
                <th>satuan</th>
                <th>harga</th>
                <th>tanggal</th>
                <th>jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $data as $showbiayalainlain)
            <tr>
              <th scope="row">{{$showbiayalainlain->kode_biaya_lainlain}}</th>
                <td>{{$showbiayalainlain->nama_biaya_lainlain}}</td>
                <td>{{$showbiayalainlain->satuan_biaya_lainlain}}</td>
                <td>{{$showbiayalainlain->harga_biaya_lainlain}}</td>
                <td>{{$showbiayalainlain->tanggal_biaya_lainlain}}</td>
                <td>{{$showbiayalainlain->jumlah_biaya_lainlain}}</td>
               

             
                  




            </tr>
      
            @endforeach
        </tbody>
    </table>

    {{-- <h2>Data Biaya Pribadi yang Belum Disetujui</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Biaya</th>
                <th>Nama Biaya</th>
                <th>Harga</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data2 as $biaya)
                <tr>
                    <td>{{ $biaya->kode_biaya_pribadi }}</td>
                    <td>{{ $biaya->nama_biaya_pribadi }}</td>
                    <td>{{ number_format($biaya->harga_biaya_pribadi, 2) }}</td>
                    <td>{{ $biaya->created_at }}</td>
                </tr>
            @endforeach
        </tbody> --}}
    </table>
</body>
</html>
