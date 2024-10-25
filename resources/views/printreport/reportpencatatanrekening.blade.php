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
    <h1>Daftar Rekening Perusahaan </h1>
        <p>Kode Perusahaan: {{ $kodeperus }}</p>
    {{-- <p>Total Gaji Pegawai: Rp{{ $sum }}</p> --}}
    {{-- <p>Total Biaya Non Budgeting: Rp{{ $nonbudget }}</p> --}}
    {{-- <p>Total Semua: Rp{{ $totalsemua }}</p> --}}


    <h2>Data Daftar Rekening Perusahaan</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Pencatatan Rekening Partner</th>
                <th>Nama Perusahaan Partner</th>
                <th>Nomor Rekening Partner</th>
                <th>Kode Transfer</th>
                <th>Nama Bank</th>
                <th>Keterangan</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $showpencatatanrekening)
                <tr>
                    <th scope="row">{{ $showpencatatanrekening->kode_pencatatan_rekening_partner}}</th>
                    <td>{{ $showpencatatanrekening->nama_perusahaan_partner}}</td>
                    <td>{{ $showpencatatanrekening->nomor_rekening_perusahaan_partner}}</td>
                    <td>{{ $showpencatatanrekening->kode_transfer_rekening_perusahaan_partner}}</td>
                    <td>{{ $showpencatatanrekening->nama_bank_perusahaan_partner}}</td>
                    <td>{{ $showpencatatanrekening->keterangan_pencatatan_rekening_partner}}</td>
                    <td>
                        {{-- <a href="/updatepencatatanrekeningform/{{ $showpencatatanrekening->kode_pencatatan_rekening_partner }}">
                            <button class="btn btn-info">Edit</button>
                        </a>
                        <a href="/deletepencatatanrekeningform/{{ $showpencatatanrekening->kode_pencatatan_rekening_partner }}">
                            <button class="btn btn-danger">Delete</button>
                        </a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
