<x-mahasiswa-app>
    <div class="main-container">
        <!-- Content start -->
        <section class="bg-home bg-hexa" id="home">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 text-center">
                                <div class="title-heading mt-4">
                                    <h1 class="heading mb-1 font-weight-bold text-black">
                                        Form Pengajuan Tugas Akhir
                                    </h1>
                                    <p class="para-desc text-black">
                                        Selamat datang di Formulir Pengajuan Tugas Akhir Mahasiswa Fakultas Teknologi
                                        Industri
                                        ITERA. Formulir ini disediakan khusus untuk mahasiswa Fakultas Teknologi
                                        Industri ITERA
                                        yang akan mengajukan permohonan Tugas Akhir.
                                        Melalui formulir ini, Anda dapat mengajukan permohonan Tugas Akhir dengan mudah
                                        serta
                                        mengisi semua data yang diperlukan untuk menunjang kegiatan Tugas Akhir Anda.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- home end -->
        <!-- clients start -->
        <section id="FormPengajuanTA">
            <div class="container">
                <div class="clients p-4 bg-gradient-1">
                    <a href=" {{ route('mahasiswa.form-bukrim.create')}}" class="btn btn-primary float-right btn-key">
                        <i class="fa fa-pencil-square-o"></i>
                        Isi Tanda Terima Berkas Dokumen
                    </a>
                    <div class="card-body">
                        <div class="col-md-12">
                        </div>
                        <h2 class="title">Form Pengajuan Tugas Akhir</h2>
                        <small class="text-dark font-5" style="margin-top: 10px; display: block;"><em>*Note: Harap
                                dibaca
                                panduan di bawah kolom!</em></small>
                        <br>
                        <form action="{{ route('mahasiswa.form-ta.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input class="form-control @error('nama') is-invalid @enderror" type="text" placeholder="Nama" name="nama" id="nama" value="{{ old('nama', $mahasiswa->nama) }}" required @readonly(true)>
                                    </div>
                                    @error('nama')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Nama Anda</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input class="form-control @error('nim') is-invalid @enderror" type="number" placeholder="NIM" name="nim" id="nim" value="{{ old('nim', $mahasiswa->nim) }}" required @readonly(true)>
                                    </div>
                                    @error('nim')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi NIM</small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prodi_id">Program Studi</label>
                                        <select name="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror">
                                            <option value="">Pilih Program Studi</option>
                                            @foreach($prodi as $p)
                                                <option value="{{ $p->id }}" {{ old('prodi_id', $mahasiswa->prodi_id) == $p->id ? 'selected' : '' }} >{{ $p->prodi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('prodi_id')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Prodi dan Pastikan Telah Sesuai </small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="keperluan">Keperluan</label>
                                        <select class="form-control" name="keperluan" id="keperluan" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Permohonan Izin Penelitian Tugas Akhir" {{ old('keperluan') == 'Permohonan Izin Penelitian Tugas Akhir' ? 'selected' : '' }}>Permohonan Izin
                                                Penelitian
                                                Tugas Akhir</option>
                                            <option value="Permohonan Data Tugas Akhir" {{ old('keperluan') == 'Permohonan Data Tugas Akhir' ? 'selected' : '' }}>Permohonan Data Tugas Akhir
                                            </option>
                                        </select>
                                    </div>
                                    @error('keperluan')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Keperluan</small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="instansi">Instansi</label>
                                        <input class="form-control @error('instansi') is-invalid @enderror" type="text" placeholder="Instansi" name="instansi"
                                            id="instansi" value="{{ old('instansi') }}" required>
                                    </div>
                                    @error('instansi')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Instansi</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat_instansi">Alamat Instansi</label>
                                        <textarea class="form-control @error('alamat_instansi') is-invalid @enderror" placeholder="Masukkan Alamat Instansi"
                                            name="alamat_instansi" id="alamat_instansi" rows="3">{{ old('alamat_instansi') }}</textarea>
                                    </div>
                                    @error('alamat_instansi')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Contoh :
                                        Jalan. Soekarno Hatta No. 10, Bandar Lampung </small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tjp">Tujuan Jabatan Pimpinan</label>
                                        <input class="form-control" type="text" placeholder="Tujuan Jabatan Pimpinan"
                                            name="tjp" id="tjp" value="{{ old('tjp') }}" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*TIDAK
                                        PERLU
                                        memasukan Nama Pimpinan, Kecuali Permintaan dari Instansi Terkait </small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pelaksanaan">Pelaksanaan</label>
                                        <select class="form-control @error('pelaksanaan') is-invalid @enderror" name="pelaksanaan" id="pelaksanaan" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Offline" {{ old('pelaksanaan') == 'Offline' ? 'selected' : '' }}>Offline</option>
                                            <option value="Online" {{ old('pelaksanaan') == 'Online' ? 'selected' : '' }}>Online</option>
                                        </select>
                                    </div>
                                    @error('pelaksanaan')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Contoh :
                                        Offline atau Online</small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="waktu_mulai_pelaksanaan">Waktu Mulai Pelaksanaan</label>
                                        <input class="form-control @error('waktu_mulai_pelaksanaan') is-invalid @enderror" type="date" placeholder="Waktu Mulai Pelaksanaan"
                                            name="waktu_mulai_pelaksanaan" id="waktu_mulai_pelaksanaan" value="{{ old('waktu_mulai_pelaksanaan') }}" required>
                                    </div>
                                    @error('waktu_mulai_pelaksanaan')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Contoh :
                                        29/09/1999 </small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="waktu_akhir_pelaksanaan">Waktu Akhir Pelaksanaan</label>
                                        <input class="form-control @error('waktu_akhir_pelaksanaan') is-invalid @enderror" type="date" placeholder="Waktu Akhir Pelaksanaan"
                                            name="waktu_akhir_pelaksanaan" id="waktu_akhir_pelaksanaan" value="{{ old('waktu_akhir_pelaksanaan') }}" required>
                                    </div>
                                    @error('waktu_akhir_pelaksanaan')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Contoh :
                                        29/10/2000</small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp">No. Hp Mahasiswa</label>
                                        <input class="form-control @error('no_hp') is-invalid @enderror" type="number" placeholder="No.Hp" name="no_hp"
                                            id="no_hp" value="{{ old('no_hp') }}" required>
                                    </div>
                                    @error('no_hp')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi No Hp Tanpa Tanda (+) Contoh: 6281234567890</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Mahasiswa</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email"
                                            id="email" value="{{ old('email', $mahasiswa->email) }}" required @readonly(true)>
                                    </div>
                                    @error('email')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Email
                                        Student ITERA @student.itera.ac.id</small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_pembimbing_satu">Nama Pembimbing Satu</label>
                                        <input class="form-control @error('nama_pembimbing_satu') is-invalid @enderror" type="text" placeholder="Nama Pembimbing Satu"
                                            name="nama_pembimbing_satu" id="nama_pembimbing_satu" value="{{ old('nama_pembimbing_satu') }}" required>
                                    </div>
                                    @error('nama_pembimbing_satu')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Penulisan
                                        nama lengkap dengan gelar</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_pembimbing_dua">Nama Pembimbing Dua</label>
                                        <input class="form-control @error('nama_pembimbing_dua') is-invalid @enderror" type="text" placeholder="Nama Pembimbing Dua"
                                            name="nama_pembimbing_dua" id="nama_pembimbing_dua" value="{{ old('nama_pembimbing_dua') }}" required>
                                    </div>
                                    @error('nama_pembimbing_dua')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Penulisan
                                        nama lengkap dengan gelar</small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul">Judul TA/Keperluan TA</label>
                                        <textarea class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan Judul TA/Keperluan TA"
                                            name="judul" id="judul" rows="3">{{ old('judul') }}</textarea>
                                    </div>
                                    @error('judul')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Judul
                                        TA/Keperluan TA </small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- <div class="notification">
            <div class="notification__message success">
                <h1>SELAMAT DATANG!</h1>
                <p>👋 Halo Mahasiswa ITERA!. Selamat datang di Sistem Informasi SIDAFATI! ini adalah Halaman Formulir
                    Pengajuan
                    Tugas Akhir!. Silahkan Diisi ya..</p>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div> -->
        <!-- clients end -->
        <!-- features start -->
        <section class="section-sm" id="faq" style="margin-top: 100px">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mb-4 pb-1">
                            <h2>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </h2>
                            <p class="text-muted">Form Pengajuan Tugas Akhir</p>
                        </div>
                    </div>
                </div>

                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </section>
        <!-- End Content -->
    </div>
</x-mahasiswa-app>
<!-- Sweet Alert -->
@if(session('success_create_data'))
    <script>
        swal({
            position: 'center',
            type: 'success',
            title: "{{ session('success_create_data') }}",
            showConfirmButton: false,
            timer: 3000
        })
    </script>
@elseif(session('error_create_data'))
    <script>
        swal({
            position: 'center',
            type: 'error',
            title: "{{ session('error_create_data') }}",
            showConfirmButton: false,
            timer: 3000
        })
    </script>
@endif
