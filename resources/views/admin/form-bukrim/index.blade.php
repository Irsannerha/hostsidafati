<x-admin-app>
    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title font-weight-bold">
                                <h4>Tanda Bukti Penerimaan Berkas</h4>
                            </div>
                            <nav aria-lalubi="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item font-weight-bold h5">
                                        <a href="/">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                                    Tanda Bukti Penerimaan Berkas
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
                            <!-- <button class="btn btn-primary font-weight-bold" onclick="exportToPDF()">Cetak</button> -->
                            <button class="btn btn-primary font-weight-bold" onclick="exportToExcel()">Excel</button>
                            <!-- <button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#ImportModal">Import</button> -->
                        </div>
                    </div>
                    <div class="pb-20">
                        <table id="dataTable" class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">#</th>
                                    <th>Program Studi</th>
                                    <th>Nama Dokumen</th>
                                    <th>Nama Pengambil Dokumen</th>          
                                    <th class="datatable-nosort">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($formbukrim as $bukrim)
                                <tr>
                                    <td class="table-plus">{{ $loop->iteration }}</td>
                                    <td>{{ $bukrim->prodi ? $bukrim->prodi->prodi : '' }}</td>
                                    <td>{{ $bukrim->nama_dok }}</td>
                                    <td>{{ $bukrim->nama }}</td>
                                   @include('admin.form-bukrim.show')
                                    <td>
                                        <div class="table-actions">
                                            <a class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff" data-toggle="modal" data-target="#showModal{{ $bukrim->id }}">
                                                <i class="icon-copy dw dw-eye"></i> Lihat
                                            </a>
                                            <a href="{{ route('superadmin.form-bukrim.edit', $bukrim->id) }}" class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff">
                                                <i class="icon-copy dw dw-edit2"></i> Edit
                                            </a>
                                            <a class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff" data-toggle="modal" data-target="#deleteModal{{ $bukrim->id }}">
                                                <i class="icon-copy dw dw-delete-3"></i> Hapus
                                            </a>
                                    @include('admin.form-bukrim.delete')
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
    <script>
    function exportToExcel() {
        window.location.href = "{{ url('formbukrim/export') }}";
    }
</script>
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

@if(session('success_update_data'))
    <script>
        swal(
            {
                position: 'center',
                type: 'success',
                title: "{{ session('success_update_data') }}",
                showConfirmButton: false,
                timer: 2000
            }
        )
    </script>
@endif

<!-- End Sweet Alert -->
