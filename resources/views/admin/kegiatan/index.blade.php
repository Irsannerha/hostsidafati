<x-admin-app>
    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title font-weight-bold">
                                <h4>Izin Kegiatan Mahasiswa HIMA</h4>
                            </div>
                            <nav aria-lalubi="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item font-weight-bold h5">
                                        <a href="/">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                                    Izin Kegiatan Mahasiswa HIMA
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
                <!-- Summary Counts Start -->
                <div class="row pb-10">
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-30 text-dark" id="countSemua">0</div>
                                    <div class="font-17 text-dark weight-500">
                                        Semua
                                    </div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#00eccf">
                                        <i class="icon-copy ion-ios-paper-outline"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-30 text-dark" id="countSelesai">0</div>
                                    <div class="font-17 text-dark weight-500">
                                        Selesai
                                    </div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#09cc06">
                                        <i class="icon-copy ion-android-checkmark-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-30 text-dark" id="countDiproses">0</div>
                                    <div class="font-17 text-dark weight-500">
                                        Diproses
                                    </div>
                                </div>
                                <div class="widget-icon" data-color="#ffc107">
                                    <div class="icon">
                                        <i class="icon-copy ion-android-sync"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-30 text-dark" id="countDitolak">0</div>
                                    <div class="font-17 text-dark weight-500">Ditolak</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#dc3545">
                                        <i class="icon-copy ion-android-cancel"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Summary Counts End -->
                <!-- Simple Datatable start -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <div class="btn-group btn-group-toggle font-weight-400" data-toggle="buttons">
                            <button class="btn btn-primary font-weight-bold" onclick="exportToExcel()">Excel</button>
                        </div>
                        <div class="btn-group btn-group-toggle font-weight-400" data-toggle="buttons" style="float: right;">
                            <button class="btn btn-dark btn-sm font-weight-bold" type="button" onclick="filterByStatus('Semua')">Semua</button>
                            <button class="btn btn-success btn-sm font-weight-bold" type="button" onclick="filterByStatus('Selesai')">Selesai</button>
                            <button class="btn btn-warning btn-sm font-weight-bold" type="button" onclick="filterByStatus('Diproses')">Diproses</button>
                            <button class="btn btn-danger btn-sm font-weight-bold" type="button" onclick="filterByStatus('Ditolak')">Ditolak</button>
                        </div>
                    </div>
                    <div class="pb-20">
                        <table id="dataTable" class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">#</th>
                                    <th>Program Studi</th>
                                    <th>Nama Pemohon</th>
                                    <th>Status</th>
                                    <th class="datatable-nosort">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kegiatan as $atan)
                                <tr data-status="{{ $atan->status }}">
                                    <td class="table-plus">{{ $loop->iteration }}</td>
                                    <td>{{ $atan->prodi ? $atan->prodi->prodi : '' }}</td>
                                    <td><span class="btn btn-outline-primary btn-lg" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">{{ $atan->email }}</span></td>
                                    <td>
                                        @if($atan->status == 'Selesai')
                                            <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Selesai</span>
                                        @elseif($atan->status == 'Diproses')
                                            <span class="badge badge-warning" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Diproses</span>
                                        @else
                                            <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ditolak</span>
                                        @endif
                                    </td>
                                    @include('admin.kegiatan.show')
                                    <td>
                                        <div class="table-actions">
                                            <a class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff" data-toggle="modal" data-target="#showModal{{ $atan->id }}">
                                                <i class="icon-copy dw dw-eye"></i> Lihat
                                            </a>
                                            @if (Auth::user()->role == 'superadmin')
                                            <a href="{{ route('superadmin.kegiatan.edit', $atan->id) }}" class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff">
                                                @elseif(Auth::user()->role == 'kemahasiswaan')
                                            <a href="{{ route('kemahasiswaan.kegiatan.edit', $atan->id) }}" class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff">
                                            @endif
                                                <i class="icon-copy dw dw-edit2"></i> Edit
                                            </a>
                                            <a class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff" data-toggle="modal" data-target="#deleteModal{{ $atan->id }}">
                                                <i class="icon-copy dw dw-delete-3"></i> Hapus
                                            </a>
                                      @include('admin.kegiatan.delete')      
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const countStatuses = () => {
            const rows = document.querySelectorAll('#dataTable tbody tr');
            let countSelesai = 0;
            let countDiproses = 0;
            let countDitolak = 0;
            
            rows.forEach(row => {
                const status = row.getAttribute('data-status');
                if (status === 'Selesai') {
                    countSelesai++;
                } else if (status === 'Diproses') {
                    countDiproses++;
                } else if (status === 'Ditolak') {
                    countDitolak++;
                }
            });

            document.getElementById('countSelesai').textContent = countSelesai;
            document.getElementById('countDiproses').textContent = countDiproses;
            document.getElementById('countDitolak').textContent = countDitolak;
            document.getElementById('countSemua').textContent = rows.length;
        };

        countStatuses();
    });

    function filterByStatus(status) {
        const rows = document.querySelectorAll('#dataTable tbody tr');
        rows.forEach(row => {
            const rowStatus = row.getAttribute('data-status');
            if (status === 'Semua' || rowStatus === status) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>
<script>
    function exportToExcel() {
        window.location.href = "{{ url('kegiatan/export') }}";
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
