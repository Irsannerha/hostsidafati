<x-admin-app>
    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title font-weight-bold">
                                <h4>Rekap Mahasiswa</h4>
                            </div>
                            <nav aria-lalubi="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item font-weight-bold h5">
                                        <a href="/">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                                    Rekap Mahasiswa
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
                <!-- Simple Card-Box start -->
                                            <div class="card-box mb-30">
                                <div class="pd-20">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="btn-group btn-group-toggle font-weight-400" data-toggle="buttons">
                                                <button class="btn btn-primary font-weight-bold" onclick="exportToPDF()">Cetak</button>
                                                <button class="btn btn-primary font-weight-bold" onclick="exportToExcel()">Excel</button>
                                                <button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#ImportModal">Import</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    Tambah Rekap Mahasiswa
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('superadmin.all-rekap.create') }}">
                                                        <i class="fa fa-plus"></i> Tambah Data Jumlah Mahasiswa Aktif dan Mahasiswa PMB
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('superadmin.all-rekap.create') }}">
                                                        <i class="fa fa-plus"></i> Tambah Data Mahasiswa Mengundurkan Diri TS
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('superadmin.all-rekap.create') }}">
                                                        <i class="fa fa-plus"></i> Tambah Data Mahasiswa Dikeluarkan TS
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('superadmin.all-rekap.create') }}">
                                                        <i class="fa fa-plus"></i> Tambah Data Mahasiswa Wafat TS
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('superadmin.all-rekap.create') }}">
                                                        <i class="fa fa-plus"></i> Tambah Data Mahasiswa Lulusan TS
                                                    </a>
                                                    <!-- Tambahkan item dropdown lainnya jika diperlukan -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <div class="row">
                        @foreach($tahun as $t)
                        <div class="col-xl-3 mb-30">
                            <div class="card-box height-100-p widget-style1">
                                <a href="#" class="btn-block" data-toggle="modal" data-target="#showModal{{ $t->id }}" type="button">
                                    <div class="d-flex flex-wrap align-items-center">
                                            <div class="widget-icon pd-10" style="font-size: 45px;">
                                                <div class="icon" data-color="#000">
                                                <i class="icon-copy bi bi-people-fill"></i>
                                                </div>
                                            </div>
                                        <div class="widget-data">
                                            <div class="h4 mb-0 text-dark">TS - {{ $t->tahun_semester }}</div>
                                            <div class="weight-600 font-14">{{ $t->tahun }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                <!-- Simple Card-Box End -->
            </div>
        </div>
    </div>
    <!-- Datatable Setting js -->
    <script src="{{ asset('vendors/scripts/datatable-setting.js') }}"></script>
    @foreach($tahun as $t)
    <div class="modal fade bs-example-modal-lg" id="showModal{{ $t->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content" data-bgcolor="#d0d0d0">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Rekap Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="pd-10 card-box card-hdr">
                        <div class="scrollable-table">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Program Studi</th>
                                        <th colspan="2">Jumlah Mahasiswa Aktif TS 2022/2024 + Mahasiswa PMB 2023</th>
                                        <th rowspan="2">Jumlah Total</th>
                                        <th colspan="2">Mahasiswa Mengundurkan Diri TS 2023/2024</th>
                                        <th rowspan="2">Jumlah</th>
                                        <th colspan="2">Mahasiswa Dikeluarkan TS 2023/2024</th>
                                        <th rowspan="2">Jumlah</th>
                                        <th colspan="2">Mahasiswa Wafat TS 2023/2024</th>
                                        <th rowspan="2">Jumlah</th>
                                        <th colspan="12">Lulusan TS 2023/2024</th>
                                        <th rowspan="2">Jumlah</th>
                                        <th rowspan="2">Jumlah Lulusan Mahasiswa TA. 2023/2024</th>
                                        <th rowspan="2">Mahasiswa Aktif TS 2023/2024 (Gabungan TS 2023/2023)</th>
                                    </tr>
                                    <tr>
                                        <th>2022/2023</th>
                                        <th>2023</th>
                                        <th>Genap</th>
                                        <th>Ganjil</th>
                                        <th>Genap</th>
                                        <th>Ganjil</th>
                                        <th>Genap</th>
                                        <th>Ganjil</th>
                                        <th>Jan</th>
                                        <th>Feb</th>
                                        <th>Mar</th>
                                        <th>Apr</th>
                                        <th>Mei</th>
                                        <th>Jun</th>
                                        <th>Jul</th>
                                        <th>Ags</th>
                                        <th>Sept</th>
                                        <th>Okt</th>
                                        <th>Nov</th>
                                        <th>Des</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total_mhs_aktif = 0;
                                        $total_undur_diri = 0;
                                        $total_mhs_keluar = 0;
                                        $total_mhs_wafat = 0;
                                        $total_lulusan = 0;
                                    @endphp

                                    @foreach($allrekap as $rekap)
                                    <tr>
                                        <td>{{ $rekap->prodi->prodi }}</td>

                                        <!-- Data Mahasiswa Aktif -->
                                        @php
                                            $total_mhs_aktif = $rekap->jumlah_mhs_aktif_ts + $rekap->jumlah_mhs_aktif_th;
                                        @endphp
                                        <td>{{ $rekap->jumlah_mhs_aktif_ts }}</td>
                                        <td>{{ $rekap->jumlah_mhs_aktif_th }}</td>
                                        <td>{{ $total_mhs_aktif }}</td>

                                        <!-- Data Mahasiswa Mengundurkan Diri -->
                                        @php
                                            $total_undur_diri = $rekap->mhs_undur_diri_genap + $rekap->mhs_undur_diri_ganjil;
                                        @endphp
                                        <td>{{ $rekap->mhs_undur_diri_genap }}</td>
                                        <td>{{ $rekap->mhs_undur_diri_ganjil }}</td>
                                        <td>{{ $total_undur_diri }}</td>

                                        <!-- Data Mahasiswa Dikeluarkan -->
                                        @php
                                            $total_mhs_keluar = $rekap->mhs_keluar_genap + $rekap->mhs_keluar_ganjil;
                                        @endphp
                                        <td>{{ $rekap->mhs_keluar_genap }}</td>
                                        <td>{{ $rekap->mhs_keluar_ganjil }}</td>
                                        <td>{{ $total_mhs_keluar }}</td>

                                        <!-- Data Mahasiswa Wafat -->
                                        @php
                                            $total_mhs_wafat = $rekap->mhs_wafat_genap + $rekap->mhs_wafat_ganjil;
                                        @endphp
                                        <td>{{ $rekap->mhs_wafat_genap }}</td>
                                        <td>{{ $rekap->mhs_wafat_ganjil }}</td>
                                        <td>{{ $total_mhs_wafat }}</td>

                                        <!-- Data Lulusan -->
                                        @php
                                            $total_lulusan = $rekap->mhs_lulus_januari + $rekap->mhs_lulus_februari + $rekap->mhs_lulus_maret + $rekap->mhs_lulus_april + $rekap->mhs_lulus_mei + $rekap->mhs_lulus_juni + $rekap->mhs_lulus_juli + $rekap->mhs_lulus_agustus + $rekap->mhs_lulus_september + $rekap->mhs_lulus_oktober + $rekap->mhs_lulus_november + $rekap->mhs_lulus_desember;
                                        @endphp
                                        <td>{{ $rekap->mhs_lulus_januari }}</td>
                                        <td>{{ $rekap->mhs_lulus_februari }}</td>
                                        <td>{{ $rekap->mhs_lulus_maret }}</td>
                                        <td>{{ $rekap->mhs_lulus_april }}</td>
                                        <td>{{ $rekap->mhs_lulus_mei }}</td>
                                        <td>{{ $rekap->mhs_lulus_juni }}</td>
                                        <td>{{ $rekap->mhs_lulus_juli }}</td>
                                        <td>{{ $rekap->mhs_lulus_agustus }}</td>
                                        <td>{{ $rekap->mhs_lulus_september }}</td>
                                        <td>{{ $rekap->mhs_lulus_oktober }}</td>
                                        <td>{{ $rekap->mhs_lulus_november }}</td>
                                        <td>{{ $rekap->mhs_lulus_desember }}</td>
                                        <td>{{ $total_lulusan }}</td>

                                        <!-- Data Lulusan TA -->
                                        <td>{{ $rekap->mhs_lulus_ta }}</td>

                                        <!-- Jumlah Total -->
                                        @php 
                                            $all_total = $total_mhs_aktif + $total_undur_diri + $total_mhs_keluar + $total_mhs_wafat + $total_lulusan;
                                        @endphp
                                        <td>{{ $all_total }}</td>
                                    </tr>
                                    @endforeach

                                    <!-- Total Keseluruhan -->
                                    <tr>
                                        <td>Jumlah Total</td>
                                        <td>{{ $allrekap->sum('jumlah_mhs_aktif_ts') }}</td>
                                        <td>{{ $allrekap->sum('jumlah_mhs_aktif_th') }}</td>
                                        <td>{{ $allrekap->sum('jumlah_mhs_aktif_ts') + $allrekap->sum('jumlah_mhs_aktif_th') }}</td>
                                        <td>{{ $allrekap->sum('mhs_undur_diri_genap') }}</td>
                                        <td>{{ $allrekap->sum('mhs_undur_diri_ganjil') }}</td>
                                        <td>{{ $allrekap->sum('mhs_undur_diri_genap') + $allrekap->sum('mhs_undur_diri_ganjil') }}</td>
                                        <td>{{ $allrekap->sum('mhs_keluar_genap') }}</td>
                                        <td>{{ $allrekap->sum('mhs_keluar_ganjil') }}</td>
                                        <td>{{ $allrekap->sum('mhs_keluar_genap') + $allrekap->sum('mhs_keluar_ganjil') }}</td>
                                        <td>{{ $allrekap->sum('mhs_wafat_genap') }}</td>
                                        <td>{{ $allrekap->sum('mhs_wafat_ganjil') }}</td>
                                        <td>{{ $allrekap->sum('mhs_wafat_genap') + $allrekap->sum('mhs_wafat_ganjil') }}</td>
                                        <td>{{ $allrekap->sum('mhs_lulus_januari') }}</td>
                                        <td>{{ $allrekap->sum('mhs_lulus_februari') }}</td>
                                        <td>{{ $allrekap->sum('mhs_lulus_maret') }}</td>
                                        <td>{{ $allrekap->sum('mhs_lulus_april') }}</td>
                                        <td>{{ $allrekap->sum('mhs_lulus_mei') }}</td>
                                        <td>{{ $allrekap->sum('mhs_lulus_juni') }}</td>
                                        <td>{{ $allrekap->sum('mhs_lulus_juli') }}</td>
                                        <td>{{ $allrekap->sum('mhs_lulus_agustus') }}</td>
                                        <td>{{ $allrekap->sum('mhs_lulus_september') }}</td>
                                        <td>{{ $allrekap->sum('mhs_lulus_oktober') }}</td>
                                        <td>{{ $allrekap->sum('mhs_lulus_november') }}</td>
                                        <td>{{ $allrekap->sum('mhs_lulus_desember') }}</td>
                                        <td>{{ $allrekap->sum('mhs_lulus_januari') + $allrekap->sum('mhs_lulus_februari') + $allrekap->sum('mhs_lulus_maret') + $allrekap->sum('mhs_lulus_april') + $allrekap->sum('mhs_lulus_mei') + $allrekap->sum('mhs_lulus_juni') + $allrekap->sum('mhs_lulus_juli') + $allrekap->sum('mhs_lulus_agustus') + $allrekap->sum('mhs_lulus_september') + $allrekap->sum('mhs_lulus_oktober') + $allrekap->sum('mhs_lulus_november') + $allrekap->sum('mhs_lulus_desember') }}</td>
                                        <td>{{ $allrekap->sum('mhs_lulus_ta') }}</td>
                                        <td>{{ $allrekap->sum('jumlah_mhs_aktif_ts') + $allrekap->sum('jumlah_mhs_aktif_th') + $allrekap->sum('mhs_undur_diri_genap') + $allrekap->sum('mhs_undur_diri_ganjil') + $allrekap->sum('mhs_keluar_genap') + $allrekap->sum('mhs_keluar_ganjil') + $allrekap->sum('mhs_wafat_genap') + $allrekap->sum('mhs_wafat_ganjil') + $allrekap->sum('mhs_lulus_januari') + $allrekap->sum('mhs_lulus_februari') + $allrekap->sum('mhs_lulus_maret') + $allrekap->sum('mhs_lulus_april') + $allrekap->sum('mhs_lulus_mei') + $allrekap->sum('mhs_lulus_juni') + $allrekap->sum('mhs_lulus_juli') + $allrekap->sum('mhs_lulus_agustus') + $allrekap->sum('mhs_lulus_september') + $allrekap->sum('mhs_lulus_oktober') + $allrekap->sum('mhs_lulus_november') + $allrekap->sum('mhs_lulus_desember') + $allrekap->sum('mhs_lulus_ta') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Kelola Data</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

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
<style>
        .scrollable-table {
            overflow-x: auto;
        }
        table {
            border-collapse: collapse;
            overflow-x: auto;
        }
        table, th, td {
            border: 1.5px solid #d4d4d4;
            
        }
        th, td {
            padding: 8px;
            font-weight: bold;
            font-family: Roboto Condensed,  sans-serif;
            text-align: center;
        }
        th {
            background-color: #142127;
            color: white;
            text-align: center;
        }
        .modal-lg {
        max-width: 95%;
      max-height: 80%;
      margin: 1.95rem auto;
    }
    </style>
</x-admin-app>