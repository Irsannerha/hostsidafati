<x-mahasiswa-app>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title font-weight-bold">
                                <h4>Data Pengajuan Tugas Akhir Mahasiswa</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item font-weight-bold h5">
                                        <a href="dashboard.html">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                                        Pengajuan Tugas Akhir Mahasiswa
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <div class="time">
                                <button id="dateTime" class="btn btn-primary font-weight-bold" type="button"
                                    data-toggle="dropdown">
                                    <span id="currentDateTime"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Form Edit Pengajuan Tugas Akhir Mahasiswa -->
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-dark h4">Form Edit Pengajuan Tugas Akhir Mahasiswa</h4>
                            </div>
                        </div>
                        <hr />
                        <br />
                        <form action="{{ route('mahasiswa.form-ta.update', $formta->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="Selesai" {{ $formta->status == 'Selesai' ? 'selected' : '' }}>
                                                Selesai</option>
                                            <option value="Diproses" {{ $formta->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                            <option value="Ditolak" {{ $formta->status == 'Ditolak' ? 'selected' : '' }}>
                                                Ditolak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Keterangan (Catatan)</label>
                                        <input type="text" name="keterangan" class="form-control"
                                            value="{{ old('keterangan', $formta->keterangan) }}"
                                            placeholder="Masukkan Keterangan" />
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <br />
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Program Studi</label>
                                        <select name="prodi_id" class="form-control">
                                            <option value="">Pilih Program Studi</option>
                                            @foreach($prodi as $p)
                                                <option value="{{ $p->id }}" {{ $p->id == $formta->prodi_id ? 'selected' : '' }}>{{ $p->prodi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama</label>
                                        <input type="text" name="nama" class="form-control"
                                            value="{{ old('nama', $formta->nama) }}" placeholder="Masukkan Nama" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">NIM</label>
                                        <input type="text" name="nim" class="form-control"
                                            value="{{ old('nim', $formta->nim) }}" placeholder="Masukkan NIM" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Keperluan</label>
                                        <select name="keperluan" class="form-control">
                                            <option value="Permohonan Izin Penelitian Tugas Akhir" {{ $formta->keperluan == 'Permohonan Izin Penelitian Tugas Akhir' ? 'selected' : '' }}>Permohonan Izin Penelitian Tugas Akhir</option>
                                            <option value="Permohonan Data Tugas Akhir" {{ $formta->keperluan == 'Permohonan Data Tugas Akhir' ? 'selected' : '' }}>
                                                Permohonan Data Tugas Akhir</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Instansi</label>
                                        <input type="text" name="instansi" class="form-control"
                                            value="{{ old('instansi', $formta->instansi) }}"
                                            placeholder="Masukkan Nama Instansi" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Alamat Instansi</label>
                                        <input type="text" name="alamat_instansi" class="form-control"
                                            value="{{ old('alamat_instansi', $formta->alamat_instansi) }}"
                                            placeholder="Masukkan Alamat Instansi" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tujuan Jabatan Pimpinan</label>
                                        <input type="text" name="tjp" class="form-control"
                                            value="{{ old('tjp', $formta->tjp) }}"
                                            placeholder="Masukkan Tujuan Jabatan Pimpinan" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Pelaksanaan</label>
                                        <select name="pelaksanaan" class="form-control">
                                            <option value="Offline" {{ $formta->pelaksanaan == 'Offline' ? 'selected' : '' }}>Offline</option>
                                            <option value="Online" {{ $formta->pelaksanaan == 'Online' ? 'selected' : '' }}>Online</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Waktu Mulai Pelaksanaan</label>
                                        <input type="date" name="waktu_mulai_pelaksanaan" class="form-control"
                                            value="{{ old('waktu_mulai_pelaksanaan', $formta->waktu_mulai_pelaksanaan) }}" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Waktu Akhir Pelaksanaan</label>
                                        <input type="date" name="waktu_akhir_pelaksanaan" class="form-control"
                                            value="{{ old('waktu_akhir_pelaksanaan', $formta->waktu_akhir_pelaksanaan) }}" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">No. HP</label>
                                        <input type="text" name="no_hp" class="form-control"
                                            value="{{ old('no_hp', $formta->no_hp) }}" placeholder="Masukkan No. HP" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', $formta->email) }}" placeholder="Masukkan Email" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Pembimbing Satu</label>
                                        <input type="text" name="nama_pembimbing_satu" class="form-control"
                                            value="{{ old('nama_pembimbing_satu', $formta->nama_pembimbing_satu) }}"
                                            placeholder="Masukkan Nama Pembimbing Satu" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Pembimbing Dua</label>
                                        <input type="text" name="nama_pembimbing_dua" class="form-control"
                                            value="{{ old('nama_pembimbing_dua', $formta->nama_pembimbing_dua) }}"
                                            placeholder="Masukkan Nama Pembimbing Dua" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Judul</label>
                                        <textarea name="judul" class="form-control"
                                            placeholder="Masukkan Judul">{{ old('judul', $formta->judul) }}</textarea>
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
                    <!-- Form Edit Pengajuan Tugas Akhir Mahasiswa End -->
                </div>
            </div>
        </div>
        </x-admin-app>