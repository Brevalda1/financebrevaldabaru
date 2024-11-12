@include("templateleftpanel")
@include("templaterightpanel")

<!-- Credit Card -->
<div id="pay-invoice" class="px-5">
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center">Pegawai</h3>
        </div>
        <hr>
        <form action="" method="post" novalidate="novalidate">
            @csrf
            <div class="form-group text-center">
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Username</label>
                <input id="form_id_pegawai_gaji" name="form_username" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Password</label>
                <input id="form_nomor_ktp_pegawai_gaji" name="form_password" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Nama Pegawai</label>
                <input id="form_nama_pegawai_gaji" name="form_nama_pegawai" type="text" class="form-control" aria-required="true" aria-invalid="false" >
            </div>
        
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">nomor telp pegawai</label>
                        <input id="form_jumlah_kehadiran_pegawai_gaji" name="form_nomor_telp_pegawai" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">jabatan Pegawai</label>
                        <input id="form_rate_pegawai_gaji" name="form_jabatan_pegawai" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="select" class="form-control-label">Role</label>
                <select name="form_role" id="select" class="form-control">
                    <option value="pencatattransaksi">pencatat transaksi</option>
                    <option value="approval">approval</option>
                    <option value="admin">admin</option>
                </select>
            </div>

            <div class="form-group">
                <label for="select" class="form-control-label">Perusahaan</label>
                <select name="form_perusahaan" id="select" class="form-control">
                    @foreach ($datas as $data)
                    <option value="{{$data->kode_perusahaan}}">{{$data->nama_perusahaan}}</option>
                    @endforeach
                </select>
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