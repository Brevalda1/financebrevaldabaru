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
                            <strong class="card-title">Pegawai</strong>
                            
                            <a class="btn btn-primary" href="/pegawaiform" role="button">tambah data</a>
                            
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive">
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>Nama Pegawai</th>
                        <th>role</th>
                        <th>nomor telp pegawai	</th>
                        <th>jabatan pegawai</th>
                        <th>kode perusahaan</th>
                        <th>action</th>
           
                        
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $data = $datas;
                      @endphp
                      @foreach ( $data as $showpegawai)
                      <tr>
                        <th scope="row">{{$showpegawai->username}}</th>
                          <td>{{$showpegawai->nama_pegawai}}</td>
                          <td>{{$showpegawai->role}}</td>
                          <td>{{$showpegawai->nomor_telp_pegawai}}</td>
                          <td>{{$showpegawai->jabatan_pegawai}}</td>
                          <td>{{$showpegawai->kode_perusahaan}}</td>
                        
                          <td><a href="/updatepegawaiform/{{$showpegawai->username}}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">edit</button></a>
                            <a href="/deletepegawaiform/{{$showpegawai->username}}" ><button class="btn btn-danger" data-target="#edit" data-toggle="modal">delete</button></a>
                            
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
          
            @include("templatedashboard")
