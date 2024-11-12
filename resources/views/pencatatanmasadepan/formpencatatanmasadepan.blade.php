@include("templateleftpanel")
@include("templaterightpanel")

<!-- Credit Card -->
<div id="pay-invoice" class="px-4">
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center">pencatatan masa depan</h3>
        </div>
        <hr>
        <form action="" method="post" novalidate="novalidate">
            <div class="form-group text-center">
                @csrf
            </div>
            
            <!-- Tambahkan row dan col untuk layout 2 kolom -->
            <div class="row">
                <!-- Kode pencatatan full width -->
                <div class="col-12">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">kode pencatatan</label>
                        <input id="cc-pament" name="form_kode_pencatatan_biaya_masa_depan" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$kode}}" readonly>
                    </div>
                </div>
                
                <!-- Nama pencatatan full width -->
                <div class="col-12">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Nama Pencatatan</label>
                        <input id="cc-pament" name="form_nama_pencatatan_biaya_masa_depan" type="text" class="form-control" aria-required="true" aria-invalid="false">
                    </div>
                </div>
                
                <!-- Input lainnya tetap 2 kolom -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Jumlah pencatatan</label>
                        <input id="cc-pament" name="form_jumlah_pencatatan_biaya_masa_depan" type="text" class="form-control" aria-required="true" aria-invalid="false">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">harga</label>
                        <input id="cc-pament" name="form_harga_pencatatan_biaya_masa_depan" type="text" class="form-control" aria-required="true" aria-invalid="false">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">keterangan</label>
                        <input id="cc-pament" name="form_keterangan_pencatatan_biaya_masa_depan" type="text" class="form-control" aria-required="true" aria-invalid="false">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Tanggal</label>
                        <input id="cc-pament" name="form_tanggal_pencatatan_biaya_masa_depan" type="date" class="form-control" aria-required="true" aria-invalid="false">
                    </div>
                </div>
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