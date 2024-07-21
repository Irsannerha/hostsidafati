<x-mahasiswa-app>
    <main class="main-container" id="FormPengajuanDispen">
        <section class="m-40px">
            <h2 class="text-main-black">Form Permohonan Pengantar Izin / Permintaan Data Tugas Akhir</h2>
            <hr class="border-1 mt-10px border-secondary-border">

            <form action="" method="POST">
                @csrf
                <!-- Slide pertama -->
                <section id="firstSection">
                    <x-cards.section>Data Instansi</x-cards.section>
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
                            <x-forms.label name="keperluan" required>Keperluan</x-forms.label>
                            <x-forms.select-input name="keperluan" tabindex="0" placeholder="Pilih Keperluan Anda"
                                :options="['value1' => 'keperluan 1', 'value2' => 'keperluan 2']" />
                        </div>
                        <div>
                            <x-forms.label name="kode_prodi" required>Program Studi</x-forms.label>
                            <x-forms.select-input name="kode_prodi" tabindex="0" placeholder="Pilih program studi Anda"
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
                            <x-forms.label name="pembimbing_1" required>Nama Pebimbing 1</x-forms.label>
                            <x-forms.input name="pembimbing_1" placeholder="Masukkan nama dosen pembimbing 1"
                                type="text" required />
                        </div>
                        <div>
                            <x-forms.label name="pembimbing_2" required>Nama Pebimbing 2</x-forms.label>
                            <x-forms.input name="pembimbing_2" placeholder="Masukkan nama dosen pembimbing 2"
                                type="text" required />
                        </div>
                        <div>
                            <x-forms.label name="alamat_mhs" required>Alamat Lengkap</x-forms.label>
                            <x-forms.input name="alamat_mhs" required textarea="true" rows="6"
                                placeholder="Masukan alamat Anda dengan lengkap..."></x-forms.input>
                        </div>
                        <div>
                            <x-forms.label name="judul_ta" required>Judul TA</x-forms.label>
                            <x-forms.input name="judul_ta" required textarea="true" rows="6"
                                placeholder="Masukan Judul Tugas Akhir anda dengan lengkap"></x-forms.input>
                        </div>
                        <div class="grid grid-cols-3 gap-20 col-span-2">
                            <div>
                                <x-forms.label name="file_khs" required info="maks 1mb">KHS</x-forms.label>
                                <x-forms.input-file name="file_khs" required />
                            </div>
                            <div>
                                <x-forms.label name="file_krs" required info="maks 1mb">KRS</x-forms.label>
                                <x-forms.input-file name="file_krs" required />
                            </div>
                            <div>
                                <x-forms.label name="file_transkrip" required info="maks 1mb">Transkrip</x-forms.label>
                                <x-forms.input-file name="file_transkrip" required />
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-16">
                        <x-button.primary onclick="hideSection()" type="button">Lanjutkan</x-button.primary>
                    </div>
                </section>
                <!-- Slide kedua -->
                <section id="addSection" class="hidden">
                    <!-- Data Instansi -->
                    <section>
                        <x-cards.section>Data Instansi 1</x-cards.section>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <x-forms.label name="nama_instansi_1" required>Nama Instansi</x-forms.label>
                                <x-forms.input name="nama_instansi_1" placeholder="Masukkan nama instansi Anda"
                                    required />
                            </div>
                            <div>
                                <x-forms.label name="jabatan_instansi_1" required info="hanya jabatan saja">Tujuan
                                    Jabatan</x-forms.label>
                                <x-forms.input name="jabatan_instansi_1" placeholder="Masukkan jabatan Anda di instansi"
                                    required />
                            </div>
                            <div>
                                <x-forms.label name="alamat_instansi_1" required>Alamat Lengkap</x-forms.label>
                                <x-forms.input name="alamat_instansi_1" required textarea="true" rows="6"
                                    placeholder="Masukkan alamat instansi Anda dengan lengkap..."></x-forms.input>
                            </div>
                            <div>
                                <x-forms.label name="no_hp_instansi_1" required>No. Hp Instansi</x-forms.label>
                                <x-forms.input name="no_hp_instansi_1"
                                    placeholder="Masukkan nomor telepon instansi Anda" type="tel" required />
                            </div>
                        </div>
                    </section>
                    <section>
                        <x-cards.section>Data Instansi 2</x-cards.section>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <x-forms.label name="nama_instansi_2">Nama Instansi</x-forms.label>
                                <x-forms.input name="nama_instansi_2" placeholder="Masukkan nama instansi Anda" />
                            </div>
                            <div>
                                <x-forms.label name="jabatan_instansi_2" info="hanya jabatan saja">Tujuan
                                    Jabatan</x-forms.label>
                                <x-forms.input name="jabatan_instansi_2"
                                    placeholder="Masukkan jabatan Anda di instansi" />
                            </div>
                            <div>
                                <x-forms.label name="alamat_instansi_2">Alamat Lengkap</x-forms.label>
                                <x-forms.input name="alamat_instansi_2" textarea="true" rows="6"
                                    placeholder="Masukkan alamat instansi Anda dengan lengkap..."></x-forms.input>
                            </div>
                            <div>
                                <x-forms.label name="no_hp_instansi_2">No. Hp Instansi</x-forms.label>
                                <x-forms.input name="no_hp_instansi_2"
                                    placeholder="Masukkan nomor telepon instansi Anda" type="tel" />
                            </div>
                        </div>
                    </section>
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
