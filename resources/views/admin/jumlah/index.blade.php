<x-admin-app>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title font-weight-bold">
                                <h4>Jumlah Mahasiswa Aktif TS + Gabungan TS</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item font-weight-bold h5">
                                        <a href="/">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                                        Jumlah Mahasiswa Aktif TS + Gabungan TS
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
                
                <!-- Table to display data -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <div class="pb-20">
                            <table class="data-table table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort">#</th>
                                        <th>Tahun Semester</th>
                                        <th class="datatable-nosort">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataPerTahunSemester as $item)
                                    <tr>
                                        <td class="table-plus">{{ $loop->iteration }}</td>
                                        <td>
                                            <span class="btn btn-outline-primary btn-lg" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 14px;">
                                                TS {{ $item->tahun ?? 'N/A' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff" data-toggle="modal" data-target="#showModal{{ $item->ts_id }}">
                                                    <i class="dw dw-eye"></i> Detail
                                                </a>
                                                <!-- Modal for Total Active Students + Combined TS -->
                                                <div class="modal fade bs-example-modal-lg" id="showModal{{ $item->ts_id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                        <div class="modal-content" data-bgcolor="#d0d0d0">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myLargeModalLabel">
                                                                    <i class="fa fa-paperclip" aria-hidden="true"></i> Jumlah Hasil Mahasiswa Aktif TS {{ $item->tahun ?? 'N/A' }} (Gabungan TS {{ substr($item->tahun, 0, 4) - 1 }}/{{ substr($item->tahun, 5, 4) - 1 }})
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="pd-10 card-box card-hdr">
                                                                    <div class="scrollable-table">
                                                                        <table class="table table-striped">
                                                                        <thead>
                                                                        <tr>
                                                                            <th class="table-dark">#</th>
                                                                            <th class="table-dark">Program Studi</th>
                                                                            <th class="table-dark">Jumlah Total Aktif + PMB</th>
                                                                            <th class="table-dark">Jumlah Total Undur Diri</th>
                                                                            <th class="table-dark">Jumlah Total Dikeluarkan</th>
                                                                            <th class="table-dark">Jumlah Total Wafat</th>
                                                                            <th class="table-dark">Jumlah Total Lulus</th>
                                                                            <th class="table-dark">Jumlah Keseluruhan</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($item->data as $data)
                                                                            <tr>
                                                                                    <td class="table-dark">{{ $loop->iteration }}</td>
                                                                                    <td class="font-weight-bold table-dark">{{ $data->prodi }}</td>
                                                                                    <td class="table-dark">{{ $data->jumlahMhsAktif }}</td>
                                                                                    <td class="table-dark">{{ $data->jumlahUndurDiri }}</td>
                                                                                    <td class="table-dark">{{ $data->jumlahKeluar }}</td>
                                                                                    <td class="table-dark">{{ $data->jumlahWafat }}</td>
                                                                                    <td class="table-dark">{{ $data->jumlahLulus }}</td>
                                                                                    <td class="table-dark">{{ $data->jumlahKurang }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                            <tr>
                                                                                <td></td>
                                                                                <td class="font-weight-bold"><strong>Total</strong></td>
                                                                                <td><strong class="badge table-dark btn-sm">{{ $item->jumlahMhsAktif }}</strong></td>
                                                                                <td><strong class="badge table-dark btn-sm">{{ $item->jumlahUndurDiri }}</strong></td>
                                                                                <td><strong class="badge table-dark btn-sm">{{ $item->jumlahKeluar }}</strong></td>
                                                                                <td><strong class="badge table-dark btn-sm">{{ $item->jumlahWafat }}</strong></td>
                                                                                <td><strong class="badge table-dark btn-sm">{{ $item->jumlahLulus }}</strong></td>
                                                                                <td><strong class="badge table-dark btn-sm">{{ $item->jumlahKurang}}</strong></td>
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
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                {{-- @foreach ($groupedMhsAktif as $ts_id => $group)
                                    @php
                                        $tahunItem = $tahun->find($ts_id);
                                    @endphp
                                    <tr>
                                        <td class="table-plus">{{ $loop->iteration }}</td>
                                        <td>
                                            <span class="btn btn-outline-primary btn-lg" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 14px;">
                                                TS {{ $tahunItem->ts ?? 'N/A' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-toggle="modal" data-target="#showModal{{ $ts_id }}">
                                                    <i class="dw dw-eye"></i> Detail
                                                </a>
                                                <!-- Modal for Total Active Students + Combined TS -->
                                                <div class="modal fade bs-example-modal-lg" id="showModal{{ $ts_id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                        <div class="modal-content" data-bgcolor="#d0d0d0">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myLargeModalLabel">
                                                                    <i class="fa fa-paperclip" aria-hidden="true"></i> Jumlah Hasil Mahasiswa Aktif TS {{ $tahunItem->ts ?? 'N/A' }} (Gabungan TS {{ substr($tahunItem->ts, 0, 4) - 1 }}/{{ substr($tahunItem->ts, 5, 4) - 1 }})
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="pd-10 card-box card-hdr">
                                                                    <div class="scrollable-table">
                                                                        <table class="table table-striped">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Program Studi</th>
                                                                            <th>Jumlah Total Mhs Aktif</th>
                                                                            <th>Jumlah Total Undur Diri</th>
                                                                            <th>Jumlah Total Dikeluarkan</th>
                                                                            <th>Jumlah Total Wafat</th>
                                                                            <th>Jumlah Total Lulus</th>
                                                                            <th>Jumlah Keseluruhan</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            
                                                                            <!-- @php $index = 0; @endphp
                                                                            @foreach($groupedMhsAktif[$ts_id]['data'] as $rekap)
                                                                            
                                                                                @php
                                                                                    $index++;
                                                                                    $undurDiri = $groupedUndurDiri[$ts_id]['data']->firstWhere('prodi_id', $rekap->prodi_id);
                                                                                    $jumlahTotalUndurDiri = $undurDiri ? $undurDiri->mhs_undur_diri_genap + $undurDiri->mhs_undur_diri_ganjil : 0;
                                                                                    $jumlahTotalMhsAktif = $rekap->jumlah_mhs_aktif_ts + $rekap->jumlah_mhs_aktif_th;
                                                                                    $keluar = $groupedKeluar[$ts_id]['data']->firstWhere('prodi_id', $rekap->prodi_id);
                                                                                    $jumlahTotalKeluar = $keluar ? $keluar->mhs_keluar_genap + $keluar->mhs_keluar_ganjil : 0;
                                                                                    $wafat = isset($groupedWafat[$ts_id]) ? $groupedWafat[$ts_id]['data']->firstWhere('prodi_id', $rekap->prodi_id) : 0;
                                                                                    $jumlahTotalWafat = $wafat ? $wafat->mhs_wafat_genap + $wafat->mhs_wafat_ganjil : 0;
                                                                                    $lulus = $groupedLulus[$ts_id]['data']->firstWhere('prodi_id', $rekap->prodi_id);
                                                                                    $jumlahTotalLulus = $lulus ? array_sum([
                                                                                        $lulus->januari, $lulus->februari, $lulus->maret, $lulus->april,
                                                                                        $lulus->mei, $lulus->juni, $lulus->juli, $lulus->agustus,
                                                                                        $lulus->september, $lulus->oktober, $lulus->november, $lulus->desember,
                                                                                        ]) : 0;
                                                                                        $jumlahKurang = $defisit->firstWhere('ts_id', $ts_id)['jumlahKurang'];
                                                                                @endphp
                                                                                <tr>
                                                                                    <td>{{ $index }}</td>
                                                                                    <td class="font-weight-bold">{{ $rekap->prodi->prodi }}</td>
                                                                                    <td>{{ $jumlahTotalMhsAktif }}</td>
                                                                                    <td>{{ $jumlahTotalUndurDiri }}</td>
                                                                                    <td>{{ $jumlahTotalKeluar }}</td>
                                                                                    <td>{{ $jumlahTotalWafat }}</td>
                                                                                    <td>{{ $jumlahTotalLulus }}</td>
                                                                                    <td>{{ $jumlahKurang }}</td>
                                                                                </tr>
                                                                            @endforeach -->
                                                                            <!-- Overall Total -->
                                                                            <tr>
                                                                                <td></td>
                                                                                <td class="font-weight-bold"><strong>Total</strong></td>
                                                                                <!-- <td><strong class="badge badge-success btn-sm">{{ $groupedMhsAktif[$ts_id]['totalJumlahMhsAktif'] }}</strong></td> -->
                                                                                <td><strong class="badge badge-success btn-sm">{{ $defisit->firstWhere('ts_id', $ts_id)['jumlahTotalMhsAktif'] }}</strong></td>
                                                                                <td><strong class="badge badge-danger btn-sm">{{ $groupedUndurDiri[$ts_id]['totalUndurDiri'] }}</strong></td>
                                                                                <td><strong class="badge badge-warning btn-sm">{{ $groupedKeluar[$ts_id]['totalKeluar'] }}</strong></td>
                                                                                <td><strong class="badge badge-info btn-sm">{{ isset($groupedWafat[$ts_id]) ? $groupedWafat[$ts_id]['totalWafat'] : 0 }}</strong></td>
                                                                                <td><strong class="badge badge-primary btn-sm">{{ $groupedLulus[$ts_id]['totalLulus'] }}</strong></td>
                                                                                <td><strong class="badge badge-secondary btn-sm">{{ $defisit->firstWhere('ts_id', $ts_id)['jumlahKurang'] }}</strong></td>
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
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End of Table -->
            </div>
        </div>
    </div>
    <!-- Datatable Setting js -->
    <script src="{{ asset('vendors/scripts/datatable-setting.js') }}"></script>
    <style>
    .modal-lg {
      max-width: 95%;
      max-height: 90%;
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


