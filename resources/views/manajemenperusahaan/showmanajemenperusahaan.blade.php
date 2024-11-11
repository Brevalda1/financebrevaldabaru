@include("templateleftpanel")
@include("templaterightpanel")

<!-- Sertakan CSS DataTables jika belum -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!-- Sertakan jQuery jika belum -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Sertakan JS DataTables jika belum -->
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
                    <strong class="card-title">Manajemen Perusahaan</strong>
                    <a class="btn btn-primary" href="/manajemenperusahaanform" role="button">Tambah Data</a>
                </div>
                <div class="card-body">
                    <!-- Tambahkan id pada tabel -->
                    <table id="manajemen-perusahaan-table" class="table table-striped table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>Kode Perusahaan</th>
                                <th>Nama Perusahaan</th>
                                <th>Alamat</th>
                                <th>Nomor Telp Perusahaan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $data = $datas;
                            @endphp
                            @foreach ($data as $showmanajemenperusahaan)
                            <tr>
                                <td>{{ $showmanajemenperusahaan->kode_perusahaan }}</td>
                                <td>{{ $showmanajemenperusahaan->nama_perusahaan }}</td>
                                <td>{{ $showmanajemenperusahaan->alamat_perusahaan }}</td>
                                <td>{{ $showmanajemenperusahaan->nomor_telp_perusahaan }}</td>
                                <td>
                                    <a href="/updatemanajemenperusahaanform/{{ $showmanajemenperusahaan->kode_perusahaan }}" class="btn btn-info">Edit</a>
                                    <a href="/deletemanajemenperusahaanform/{{ $showmanajemenperusahaan->kode_perusahaan }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
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

<!-- Inisialisasi DataTables -->
<script>
    $(document).ready(function() {
        $('#manajemen-perusahaan-table').DataTable({
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
