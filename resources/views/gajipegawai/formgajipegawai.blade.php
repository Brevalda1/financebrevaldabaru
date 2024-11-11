@include("templateleftpanel")
@include("templaterightpanel")

<style>
    .card-body {
        padding: 20px 20px; /* Menambah padding kanan dan kiri menjadi 20px */
    }
    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }
    .form-row .form-group {
        flex: 1;
        min-width: 200px;
    }
    #form_id_pegawai_gaji,
    #form_nama_pegawai_gaji,
    #form_total_pegawai_gaji {
        width: 100%;
    }
    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
        }
        .form-row .form-group {
            width: 100%;
        }
    }
</style>

<div id="pay-invoice">
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center">Gaji Pegawai</h3>
        </div>
        <hr>
        <form action="" method="post" novalidate="novalidate">
            @csrf
            <div class="form-group text-center">
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="form_id_pegawai_gaji" class="control-label mb-1">ID Pegawai</label>
                    <input id="form_id_pegawai_gaji" name="form_id_pegawai_gaji" type="text" class="form-control" value="{{ $kode }}" readonly>
                </div>
                <div class="form-group">
                    <label for="form_nomor_ktp_pegawai_gaji" class="control-label mb-1">Nomor KTP</label>
                    <input id="form_nomor_ktp_pegawai_gaji" name="form_nomor_ktp_pegawai_gaji" type="text" class="form-control" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="form_nama_pegawai_gaji" class="control-label mb-1">Nama Pegawai</label>
                    <input id="form_nama_pegawai_gaji" name="form_nama_pegawai_gaji" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="form_jabatan_pegawai_gaji" class="control-label mb-1">Jabatan</label>
                    <input id="form_jabatan_pegawai_gaji" name="form_jabatan_pegawai_gaji" type="text" class="form-control" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="form_jumlah_kehadiran_pegawai_gaji" class="control-label mb-1">Jumlah Jam Kerja</label>
                    <input id="form_jumlah_kehadiran_pegawai_gaji" name="form_jumlah_kehadiran_pegawai_gaji" type="number" class="form-control" required oninput="calculateTotal()">
                </div>
                <div class="form-group">
                    <label for="form_rate_pegawai_gaji" class="control-label mb-1">Rate Pegawai</label>
                    <input id="form_rate_pegawai_gaji" name="form_rate_pegawai_gaji" type="number" class="form-control" required oninput="calculateTotal()">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="form_tambahan_lainlain_pegawai_gaji" class="control-label mb-1">Tambahan Lain-Lain</label>
                    <input id="form_tambahan_lainlain_pegawai_gaji" name="form_tambahan_lainlain_pegawai_gaji" type="number" class="form-control" required oninput="calculateTotal()">
                </div>
                <div class="form-group">
                    <label for="form_keterangan_pegawai_gaji" class="control-label mb-1">Keterangan</label>
                    <input id="form_keterangan_pegawai_gaji" name="form_keterangan_pegawai_gaji" type="text" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="form_total_pegawai_gaji" class="control-label mb-1">Total</label>
                <input id="form_total_pegawai_gaji" name="form_total_pegawai_gaji" type="number" class="form-control" readonly>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="form_nomor_rekening_pegawai_gaji" class="control-label mb-1">Nomor Rekening</label>
                    <input id="form_nomor_rekening_pegawai_gaji" name="form_nomor_rekening_pegawai_gaji" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="form_nama_bank_pegawai_gaji" class="control-label mb-1">Nama Bank</label>
                    <input id="form_nama_bank_pegawai_gaji" name="form_nama_bank_pegawai_gaji" type="text" class="form-control" required>
                </div>
            </div>

            <div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    <i class="fa fa-check fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">Submit</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function calculateTotal() {
        var rate = parseFloat(document.getElementById('form_rate_pegawai_gaji').value) || 0;
        var jumlah_kehadiran = parseFloat(document.getElementById('form_jumlah_kehadiran_pegawai_gaji').value) || 0;
        var tambahan = parseFloat(document.getElementById('form_tambahan_lainlain_pegawai_gaji').value) || 0;
        var total = (rate * jumlah_kehadiran) + tambahan;
        document.getElementById('form_total_pegawai_gaji').value = total.toFixed(2);
    }
</script>

@include("templatedashboard")
