<x-admin-app>
<div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
          <div class="page-header">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="title font-weight-bold">
                  <h4>Data Pengajuan Pengantar Wawancara Mahasiswa</h4>
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
                    Pengajuan Pengantar Wawancara Mahasiswa
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
            <!-- Form Edit Pengajuan Tugas Akhir Mahasiswa -->
            <div class="pd-20 card-box mb-30">
              <div class="clearfix">
                <div class="pull-left">
                  <h4 class="text-dark h4">Form Edit Pengajuan Tugas Akhir Mahasiswa</h4>
                </div>
              </div>
              <hr />
              <br />
              <form action="{{ route ('superadmin.form-wcr.update', $formwcr->id )}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label class="font-weight-bold">Status</label>
                          <select name="status" class="form-control">
                            <option value="Selesai" {{ $formwcr->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="Diproses" {{ $formwcr->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="Ditolak" {{ $formwcr->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label class="font-weight-bold">Keterangan (Catatan)</label>
                          <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan', $formwcr->keterangan) }}" placeholder="Masukkan Keterangan" />
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
                          <option value="{{ $p->id }}" {{ $p->id == $formwcr->prodi_id ? 'selected' : '' }}>{{ $p->prodi }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label class="font-weight-bold">Nama</label>
                      <input type="text" name="nama" class="form-control" value="{{ old('nama', $formwcr->nama) }}" placeholder="Masukkan Nama" />
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label class="font-weight-bold">NIM</label>
                      <input type="text" name="nim" class="form-control" value="{{ old('nim', $formwcr->nim) }}" placeholder="Masukkan NIM" />
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label class="font-weight-bold">Instansi</label>
                      <input type="text" name="instansi" class="form-control" value="{{ old('instansi', $formwcr->instansi) }}" placeholder="Masukkan Nama Instansi" />
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label class="font-weight-bold">Alamat Instansi</label>
                      <input type="text" name="alamat_instansi" class="form-control" value="{{ old('alamat_instansi', $formwcr->alamat_instansi) }}" placeholder="Masukkan Alamat Instansi" />
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
