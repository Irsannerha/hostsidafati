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
                <form action="{{route('superadmin.jumlah_dosen.update', $prodi->id)}}" method="POST">
              @elseif (Auth::user()->role == 'pegawai')
                <form action="{{route('pegawai.jumlah_dosen.update', $prodi->id)}}" method="POST">
              @endif
                @csrf
                @method('PUT')
                <div class="row">
                <div class="col-md-3 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Program Studi</label>
                        <input type="text" name="prodi" class="form-control" value="{{ old('prodi', $prodi->prodi) }}" readonly />
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Jumlah</label>
                        <input type="text" name="jumlah_dosen" class="form-control" value="{{ old('jumlah_dosen', $prodi->jumlah_dosen) }}" placeholder="Masukkan Fakultas" />
                      </div>
                    </div>
                    <!-- <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Upload Foto</label>
                        <input type="file" name="foto" class="form-control-file" accept="image/*" />
                    </div>
                    </div> -->
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
