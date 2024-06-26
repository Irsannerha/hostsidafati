<x-admin-app>
<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title font-weight-bold">
                            <h4>Tahun Semester</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item font-weight-bold h5">
                                    <a href="/">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                                Tahun Semester
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
                    @if(Auth::user()->role == 'superadmin')
                    <a href="{{ route('superadmin.tahun.create') }}" class="btn btn-primary font-weight-bold"><i class="fa fa-plus"></i> Tambah Tahun</a>
                    @elseif(Auth::user()->role == 'akademik')
                    <a href="{{ route('akademik.tahun.create') }}" class="btn btn-primary font-weight-bold"><i class="fa fa-plus"></i> Tambah Tahun</a>
                    @endif
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">#</th>
                                <th>Tahun Semester</th>
                                <th>Tahun</th>
                                <th class="datatable-nosort">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ts as $tahun)
                            <tr>
                                <td class="table-plus">{{ $loop->iteration }}</td>
                                <td><span class="btn btn-outline-primary btn-lg" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 14px;">{{ $tahun->ts }}</span></td>
                                <td><span class="btn btn-outline-primary btn-lg" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 14px;"> {{ explode('/', $tahun->ts)[1] }}</span></td>
                                
                                <td>
                                <div class="table-actions">
                                @if(Auth::user()->role == 'superadmin')
                                <a href="{{ route('superadmin.tahun.edit', $tahun->id) }}" class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff">
                                @elseif(Auth::user()->role == 'akademik')
                                <a href="{{ route('akademik.tahun.edit', $tahun->id) }}" class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff">
                                @endif
                                    <i class="icon-copy dw dw-edit2"></i> Edit
                                </a>
                                <a class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff" data-toggle="modal" data-target="#deleteModal{{ $tahun->id }}">
                                   <i class="icon-copy dw dw-delete-3"></i> Hapus
                                </a>
                                @include('admin.tahun.delete')
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
</x-admin-app>

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

<!-- End Sweet Alert -->