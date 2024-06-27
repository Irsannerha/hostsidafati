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
                  <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">Program Studi</li>
                  <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">Tambah Prodi</li>
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
                <h4 class="text-dark h4">Form Tambah Prodi</h4>
              </div>
            </div>
            <hr />
            <br />
            @if (Auth::user()->role == 'superadmin')
            <form action="{{ route('superadmin.prodi.store')}}" method="POST" enctype="multipart/form-data">
            @elseif (Auth::user()->role == 'pegawai')
            <form action="{{ route('pegawai.prodi.store')}}" method="POST" enctype="multipart/form-data">
            @endif
              @csrf
              <div class="row">
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Program Studi</label>
                    <input type="text" name="prodi" class="form-control" placeholder="Masukkan Nama Program Studi" />
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Masukkan Email" />
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Koordinator Prodi</label>
                    <input type="text" name="kapro" class="form-control" placeholder="Masukkan Nama Koor Prodi" />
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Fakultas</label>
                    <input type="text" name="fakultas" class="form-control" placeholder="Masukkan Fakultas" />
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Program Pendidikan</label>
                    <select class="form-control" name="prodik" id="prodik">
                      <option value="">Program Pendidikan</option>
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
                      <option value="">Pilih Akreditasi</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Jumlah Mahasiswa</label>
                    <input type="text" name="jumlah_mahasiswa" class="form-control" placeholder="Masukkan Jumlah Mahasiswa" />
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Tanggal Pendirian</label>
                    <input type="date" name="tgl_pendirian" class="form-control" placeholder="Pilih Tanggal Pendirian" />
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="5" placeholder="Masukkan Deskripsi Program Studi"></textarea>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Upload Foto (Ukuran: 683 x 1024)</label>
                    <input type="file" name="foto" class="form-control-file form-control height-auto" accept="image/*" />
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label class="font-weight-bold">SK Program Studi</label>
                          <input type="file" name="sk_prodi" class="form-control-file form-control height-auto" id="sk_prodi">
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
  </div>
</x-admin-app>
