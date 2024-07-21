<x-mahasiswa-app>
    <main class="main-container" id="FormPengajuanDispen">
        <section class="m-40px">
            <h2 class="text-main-black">Form Pengajuan Kerja Praktik</h2>
            <hr class="border-1 mt-10px border-secondary-border">

            <form action="" method="POST">
                @csrf
                <!-- Slide pertama -->
                <section id="firstSection">
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <x-forms.label name="nama" required>Nama</x-forms.label>
                            <x-forms.input name="nama" placeholder="Masukkan nama Anda" required />
                        </div>
                        <div>
                            <x-forms.label name="nim" required>NIM</x-forms.label>
                            <x-forms.input name="nim" placeholder="Masukkan NIM Anda" required />
                        </div>
                        <div>
                            <x-forms.label name="kode_prodi" required>Program Studi</x-forms.label>
                             <x-forms.select-input name="kode_prodi"
                             tabindex="0"
                                placeholder="Pilih program studi Anda"
                                :options="['value1' => 'Teknik Informatika', 'value2' => 'Teknik Industri', 'value3' => 'Teknik Biomedis']" />
                        </div>
                        <div>
                            <x-forms.label name="no_hp_mhs" required>No.Hp Mahasiswa</x-forms.label>
                            <x-forms.input name="no_hp_mhs" placeholder="Masukkan nomor telepon Anda" type="tel"
                                required />
                        </div>
                        <div>
                            <x-forms.label name="email" required>Email</x-forms.label>
                            <x-forms.input name="email" placeholder="Masukkan email Anda" type="email" required />
                        </div>
                        <div>
                            <x-forms.label name="tgl_mulai_kp" required>Tanggal Mulai Pelaksanaan</x-forms.label>
                            <x-forms.input-date name="tgl_mulai_kp" required />
                        </div>

                        <div>
                            <x-forms.label name="alamat_mhs" required>Alamat Lengkap</x-forms.label>
                            <x-forms.input name="alamat_mhs" required textarea="true" rows="6"
                                placeholder="Masukan alamat Anda dengan lengkap..."></x-forms.input>
                        </div>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="col-span-2">
                                <x-forms.label name="tgl_selesai_kp" required>Tanggal Akhir Pelaksanaan</x-forms.label>
                                <x-forms.input-date name="tgl_selesai_kp" required />
                            </div>
                            <div>
                                <x-forms.label name="file_pengantar_prodi" required info="maks 1mb">Upload Pengantar
                                    Prodi</x-forms.label>
                                <x-forms.input-file name="file_pengantar_prodi" required />
                            </div>
                            <div>
                                <x-forms.label name="file_transkrip" required info="maks 1mb">Transkrip</x-forms.label>
                                <x-forms.input-file name="file_transkrip" required />
                            </div>
                        </div>
                    </div>
                    <!-- Data Instansi -->
                    <x-cards.section>Data Instansi</x-cards.section>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <x-forms.label name="nama_instansi" required>Nama Instansi</x-forms.label>
                            <x-forms.input name="nama_instansi" placeholder="Masukkan nama instansi Anda" required />
                        </div>
                        <div>
                            <x-forms.label name="jabatan_instansi" required info="hanya jabatan saja">Tujuan
                                Jabatan</x-forms.label>
                            <x-forms.input name="jabatan_instansi" placeholder="Masukkan jabatan Anda di instansi"
                                required />
                        </div>
                        <div>
                            <x-forms.label name="alamat_instansi" required>Alamat Lengkap</x-forms.label>
                            <x-forms.input name="alamat_instansi" required textarea="true" rows="6"
                                placeholder="Masukkan alamat instansi Anda dengan lengkap..."></x-forms.input>
                        </div>
                        <div>
                            <x-forms.label name="no_hp_instansi" required>No. Hp Instansi</x-forms.label>
                            <x-forms.input name="no_hp_instansi" placeholder="Masukkan nomor telepon instansi Anda"
                                type="tel" required />
                        </div>
                    </div>
                    <div class="flex justify-end mt-16">
                        <x-button.primary onclick="hideSection()" type="button">Lanjutkan</x-button.primary>
                    </div>
                </section>
                <!-- Slide kedua -->
                <section id="addSection" class="hidden">
                    @for ($i = 1; $i <= 5; $i++)
                        <div>
                            <x-cards.section>Data Mahasiswa {{$i}}</x-cards.section>
                            <div>
                                <div class="grid grid-cols-2 gap-6">
                                    <div>
                                        <x-forms.label name="nama{{$i}}">Nama Mahasiswa {{$i}}</x-forms.label>
                                        <x-forms.input name="nama{{$i}}" placeholder="Masukkan nama mahasiswa {{$i}}"/>
                                    </div>
                                    <div>
                                        <x-forms.label name="nim{{$i}}" >NIM Mahasiswa {{$i}}</x-forms.label>
                                        <x-forms.input name="nim{{$i}}" placeholder="Masukkan NIM mahasiswa {{$i}}" />
                                    </div>
                                    <div>
                                        <x-forms.label name="kode_prodi{{$i}}">Program Studi Mahasiswa
                                            {{$i}}</x-forms.label>
                                        <x-forms.select-input name="kode_prodi{{$i}}" placeholder="Pilih program studi mahasiswa {{$i}}"
                                            :options="['value1' => 'Teknik Informatika', 'value2' => 'Teknik Industri', 'value3' => 'Teknik Biomedis']" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                    <div class="flex justify-between mt-16">
                        <x-button.primary onclick="hideSection()" type="button">Kembali</x-button.primary>
                        <x-button.primary>Submit</x-button.primary>
                    </div>
                </section>
            </form>

        </section>
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
        });
    </script>
@endif
