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
                        <strong class="card-title">Daftar Pencatatan Masa Depan</strong>
                        <a class="btn btn-primary" href="/pencatatanmasadepanform" role="button">Tambah Data</a>
                        <a class="btn btn-primary" href="/downloadpencatatanmasadepan?start_date={{ request('start_date') }}&end_date={{ request('end_date') }}" role="button">Download PDF</a>

                        <!-- Form Filter Tanggal -->
                        <form action="{{ url()->current() }}" method="GET" class="form-inline mt-2">
                            <input type="date" name="start_date" class="form-control mr-2" value="{{ request('start_date') }}" placeholder="Tanggal Awal">
                            <input type="date" name="end_date" class="form-control mr-2" value="{{ request('end_date') }}" placeholder="Tanggal Akhir">
                            <button class="btn btn-primary mr-2" type="submit">Filter</button>
                        </form>
                    </div>

                    <div class="card-body">
                        <!-- Tabel Data -->
                        <table id="masadepan-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Pencatatan</th>
                                    <th>Nama Pencatatan</th>
                                    <th>Jumlah Pencatatan</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $showpencatatanmasadepan)
                                    <tr>
                                        <th scope="row">{{ $showpencatatanmasadepan->kode_pencatatan_biaya_masa_depan }}</th>
                                        <td>{{ $showpencatatanmasadepan->nama_pencatatan_biaya_masa_depan }}</td>
                                        <td>{{ $showpencatatanmasadepan->jumlah_pencatatan_biaya_masa_depan }}</td>
                                        <td>Rp{{ number_format($showpencatatanmasadepan->harga_pencatatan_biaya_masa_depan, 2, ',', '.') }}</td>
                                        <td>{{ $showpencatatanmasadepan->keterangan_pencatatan_biaya_masa_depan }}</td>
                                        <td>{{ $showpencatatanmasadepan->tanggal_pencatatan_biaya_masa_depan }}</td>
                                        <td>
                                            <a href="/updatepencatatanmasadepanform/{{ $showpencatatanmasadepan->kode_pencatatan_biaya_masa_depan }}" class="btn btn-info">Edit</a>
                                            <a href="/deletepencatatanmasadepanform/{{ $showpencatatanmasadepan->kode_pencatatan_biaya_masa_depan }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Total Biaya -->
                        <p><strong>Biaya yang diperlukan untuk periode ini: Rp{{ number_format($totalBiaya, 2, ',', '.') }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("templatedashboard")

<script>
    // Inisialisasi DataTables
    $(document).ready(function() {
        $('#masadepan-table').DataTable({
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
