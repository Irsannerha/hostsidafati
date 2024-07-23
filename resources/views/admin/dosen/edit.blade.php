<x-admin-app>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title font-weight-bold">
                                <h4>Data Dosen Aktif & Tetap</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item font-weight-bold h5">
                                        <a href="dashboard.html">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                                        Dosen Aktif & Tetap
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
                    <!-- Form Taslab -->
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-dark h4">Form Edit Dosen Aktif & Tetap</h4>
                            </div>
                        </div>
                        <hr />
                        <br />
                        @if (Auth::user()->role == 'superadmin')
                        <form action="{{ route('superadmin.dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
                        @elseif (Auth::user()->role == 'pegawai')
                        <form action="{{ route('pegawai.dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
                        @endif
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama</label>
                                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $dosen->nama) }}" placeholder="Masukkan Nama" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">NIP/NRK</label>
                                        <input type="text" name="nip_nrk" class="form-control" value="{{ old('nip_nrk', $dosen->nip_nrk) }}" placeholder="Masukkan NIP/NRK" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Program Studi</label>
                                        <select name="prodi_id" class="form-control">
                                            <option value="">Pilih Program Studi</option>
                                            @foreach($prodi as $prodi)
                                            <option value="{{ $prodi->id }}" {{ $prodi->id == $dosen->prodi_id ? 'selected' : '' }}>{{ $prodi->prodi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir', $dosen->tgl_lahir) }}" placeholder="Masukkan Tanggal Lahir" />
                                    </div>
                                </div>
                                <!-- <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Umur</label>
                                        <input type="number" name="umur" class="form-control" value="{{ old('umur', $dosen->umur) }}" placeholder="Masukkan Umur" />
                                    </div>
                                </div> -->
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Pendidikan</label>
                                        <select class="form-control" name="pendidikan" id="pendidikan">
                                            <option value="{{ old('pendidikan', $dosen->pendidikan) }}">
                                                {{ old('pendidikan', $dosen->pendidikan) }}
                                            </option>
                                            <option value="">Pilih Pendidikan</option>
                                            <option value="Strata (S1)">Strata (S1)</option>
                                            <option value="Magister (S2)">Magister (S2)</option>
                                            <option value="Doktor (S3)">Doktor (S3)</option>
                                            <option value="Sedang Tugas Belajar">Sedang Tugas Belajar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Status Dosen</label>
                                        <select class="form-control" name="status_dosen" id="status_dosen">
                                            <option value="{{ old('status_dosen', $dosen->status_dosen) }}">
                                                {{ old('status_dosen', $dosen->status_dosen) }}
                                            </option>
                                            <option value="">Pilih Status Dosen</option>
                                            <option value="Dosen Aktif">Dosen Aktif</option>
                                            <option value="Dosen Tetap">Dosen Tetap</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Masa Kerja</label>
                                        <input type="text" name="masa_kerja" class="form-control" value="{{ old('masa_kerja', $dosen->masa_kerja) }}" placeholder="Masukkan Masa Kerja" />
                                    </div>
                                </div> -->
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Status NIDN/NIDK/NUP</label>
                                        <select class="form-control" name="status_nidn_nidk" id="status_nidn_nidk">
                                            <option value="{{ old('status_nidn_nidk', $dosen->status_nidn_nidk) }}">
                                                {{ old('status_nidn_nidk', $dosen->status_nidn_nidk) }}
                                            </option>
                                            <option value="">Pilih Status NIDN/NIDK/NUP</option>
                                            <option value="NIDN">NIDN</option>
                                            <option value="NIDK">NIDK</option>
                                            <option value="NUP">NUP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Status Pegawai</label>
                                        <select class="form-control" name="status_pegawai" id="status_pegawai">
                                            <option value="{{ old('status_pegawai', $dosen->status_pegawai) }}">
                                                {{ old('status_pegawai', $dosen->status_pegawai) }}
                                            </option>
                                            <option value="">Pilih Status Pegawai</option>
                                            <option value="PNS">PNS</option>
                                            <option value="Non PNS">Non PNS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jabatan Fungsional</label>
                                        <select class="form-control" name="jabfung" id="jabfung">
                                            <option value="{{ old('jabfung', $dosen->jabfung) }}">
                                                {{ old('jabfung', $dosen->jabfung) }}
                                            </option>
                                            <option value="">Pilih Jabatan Fungsional</option>
                                            <option value="Asisten Ahli 150">Asisten Ahli 150</option>
                                            <option value="Lektor (L) 200, 300">Lektor (L) 200, 300</option>
                                            <option value="Lektor Kepala (LK) 400, 550, 700">Lektor Kepala (LK) 400, 550, 700</option>
                                            <option value="Guru Besar/Profesor (Prof) 850, 1050">Guru Besar/Profesor (Prof) 850, 1050</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">TMT Jabatan Fungsional Terakhir</label>
                                        <input type="date" name="tmt_jabfung_terakhir" class="form-control" value="{{ old('tmt_jabfung_terakhir', $dosen->tmt_jabfung_terakhir) }}" placeholder="Masukkan TMT Jabatan Fungsional Terakhir" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Target Kenaikan Jabatan Fungsional</label>
                                        <input type="date" name="target_kenaikan_jabfung" class="form-control" value="{{ old('target_kenaikan_jabfung', $dosen->target_kenaikan_jabfung) }}" placeholder="Masukkan Target Kenaikan Jabatan Fungsional" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">TMT Masuk ITERA</label>
                                        <input type="date" name="tmt_masuk_itera" class="form-control" value="{{ old('tmt_masuk_itera', $dosen->tmt_masuk_itera) }}" placeholder="Masukkan Terhitung Mulai Tanggal" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Terhitung Mulai Tanggal</label>
                                        <input type="date" name="tmt" class="form-control" value="{{ old('tmt', $dosen->tmt) }}" placeholder="Masukkan Terhitung Mulai Tanggal" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Pekerti</label>
                                        <select class="form-control" name="pekerti" id="pekerti">
                                            <option value="{{ old('pekerti', $dosen->pekerti) }}">
                                                {{ old('pekerti', $dosen->pekerti) }}
                                            </option>
                                            <option value="">Pilih Pekerti</option>
                                            <option value="Sudah">Sudah</option>
                                            <option value="Belum">Belum</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Serdos</label>
                                        <select class="form-control" name="serdos" id="serdos">
                                            <option value="{{ old('serdos', $dosen->serdos) }}">
                                                {{ old('serdos', $dosen->serdos) }}
                                            </option>
                                            <option value="">Pilih Serdos</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">SK PNS</label>
                                        <input type="file" name="sk_pns" class="form-control height-auto" value="{{ old('sk_pns', $dosen->sk_pns) }}" placeholder="Masukkan SK PNS">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">SK CPNS</label>
                                        <input type="file" name="sk_cpns" class="form-control height-auto" value="{{ old('sk_cpns', $dosen->sk_cpns) }}" placeholder="Masukkan SK CPNS">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">SK Tugas Belajar</label>
                                        <input type="file" name="sk_tubel" class="form-control height-auto" value="{{ old('sk_tubel', $dosen->sk_tubel) }}" placeholder="Masukkan SK Tugas Belajar">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">SK Perpanjangan Tugas Belajar</label>
                                        <input type="file" name="sk_perpanjangan_tubel" class="form-control height-auto" value="{{ old('sk_perpanjangan_tubel', $dosen->sk_perpanjangan_tubel) }}" placeholder="Masukkan SK Perpanjangan Tubel">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">SK Jabatan Fungsional</label>
                                        <input type="file" name="sk_jabfung" class="form-control height-auto" value="{{ old('sk_jabfung', $dosen->sk_jabfung) }}" placeholder="Masukkan SK Jabatan Fungsional">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">SK Pengaktifan</label>
                                        <input type="file" name="sk_pengaktifan" class="form-control height-auto" value="{{ old('sk_pengaktifan', $dosen->sk_pengaktifan) }}" placeholder="Masukkan SK Pengaktifan">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">SK Pengaktifan Kembali Dari Tubel</label>
                                        <input type="file" name="sk_pengaktifan_kembali" class="form-control height-auto" value="{{ old('sk_pengaktifan_kembali', $dosen->sk_pengaktifan_kembali) }}" placeholder="Masukkan SK Pengaktifan Kembali">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary float-right" id="sa-custom-position">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Form Taslab End -->
                </div>
                <!-- Checkbox select Datatable End -->
            </div>
        </div>
</x-admin-app>

