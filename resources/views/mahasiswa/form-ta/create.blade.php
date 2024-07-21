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
                                        <input class="form-control @error('nama') is-invalid @enderror" type="text" placeholder="Nama" name="nama" id="nama" value="{{ old('nama', $mahasiswa->nama) }}" required @readonly(true)>
                                    </div>
                                    @error('nama')
                                        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input class="form-control @error('nim') is-invalid @enderror" type="number" placeholder="NIM" name="nim" id="nim" value="{{ old('nim', $mahasiswa->nim) }}" required @readonly(true)>
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
                                                <option value="{{ $p->id }}" {{ old('prodi_id', $mahasiswa->prodi_id) == $p->id ? 'selected' : '' }} >{{ $p->prodi }}</option>
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
                                        <input class="form-control @error('no_hp_mhs') is-invalid @enderror" type="number" placeholder="No.Hp" name="no_hp_mhs"
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
                                            id="email" value="{{ old('email', $mahasiswa->email) }}" required @readonly(true)>
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
                                        <input class="form-control @error('nama_pembimbing_satu') is-invalid @enderror" type="text" placeholder="Nama Pembimbing Satu"
                                            name="nama_pembimbing_satu" id="nama_pembimbing_satu" value="{{ old('nama_pembimbing_satu') }}" required>
                                    </div>
                                    @error('nama_pembimbing_satu')
                                        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
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
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat_mhs">Alamat Lengkap</label>
                                        <textarea class="form-control @error('alamat_mhs') is-invalid @enderror" placeholder="Masukkan Alamat Anda"
                                            name="alamat_mhs" id="alamat_mhs" rows="3" required>{{ old('alamat_mhs') }}</textarea>
                                    </div>
                                    @error('alamat_mhs')
                                        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul_ta">Judul TA</label>
                                        <textarea class="form-control @error('judul_ta') is-invalid @enderror" placeholder="Masukkan Judul TA"
                                            name="judul_ta" id="judul_ta" rows="3" required>{{ old('judul_ta') }}</textarea>
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
                                        <label for="khs">KHS</label>
                                        <input class="form-control @error('khs') is-invalid @enderror" type="file"
                                            name="khs" id="khs" required>
                                    </div>
                                    @error('khs')
                                        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="krs">KRS</label>
                                        <input class="form-control @error('krs') is-invalid @enderror" type="file"
                                            name="krs" id="krs" required>
                                    </div>
                                    @error('krs')
                                        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="transkrip">Transkrip</label>
                                        <input class="form-control @error('transkrip') is-invalid @enderror" type="file"
                                            name="transkrip" id="transkrip" required>
                                    </div>
                                    @error('transkrip')
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
                                            <label for="nama_instansi_satu">Instansi</label>
                                            <input class="form-control @error('nama_instansi_satu') is-invalid @enderror" type="text" placeholder="Instansi" name="nama_instansi_satu"
                                                id="nama_instansi_satu" value="{{ old('nama_instansi_satu') }}" required>
                                        </div>
                                        @error('nama_instansi_satu')
                                            <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                        @enderror

                                        <div class="form-group mt-3">
                                            <label for="nama_pimpinan_instansi_satu">Nama Pimpinan Instansi</label>
                                            <input class="form-control" type="text" placeholder="Masukkan Nama Pimpinan Instansi" name="nama_pimpinan_instansi_satu" id="nama_pimpinan_instansi_satu" value="{{ old('nama_pimpinan_instansi_satu') }}" required >
                                        </div>
                                        @error('nama_pimpinan_instansi_satu')
                                            <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                        @enderror

                                        <div class="form-group mt-3">
                                            <label for="no_hp_instansi_satu">No. Hp Instansi</label>
                                            <input class="form-control" type="tel" placeholder="No.Hp Instansi"
                                                name="no_hp_instansi_satu" id="no_hp_instansi_satu" value="{{ old('no_hp_instansi_satu') }}" required>
                                        </div>
                                        @error('no_hp_instansi_satu')
                                            <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                        @enderror

                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat_instansi_satu">Alamat Instansi</label>
                                        <textarea class="form-control @error('alamat_instansi_satu') is-invalid @enderror" placeholder="Masukkan Alamat Instansi"
                                            name="alamat_instansi_satu" id="alamat_instansi_satu" rows="2" required>{{ old('alamat_instansi_satu') }}</textarea>
                                    </div>
                                    @error('alamat_instansi_satu')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror

                                    <div class="form-group mt-3">
                                        <label for="keperluan_satu">Keperluan TA</label>
                                        <textarea class="form-control @error('keperluan_satu') is-invalid @enderror" placeholder="Masukkan Keperluan TA Kedua"
                                            name="keperluan_satu" id="keperluan_satu" rows="2" required>{{ old('keperluan_satu') }}</textarea>
                                    </div>
                                    @error('keperluan_satu')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror
                                </div>
                                </div>
                                <br>
                                <div class="col-md-12 bg-primary-main text-white font-bold text-center py-2 rounded-10 mb-4">Data Instansi 2</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_instansi_dua">Instansi Kedua (Optional)</label>
                                            <input class="form-control @error('nama_instansi_dua') is-invalid @enderror" type="text" placeholder="Instansi kedua" name="nama_instansi_dua"
                                                id="nama_instansi_dua" value="{{ old('nama_instansi_dua') }}">
                                        </div>
                                        @error('nama_instansi_dua')
                                        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                        @enderror

                                        <div class="form-group mt-3">
                                            <label for="nama_pimpinan_instansi_dua">Nama Pimpinan Instansi Kedua (Optional)</label>
                                            <input class="form-control" type="text" placeholder="Masukkan Nama Pimpinan Instansi" name="nama_pimpinan_instansi_dua" id="nama_pimpinan_instansi_dua" value="{{ old('nama_pimpinan_instansi_dua') }}">
                                        </div>
                                        @error('nama_pimpinan_instansi_dua')
                                        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                        @enderror

                                        <div class="form-group mt-3">
                                            <label for="no_hp_instansi_dua">No. Hp Instansi Kedua (Optional)</label>
                                            <input class="form-control" type="tel" placeholder="No.Hp Instansi Kedua"
                                                name="no_hp_instansi_dua" id="no_hp_instansi_dua" value="{{ old('no_hp_instansi_dua') }}">
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat_instansi_dua">Alamat Instansi Kedua (Optional)</label>
                                        <textarea class="form-control @error('alamat_instansi_dua') is-invalid @enderror" placeholder="Masukkan Alamat Instansi Kedua"
                                            name="alamat_instansi_dua" id="alamat_instansi_dua" rows="2">{{ old('alamat_instansi_dua') }}</textarea>
                                    </div>
                                    @error('alamat_instansi_dua')
                                    <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
                                    @enderror

                                    <div class="form-group mt-3">
                                        <label for="keperluan_dua">Keperluan TA (Optional)</label>
                                        <textarea class="form-control @error('keperluan_dua') is-invalid @enderror" placeholder="Masukkan Keperluan TA Kedua"
                                            name="keperluan_dua" id="keperluan_dua" rows="2">{{ old('keperluan_dua') }}</textarea>
                                    </div>
                                    @error('keperluan_dua')
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
