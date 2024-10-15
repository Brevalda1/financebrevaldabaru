@include("templateleftpanel")
@include("templaterightpanel")

<style>
  body {
      font-family: Arial, sans-serif;
      margin: 20px;
  }
  .container {
      max-width: 800px;
      margin: auto;
  }
</style>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Form Filter Tanggal untuk Biaya Operasional Non Budgeting -->
<div class="container mt-3">
    <form action="{{ url()->current() }}" method="GET" class="form-inline">
        <div class="form-group mb-2">
            <label for="start_date" class="sr-only">Mulai Tanggal</label>
            <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Tanggal Mulai" value="{{ request('start_date') }}">
        </div>

        <div class="form-group mx-sm-3 mb-2">
            <label for="end_date" class="sr-only">Akhir Tanggal</label>
            <input type="date" name="end_date" id="end_date" class="form-control" placeholder="Tanggal Akhir" value="{{ request('end_date') }}">
        </div>

        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"><h1>ReportOperational</h1></strong><br>
                        <h4>Kode Perusahaan : {{ $kodeperus }}</h4>
                        <h4>Total Pengeluaran Gaji pegawai : Rp{{ $sum }}</h4>
                        <h4>Total Pengeluaran Biaya Non Budgeting : Rp{{ $nonbudget }}</h4>
                        <h4>Total Semua : Rp{{ $totalsemua }}</h4>
                        <a class="btn btn-primary" href="/downloadreportoperational?start_date={{ request('start_date') }}&end_date={{ request('end_date') }}" role="button">Download PDF</a>
                    </div>
                    <div class="card-body">
                        <!-- Tampilkan tabel gaji pegawai dan biaya non budgeting -->
                        <h4>Berikut detil dari Gaji pegawai:</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Pegawai</th>
                                    <th>Nomor KTP Pegawai</th>
                                    <th>Nama Pegawai</th>
                                    <th>Jumlah Kehadiran</th>
                                    <th>Rate Gaji</th>
                                    <th>Tambahan Lain-lain</th>
                                    <th>Keterangan</th>
                                    <th>Total</th>
                                    <th>Jabatan</th>
                                    <th>Nomor Rekening</th>
                                    <th>Nama Bank</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $pegawai)
                                <tr>
                                    <td>{{ $pegawai->id_pegawai_gaji }}</td>
                                    <td>{{ $pegawai->nomor_ktp_pegawai_gaji }}</td>
                                    <td>{{ $pegawai->nama_pegawai_gaji }}</td>
                                    <td>{{ $pegawai->jumlah_kehadiran_pegawai_gaji }}</td>
                                    <td>{{ $pegawai->rate_pegawai_gaji }}</td>
                                    <td>{{ $pegawai->tambahan_lainlain_pegawai_gaji }}</td>
                                    <td>{{ $pegawai->keterangan_pegawai_gaji }}</td>
                                    <td>{{ $pegawai->total_pegawai_gaji }}</td>
                                    <td>{{ $pegawai->jabatan_pegawai_gaji }}</td>
                                    <td>{{ $pegawai->nomor_rekening_pegawai_gaji }}</td>
                                    <td>{{ $pegawai->nama_bank_pegawai_gaji }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $data->links('vendor.pagination.bootstrap-4') }}
                        </div>

                        <h4>Berikut detil dari Biaya Non Budgeting:</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data2 as $nonbudget)
                                <tr>
                                    <td>{{ $nonbudget->kode_operational_non_budgeting }}</td>
                                    <td>{{ $nonbudget->nama_operational_non_budgeting }}</td>
                                    <td>{{ $nonbudget->keterangan_operational_non_budgeting }}</td>
                                    <td>{{ $nonbudget->tanggal_operational_non_budgeting }}</td>
                                    <td>{{ $nonbudget->biaya_operational_non_budgeting }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $data2->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("templatedashboard")
