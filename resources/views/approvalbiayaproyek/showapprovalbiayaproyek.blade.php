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
                        <strong class="card-title">Approval Biaya Operational Proyek</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Proyek</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Bukti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $data = $datas;
                                @endphp
                                @foreach ($data as $showdetailbiayaoperationalproyek)
                                <tr>
                                    <th scope="row">{{ $showdetailbiayaoperationalproyek->kode_biaya_detail_operational_proyek }}</th>
                                    <td>{{ $showdetailbiayaoperationalproyek->nama_biaya_detail_biaya_operational_proyek }}</td>
                                    <td>{{ is_numeric($showdetailbiayaoperationalproyek->jumlah_detail_biaya_operational_proyek) ? number_format($showdetailbiayaoperationalproyek->jumlah_detail_biaya_operational_proyek, 0, ',', '.') : '0' }}</td>
                                    <td>Rp{{ is_numeric($showdetailbiayaoperationalproyek->harga_detail_biaya_operational_proyek) ? number_format($showdetailbiayaoperationalproyek->harga_detail_biaya_operational_proyek, 0, ',', '.') : '0' }}</td>
                                    <td>
                                        <img src="{{ asset('DetailBiayaOperationalProyek') . '/' . $showdetailbiayaoperationalproyek->bukti_detail_biaya_operational_proyek }}" width='50' height='50'>
                                    </td>
                                    <td>
                                        <a href="/approvalbiayaproyekformaccept/{{ $showdetailbiayaoperationalproyek->kode_biaya_detail_operational_proyek }}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">Terima</button></a>
                                        <a href="/approvalbiayaproyekformdecline/{{ $showdetailbiayaoperationalproyek->kode_biaya_detail_operational_proyek }}" ><button class="btn btn-danger" data-target="#edit" data-toggle="modal">Tolak</button></a>
                                        <a href="/approvalbiayaproyekformdetail/{{ $showdetailbiayaoperationalproyek->kode_biaya_detail_operational_proyek }}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">Detail</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("templatedashboard")
