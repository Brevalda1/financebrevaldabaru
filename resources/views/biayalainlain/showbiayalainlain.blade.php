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
                        <strong class="card-title">Biaya Lain-Lain</strong>
                        <a class="btn btn-primary" href="/biayalainlainform" role="button">Tambah Data</a>
                    </div>

                    <div class="card-body">
                        <!-- Tabel Data -->
                        <table id="biaya-lainlain-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Biaya Lain-lain</th>
                                    <th>Nama Biaya Lain-lain</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Bukti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $showbiayalainlain)
                                    <tr>
                                        <td>{{ $showbiayalainlain->kode_biaya_lainlain }}</td>
                                        <td>{{ $showbiayalainlain->nama_biaya_lainlain }}</td>
                                        <td>{{ $showbiayalainlain->satuan_biaya_lainlain }}</td>
                                        <td>Rp{{ number_format($showbiayalainlain->harga_biaya_lainlain, 2, ',', '.') }}</td>
                                        <td>{{ $showbiayalainlain->tanggal_biaya_lainlain }}</td>
                                        <td>{{ $showbiayalainlain->jumlah_biaya_lainlain }}</td>
                                        <td>
                                            <img src="{{ asset('BiayaLainLainBukti') . '/' . $showbiayalainlain->bukti_biaya_lainlain }}" width="50" height="50" style="cursor: pointer;" data-toggle="modal" data-target="#imageModal" onclick="showImageModal('{{ asset('BiayaLainLainBukti') . '/' . $showbiayalainlain->bukti_biaya_lainlain }}')">
                                        </td>
                                        <td>
                                            <a href="/updatebiayalainlainform/{{ $showbiayalainlain->kode_biaya_lainlain }}" class="btn btn-info">Edit</a>
                                            <a href="/deletebiayalainlainform/{{ $showbiayalainlain->kode_biaya_lainlain }}" class="btn btn-danger">Delete</a>
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

<!-- Modal for Enlarging Image -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Bukti Biaya Lain-Lain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Bukti" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript function to show the image in the modal
    function showImageModal(imageUrl) {
        document.getElementById('modalImage').src = imageUrl;
    }

    // Inisialisasi DataTables
    $(document).ready(function() {
        $('#biaya-lainlain-table').DataTable({
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

@include("templatedashboard")
