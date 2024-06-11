<x-admin-app>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title font-weight-bold">
                                <h4>Data Dosen Tugas Belajar</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item font-weight-bold h5">
                                        <a href="dashboard.html">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                                    Dosen Tugas Belajar
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
                                <h4 class="text-dark h4">Form Tambah Dosen Tugas Belajar</h4>
                            </div>
                        </div>
                        <hr />
                        <br />
                        <form action="{{ route('superadmin.dosbel.store') }}" method="POST" enctype="multipart/form-data">
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
                                          <label class="font-weight-bold">NIP/NRK</label>
                                          <input type="text" name="nip_nrk" class="form-control" placeholder="Masukkan NIP/NRK" />
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label class="font-weight-bold">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Pilih Status</option>
                                        <option value="PNS">PNS</option>
                                        <option value="Non PNS">Non PNS</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                          <label class="font-weight-bold">Tempat Studi</label>
                                          <input type="text" name="tempat_studi" class="form-control" placeholder="Masukkan Tempat Studi" />
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                          <label class="font-weight-bold">Jenis Beasiswa</label>
                                          <input type="text" name="jenis_beasiswa" class="form-control" placeholder="Masukkan Jenis Beasiswa" />
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                          <label class="font-weight-bold">Mulai Tugas Belajar</label>
                                          <input type="date" name="mulai_tubel" class="form-control" placeholder="Masukkan Mulai Tugas Belajar" />
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                          <label class="font-weight-bold">Selesai Tugas Belajar</label>
                                          <input type="date" name="selesai_tubel" class="form-control" placeholder="Masukkan Selesai Tugas Belajar" />
                                      </div>
                                  </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">SK Tugas Belajar</label>
                                        <select class="form-control" name="sk_tubel" id="sk_tubel">
                                            <option value="">Pilih SK Tugas Belajar</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Perpanjangan Tubel</label>
                                        <select class="form-control" name="perpanjangan_tubel" id="perpanjangan_tubel">
                                            <option value="">Pilih Perpanjangan Tubel</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                          <label class="font-weight-bold">Mulai Perpanjangan</label>
                                          <input type="date" name="mulai_perpanjangan" class="form-control" placeholder="Masukkan Mulai Perpanjangan" />
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                          <label class="font-weight-bold">Selesai Perpanjangan</label>
                                          <input type="date" name="selesai_perpanjangan" class="form-control" placeholder="Masukkan Selesai Perpanjangan" />
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                          <label class="font-weight-bold">Keterangan</label>
                                          <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan" />
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
