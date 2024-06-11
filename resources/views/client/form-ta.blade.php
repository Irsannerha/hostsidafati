<x-client-app>
        <!-- Content start -->
        <section class="bg-home bg-hexa" id="home">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 text-center">
                                <div class="title-heading mt-4">
                                    <h1 class="heading mb-1 font-weight-bold text-white">
                                        Form Pengajuan Tugas Akhir
                                    </h1>
                                    <p class="para-desc text-white">
                                    Selamat datang di Formulir Pengajuan Tugas Akhir Mahasiswa Fakultas Teknologi Industri ITERA. Formulir ini disediakan khusus untuk mahasiswa Fakultas Teknologi Industri ITERA yang akan mengajukan permohonan Tugas Akhir.
                                    Melalui formulir ini, Anda dapat mengajukan permohonan Tugas Akhir dengan mudah serta mengisi semua data yang diperlukan untuk menunjang kegiatan Tugas Akhir Anda.
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
                <div class="clients p-4 bg-gradient-1"">
                <a href="{{ route('formbukrim')}}" class="btn btn-primary float-right btn-key">
                        <i class="fa fa-pencil-square-o"></i>
                        Isi Tanda Terima Berkas Dokumen
                    </a>
                    <div class="card-body">
                        <div class="col-md-12">
                            </div>
                            <h2 class="title">Form Pengajuan Tugas Akhir</h2>
                            <small class="text-dark font-5" style="margin-top: -10px; display: block;"><em>*Note: Harap dibaca panduan di bawah kolom!</em></small>
                            <br>
                        <form action="{{ route('formta.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input class="form-control" type="text" placeholder="Nama" name="nama" id="nama" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Nama Anda</small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input class="form-control" type="text" placeholder="NIM" name="nim" id="nim" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi NIM</small>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prodi_id">Program Studi</label>
                                        <select name="prodi_id" class="form-control">
                                            <option value="">Pilih Program Studi</option>
                                            @foreach($prodi as $p)
                                                <option value="{{ $p->id }}">{{ $p->prodi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Prodi</small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="keperluan">Keperluan</label>
                                        <select class="form-control" name="keperluan" id="keperluan" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Permohonan Izin Penelitian Tugas Akhir">Permohonan Izin Penelitian Tugas Akhir</option>
                                            <option value="Permohonan Data Tugas Akhir">Permohonan Data Tugas Akhir</option>
                                        </select>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Pilih Keperluan</small>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="instansi">Instansi</label>
                                        <input class="form-control" type="text" placeholder="Instansi" name="instansi" id="instansi" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Instansi </small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat_instansi">Alamat Instansi</label>
                                        <textarea class="form-control" placeholder="Masukkan Alamat Instansi" name="alamat_instansi" id="alamat_instansi" rows="3"></textarea>
                                    </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Contoh : Jalan. Soekarno Hatta No. 10, Bandar Lampung </small>
                            </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tjp">Tujuan Jabatan Pimpinan</label>
                                        <input class="form-control" type="text" placeholder="Tujuan Jabatan Pimpinan" name="tjp" id="tjp">
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*TIDAK PERLU memasukan Nama Pimpinan, Kecuali Permintaan dari Instansi Terkait </small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pelaksanaan">Pelaksanaan</label>
                                        <select class="form-control" name="pelaksanaan" id="pelaksanaan" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Offline">Offline</option>
                                            <option value="Online">Online</option>
                                        </select>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Contoh : Offline atau Online</small>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="waktu_mulai_pelaksanaan">Waktu Mulai Pelaksanaan</label>
                                        <input class="form-control" type="date" placeholder="Waktu Mulai Pelaksanaan" name="waktu_mulai_pelaksanaan" id="waktu_mulai_pelaksanaan" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Contoh : 09/09/1999 </small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="waktu_akhir_pelaksanaan">Waktu Akhir Pelaksanaan</label>
                                        <input class="form-control" type="date" placeholder="Waktu Akhir Pelaksanaan" name="waktu_akhir_pelaksanaan" id="waktu_akhir_pelaksanaan" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Contoh : 10/10/2000</small>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp">No. Hp Mahasiswa</label>
                                        <input class="form-control" type="text" placeholder="No.Hp" name="no_hp" id="no_hp" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Nomor Hp</small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Mahasiswa</label>
                                        <input class="form-control" type="email" placeholder="Email" name="email" id="email" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Email Student ITERA @student.itera.ac.id</small>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_pembimbing_satu">Nama Pembimbing Satu</label>
                                        <input class="form-control" type="text" placeholder="Nama Pembimbing Satu" name="nama_pembimbing_satu" id="nama_pembimbing_satu" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Penulisan nama lengkap dengan gelar</small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_pembimbing_dua">Nama Pembimbing Dua</label>
                                        <input class="form-control" type="text" placeholder="Nama Pembimbing Dua" name="nama_pembimbing_dua" id="nama_pembimbing_dua" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Penulisan nama lengkap dengan gelar</small>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul">Judul TA/Keperluan TA</label>
                                        <textarea class="form-control" placeholder="Masukkan Judul TA/Keperluan TA" name="judul" id="judul" rows="3"></textarea>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Judul TA/Keperluan TA </small>
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
        <div class="notification">
            <div class="notification__message success">
                <h1>SELAMAT DATANG!</h1>
                <p>👋 Halo Mahasiswa ITERA!. Selamat datang di Sistem Informasi SIDAFATI! ini adalah Halaman Formulir Pengajuan Tugas Akhir!. Silahkan Diisi ya..</p>
                    <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                 </button>
            </div>
        </div>
        <!-- clients end -->
        <!-- features start -->
        <section class="section-sm" id="faq" style="margin-top: -100px">
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
</x-client-app>
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
@endif
