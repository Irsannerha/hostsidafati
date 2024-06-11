<x-admin-app>
    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title font-weight-bold">
                                <h4>Taslab</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item font-weight-bold h5">
                                        <a href="/">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                                    Tendik, Asmik, Dan Laboran
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
                            <button class="btn btn-primary font-weight-bold" onclick="exportToPDF()">Cetak</button>
                            <button class="btn btn-primary font-weight-bold" onclick="exportToExcel()">Excel</button>
                            <button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#ImportModal">Import</button>
                        </div>
                        <a href="{{ route('superadmin.taslab.create') }}" class="btn btn-primary font-weight-bold"><i class="fa fa-plus"></i> Tambah Data</a>
                        
                    </div>
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">#</th>
                                    <th>Nama</th>
                                    <th>Unit Kerja</th>
                                    <th>Pendidikan</th>
                                    <th>Terhitung Mulai Tanggal</th>
                                    <th class="datatable-nosort">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($taslab as $taslab)
                                <tr>
                                    <td class="table-plus">{{ $loop->iteration }}</td>
                                    <td><span class="btn btn-outline-primary btn-lg" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">{{ $taslab->nama }}</span></td>
                                    <td>{{ $taslab->unit_kerja }}</td>
                                    <td>{{ $taslab->pendidikan }}</td>
                                    <td>
                                    <?php
                                        $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                                        $tmt = \Carbon\Carbon::parse($taslab->tmt);
                                        $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tmt->format('F'));
                                        echo $tmt->format('d') . ' ' . $bulan_indo . ' ' . $tmt->format('Y');
                                        ?>
                                    </td>
                                    
                                  @include('admin.taslab.show')
                                    <td>
                                        <div class="table-actions">
                                            <a class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff" data-toggle="modal" data-target="#showModal{{ $taslab->id }}">
                                                <i class="icon-copy dw dw-eye"></i> Lihat
                                            </a>
                                            <a href="{{ route('superadmin.taslab.edit', $taslab->id) }}" class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff">
                                                <i class="icon-copy dw dw-edit2"></i> Edit
                                            </a>
                                            <a class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff" data-toggle="modal" data-target="#deleteModal{{ $taslab->id }}">
                                                <i class="icon-copy dw dw-delete-3"></i> Hapus
                                            </a>
                                   @include('admin.taslab.delete')
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