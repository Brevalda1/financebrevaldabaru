@include("templateleftpanel")
@include("templaterightpanel")

<!-- Tambahkan jQuery dan DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<style>
    .pagination {
        display: flex;
        justify-content: center;
        padding-left: 0;
        list-style: none;
        border-radius: 0.25rem;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination a {
        color: #007bff;
        background-color: white;
        border: 1px solid #dee2e6;
        padding: 0.375rem 0.75rem;
        border-radius: 0.25rem;
        text-decoration: none;
    }

    .pagination a:hover {
        color: white;
        background-color: #007bff;
    }

    .pagination .active a {
        color: white;
        background-color: #007bff;
        border-color: #007bff;
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
                        <strong class="card-title">Biaya Operational Non Budgeting</strong>
                        <a class="btn btn-primary" href="/biayaoperationalnonbudgetingform" role="button">Tambah Data</a>
                    </div>

                    <div class="card-body">
                        <!-- Tabel Data -->
                        <table id="biaya-operational-non-budgeting-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Biaya</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $showbiayaoperationalnonbudgeting)
                                    <tr>
                                        <td>{{ $showbiayaoperationalnonbudgeting->kode_operational_non_budgeting }}</td>
                                        <td>{{ $showbiayaoperationalnonbudgeting->nama_operational_non_budgeting }}</td>
                                        <td>{{ $showbiayaoperationalnonbudgeting->keterangan_operational_non_budgeting }}</td>
                                        <td>{{ $showbiayaoperationalnonbudgeting->tanggal_operational_non_budgeting }}</td>
                                        <td>Rp{{ number_format($showbiayaoperationalnonbudgeting->biaya_operational_non_budgeting, 2, ',', '.') }}</td>
                                        <td>
                                            <a href="/updatebiayaoperationalnonbudgetingform/{{ $showbiayaoperationalnonbudgeting->kode_operational_non_budgeting }}" class="btn btn-info">Edit</a>
                                            <a href="/deletebiayaoperationalnonbudgetingform/{{ $showbiayaoperationalnonbudgeting->kode_operational_non_budgeting }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Inisialisasi DataTables
    $(document).ready(function() {
        $('#biaya-operational-non-budgeting-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json"
            }
        });
    });
</script>

@include("templatedashboard")
