@include("templateleftpanel")
@include("templaterightpanel")

<!-- Tambahkan jQuery dan DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Biaya Pribadi</strong>
                        <a class="btn btn-primary" href="/biayapribadiform" role="button">Tambah Data</a>
                    </div>

                    <div class="card-body">
                        <!-- Tabel Data -->
                        <table id="biaya-pribadi-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Biaya</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Approved</th>
                                    <th>Bukti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $showbiayapribadi)
                                    <tr>
                                        <td>{{ $showbiayapribadi->kode_biaya_pribadi }}</td>
                                        <td>{{ $showbiayapribadi->nama_biaya_pribadi }}</td>
                                        <td>{{ $showbiayapribadi->satuan_biaya_pribadi }}</td>
                                        <td class="rupiah">{{ $showbiayapribadi->harga_biaya_pribadi }}</td> <!-- Format Rupiah -->
                                        <td>{{ $showbiayapribadi->tanggal_biaya_pribadi }}</td>
                                        <td>{{ $showbiayapribadi->jumlah_biaya_pribadi }}</td>
                                        <td>{{ $showbiayapribadi->approved_by_biaya_pribadi }}</td>
                                        <td>
                                            <img src="{{ asset('BiayaPribadiBukti') . '/' . $showbiayapribadi->bukti_biaya_pribadi }}" width="50" height="50">
                                        </td>
                                        <td>
                                            <a href="/updatebiayapribadiform/{{ $showbiayapribadi->kode_biaya_pribadi }}" class="btn btn-info">Edit</a>
                                            <a href="/deletebiayapribadiform/{{ $showbiayapribadi->kode_biaya_pribadi }}" class="btn btn-danger">Delete</a>
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
        $('#biaya-pribadi-table').DataTable({
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
