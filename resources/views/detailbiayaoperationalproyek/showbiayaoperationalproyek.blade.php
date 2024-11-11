@include("templateleftpanel")
@include("templaterightpanel")

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
                                    <a class="btn btn-primary" href="/detailbiayaoperationalproyekform/{{ $kodeperus }}" role="button">Tambah Data</a>
                                </div>
                            </div>

                            <!-- Right Side: Search Form -->
                            <div class="col-md-6 text-right">
                                <!-- Search Form -->
                                <form method="GET" action="{{ url()->current() }}" class="form-inline d-inline-block">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" value="{{ $search ?? '' }}" placeholder="Cari...">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Budget and Sum Display -->
                        <div class="row mt-3">
                            <div class="col-md-12 text-right">
                                <h5>{{ $sum }}/{{ $budget }}</h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Data Table -->
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Proyek</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Approved By</th>
                                    <th>Bukti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $showdetailbiayaoperationalproyek)
                                    <tr>
                                        <td>{{ $showdetailbiayaoperationalproyek->kode_biaya_detail_operational_proyek }}</td>
                                        <td>{{ $showdetailbiayaoperationalproyek->nama_biaya_detail_biaya_operational_proyek }}</td>
                                        <td>{{ $showdetailbiayaoperationalproyek->jumlah_detail_biaya_operational_proyek }}</td>
                                        <td class="rupiah">{{ $showdetailbiayaoperationalproyek->harga_detail_biaya_operational_proyek }}</td> <!-- Format Rupiah -->
                                        <td>{{ $showdetailbiayaoperationalproyek->approved_by_detail_biaya_operational_proyek }}</td>
                                        <td>
                                            <img src="{{ asset('DetailBiayaOperationalProyek/' . $showdetailbiayaoperationalproyek->bukti_detail_biaya_operational_proyek) }}" width="50" height="50" style="cursor: pointer;" data-toggle="modal" data-target="#imageModal" onclick="showImageModal('{{ asset('DetailBiayaOperationalProyek/' . $showdetailbiayaoperationalproyek->bukti_detail_biaya_operational_proyek) }}')">
                                        </td>
                                        <td>
                                            <a href="/updatedetailbiayaoperationalproyekform/{{ $showdetailbiayaoperationalproyek->kode_biaya_detail_operational_proyek . '/' . $kodeperus }}" class="btn btn-info">Edit</a>
                                            <a href="/deletedetailbiayaoperationalproyekform/{{ $showdetailbiayaoperationalproyek->kode_biaya_detail_operational_proyek }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination Links Centered -->
                        <div class="d-flex justify-content-center">
                            {{ $datas->appends(request()->input())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

        </div>
    </div>
    @include("templatedashboard")
</div>

<!-- Modal for Enlarging Image -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Bukti Biaya Operational Proyek</h5>
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
        $('#bootstrap-data-table').DataTable({
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
