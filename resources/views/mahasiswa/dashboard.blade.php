<x-mahasiswa-app>
    <div class="mobile-menu-overlay"></div>
    <div class="main-container">

        <!-- <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Hello, world! This is a toast message.
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div> -->

        <div class="">
            <div class="">
                <div class="bg-primary-main rounded-11 py-[31px] px-6 mb-4 mt-3">
                    <div class="">
                        <h4 class="text-white">Dashboard</h4>
                        <!-- <div class="col-md-6 col-sm-12 text-right">
                            <div class="time">
                                <button id="dateTime" class="btn btn-primary font-weight-bold" type="button"
                                    data-toggle="dropdown">
                                    <span id="currentDateTime"></span>
                                </button>
                            </div>
                        </div> -->
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
                            <button class="btn btn-primary font-weight-bold" onclick="exportToPDF()">Cetak</button>
                            <button class="btn btn-primary font-weight-bold" onclick="exportToExcel()">Excel</button>
                            <!-- <button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#ImportModal">Import</button> -->
                        </div>
                        <div class="btn-group btn-group-toggle font-weight-400" data-toggle="buttons"
                            style="float: right;">
                            <button class="btn btn-dark btn-sm font-weight-bold" type="button"
                                onclick="filterByStatus('Semua')">Semua</button>
                            <button class="btn btn-success btn-sm font-weight-bold" type="button"
                                onclick="filterByStatus('Selesai')">Selesai</button>
                            <button class="btn btn-warning btn-sm font-weight-bold" type="button"
                                onclick="filterByStatus('Diproses')">Diproses</button>
                            <button class="btn btn-danger btn-sm font-weight-bold" type="button"
                                onclick="filterByStatus('Ditolak')">Ditolak</button>
                        </div>
                        <div class="pb-20 pt-20">
                            <table id="dataTable" class="data-table table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort">No</th>
                                        <th>Jenis Pengajuan</th>
                                        <th>Status</th>
                                        <th class="datatable-nosort">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($formta as $ta)
                                        <tr data-status="{{ $ta->status }}">
                                            <td class="table-plus">{{ $loop->iteration }}</td>
                                            <td>{{ $ta->keperluan }}</td>
                                            <td>
                                                @if($ta->status == 'Selesai')
                                                    <span class="badge badge-success"
                                                        style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Selesai</span>
                                                @elseif($ta->status == 'Diproses')
                                                    <span class="badge badge-warning"
                                                        style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Diproses</span>
                                                @else
                                                    <span class="badge badge-danger"
                                                        style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ditolak</span>
                                                @endif
                                            </td>
                                            @include('mahasiswa.form-ta.show')
                                            <td>
                                                <div class="table-action">
                                                    <a class="btn btn-xxs btn-primary mr-1"
                                                        style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;"
                                                        data-color="#fff" data-toggle="modal"
                                                        data-target="#showModal{{ $ta->id }}">
                                                        <i class="icon-copy dw dw-eye"></i> Lihat
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
            window.location.href = "{{ url('prodi/export') }}";
        }
    </script>
    @include('mahasiswa.form-krs.select')
</x-mahasiswa-app>

<script>
    // let toastContent = document.querySelector('.toast');
    // const toast = new bootstrap.Toast(toastContent).show();

    document.addEventListener('DOMContentLoaded', function () {
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