<x-mahasiswa-app>
    <!-- Content start -->
    <div class="main-container">
        <section class="bg-home bg-hexa" id="home">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 text-center">
                                <div class="title-heading mt-4">
                                    <h1 class="heading mb-1 font-weight-bold text-black">
                                        Form Tanda Bukti Penerimaan Berkas
                                    </h1>
                                    <p class="para-desc text-black">
                                        Selamat datang di Formulir Tanda Bukti Penerimaan Berkas Fakultas Teknologi
                                        Industri
                                        ITERA. Formulir ini adalah Bukti mendata dokumen yang sudah diterima.
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
        <section id="FormPengajuanBKR">
            <div class="container">
                <div class="clients p-4 bg-gradient-1">
                    <div class="card-body">
                        <div class="col-md-12">
                        </div>
                        <h2 class="title">Form Tanda Bukti Penerimaan Berkas</h2>
                        <small class="text-dark font-5" style="margin-top: 10px; display: block;"><em>*Note: Harap
                                dibaca
                                panduan di bawah kolom!</em></small>
                        <br>
                        <form action="{{ route('mahasiswa.form-bukrim.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_dok">Nama yang tertera di Dokumen</label>
                                        <input class="form-control" type="text" value="" data-role="tagsinput"
                                            placeholder="Nama" name="nama_dok" id="nama_dok" />
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Nama
                                        Anda/Bila nama lebih dari satu tulis kan namanya satu satu, lalu
                                        Inputkan</small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama Pengambil Dokumen</label>
                                        <input class="form-control" type="text" placeholder="Nama" name="nama" id="nama"
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
                                        <label for="nim">NIM pengambil</label>
                                        <input class="form-control" type="text" placeholder="NIM" name="nim" id="nim"
                                            required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        NIM</small>
                                </div>
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
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_berkas">Jenis Berkas</label>
                                        <input class="form-control" placeholder="Masukkan Jenis Berkasnya"
                                            name="jenis_berkas" id="jenis_berkas"></input>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Jenis
                                        Berkas </small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jumlah_dok">Jumlah Dokumen</label>
                                        <input class="form-control" placeholder="Masukkan Jumlah Dokumen"
                                            name="jumlah_dok" id="jumlah_dok"></input>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Jumlah
                                        Dokumen </small>
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
            <div class="notification__message">
                <h1>SELAMAT DATANG!</h1>
                <p>👋 Halo Mahasiswa ITERA!. Selamat datang di SIDAFATI! ini adalah Halaman Formulir Tanda Bukti
                    Penerimaan
                    Berkas!. Silahkan Diisi ya..</p>
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
                            <p class="text-muted">Form Pengajuan Pengantar Wawancara</p>
                        </div>
                    </div>
                </div>

                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </section>

    </div>
    <!-- End Content -->
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
@endif
