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
                        <strong class="card-title">Biaya Lain-Lain</strong>
                        <a class="btn btn-primary" href="/biayalainlainform" role="button">Tambah Data</a>

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
                                        <th scope="row">{{ $showbiayalainlain->kode_biaya_lainlain }}</th>
                                        <td>{{ $showbiayalainlain->nama_biaya_lainlain }}</td>
                                        <td>{{ $showbiayalainlain->satuan_biaya_lainlain }}</td>
                                        <td>{{ $showbiayalainlain->harga_biaya_lainlain }}</td>
                                        <td>{{ $showbiayalainlain->tanggal_biaya_lainlain }}</td>
                                        <td>{{ $showbiayalainlain->jumlah_biaya_lainlain }}</td>
                                        <td>
                                            <img src="{{ asset('BiayaLainLainBukti') . '/' . $showbiayalainlain->bukti_biaya_lainlain }}" width="50" height="50" style="cursor: pointer;" data-toggle="modal" data-target="#imageModal" onclick="showImageModal('{{ asset('BiayaLainLainBukti') . '/' . $showbiayalainlain->bukti_biaya_lainlain }}')">
                                        </td>
                                        <td>
                                            <a href="/updatebiayalainlainform/{{ $showbiayalainlain->kode_biaya_lainlain }}">
                                                <button class="btn btn-info">Edit</button>
                                            </a>
                                            <a href="/deletebiayalainlainform/{{ $showbiayalainlain->kode_biaya_lainlain }}">
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
</script>

@include("templatedashboard")
