
@include("templateleftpanel")
@include("templaterightpanel")

 <!-- Credit Card -->
 <div id="pay-invoice">
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center">Biaya operational proyek</h3>
        </div>
        <hr>
        <form action="/updatebiayapribadiform/{no}" method="post" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
            <div class="form-group text-center">
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Kode biaya pribadi</label>
                <input id="cc-pament" name="form_kode_biaya_pribadi" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$kode_biaya_pribadi}}" readonly>
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">jenis pengeluaran</label>
                <input id="cc-pament" name="form_nama_biaya_pribadi" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$nama_biaya_pribadi}}">
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">jumlah</label>
                <input id="cc-pament" name="form_satuan_biaya_pribadi" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$satuan_biaya_pribadi}}">
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">harga</label>
                <input id="cc-pament" name="form_harga_biaya_pribadi" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$harga_biaya_pribadi}}">
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">tanggal</label>
                <input id="cc-pament" name="form_tanggal_biaya_pribadi" type="date" class="form-control" aria-required="true" aria-invalid="false" value="{{$tanggal_biaya_pribadi}}">
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">jumlah</label>
                <input id="cc-pament" name="form_jumlah_biaya_pribadi" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$jumlah_biaya_pribadi}}">
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Bukti : </label></div>
                <div class="col-12 col-md-9"><input type="file" id="file-input" name="form_bukti_biaya_pribadi" class="form-control-file" value="{{$bukti_biaya_pribadi}}"></div>
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