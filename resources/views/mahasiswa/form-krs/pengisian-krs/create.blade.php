<x-mahasiswa-app>
    <div class="main-container">
        <!-- Content start -->
        <!-- home end -->
        <!-- clients start -->
        <section id="FormPermohonanPerubahanKRS">
            <div class="container">
                <div class="clients p-4 bg-gradient-1">
                    <a href=" {{ route('mahasiswa.form-bukrim.create')}}" class="btn btn-primary float-right btn-key">
                        <i class="fa fa-pencil-square-o"></i>
                        Isi Tanda Terima Berkas Dokumen
                    </a>
                    <div class="card-body">
                        <div class="col-md-12">
                        </div>
                        <h2 class="title">Form Permohonan Perubahan KRS</h2>
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
                                        <input class="form-control @error('nama') is-invalid @enderror" type="text" placeholder="Nama" name="nama" id="nama"  required @readonly(true)>
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
                                        <input class="form-control @error('nim') is-invalid @enderror" type="number" placeholder="NIM" name="nim" id="nim" required @readonly(true)>
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
                                        </select>
                                    </div>
                                    @error('prodi_id')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Prodi dan Pastikan Telah Sesuai </small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="tahun_ak">Tahun Akademik</label>
                                    <div class="form-group row relative">
                                        <div class="col-md-6">
                                            <input class="form-control @error('tahun_ak1') is-invalid @enderror" type="datetime" placeholder="Tahun awal periode" name="tahun_ak" id="tahun_ak1" required>
                                            <!-- <span class="text-2xl">/</span> -->
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control @error('tahun_ak2') is-invalid @enderror" type="datetime" placeholder="Tahun awal periode" name="tahun_ak" id="tahun_ak2" required>
                                        </div>
                                    </div>
                                    @error('tahun_ak1')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Tahun akademik</small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <input class="form-control @error('semester') is-invalid @enderror" type="text" placeholder="Semester" name="semester"
                                            id="semester" value="{{ old('semester') }}" required>
                                    </div>
                                    @error('semester')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Instansi</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="doswal">Dosen wali</label>
                                        <input class="form-control" type="text" placeholder="Tujuan Jabatan Pimpinan"
                                            name="doswal" id="doswal" value="{{ old('doswal') }}" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="koor_prodi">Koordinator Prodi</label>
                                        <input class="form-control" type="text" placeholder="Tujuan Jabatan Pimpinan"
                                            name="koor_prodi" id="koor_prodi" value="{{ old('koor_prodi') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alasan">Alasan Perubahan KRS</label>
                                        <textarea class="form-control @error('alasan') is-invalid @enderror" placeholder="Masukkan Alamat Instansi"
                                            name="alasan" id="alasan" rows="3">{{ old('alasan') }}</textarea>
                                    </div>
                                    @error('alasan')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12 bg-primary-main text-white font-bold text-center py-2 rounded-10">Mata Kuliah Lama</div>
                            <br>

                            <!-- Section Matkul Lama -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_matkul_lama">Nama Matkul Lama</label>
                                        <input class="form-control" type="text" placeholder="Nama MK tanpa disingkat. Contoh : Kimia Dasar"
                                            name="nama_matkul_lama" id="nama_matkul_lama" value="{{ old('nama_matkul_lama') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kode_matkul_lama">Kode Matkul Lama</label>
                                        <input class="form-control" type="text" placeholder="Kode MK. Contoh : IF3011"
                                            name="kode_matkul_lama" id="kode_matkul_lama" value="{{ old('kode_matkul_lama') }}" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kode_kelas_lama">Kode Kelas Lama</label>
                                        <input class="form-control" type="text" placeholder="Kode Kelas. Contoh : RA"
                                            name="kode_kelas_lama" id="kode_kelas_lama" value="{{ old('kode_kelas_lama') }}" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!-- Section Tambah Matkul Lama -->
                            <div id="matkulContainer" class="hidden">
                                <!-- Form akan ditambahkan disini -->
                            </div>
                            <div id="addContainer" class="col-md-12 font-bold flex justify-center">
                                <button id="addMatkulBtn" class="flex gap-1 bg-primary-main py-2 px-4 rounded-10 text-white">
                                    <x-eva-plus-circle-outline class="w-6 h-6"/>Tambah Mata Kuliah
                                </button>
                            </div>
                            <!-- Section Matkul Baru -->
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
    <script>
        let addMatkulBtn = document.getElementById('addMatkulBtn');
        addMatkulBtn.addEventListener('click', addMatkul);

        let matkulCount = 1;
        const maxMatkul = 5;

        function addMatkul() {
            // if (matkulCount >= maxMatkul) return;
            const matkulContainer = document.getElementById('matkulContainer');
            const matkulDiv = document.createElement('div');
            matkulDiv.classList.add('matkul-item', 'mt-3');
            matkulDiv.innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_matkul_${matkulCount}">Nama Matkul Lama ke-${matkulCount + 1}</label>
                            <input class="form-control" type="text" placeholder="Nama MK tanpa disingkat. Contoh : Kimia Dasar"
                                name="nama_matkul_${matkulCount}" id="nama_matkul_${matkulCount}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_matkul_${matkulCount}">Kode Matkul Lama ke-${matkulCount + 1}</label>
                            <input class="form-control" type="text" placeholder="Kode MK. Contoh : IF3011"
                                name="kode_matkul_${matkulCount}" id="kode_matkul_${matkulCount}">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_kelas_${matkulCount}">Kode Kelas Lama ke-${matkulCount + 1}</label>
                            <input class="form-control" type="text" placeholder="Kode Kelas. Contoh : RA"
                                name="kode_kelas_${matkulCount}" id="kode_kelas_${matkulCount}">
                        </div>
                    </div>
                </div>
                <button class="bg-slate-800 py-1 px-3 text-white font-bold rounded-10 mb-4" onclick="removeMatkul(this)">Hapus</button>
                 <br>
            `;
            matkulContainer.appendChild(matkulDiv);
            matkulCount++;
            matkulContainer.classList.remove('hidden');

             if(matkulCount === maxMatkul){
                document.getElementById('addContainer').classList.add('hidden');
                return;
            }
        }

        function removeMatkul(button) {
            const matkulDiv = button.parentElement;
            matkulDiv.remove();
            matkulCount--;
            document.getElementById('addContainer').classList.remove('hidden');
            if (matkulCount === 0) {
                document.getElementById('matkulContainer').classList.add('hidden');
            }
        }
    </script>
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
