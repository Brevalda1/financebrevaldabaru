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
                        <h4>Kode : {{ $kode_biaya_detail_operational_proyek }}</h4>
                        <h4>Nama : {{ $nama_biaya_detail_biaya_operational_proyek }}</h4>
                        <h4>Harga : Rp{{ is_numeric($harga_detail_biaya_operational_proyek) ? number_format($harga_detail_biaya_operational_proyek, 0, ',', '.') : '0' }}</h4>
                        <h4>Jumlah : {{ is_numeric($jumlah_detail_biaya_operational_proyek) ? number_format($jumlah_detail_biaya_operational_proyek, 0, ',', '.') : '0' }}</h4>
                        <img src="{{ asset('DetailBiayaOperationalProyek') . '/' . $bukti_detail_biaya_operational_proyek }}" alt="Bukti" style="width:auto; height:auto;">
                        <h4>Action:</h4>
                        <a href="/approvalbiayaproyekformaccept/{{ $kode_biaya_detail_operational_proyek }}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">Terima</button></a>
                        <a href="/approvalbiayaproyekformdecline/{{ $kode_biaya_detail_operational_proyek }}" ><button class="btn btn-danger" data-target="#edit" data-toggle="modal">Tolak</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("templatedashboard")
