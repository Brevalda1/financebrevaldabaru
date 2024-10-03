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
                            <strong class="card-title">biaya operational proyek</strong>
                            <div class="row">
                              <div class="col-md-3">
                            <h5></h5>
                          </div>
                          <div class="col-md-3">
                            <h5></h5>
                          </div>
                          <div class="col-md-3">
                            <h5></h5>
                          </div>
                          <div class="col-md-3">
                            <h5>{{$sum}}/{{$budget}}</h5>
                          </div>
                            </div>
                            <a class="btn btn-primary" href="/detailbiayaoperationalproyekform/{{$kodeperus}}" role="button">tambah data</a>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Kode</th>
                        <th>Nama Proyek</th>
                        <th>jumlah</th>
                        <th>harga</th>
                        <th>bukti</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $data = $datas;
                    @endphp
                    @foreach ( $data as $showdetailbiayaoperationalproyek)
                    <tr>
                      <th scope="row">{{$showdetailbiayaoperationalproyek->kode_biaya_detail_operational_proyek}}</th>
                        <td>{{$showdetailbiayaoperationalproyek->nama_biaya_detail_biaya_operational_proyek}}</td>
                        <td>{{$showdetailbiayaoperationalproyek->jumlah_detail_biaya_operational_proyek}}</td>
                        <td>{{$showdetailbiayaoperationalproyek->harga_detail_biaya_operational_proyek}}</td>
                        
                        <td>
                          <img src="{{asset('DetailBiayaOperationalProyek').'/'.$showdetailbiayaoperationalproyek->bukti_detail_biaya_operational_proyek}}" width='50' height='50'></td>
                        <td>
                       
                        <a href="/updatedetailbiayaoperationalproyekform/{{$showdetailbiayaoperationalproyek->kode_biaya_detail_operational_proyek.'/'.$kodeperus}}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">edit</button></a>
                          <a href="/deletedetailbiayaoperationalproyekform/{{$showdetailbiayaoperationalproyek->kode_biaya_detail_operational_proyek}}" ><button class="btn btn-danger" data-target="#edit" data-toggle="modal">delete</button></a>
                        </td>

                        @endforeach
                      </tr>
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div>
            @include("templatedashboard")
