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
    <h1>Laporan Operasional Gaji Pegawai</h1>
        <p>Kode Perusahaan: {{ $kodeperus }}</p>
    <p>Total Gaji Pegawai: Rp{{ $sum }}</p>
    {{-- <p>Total Biaya Non Budgeting: Rp{{ $nonbudget }}</p>
    <p>Total Semua: Rp{{ $totalsemua }}</p> --}}

    <h2>Data Pegawai</h2>
    <table>
        <thead>
            <tr>
                <th>ID Pegawai</th>
                <th>Nomor Ktp Pegawai</th>
                <th>Nama Pegawai</th>
                <th>jabatan</th>
                <th>Jumlah Kehadiran Pegawai</th>
                <th>rate gaji pegawai</th>
                <th>tambahan lain-lain</th>
                <th>keterangan</th>
                <th>total</th>
   
                <th>nomor rekening</th>
                <th>nama bank</th>
               
              </tr>
        </thead>
        <tbody>
            @php
            $datas = $data;
          @endphp   
            @foreach ( $datas as $showg)
                      <tr>
                        <th scope="row">{{$showg->id_pegawai_gaji}}</th>
                          <td>{{$showg->nomor_ktp_pegawai_gaji}}</td>
                          <td>{{$showg->nama_pegawai_gaji}}</td>
                          <td>{{$showg->jabatan_pegawai_gaji}}</td>
                          <td>{{$showg->jumlah_kehadiran_pegawai_gaji}}</td>
                          <td>{{$showg->rate_pegawai_gaji}}</td>
                          <td>{{$showg->tambahan_lainlain_pegawai_gaji}}</td>
                          <td>{{$showg->keterangan_pegawai_gaji}}</td>
                          <td>{{$showg->total_pegawai_gaji}}</td>
                          <td>{{$showg->nomor_rekening_pegawai_gaji}}</td>
                          <td>{{$showg->nama_bank_pegawai_gaji}}</td>
                

                          
                            
    



                      </tr>
                      @endforeach
        </tbody>
    </table>

    {{-- <h2>Data Biaya Operasional Non Budgeting</h2>
    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>nama</th>
                <th>keterangan</th>
                <th>tanggal</th>
                <th>biaya</th>
            </tr>
        </thead>
        <tbody>
         
            @foreach ( $data2 as $showbiayaoperationalnonbudgeting)
            <tr>
              <th scope="row">{{$showbiayaoperationalnonbudgeting->kode_operational_non_budgeting}}</th>
                <td>{{$showbiayaoperationalnonbudgeting->nama_operational_non_budgeting}}</td>
                <td>{{$showbiayaoperationalnonbudgeting->keterangan_operational_non_budgeting}}</td>
                <td>{{$showbiayaoperationalnonbudgeting->tanggal_operational_non_budgeting}}</td>
                <td>{{$showbiayaoperationalnonbudgeting->biaya_operational_non_budgeting}}</td>
                
                 

            
                  




            </tr>
            @endforeach
        </tbody>
    </table> --}}
</body>
</html>
