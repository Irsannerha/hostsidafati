<x-admin-app>
  <div class="mobile-menu-overlay"></div>
  <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
        <div class="page-header">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="title font-weight-bold">
                <h4>Mahasiswa Lulusan TS</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item font-weight-bold h5">
                    <a href="/">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                    Mahasiswa Lulusan TS
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
              <button class="btn btn-primary" onclick="exportToExcel()">Excel</button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ImportModal">Import</button>
            </div>
            @if(Auth::user()->role == 'superadmin')
            <a href="{{ route('superadmin.lulus.create') }}" class="btn btn-primary font-weight-bold"><i class="fa fa-plus"></i> Tambah Data</a>
            @elseif (Auth::user()->role == 'akademik')
            <a href="{{ route('akademik.lulus.create') }}" class="btn btn-primary font-weight-bold"><i class="fa fa-plus"></i> Tambah Data</a>
            @endif
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
                @foreach ($groupedLulus as $tsId => $items)
                    @php
                    $tahun = $items->first()->tahun;
                    $totalTs = $totals->firstWhere('ts_id', $tsId);
                    @endphp
                <tr>
                  <td class="table-plus">{{ $loop->iteration }}</td>
                  <!-- <td><span class="btn btn-outline-primary btn-lg" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 14px;">{{ $tahun->tahun_semester }}</span></td>
                  <td><span class="btn btn-outline-primary btn-lg" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 14px;">{{ $tahun->tahun }}</span></td> -->
                  <td><span class="btn btn-dark btn-lg" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 14px;">TS {{ $tahun->ts }}</span></td>
                  <td><span class="btn btn-success btn-lg" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 14px;">{{ $totalTs ? $totalTs->jumlahTotal : 0 }}</span></td>
                  <td>
                    <div class="dropdown">
                      <a class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff" data-toggle="modal" data-toggle="modal" data-target="#showModal{{ $tsId }}"><i class="dw dw-eye"></i> Detail</a>
                      <!-- Ini Modal Mahasiswa Undur diri -->
                      <div class="modal fade bs-example-modal-lg" id="showModal{{ $tsId }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modals modal-dialog-scrollable" role="document">
                          <div class="modal-content" data-bgcolor="#d0d0d0">
                            <div class="modal-header">
                              <h4 class="modal-title" id="myLargeModalLabel"><i class="fa fa-paperclip" aria-hidden="true"></i> Mahasiswa Lulus TS {{ $tahun->ts }}</h4>
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
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Jan</th></span>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Feb</th></span>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Mar</th></span>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Apr</th></span>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Mei</th></span>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Jun</th></span>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Jul</th></span>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Agu</th></span>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Sep</th></span>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Okt</th></span>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Nov</th></span>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Des</th></span>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Jumlah Total</th></span>
                                              <th><span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.4rem 0.7rem; font-size: 0.9rem;">Aksi</th></span>
                                              <!-- Tambahkan bagian lain sesuai kebutuhan -->
                                          </tr>
                                      </thead>
                                      <tbody>
                                      @php
                                        $grand_total_mhs_lulus = 0;
                                        $total_januari = 0;
                                        $total_februari = 0;
                                        $total_maret = 0;
                                        $total_april = 0;
                                        $total_mei = 0;
                                        $total_juni = 0;
                                        $total_juli = 0;
                                        $total_agustus = 0;
                                        $total_september = 0;
                                        $total_oktober = 0; // Added October
                                        $total_november = 0;
                                        $total_desember = 0; // Added December
                                        $index = 0;
                                    @endphp
                                        @foreach($lulus as $ls)
                                            @if($ls->ts_id == $tsId)
                                                @php
                                                $index++;
                                                // Calculate total for each month
                                                $total_januari += $ls->januari;
                                                $total_februari += $ls->februari;
                                                $total_maret += $ls->maret;
                                                $total_april += $ls->april;
                                                $total_mei += $ls->mei;
                                                $total_juni += $ls->juni;
                                                $total_juli += $ls->juli;
                                                $total_agustus += $ls->agustus;
                                                $total_september += $ls->september;
                                                $total_oktober += $ls->oktober;
                                                $total_november += $ls->november;
                                                $total_desember += $ls->desember;
                                                
                                                // Calculate total number of students who graduated in selected months
                                                $total_mhs_lulus = $ls->januari + $ls->februari + $ls->maret + $ls->april + $ls->mei + $ls->juni + $ls->juli + $ls->agustus + $ls->september + $ls->oktober + $ls->november + $ls->desember;
                                                $grand_total_mhs_lulus += $total_mhs_lulus;
                                                @endphp
                                                <tr> 
                                                    <td>{{ $index }}</td>
                                                    <td class="font-weight-bold">{{ $ls->prodi->prodi }}</td>
                                                    <td>{{ $ls->januari }}</td>
                                                    <td>{{ $ls->februari }}</td>
                                                    <td>{{ $ls->maret }}</td>
                                                    <td>{{ $ls->april }}</td>
                                                    <td>{{ $ls->mei }}</td>
                                                    <td>{{ $ls->juni }}</td>
                                                    <td>{{ $ls->juli }}</td>
                                                    <td>{{ $ls->agustus }}</td>
                                                    <td>{{ $ls->september }}</td>
                                                    <td>{{ $ls->oktober }}</td>
                                                    <td>{{ $ls->november }}</td>
                                                    <td>{{ $ls->desember }}</td>
                                                    <td>{{ $total_mhs_lulus }}</td>
                                                    <td>
                                                  @if (Auth::user()->role == 'superadmin')
                                                    <a href="{{ route('superadmin.lulus.edit', $ls->id ) }}" class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff">
                                                    @elseif (Auth::user()->role == 'akademik')
                                                    <a href="{{ route('akademik.lulus.edit', $ls->id ) }}" class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff">
                                                  @endif
                                                    <i class="icon-copy dw dw-edit2"></i> Edit
                                                  </a>
                                                  <a class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff" data-toggle="modal" data-target="#deleteModal{{ $ls->id }}">
                                                    <i class="icon-copy dw dw-delete-3"></i> Hapus
                                                  </a>
                                                  @include('admin.lulus.delete', ['ls' => $ls])
                                                </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                        <!-- Total keseluruhan -->
                                        <tr>
                                            <td></td>
                                            <td class="font-weight-bold"><strong>Total Data FTI</strong></td>
                                            <td><strong class="badge badge-success btn-sm">{{ $total_januari }}</strong></td>
                                            <td><strong class="badge badge-success btn-sm">{{ $total_februari }}</strong></td>
                                            <td><strong class="badge badge-success btn-sm">{{ $total_maret }}</strong></td>
                                            <td><strong class="badge badge-success btn-sm">{{ $total_april }}</strong></td>
                                            <td><strong class="badge badge-success btn-sm">{{ $total_mei }}</strong></td>
                                            <td><strong class="badge badge-success btn-sm">{{ $total_juni }}</strong></td>
                                            <td><strong class="badge badge-success btn-sm">{{ $total_juli }}</strong></td>
                                            <td><strong class="badge badge-success btn-sm">{{ $total_agustus }}</strong></td>
                                            <td><strong class="badge badge-success btn-sm">{{ $total_september }}</strong></td>
                                            <td><strong class="badge badge-success btn-sm">{{ $total_oktober }}</strong></td>
                                            <td><strong class="badge badge-success btn-sm">{{ $total_november }}</strong></td>
                                            <td><strong class="badge badge-success btn-sm">{{ $total_desember }}</strong></td>
                                            <td><strong class="badge badge-success btn-sm">{{ $grand_total_mhs_lulus }}</strong></td>
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
   <!-- Import Modal -->
