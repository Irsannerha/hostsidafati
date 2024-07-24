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
                        <form action="{{ route('mahasiswa.form-ta.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <section id="firstSection" class="">
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input class="form-control @error('nama') is-invalid @enderror" type="text" placeholder="Nama" name="nama" id="nama" value="{{ $mahasiswa->nama }}" required @readonly(true)>
                                    </div>
                                    @error('nama')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input class="form-control @error('nim') is-invalid @enderror" type="number" placeholder="NIM" name="nim" id="nim" value="{{ $mahasiswa->nim }}" required @readonly(true)>
                                    </div>
                                    @error('nim')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
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
                                                <option value="{{ $p->id }}" {{ $mahasiswa->prodi_id == $p->id ? 'selected' : '' }} >{{ $p->prodi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('prodi_id')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp_mhs">No. Hp Mahasiswa</label>
                                        <input class="form-control @error('no_hp_mhs') is-invalid @enderror" type="tel" placeholder="ex: +6281234567890" name="no_hp_mhs"
                                            id="no_hp_mhs" value="{{ old('no_hp_mhs') }}" required>
                                    </div>
                                    @error('no_hp_mhs')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Mahasiswa</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email"
                                            id="email" value="{{ $mahasiswa->email }}" required @readonly(true)>
                                    </div>
                                    @error('email')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
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
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_pembimbing_satu">Nama Pembimbing Satu</label>
                                        <input class="form-control @error('nama_pembimbing_satu') is-invalid @enderror" type="text" placeholder="Nama Pembimbing Satu Dengan Gelar"
                                            name="nama_pembimbing_satu" id="nama_pembimbing_satu" value="{{ old('nama_pembimbing_satu') }}" required>
                                    </div>
                                    @error('nama_pembimbing_satu')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_pembimbing_dua">Nama Pembimbing Dua</label>
                                        <input class="form-control @error('nama_pembimbing_dua') is-invalid @enderror" type="text" placeholder="Nama Pembimbing Dua Dengan Gelar"
                                            name="nama_pembimbing_dua" id="nama_pembimbing_dua" value="{{ old('nama_pembimbing_dua') }}" required>
                                    </div>
                                    @error('nama_pembimbing_dua')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat_mhs">Alamat Lengkap</label>
                                        <textarea class="form-control @error('alamat_mhs') is-invalid @enderror" placeholder="Masukkan Alamat Anda"
                                            name="alamat_mhs" id="alamat_mhs" rows="3">{{ old('alamat_mhs') }}</textarea>
                                    </div>
                                    @error('alamat_mhs')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul_ta">Judul TA</label>
                                        <textarea class="form-control @error('judul_ta') is-invalid @enderror" placeholder="Masukkan Judul TA"
                                            name="judul_ta" id="judul_ta" rows="3">{{ old('judul_ta') }}</textarea>
                                    </div>
                                    @error('judul_ta')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="file_khs">KHS</label>
                                        <input class="form-control @error('file_khs') is-invalid @enderror" type="file"
                                            name="file_khs" id="file_khs" accept=".pdf" required>
                                    </div>
                                    @error('file_khs')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="file_krs">KRS</label>
                                        <input class="form-control @error('file_krs') is-invalid @enderror" type="file"
                                            name="file_krs" id="file_krs" accept=".pdf" required>
                                    </div>
                                    @error('file_krs')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="file_transkrip">Transkrip</label>
                                        <input class="form-control @error('file_transkrip') is-invalid @enderror" type="file"
                                            name="file_transkrip" id="file_transkrip" accept=".pdf" required>
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
                                            <label for="nama_instansi1">Instansi</label>
                                            <input class="form-control @error('nama_instansi1') is-invalid @enderror" type="text" placeholder="Instansi" name="nama_instansi1"
                                                id="nama_instansi1" value="{{ old('nama_instansi1') }}" required>
                                        </div>
                                        @error('nama_instansi1')
                                        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                        @enderror

                                        <div class="form-group mt-3">
                                            <label for="nama_pimpinan_instansi1">Nama Pimpinan Instansi</label>
                                            <input class="form-control @error('nama_pimpinan_instansi1') is-invalid @enderror" type="text" placeholder="Masukkan Nama Pimpinan Instansi" name="nama_pimpinan_instansi1" id="nama_pimpinan_instansi1" value="{{ old('nama_pimpinan_instansi1') }}" required >
                                        </div>
                                        @error('nama_pimpinan_instansi1')
                                        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                        @enderror

                                        <div class="form-group mt-3">
                                            <label for="no_hp_instansi1">No. Hp Instansi</label>
                                            <input class="form-control @error('no_hp_instansi1') is-invalid @enderror" type="tel" placeholder="ex: +6281234567890"
                                                name="no_hp_instansi1" id="no_hp_instansi1" value="{{ old('no_hp_instansi1') }}" required>
                                        </div>
                                        @error('no_hp_instansi1')
                                        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                        @enderror

                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat_instansi1">Alamat Instansi</label>
                                        <textarea class="form-control @error('alamat_instansi1') is-invalid @enderror" placeholder="Masukkan Alamat Instansi"
                                            name="alamat_instansi1" id="alamat_instansi1" rows="2">{{ old('alamat_instansi1') }}</textarea>
                                    </div>
                                    @error('alamat_instansi1')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror

                                    <div class="form-group mt-3">
                                        <label for="keperluan1">Keperluan TA</label>
                                        <textarea class="form-control @error('keperluan1') is-invalid @enderror" placeholder="Masukkan Keperluan TA"
                                            name="keperluan1" id="keperluan1" rows="2">{{ old('keperluan1') }}</textarea>
                                    </div>
                                    @error('keperluan1')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                    </div>
                                    </div>
                                <br>
                                <div class="col-md-12 bg-primary-main text-white font-bold text-center py-2 rounded-10 mb-4">Data Instansi 2</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_instansi2">Instansi Kedua (Optional)</label>
                                            <input class="form-control @error('nama_instansi2') is-invalid @enderror" type="text" placeholder="Instansi kedua" name="nama_instansi2"
                                                id="nama_instansi2" value="{{ old('nama_instansi2') }}">
                                        </div>
                                        @error('nama_instansi2')
                                        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                        @enderror

                                        <div class="form-group mt-3">
                                            <label for="nama_pimpinan_instansi2">Nama Pimpinan Instansi Kedua (Optional)</label>
                                            <input class="form-control" type="text" placeholder="Masukkan Nama Pimpinan Instansi" name="nama_pimpinan_instansi2" id="nama_pimpinan_instansi2" value="{{ old('nama_pimpinan_instansi2') }}">
                                        </div>
                                        @error('nama_pimpinan_instansi2')
                                        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                        @enderror

                                        <div class="form-group mt-3">
                                            <label for="no_hp_instansi2">No. Hp Instansi Kedua (Optional)</label>
                                            <input class="form-control @error('no_hp_instansi2') is-invalid @enderror" type="tel" placeholder="ex: +6281234567890"
                                                name="no_hp_instansi2" id="no_hp_instansi2" value="{{ old('no_hp_instansi2') }}">
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
                                        <label for="keperluan2">Keperluan TA (Optional)</label>
                                        <textarea class="form-control @error('keperluan2') is-invalid @enderror" placeholder="Masukkan Keperluan TA Kedua"
                                            name="keperluan2" id="keperluan2" rows="2">{{ old('keperluan2') }}</textarea>
                                    </div>
                                    @error('keperluan2')
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
