<x-admin-app>
  <div class="mobile-menu-overlay"></div>
  <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
        <div class="page-header">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="title font-weight-bold">
                <h4>Mahasiswa Dikeluarkan TS</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item font-weight-bold h5">
                    <a href="/">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                    Mahasiswa Dikeluarkan TS
                  </li>
                </ol>
              </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
              <div class="time">
                <button id="dateTime" class="btn btn-primary font-weight-bold" type="button" data-toggle="dropdown">
                  <span id="currentDateTime"></span>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
          <div class="pd-20">
            <div class="btn-group btn-group-toggle font-weight-400" data-toggle="buttons">
              <button class="btn btn-primary" onclick="exportToPDF()">Cetak</button>
              <button class="btn btn-primary" onclick="exportToExcel()">Excel</button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ImportModal">Import</button>
            </div>
            <a href="{{ route('superadmin.keluar.create') }}" class="btn btn-primary font-weight-bold"><i class="fa fa-plus"></i> Tambah Data</a>
          </div>
          <div class="pb-20">
            <table class="data-table table stripe hover nowrap">
              <thead>
                <tr>
                  <th class="table-plus datatable-nosort">#</th>
                  <th>TS</th>
                  <th>Jumlah Total</th>
                  <th class="datatable-nosort">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($keluar->groupBy('tahun_id') as $out => $items)
                @php
                $tahun = $items->first()->tahun;
                @endphp
                <tr>
                  <td class="table-plus">{{ $loop->iteration }}</td>
                  <td><span class="btn btn-dark btn-lg" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 14px;">TS {{ $tahun->tahun }}/{{ $tahun->tahun + 1 }}</span></td>
                  <td><span class="btn btn-success btn-lg" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 14px;">{{ $total[$out-1]->total }}</span></td>
                  <td>
                    <div class="dropdown">
                      <a class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff" data-toggle="modal" data-toggle="modal" data-target="#showModal{{ $out }}"><i class="dw dw-eye"></i> Detail </a>
                      <!-- Ini Modal Mahasiswa Undur diri -->
                      <div class="modal fade bs-example-modal-lg" id="showModal{{ $out }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                          <div class="modal-content" data-bgcolor="#d0d0d0">
                            <div class="modal-header">
                              <h4 class="modal-title" id="myLargeModalLabel"><i class="fa fa-paperclip" aria-hidden="true"></i> Mahasiswa Dikeluarkan TS {{ $tahun->tahun }}/{{ $tahun->tahun + 1 }}</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                              <div class="pd-10 card-box card-hdr">
                                <div class="scrollable-table">
                                    <table class="table table-striped">
                                      <thead>
                                          <tr>
                                              <th>#</th>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Program Studi</th></span>  
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Genap</th></span>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Ganjil</th></span>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Jumlah Total</th></span>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Aksi</th></span>
                                              <!-- Tambahkan bagian lain sesuai kebutuhan -->
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @php
                                            $grand_total_mhs_keluar = 0;
                                            $total_mhs_keluar_genap = 0;
                                            $total_mhs_keluar_ganjil = 0;
                                            $index = 0;
                                        @endphp

                                        @foreach($keluar as $outs)
                                            @if($outs->tahun_id == $out)
                                                @php
                                                    $index++;
                                                    $total_mhs_keluar = $outs->mhs_keluar_genap + $outs->mhs_keluar_ganjil;
                                                    $grand_total_mhs_keluar += $total_mhs_keluar;
                                                    $total_mhs_keluar_genap += $outs->mhs_keluar_genap;
                                                    $total_mhs_keluar_ganjil += $outs->mhs_keluar_ganjil;
                                                @endphp
                                                <tr>
                                                    <td>{{ $index }}</td>
                                                    <td class="font-weight-bold">{{ $outs->prodi->prodi }}</td>
                                                    <td>{{ $outs->mhs_keluar_genap }}</td>
                                                    <td>{{ $outs->mhs_keluar_ganjil }}</td>
                                                    <td>{{ $total_mhs_keluar }}</td>
                                                    <td>
                                                  <a href="{{ route('superadmin.keluar.edit', $outs->id ) }}" class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff">
                                                    <i class="icon-copy dw dw-edit2"></i> Edit
                                                  </a>
                                                  <a class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff" data-toggle="modal" data-target="#deleteModal{{ $outs->id }}">
                                                    <i class="icon-copy dw dw-delete-3"></i> Hapus
                                                  </a>
                                                  @include('admin.keluar.delete', ['outs' => $outs])
                                                </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                        <!-- Total keseluruhan -->
                                        <tr>
                                            <td></td>
                                            <td class="font-weight-bold"><strong>Total Data FTI</strong></td>
                                            <td><strong class="badge badge-success btn-sm">{{ $total_mhs_keluar_genap }}</strong></td>
                                            <td><strong class="badge badge-success btn-sm">{{ $total_mhs_keluar_ganjil }}</strong></td>
                                            <td><strong class="badge badge-success btn-sm">{{ $grand_total_mhs_keluar }}</strong></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                  <!-- Ini Modal Mahasiswa undur Diri TS -->
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- Simple Datatable End -->
      </div>
    </div>
  </div>
  <!-- Datatable Setting js -->
  <script src="{{ asset('vendors/scripts/datatable-setting.js') }}"></script>
  <style>
    .modal-lg {
      max-width: 70%;
      max-height: 90%;
      margin: 1.95rem auto;
    }
  </style>
</x-admin-app>

<!-- Sweet Alert -->
@if(session('success_create_data'))
<script>
  swal({
    position: 'center',
    type: 'success',
    title: "{{ session('success_create_data') }}",
    showConfirmButton: false,
    timer: 3000
  })
</script>
@endif

@if(session('success_update_data'))
<script>
  swal({
    position: 'center',
    type: 'success',
    title: "{{ session('success_update_data') }}",
    showConfirmButton: false,
    timer: 3000
  })
</script>
@endif

@if(session('success_delete_data'))
<script>
  swal({
    position: 'center',
    type: 'success',
    title: "{{ session('success_delete_data') }}",
    showConfirmButton: false,
    timer: 3000
  })
</script>
@endif

<!-- End Sweet Alert -->