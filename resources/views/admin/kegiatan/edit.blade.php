<x-admin-app>
<div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
          <div class="page-header">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="title font-weight-bold">
                  <h4>Data Izin Kegiatan Mahasiswa HIMA</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item font-weight-bold h5">
                      <a href="dashboard.html">Dashboard</a>
                    </li>
                    <li
                      class="breadcrumb-item active font-weight-bold h5"
                      aria-current="page"
                    >
                    Izin Kegiatan Mahasiswa HIMA
                    </li>
                  </ol>
                </nav>
              </div>
              <div class="col-md-6 col-sm-12 text-right">
                <div class="time">
                  <button
                    id="dateTime"
                    class="btn btn-primary font-weight-bold"
                    type="button"
                    data-toggle="dropdown"
                  >
                    <span id="currentDateTime"></span>
                  </button>
                </div>
              </div>
            </div>
            <!-- Form Tambah Prodi -->
            <div class="pd-20 card-box mb-30">
              <div class="clearfix">
                <div class="pull-left">
                  <h4 class="text-dark h4">Form Edit Izin Kegiatan Mahasiswa HIMA</h4>
                </div>
              </div>
              <hr />
              <br />
              <form action="{{route('superadmin.kegiatan.update', $kegiatan->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Nama Pemohon</label>
                        <input type="text" name="nama_pemohon" class="form-control" value="{{ old('nama_pemohon', $kegiatan->nama_pemohon) }}" placeholder="Masukkan Nama Pemohon" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                          <label class="font-weight-bold">Program Studi</label>
                          <select name="prodi_id" class="form-control">
                              <option value="">Pilih Program Studi</option>
                              @foreach($prodi as $prodi)
                                  <option value="{{ $prodi->id }}" {{ $prodi->id == $kegiatan->prodi_id ? 'selected' : '' }}>{{ $prodi->prodi }}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email', $kegiatan->email) }}" placeholder="Masukkan Email" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Status</label>
                        <select class="form-control" name="status" id="status">
                        <option value="{{ old('status', $kegiatan->status) }}">
                          {{ old('status', $kegiatan->status) }}
                        </option>
                          <option value="">Pilih Status</option>
                          <option value="Selesai">Selesai</option>
                          <option value="Diproses">Diproses</option>
                          <option value="Ditolak">Ditolak</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" class="form-control" value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}" placeholder="Masukkan Nama Kegiatan" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Tanggal Kegiatan</label>
                        <input type="date" name="tgl_kegiatan" class="form-control" value="{{ old('tgl_kegiatan', $kegiatan->tgl_kegiatan) }}" placeholder="Masukkan Tanggal Kegiatan" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Waktu Mulai Kegiatan</label>
                            <input type="time" name="mulai_kegiatan" class="form-control" value="{{ \Carbon\Carbon::parse($kegiatan->mulai_kegiatan)->format('H:i') }}" placeholder="Masukkan Waktu Mulai Kegiatan" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                          <label class="font-weight-bold">Waktu Akhir Kegiatan</label>
                          <input type="time" name="akhir_kegiatan" class="form-control" value="{{ \Carbon\Carbon::parse($kegiatan->akhir_kegiatan)->format('H:i') }}" placeholder="Masukkan Waktu Akhir Kegiatan" />
                      </div>
                  </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Tempat Pelaksanaan</label>
                        <input type="text" name="tempat_pelaksanaan" class="form-control" value="{{ old('tempat_pelaksanaan', $kegiatan->tempat_pelaksanaan) }}" placeholder="Masukkan Tempat Pelaksanaan" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Jumlah Peserta</label>
                        <input type="number" name="jumlah_peserta" class="form-control" value="{{ old('jumlah_peserta', $kegiatan->jumlah_peserta) }}" placeholder="Masukkan Jumlah Peserta" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Penanggung Jawab</label>
                        <input type="text" name="penanggung_jawab" class="form-control" value="{{ old('penanggung_jawab', $kegiatan->penanggung_jawab) }}" placeholder="Masukkan Penanggung Jawab" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">No. HP</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $kegiatan->no_hp) }}" placeholder="Masukkan No. Hp" />
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Deskripsi</label>
                        <textarea name="keterangan" class="form-control" rows="5" placeholder="Masukkan Keterangan">{{ old('keterangan', $kegiatan->keterangan) }}</textarea>
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
            <!-- Form Tambah Prodi End -->
          </div>
          <!-- Checkbox select Datatable End -->
        </div>
    </div>
</x-admin-app>
