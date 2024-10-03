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
        
                            {{-- <a class="btn btn-primary" href="/biayaoperationalproyekform" role="button">tambah data</a> --}}
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Kode</th>
                        <th>Nama Proyek</th>
                        <th>Budget</th>
                        <th>keterangan</th>
                        <th>tanggal</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $data = $datas;
                    @endphp
                    @foreach ( $data as $showbiayaoperationalproyek)
                    <tr>
                      <th scope="row">{{$showbiayaoperationalproyek->kode_biaya_operational_proyek}}</th>
                        <td>{{$showbiayaoperationalproyek->nama_biaya_operational_proyek}}</td>
                        <td>{{$showbiayaoperationalproyek->budget_biaya_operational_proyek}}</td>
                        <td>{{$showbiayaoperationalproyek->keterangan_biaya_operational_proyek}}</td>
                        <td>{{$showbiayaoperationalproyek->tanggal_pelaksanaan_biaya_operational_proyek}}</td>
 
                        <td>
                          <a href="/detailbiayaoperationalproyeka/{{$showbiayaoperationalproyek->kode_biaya_operational_proyek}}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">tambah detil</button></a>
                        <a href="/updatebiayaoperationalproyekform/{{$showbiayaoperationalproyek->kode_biaya_operational_proyek}}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">edit</button></a>
                          <a href="/deletebiayaoperationalproyekform/{{$showbiayaoperationalproyek->kode_biaya_operational_proyek}}" ><button class="btn btn-danger" data-target="#edit" data-toggle="modal">delete</button></a>
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
