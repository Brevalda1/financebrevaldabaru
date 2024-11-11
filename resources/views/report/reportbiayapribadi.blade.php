@include("templateleftpanel")
@include("templaterightpanel")

<style>
  body {
      font-family: Arial, sans-serif;
      margin: 20px;
  }
  .pagination {
      display: flex;
      justify-content: center;
      list-style-type: none;
      padding: 0;
  }
  .pagination li {
      margin: 0 5px;
  }
  .pagination a {
      text-decoration: none;
      padding: 10px 15px;
      border: 1px solid #007bff;
      color: #007bff;
      border-radius: 5px;
  }
  .pagination a:hover {
      background-color: #007bff;
      color: white;
  }
  .pagination .active a {
      background-color: #007bff;
      color: white;
      border: 1px solid #007bff;
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

<!-- Form Filter Tanggal -->
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
                        <strong class="card-title"><h1>Report Biaya Pribadi</h1></strong><br>
                        <h4>Kode Perusahaan : {{ $kodeperus }}</h4>
                        <h4>Total Pengeluaran Biaya Pribadi yang diterima : Rp{{$sum }}</h4>
                        <h4>Total Pengeluaran Biaya Pribadi yang ditolak : Rp{{$nonbudget }}</h4>
                        <h4>Total Semua : Rp{{ $totalsemua }}</h4>
                        <a class="btn btn-primary" href="/downloadreportbiayapribadi?start_date={{ request('start_date') }}&end_date={{ request('end_date') }}" role="button">Download PDF</a>
                    </div>
                    <div class="card-body">
                        <!-- Tabel Biaya Pribadi yang Diterima -->
                        <h4>Berikut Detil Biaya Pribadi yang Diterima:</h4>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Biaya</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Approved By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $biaya)
                                <tr>
                                    <td>{{ $biaya->kode_biaya_pribadi }}</td>
                                    <td>{{ $biaya->nama_biaya_pribadi }}</td>
                                    <td>{{ $biaya->satuan_biaya_pribadi }}</td>
                                    <td>Rp{{ is_numeric($biaya->harga_biaya_pribadi) ? number_format($biaya->harga_biaya_pribadi, 0, ',', '.') : '0' }}</td>
                                    <td>{{ $biaya->created_at }}</td>
                                    <td>{{ is_numeric($biaya->jumlah_biaya_pribadi) ? number_format($biaya->jumlah_biaya_pribadi, 0, ',', '.') : '0' }}</td>
                                    <td>{{ $biaya->approved_by_biaya_pribadi }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        {{ $data->links() }}

                        <!-- Tabel Biaya Pribadi yang Ditolak -->
                        <h4>Berikut Detil Biaya Pribadi yang Ditolak:</h4>  
                        <a class="btn btn-primary" href="/downloadreportbiayapribadiyangditolak?start_date={{ request('start_date') }}&end_date={{ request('end_date') }}" role="button">Download PDF</a>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Biaya</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Rejected By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data2 as $biaya)
                                <tr>
                                    <td>{{ $biaya->kode_biaya_pribadi }}</td>
                                    <td>{{ $biaya->nama_biaya_pribadi }}</td>
                                    <td>{{ $biaya->satuan_biaya_pribadi }}</td>
                                    <td>Rp{{ is_numeric($biaya->harga_biaya_pribadi) ? number_format($biaya->harga_biaya_pribadi, 0, ',', '.') : '0' }}</td>
                                    <td>{{ $biaya->created_at }}</td>
                                    <td>{{ is_numeric($biaya->jumlah_biaya_pribadi) ? number_format($biaya->jumlah_biaya_pribadi, 0, ',', '.') : '0' }}</td>
                                    <td>{{ $biaya->approved_by_biaya_pribadi }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        {{ $data2->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("templatedashboard")
