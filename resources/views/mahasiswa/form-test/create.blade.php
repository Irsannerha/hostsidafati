<x-mahasiswa-app>
    <main class="main-container" id="FormPengajuanKP">
        <section class="m-40px">
            <h2 class="text-main-black">Form Pengajuan Pengantar Kerja Praktik</h2>
            <hr class="border-1 mt-10px border-secondary-border">
            <form action="" method="POST">
                @csrf
                <section id="firstSection" class="">
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="nama" class="font-semibold">Nama<span class="form-required">*</span></label>
                            <input name="nama" id="name" class="form-input @error('nama') is-invalid @enderror"
                                type="text" placeholder="Masukkan nama Anda" data-role="tagsinput"
                                value="{{ old('nama') }}" required @readonly(true) />
                            @error('nama')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="nim" class="font-semibold">NIM<span class="form-required">*</span></label>
                            <input name="nim" id="nim" class="form-input @error('nim') is-invalid @enderror" type="text"
                                placeholder="Masukkan nim Anda" data-role="tagsinput" value="{{ old('nim') }}" required
                                @readonly(true) />
                            @error('nim')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="kode_prodi" class="font-semibold">Program Studi<span
                                    class="form-required">*</span></label>
                            <x-forms.select-input name="kode_prodi" tabindex="0" placeholder="Pilih program studi Anda"
                                :options="['0' => 'IF', '1' => 'ITERA']" required />
                        </div>
                        <div>
                            <label for="no_hp" class="font-semibold">No. Hp Mahasiswa<span
                                    class="form-required">*</span></label>
                            <input name="no_hp" id="name" class="form-input @error('no_hp') is-invalid @enderror"
                                type="tel" placeholder="No. Hp Mahasiswa" data-role="tagsinput"
                                value="{{ old('no_hp') }}" required @readonly(true) />
                            @error('no_hp')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="font-semibold">Email<span class="form-required">*</span></label>
                            <input name="email" id="name" class="form-input @error('email') is-invalid @enderror"
                                type="email" placeholder="Email" data-role="tagsinput" value="{{ old('email') }}"
                                required @readonly(true) />
                            @error('email')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="tgl_mulai_kp" class="font-semibold">Tanggal Mulai Pelaksanaan<span
                                    class="form-required">*</span></label>
                            <input name="tgl_mulai_kp" id="tgl_mulai_kp"
                                class="form-input @error('tgl_mulai_kp') is-invalid @enderror" type="date"
                                data-role="tagsinput" value="{{ old('tgl_mulai_kp') }}" required />
                            @error('tgl_mulai_kp')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="alamat_mhs" class="font-semibold">Alamat Lengkap<span
                                    class="form-required">*</span></label>
                            <textarea rows="6" name="alamat_mhs" id="alamat_mhs" class="form-textarea"
                                placeholder="Masukan alamat Anda dengan lengkap..." data-role="tagsinput"
                                required></textarea>
                            @error('alamat_mhs')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="col-span-2">
                                <label for="tgl_selesai_kp" class="font-semibold">Tanggal Akhir Pelaksanaan<span
                                        class="form-required">*</span></label>
                                <input name="tgl_selesai_kp" id="tgl_selesai_kp"
                                    class="form-input @error('tgl_selesai_kp') is-invalid @enderror" type="date"
                                    data-role="tagsinput" value="{{ old('tgl_selesai_kp') }}" required />
                                @error('tgl_selesai_kp')
                                    <small class="form-error invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Input File -->
                            <div>
                                <label for="file_pengantar_prodi" class="font-semibold relative">Upload Pengantar
                                    Prodi<span class="form-required">*</span><span class="info-label">max
                                        1mb</span></label>
                                <div id="upload" class="form-file-input">
                                    <x-phosphor-upload-simple-bold class="w-5 h-5" id="icon" />
                                    <span id="fileName" name="fileName" class="form-file-input-child">Upload
                                        File</span>
                                </div>
                                <input type="file" id="fileInput" name="file_pengantar_prodi" value="" class="hidden"
                                    accept="application/pdf" />
                                @error('file_pengantar_prodi')
                                    <small class="form-error invalid-feedback">{{ $message }}</small>
                                @enderror
                                <div id="error" class="text-red-500 mt-2 hidden"></div>
                            </div>
                            <div>
                                <label for="file_transkrip" class="font-semibold">Transkrip<span
                                        class="form-required">*</span></label>
                                <div id="upload" class="form-file-input">
                                    <x-phosphor-upload-simple-bold class="w-5 h-5" id="icon" />
                                    <span id="fileName" name="fileName" class="form-file-input-child">Upload
                                        File</span>
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
                </section>
                <!-- Data Instansi -->
                <section>
                    <div class="form-section">Data Instansi</div>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="nama_instansi" class="font-semibold">Nama Instansi<span
                                    class="form-required">*</span></label>
                            <input class="form-input @error('nama_instansi') is-invalid @enderror" type="text"
                                placeholder="Masukkan nama instansi Anda" name="nama_instansi" id="nama_instansi"
                                value="{{ old('nama_instansi') }}" required>
                            @error('nama_instansi')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="jabatan_instansi" class="font-semibold relative">Tujuan Jabatan<span
                                    class="form-required">*</span><span class="info-label">hanya jabatan
                                    saja</span></label>
                            <input class="form-input @error('jabatan_instansi') is-invalid @enderror" type="text"
                                placeholder="Masukan jabatan pimpinan anda di instansi" name="jabatan_instansi"
                                id="jabatan_instansi" value="{{ old('jabatan_instansi') }}" required>
                            @error('jabatan_instansi')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="alamat_instansi" class="font-semibold">Alamat Lengkap<span
                                    class="form-required">*</span></label>
                            <textarea rows="6" name="alamat_instansi" id="alamat_instansi" class="form-textarea"
                                placeholder="Masukkan alamat instansi Anda dengan lengkap..." data-role="tagsinput"
                                required></textarea>
                            @error('alamat_instansi')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="no_hp_instansi" class="font-semibold">No.Hp Instansi<span
                                    class="form-required">*</span></label>
                            <input class="form-input @error('no_hp_instansi') is-invalid @enderror" type="text"
                                placeholder="Masukkan nomor telepon instansi Anda" name="no_hp_instansi" type="tel"
                                id="no_hp_instansi" value="{{ old('no_hp_instansi') }}" required>
                            @error('no_hp_instansi')
                                <small class="form-error invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end mt-16">
                        <button onclick="hideSection()" class="primary-button" type="button">Lanjutkan</button>
                    </div>
                </section>

                <section id="addSection" class="hidden">
                    @for ($i = 2; $i <= 5; $i++)
                        <div class="form-section">Data Mahasiswa {{$i}}</div>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="nama{{$i}}" class="font-semibold">Nama Mahasiswa {{$i}}</label>
                                <input name="nama{{$i}}" id="name{{$i}}"
                                    class="form-input @error('nama{{$i}}') is-invalid @enderror" type="text"
                                    placeholder="Masukkan nama teman Anda" data-role="tagsinput" />
                                @error('nama{{$i}}')
                                    <small class="form-error invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="nim{{$i}}" class="font-semibold">NIM Mahasiswa {{$i}}</label>
                                <input name="nim{{$i}}" id="nim{{$i}}" class="form-input @error('nim') is-invalid @enderror"
                                    type="text" placeholder="Masukkan nim teman Anda" data-role="tagsinput" required />
                                @error('nim{{$i}}')
                                    <small class="form-error invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="kode_prodi{{$i}}" class="font-semibold">Program Studi Mahasiswa {{$i}}</label>
                                <x-forms.select-input name="kode_prodi{{$i}}" tabindex="0"
                                    placeholder="Pilih program studi teman Anda" :options="['0' => 'IF', '1' => 'ITERA']" />
                            </div>
                        </div>
                    @endfor

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

            if (addSection.classList.contains("hidden")) {
                addSection.classList.remove("hidden");
                firstSection.classList.add("hidden");
                hideBtn.classList.add("hidden");
                hideBtn.classList.remove("flex");
            } else {
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
