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
                            <strong class="card-title">biaya operational non budgeting</strong>

                            <a class="btn btn-primary" href="/biayaoperationalnonbudgetingform" role="button">tambah data</a>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Kode</th>
                        <th>nama</th>
                        <th>keterangan</th>
                        <th>tanggal</th>
                        <th>biaya</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $data = $datas;
                    @endphp
                    @foreach ( $data as $showbiayaoperationalnonbudgeting)
                    <tr>
                      <th scope="row">{{$showbiayaoperationalnonbudgeting->kode_operational_non_budgeting}}</th>
                        <td>{{$showbiayaoperationalnonbudgeting->nama_operational_non_budgeting}}</td>
                        <td>{{$showbiayaoperationalnonbudgeting->keterangan_operational_non_budgeting}}</td>
                        <td>{{$showbiayaoperationalnonbudgeting->tanggal_operational_non_budgeting}}</td>
                        <td>{{$showbiayaoperationalnonbudgeting->biaya_operational_non_budgeting}}</td>
                        <td>
                        <a href="/updatebiayaoperationalnonbudgetingform/{{$showbiayaoperationalnonbudgeting->kode_operational_non_budgeting}}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">edit</button></a>
                          <a href="/deletebiayaoperationalnonbudgetingform/{{$showbiayaoperationalnonbudgeting->kode_operational_non_budgeting}}" ><button class="btn btn-danger" data-target="#edit" data-toggle="modal">delete</button></a>
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
