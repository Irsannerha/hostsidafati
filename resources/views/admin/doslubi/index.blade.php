<x-admin-app>
    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title font-weight-bold">
                                <h4>Dosen Luar Biasa NIDK</h4>
                            </div>
                            <nav aria-lalubi="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item font-weight-bold h5">
                                        <a href="/">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                                    Dosen Luar Biasa
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
                            <button class="btn btn-primary font-weight-bold" onclick="exportToExcel()">Excel</button>
                            <button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#ImportModal">Import</button>
                        </div>
                        @if (Auth::user()->role == 'superadmin')
                        <a href="{{ route('superadmin.doslubi.create') }}" class="btn btn-primary font-weight-bold"><i class="fa fa-plus"></i> Tambah Data</a>
                        @elseif (Auth::user()->role == 'pegawai')
                        <a href="{{ route('pegawai.doslubi.create') }}" class="btn btn-primary font-weight-bold"><i class="fa fa-plus"></i> Tambah Data</a>
                        @endif
                    </div>
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">#</th>
                                    <th>Program Studi</th>
                                    <th>Nama</th>
                                    <th>NUP/NIDK</th>
                                    <th class="datatable-nosort">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doslubi as $doslubi)
                                <tr>
                                    <td class="table-plus">{{ $loop->iteration }}</td>
                                    <td>{{ $doslubi->prodi->prodi }}</td>
                                    <td><span class="btn btn-outline-primary btn-lg" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">{{ $doslubi->nama }}</span></td>
                                    <td>{{ $doslubi->nup_nidk }}</td>
                                    @include('admin.doslubi.show')
                                    <td>
                                        <div class="table-actions">
                                            <a class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff" data-toggle="modal" data-target="#showModal{{ $doslubi->id }}">
                                                <i class="icon-copy dw dw-eye"></i> Lihat
                                            </a>
                                            @if (Auth::user()->role == 'superadmin')
                                            <a href="{{ route('superadmin.doslubi.edit', $doslubi->id) }}" class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff">
                                            @elseif (Auth::user()->role == 'pegawai')
                                            <a href="{{ route('pegawai.doslubi.edit', $doslubi->id) }}" class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff">
                                            @endif
                                                <i class="icon-copy dw dw-edit2"></i> Edit
                                            </a>
                                            <a class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff" data-toggle="modal" data-target="#deleteModal{{ $doslubi->id }}">
                                                <i class="icon-copy dw dw-delete-3"></i> Hapus
                                            </a>
                                   @include('admin.doslubi.delete')
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
                            <a href="{{ asset('assets/templateImport/template_doslubi.xlsx') }}" class="btn btn-primary" download>
                                <i class="fa fa-download"></i> Download
                            </a>
                        </div>
                        <div class="form-group">
                            <form action="{{ route('doslubi.import') }}" method="POST" enctype="multipart/form-data">
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
    <!-- Datatable Setting js -->
    <script src="{{ asset('vendors/scripts/datatable-setting.js') }}"></script>
    <script>
    function exportToExcel() {
        window.location.href = "{{ url('doslubi/export') }}";
    }
    </script>
    <!-- Sweet Alert -->
    @if(session('success_create_data'))
    <script>
        swal(
                {
                    position: 'center',
                    type: 'success',
                    title: "{{ session('success_create_data') }}",
                    showConfirmButton: false,
                    timer: 3000
                }
            )
    </script>
    @endif

    @if(session('success_delete_data'))
    <script>
         swal(
                {
                    position: 'center',
                    type: 'success',
                    title: "{{ session('success_delete_data') }}",
                    showConfirmButton: false,
                    timer: 3000
                }
            )
    </script>
    @endif

    @if(session('success_edit_data'))
    <script>
        swal(
            {
                position: 'center',
                type: 'success',
                title: "{{ session('success_edit_data') }}",
                showConfirmButton: false,
                timer: 2000
            }
        )
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
</x-admin-app>