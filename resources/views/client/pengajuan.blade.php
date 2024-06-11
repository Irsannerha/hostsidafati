<x-client-app>
    <!-- Content start -->
    <section class="bg-home bg-hexa" id="home">
        <div class="home-center">
            <div class="home-desc-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12 text-center">
                            <div class="title-heading mt-4">
                                <h1 class="heading mb-1 font-weight-bold text-white">
                                    Pengajuan Mahasiswa
                                </h1>
                                <p class="para-desc text-white">
                                    Pengajuan Mahasiswa adalah formulir yang digunakan untuk mengajukan data mahasiswa yang akan diinputkan ke dalam sistem SIDAFATI.
                                    Berupa pendataan Mahasiswa Pengajuan Tugas Akhir, Kerja Praktik, Surat Tugas Mahasiswa, dan lainnya.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- home end -->
    <!-- clients start -->
    <section id="data-Pengajuan">
        <div class="container-fluid">
            <div class="clients p-4 bg-gradient-1">
                <div class="row pb-10">
                    <div class="col-md-4 mb-20">
                        <div class="card-box min-height-100px pd-10 mb-10">
                            <div class="d-flex justify-content-between pb-20 text-dark">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="text-dark">
                                        <div class="font-weight-bold font-24 d-inline-block ml-2">
                                            Pengajuan Tugas Akhir
                                            <small class="text-dark font-5 font-weight-bold" style="margin-top: 1px; display: block; font-size: 0.700rem; margin-bottom: 20px;">Data Pengajuan Dokumen Tugas Akhir</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <a href="#" class="badge badge-success font-weight-bold" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px; margin-right: 5px;" data-toggle="modal" data-target="#showModalTA"><i class="fa fa-eye"></i> Lihat Pengajuan</a>
                                <a href="{{ route('formta')}}" class="badge badge-danger font-weight-bold" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;"><i class="fa fa-pencil-square-o"></i> Form Pengajuan</a>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Pengajuan Ta-->
                    @foreach($formta as $ta)
                    <div class="modal fade" id="showModalTA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header" data-bgcolor="#d0d0d0">
                                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">
                                        <i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Pengajuan Tugas Akhir
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <div class="row mb-3">
                                            <div class="col-sm-6"></div>
                                            <div class="col-sm-6 text-end"></div>
                                        </div>
                                        <table id="exampleTA" style="width: 100%;" class="table table-striped table-bordered text-dark font-weight-500">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>NIM</th>
                                                    <th>Program Studi</th>
                                                    <th>Tujuan Instansi</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                    <th>Pengajuan</th>
                                                    <th>Selesai</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: black;">
                                                @foreach($formta as $ta)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $ta->nama }}</td>
                                                    <td>{{ $ta->nim }}</td>
                                                    <td>{{ $ta->prodi ? $ta->prodi->prodi : '' }}</td>
                                                    <td>{{ $ta->instansi }}</td>
                                                    <td>
                                                        @if($ta->status == 'Selesai')
                                                        <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Selesai</span>
                                                        @elseif($ta->status == 'Diproses')
                                                        <span class="badge badge-warning" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Diproses</span>
                                                        @else
                                                        <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ditolak</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $ta->keterangan }}</td>
                                                    <td>
                                                        <?php
                                                        $bulan = [
                                                            'January' => 'Januari',
                                                            'February' => 'Februari',
                                                            'March' => 'Maret',
                                                            'April' => 'April',
                                                            'May' => 'Mei',
                                                            'June' => 'Juni',
                                                            'July' => 'Juli',
                                                            'August' => 'Agustus',
                                                            'September' => 'September',
                                                            'October' => 'Oktober',
                                                            'November' => 'November',
                                                            'December' => 'Desember'
                                                        ];
                                                        $tgl_kegiatan = \Carbon\Carbon::parse($ta->created_at)->timezone('Asia/Jakarta');
                                                        $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_kegiatan->format('F'));
                                                        echo $tgl_kegiatan->format('d') . ' ' . $bulan_indo . ' ' . $tgl_kegiatan->format('Y') . ' / ' . $tgl_kegiatan->format('H:i') . ' WIB';
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $tgl_updated = \Carbon\Carbon::parse($ta->updated_at)->timezone('Asia/Jakarta');
                                                        $bulan_indo_updated = str_replace(array_keys($bulan), array_values($bulan), $tgl_updated->format('F'));
                                                        echo $tgl_updated->format('d') . ' ' . $bulan_indo_updated . ' ' . $tgl_updated->format('Y') . ' / ' . $tgl_updated->format('H:i') . ' WIB';
                                                        ?>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Akhir Modal Pengajuan TA-->
                    <div class="col-md-4 mb-20">
                        <div class="card-box min-height-100px pd-10 mb-10">
                            <div class="d-flex justify-content-between pb-20 text-dark">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="text-dark">
                                        <div class="font-weight-bold font-24 d-inline-block ml-2">
                                            Pengajuan Kerja Praktik
                                            <small class="text-dark font-5 font-weight-bold" style="margin-top: 1px; display: block; font-size: 0.700rem; margin-bottom: 20px;">Data Pengajuan Dokumen Kerja Praktik</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <a href="#" class="badge badge-success font-weight-bold" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px; margin-right: 5px;" data-toggle="modal" data-target="#showModalKP"><i class="fa fa-eye"></i> Lihat Pengajuan</a>
                                <a href="{{ route('formkp')}}" class="badge badge-danger font-weight-bold" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;"><i class="fa fa-pencil-square-o"></i> Form Pengajuan</a>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Pengajuan KP-->
                    @foreach($formkp as $kp)
                    <div class="modal fade" id="showModalKP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header" data-bgcolor="#d0d0d0">
                                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">
                                        <i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Pengajuan Kerja Praktik
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <div class="row mb-3">
                                            <div class="col-sm-6"></div>
                                            <div class="col-sm-6 text-end"></div>
                                        </div>
                                        <table id="exampleKP" style="width: 100%;" class="table table-striped table-bordered text-dark font-weight-500">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>Program Studi</th>
                                                    <th>Tujuan Instansi</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                    <th>Pengajuan</th>
                                                    <th>Selesai</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: black;">
                                                @foreach($formkp as $kp)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ str_replace(',', ', ', $kp->nama) }}</td>
                                                    <td>{{ $kp->prodi ? $kp->prodi->prodi : '' }}</td>
                                                    <td>{{ $kp->instansi }}</td>
                                                    <td>
                                                        @if($kp->status == 'Selesai')
                                                        <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Selesai</span>
                                                        @elseif($kp->status == 'Diproses')
                                                        <span class="badge badge-warning" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Diproses</span>
                                                        @else
                                                        <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ditolak</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $kp->keterangan }}</td>
                                                    <td>
                                                        <?php
                                                        $bulan = [
                                                            'January' => 'Januari',
                                                            'February' => 'Februari',
                                                            'March' => 'Maret',
                                                            'April' => 'April',
                                                            'May' => 'Mei',
                                                            'June' => 'Juni',
                                                            'July' => 'Juli',
                                                            'August' => 'Agustus',
                                                            'September' => 'September',
                                                            'October' => 'Oktober',
                                                            'November' => 'November',
                                                            'December' => 'Desember'
                                                        ];
                                                        $tgl_kegiatan = \Carbon\Carbon::parse($kp->created_at)->timezone('Asia/Jakarta');
                                                        $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_kegiatan->format('F'));
                                                        echo $tgl_kegiatan->format('d') . ' ' . $bulan_indo . ' ' . $tgl_kegiatan->format('Y') . ' / ' . $tgl_kegiatan->format('H:i') . ' WIB';
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $tgl_updated = \Carbon\Carbon::parse($kp->updated_at)->timezone('Asia/Jakarta');
                                                        $bulan_indo_updated = str_replace(array_keys($bulan), array_values($bulan), $tgl_updated->format('F'));
                                                        echo $tgl_updated->format('d') . ' ' . $bulan_indo_updated . ' ' . $tgl_updated->format('Y') . ' / ' . $tgl_updated->format('H:i') . ' WIB';
                                                        ?>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Akhir Modal Pengajuan KP-->
                    <div class="col-md-4 mb-20">
                        <div class="card-box min-height-100px pd-10 mb-10">
                            <div class="d-flex justify-content-between pb-20 text-dark">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="text-dark">
                                        <div class="font-weight-bold font-24 d-inline-block ml-2">
                                            Pengajuan Tanda Tangan
                                            <small class="text-dark font-5 font-weight-bold" style="margin-top: 1px; display: block; font-size: 0.700rem; margin-bottom: 20px;">Data Pengajuan KHS/Transkrip/Dokumen Lainnya</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <a href="#" class="badge badge-success font-weight-bold" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px; margin-right: 5px;" data-toggle="modal" data-target="#showModalKHS"><i class="fa fa-eye"></i> Lihat Pengajuan</a>
                                <a href="{{ route('formkhs')}}" class="badge badge-danger font-weight-bold" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;"><i class="fa fa-pencil-square-o"></i> Form Pengajuan</a>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Pengajuan KHS/Tanda Tangan-->
                    @foreach($formkhs as $khs)
                    <div class="modal fade" id="showModalKHS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header" data-bgcolor="#d0d0d0">
                                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">
                                        <i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Pengajuan KHS/Transkrip/Dokumen Lainnya
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <div class="row mb-3">
                                            <div class="col-sm-6"></div>
                                            <div class="col-sm-6 text-end"></div>
                                        </div>
                                        <table id="exampleKHS" style="width: 100%;" class="table table-striped table-bordered text-dark font-weight-500">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>Program Studi</th>
                                                    <th>Status</th>
                                                    <th>Perihal/Keperluan</th>
                                                    <th>Keterangan</th>
                                                    <th>Pengajuan</th>
                                                    <th>Selesai</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: black;">
                                                @foreach($formkhs as $khs)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $khs->nama }}</td>
                                                    <td>{{ $khs->prodi ? $khs->prodi->prodi : '' }}</td>
                                                    <td>
                                                        @if($khs->status == 'Selesai')
                                                        <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Selesai</span>
                                                        @elseif($khs->status == 'Diproses')
                                                        <span class="badge badge-warning" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Diproses</span>
                                                        @else
                                                        <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ditolak</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($khs->keperluan == 'KHS')
                                                        <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">KHS</span>
                                                        @elseif($khs->keperluan == 'Transkrip')
                                                        <span class="badge badge-primary" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Transkrip</span>
                                                        @elseif($khs->keperluan == 'KHS dan Transkrip')
                                                        <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">KHS dan Transkrip</span>
                                                        @else
                                                        <span class="badge badge-info" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Dokumen Lainnya</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $khs->keterangan }}</td>
                                                    <td>
                                                        <?php
                                                        $bulan = [
                                                            'January' => 'Januari',
                                                            'February' => 'Februari',
                                                            'March' => 'Maret',
                                                            'April' => 'April',
                                                            'May' => 'Mei',
                                                            'June' => 'Juni',
                                                            'July' => 'Juli',
                                                            'August' => 'Agustus',
                                                            'September' => 'September',
                                                            'October' => 'Oktober',
                                                            'November' => 'November',
                                                            'December' => 'Desember'
                                                        ];
                                                        $tgl_kegiatan = \Carbon\Carbon::parse($khs->created_at)->timezone('Asia/Jakarta');
                                                        $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_kegiatan->format('F'));
                                                        echo $tgl_kegiatan->format('d') . ' ' . $bulan_indo . ' ' . $tgl_kegiatan->format('Y') . ' / ' . $tgl_kegiatan->format('H:i') . ' WIB';
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $tgl_updated = \Carbon\Carbon::parse($khs->updated_at)->timezone('Asia/Jakarta');
                                                        $bulan_indo_updated = str_replace(array_keys($bulan), array_values($bulan), $tgl_updated->format('F'));
                                                        echo $tgl_updated->format('d') . ' ' . $bulan_indo_updated . ' ' . $tgl_updated->format('Y') . ' / ' . $tgl_updated->format('H:i') . ' WIB';
                                                        ?>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Akhir Modal Pengajuan KHS/Tanda Tangan-->
                    <div class="col-md-4 mb-20">
                        <div class="card-box min-height-100px pd-10 mb-10">
                            <div class="d-flex justify-content-between pb-20 text-dark">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="text-dark">
                                        <div class="font-weight-bold font-24 d-inline-block ml-2 mb-2">
                                            Pengajuan Pengantar Wawancara Mahasiswa
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <a href="#" class="badge badge-success font-weight-bold" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px; margin-right: 5px;" data-toggle="modal" data-target="#showModalWCR"><i class="fa fa-eye"></i> Lihat Pengajuan</a>
                                <a href="{{ route('formwcr')}}" class="badge badge-danger font-weight-bold" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;"><i class="fa fa-pencil-square-o"></i> Form Pengajuan</a>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Pengajuan Wawancara-->
                    @foreach($formwcr as $wcr)
                    <div class="modal fade" id="showModalWCR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header" data-bgcolor="#d0d0d0">
                                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">
                                        <i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Pengajuan Pengantar Wawancara
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <div class="row mb-3">
                                            <div class="col-sm-6"></div>
                                            <div class="col-sm-6 text-end"></div>
                                        </div>
                                        <table id="exampleWCR" style="width: 100%;" class="table table-striped table-bordered text-dark font-weight-500">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>Program Studi</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                    <th>Pengajuan</th>
                                                    <th>Selesai</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: black;">
                                                @foreach($formwcr as $wcr)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ str_replace(',', ', ', $wcr->nama) }}</td>
                                                    <td>{{ $wcr->prodi ? $wcr->prodi->prodi : '' }}</td>
                                                    <td>
                                                        @if($wcr->status == 'Selesai')
                                                        <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Selesai</span>
                                                        @elseif($wcr->status == 'Diproses')
                                                        <span class="badge badge-warning" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Diproses</span>
                                                        @else
                                                        <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ditolak</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $wcr->keterangan }}</td>
                                                    <td>
                                                        <?php
                                                        $bulan = [
                                                            'January' => 'Januari',
                                                            'February' => 'Februari',
                                                            'March' => 'Maret',
                                                            'April' => 'April',
                                                            'May' => 'Mei',
                                                            'June' => 'Juni',
                                                            'July' => 'Juli',
                                                            'August' => 'Agustus',
                                                            'September' => 'September',
                                                            'October' => 'Oktober',
                                                            'November' => 'November',
                                                            'December' => 'Desember'
                                                        ];
                                                        $tgl_kegiatan = \Carbon\Carbon::parse($wcr->created_at)->timezone('Asia/Jakarta');
                                                        $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_kegiatan->format('F'));
                                                        echo $tgl_kegiatan->format('d') . ' ' . $bulan_indo . ' ' . $tgl_kegiatan->format('Y') . ' / ' . $tgl_kegiatan->format('H:i') . ' WIB';
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $tgl_updated = \Carbon\Carbon::parse($wcr->updated_at)->timezone('Asia/Jakarta');
                                                        $bulan_indo_updated = str_replace(array_keys($bulan), array_values($bulan), $tgl_updated->format('F'));
                                                        echo $tgl_updated->format('d') . ' ' . $bulan_indo_updated . ' ' . $tgl_updated->format('Y') . ' / ' . $tgl_updated->format('H:i') . ' WIB';
                                                        ?>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Akhir Modal Pengajuan Wawancara-->
                    <div class="col-md-4 mb-20">
                        <div class="card-box min-height-100px pd-10 mb-10">
                            <div class="d-flex justify-content-between pb-20 text-dark">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="text-dark">
                                        <div class="font-weight-bold font-24 d-inline-block ml-2 mb-2">
                                            Pengajuan Surat Rekomendasi
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <a href="#" class="badge badge-success font-weight-bold" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px; margin-right: 5px;" data-toggle="modal" data-target="#showModalREK"><i class="fa fa-eye"></i> Lihat Pengajuan</a>
                                <a href="{{ route('formrekom')}}" class="badge badge-danger font-weight-bold" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;"><i class="fa fa-pencil-square-o"></i> Form Pengajuan</a>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Pengajuan Surat Rekomendasi-->
                    @foreach($formrekom as $rekom)
                    <div class="modal fade" id="showModalREK" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header" data-bgcolor="#d0d0d0">
                                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">
                                        <i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Pengajuan Surat Rekomendasi
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <div class="row mb-3">
                                            <div class="col-sm-6"></div>
                                            <div class="col-sm-6 text-end"></div>
                                        </div>
                                        <table id="exampleREK" style="width: 100%;" class="table table-striped table-bordered text-dark font-weight-500">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>NIM</th>
                                                    <th>Prodi</th>
                                                    <th>Tujuan Instansi</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                    <th>Pengajuan</th>
                                                    <th>Selesai</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: black;">
                                                @foreach($formrekom as $rekom)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $rekom->nama }}</td>
                                                    <td>{{ $rekom->nim }}</td>
                                                    <td>{{ $rekom->prodi ? $rekom->prodi->prodi : '' }}</td>
                                                    <td>{{ $rekom->instansi }}</td>
                                                    <td>
                                                        @if($rekom->status == 'Selesai')
                                                        <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Selesai</span>
                                                        @elseif($rekom->status == 'Diproses')
                                                        <span class="badge badge-warning" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Diproses</span>
                                                        @else
                                                        <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ditolak</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $rekom->keterangan }}</td>
                                                    <td>
                                                        <?php
                                                        $bulan = [
                                                            'January' => 'Januari',
                                                            'February' => 'Februari',
                                                            'March' => 'Maret',
                                                            'April' => 'April',
                                                            'May' => 'Mei',
                                                            'June' => 'Juni',
                                                            'July' => 'Juli',
                                                            'August' => 'Agustus',
                                                            'September' => 'September',
                                                            'October' => 'Oktober',
                                                            'November' => 'November',
                                                            'December' => 'Desember'
                                                        ];
                                                        $tgl_kegiatan = \Carbon\Carbon::parse($rekom->created_at)->timezone('Asia/Jakarta');
                                                        $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_kegiatan->format('F'));
                                                        echo $tgl_kegiatan->format('d') . ' ' . $bulan_indo . ' ' . $tgl_kegiatan->format('Y') . ' / ' . $tgl_kegiatan->format('H:i') . ' WIB';
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $tgl_updated = \Carbon\Carbon::parse($rekom->updated_at)->timezone('Asia/Jakarta');
                                                        $bulan_indo_updated = str_replace(array_keys($bulan), array_values($bulan), $tgl_updated->format('F'));
                                                        echo $tgl_updated->format('d') . ' ' . $bulan_indo_updated . ' ' . $tgl_updated->format('Y') . ' / ' . $tgl_updated->format('H:i') . ' WIB';
                                                        ?>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Akhir Modal Pengajuan Surat Rekomendasi-->
                    <div class="col-md-4 mb-20">
                        <div class="card-box min-height-100px pd-10 mb-10">
                            <div class="d-flex justify-content-between pb-20 text-dark">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="text-dark">
                                        <div class="font-weight-bold font-24 d-inline-block ml-2 mb-2">
                                            Pengajuan Surat Tugas Mahasiswa
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <a href="#" class="badge badge-success font-weight-bold" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px; margin-right: 5px;" data-toggle="modal" data-target="#showModalSTM"><i class="fa fa-eye"></i> Lihat Pengajuan</a>
                                <a href="{{ route('formstm')}}" class="badge badge-danger font-weight-bold" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;"><i class="fa fa-pencil-square-o"></i> Form Pengajuan</a>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Pengajuan  Surat Tugas Mahasiswa -->
                    @foreach($formstm as $stm)
                    <div class="modal fade" id="showModalSTM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header" data-bgcolor="#d0d0d0">
                                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">
                                        <i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Pengajuan Surat Tugas Mahasiswa
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <div class="row mb-3">
                                            <div class="col-sm-6"></div>
                                            <div class="col-sm-6 text-end"></div>
                                        </div>
                                        <table id="exampleSTM" style="width: 100%;" class="table table-striped table-bordered text-dark font-weight-500">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>Program Studi</th>
                                                    <th>Nama Instansi</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                    <th>Pengajuan</th>
                                                    <th>Selesai</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: black;">
                                                @foreach($formstm as $stm)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ str_replace(',', ', ', $stm->nama) }}</td>
                                                    <td>{{ $stm->prodi ? $stm->prodi->prodi : '' }}</td>
                                                    <td>{{ $stm->instansi }}</td>
                                                    <td>
                                                        @if($stm->status == 'Selesai')
                                                        <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Selesai</span>
                                                        @elseif($stm->status == 'Diproses')
                                                        <span class="badge badge-warning" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Diproses</span>
                                                        @else
                                                        <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ditolak</span>
                                                        @endif
                                                    </td>
                                                    <!-- <td>
                                                        @if($stm->jenis_surat_tugas == 'Surat Tugas Kerja Praktik (KP)')
                                                        <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Surat Tugas Kerja Praktik (KP)</span>
                                                        @elseif($stm->jenis_surat_tugas == 'Surat Tugas Akhir (TA)')
                                                        <span class="badge badge-primary" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Surat Tugas Akhir (TA)</span>
                                                        @elseif($stm->jenis_surat_tugas == 'Surat Tugas Lomba')
                                                        <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Surat Tugas Lomba</span>
                                                        @else
                                                        <span class="badge badge-dark" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Surat Tugas Lainnya</span>
                                                        @endif
                                                    </td> -->
                                                    <td>{{ $stm->keterangan }}</td>
                                                    <td>
                                                        <?php
                                                        $bulan = [
                                                            'January' => 'Januari',
                                                            'February' => 'Februari',
                                                            'March' => 'Maret',
                                                            'April' => 'April',
                                                            'May' => 'Mei',
                                                            'June' => 'Juni',
                                                            'July' => 'Juli',
                                                            'August' => 'Agustus',
                                                            'September' => 'September',
                                                            'October' => 'Oktober',
                                                            'November' => 'November',
                                                            'December' => 'Desember'
                                                        ];
                                                        $tgl_created = \Carbon\Carbon::parse($stm->created_at)->timezone('Asia/Jakarta');
                                                        $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_created->format('F'));
                                                        echo $tgl_created->format('d') . ' ' . $bulan_indo . ' ' . $tgl_created->format('Y') . ' / ' . $tgl_kegiatan->format('H:i') . ' WIB';
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $tgl_updated = \Carbon\Carbon::parse($stm->updated_at)->timezone('Asia/Jakarta');
                                                        $bulan_indo_updated = str_replace(array_keys($bulan), array_values($bulan), $tgl_updated->format('F'));
                                                        echo $tgl_updated->format('d') . ' ' . $bulan_indo_updated . ' ' . $tgl_updated->format('Y') . ' / ' . $tgl_updated->format('H:i') . ' WIB';
                                                        ?>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Akhir Modal Pengajuan Surat Tugas Mahasiswa-->
                    <div class="col-md-4 mb-20">
                        <div class="card-box min-height-100px pd-10 mb-10">
                            <div class="d-flex justify-content-between pb-20 text-dark">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="text-dark">
                                        <div class="font-weight-bold font-24 d-inline-block ml-2 mb-2">
                                            Legalisir Ijazah, Transkrip Akhir dan Akreditasi Prodi
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <a href="#" class="badge badge-success font-weight-bold" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px; margin-right: 5px;" data-toggle="modal" data-target="#showModalLegal"><i class="fa fa-eye"></i> Lihat Pengajuan</a>
                                <a href="{{ route('formlegal')}}" class="badge badge-danger font-weight-bold" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;"><i class="fa fa-pencil-square-o"></i> Form Pengajuan</a>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Pengajuan Legal-->
                    @foreach($formlegal as $legal)
                    <div class="modal fade" id="showModalLegal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header" data-bgcolor="#d0d0d0">
                                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">
                                        <i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Pengajuan Legalisir ijazah, Transkrip, Akreditasi Prodi, dan Dokumen Lainnya
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <div class="row mb-3">
                                            <div class="col-sm-6"></div>
                                            <div class="col-sm-6 text-end"></div>
                                        </div>
                                        <table id="exampleLegal" style="width: 100%;" class="table table-striped table-bordered text-dark font-weight-500">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>Program Studi</th>
                                                    <th>Status</th>
                                                    <th>Perihal/Keperluan</th>
                                                    <th>Keterangan</th>
                                                    <th>Pengajuan</th>
                                                    <th>Selesai</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: black;">
                                                @foreach($formlegal as $legal)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $legal->nama }}</td>
                                                    <td>{{ $legal->prodi ? $legal->prodi->prodi : '' }}</td>
                                                    <td>
                                                        @if($legal->status == 'Selesai')
                                                        <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Selesai</span>
                                                        @elseif($legal->status == 'Diproses')
                                                        <span class="badge badge-warning" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Diproses</span>
                                                        @else
                                                        <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ditolak</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($legal->keperluan == 'Ijazah')
                                                        <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ijazah</span>
                                                        @elseif($legal->keperluan == 'Akreditasi Prodi')
                                                        <span class="badge badge-primary" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Akreditasi Prodi</span>
                                                        @elseif($legal->keperluan == 'Transkrip')
                                                        <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Transkrip</span>
                                                        @elseif($legal->keperluan == 'Ijazah dan Transkrip')
                                                        <span class="badge badge-info" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ijazah dan Transkrip</span>
                                                        @elseif($legal->keperluan == 'Ijazah, Transkrip dan Akreditasi')
                                                        <span class="badge badge-secondary" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ijazah, Transkrip dan Akreditasi</span>
                                                        @else
                                                        <span class="badge badge-dark" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Dokumen Lainnya</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $legal->keterangan }}</td>
                                                    <td>
                                                        <?php
                                                        $bulan = [
                                                            'January' => 'Januari',
                                                            'February' => 'Februari',
                                                            'March' => 'Maret',
                                                            'April' => 'April',
                                                            'May' => 'Mei',
                                                            'June' => 'Juni',
                                                            'July' => 'Juli',
                                                            'August' => 'Agustus',
                                                            'September' => 'September',
                                                            'October' => 'Oktober',
                                                            'November' => 'November',
                                                            'December' => 'Desember'
                                                        ];
                                                        $tgl_created = \Carbon\Carbon::parse($legal->created_at)->timezone('Asia/Jakarta');
                                                        $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_created->format('F'));
                                                        echo $tgl_created->format('d') . ' ' . $bulan_indo . ' ' . $tgl_created->format('Y') . ' / ' . $tgl_created->format('H:i') . ' WIB';
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $tgl_updated = \Carbon\Carbon::parse($legal->updated_at)->timezone('Asia/Jakarta');
                                                        $bulan_indo_updated = str_replace(array_keys($bulan), array_values($bulan), $tgl_updated->format('F'));
                                                        echo $tgl_updated->format('d') . ' ' . $bulan_indo_updated . ' ' . $tgl_updated->format('Y') . ' / ' . $tgl_updated->format('H:i') . ' WIB';
                                                        ?>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Akhir Modal Pengajuan Legal-->
                    <!-- end row -->
                </div>
            </div>
            <!-- end container-fluid -->
    </section>

    <!-- tabel Pengajuan -->
    <!-- <section id="tabelPengajuan">
        <div class="container-fluid">
          <div class="clients p-4 bg-gradient-1" style="top: -155px">
            <div class="row pb-10">
              <div class="col-md-12 mb-20">
                <div class="card-box min-height-300px pd-10 mb-10">
                  <div class="table-responsive">
                    <div class="row mb-3">
                      <div class="col-sm-6"></div>
                      <div class="col-sm-6 text-end"></div>
                    </div>
                    <table
                      id="example"
                      style="width: 100%"
                      class="table table-striped table-bordered text-dark"
                    >
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>NIM</th>
                          <th>Prodi</th>
                          <th>Tujuan Instansi</th>
                          <th>Status</th>
                          <th>Keterangan</th>
                          <th>Tanggal Pengajuan</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
    <!-- tabel Pengajuan -->
    <!-- clients end -->
    <!-- features start -->
    <section class="section-sm" id="faq" style="margin-top: -100px">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mb-4 pb-1">
                        <h2>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </h2>
                        <p class="text-muted">Data Pengajuan</p>
                    </div>
                </div>
            </div>

            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </section>
    <!-- End Content -->
    <!-- Semua Modal -->
    <!-- Modal -->
    <div class="modal fade" id="tabelTa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">
                        <i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Pengajuan Tugas Akhir
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <div class="row mb-3">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6 text-end"></div>
                        </div>
                        <table id="example" style="width: 100%" class="table table-striped table-bordered text-dark">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Prodi</th>
                                    <th>Tujuan Instansi</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Pengajuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data akan diisi di sini -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal -->
    <!-- Akhir Dari Semua Modal -->
</x-client-app>
<script>
    $(document).ready(function() {
        $('#exampleTA').DataTable();
    });
    $(document).ready(function() {
        $('#exampleKP').DataTable();
    });
    $(document).ready(function() {
        $('#exampleKHS').DataTable();
    });
    $(document).ready(function() {
        $('#exampleLegal').DataTable();
    });
    $(document).ready(function() {
        $('#exampleSTM').DataTable();
    });
    $(document).ready(function() {
        $('#exampleWCR').DataTable();
    });
    $(document).ready(function() {
        $('#exampleREK').DataTable();
    });
</script>