@include("templateleftpanel")
@include("templaterightpanel")

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

                        <!-- Form Pencarian -->
                        <form action="{{ url()->current() }}" method="GET" class="form-inline float-right">
                            <input type="text" name="search" class="form-control mr-sm-2" placeholder="Cari..." value="{{ request('search') }}">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Cari</button>
                        </form>
                    </div>

                    <div class="card-body">
                        <!-- Tabel Data -->
                        <table class="table table-striped table-bordered">
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
                                        <th scope="row">{{ $showbiayaoperationalnonbudgeting->kode_operational_non_budgeting }}</th>
                                        <td>{{ $showbiayaoperationalnonbudgeting->nama_operational_non_budgeting }}</td>
                                        <td>{{ $showbiayaoperationalnonbudgeting->keterangan_operational_non_budgeting }}</td>
                                        <td>{{ $showbiayaoperationalnonbudgeting->tanggal_operational_non_budgeting }}</td>
                                        <td>{{ $showbiayaoperationalnonbudgeting->biaya_operational_non_budgeting }}</td>
                                        <td>
                                            <a href="/updatebiayaoperationalnonbudgetingform/{{ $showbiayaoperationalnonbudgeting->kode_operational_non_budgeting }}">
                                                <button class="btn btn-info">Edit</button>
                                            </a>
                                            <a href="/deletebiayaoperationalnonbudgetingform/{{ $showbiayaoperationalnonbudgeting->kode_operational_non_budgeting }}">
                                                <button class="btn btn-danger">Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $datas->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("templatedashboard")
