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
                                    Form Pengajuan Pengantar Wawancara
                                </h1>
                                <p class="para-desc text-white">
                                Selamat datang di Formulir Pengajuan Pengantar Wawancara Fakultas Teknologi Industri ITERA. Formulir ini adalah langkah pertama dalam proses Pengajuan Pengantar Wawancara.
                                Melalui formulir ini, Anda dapat mengajukan permohonan Pengantar Wawancara Mahasiswa yang akan diproses oleh Fakultas Teknologi Industri ITERA.
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
    <section id="FormPengajuanWCR">
        <div class="container">
            <div class="clients p-4 bg-gradient-1">
                <a href="{{ route('formbukrim')}}" class="btn btn-primary float-right btn-key">
                    <i class="fa fa-pencil-square-o"></i>
                    Isi Tanda Terima Berkas Dokumen
                </a>
                <div class="card-body">
                    <div class="col-md-12"></div>
                    <h2 class="title">Form Pengajuan Pengantar Wawancara</h2>
                    <small class="text-dark font-5" style="margin-top: -10px; display: block;"><em>*Note: Harap dibaca panduan di bawah kolom!</em></small>
                    <br>
                    <form action="{{ route('formwcr.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nama">Nama</label>
                                <div class="card-box">
                                    <div class="mb-10">
                                        <input type="text" value="" data-role="tagsinput" placeholder="Nama" name="nama" id="nama" />
                                    </div>
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Nama Anda/Bila Berkelompok Harap Diisi sebagai berikut, Contoh: 1.Yanto Prasmana 2.Farid Sulistyo 3.Angga Prasetyo</small>
                            </div>
                            <div class="col-md-6">
                                <label for="nim">NIM</label>
                                <div class="card-box">
                                    <div class="mb-10">
                                        <input type="text" value="" data-role="tagsinput" placeholder="NIM" name="nim" id="nim" />
                                    </div>
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Bila NIM Lebih dari satu mengikuti urutan Nama yang diisi,Contoh: (1)15312497 (2)15312499 (3)15312498</small>
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
                                    <label for="instansi">Nama Instansi</label>
                                    <input class="form-control" type="text" placeholder="Instansi" name="instansi" id="instansi" required>
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Nama Instansi </small>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat_instansi">Alamat Instansi</label>
                                    <textarea class="form-control" placeholder="Masukkan Alamat Instansi" name="alamat_instansi" id="alamat_instansi" rows="2"></textarea>
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Contoh : Jalan. Soekarno Hatta No. 10, Bandar Lampung </small>
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
        <div class="notification__message">
            <h1>SELAMAT DATANG!</h1>
            <p>👋 Halo Mahasiswa ITERA!. Selamat datang di SIDAFATI! ini adalah Halaman Formulir Pengajuan Pengantar Wawancara!. Silahkan Diisi ya..</p>
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
                        <p class="text-muted">Form Pengajuan Pengantar Wawancara</p>
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
