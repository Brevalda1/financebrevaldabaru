
@include("templateleftpanel")
@include("templaterightpanel")

 <!-- Credit Card -->
 <div id="pay-invoice">
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center">Manajemen Perusahaan</h3>
        </div>
        <hr>
        <form action="/updatemanajemenperusahaanform/{no}" method="post" novalidate="novalidate">
            @csrf
            <div class="form-group text-center">
           
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Kode Perusahaan</label>
                <input id="form_id_pegawai_gaji" name="form_kode_perusahaan" type="text" class="form-control" aria-required="true" aria-invalid="false"  value="{{$kode_perusahaan}}" readonly>
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Nama Perusahaan</label>
                <input id="form_nomor_ktp_pegawai_gaji" name="form_nama_perusahaan" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$nama_perusahaan}}">
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Alamat Perusahaan</label>
                <input id="form_nama_pegawai_gaji" name="form_alamat_perusahaan" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$alamat_perusahaan}}">
            </div>
        
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">nomor telp perusahaan</label>
                <input id="form_jumlah_kehadiran_pegawai_gaji" name="form_nomor_telp_perusahaan" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$nomor_telp_perusahaan}}">
            </div>
     
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