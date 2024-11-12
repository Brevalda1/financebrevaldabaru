@include("templateleftpanel")
@include("templaterightpanel")

<!-- Credit Card -->
<div id="pay-invoice" class="px-5">
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center">Biaya operational proyek</h3>
        </div>
        <hr>
        <form action="" method="post" novalidate="novalidate">
            <div class="form-group text-center">
                @csrf
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Kode proyek</label>
                <input id="cc-pament" name="form_kode_biaya_operational_proyek" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$kode}}"readonly>
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Nama Proyek</label>
                <input id="cc-pament" name="form_nama_biaya_operational_proyek" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">budget</label>
                        <input id="cc-pament" name="form_budget_biaya_operational_proyek" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">tanggal pelaksanaan</label>
                        <input id="cc-pament" name="form_tanggal_pelaksanaan_biaya_operational_proyek" type="date" class="form-control" aria-required="true" aria-invalid="false" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">keterangan proyek</label>
                <input id="cc-pament" name="form_keterangan_biaya_operational_proyek" type="text" class="form-control" aria-required="true" aria-invalid="false" >
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