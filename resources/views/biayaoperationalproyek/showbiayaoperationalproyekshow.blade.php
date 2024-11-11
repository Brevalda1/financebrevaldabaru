@include("templateleftpanel")
@include("templaterightpanel")

<!-- Tambahkan jQuery dan DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <!-- Main Content -->
            <div class="col-md-12">
                <div class="card">

                    <!-- Card Header -->
                    <div class="card-header">
                        <div class="row align-items-center">
                            <!-- Left Side: Title and Tambah Data Button -->
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <strong class="card-title mr-3">Biaya Operational Proyek</strong>
                                    <a class="btn btn-primary" href="/biayaoperationalproyekform" role="button">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Data Table -->
                        <table id="operational-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Proyek</th>
                                    <th>Budget</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $showbiayaoperationalproyek)
                                    <tr>
                                        <td>{{ $showbiayaoperationalproyek->kode_biaya_operational_proyek }}</td>
                                        <td>{{ $showbiayaoperationalproyek->nama_biaya_operational_proyek }}</td>
                                        <td class="rupiah">{{ $showbiayaoperationalproyek->budget_biaya_operational_proyek }}</td> <!-- Format Rupiah -->
                                        <td>{{ $showbiayaoperationalproyek->keterangan_biaya_operational_proyek }}</td>
                                        <td>{{ $showbiayaoperationalproyek->tanggal_pelaksanaan_biaya_operational_proyek }}</td>
                                        <td>
                                            <a href="/detailbiayaoperationalproyeka/{{ $showbiayaoperationalproyek->kode_biaya_operational_proyek }}" class="btn btn-info">Tambah Detil</a>
                                            <a href="/updatebiayaoperationalproyekform/{{ $showbiayaoperationalproyek->kode_biaya_operational_proyek }}" class="btn btn-info">Edit</a>
                                            <a href="/deletebiayaoperationalproyekform/{{ $showbiayaoperationalproyek->kode_biaya_operational_proyek }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

        </div>
    </div>
    @include("templatedashboard")
</div>

<script>
    // Inisialisasi DataTables
    $(document).ready(function() {
        $('#operational-table').DataTable({
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
</script>
