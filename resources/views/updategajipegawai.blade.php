
@include("templateleftpanel")
@include("templaterightpanel")

 <!-- Credit Card -->
 @foreach ($dataproduk as $item) 
 <div id="pay-invoice">
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center">Update Gaji pegawai</h3>
        </div>
        <hr>
        <form action="" method="post" novalidate="novalidate">
            @csrf
            <div class="form-group text-center">
           
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">ID pegawai</label>
                <input id="form_id_pegawai_gaji" name="form_id_pegawai_gaji" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Nomor Ktp</label>
                <input id="form_nomor_ktp_pegawai_gaji" name="form_nomor_ktp_pegawai_gaji" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Nama Pegawai</label>
                <input id="form_nama_pegawai_gaji" name="form_nama_pegawai_gaji" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Jabatan</label>
                <input id="form_jabatan_pegawai_gaji" name="form_jabatan_pegawai_gaji" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Jumlah jam kerja</label>
                <input id="form_jumlah_kehadiran_pegawai_gaji" name="form_jumlah_kehadiran_pegawai_gaji" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Rate Pegawai</label>
                <input id="form_rate_pegawai_gaji" name="form_rate_pegawai_gaji" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Tambahan Lain-Lain</label>
                <input id="form_tambahan_lainlain_pegawai_gaji" name="form_tambahan_lainlain_pegawai_gaji" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Keterangan</label>
                <input id="form_keterangan_pegawai_gaji" name="form_keterangan_pegawai_gaji" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Total</label>
                <input id="form_total_pegawai_gaji" name="form_total_pegawai_gaji" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Nomor Rekening</label>
                <input id="form_nomor_rekening_pegawai_gaji" name="form_nomor_rekening_pegawai_gaji" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Nama Bank</label>
                <input id="form_nama_bank_pegawai_gaji" name="form_nama_bank_pegawai_gaji" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="row">
                
            </div>
            <div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">submit</span>
                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                </button>
            </div>
        </form>
    </div>
</div>


</div>
</div> 
@endforeach<!-- .card -->
@include("templatedashboard")