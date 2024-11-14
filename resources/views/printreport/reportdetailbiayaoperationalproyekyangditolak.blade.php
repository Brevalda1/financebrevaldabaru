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
    </style>
</head>
<body>
    <h1>Laporan Detail Biaya Operational Proyek</h1>
    @php
    $data2 = $datas;
  @endphp
  @foreach ($data2 as $keterangantransaksi)
    <h4>Nama biaya operational : {{$keterangantransaksi->nama_biaya_operational_proyek}}</h4>
    <h4>keterangan biaya operational : {{$keterangantransaksi->keterangan_biaya_operational_proyek}}</h4>
    <h4>tanggal pelaksanaan : {{$keterangantransaksi->tanggal_pelaksanaan_biaya_operational_proyek}}</h4>
    @endforeach
<h4>Kode biaya operational proyek : {{$kodeperus}}</h4>
{{-- <h4>Jumlah budget yang di anggarkan : Rp{{$budget}}</h4> --}}
<h4>Total budget yang sudah dikeluarkan : Rp{{$sum}}</h4>
    <h2>Keterangan Proyek</h2>
    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Proyek</th>
                <th>jumlah</th>
                <th>harga</th>
                <th>rejected by</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $data as $showdetailbiayaoperationalproyek)
                    <tr>
                      <th scope="row">{{$showdetailbiayaoperationalproyek->kode_biaya_detail_operational_proyek}}</th>
                        <td>{{$showdetailbiayaoperationalproyek->nama_biaya_detail_biaya_operational_proyek}}</td>
                        <td>{{$showdetailbiayaoperationalproyek->jumlah_detail_biaya_operational_proyek}}</td>
                        <td>Rp{{ number_format($showdetailbiayaoperationalproyek->harga_detail_biaya_operational_proyek, 2, ',', '.') }}</td>
                        <td>{{$showdetailbiayaoperationalproyek->approved_by_detail_biaya_operational_proyek}}</td>
                        
                        {{-- <td>
                          <img src="{{asset('DetailBiayaOperationalProyek').'/'.$showdetailbiayaoperationalproyek->bukti_detail_biaya_operational_proyek}}" width='50' height='50'></td>
                        <td> --}}
                       
                        {{-- <a href="/updatedetailbiayaoperationalproyekform/{{$showdetailbiayaoperationalproyek->kode_biaya_detail_operational_proyek.'/'.$kodeperus}}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">edit</button></a>
                          <a href="/deletedetailbiayaoperationalproyekform/{{$showdetailbiayaoperationalproyek->kode_biaya_detail_operational_proyek}}" ><button class="btn btn-danger" data-target="#edit" data-toggle="modal">delete</button></a>
                        </td> --}}

                        @endforeach
        </tbody>
  
</body>
</html>
