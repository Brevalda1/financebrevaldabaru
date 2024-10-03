
@include("templateleftpanel")
@include("templaterightpanel")

 <!-- Credit Card -->
 <div id="pay-invoice">
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center">Biaya Lain Lain</h3>
        </div>
        <hr>
        <form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
            <div class="form-group text-center">
           @csrf
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Kode biaya Lain Lain</label>
                <input id="cc-pament" name="form_kode_biaya_lainlain" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$kode}}"readonly >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">jenis pengeluaran</label>
                <input id="cc-pament" name="form_nama_biaya_lainlain" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">jumlah</label>
                <input id="cc-pament" name="form_satuan_biaya_lainlain" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">harga</label>
                <input id="cc-pament" name="form_harga_biaya_lainlain" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">tanggal</label>
                <input id="cc-pament" name="form_tanggal_biaya_lainlain" type="date" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">jumlah</label>
                <input id="cc-pament" name="form_jumlah_biaya_lainlain" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Bukti : </label></div>
                <div class="col-12 col-md-9"><input type="file" id="file-input" name="form_bukti_biaya_lainlain" class="form-control-file"></div>
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