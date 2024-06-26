<x-admin-app>
<div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
          <div class="page-header">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="title font-weight-bold">
                  <h4>Data Prestasi Mahasiswa</h4>
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
                    Prestasi Mahasiswa
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
                  <h4 class="text-dark h4">Form Edit Prestasi Mahasiswa</h4>
                </div>
              </div>
              <hr />
              <br />
              <form action="{{route('superadmin.prestasi.update', $prestasi->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Nama Mahasiswa/Peserta/Ketua</label>
                        <input type="text" name="nama_mahasiswa" class="form-control" value="{{ old('nama_mahasiswa', $prestasi->nama_mahasiswa) }}" placeholder="Masukkan Nama Mahasiswa/Peserta/Ketua" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                          <label class="font-weight-bold">Program Studi</label>
                          <select name="prodi_id" class="form-control">
                              <option value="">Pilih Program Studi</option>
                              @foreach($prodi as $prodi)
                                  <option value="{{ $prodi->id }}" {{ $prodi->id == $prestasi->prodi_id ? 'selected' : '' }}>{{ $prodi->prodi }}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Nama TIM/Kelompok</label>
                        <input type="text" name="nama_tim" class="form-control" value="{{ old('nama_tim', $prestasi->nama_tim) }}" placeholder="Masukkan Nama TIM/Kelompok" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">NIM</label>
                        <input type="text" name="nim" class="form-control" value="{{ old('nim', $prestasi->nim) }}" placeholder="Masukkan Nama NIM " />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Kontak</label>
                        <input type="text" name="kontak" class="form-control" value="{{ old('kontak', $prestasi->kontak) }}" placeholder="Masukkan Nama TIM/Kelompok" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Jenis Prestasi</label>
                        <input type="text" name="jenis_prestasi" class="form-control" value="{{ old('jenis_prestasi', $prestasi->jenis_prestasi) }}" placeholder="Masukkan Jenis Prestasi" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Jumlah Peserta</label>
                        <input type="number" name="jumlah_peserta" class="form-control" value="{{ old('jumlah_peserta', $prestasi->jumlah_peserta) }}" placeholder="Masukkan Jumlah Peserta" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Kategori Olahraga</label>
                        <input type="text" name="kategori_olahraga" class="form-control" value="{{ old('kategori_olahraga', $prestasi->kategori_olahraga) }}" placeholder="Masukkan Kategori Olahraga" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Tahun Kegiatan</label>
                        <input type="text" name="tahun_kegiatan" class="form-control" value="{{ old('tahun_kegiatan', $prestasi->tahun_kegiatan ? \Carbon\Carbon::parse($prestasi->tahun_kegiatan)->format('Y') : '') }}" placeholder="Masukkan Tahun Kegiatan" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">URL Penyelenggara</label>
                        <input type="text" name="url_penyelenggara" class="form-control" value="{{ old('url_penyelenggara', $prestasi->url_penyelenggara) }}" placeholder="Masukkan URL Penyelenggara" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Nama Penyelenggara</label>
                        <input type="text" name="nama_penyelenggara" class="form-control" value="{{ old('nama_penyelenggara', $prestasi->nama_penyelenggara) }}" placeholder="Masukkan Nama Penyelenggara" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Tanggal Kegiatan</label>
                        <input type="date" name="tgl_kegiatan" class="form-control" value="{{ old('tgl_kegiatan', $prestasi->tgl_kegiatan) }}" placeholder="Masukkan Tanggal Kegiatan" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Tingkat Kejuaraan</label>
                        <input type="text" name="tingkat_kejuaraan" class="form-control" value="{{ old('tingkat_kejuaraan', $prestasi->tingkat_kejuaraan) }}" placeholder="Masukkan Tingkat Kejuaraan" />
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Judul Karya</label>
                        <input type="text" name="judul_karya" class="form-control" value="{{ old('judul_karya', $prestasi->judul_karya) }}" placeholder="Masukkan Judul Karya" />
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Anggota Karya</label>
                        <textarea name="anggota_karya" class="form-control" rows="5" placeholder="Masukkan anggota_karya Program Studi">{{ old('anggota_karya', $prestasi->anggota_karya) }}</textarea>
                      </div>
                    </div>
                    <!-- @php
              $foto = json_decode($prestasi->foto);
              @endphp
                    <!-- Ini foto -->
                    <!-- <div class="col-lg-6 col-md-12 col-sm-12 mb-10">
                        <div class="card-box mb-10" data-bgcolor="#d0d0d0">
                            <div class="clearfix pd-10">
                                <div class="pull-left">
                                    <span class="btn btn-outline-primary btn-lg" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.7rem;">
                                        {{ $prestasi->nama_mahasiswa }}
                                    </span>
                                </div>
                            </div>
                            <div id="carouselExampleControls{{ $prestasi->id }}" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($foto as $index => $item)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <div class="card card-box">
                                                <img class="card-img" src="{{ asset('assets/foto/' . $item) }}" alt="Card image">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls{{ $prestasi->id }}" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls{{ $prestasi->id }}" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div> -->
                    <!-- Akhir Foto -->
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
