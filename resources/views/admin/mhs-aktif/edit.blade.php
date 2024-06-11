<x-admin-app>
  <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
        <div class="page-header">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="title font-weight-bold">
                <h4>Data Jumlah Mahasiswa Aktif TS + PMB </h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item font-weight-bold h5">
                    <a href="dashboard.html">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                    Data Jumlah Mahasiswa Aktif TS + PMB
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
                <h4 class="text-dark h4">Form Edit </h4>
              </div>
            </div>
            <hr />
            <br />
            <form action="{{route('superadmin.mhs-aktif.update', $mhsaktif->id )}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Program Studi</label>
                    <select name="prodi_id" class="form-control">
                      <option value="">Pilih Program Studi</option>
                      @foreach($prodi as $prodi)
                      <option value="{{ $prodi->id }}" {{ $prodi->id == $mhsaktif->prodi_id ? 'selected' : '' }}>{{ $prodi->prodi }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Tahun</label>
                    <select name="tahun_id" class="form-control">
                      <option value="">Pilih Tahun</option>
                      @foreach($tahun as $thnid)
                      <option value="{{ $thnid->id }}" {{ $thnid->id == $mhsaktif->tahun_id ? 'selected' : '' }}>{{ $thnid->tahun }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Jumlah Mahasiswa Aktif TS</label>
                    <input type=number" name="jumlah_mhs_aktif_ts" class="form-control" value="{{ old('jumlah_mhs_aktif_ts', $mhsaktif->jumlah_mhs_aktif_ts) }}" placeholder="Jumlah Mahasiswa Aktif TS" />
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Jumlah Mahasiswa Aktif Tahun</label>
                    <input type="number" name="jumlah_mhs_aktif_th" class="form-control" value="{{ old('jumlah_mhs_aktif_th', $mhsaktif->jumlah_mhs_aktif_th) }}" placeholder="Jumlah Mahasiswa Aktif Tahun" />
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
</x-admin-app>