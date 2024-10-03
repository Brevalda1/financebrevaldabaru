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
                            <strong class="card-title">Manajemen Perusahaan</strong>
                            
                            <a class="btn btn-primary" href="/manajemenperusahaanform" role="button">tambah data</a>
                            
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive">
                    <thead>
                      <tr>
                        <th>Kode perusahaan</th>
                        <th>Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th>nomor telp perusahaan	</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $data = $datas;
                      @endphp
                      @foreach ( $data as $showmanajemenperusahaan)
                      <tr>
                        <th scope="row">{{$showmanajemenperusahaan->kode_perusahaan}}</th>
                          <td>{{$showmanajemenperusahaan->nama_perusahaan}}</td>
                          <td>{{$showmanajemenperusahaan->alamat_perusahaan}}</td>
                          <td>{{$showmanajemenperusahaan->nomor_telp_perusahaan}}</td>
                     
                        
                          <td><a href="/updatemanajemenperusahaanform/{{$showmanajemenperusahaan->kode_perusahaan}}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">edit</button></a>
                            <a href="/deletemanajemenperusahaanform/{{$showmanajemenperusahaan->kode_perusahaan}}" ><button class="btn btn-danger" data-target="#edit" data-toggle="modal">delete</button>

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
