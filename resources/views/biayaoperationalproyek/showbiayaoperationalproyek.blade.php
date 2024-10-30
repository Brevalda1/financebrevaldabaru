@include("templateleftpanel")
@include("templaterightpanel")

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <!-- Main Content -->
            <div class="col-md-12">
                <div class="card">

                    <!-- Card Header -->
                    <div class="card-header">
                        <div class="row align-items-center">
                            <!-- Left Side: Title and Tambah Data Button -->
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <strong class="card-title mr-3">Biaya Operational Proyek</strong>
                                    {{-- <a class="btn btn-primary" href="/biayaoperationalproyekform" role="button">Tambah Data</a> --}}
                                </div>
                            </div>

                            <!-- Right Side: Search Form -->
                            <div class="col-md-6 text-right">
                                <!-- Search Form -->
                                <form method="GET" action="{{ url()->current() }}" class="form-inline d-inline-block">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" value="{{ $search ?? '' }}" placeholder="Cari...">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Data Table -->
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Proyek</th>
                                    <th>Budget</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $showbiayaoperationalproyek)
                                    <tr>
                                        <td>{{ $showbiayaoperationalproyek->kode_biaya_operational_proyek }}</td>
                                        <td>{{ $showbiayaoperationalproyek->nama_biaya_operational_proyek }}</td>
                                        <td>{{ $showbiayaoperationalproyek->budget_biaya_operational_proyek }}</td>
                                        <td>{{ $showbiayaoperationalproyek->keterangan_biaya_operational_proyek }}</td>
                                        <td>{{ $showbiayaoperationalproyek->tanggal_pelaksanaan_biaya_operational_proyek }}</td>
                                        <td>
                                            <a href="/detailbiayaoperationalproyeka/{{ $showbiayaoperationalproyek->kode_biaya_operational_proyek }}" class="btn btn-info">Tambah Detil</a>
                                            {{-- <a href="/updatebiayaoperationalproyekform/{{ $showbiayaoperationalproyek->kode_biaya_operational_proyek }}" class="btn btn-info">Edit</a>
                                            <a href="/deletebiayaoperationalproyekform/{{ $showbiayaoperationalproyek->kode_biaya_operational_proyek }}" class="btn btn-danger">Delete</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination Links Centered -->
                        <div class="d-flex justify-content-center">
                            {{ $datas->appends(request()->input())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

        </div>
    </div>
    @include("templatedashboard")
</div>
