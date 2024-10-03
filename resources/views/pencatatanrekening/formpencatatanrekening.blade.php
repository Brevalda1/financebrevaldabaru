
@include("templateleftpanel")
@include("templaterightpanel")

 <!-- Credit Card -->
 <div id="pay-invoice">
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center">pencatatan rekening</h3>
        </div>
        <hr>
        <form action="" method="post" novalidate="novalidate">
            <div class="form-group text-center">
                @csrf
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Kode Rekening</label>
                <input id="cc-pament" name="form_kode_pencatanan_rekening_partner" type="text" class="form-control" aria-required="true" aria-invalid="false"  value="{{$kode}}"readonly>
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Nama perusahaan</label>
                <input id="cc-pament" name="form_nama_perusahaan_partner" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">nomor rekening</label>
                <input id="cc-pament" name="form_nomor_rekening_perusahaan_partner" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Kode Transfer</label>
                <input id="cc-pament" name="form_kode_transfer_rekening_perusahaan_partner" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">nama bank</label>
                <input id="cc-pament" name="form_nama_bank_perusahaan_partner" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">keterangan</label>
                <input id="cc-pament" name="form_keterangan_pencatatan_rekening_partner" type="text" class="form-control" aria-required="true" aria-invalid="false" >
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
</div> <!-- .card -->
@include("templatedashboard")