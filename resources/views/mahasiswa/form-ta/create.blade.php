<x-mahasiswa-app>
    <div class="main-container">
        <!-- Content start -->
        <!-- home end -->
        <!-- clients start -->
        <section id="FormPengajuanTA">
            <div class="container">
                <div class="clients p-4 bg-gradient-1">
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
                            <section id="firstSection" class="">
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
                            </div>
                            <br>
                            <div class="row">
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
                                        <label for="alamat_lengkap">Alamat Lengkap</label>
                                        <textarea class="form-control" placeholder="Masukkan Alamat Anda"
                                            name="alamat_lengkap" id="alamat_lengkap" rows="3"></textarea>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Contoh :
                                        Jalan. Soekarno Hatta No. 10, Bandar Lampung </small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul">Judul TA</label>
                                        <textarea class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan Judul TA"
                                            name="judul" id="judul" rows="3">{{ old('judul') }}</textarea>
                                    </div>
                                    @error('judul')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Judul
                                        TA </small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="file_khs">KHS</label>
                                        <input class="form-control @error('file_khs') is-invalid @enderror" type="file"
                                            name="file_khs" id="file_khs" value="{{ old('file_khs') }}" required>
                                    </div>
                                    @error('file_khs')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="file_krs">KRS</label>
                                        <input class="form-control @error('file_krs') is-invalid @enderror" type="file"
                                            name="file_krs" id="file_krs" value="{{ old('file_krs') }}" required>
                                    </div>
                                    @error('file_krs')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="file_transkrip">Transkrip</label>
                                        <input class="form-control @error('file_transkrip') is-invalid @enderror" type="file"
                                            name="file_transkrip" id="file_transkrip" value="{{ old('file_transkrip') }}" required>
                                    </div>
                                    @error('file_transkrip')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            </section>
                            <br>

                            <!-- Data Instansi -->
                            <section id="addSection" class="hidden">
                                <div class="col-md-12 bg-primary-main text-white font-bold text-center py-2 rounded-10 mb-4">Data Instansi 1</div>
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

                                        <div class="form-group mt-3">
                                            <label for="nama_pimpinan">Nama Pimpinan Instansi</label>
                                            <input class="form-control" type="text" placeholder="Masukkan Nama Pimpinan Instansi" name="nama_pimpinan" id="nama_pimpinan" required >
                                        </div>
                                        @error('nama_pimpinan')
                                        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                        @else
                                        <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Nama Anda Pimpinan</small>
                                        @enderror

                                        <div class="form-group mt-3">
                                            <label for="no_hp_ins">No. Hp Instansi</label>
                                            <input class="form-control" type="tel" placeholder="No.Hp Instansi"
                                                name="no_hp_ins" id="no_hp_ins" required>
                                        </div>
                                        <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                            Nomor
                                            Hp</small>

                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat_instansi">Alamat Instansi</label>
                                        <textarea class="form-control @error('alamat_instansi') is-invalid @enderror" placeholder="Masukkan Alamat Instansi"
                                            name="alamat_instansi" id="alamat_instansi" rows="2">{{ old('alamat_instansi') }}</textarea>
                                    </div>
                                    @error('alamat_instansi')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @else
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                        Contoh :
                                        Jalan. Soekarno Hatta No. 10, Bandar Lampung </small>
                                    @enderror

                                    <div class="form-group mt-3">
                                        <label for="judul">Keperluan TA</label>
                                        <textarea class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan Keperluan TA Kedua"
                                            name="judul" id="judul" rows="2">{{ old('judul') }}</textarea>
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
                                <div class="col-md-12 bg-primary-main text-white font-bold text-center py-2 rounded-10 mb-4">Data Instansi 2</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="instansi2">Instansi Kedua (Optional)</label>
                                            <input class="form-control @error('instansi2') is-invalid @enderror" type="text" placeholder="Instansi kedua" name="instansi2"
                                                id="instansi2" value="{{ old('instansi2') }}">
                                        </div>
                                        @error('instansi2')
                                        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                        @enderror

                                        <div class="form-group mt-3">
                                            <label for="nama_pimpinan2">Nama Pimpinan Instansi Kedua (Optional)</label>
                                            <input class="form-control" type="text" placeholder="Masukkan Nama Pimpinan Instansi" name="nama_pimpinan2" id="nama_pimpinan2" >
                                        </div>
                                        @error('nama_pimpinan2')
                                        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                        @enderror

                                        <div class="form-group mt-3">
                                            <label for="no_hp_ins2">No. Hp Instansi Kedua (Optional)</label>
                                            <input class="form-control" type="tel" placeholder="No.Hp Instansi Kedua"
                                                name="no_hp_ins2" id="no_hp_ins2">
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat_instansi2">Alamat Instansi Kedua (Optional)</label>
                                        <textarea class="form-control @error('alamat_instansi2') is-invalid @enderror" placeholder="Masukkan Alamat Instansi Kedua"
                                            name="alamat_instansi2" id="alamat_instansi2" rows="2">{{ old('alamat_instansi2') }}</textarea>
                                    </div>
                                    @error('alamat_instansi2')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror

                                    <div class="form-group mt-3">
                                        <label for="judul2">Keperluan TA (Optional)</label>
                                        <textarea class="form-control @error('judul2') is-invalid @enderror" placeholder="Masukkan Keperluan TA Kedua"
                                            name="judul2" id="judul2" rows="2">{{ old('judul2') }}</textarea>
                                    </div>
                                    @error('judul2')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                    </div>
                                    </div>
                                <br>
                                <div class="flex justify-between">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                        <button class="btn btn-primary btn-block" type="button" onclick="hideSection()">Kembali</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="col-md-12 flex justify-end" id="hideBtn">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="button" onclick="hideSection()">Lanjutkan</button>
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
        function hideSection() {
            let addSection = document.getElementById("addSection");
            let firstSection = document.getElementById("firstSection");
            let hideBtn = document.getElementById("hideBtn");
            let submitBtn = document.getElementById("submitBtn");

            if(addSection.classList.contains("hidden")){
                addSection.classList.remove("hidden");
                firstSection.classList.add("hidden");
                hideBtn.classList.add("hidden");
                hideBtn.classList.remove("flex");
            }else{
                addSection.classList.add("hidden");
                firstSection.classList.remove("hidden");
                 hideBtn.classList.remove("hidden");
                hideBtn.classList.add("flex");
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
