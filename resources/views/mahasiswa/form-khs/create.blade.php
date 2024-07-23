<x-mahasiswa-app>
    <div class="main-container">
        <!-- Content start -->
        <!-- home end -->

        <!-- clients start -->
        <section id="FormPengajuanKHS">
            <div class="container">
                <div class="clients p-4 bg-gradient-1">
                    <a href="{{ route('mahasiswa.form-bukrim.create')}}" class="btn btn-primary float-right btn-key">
                        <i class="fa fa-pencil-square-o"></i>
                        Isi Tanda Terima Berkas Dokumen
                    </a>
                    <div class="card-body">
                        <div class="col-md-12">
                        </div>
                        <h2 class="title">Form Pengajuan KHS/Transkrip/Dokumen</h2>
                        <small class="text-dark font-5" style="margin-top: 10px; display: block;"><em>*Note: Inputan
                                Harus
                                mewakili 1 nama, tidak boleh lebih dari 1 nama</em></small>
                        <br>
                        <form action="{{ route('mahasiswa.form-khs.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input class="form-control" type="text" placeholder="Nama" name="nama" id="nama"
                                            required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Nama
                                        Anda</small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input class="form-control" type="text" placeholder="NIM" name="nim" id="nim"
                                            required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        NIM</small>
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
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Prodi</small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="keperluan">Keperluan</label>
                                        <select class="form-control" name="keperluan" id="keperluan" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="KHS">KHS</option>
                                            <option value="Transkrip">Transkrip</option>
                                            <option value="KHS dan Transkrip">KHS dan Transkrip</option>
                                            <option value="Dokumen Lainnya">Dokumen Lainnya</option>
                                        </select>
                                    </div>
                                    <small class="text-dark font-5"
                                        style="margin-top: -10px; display: block;">*Perhatian!!
                                        Hanya di isi bila Dokumen yang diajukan bukan KHS atau Transkrip</small>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp_mhs">No. Hp Mahasiswa</label>
                                        <input class="form-control" type="text" placeholder="No.Hp" name="no_hp_mhs"
                                            id="no_hp_mhs" requir Mahasiswaed>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Nomor Hp
                                        Mahasiswa</small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Mahasiswa</label>
                                        <input class="form-control" type="email" placeholder="Email" name="email"
                                            id="email" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Email
                                        Student ITERA @student.itera.ac.id</small>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Dokumen</label>
                                        <input class="form-control" type="text" placeholder="Jumlah" name="jumlah"
                                            id="jumlah" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Jumlah
                                        Dokumen</small>
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
        <!-- clients end -->

        <!-- <div class="notification">
            <div class="notification__message success">
                <h1>SELAMAT DATANG!</h1>
                <p>👋 Halo Mahasiswa ITERA!. Selamat datang di Sistem Informasi SIDAFATI! ini adalah Halaman Formulir
                    Pengajuan KHS/Transkrip/Dokumen!. Silahkan Diisi ya..</p>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div> -->

        <!-- features start -->
        <section class="section-sm" id="faq" style="margin-top: 100px">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mb-4 pb-1">
                            <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
                            <p class="text-muted">Form Pengajuan KHS/Transkrip/Dokumen Lainnya (Untuk Mahasiswa)</p>
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
        });
    </script>
@endif
