<x-mahasiswa-app>
    <main class="main-container" id="FormPengajuanTA">
        <section class="m-40px">
            <h2 class="text-main-black">Form Permohonan Pengantar Izin / Permintaan Data Tugas Akhir</h2>
            <hr class="border-1 mt-10px border-secondary-border">
                <form action="{{ route('mahasiswa.form-ta.store') }}" method="POST">
                    @csrf
                    <section id="firstSection" class="">
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="nama" class="font-semibold">Nama<span class="form-required">*</span></label>
                                <input name="nama" id="name" class="form-input @error('nama') is-invalid @enderror" type="text" placeholder="Masukkan nama Anda" data-role="tagsinput" value="{{ old('nama', $mahasiswa->nama) }}" required @readonly(true)/>
                                @error('nama')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="nim" class="font-semibold">NIM<span class="form-required">*</span></label>
                                <input name="nim" id="nim" class="form-input @error('nim') is-invalid @enderror" type="text" placeholder="Masukkan nim Anda" data-role="tagsinput" value="{{ old('nim', $mahasiswa->nim) }}" required @readonly(true)/>
                                @error('nim')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="kode_prodi" class="font-semibold">Program Studi<span class="form-required">*</span></label>
                                <x-forms.select-input name="kode_prodi" tabindex="0" placeholder="Pilih program studi Anda"
                                :options="['0' => 'IF', '1' => 'ITERA']" />
                            </div>
                            <div>
                                <label for="no_hp" class="font-semibold">No. Hp Mahasiswa<span class="form-required">*</span></label>
                                <input name="no_hp" id="name" class="form-input @error('no_hp') is-invalid @enderror" type="tel" placeholder="No. Hp Mahasiswa" data-role="tagsinput" value="{{ old('no_hp', $mahasiswa->no_hp) }}" required @readonly(true)/>
                                @error('no_hp')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="font-semibold">Email<span class="form-required">*</span></label>
                                <input name="email" id="name" class="form-input @error('email') is-invalid @enderror" type="email" placeholder="Email" data-role="tagsinput" value="{{ old('email', $mahasiswa->email) }}" required @readonly(true)/>
                                @error('email')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                             <div>
                                <label for="keperluan" class="font-semibold">Keperluan<span class="form-required">*</span></label>
                                <x-forms.select-input name="keperluan" tabindex="0" placeholder="Pilih Keperluan Anda"
                                :options="['0' => 'TA', '1' => 'Libur']" />
                            </div>
                            <div>
                                <label for="pembimbing_1" class="font-semibold">Nama Pembimbing Satu<span class="form-required">*</span></label>
                                <x-forms.select-input name="pembimbing_1" tabindex="0" placeholder="Masukkan nama dosen pembimbing 1"
                                :options="['0' => 'Bendry', '1' => 'Henry']" search="true"/>
                            </div>
                            <div>
                                <label for="pembimbing_2" class="font-semibold">Nama Pembimbing Dua<span class="form-required">*</span></label>
                                <x-forms.select-input name="pembimbing_2" tabindex="0" placeholder="Masukkan nama dosen pembimbing 2"
                                :options="['0' => 'Yuliana', '1' => 'Kristiana']" search="true"/>
                            </div>
                            <div>
                                <label for="alamat_mhs" class="font-semibold">Alamat Lengkap<span class="form-required">*</span></label>
                                <textarea rows="6" name="alamat_mhs" id="alamat_mhs" class="form-textarea" placeholder="Masukan alamat Anda dengan lengkap..." data-role="tagsinput" required></textarea>
                                @error('alamat_mhs')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="judul_ta" class="font-semibold">Judul TA<span class="form-required">*</span></label>
                                <textarea rows="6" name="judul_ta" id="judul_ta" class="form-textarea" placeholder="Masukan Judul Tugas Akhir anda dengan lengkap" data-role="tagsinput" required></textarea>
                                @error('judul_ta')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- File input -->
                            <div class="grid grid-cols-3 gap-10 col-span-2">
                                <div>
                                    <label for="file_khs" class="font-semibold">KHS<span class="form-required">*</span></label>
                                    <div id="upload"
                                        class="form-file-input">
                                        <x-phosphor-upload-simple-bold class="w-5 h-5" id="icon" />
                                        <span id="fileName" name="fileName"
                                            class="form-file-input-child">Upload File</span>
                                    </div>
                                    <input type="file" id="fileInput" name="file_khs" value="" class="hidden"
                                        accept="application/pdf" />
                                    @error('file_khs')
                                    <small class="form-error invalid-feedback">{{ $message }}</small>
                                    @enderror
                                    <div id="error" class="text-red-500 mt-2 hidden"></div>
                                </div>
                                <div>
                                    <label for="file_krs" class="font-semibold">KRS<span class="form-required">*</span></label>
                                    <div id="upload"
                                        class="form-file-input">
                                        <x-phosphor-upload-simple-bold class="w-5 h-5" id="icon" />
                                        <span id="fileName" name="fileName"
                                            class="form-file-input-child">Upload File</span>
                                    </div>
                                    <input type="file" id="fileInput" name="file_krs" value="" class="hidden"
                                        accept="application/pdf" />
                                    @error('file_krs')
                                    <small class="form-error invalid-feedback">{{ $message }}</small>
                                    @enderror
                                    <div id="error" class="text-red-500 mt-2 hidden"></div>
                                </div>
                                <div>
                                    <label for="file_transkrip" class="font-semibold">Transkrip<span class="form-required">*</span></label>
                                    <div id="upload"
                                        class="form-file-input">
                                        <x-phosphor-upload-simple-bold class="w-5 h-5" id="icon" />
                                        <span id="fileName" name="fileName"
                                            class="form-file-input-child">Upload File</span>
                                    </div>
                                    <input type="file" id="fileInput" name="file_transkrip" value="" class="hidden"
                                        accept="application/pdf" />
                                    @error('file_transkrip')
                                    <small class="form-error invalid-feedback">{{ $message }}</small>
                                    @enderror
                                    <div id="error" class="text-red-500 mt-2 hidden"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end mt-16">
                            <button onclick="hideSection()" class="primary-button" type="button">Lanjutkan</button>
                        </div>
                    </section>

                    <!-- Data Instansi -->
                    <section id="addSection" class="hidden">
                        <!-- Instansi 1 -->
                        <div class="form-section">Data Instansi 1</div>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="nama_instansi_1" class="font-semibold">Nama Instansi<span class="form-required">*</span></label>
                                <input class="form-input @error('nama_instansi_1') is-invalid @enderror" type="text" placeholder="Masukkan nama instansi Anda" name="nama_instansi_1"
                                        id="nama_instansi_1" value="{{ old('nama_instansi_1') }}" required>
                                        @error('nama_instansi_1')
                                            <small class="form-error invalid-feedback">{{ $message }}</small>
                                        @enderror
                            </div>
                            <div>
                                <label for="nama_pimpinan_instansi_1" class="font-semibold">Nama Pimpinan Instansi<span class="form-required">*</span></label>
                                <input class="form-input @error('nama_pimpinan_instansi_1') is-invalid @enderror" type="text" placeholder="Masukan nama pimpinan instansi" name="nama_pimpinan_instansi_1"
                                        id="nama_pimpinan_instansi_1" value="{{ old('nama_pimpinan_instansi_1') }}" required>
                                        @error('nama_pimpinan_instansi_1')
                                            <small class="form-error invalid-feedback">{{ $message }}</small>
                                        @enderror
                            </div>
                            <div>
                                <label for="alamat_instansi_1" class="font-semibold">Alamat Lengkap<span class="form-required">*</span></label>
                                <textarea rows="6" name="alamat_instansi_1" id="alamat_instansi_1" class="form-textarea" placeholder="Masukkan alamat instansi Anda dengan lengkap..." data-role="tagsinput" required></textarea>
                                @error('alamat_instansi_1')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="no_hp_instansi_1" class="font-semibold">No.Hp Instansi<span class="form-required">*</span></label>
                                <input class="form-input @error('no_hp_instansi_1') is-invalid @enderror" type="text" placeholder="Masukkan nomor telepon instansi Anda" name="no_hp_instansi_1" type="tel"
                                        id="no_hp_instansi_1" value="{{ old('no_hp_instansi_1') }}" required>
                                        @error('no_hp_instansi_1')
                                            <small class="form-error invalid-feedback">{{ $message }}</small>
                                        @enderror
                            </div>
                        </div>

                        <!-- Instansi 2 -->
                        <div class="form-section">Data Instansi 2</div>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="nama_instansi_2" class="font-semibold">Nama Instansi</label>
                                <input class="form-input @error('nama_instansi_2') is-invalid @enderror" type="text" placeholder="Masukkan nama instansi Anda" name="nama_instansi_2"
                                        id="nama_instansi_2" value="{{ old('nama_instansi_2') }}">
                                @error('nama_instansi_2')
                                    <small class="form-error invalid-feedback">{{ $message }}</small>
                                @enderror
                                    </div>
                            <div>
                                <label for="nama_pimpinan_instansi_2" class="font-semibold">Nama Pimpinan Instansi</label>
                                <input class="form-input @error('nama_pimpinan_instansi_2') is-invalid @enderror" type="text" placeholder="Masukan nama pimpinan instansi" id="nama_pimpinan_instansi_2" name="nama_pimpinan_instansi_2" value="{{ old('nama_pimpinan_instansi_2') }}">
                                @error('nama_pimpinan_instansi_2')
                                    <small class="form-error invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="alamat_instansi_2" class="font-semibold">Alamat Lengkap</label>
                                <textarea rows="6" name="alamat_instansi_2" id="alamat_instansi_2" class="form-textarea" placeholder="Masukkan alamat instansi Anda dengan lengkap..." data-role="tagsinput"></textarea>
                                @error('alamat_instansi_2')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="no_hp_instansi_2" class="font-semibold">No.Hp Instansi</label>
                                <input class="form-input @error('no_hp_instansi_2') is-invalid @enderror" type="text" placeholder="Masukkan nomor telepon instansi Anda" name="no_hp_instansi_2" type="tel"
                                        id="no_hp_instansi_2" value="{{ old('no_hp_instansi_2') }}">
                                @error('no_hp_instansi_2')
                                    <small class="form-error invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-between mt-16">
                            <button class="primary-button" onclick="hideSection()" type="button">Kembali</button>
                            <button class="primary-button" type="submit">Submit</button>
                        </div>
                    </section>
                </form>



        </section>
        <!-- End Content -->
    </main>
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
