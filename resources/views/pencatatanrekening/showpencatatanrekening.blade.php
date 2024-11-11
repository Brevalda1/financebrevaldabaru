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
                        <strong class="card-title">Daftar Rekening Perusahaan</strong>

                        <a class="btn btn-primary" href="/pencatatanrekeningform" role="button">Tambah Data</a>
                        <a class="btn btn-primary" href="/downloadpencatatanrekening" role="button">Download PDF</a>
                        <!-- Form Pencarian -->
                        {{-- <form action="{{ url()->current() }}" method="GET" class="form-inline float-right">
                            <input type="text" name="search" class="form-control mr-sm-2" placeholder="Cari..." value="{{ request('search') }}">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Cari</button>
                        </form>
                    </div> --}}

                    <div class="card-body">
                        <!-- Tabel Data -->
                        <table id="rekening-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Pencatatan Rekening Partner</th>
                                    <th>Nama Perusahaan Partner</th>
                                    <th>Nomor Rekening Partner</th>
                                    <th>Kode Transfer</th>
                                    <th>Nama Bank</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $showpencatatanrekening)
                                    <tr>
                                        <th scope="row">{{ $showpencatatanrekening->kode_pencatatan_rekening_partner }}</th>
                                        <td>{{ $showpencatatanrekening->nama_perusahaan_partner }}</td>
                                        <td>{{ $showpencatatanrekening->nomor_rekening_perusahaan_partner }}</td>
                                        <td>{{ $showpencatatanrekening->kode_transfer_rekening_perusahaan_partner }}</td>
                                        <td>{{ $showpencatatanrekening->nama_bank_perusahaan_partner }}</td>
                                        <td>{{ $showpencatatanrekening->keterangan_pencatatan_rekening_partner }}</td>
                                        <td>
                                            <a href="/updatepencatatanrekeningform/{{ $showpencatatanrekening->kode_pencatatan_rekening_partner }}" class="btn btn-info">Edit</a>
                                            <a href="/deletepencatatanrekeningform/{{ $showpencatatanrekening->kode_pencatatan_rekening_partner }}" class="btn btn-danger">Delete</a>
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

@include("templatedashboard")

<script>
    // Inisialisasi DataTables
    $(document).ready(function() {
        $('#rekening-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json" // Bahasa Indonesia
            }
        });
    });
</script>
