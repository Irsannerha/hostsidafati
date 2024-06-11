<x-admin-app>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title font-weight-bold">
                                <h4>Data Rekap Mahasiswa</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item font-weight-bold h5">
                                        <a href="dashboard.html">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                                        Rekap Mahasiswa
                                    </li>
                                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                                        Tambah Rekap Mahasiswa
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
                    <!-- Form Tambah Prodi -->
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-dark h4">Form Tambah Data Rekap</h4>
                            </div>
                        </div>
                        <hr />
                        <br />
                        <form action="{{ route('superadmin.all-rekap.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Program Studi</label>
                                        <select name="prodi_id" class="form-control">
                                            <option value="">Pilih Program Studi</option>
                                            @foreach($prodi as $program)
                                                <option value="{{ $program->id }}">{{ $program->prodi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tahun Semester</label>
                                        <select name="tahun_semester_id" class="form-control">
                                            <option value="">Pilih Tahun Semester</option>
                                            @foreach($tahun_semester as $tsId)
                                                <option value="{{ $tsId->id }}">{{ $tsId->tahun_semester }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tahun</label>
                                        <select name="tahun_id" class="form-control">
                                            <option value="">Pilih Tahun </option>
                                            @foreach($tahun as $tahunId)
                                                <option value="{{ $tahunId->id }}">{{ $tahunId->tahun }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jumlah Mahasiswa Aktif TS</label>
                                        <input type="number" name="jumlah_mhs_aktif_ts" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Aktif TS" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jumlah Mahasiswa Aktif Tahun</label>
                                        <input type="number" name="jumlah_mhs_aktif_th" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Aktif Tahun" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jumlah Mahasiswa Mengundurkan Diri Genap</label>
                                        <input type="number" name="mhs_undur_diri_genap" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Mengundurkan Diri Genap" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jumlah Mahasiswa Mengundurkan Diri Ganjil</label>
                                        <input type="number" name="mhs_undur_diri_ganjil" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Mengundurkan Diri Ganjil" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jumlah Mahasiswa Dikeluarkan Genap</label>
                                        <input type="number" name="mhs_keluar_genap" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Dikeluarkan Genap" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jumlah Mahasiswa Dikeluarkan Ganjil</label>
                                        <input type="number" name="mhs_keluar_ganjil" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Dikeluarkan Ganjil" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jumlah Mahasiswa Wafat Genap</label>
                                        <input type="number" name="mhs_wafat_genap" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Wafat Genap" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jumlah Mahasiswa Wafat Ganjil</label>
                                        <input type="number" name="mhs_wafat_ganjil" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Wafat Ganjil" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jumlah Mahasiswa Lulus Januari</label>
                                        <input type="number" name="mhs_lulus_januari" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus Januari" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jumlah Mahasiswa Lulus Februari</label>
                                        <input type="number" name="mhs_lulus_februari" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus Februari" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jumlah Mahasiswa Lulus Maret</label>
                                        <input type="number" name="mhs_lulus_maret" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus Maret" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jumlah Mahasiswa Lulus April</label>
                                        <input type="number" name="mhs_lulus_april" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus April" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jumlah Mahasiswa Lulus Mei</label>
                                        <input type="number" name="mhs_lulus_mei" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus Mei" />
                                    </div>
                                </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Jumlah Mahasiswa Lulus Juni</label>
                                            <input type="number" name="mhs_lulus_juni" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus Juni" />
                                        </div>
                                    </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jumlah Mahasiswa Lulus Juli</label>
                                        <input type="number" name="mhs_lulus_juli" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus Juli" />
                                    </div>
                                </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Jumlah Mahasiswa Lulus Agustus</label>
                                            <input type="number" name="mhs_lulus_agustus" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus Agustus" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Jumlah Mahasiswa Lulus September</label>
                                            <input type="number" name="mhs_lulus_september" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus September" />
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Jumlah Mahasiswa Lulus Oktober</label>
                                            <input type="number" name="mhs_lulus_oktober" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus Oktober" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Jumlah Mahasiswa Lulus November</label>
                                            <input type="number" name="mhs_lulus_november" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus November" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Jumlah Mahasiswa Lulus Desember</label>
                                            <input type="number" name="mhs_lulus_desember" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus Desember" />
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Jumlah Mahasiswa Lulus Tugas Akhir</label>
                                            <input type="number" name="mhs_lulus_ta" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Tugas Akhir" />
                                        </div>
                                    </div>

                            <!-- <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Upload File</label>
                                    <input type="file" name="file_data" class="form-control-file form-control height-auto" id="file_data">
                                </div>
                            </div> -->
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary float-right">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Form Tambah Prodi End -->
                </div>
                <!-- Checkbox select Datatable End -->
            </div>
        </div>
    </div>
</x-admin-app>
