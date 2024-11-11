@include("templateleftpanel")
@include("templaterightpanel")

<!-- Sertakan CSS DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!-- Sertakan jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Sertakan JS DataTables -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<div class="breadcrumbs">
    <!-- ... Breadcrumbs content ... -->
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Pegawai</strong>
                    <a class="btn btn-primary" href="/pegawaiform" role="button">Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="pegawai-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Nama Pegawai</th>
                                    <th>Role</th>
                                    <th>Nomor Telp Pegawai</th>
                                    <th>Jabatan Pegawai</th>
                                    <th>Kode Perusahaan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $data = $datas;
                                @endphp
                                @foreach ($data as $showpegawai)
                                <tr>
                                    <td>{{ $showpegawai->username }}</td>
                                    <td>{{ $showpegawai->nama_pegawai }}</td>
                                    <td>{{ $showpegawai->role }}</td>
                                    <td>{{ $showpegawai->nomor_telp_pegawai }}</td>
                                    <td>{{ $showpegawai->jabatan_pegawai }}</td>
                                    <td>{{ $showpegawai->kode_perusahaan }}</td>
                                    <td>
                                        <a href="/updatepegawaiform/{{ $showpegawai->username }}" class="btn btn-info">Edit</a>
                                        <a href="/deletepegawaiform/{{ $showpegawai->username }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
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
</div>

@include("templatedashboard")

<!-- Inisialisasi DataTables -->
<script>
    $(document).ready(function() {
        $('#pegawai-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            // Untuk bahasa Indonesia
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json"
            }
        });
    });
</script>
