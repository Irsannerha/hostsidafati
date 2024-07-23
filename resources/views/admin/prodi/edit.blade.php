<x-admin-app>
<div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
          <div class="page-header">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="title font-weight-bold">
                  <h4>Data Program Studi</h4>
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
                    Program Studi
                    </li>
                    <li
                      class="breadcrumb-item active font-weight-bold h5"
                      aria-current="page"
                    >
                      Edit Prodi
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
                  <h4 class="text-dark h4">Form Edit Program Studi</h4>
                </div>
              </div>
              <hr />
              <br />
              @if (Auth::user()->role == 'superadmin')
              <form action="{{ route('superadmin.prodi.update', $prodi->id)}}" method="POST" enctype="multipart/form-data">
              @elseif (Auth::user()->role == 'pegawai')
              <form action="{{ route('pegawai.prodi.update', $prodi->id)}}" method="POST" enctype="multipart/form-data">
              @endif
                @csrf
                @method('PUT')
                <div class="row">
                <div class="col-md-3 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Program Studi</label>
                        <input type="text" name="prodi" class="form-control" value="{{ old('prodi', $prodi->prodi) }}" placeholder="Masukkan Nama Program Studi" />
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email', $prodi->email) }}" placeholder="Masukkan Fakultas" />
                      </div>
                    </div>
                    <!-- <div class="col-md-3 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Program Studi</label>
                        <select class="form-control" name="prodi" id="prodi">
                        <option value="{{ old('prodi', $prodi->prodi) }}">
                          {{ old('prodi', $prodi->prodi) }}
                        </option>
                          <option value="">Pilih Prodi</option>
                          <option value="Teknik Informatika">Teknik Informatika</option>
                          <option value="Teknik Elektro">Teknik Elektro</option>
                          <option value="Teknik Geofisika">Teknik Geofisika</option>
                          <option value="Teknik Geologi">Teknik Geologi</option>
                          <option value="Teknik Mesin">Teknik Mesin</option>
                          <option value="Teknik Industri">Teknik Industri</option>
                          <option value="Teknik Kimia">Teknik Kimia</option>
                          <option value="Teknik Fisika">Teknik Fisika</option>
                          <option value="Teknik Biosistem">Teknik Biosistem</option>
                          <option value="Teknik Industri Pertanian">Teknik Industri Pertanian</option>
                          <option value="Teknik Pangan">Teknik Pangan</option>
                          <option value="Teknik Sistem Energi">Teknik Sistem Energi</option>
                          <option value="Teknik Pertambangan">Teknik Pertambangan</option>
                          <option value="Teknik Material">Teknik Material</option>
                          <option value="Teknik Telekomunikasi">Teknik Telekomunikasi</option>
                          <option value="Teknik Biomedis">Teknik Biomedis</option>
                          <option value="Teknik Rekayasa Keolahragaan">Teknik Rekayasa Keolahragaan</option>
                          <option value="Rekayasa Minyak dan Gas">Rekayasa Minyak dan Gas</option>
                          <option value="Rekayasa Instrumentasi dan Automasi">Rekayasa Instrumentasi dan Automasi</option>
                          <option value="Rekayasa Kehutanan">Rekayasa Kehutanan</option>
                          <option value="Rekayasa Kosmetik">Rekayasa Kosmetik</option>
                        </select>
                      </div>
                    </div> -->
                    <div class="col-md-3 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Fakultas</label>
                        <input type="text" name="fakultas" class="form-control" value="{{ old('fakultas', $prodi->fakultas) }}" placeholder="Masukkan Fakultas" />
                      </div>
                    </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Program Pendidikan</label>
                        <select class="form-control" name="prodik" id="prodik">
                        <option value="{{ old('prodik', $prodi->prodik) }}">
                          {{ old('prodik', $prodi->prodik) }}
                        </option>
                        <option value="">Pilih Tingkat Pendidikan</option>
                            <option value="Strata (S1)">Strata (S1)</option>
                            <option value="Magister (S2)">Magister (S2)</option>
                            <option value="Doktor (S3)">Doktor (S3)</option>
                        </select>
                    </div>
                </div>
                    <div class="col-md-3 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Akreditasi Program Studi</label>
                        <select class="form-control" name="akreditasi" id="akreditasi">
                        <option value="{{ old('akreditasi', $prodi->akreditasi) }}">
                          {{ old('akreditasi', $prodi->akreditasi) }}
                        </option>
                          <option value="">Pilih Akreditasi</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Koordinator Program Studi</label>
                        <input type="text" name="kapro" class="form-control" value="{{ old('kapro', $prodi->kapro) }}" placeholder="Masukkan Nama Kepala Prodi" />
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Jumlah Mahasiswa</label>
                        <input type="text" name="jumlah_mahasiswa" class="form-control" value="{{ old('jumlah_mahasiswa', $prodi->jumlah_mahasiswa) }}" placeholder="Masukkan Jumlah Mahasiswa" />
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Tanggal Pendirian</label>
                        <input type="date" name="tgl_pendirian" class="form-control" value="{{ old('tgl_pendirian', $prodi->tgl_pendirian) }}" placeholder="Pilih Tanggal Pendirian" />
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="5" placeholder="Masukkan Deskripsi Program Studi">{{ old('deskripsi', $prodi->deskripsi) }}</textarea>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class="font-weight-bold">SK Program Studi</label>
                            <input type="file" name="sk_prodi" class="form-control-file form-control height-auto" id="sk_prodi">
                            <div id="sk_prodi_info"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                      <div class="form-group">
                          <label class="font-weight-bold">Upload Foto (Ukuran: 683 x 1024)</label>
                          <input type="file" name="foto" class="form-control-file form-control height-auto" accept="image/*" />
                      </div>
                  </div>
                  @if($prodi->foto && file_exists(public_path('storage/'.$prodi->foto)))
                      <div class="col-md-2 col-sm-12">
                          <label class="font-weight-bold">Foto saat ini:</label>
                          <img src="{{ url(asset('storage/'.$prodi->foto)) }}" alt="foto" style="width: 250px; height: 250px; object-fit: cover;">
                      </div>
                  @else
                      <div class="col-md-2 col-sm-12">
                          <label class="font-weight-bold">Foto saat ini:</label>
                          <img src="{{ asset('vendors/images/foto222x304.png') }}" alt="Default Foto" style="width: 250px; height: 250px; object-fit: cover;">
                      </div>
                  @endif
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

