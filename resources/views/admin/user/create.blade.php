<x-admin-app>
<div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
          <div class="page-header">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="title font-weight-bold">
                  <h4>Data User</h4>
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
                      User
                    </li>
                    <li
                      class="breadcrumb-item active font-weight-bold h5"
                      aria-current="page"
                    >
                      Tambah Data User 
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
                  <h4 class="text-dark h4">Form Tambah Data User</h4>
                </div>
              </div>
              <hr />
              <br />
              <form action="{{route('superadmin.user.store')}}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label class="font-weight-bold">Nama</label>
                      <input type="text" name="name" class="form-control" />
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label class="font-weight-bold">Email</label>
                      <input type="text" name="email" class="form-control" />
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label class="font-weight-bold">Password</label>
                      <input type="password" name="password" class="form-control" />
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label class="font-weight-bold">Role</label>
                      <select class="form-control" name="role" id="role">
                        <option value="">Pilih Role</option>
                        <option value="superadmin">Super Admin</option>
                        <option value="pegawai">Pegawai</option>
                        <option value="akademik">Akademik</option>
                        <option value="kemahasiswaan">Kemahasiswaan</option>
                        <option value="keuangan">Keuangan</option>
                        <option value="prodi">Prodi</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label class="font-weight-bold">Status</label>
                     <select class="form-control" name="status" id="status">
                        <option value="">Pilih Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="tidak aktif">Tidak Aktif</option>
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
            <!-- Form Tambah Prodi End -->
          </div>
          <!-- Checkbox select Datatable End -->
        </div>
  </div>
</x-admin-app>
