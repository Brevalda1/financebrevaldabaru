@include("templateleftpanel")
@include("templaterightpanel")

  

<style>
  body {
      font-family: Arial, sans-serif;
      margin: 20px;
  }
  .pagination {
      display: flex;
      justify-content: center;
      list-style-type: none;
      padding: 0;
  }
  .pagination li {
      margin: 0 5px;
  }
  .pagination a {
      text-decoration: none;
      padding: 10px 15px;
      border: 1px solid #007bff;
      color: #007bff;
      border-radius: 5px;
  }
  .pagination a:hover {
      background-color: #007bff;
      color: white;
  }
  .pagination .active a {
      background-color: #007bff;
      color: white;
      border: 1px solid #007bff;
  }
  .container {
      max-width: 800px;
      margin: auto;
  }
</style>

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
                            <strong class="card-title"><h1>ReportOperational</h1></strong><br>
                            
                    <h4>Kode Perusahaan : {{$kodeperus}}</h4>
                    <h4>Total Pengeluaran Gaji pegawai : Rp{{$sum}}</h4>
                    <h4>Total Pengeluaran Biaya Non Budgeting : Rp{{$nonbudget}}</h4>
                    <h4>Total Semua : Rp{{$totalsemua}}</h4>

                            {{-- <a class="btn btn-primary" href="/biayapribadiform" role="button">tambah data</a> --}}
                          </div>
                        <div class="card-body">
                          {{-- <h4>kode : {{$kode_biaya_pribadi}}</h4>
                          <h4>nama : {{$nama_biaya_pribadi}}</h4>
                          <h4>satuan : {{$satuan_biaya_pribadi}}</h4>
                          <h4>harga : {{$harga_biaya_pribadi}}</h4>
                          <h4>tanggal : {{$tanggal_biaya_pribadi}}</h4>
                          <h4>jumlah : {{$jumlah_biaya_pribadi}}</h4>
                          <img src="{{asset('biayaPribadiBukti').'/'.$bukti_biaya_pribadi}}">
                          <h4> action : </h4>
                          <td><a href="/approvalbiayapribadiformaccept/{{$kode_biaya_pribadi}}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">Terima</button></a>
                            <a href="/approvalbiayapribadiformdecline/{{$kode_biaya_pribadi}}" ><button class="btn btn-danger" data-target="#edit" data-toggle="modal">Tolak</button></a>
                          <img src="{{asset('BiayaPribadiBukti').'/'.$showbiayapribadi->bukti_biaya_pribadi}}" width='50' height='50'></td> --}}

                  {{-- <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>kode</th>
                        <th>Nama biaya</th>
                        <th>satuan</th>
                        <th>harga</th>
                        <th>tanggal</th>
                        <th>jumlah</th>
                        <th>bukti</th>
                        <th>approved by </th>
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
                  </table> --}}
                  <h4>berikut detil dari Gaji pegawai : </h4>
                  <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive">
                  
                    <thead>
                      <tr>
                        <th>ID Pegawai</th>
                        <th>Nomor Ktp Pegawai</th>
                        <th>Nama Pegawai</th>
                        <th>Jumlah Kehadiran Pegawai</th>
                        <th>rate gaji pegawai</th>
                        <th>tambahan lain-lain</th>
                        <th>keterangan</th>
                        <th>total</th>
                        <th>jabatan</th>
                        <th>nomor rekening</th>
                        <th>nama bank</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $datas = $data;
                      @endphp
                      @foreach ( $datas as $showgajipegawai)
                      <tr>
                        <th scope="row">{{$showgajipegawai->id_pegawai_gaji}}</th>
                          <td>{{$showgajipegawai->nomor_ktp_pegawai_gaji}}</td>
                          <td>{{$showgajipegawai->nama_pegawai_gaji}}</td>
                          <td>{{$showgajipegawai->jumlah_kehadiran_pegawai_gaji}}</td>
                          <td>{{$showgajipegawai->rate_pegawai_gaji}}</td>
                          <td>{{$showgajipegawai->tambahan_lainlain_pegawai_gaji}}</td>
                          <td>{{$showgajipegawai->keterangan_pegawai_gaji}}</td>
                          <td>{{$showgajipegawai->total_pegawai_gaji}}</td>
                          <td>{{$showgajipegawai->jabatan_pegawai_gaji}}</td>
                          <td>{{$showgajipegawai->nomor_rekening_pegawai_gaji}}</td>
                          <td>{{$showgajipegawai->nama_bank_pegawai_gaji}}</td>
                

                          
                            
    



                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
<!-- Pagination -->
<ul class="pagination">
  @if ($data->onFirstPage())
      <li class="disabled"><span>&laquo;</span></li>
  @else
      <li><a href="{{ $data->previousPageUrl() }}">&laquo;</a></li>
  @endif

  @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
      @if ($page == $data->currentPage())
          <li class="active"><a href="#">{{ $page }}</a></li>
      @else
          <li><a href="{{ $url }}">{{ $page }}</a></li>
      @endif
  @endforeach

  @if ($data->hasMorePages())
      <li><a href="{{ $data->nextPageUrl() }}">&raquo;</a></li>
  @else
      <li class="disabled"><span>&raquo;</span></li>
  @endif
</ul>
</div>

                  <h4>berikut detil dari Biaya Non budgeting : </h4>
                  <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive">
                  
                    <thead>
                      <tr>
                        <th>ID Pegawai</th>
                        <th>Nomor Ktp Pegawai</th>
                        <th>Nama Pegawai</th>
                        <th>Jumlah Kehadiran Pegawai</th>
                        <th>rate gaji pegawai</th>
                        <th>tambahan lain-lain</th>
                        <th>keterangan</th>
                        <th>total</th>
                        <th>jabatan</th>
                        <th>nomor rekening</th>
                        <th>nama bank</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $datas = $data2;
                      @endphp
                      @foreach ( $datas as $showbiayaoperationalnonbudgeting)
                      <tr>
                        <th scope="row">{{$showbiayaoperationalnonbudgeting->kode_operational_non_budgeting}}</th>
                          <td>{{$showbiayaoperationalnonbudgeting->nama_operational_non_budgeting}}</td>
                          <td>{{$showbiayaoperationalnonbudgeting->keterangan_operational_non_budgeting}}</td>
                          <td>{{$showbiayaoperationalnonbudgeting->tanggal_operational_non_budgeting}}</td>
                          <td>{{$showbiayaoperationalnonbudgeting->biaya_operational_non_budgeting}}</td>
                          <td>
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
