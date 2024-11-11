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

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"><h1>Report Biaya Operational Proyek</h1></strong><br>
                        <h4>Kode Perusahaan : {{ $kodeperus }}</h4>
                        <h4>Total budget Pengeluaran biaya operational proyek: Rp{{ $sum }}</h4>
                        <h4>Total Aktual Pengeluaran biaya operational proyek: Rp{{ $sum2 }}</h4>
                        <a class="btn btn-primary" href="/downloadreportoperationalproyek" role="button">Download PDF</a>
                    </div>
                    <div class="card-body">
                        <h4>Berikut daftar biaya proyek:</h4>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Proyek</th>
                                    <th>Budget</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $showbiayaoperationalproyek)
                                <tr>
                                    <td>{{ $showbiayaoperationalproyek->kode_biaya_operational_proyek }}</td>
                                    <td>{{ $showbiayaoperationalproyek->nama_biaya_operational_proyek }}</td>
                                    <td>Rp{{ is_numeric($showbiayaoperationalproyek->budget_biaya_operational_proyek) ? number_format($showbiayaoperationalproyek->budget_biaya_operational_proyek, 0, ',', '.') : '0' }}</td>
                                    <td>{{ $showbiayaoperationalproyek->keterangan_biaya_operational_proyek }}</td>
                                    <td>{{ $showbiayaoperationalproyek->tanggal_pelaksanaan_biaya_operational_proyek }}</td>
                                    <td>
                                        <a href="/reportdetailbiayaoperationalproyeka/{{ $showbiayaoperationalproyek->kode_biaya_operational_proyek }}" class="btn btn-info">Lihat Detil</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <ul class="pagination">
                            @if ($data->onFirstPage())
                                <li class="disabled"><span>&laquo;</span></li>
                            @else
                                <li><a href="{{ $data->previousPageUrl() }}">&laquo;</a></li>
                            @endif

                            @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                                @if ($page == $data->currentPage())
                                    <li class="active"><a href="#">{{ $page }}</a></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            @if ($data->hasMorePages())
                                <li><a href="{{ $data->nextPageUrl() }}">&raquo;</a></li>
                            @else
                                <li class="disabled"><span>&raquo;</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("templatedashboard")
