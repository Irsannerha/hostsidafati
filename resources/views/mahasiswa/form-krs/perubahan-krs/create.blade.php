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
                            <!-- Section Matkul Lama -->
                            <section>
                                <div class="col-md-12 bg-primary-main text-white font-bold text-center py-2 rounded-10">Mata Kuliah Lama</div>
                                <br>
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
                                <div id="oldMatkulContainer" class="hidden">
                                    <!-- Form akan ditambahkan disini -->
                                </div>
                                <div id="addOldContainer" class="col-md-12 font-bold flex justify-center">
                                    <button id="addOldMatkulBtn" type="button" class="flex gap-1 bg-primary-main py-2 px-4 rounded-10 text-white">
                                        <x-eva-plus-circle-outline class="w-6 h-6"/>Tambah Mata Kuliah
                                    </button>
                                </div>
                            </section>
                            <br>

                            <!-- Section Matkul Baru -->
                            <section>
                                <div class="col-md-12 bg-primary-main text-white font-bold text-center py-2 rounded-10">Mata Kuliah Baru</div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_matkul_baru">Nama Matkul Baru</label>
                                            <input class="form-control" type="text" placeholder="Nama MK tanpa disingkat. Contoh : Kimia Dasar"
                                                name="nama_matkul_baru" id="nama_matkul_baru" value="{{ old('nama_matkul_baru') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kode_matkul_baru">Kode Matkul Baru</label>
                                            <input class="form-control" type="text" placeholder="Kode MK. Contoh : IF3011"
                                                name="kode_matkul_baru" id="kode_matkul_baru" value="{{ old('kode_matkul_baru') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kode_kelas_baru">Kode Kelas Baru</label>
                                            <input class="form-control" type="text" placeholder="Kode Kelas. Contoh : RA"
                                                name="kode_kelas_baru" id="kode_kelas_baru" value="{{ old('kode_kelas_baru') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Section Tambah Matkul baru -->
                                <div id="newMatkulContainer" class="hidden">
                                    <!-- Form akan ditambahkan disini -->
                                </div>
                                <div id="addContainer" class="col-md-12 font-bold flex justify-center">
                                    <button id="addNewMatkulBtn" type="button" class="flex gap-1 bg-primary-main py-2 px-4 rounded-10 text-white">
                                        <x-eva-plus-circle-outline class="w-6 h-6"/>Tambah Mata Kuliah
                                    </button>
                                </div>
                            </section>
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
        <!-- End Content -->
    </div>
    <script>
        let addOldMatkulBtn = document.getElementById('addOldMatkulBtn');
        let addNewMatkulBtn = document.getElementById('addNewMatkulBtn');
        addOldMatkulBtn.addEventListener('click', addOldMatkul);
        addNewMatkulBtn.addEventListener('click', addNewMatkul);

        let oldMatkulCount = 1;
        let newMatkulCount = 1;
        const maxMatkul = 5;

        function addOldMatkul() {
            // if (oldMatkulCount >= maxMatkul) return;
            const oldMatkulContainer = document.getElementById('oldMatkulContainer');
            const oldMatkulDiv = document.createElement('div');
            oldMatkulDiv.classList.add('matkul-item', 'mt-3');
            oldMatkulDiv.innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_matkul_${oldMatkulCount}">Nama Matkul Lama ke-${oldMatkulCount + 1}</label>
                            <input class="form-control" type="text" placeholder="Nama MK tanpa disingkat. Contoh : Kimia Dasar"
                                name="nama_matkul_${oldMatkulCount}" id="nama_matkul_${oldMatkulCount}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_matkul_${oldMatkulCount}">Kode Matkul Lama ke-${oldMatkulCount + 1}</label>
                            <input class="form-control" type="text" placeholder="Kode MK. Contoh : IF3011"
                                name="kode_matkul_${oldMatkulCount}" id="kode_matkul_${oldMatkulCount}">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_kelas_${oldMatkulCount}">Kode Kelas Lama ke-${oldMatkulCount + 1}</label>
                            <input class="form-control" type="text" placeholder="Kode Kelas. Contoh : RA"
                                name="kode_kelas_${oldMatkulCount}" id="kode_kelas_${oldMatkulCount}">
                        </div>
                    </div>
                </div>
                <button class="bg-slate-800 py-1 px-3 text-white font-bold rounded-10 mb-4" onclick="removeOldMatkul(this)">Hapus</button>
                 <br>
            `;
            oldMatkulContainer.appendChild(oldMatkulDiv);
            oldMatkulCount++;
            oldMatkulContainer.classList.remove('hidden');

             if(oldMatkulCount === maxMatkul){
                document.getElementById('addOldContainer').classList.add('hidden');
                return;
            }
        }

        function addNewMatkul() {
            // if (oldMatkulCount >= maxMatkul) return;
            const newMatkulContainer = document.getElementById('newMatkulContainer');
            const newMatkulDiv = document.createElement('div');
            newMatkulDiv.classList.add('matkul-item', 'mt-3');
            newMatkulDiv.innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_matkul_${newMatkulCount}">Nama Matkul Baru ke-${newMatkulCount + 1}</label>
                            <input class="form-control" type="text" placeholder="Nama MK tanpa disingkat. Contoh : Kimia Dasar"
                                name="nama_matkul_${newMatkulCount}" id="nama_matkul_${newMatkulCount}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_matkul_${newMatkulCount}">Kode Matkul Baru ke-${newMatkulCount + 1}</label>
                            <input class="form-control" type="text" placeholder="Kode MK. Contoh : IF3011"
                                name="kode_matkul_${newMatkulCount}" id="kode_matkul_${newMatkulCount}">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_kelas_${newMatkulCount}">Kode Kelas Baru ke-${newMatkulCount + 1}</label>
                            <input class="form-control" type="text" placeholder="Kode Kelas. Contoh : RA"
                                name="kode_kelas_${newMatkulCount}" id="kode_kelas_${newMatkulCount}">
                        </div>
                    </div>
                </div>
                <button class="bg-slate-800 py-1 px-3 text-white font-bold rounded-10 mb-4" onclick="removeNewMatkul(this)">Hapus</button>
                 <br>
            `;
            newMatkulContainer.appendChild(newMatkulDiv);
            newMatkulCount++;
            newMatkulContainer.classList.remove('hidden');

             if(newMatkulCount === maxMatkul){
                document.getElementById('addNewContainer').classList.add('hidden');
                return;
            }
        }

        function removeOldMatkul(button) {
            const oldMatkulDiv = button.parentElement;
            oldMatkulDiv.remove();
            oldMatkulCount--;
            document.getElementById('addOldContainer').classList.remove('hidden');
            if (oldMatkulCount === 0) {
                document.getElementById('oldMatkulContainer').classList.add('hidden');
            }
        }

        function removeNewMatkul(button) {
            const newMatkulDiv = button.parentElement;
            newMatkulDiv.remove();
            newMatkulCount--;
            document.getElementById('addNewContainer').classList.remove('hidden');
            if (newMatkulCount === 0) {
                document.getElementById('newMatkulContainer').classList.add('hidden');
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
