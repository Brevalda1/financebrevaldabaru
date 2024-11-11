@include("templateleftpanel")
@include("templaterightpanel")

<style>
    .card-body {
        padding: 20px 30px; /* Padding yang lebih luas di seluruh sisi */
    }
    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Jarak antar input */
    }
    .form-row .form-group {
        flex: 1;
        min-width: 250px; /* Menjamin layout responsif */
    }
    /* Untuk tampilan kolom satu saat layar lebih kecil */
    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
        }
    }
</style>

<div id="pay-invoice">
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center">Pencatatan Rekening</h3>
        </div>
        <hr>
        <form action="" method="post" novalidate="novalidate">
            @csrf

            <!-- Kode Rekening -->
            <div class="form-group">
                <label for="form_kode_pencatanan_rekening_partner" class="control-label mb-1">Kode Rekening</label>
                <input id="form_kode_pencatanan_rekening_partner" name="form_kode_pencatanan_rekening_partner" type="text" class="form-control" value="{{ $kode }}" readonly>
            </div>

            <!-- Input dengan layout dua kolom -->
            <div class="form-row">
                <!-- Nama Perusahaan -->
                <div class="form-group">
                    <label for="form_nama_perusahaan_partner" class="control-label mb-1">Nama Perusahaan</label>
                    <input id="form_nama_perusahaan_partner" name="form_nama_perusahaan_partner" type="text" class="form-control" required>
                </div>

                <!-- Nomor Rekening -->
                <div class="form-group">
                    <label for="form_nomor_rekening_perusahaan_partner" class="control-label mb-1">Nomor Rekening</label>
                    <input id="form_nomor_rekening_perusahaan_partner" name="form_nomor_rekening_perusahaan_partner" type="text" class="form-control" required>
                </div>
            </div>

            <div class="form-row">
                <!-- Kode Transfer -->
                <div class="form-group">
                    <label for="form_kode_transfer_rekening_perusahaan_partner" class="control-label mb-1">Kode Transfer</label>
                    <input id="form_kode_transfer_rekening_perusahaan_partner" name="form_kode_transfer_rekening_perusahaan_partner" type="text" class="form-control" required>
                </div>

                <!-- Nama Bank -->
                <div class="form-group">
                    <label for="form_nama_bank_perusahaan_partner" class="control-label mb-1">Nama Bank</label>
                    <input id="form_nama_bank_perusahaan_partner" name="form_nama_bank_perusahaan_partner" type="text" class="form-control" required>
                </div>
            </div>

            <!-- Keterangan -->
            <div class="form-group">
                <label for="form_keterangan_pencatatan_rekening_partner" class="control-label mb-1">Keterangan</label>
                <input id="form_keterangan_pencatatan_rekening_partner" name="form_keterangan_pencatatan_rekening_partner" type="text" class="form-control">
            </div>

            <!-- Submit Button -->
            <div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">Submit</span>
                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                </button>
            </div>
        </form>
    </div>
</div>

@include("templatedashboard")
