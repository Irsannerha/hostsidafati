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
                                    Form Data Prestasi Mahasiswa
                                </h1>
                                <p class="para-desc text-white">
                                    Form ini digunakan untuk Pendataan Prestasi Mahasiswa di
                                    Fakultas Teknologi Industri.
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
    <section id="FormPrestasiMahasiwa">
        <div class="container">
            <div class="clients p-4 bg-gradient-1" style="margin-top: -117px">
                <div class="card-body">
                    <h2 class="title">Form Prestasi Mahasiswa</h2>
                    <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_tim">Nama Tim/Kelompok</label>
                                    <input class="form-control" type="text" placeholder="Nama Tim" name="nama_tim" id="nama_tim" required>
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Jika bukan Tim/Kelompok silahkan di isi Tanda (-)</small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_mahasiswa">Nama Peserta/Ketua</label>
                                    <input class="form-control" type="text" placeholder="Nama Peserta/Ketua" name="nama_mahasiswa" id="nama_mahasiswa" required />
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Jika bukan Peserta/Ketua silahkan di isi Tanda (-)</small>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input class="form-control" type="text" placeholder="NIM" name="nim" id="nim" required />
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi NIM Anda</small>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="prodi_id">Program Studi</label>
                                    <select name="prodi_id" class="form-control">
                                        <option value="">Pilih Program Studi</option>
                                        @foreach($prodi as $prodi)
                                        <option value="{{ $prodi->id }}">{{ $prodi->prodi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Prodi</small>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kontak">Kontak/No.Telp/WA</label>
                                    <input class="form-control" type="text" placeholder="Kontak/No.Telp/WA" name="kontak" id="kontak" required />
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Nomor Hp/Telp/Wa</small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_prestasi">Jenis Prestasi</label>
                                    <input class="form-control" type="text" placeholder="Jenis Prestasi" name="jenis_prestasi" id="jenis_prestasi" required />
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Jenis Prestasi (misalnya Juara 1, 2, 3 atau Memperoleh Juara Medali Emas, Perak)</small>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jumlah_peserta">Jumlah Peserta/Orang</label>
                                    <input class="form-control" type="number" placeholder="Jumlah Peserta" name="jumlah_peserta" id="jumlah_peserta" required />
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Jumlah Peserta</small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori_olahraga">Kategori Olahraga/Cabang Olahraga</label>
                                    <input class="form-control" type="text" placeholder="Kategori Olahraga/Cabang Olahraga" name="kategori_olahraga" id="kategori_olahraga" required />
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Contoh : Karya Tulis Ilmiah, Olimpiade Sains, Gemastik, Kejuraan Nasional, Dll. </small>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tahun_kegiatan">Tahun Kegiatan</label>
                                    <input class="form-control" type="number" placeholder="Tahun Kegiatan" name="tahun_kegiatan" id="tahun_kegiatan" required />
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Tahun Kegiatan Dilaksanakan nya </small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="url_penyelenggara">URL/Link Penyelenggara Kegiatan/Lomba</label>
                                    <input class="form-control" type="text" placeholder="URL Penyelenggara" name="url_penyelenggara" id="url_penyelenggara" required />
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Link Informasi lomba dari Sosmed/Website</small>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_penyelenggara">Nama Penyelenggara</label>
                                    <input class="form-control" type="text" placeholder="Nama Penyelenggara" name="nama_penyelenggara" id="nama_penyelenggara" required />
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Contoh : ITERA, Himpunan, Fakultas, atau di Kementerian, dll </small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                                    <input class="form-control" type="date" name="tgl_kegiatan" id="tgl_kegiatan" required />
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Contoh: 09/09/1999</small>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tingkat_kejuaraan">Tingkat Kejuaraan</label>
                                    <input class="form-control" type="text" placeholder="Tingkat Kejuaraan" name="tingkat_kejuaraan" id="tingkat_kejuaraan" required />
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi contoh : Provinsi/Nasional/Internasional Dll</small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="foto">Foto Peserta Lomba & Hadiah (Perunggu, Piala, Piagam, Dll)</label>
                                    <input class="form-control" type="file" name="foto[]" id="foto" required multiple />
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Berupa Foto Peserta Lomba</small>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="judul_karya">Judul Karya</label>
                                    <input class="form-control" type="text" placeholder="Judul Karya" name="judul_karya" id="judul_karya" required />
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Judul untuk Karya Ilmiah (Jika bukan Karya Ilmiah silahkan di isi Tanda (-))</small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="anggota_karya">Anggota Karya</label>
                                    <textarea class="form-control" placeholder="Masukkan daftar anggota karya" name="anggota_karya" id="anggota_karya" rows="5"></textarea>
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Contoh : User/120190045/Teknik Informatika. </small>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="notification">
            <div class="notification__message">
                <h1>SELAMAT DATANG!</h1>
                    <p>👋 Halo Mahasiswa ITERA!. Selamat datang di Formulir Pendataan Prestasi!</p>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </section>

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
                        <p class="text-muted">Form Prestasi Mahasiswa</p>
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