<div class="modal fade" id="ImportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" data-bgcolor="#d0d0d0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-download" aria-hidden="true"></i> Import Data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <div class="pd-20 card-box card-hdr">
                    <div class="form-group">
                        <h5 class="modal-title">Panduan Import Data</h5>
                        <p>Ikuti langkah-langkah berikut untuk mengimport :</p>
                        <ul>
                            <li>1. Download template excel yang telah disediakan</li>
                            <li>2. Masukkan data sesuai template dari excel yang telah tersedia</li>
                            <li>3. Upload template yang telah diisikan</li>
                            <li>4. Import data dengan klik "Import"</li>
                        </ul>
                        <br>
                        <div class="form-group">
                            <!-- Button download -->
                            <h5 class="modal-title font-weight-bold font-16 text-dark">Template Excel</h5>
                            <a href="{{ asset('assets/templateImport/template_Lulus.xlsx') }}" class="btn btn-primary" download>
                                <i class="fa fa-download"></i> Download
                            </a>
                        </div>
                        <div class="form-group">
                            <form action="{{ route('Lulus.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label>Import file disini</label>
                                <input type="file" name="file" class="form-control-file form-control height-auto" accept=".xlsx, .xls" required>
                                <br>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir box -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
 <!-- End Import Modal -->
  <script src="{{ asset('vendors/scripts/datatable-setting.js') }}"></script>
  <script>
    function exportToExcel() {
        window.location.href = "{{ url('Lulus/export') }}";
    }
</script>
  <style>
    .modals {
      max-width: 80%;
      max-height: 80%;
      margin: 1.5rem auto;
    }
    .modal-dialog {
        overflow-x: initial !important;
    }
    .modal-body {
        overflow-x: auto;
    }
    .scrollable-table {
        width: 100%;
        overflow-x: auto;
        white-space: nowrap; 
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

@if(session('success_import_data'))
    <script>
         swal(
                {
                    position: 'center',
                    type: 'success',
                    title: "{{ session('success_import_data') }}",
                    showConfirmButton: false,
                    timer: 3000
                }
            )
    </script>
@endif

<!-- End Sweet Alert -->