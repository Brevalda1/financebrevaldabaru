@include("templateleftpanel")
@include("templaterightpanel")

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Approval Biaya Pribadi</strong>
                    </div>
                    <div class="card-body">
                        <h4>Kode : {{ $kode_biaya_pribadi }}</h4>
                        <h4>Nama : {{ $nama_biaya_pribadi }}</h4>
                        <h4>Satuan : {{ $satuan_biaya_pribadi }}</h4>
                        <h4>Harga : Rp{{ is_numeric($harga_biaya_pribadi) ? number_format($harga_biaya_pribadi, 0, ',', '.') : '0' }}</h4>
                        <h4>Tanggal : {{ $tanggal_biaya_pribadi }}</h4>
                        <h4>Jumlah : {{ is_numeric($jumlah_biaya_pribadi) ? number_format($jumlah_biaya_pribadi, 0, ',', '.') : '0' }}</h4>
                        <img src="{{ asset('biayaPribadiBukti') . '/' . $bukti_biaya_pribadi }}" alt="Bukti" style="width:auto; height:auto;">
                        <h4>Action:</h4>
                        <a href="/approvalbiayapribadiformaccept/{{ $kode_biaya_pribadi }}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">Terima</button></a>
                        <a href="/approvalbiayapribadiformdecline/{{ $kode_biaya_pribadi }}" ><button class="btn btn-danger" data-target="#edit" data-toggle="modal">Tolak</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("templatedashboard")
