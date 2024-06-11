<x-admin-app>
<div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
          <div class="page-header">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="title font-weight-bold">
                  <h4>Data Resign</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item font-weight-bold h5">
                      <a href="dashboard.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                      Resign
                    </li>
                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                      Tambah Data Resign 
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
            <!-- Form Tambah Resign -->
            <div class="pd-20 card-box mb-30">
              <div class="clearfix">
                <div class="pull-left">
                  <h4 class="text-dark h4">Form Tambah Data Resign</h4>
                </div>
              </div>
              <hr />
              <br />
              <form action="{{route('superadmin.resign.store')}}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label class="font-weight-bold">Nama</label>
                      <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama"/>
                    </div>
                  </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                      <label class="font-weight-bold">Program Studi</label>
                      <select name="prodi_id" class="form-control">
                          <option value="">Pilih Program Studi</option>
                          @foreach($prodis as $prodi)
                              <option value="{{ $prodi->id }}">{{ $prodi->prodi }}</option>
                          @endforeach
                      </select>
                  </div>
                </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                      <label class="font-weight-bold">Nomor Registrasi Kepegawaian</label>
                      <input type="text" name="nrk" class="form-control" placeholder="Masukkan NRK" />
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                      <label class="font-weight-bold">Nomor Induk Dosen Nasional</label>
                      <input type="text" name="nidn" class="form-control" placeholder="Masukkan NIDN" />
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                      <label class="font-weight-bold">Jenis Kelamin</label>
                      <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Terhitung Mulai Tanggal Masuk</label>
                        <input type="date" name="tmt_masuk" class="form-control" placeholder="Terhitung Mulai Tanggal Masuk" />
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Terhitung Mulai Tanggal Keluar</label>
                        <input type="date" name="tmt_keluar" class="form-control" placeholder="Terhitung Mulai Tanggal Keluar" />
                      </div>
                    </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Alasan</label>
                        <textarea name="alasan" class="form-control" rows="5" placeholder="Masukkan Alasannya"></textarea>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Surat Keterangan</label>
                       <select class="form-control" name="surat_keterangan" id="surat_keterangan">
                          <option value="">Pilih Surat Keterangan</option>
                          <option value="Ada">Ada</option>
                          <option value="Tidak Ada">Tidak Ada</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <button
                      type="submit"
                      class="btn btn-primary float-right"
                      id="sa-custom-position"
                    ><i class="fa fa-save"></i>
                       Simpan
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <!-- Form Tambah Resign End -->
          </div>
          <!-- Checkbox select Datatable End -->
        </div>
    </div>
</x-admin-app>
