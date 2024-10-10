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
                            <strong class="card-title">Gaji pegawai</strong>
                            
                            <a class="btn btn-primary" href="/gajipegawaiform" role="button">tambah data</a>
                            <div class="form-group">
                           
                            </div>
                        </div>
                        {{-- <div class="card-body">
                          <label for="cc-payment" class="control-label mb-1">cari</label>
                              <input id="form_id_pegawai_gaji" name="form_id_pegawai_gaji" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                        <br>
                           
     
                              <select name="form_role" id="select" class="form-control">
                                <option value="id_pegawai_gaji">ID pegawai</option>
                                <option value="nomor_ktp_pegawai_gaji">Nomor Ktp</option>
                                <option value="nama_pegawai_gaji">nama pegawai </option>
                  
                              </select><br>
                              <a class="btn btn-primary" href="/gajipegawaiform" role="button">search</a>  <br> --}}
                               <!-- Form Pencarian -->
                               <div class="card-body">  
        <div class="search-box">
          <form action="{{ url('/gajipegawai') }}" method="GET">
              <input type="text" name="search" placeholder="Cari nama pegawai..." value="{{ $search }}">
              <input type="hidden" name="kodeidpegawai" value="{{ $kodeidpegawai }}">
              <button type="submit" class="btn btn-primary">Cari</button>
          </form>
      </div>
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
                        <th>action</th>
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
                
                          <td><a href="/updategajipegawaiform/{{$showgajipegawai->id_pegawai_gaji}}" ><button class="btn btn-info" data-target="#edit" data-toggle="modal">edit</button></a>
                            <a href="/deletegajipegawaiform/{{$showgajipegawai->id_pegawai_gaji}}" ><button class="btn btn-danger" data-target="#edit" data-toggle="modal">delete</button></a>
                            

                          
                            
    



                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>

            
                </div>
         
            </div>
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
            @include("templatedashboard")
            {{-- {{ $data->links() }} --}}