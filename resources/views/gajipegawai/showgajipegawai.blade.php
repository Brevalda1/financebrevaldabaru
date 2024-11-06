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
{{-- @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
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
                        <strong class="card-title">Gaji Pegawai</strong>
                        <a class="btn btn-primary" href="/gajipegawaiform" role="button">Tambah Data</a>
                    </div>

                    <div class="card-body">
                        <!-- Search Form -->
                        <div class="search-box">
                            <form action="{{ url('/gajipegawai') }}" method="GET">
                                <input type="text" name="search" placeholder="Cari nama pegawai..." value="{{ $search }}">
                                <input type="hidden" name="kodeidpegawai" value="{{ $kodeidpegawai }}">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </form>
                        </div>

                        <!-- Data Table -->
                        <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>ID Pegawai</th>
                                    <th>Nomor KTP Pegawai</th>
                                    <th>Nama Pegawai</th>
                                    <th>Jumlah Kehadiran Pegawai</th>
                                    <th>Rate Gaji Pegawai</th>
                                    <th>Tambahan Lain-Lain</th>
                                    <th>Keterangan</th>
                                    <th>Total</th>
                                    <th>Jabatan</th>
                                    <th>Nomor Rekening</th>
                                    <th>Nama Bank</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $showgajipegawai)
                                    <tr>
                                        <td>{{ $showgajipegawai->id_pegawai_gaji }}</td>
                                        <td>{{ $showgajipegawai->nomor_ktp_pegawai_gaji }}</td>
                                        <td>{{ $showgajipegawai->nama_pegawai_gaji }}</td>
                                        <td>{{ $showgajipegawai->jumlah_kehadiran_pegawai_gaji }}</td>
                                        <td>{{ $showgajipegawai->rate_pegawai_gaji }}</td>
                                        <td>{{ $showgajipegawai->tambahan_lainlain_pegawai_gaji }}</td>
                                        <td>{{ $showgajipegawai->keterangan_pegawai_gaji }}</td>
                                        <td>{{ $showgajipegawai->total_pegawai_gaji }}</td>
                                        <td>{{ $showgajipegawai->jabatan_pegawai_gaji }}</td>
                                        <td>{{ $showgajipegawai->nomor_rekening_pegawai_gaji }}</td>
                                        <td>{{ $showgajipegawai->nama_bank_pegawai_gaji }}</td>
                                        <td>
                                            <a href="/updategajipegawaiform/{{ $showgajipegawai->id_pegawai_gaji }}" class="btn btn-info">Edit</a>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="setDeleteAction('/deletegajipegawaiform/{{ $showgajipegawai->id_pegawai_gaji }}')">Delete</button>
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
    @include("templatedashboard")
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <a id="confirmDeleteButton" href="#" class="btn btn-danger">Yes</a>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to set the delete action URL in the modal
    function setDeleteAction(url) {
        document.getElementById('confirmDeleteButton').href = url;
    }

    
</script>
