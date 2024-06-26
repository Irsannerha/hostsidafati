<x-admin-app>
  <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
        <div class="page-header">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="title font-weight-bold">
                <h4>Edit Data Mahasiswa Lulus TS</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item font-weight-bold h5">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                    Edit Data Mahasiswa Lulus TS
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
          <!-- Form Edit Prodi -->
          <div class="pd-20 card-box mb-30">
            <div class="clearfix">
              <div class="pull-left">
                <h4 class="text-dark h4">Form Edit</h4>
              </div>
            </div>
            <hr />
            <br />
            @if(Auth::user()->role == 'superadmin')
            <form action="{{ route('superadmin.lulus.update', $lulus->id) }}" method="POST" enctype="multipart/form-data">
            @elseif (Auth::user()->role == 'akademik')
            <form action="{{ route('akademik.lulus.update', $lulus->id) }}" method="POST" enctype="multipart/form-data">
            @endif
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Tahun</label>
                    <select name="ts_id" class="form-control">
                      <option value="">Pilih Tahun</option>
                      @foreach($tahun as $thnid)
                      <option value="{{ $thnid->id }}" {{ $lulus->ts_id == $thnid->id ? 'selected' : '' }}>{{ $thnid->ts }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Program Studi</label>
                    <select name="prodi_id" class="form-control">
                      <option value="">Pilih Program Studi</option>
                      @foreach($prodi as $p)
                      <option value="{{ $p->id }}" {{ $lulus->prodi_id == $p->id ? 'selected' : '' }}>{{ $p->prodi }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-5 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Januari</label>
                    <input type="number" name="januari" class="form-control" value="{{ old('januari', $lulus->januari) }}" placeholder="Masukkan Jumlah Mahasiswa Lulus TS Januari" />
                  </div>
                </div>
                <div class="col-md-5 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Februari</label>
                    <input type="number" name="februari" class="form-control" value="{{ old('februari', $lulus->februari) }}" placeholder="Masukkan Jumlah Mahasiswa Lulus TS Februari" />
                  </div>
                </div>
                <div class="col-md-5 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Maret</label>
                    <input type="number" name="maret" class="form-control" value="{{ old('maret', $lulus->maret) }}" placeholder="Masukkan Jumlah Mahasiswa Lulus TS Maret" />
                  </div>
                </div>
                <div class="col-md-5 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">April</label>
                    <input type="number" name="april" class="form-control" value="{{ old('april', $lulus->april) }}" placeholder="Masukkan Jumlah Mahasiswa Lulus TS April" />
                  </div>
                </div>
                <div class="col-md-5 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Mei</label>
                    <input type="number" name="mei" class="form-control" value="{{ old('mei', $lulus->mei) }}" placeholder="Masukkan Jumlah Mahasiswa Lulus TS Mei" />
                  </div>
                </div>
                <div class="col-md-5 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Juni</label>
                    <input type="number" name="juni" class="form-control" value="{{ old('juni', $lulus->juni) }}" placeholder="Masukkan Jumlah Mahasiswa Lulus TS Juni" />
                  </div>
                </div>
                <div class="col-md-5 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Juli</label>
                    <input type="number" name="juli" class="form-control" value="{{ old('juli', $lulus->juli) }}" placeholder="Masukkan Jumlah Mahasiswa Lulus TS Juli" />
                  </div>
                </div>
                <div class="col-md-5 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Agustus</label>
                    <input type="number" name="agustus" class="form-control" value="{{ old('agustus', $lulus->agustus) }}" placeholder="Masukkan Jumlah Mahasiswa Lulus TS Agustus" />
                  </div>
                </div>
                <div class="col-md-5 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">September</label>
                    <input type="number" name="september" class="form-control" value="{{ old('september', $lulus->september) }}" placeholder="Masukkan Jumlah Mahasiswa Lulus TS September" />
                  </div>
                </div>
                <div class="col-md-5 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Oktober</label>
                    <input type="number" name="oktober" class="form-control" value="{{ old('oktober', $lulus->oktober) }}" placeholder="Masukkan Jumlah Mahasiswa Lulus TS Oktober" />
                  </div>
                </div>
                <div class="col-md-5 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">November</label>
                    <input type="number" name="november" class="form-control" value="{{ old('november', $lulus->november) }}" placeholder="Masukkan Jumlah Mahasiswa Lulus TS November" />
                  </div>
                </div>
                <div class="col-md-5 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Desember</label>
                    <input type="number" name="desember" class="form-control" value="{{ old('desember', $lulus->desember) }}" placeholder="Masukkan Jumlah Mahasiswa Lulus TS Desember" />
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
          <!-- Form Edit Prodi End -->
        </div>
        <!-- Checkbox select Datatable End -->
      </div>
    </div>
</x-admin-app>
