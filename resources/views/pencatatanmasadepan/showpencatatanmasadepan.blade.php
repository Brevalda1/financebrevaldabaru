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
                            <strong class="card-title">daftar rekening perusahaan</strong>

                            <a class="btn btn-primary" href="/pencatatanmasadepanform" role="button">tambah data</a>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Kode Pencatatan</th>
                        <th>Nama pencatatan</th>
                        <th>jumlah pencatatan</th>
                        <th>harga</th>
                        <th>keterangan</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $data = $datas;
                    @endphp
                      @foreach ( $data as $showpencatatanmasadepan)
                      <tr>
                          <th scope="row">{{$showpencatatanmasadepan->kode_pencatatan_biaya_masa_depan }}</th>
                          <td>{{$showpencatatanmasadepan->nama_pencatatan_biaya_masa_depan}}</td>
                          <td>{{$showpencatatanmasadepan->jumlah_pencatatan_biaya_masa_depan}}</td>
                          <td>{{$showpencatatanmasadepan->harga_pencatatan_biaya_masa_depan}}</td>
                          <td>{{$showpencatatanmasadepan->keterangan_pencatatan_biaya_masa_depan}}</td>

                          <td><a href="/updatepencatatanmasadepanform/{{$showpencatatanmasadepan->kode_pencatatan_biaya_masa_depan}}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">edit</button></a>
                            <a href="/deletepencatatanmasadepanform/{{$showpencatatanmasadepan->kode_pencatatan_biaya_masa_depan}}" ><button class="btn btn-danger" data-target="#edit" data-toggle="modal">delete</button></a>
                          
    



                      </tr>
                      @endforeach
                      
                     
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div>
            @include("templatedashboard")
