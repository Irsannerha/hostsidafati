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
                  Form Pengajuan Legalisir ijazah, Transkrip, Akreditasi prodi, dan dokumen lainnya (KHUSUS ALUMNI)
                </h1>
                <p class="para-desc text-white">
                  Selamat datang di Formulir Pengajuan Legalisir ijazah, Transkrip, Akreditasi Prodi dan Dokumen Mahasiswa Fakultas Teknologi Industri ITERA. Formulir ini disediakan khusus untuk mahasiswa Fakultas Teknologi Industri ITERA.
                  Melalui formulir ini, Anda dapat mengajukan permohonan Legalisir ijazah, Transkrip, Akreditasi Prodi dan Dokumen Lainnya dengan mudah serta mengisi semua data yang diperlukan dengan benar dan lengkap.
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
  <section id="FormPengajuanLegal">
    <div class="container">
      <div class="clients p-4 bg-gradient-1">
      <a href="{{ route('formbukrim')}}" class="btn btn-primary float-right btn-key">
          <i class="fa fa-pencil-square-o"></i>
          Isi Tanda Terima Berkas Dokumen
      </a>
        <div class="card-body">
          <div class="col-md-12">
          </div>
          <h2 class="title">Form  Pengajuan Legalisir ijazah, Transkrip, Akreditasi prodi, dan dokumen lainnya (KHUSUS ALUMNI)</h2>
          <small class="text-dark font-5" style="margin-top: -10px; display: block;"><em>*Note: Waktu Estimasi Dokumen jadi adalah paling lambat 3 hari Kerja, silahkan cek web pengajuan berkala ya! Terimakasih.</em></small>
          <br>
          <form action="{{ route('formlegal.store') }}" method="POST">
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
                    <option value="Ijazah">Ijazah</option>
                    <option value="Akreditasi Prodi">Akreditasi Prodi</option>
                    <option value="Transkrip">Transkrip</option>
                    <option value="Ijazah dan Transkrip">Ijazah dan Transkrip</option>
                    <option value="Ijazah, Transkrip dan Akreditasi">Ijazah, Transkrip dan Akreditasi</option>
                    <option value="Dokumen Lainnya">Dokumen Lainnya</option>
                  </select>
                </div>
                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Perhatian!! Harus di isi bila Dokumen lebih dari satu keperluan atau dokumen dengan keperluan lain yang tidak ada di kolom pilihan untuk dilegalisir</small>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="no_hp_mhs">No. Hp Mahasiswa</label>
                  <input class="form-control" type="text" placeholder="No.Hp" name="no_hp_mhs" id="no_hp_mhs" required>
                </div>
                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Nomor Hp</small>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" type="email" placeholder="Email" name="email" id="email" required>
                </div>
                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Email Student ITERA @student.itera.ac.id</small>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="jumlah_legal">Jumlah Legalisir</label>
                  <input class="form-control" type="number" placeholder="Jumlah Legalisir" name="jumlah_legal" id="jumlah_legal" required>
                </div>
                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Jumlah Legalisir maks 5 Lembar</small>
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

  <div class="notification">
    <div class="notification__message success">
      <h1>SELAMAT DATANG!</h1>
      <p>👋 Halo Mahasiswa ITERA!. Selamat datang di Sistem Informasi SIDAFATI! ini adalah Halaman Formulir Pengajuan Legalisir Ijazah, Transkrip, Akreditasi Prodi dan Dokumen!. Silahkan Diisi ya..</p>
      <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>

  <!-- features start -->
  <section class="section-sm" id="faq" style="margin-top: -100px">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="text-center mb-4 pb-1">
            <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
            <p class="text-muted">Form Legalisir Ijazah, Transkrip, Akreditasi Prodi dan Dokumen (Untuk ALUMNI)</p>
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
  });
</script>
@endif