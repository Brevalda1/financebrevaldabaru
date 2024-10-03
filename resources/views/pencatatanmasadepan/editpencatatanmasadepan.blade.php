
@include("templateleftpanel")
@include("templaterightpanel")

 <!-- Credit Card -->
 <div id="pay-invoice">
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center">pencatatan masa depan</h3>
        </div>
        <hr>
        <form action="/updatepencatatanmasadepanform/{no}" method="post" novalidate="novalidate">
            <div class="form-group text-center">
                @csrf
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">kode pencatatan</label>
                <input id="cc-pament" name="form_kode_pencatatan_biaya_masa_depan" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$kode_pencatatan_biaya_masa_depan}}" readonly>
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Nama Pencatatan</label>
                <input id="cc-pament" name="form_nama_pencatatan_biaya_masa_depan" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$nama_pencatatan_biaya_masa_depan}}">
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Jumlah pencatatan</label>
                <input id="cc-pament" name="form_jumlah_pencatatan_biaya_masa_depan" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$jumlah_pencatatan_biaya_masa_depan}}">
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">harga</label>
                <input id="cc-pament" name="form_harga_pencatatan_biaya_masa_depan" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$harga_pencatatan_biaya_masa_depan}}">
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">keterangan</label>
                <input id="cc-pament" name="form_keterangan_pencatatan_biaya_masa_depan" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$keterangan_pencatatan_biaya_masa_depan}}">
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