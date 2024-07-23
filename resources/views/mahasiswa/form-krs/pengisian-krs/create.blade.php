<x-mahasiswa-app>
    <main class="main-container" id="FormPengajuanPengisianKRS">
        <section class="m-40px">
            <h2 class="text-main-black">Form Permohonan Pengisian KRS</h2>
            <hr class="border-1 mt-10px border-secondary-border">

            <form action="" method="POST">
                @csrf
                <div id="firstSection">
                    <section class="grid grid-cols-2 gap-6">
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
                            <x-forms.select-input name="kode_prodi" tabindex="0" placeholder="Pilih program studi Anda"
                                :options="['0' => 'Teknik Informatika', '1' => 'Teknik Industri', '2' => 'Teknik Biomedis']" />
                        </div>
                        <div>
                            <x-forms.label name="tahun_akademik" required>Tahun Akademik</x-forms.label>
                            <div class="grid grid-cols-7">
                                <di class="col-span-3">
                                    <x-forms.input name="tahun_akademik_1" placeholder="Tahun awal periode"
                                        type="datetime" required />
                                </di>
                                <x-tabler-slash class="w-10 h-10 m-auto" />
                                <div class="col-span-3">
                                    <x-forms.input class="cols-span-3" name="tahun_akademik_2"
                                        placeholder="Tahun akhir periode" type="datetime" required />
                                </div>
                            </div>
                        </div>
                        <div>
                            <x-forms.label name="doswal" required>Dosen wali</x-forms.label>
                            <x-forms.input name="doswal" placeholder="Masukan nama dosen wali Anda" type="text"
                                required />
                        </div>
                        <div>
                            <x-forms.label name="alasan_pengisian" required>Alasan Pengisian KRS</x-forms.label>
                            <x-forms.input name="alasan_pengisian" required textarea="true" rows="6"
                                placeholder="Jelaskan dengan rinci alasan terlambatnya pengisan KRS"></x-forms.input>
                        </div>
                        <div>
                            <x-forms.label name="koor_prodi" required>Koordinator Prodi</x-forms.label>
                            <x-forms.input name="koor_prodi" placeholder="Masukan nama koordinator prodi Anda"
                                type="text" required />
                        </div>
                        <div>
                            <x-forms.label name="semester" required>Semester</x-forms.label>
                            <x-forms.select-input name="semester" tabindex="0" placeholder="Pilih semester Anda"
                                :options="['0' => 'Ganjil', '1' => 'Genap']" />
                        </div>
                    </section>
                    <!-- Mata Kuliah Baru -->
                    <section>
                        <x-cards.section>Mata Kuliah yang ingin ditambahkan</x-cards.section>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <x-forms.label name="nama_matkul_baru_1" required>Nama Mata Kuliah</x-forms.label>
                                <x-forms.input name="nama_matkul_baru_1"
                                    placeholder="Nama MK tanpa disingkat. Contoh : Kimia Dasar" required />
                            </div>
                            <div>
                                <x-forms.label name="kode_matkul_baru_1" required>Kode Mata Kuliah</x-forms.label>
                                <x-forms.input name="kode_matkul_baru_1" placeholder="Kode MK. Contoh : IF3011"
                                    required />
                            </div>
                            <div>
                                <x-forms.label name="kode_kelas_baru_1" required>Kode Kelas</x-forms.label>
                                <x-forms.input name="kode_kelas_baru_1" placeholder="Kode Kelas. Contoh : RA"
                                    required />
                            </div>
                            <div>
                                <x-forms.label name="sks_baru_1" required>SKS</x-forms.label>
                                <x-forms.input name="sks_baru_1" placeholder="Jumlah SKS Mata Kuliah. Contoh : 3"
                                    type="number" required />
                            </div>
                            <div>
                                <x-forms.label name="kelas_baru_1" required>Kelas</x-forms.label>
                                <x-forms.input name="kelas_baru_1" placeholder="Jumlah SKS Mata Kuliah. Contoh : 3"
                                    required />
                            </div>
                        </div>
                        <div id="newMatkulCountainer" class="mt-12">

                        </div>
                        <div id="addNewCountainer" class="flex justify-center font-semibold my-24px">
                            <x-button.add id="addNewMatkulBtn">Tambah mata kuliah</x-button.add>
                        </div>
                    </section>
                    <div class="flex justify-end mt-16">
                        <x-button.primary>Submit</x-button.primary>
                    </div>
                </div>
            </form>

        </section>
    </main>
    <script>
        let addNewMatkulBtn = document.getElementById('addNewMatkulBtn');
        addNewMatkulBtn.addEventListener('click', addNewMatkul);

        let newMatkulCount = 1;
        const maxMatkul = 5;

        function addNewMatkul() {
            // if (oldMatkulCount >= maxMatkul) return;
            const newMatkulContainer = document.getElementById('newMatkulCountainer');
            const newMatkulDiv = document.createElement('div');
            newMatkulDiv.classList.add('matkul-item', 'mt-3');
            newMatkulDiv.innerHTML = `
                    <div class="grid grid-cols-2 gap-6">
                            <div>
                                <x-forms.label name="nama_matkul_baru_${newMatkulCount + 1}">Nama Mata Kuliah Baru</x-forms.label>
                                <x-forms.input name="nama_matkul_baru_${newMatkulCount + 1}"
                                    placeholder="Nama MK tanpa disingkat. Contoh : Kimia Dasar" />
                            </div>
                            <div>
                                <x-forms.label name="kode_matkul_baru_${newMatkulCount + 1}">Kode Mata Kuliah Baru</x-forms.label>
                                <x-forms.input name="kode_matkul_baru_${newMatkulCount + 1}" placeholder="Kode MK. Contoh : IF3011" />
                            </div>
                            <div>
                                <x-forms.label name="kode_kelas_baru_${newMatkulCount + 1}">Kode Kelas Baru</x-forms.label>
                                <x-forms.input name="kode_kelas_baru_${newMatkulCount + 1}" placeholder="Kode Kelas. Contoh : RA" />
                            </div>
                            <div>
                                <x-forms.label name="sks_baru_${newMatkulCount + 1}">SKS</x-forms.label>
                                <x-forms.input name="sks_baru_${newMatkulCount + 1}" placeholder="Jumlah SKS Mata Kuliah. Contoh : 3"
                                    type="number" />
                            </div>
                            <div>
                                <x-forms.label name="kelas_baru_${newMatkulCount + 1}">Kelas</x-forms.label>
                                <x-forms.input name="kelas_baru_${newMatkulCount + 1}" placeholder="Jumlah SKS Mata Kuliah. Contoh : 3" />
                            </div>
                        </div>
                        <x-button.delete onclick="removeNewMatkul(this)" class="mt-10px">Hapus</x-button.delete>
                `;
            newMatkulContainer.appendChild(newMatkulDiv);
            newMatkulCount++;
            newMatkulContainer.classList.remove('hidden');
            if (newMatkulCount === maxMatkul) {
                document.getElementById('addNewCountainer').classList.add('hidden');
                return;
            }
        }

        function removeNewMatkul(button) {
            const newMatkulDiv = button.parentElement;
            newMatkulDiv.remove();
            newMatkulCount--;
            document.getElementById('addNewCountainer').classList.remove('hidden');
            document.getElementById('addNewCountainer').classList.add('block');
            if (newMatkulCount === 0) {
                document.getElementById('newMatkulContainer').classList.add('hidden');
            }
        }
    </script>
</x-mahasiswa-app>
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
