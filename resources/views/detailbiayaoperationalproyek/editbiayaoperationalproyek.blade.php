
@include("templateleftpanel")
@include("templaterightpanel")

 <!-- Credit Card -->
 <div id="pay-invoice">
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center">Biaya operational proyek</h3>
        </div>
        <hr>
        <form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
            <div class="form-group text-center">
                @csrf
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Kode proyek</label>
                <input id="cc-pament" name="form_kode_biaya_detail_operational_proyek" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$kode_biaya_detail_operational_proyek}}" readonly>
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Nama Proyek</label>
                <input id="cc-pament" name="form_nama_biaya_detail_operational_proyek" type="text" class="form-control" aria-required="true" aria-invalid="false"  value="{{$nama_biaya_detail_biaya_operational_proyek}}" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">jumlah</label>
                <input id="cc-pament" name="form_jumlah_detail_biaya_operational_proyek" type="text" class="form-control" aria-required="true" aria-invalid="false"  value="{{$jumlah_detail_biaya_operational_proyek}}">
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">harga</label>
                <input id="cc-pament" name="form_harga_detail_biaya_operational_proyek" type="text" class="form-control" aria-required="true" aria-invalid="false"  value="{{$harga_detail_biaya_operational_proyek}}">
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Bukti : </label></div>
                <div class="col-12 col-md-9"><input type="file" id="file-input" name="form_bukti_detail_biaya_operational_proyek" class="form-control-file"  value="{{$bukti_detail_biaya_operational_proyek}}"></div>
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
        <div>
            <a href="{{url('/detailbiayaoperationalproyeka/'.$kodeperus)}}"><button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                <i class="fa fa-lock fa-lg"></i>&nbsp;
                <span id="payment-button-amount" >back</span>
                <span id="payment-button-sending" style="display:none;">Sending…</span>
            </button></a>
            
        </div>
    </div>
</div>

</div>
</div> <!-- .card -->
@include("templatedashboard")