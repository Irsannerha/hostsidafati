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
                                <h4 class="text-dark h4">Form Tambah Dosen Luar Biasa</h4>
                            </div>
                        </div>
                        <hr />
                        <br />
                        <form action="{{ route('superadmin.doslubi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                  <label class="font-weight-bold">Program Studi</label>
                                  <select name="prodi_id" class="form-control">
                                      <option value="">Pilih Program Studi</option>
                                      @foreach($prodi as $prodi)
                                          <option value="{{ $prodi->id }}">{{ $prodi->prodi }}</option>
                                      @endforeach
                                  </select>
                              </div>
                            </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" />
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label class="font-weight-bold">NUP/NIDK</label>
                                      <input type="text" name="nup_nidk" class="form-control" placeholder="Masukkan NUP/NIDK" />
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                          <label class="font-weight-bold">Jurusan</label>
                                          <input type="text" name="jurusan" class="form-control" placeholder="Masukkan Jurusan" />
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label class="font-weight-bold">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Pilih Status</option>
                                        <option value="Purna Tugas atau pensiunan">Purna Tugas atau Pensiunan</option>
                                        <option value="Dosen Luar Biasa Praktisi">Dosen Luar Biasa Praktisi</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                          <label class="font-weight-bold">Tanggal Lahir</label>
                                          <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" />  
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                          <label class="font-weight-bold">Jabatan Terakhir</label>
                                          <input type="text" name="jabatan_terakhir" class="form-control" placeholder="Masukkan Jabatan Terakhir" />
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
