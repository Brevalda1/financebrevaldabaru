@include("templateleftpanel")
@include("templaterightpanel")

<!-- Credit Card -->
<div id="pay-invoice">
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center">Gaji Pegawai</h3>
        </div>
        <hr>
        <form action="/updategajipegawaiform/{{ $id_pegawai_gaji }}" method="post" novalidate="novalidate">
            @csrf
            <!-- ID Pegawai -->
            <div class="form-group">
                <label for="form_id_pegawai_gaji" class="control-label mb-1">ID Pegawai</label>
                <input id="form_id_pegawai_gaji" name="form_id_pegawai_gaji" type="text" class="form-control" value="{{ $id_pegawai_gaji }}" readonly>
            </div>
            <!-- Nomor KTP -->
            <div class="form-group">
                <label for="form_nomor_ktp_pegawai_gaji" class="control-label mb-1">Nomor KTP</label>
                <input id="form_nomor_ktp_pegawai_gaji" name="form_nomor_ktp_pegawai_gaji" type="text" class="form-control" value="{{ $nomor_ktp_pegawai_gaji }}">
            </div>
            <!-- Nama Pegawai -->
            <div class="form-group">
                <label for="form_nama_pegawai_gaji" class="control-label mb-1">Nama Pegawai</label>
                <input id="form_nama_pegawai_gaji" name="form_nama_pegawai_gaji" type="text" class="form-control" value="{{ $nama_pegawai_gaji }}">
            </div>
            <!-- Jabatan -->
            <div class="form-group">
                <label for="form_jabatan_pegawai_gaji" class="control-label mb-1">Jabatan</label>
                <input id="form_jabatan_pegawai_gaji" name="form_jabatan_pegawai_gaji" type="text" class="form-control" value="{{ $jabatan_pegawai_gaji }}">
            </div>
            <!-- Jumlah Jam Kerja -->
            <div class="form-group">
                <label for="form_jumlah_kehadiran_pegawai_gaji" class="control-label mb-1">Jumlah Jam Kerja</label>
                <input id="form_jumlah_kehadiran_pegawai_gaji" name="form_jumlah_kehadiran_pegawai_gaji" type="number" class="form-control" value="{{ $jumlah_kehadiran_pegawai_gaji }}" oninput="calculateTotal()">
            </div>
            <!-- Rate Pegawai -->
            <div class="form-group">
                <label for="form_rate_pegawai_gaji" class="control-label mb-1">Rate Pegawai</label>
                <input id="form_rate_pegawai_gaji" name="form_rate_pegawai_gaji" type="number" class="form-control" value="{{ $rate_pegawai_gaji }}" oninput="calculateTotal()">
            </div>
            <!-- Tambahan Lain-Lain -->
            <div class="form-group">
                <label for="form_tambahan_lainlain_pegawai_gaji" class="control-label mb-1">Tambahan Lain-Lain</label>
                <input id="form_tambahan_lainlain_pegawai_gaji" name="form_tambahan_lainlain_pegawai_gaji" type="number" class="form-control" value="{{ $tambahan_lainlain_pegawai_gaji }}" oninput="calculateTotal()">
            </div>
            <!-- Keterangan -->
            <div class="form-group">
                <label for="form_keterangan_pegawai_gaji" class="control-label mb-1">Keterangan</label>
                <input id="form_keterangan_pegawai_gaji" name="form_keterangan_pegawai_gaji" type="text" class="form-control" value="{{ $keterangan_pegawai_gaji }}">
            </div>
            <!-- Total -->
            <div class="form-group">
                <label for="form_total_pegawai_gaji" class="control-label mb-1">Total</label>
                <input id="form_total_pegawai_gaji" name="form_total_pegawai_gaji" type="number" class="form-control" value="{{ $total_pegawai_gaji }}" readonly>
            </div>
            <!-- Nomor Rekening -->
            <div class="form-group">
                <label for="form_nomor_rekening_pegawai_gaji" class="control-label mb-1">Nomor Rekening</label>
                <input id="form_nomor_rekening_pegawai_gaji" name="form_nomor_rekening_pegawai_gaji" type="text" class="form-control" value="{{ $nomor_rekening_pegawai_gaji }}">
            </div>
            <!-- Nama Bank -->
            <div class="form-group">
                <label for="form_nama_bank_pegawai_gaji" class="control-label mb-1">Nama Bank</label>
                <input id="form_nama_bank_pegawai_gaji" name="form_nama_bank_pegawai_gaji" type="text" class="form-control" value="{{ $nama_bank_pegawai_gaji }}">
            </div>
            <!-- Submit Button -->
            <div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    <i class="fa fa-check fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">Submit</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript Function to Calculate Total -->
<script>
    function calculateTotal() {
        // Get the values of the inputs
        var rate = parseFloat(document.getElementById('form_rate_pegawai_gaji').value) || 0;
        var jumlah_kehadiran = parseFloat(document.getElementById('form_jumlah_kehadiran_pegawai_gaji').value) || 0;
        var tambahan = parseFloat(document.getElementById('form_tambahan_lainlain_pegawai_gaji').value) || 0;

        // Calculate the total
        var total = (rate * jumlah_kehadiran) + tambahan;

        // Set the value of the total input
        document.getElementById('form_total_pegawai_gaji').value = total.toFixed(2);
    }

    // Call calculateTotal on page load to initialize the total value
    window.onload = function() {
        calculateTotal();
    };
</script>

@include("templatedashboard")
