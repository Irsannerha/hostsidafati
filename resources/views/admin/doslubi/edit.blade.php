<x-admin-app>
<div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
          <div class="page-header">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="title font-weight-bold">
                  <h4>Data Dosen Luar Biasa</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item font-weight-bold h5">
                      <a href="dashboard.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                    Dosen Luar Biasa
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
            <!-- Form Taslab -->
            <div class="pd-20 card-box mb-30">
              <div class="clearfix">
                <div class="pull-left">
                  <h4 class="text-dark h4">Form Edit Dosen Luasa Biasa</h4>
                </div>
              </div>
              <hr />
              <br />
              @if (Auth::user()->role == 'superadmin')
              <form action="{{ route('superadmin.doslubi.update', $doslubi->id) }}" method="POST" enctype="multipart/form-data">
              @elseif (Auth::user()->role == 'pegawai')
              <form action="{{ route('pegawai.doslubi.update', $doslubi->id) }}" method="POST" enctype="multipart/form-data">
              @endif
                  @csrf
                  @method('PUT')
                  <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Program Studi</label>
                            <select name="prodi_id" class="form-control">
                                <option value="">Pilih Program Studi</option>
                                @foreach($prodi as $prodi)
                                    <option value="{{ $prodi->id }}" {{ $prodi->id == $doslubi->prodi_id ? 'selected' : '' }}>{{ $prodi->prodi }}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Nama</label>
                              <input type="text" name="nama" class="form-control" value="{{ old('nama', $doslubi->nama) }}" placeholder="Masukkan Nama" />
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">NUP/NIDK</label>
                              <input type="text" name="nup_nidk" class="form-control" value="{{ old('nup_nidk', $doslubi->nup_nidk) }}" placeholder="Masukkan NUP/NIDK" />
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Jurusan</label>
                              <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan', $doslubi->jurusan) }}" placeholder="Masukkan NUP/NIDK" />
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Status</label>
                              <select class="form-control" name="status" id="status">
                                  <option value="{{ old('status', $doslubi->status) }}">
                                      {{ old('status', $doslubi->status) }}
                                  </option>
                                  <option value="">Pilih Status</option>
                                  <option value="Purna Tugas atau Pensiunan">Purna Tugas atau Pensiunan</option>
                                  <option value="Dosen Luar Biasa Praktisi">Dosen Luar Biasa Praktisi</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Tanggal Lahir</label>
                              <input type="date" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir', $doslubi->tgl_lahir) }}" placeholder="Masukkan Tanggal Lahir" />
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Jabatan</label>
                              <input type="text" name="jabatan_terakhir" class="form-control" value="{{ old('jabatan_terakhir', $doslubi->jabatan_terakhir) }}" placeholder="Masukkan Jabatan" />
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
