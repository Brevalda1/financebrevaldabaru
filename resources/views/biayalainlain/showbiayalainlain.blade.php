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
                            <strong class="card-title">biaya lain lain</strong>

                            <a class="btn btn-primary" href="/biayalainlainform" role="button">tambah data</a>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>kode biaya lainlain</th>
                        <th>Nama Biaya lainlain</th>
                        <th>satuan</th>
                        <th>harga</th>
                        <th>tanggal</th>
                        <th>jumlah</th>
                        <th>bukti</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $data = $datas;
                    @endphp
                    @foreach ( $data as $showbiayalainlain)
                    <tr>
                      <th scope="row">{{$showbiayalainlain->kode_biaya_lainlain}}</th>
                        <td>{{$showbiayalainlain->nama_biaya_lainlain}}</td>
                        <td>{{$showbiayalainlain->satuan_biaya_lainlain}}</td>
                        <td>{{$showbiayalainlain->harga_biaya_lainlain}}</td>
                        <td>{{$showbiayalainlain->tanggal_biaya_lainlain}}</td>
                        <td>{{$showbiayalainlain->jumlah_biaya_lainlain}}</td>
                        <td>
                          <img src="{{asset('BiayaLainLainBukti').'/'.$showbiayalainlain->bukti_biaya_lainlain}}" width='50' height='50'></td>
                        <td><a href="/updatebiayalainlainform/{{$showbiayalainlain->kode_biaya_lainlain}}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">edit</button></a>
                          <a href="/deletebiayalainlainform/{{$showbiayalainlain->kode_biaya_lainlain}}" ><button class="btn btn-danger" data-target="#edit" data-toggle="modal">delete</button></a>
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
