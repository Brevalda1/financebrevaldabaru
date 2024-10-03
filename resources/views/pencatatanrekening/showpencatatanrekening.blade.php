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

                            <a class="btn btn-primary" href="/pencatatanrekeningform" role="button">tambah data</a>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>kode pencatatan rekening partner</th>
                        <th>nama perusahaan partner</th>
                        <th>nomor rekening partner</th>
                        <th>kode transfer</th>
                        <th>nama bank</th>
                        <th>keterangan</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $data = $datas;
                      @endphp
                      @foreach ( $data as $showpencatatanrekening)
                      <tr>
                          <th scope="row">{{$showpencatatanrekening->kode_pencatatan_rekening_partner}}</th>
                          <td>{{$showpencatatanrekening->nama_perusahaan_partner}}</td>
                          <td>{{$showpencatatanrekening->nomor_rekening_perusahaan_partner}}</td>
                          <td>{{$showpencatatanrekening->kode_transfer_rekening_perusahaan_partner}}</td>
                          <td>{{$showpencatatanrekening->nama_bank_perusahaan_partner}}</td>
                          <td>{{$showpencatatanrekening->keterangan_pencatatan_rekening_partner}}</td>

                          <td><a href="/updatepencatatanrekeningform/{{$showpencatatanrekening->kode_pencatatan_rekening_partner}}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">edit</button></a>
                            <a href="/deletepencatatanrekeningform/{{$showpencatatanrekening->kode_pencatatan_rekening_partner}}" ><button class="btn btn-danger" data-target="#edit" data-toggle="modal">delete</button></a>
                          
    



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
