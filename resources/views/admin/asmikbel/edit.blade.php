<x-admin-app>
<div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
          <div class="page-header">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="title font-weight-bold">
                  <h4>Data Asmik Tugas Belajar</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item font-weight-bold h5">
                      <a href="dashboard.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                    Asmik Tubel
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
                  <h4 class="text-dark h4">Form Edit Asmik Tugas Belajar</h4>
                </div>
              </div>
              <hr />
              <br />
                @if (Auth::user()->role == 'superadmin')
              <form action="{{ route('superadmin.asmikbel.update', $asmikbel->id) }}" method="POST" enctype="multipart/form-data">
                @elseif (Auth::user()->role == 'pegawai')
                <form action="{{ route('pegawai.asmikbel.update', $asmikbel->id) }}" method="POST" enctype="multipart/form-data">
                @endif
                  @csrf
                  @method('PUT')
                  <div class="row">
                        <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Program Studi</label>
                            <select name="prodi_id" class="form-control">
                                <option value="">Pilih Program Studi</option>
                                @foreach($prodi as $prodi)
                                    <option value="{{ $prodi->id }}" {{ $prodi->id == $asmikbel->prodi_id ? 'selected' : '' }}>{{ $prodi->prodi }}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Nama</label>
                              <input type="text" name="nama" class="form-control" value="{{ old('nama', $asmikbel->nama) }}" placeholder="Masukkan Nama" />
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">NIP/NRK</label>
                              <input type="text" name="nip_nrk" class="form-control" value="{{ old('nip_nrk', $asmikbel->nip_nrk) }}" placeholder="Masukkan NIP/NRK" />
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Status</label>
                              <select class="form-control" name="status" id="status">
                                  <option value="{{ old('status', $asmikbel->status) }}">
                                      {{ old('status', $asmikbel->status) }}
                                  </option>
                                  <option value="">Pilih Status</option>
                                  <option value="PNS">PNS</option>
                                  <option value="Non PNS">Non PNS</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Studi Lanjut</label>
                              <input type="text" name="studi_lanjut" class="form-control" value="{{ old('studi_lanjut', $asmikbel->studi_lanjut) }}" placeholder="Masukkan Studi Lanjut" />
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Beasiswa</label>
                              <input type="text" name="beasiswa" class="form-control" value="{{ old('beasiswa', $asmikbel->beasiswa) }}" placeholder="Masukkan Beasiswa" />
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Mulai Tugas Belajar</label>
                              <input type="date" name="mulai_tubel" class="form-control" value="{{ old('mulai_tubel', $asmikbel->mulai_tubel) }}" placeholder="Pilih Tanggal Mulai" />
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Selesai Tugas Belajar</label>
                              <input type="date" name="selesai_tubel" class="form-control" value="{{ old('selesai_tubel', $asmikbel->selesai_tubel) }}" placeholder="Pilih Tanggal Mulai" />
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">SK Tugas Belajar</label>
                              <select class="form-control" name="sk_tubel" id="sk_tubel">
                                  <option value="{{ old('sk_tubel', $asmikbel->sk_tubel) }}">
                                      {{ old('sk_tubel', $asmikbel->sk_tubel) }}
                                  </option>
                                  <option value="">Pilih SK Tugas Belajar</option>
                                  <option value="Ada">Ada</option>
                                  <option value="Tidak Ada">Tidak Ada</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Status Asmik</label>
                              <select class="form-control" name="status_asmik" id="status_asmik">
                                  <option value="{{ old('status_asmik', $asmikbel->status_asmik) }}">
                                      {{ old('status_asmik', $asmikbel->status_asmik) }}
                                  </option>
                                  <option value="">Pilih Status Asmik</option>
                                  <option value="Lulus">Lulus</option>
                                  <option value="Tidak Lulus">Tidak Lulus</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Keterangan</label>
                              <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan', $asmikbel->keterangan) }}" placeholder="Masukkan Email" />
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
