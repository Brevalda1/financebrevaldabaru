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
                    
                            {{-- <a class="btn btn-primary" href="/biayapribadiform" role="button">tambah data</a> --}}
                          </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>kode</th>
                        <th>Nama biaya</th>
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
                    @foreach ( $data as $showbiayapribadi)
                    <tr>
                      <th scope="row">{{$showbiayapribadi->kode_biaya_pribadi}}</th>
                        <td>{{$showbiayapribadi->nama_biaya_pribadi}}</td>
                        <td>{{$showbiayapribadi->satuan_biaya_pribadi}}</td>
                        <td>{{$showbiayapribadi->harga_biaya_pribadi}}</td>
                        <td>{{$showbiayapribadi->tanggal_biaya_pribadi}}</td>
                        <td>{{$showbiayapribadi->jumlah_biaya_pribadi}}</td>
                        <td>
                          <img src="{{asset('BiayaPribadiBukti').'/'.$showbiayapribadi->bukti_biaya_pribadi}}" width='50' height='50'></td>

                          
              
                        <td><a href="/approvalbiayapribadiformaccept/{{$showbiayapribadi->kode_biaya_pribadi}}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">Terima</button></a>
                          <a href="/approvalbiayapribadiformdecline/{{$showbiayapribadi->kode_biaya_pribadi}}" ><button class="btn btn-danger" data-target="#edit" data-toggle="modal">Tolak</button></a>
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
