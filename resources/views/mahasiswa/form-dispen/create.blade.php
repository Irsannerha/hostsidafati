<x-mahasiswa-app>
    <main class="main-container" id="FormPengajuanDispen">
        <section class="m-40px">
            <h2 class="text-main-black">Form Pengajuan Dispensasi</h2>
            <hr class="border-1 mt-10px border-secondary-border">
            <!-- form pengajuan dispensasi kuliah -->
            <form action="" method="POST">
                @csrf
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
                        <x-forms.select-input name="kode_prodi" placeholder="Pilih program studi Anda"
                            :options="['value1' => 'Teknik Informatika', 'value2' => 'Teknik Industri', 'value3' => 'Teknik Biomedis']" required />
                    </div>
                    <div>
                        <x-forms.label name="doswal" required>Dosen Wali</x-forms.label>
                        <x-forms.input name="doswal" placeholder="Masukkan nama dosen wali Anda" required />
                    </div>
                    <div>
                        <x-forms.label name="koor_prodi" required>Koordinator Prodi</x-forms.label>
                        <x-forms.input name="koor_prodi" placeholder="Masukkan nama koordinator prodi Anda" required />
                    </div>
                    <div>
                        <x-forms.label name="tgl_mulai_dispen" required>Tanggal Mulai Dispensasi</x-forms.label>
                        <x-forms.input-date name="tgl_mulai_dispen" placeholder="" required />
                    </div>
                    <div>
                        <x-forms.label name="tgl_akhir_dispen" required>Tanggal Akhir Dispensasi</x-forms.label>
                        <x-forms.input-date name="tgl_akhir_dispen" placeholder="" required />
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <x-forms.label name="file_surat_pernyataan" required href="http://google.com"
                                info="Unduh">Surat Pernyataan</x-forms.label>
                            <x-forms.input-file name="file_surat_pernyataan" required />
                        </div>
                        <div>
                            <x-forms.label name="surat_undangan">Surat Undangan</x-forms.label>
                            <x-forms.input-file name="surat_undangan" />
                        </div>

                    </div>
                    <div class="col-span-2">
                        <x-forms.label name="tujuan_dispen" required>Tujuan Dispensasi Kuliah</x-forms.label>
                        <x-forms.input name="tujuan_dispen" rows="3"
                            placeholder="Jelaskan dengan rinci alasan Anda melakukan dispensasi kuliah" textarea="true"
                            required />
                    </div>
                </div>
                <x-cards.section>Mata Kuliah yang ditinggalkan</x-cards.section>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <x-forms.label name="nama_matkul" required>Mata Kuliah</x-forms.label>
                        <x-forms.input name="nama_matkul" placeholder="Masukan mata kuliah yang ditinggalkan"
                            required />
                    </div>
                    <div>
                        <x-forms.label name="hari" required>Hari</x-forms.label>
                        <x-forms.input name="hari"
                            placeholder="Masukkan hari mata kuliah yang ditinggalkan (contoh: Senin)" required />
                    </div>
                    <div>
                        <x-forms.label name="jam" required>Jam</x-forms.label>
                        <x-forms.input name="jam" placeholder="Contoh : 13.30 - 15.10" required />
                    </div>
                </div>
                <div id="newDataCountainer" class="hidden mt-12">

                </div>
                <div id="addCountainer" class="font-semibold flex justify-center my-24px">
                    <x-button.add id="newData">Tambah mata kuliah</x-button.add>
                </div>
                <div class="flex justify-end mt-16">
                    <x-button.primary>Submit</x-button.primary>
                </div>
            </form>
        </section>
    </main>

    <script>
        let newData = document.getElementById('newData');
        newData.addEventListener('click', addNewData);

        let newDataCount = 1;
        const maxDataCount = 5;

        function addNewData() {
            const newDataCountainer = document.getElementById('newDataCountainer');
            const newDataDiv = document.createElement('div');
            newDataDiv.classList.add('data-item', 'mt-3');
            newDataDiv.innerHTML = `
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <x-forms.label name="nama_matkul${newDataCount}">Mata Kuliah</x-forms.label>
                            <x-forms.input name="nama_matkul${newDataCount}" placeholder="Masukan mata kuliah yang ditinggalkan"/>
                        </div>
                        <div>
                            <x-forms.label name="hari${newDataCount}">Hari</x-forms.label>
                            <x-forms.input name="hari${newDataCount}" placeholder="Masukkan hari mata kuliah yang ditinggalkan (contoh: Senin)" />
                        </div>
                        <div>
                            <x-forms.label name="jam${newDataCount}">Jam</x-forms.label>
                            <x-forms.input name="jam${newDataCount}" placeholder="Contoh : 13.30 - 15.10"/>
                        </div>
                    </div>
                    <x-button.delete onclick="removeDataDiv(this)" class="mt-10px">Hapus</x-button.delete>
                `;

            newDataCountainer.appendChild(newDataDiv);
            newDataCount++;
            newDataCountainer.classList.remove('hidden');

            if (newDataCount === maxDataCount) {
                document.getElementById('addCountainer').classList.add('hidden');
                return;
            }
        }

        function removeDataDiv(button) {
            const newDataDiv = button.parentElement;
            newDataDiv.remove();
            newDataCount--;
            document.getElementById('addCountainer').classList.remove('hidden');
            document.getElementById('addCountainer').classList.add('block');
            if (newDataCount === 2) {
                document.getElementById('newDataCountainer').classList.add('hidden');
            }
        }
    </script>
</x-mahasiswa-app>