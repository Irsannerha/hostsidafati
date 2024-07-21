<x-mahasiswa-app>
    <div class="main-container">
        <!-- Content start -->
        <!-- home end -->
        <!-- clients start -->
        <section id="FormPermohonanPengisianKRS">
            <div class="container">
                <div class="clients p-4 bg-gradient-1">
                    <div class="card-body">
                        <div class="col-md-12">
                        </div>
                        <h2 class="title">Form Permohonan Pengisian KRS</h2>
                        <hr>
                        <br>
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input class="form-control @error('nama') is-invalid @enderror" type="text"
                                            placeholder="Masukkan nama Anda" name="nama" id="nama" required
                                            @readonly(true)>
                                    </div>
                                    @error('nama')
                                        <small class="invalid-feedback font-5"
                                            style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input class="form-control @error('nim') is-invalid @enderror" type="number"
                                            placeholder="Masukkan NIM Anda" name="nim" id="nim" required
                                            @readonly(true)>
                                    </div>
                                    @error('nim')
                                        <small class="invalid-feedback font-5"
                                            style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prodi_id">Program Studi</label>
                                        <select name="prodi_id"
                                            class="form-control @error('prodi_id') is-invalid @enderror">
                                            <option value="">Pilih program studi Anda</option>
                                        </select>
                                    </div>
                                    @error('prodi_id')
                                        <small class="invalid-feedback font-5"
                                            style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="tahun_ak">Tahun Akademik</label>
                                    <div class="form-group row relative">
                                        <div class="col-md-6">
                                            <input class="form-control @error('tahun_ak1') is-invalid @enderror"
                                                type="datetime" placeholder="Tahun awal periode" name="tahun_ak"
                                                id="tahun_ak1" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control @error('tahun_ak2') is-invalid @enderror"
                                                type="datetime" placeholder="Tahun awal periode" name="tahun_ak"
                                                id="tahun_ak2" required>
                                        </div>
                                    </div>
                                    @error('tahun_ak1')
                                        <small class="invalid-feedback font-5"
                                            style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="doswal">Dosen wali</label>
                                        <input class="form-control" type="text"
                                            placeholder="Masukan nama dosen wali anda" name="doswal" id="doswal"
                                            value="{{ old('doswal') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="koor_prodi">Koordinator Prodi</label>
                                        <input class="form-control" type="text"
                                            placeholder="Masukan nama koordinator prodi anda" name="koor_prodi"
                                            id="koor_prodi" value="{{ old('koor_prodi') }}" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alasan">Alasan Perubahan KRS</label>
                                        <textarea class="form-control @error('alasan') is-invalid @enderror"
                                            placeholder="Jelaskan dengan rinci alasan pengajuan perubahan KRS"
                                            name="alasan" id="alasan" rows="3">{{ old('alasan') }}</textarea>
                                    </div>
                                    @error('alasan')
                                        <small class="invalid-feedback font-5"
                                            style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <select name="semester"
                                            class="form-control @error('semester') is-invalid @enderror">
                                            <option value="">Pilih semester Anda</option>
                                            <option value="ganjil">Ganjil</option>
                                            <option value="genap">Genap</option>
                                        </select>
                                    </div>
                                    @error('semester')
                                        <small class="invalid-feedback font-5"
                                            style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12 bg-primary-main text-white font-bold text-center py-2 rounded-10">Mata
                                Kuliah yang ingin ditambahkan</div>
                            <br>

                            <!-- Section Matkul Lama -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_matkul">Nama Mata Kuliah</label>
                                        <input class="form-control" type="text"
                                            placeholder="Nama MK tanpa disingkat. Contoh : Kimia Dasar"
                                            name="nama_matkul" id="nama_matkul"
                                            value="{{ old('nama_matkul') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kode_matkul">Kode Mata Kuliah</label>
                                        <input class="form-control" type="text" placeholder="Kode MK. Contoh : IF3011"
                                            name="kode_matkul" id="kode_matkul"
                                            value="{{ old('kode_matkul') }}" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kode_kelas">Kode Kelas</label>
                                        <input class="form-control" type="text" placeholder="Kode Kelas. Contoh : RA"
                                            name="kode_kelas" id="kode_kelas"
                                            value="{{ old('kode_kelas') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sks">SKS</label>
                                        <input class="form-control" type="text" placeholder="Jumlah SKS Mata Kuliah. Contoh : 3"
                                            name="sks" id="sks"
                                            value="{{ old('sks') }}" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <input class="form-control" type="text" placeholder="Kelas"
                                            name="kelas" id="kelas"
                                            value="{{ old('kelas') }}" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!-- Section Tambah Matkul Lama -->
                            <div id="matkulContainer" class="hidden">
                                <!-- Form akan ditambahkan disini -->
                            </div>
                            <div id="addContainer" class="col-md-12 font-bold flex justify-center">
                                <button id="addMatkulBtn"
                                    class="flex gap-1 bg-primary-main py-2 px-4 rounded-10 text-white">
                                    <x-eva-plus-circle-outline class="w-6 h-6" />Tambah Mata Kuliah
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
        <!-- End Content -->
    </div>
    <script>
        let addMatkulBtn = document.getElementById('addMatkulBtn');
        addMatkulBtn.addEventListener('click', addMatkul);

        let matkulCount = 1;
        const maxMatkul = 8;

        function addMatkul() {
            // if (matkulCount >= maxMatkul) return;
            const matkulContainer = document.getElementById('matkulContainer');
            const matkulDiv = document.createElement('div');
            matkulDiv.classList.add('matkul-item', 'mt-3');
            matkulDiv.innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_matkul${matkulCount}">Nama Mata Kuliah ke-${matkulCount + 1}</label>
                            <input class="form-control" type="text" placeholder="Nama MK tanpa disingkat. Contoh : Kimia Dasar"
                                name="nama_matkul${matkulCount}" id="nama_matkul${matkulCount}" value="{{ old('nama_matkul.${matkulCount}') }}"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_matkul_${matkulCount}">Kode Mata Kuliah ke-${matkulCount + 1}</label>
                            <input class="form-control" type="text" placeholder="Kode MK. Contoh : IF3011"
                                name="kode_matkul${matkulCount}" id="kode_matkul${matkulCount}" value="{{ old('kode_matkul.${matkulCount}') }}"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_kelas">Kode Kelas ke-${matkulCount + 1}</label>
                            <input class="form-control" type="text" placeholder="Kode Kelas. Contoh : RA"
                                name="kode_kelas" id="kode_kelas"
                                value="{{ old('kode_kelas.${matkulCount}') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sks">SKS ke-${matkulCount + 1}</label>
                            <input class="form-control" type="text" placeholder="Jumlah SKS Mata Kuliah. Contoh : 3"
                                name="sks" id="sks"
                                value="{{ old('sks.${matkulCount}') }}">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kelas">Kelas ke-${matkulCount + 1}</label>
                            <input class="form-control" type="text" placeholder="Kelas"
                                name="kelas" id="kelas"
                                vvalue="{{ old('kelas.${matkulCount}') }}">
                        </div>
                    </div>
                </div>
                <button class="bg-slate-800 py-1 px-3 text-white font-bold rounded-10 mb-4" onclick="removeMatkul(this)">Hapus</button>
                 <br>
            `;
            matkulContainer.appendChild(matkulDiv);
            matkulCount++;
            matkulContainer.classList.remove('hidden');

            if (matkulCount === maxMatkul) {
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
