<x-admin-app>
<div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
          <div class="page-header">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="title font-weight-bold">
                  <h4>Data Pejabat</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item font-weight-bold h5">
                      <a href="dashboard.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                    Pejabat Fakultas Teknologi Industri
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
            <!-- Form Pejabat Fakultas Teknologi Industri -->
            <div class="pd-20 card-box mb-30">
              <div class="clearfix">
                <div class="pull-left">
                  <h4 class="text-dark h4">Form Edit Pejabat Fakultas Teknologi Industri</h4>
                </div>
              </div>
              <hr />
              <br />
              <form action="{{ route('superadmin.pejabat.update', $pejabat->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row">
                      <div class="col-md-4 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Nama</label>
                              <input type="text" name="nama" class="form-control" value="{{ old('nama', $pejabat->nama) }}" placeholder="Masukkan Nama" />
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">NIP</label>
                              <input type="text" name="nip" class="form-control" value="{{ old('nip', $pejabat->nip) }}" placeholder="Masukkan NIP " />
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Pangkat Golongan</label>
                              <select class="form-control" name="pangkat_golongan" id="pangkat_golongan">
                                  <option value="{{ old('pangkat_golongan', $pejabat->pangkat_golongan) }}">
                                      {{ old('pangkat_golongan', $pejabat->pangkat_golongan) }}
                                  </option>
                                  <option value="">Pangkat Golongan</option>
                                  <option value="Golongan Ia - Juru Muda">Golongan Ia - Juru Muda</option>
                                  <option value="Golongan Ib - Juru Muda Tingkat I">Golongan Ib - Juru Muda Tingkat I</option>
                                  <option value="Golongan Ic - Juru">Golongan Ic - Juru</option>
                                  <option value="Golongan Id - Juru Tingkat I">Golongan Id - Juru Tingkat I</option>

                                  <option value="Golongan IIa - Pengatur Muda">Golongan IIa - Pengatur Muda</option>
                                  <option value="Golongan IIb - Pengatur Muda Tingkat I">Golongan IIb - Pengatur Muda Tingkat I</option>
                                  <option value="Golongan IIc - Pengatur">Golongan IIc - Pengatur</option>
                                  <option value="Golongan IId - Pengatur Tingkat I">Golongan IId - Pengatur Tingkat I </option>

                                  <option value="Golongan IIIa - Penata Muda">Golongan IIIa - Penata Muda</option>
                                  <option value="Golongan IIIb - Penata Tingkat I">Golongan IIIb - Penata Muda Tingkat I</option>
                                  <option value="Golongan IIIc - Penata">Golongan IIIc - Penata</option>
                                  <option value="Golongan IIId - Penata Tingkat I">Golongan IIId - Penata Tingkat I</option>

                                  <option value="Golongan IVa - Pembina">Golongan IVa - Pembina</option>
                                  <option value="Golongan IVb - Pembina Tingkat I">Golongan IVb - Pembina Tingkat I</option>
                                  <option value="Golongan IVc - Pembina Muda">Golongan IVc - Pembina Muda</option>
                                  <option value="Golongan IVd - Pembina Madya">Golongan IVd - Pembina Madya</option>
                                  <option value="Golongan IVe - Pembina Utama">Golongan IVe - Pembina Utama</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                          <div class="form-group">
                              <label class="font-weight-bold">Jabatan</label>
                              <select class="form-control" name="jabatan" id="jabatan">
                                  <option value="{{ old('jabatan', $pejabat->jabatan) }}">
                                      {{ old('jabatan', $pejabat->jabatan) }}
                                  </option>
                                  <option value="">Pilih Jabatan</option>
                                  <option value="Dekan">Dekan</option>
                                  <option value="Wakil Dekan 1">Wakil Dekan 1</option>
                                  <option value="Wakil Dekan 2">Wakil Dekan 2</option>
                              </select>
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
            <!-- Form Pejabat Fakultas Teknologi Industri End -->
          </div>
          <!-- Checkbox select Datatable End -->
        </div>
    </div>
</x-admin-app>
