@include("templateleftpanel")
@include("templaterightpanel")

<!-- Tambahkan jQuery dan DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    .container {
        max-width: 800px;
        margin: auto;
    }
</style>

<!-- Tambahkan container dengan padding -->
<div class="container-fluid px-4"> <!-- Tambahkan padding kanan-kiri -->
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
                            <table id="pegawai-table" class="table table-striped table-bordered table-responsive">
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
                                            <td class="rupiah">{{ $showgajipegawai->rate_pegawai_gaji }}</td>
                                            <td class="rupiah">{{ $showgajipegawai->tambahan_lainlain_pegawai_gaji }}</td>
                                            <td>{{ $showgajipegawai->keterangan_pegawai_gaji }}</td>
                                            <td class="rupiah">{{ $showgajipegawai->total_pegawai_gaji }}</td> <!-- Format Rupiah -->
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include("templatedashboard")
    </div>
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
    // Inisialisasi DataTables
    $(document).ready(function() {
        $('#pegawai-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json" // Bahasa Indonesia
            }
        });
        
        // Format semua elemen dengan kelas 'rupiah' ke format Rupiah
        $('.rupiah').each(function() {
            const nominal = $(this).text();
            $(this).text(formatRupiah(nominal));
        });
    });

    // Fungsi untuk format Rupiah
    function formatRupiah(angka, prefix = 'Rp ') {
        const numberString = angka.replace(/[^,\d]/g, '').toString(),
            split = numberString.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa) + (split[0].substr(sisa).match(/\d{3}/gi) || []).join('.'),
            hasil = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix + hasil;
    }

    // Function to set the delete action URL in the modal
    function setDeleteAction(url) {
        document.getElementById('confirmDeleteButton').href = url;
    }
</script>
