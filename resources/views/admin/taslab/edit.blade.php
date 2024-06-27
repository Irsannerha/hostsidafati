<x-admin-app>
<div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
          <div class="page-header">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="title font-weight-bold">
                  <h4>Data Taslab</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item font-weight-bold h5">
                      <a href="dashboard.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                    Taslab
                    </li>
                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                      Edit Tendik, Asmik, Dan Laboran
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
                  <h4 class="text-dark h4">Form Edit Tendik, Asmik, Dan Laboran</h4>
                </div>
              </div>
              <hr />
              <br />
              @if (Auth::user()->role == 'superadmin')
              <form action="{{ route('superadmin.taslab.update', $taslab->id) }}" method="POST" enctype="multipart/form-data">
                @elseif (Auth::user()->role == 'pegawai')
                <form action="{{ route('pegawai.taslab.update', $taslab->id) }}" method="POST" enctype="multipart/form-data">
                @endif
                  @csrf
                  @method('PUT')
                  <div class="row">
                      <div class="col-md-4 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Nama</label>
                              <input type="text" name="nama" class="form-control" value="{{ old('nama', $taslab->nama) }}" placeholder="Masukkan Nama" />
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Unit Kerja</label>
                              <input type="text" name="unit_kerja" class="form-control" value="{{ old('unit_kerja', $taslab->unit_kerja) }}" placeholder="Masukkan Unit Kerja" />
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Pendidikan</label>
                              <select class="form-control" name="pendidikan" id="pendidikan">
                                  <option value="{{ old('pendidikan', $taslab->pendidikan) }}">
                                      {{ old('pendidikan', $taslab->pendidikan) }}
                                  </option>
                                  <option value="">Pilih Tingkat Pendidikan</option>
                                  <option value="Strata (S1)">Strata (S1)</option>
                                  <option value="Magister (S2)">Magister (S2)</option>
                                  <option value="Doktor (S3)">Doktor (S3)</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Terhitung Mulai Tanggal</label>
                              <input type="date" name="tmt" class="form-control" value="{{ old('tmt', $taslab->tmt) }}" placeholder="Masukkan Terhitung Mulai Tanggal" />
                          </div>
                      </div>
                      <!-- <div class="col-md-4 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Masa Kerja</label>
                              <input type="text" name="masa_kerja" class="form-control" value="{{ old('masa_kerja', $taslab->masa_kerja) }}" placeholder="Masukkan Masa Kerja" />
                          </div>
                      </div> -->
                      <div class="col-md-4 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Status Pegawai</label>
                              <select class="form-control" name="status_pegawai" id="status_pegawai">
                                  <option value="{{ old('status_pegawai', $taslab->status_pegawai) }}">
                                      {{ old('status_pegawai', $taslab->status_pegawai) }}
                                  </option>
                                  <option value="">Status Pegawai</option>
                                  <option value="ASN">ASN</option>
                                  <option value="Non ASN">Non ASN</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Jabatan</label>
                              <select class="form-control" name="jabatan" id="jabatan">
                                  <option value="{{ old('jabatan', $taslab->jabatan) }}">
                                      {{ old('jabatan', $taslab->jabatan) }}
                                  </option>
                                  <option value="">Pilih Jabatan</option>
                                  <option value="Tendik">Tendik</option>
                                  <option value="Asmik">Asmik</option>
                                  <option value="Laboran">Laboran</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Bagian Tugas</label>
                              <input type="text" name="bagian_tugas" class="form-control" value="{{ old('bagian_tugas', $taslab->bagian_tugas) }}" placeholder="Masukkan Bagian Tugas" />
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">NITK</label>
                              <input type="text" name="nitk" class="form-control" value="{{ old('nitk', $taslab->nitk) }}" placeholder="Masukkan NITK" />
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Tanggal Lahir</label>
                              <input type="date" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir', $taslab->tgl_lahir) }}" placeholder="Pilih Tanggal Lahir" />
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Nomor HP</label>
                              <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $taslab->no_hp) }}" placeholder="Masukkan Nomor HP" />
                          </div>
                      </div>
                      <!-- <div class="col-md-3 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Umur</label>
                              <input type="text" name="umur" class="form-control" value="{{ old('umur', $taslab->umur) }}" placeholder="Masukkan Umur" />
                          </div>
                      </div> -->
                      <div class="col-md-3 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Email</label>
                              <input type="text" name="email" class="form-control" value="{{ old('email', $taslab->email) }}" placeholder="Masukkan Email" />
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
