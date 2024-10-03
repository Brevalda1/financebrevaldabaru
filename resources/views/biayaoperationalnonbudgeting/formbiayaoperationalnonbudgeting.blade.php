
@include("templateleftpanel")
@include("templaterightpanel")

 <!-- Credit Card -->
 <div id="pay-invoice">
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center">Biaya operational non budgeting</h3>
        </div>
        <hr>
        <form action="" method="post" novalidate="novalidate">
            <div class="form-group text-center">
           @csrf
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">kode biaya operational non budgeting</label>
                <input id="cc-pament" name="form_kode_operational_non_budgeting" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$kode}}"readonly>
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">nama biaya</label>
                <input id="cc-pament" name="form_nama_operational_non_budgeting" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">keterangan</label>
                <input id="cc-pament" name="form_keterangan_operational_non_budgeting" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">tanggal</label>
                <input id="cc-pament" name="form_tanggal_operational_non_budgeting" type="date" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">biaya</label>
                <input id="cc-pament" name="form_biaya_operational_non_budgeting" type="text" class="form-control" aria-required="true" aria-invalid="false" >
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