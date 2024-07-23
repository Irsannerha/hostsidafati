<x-mahasiswa-app>
    <main class="main-container" id="FormPengajuanRekomMahasiswa">
        <section class="m-40px">
            <h2 class="text-main-black">Form Pengajuan Rekomendasi Mahasiswa</h2>
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
                            <x-forms.label name="doswal" required>Dosen Wali</x-forms.label>
                            <x-forms.input name="doswal" placeholder="Masukkan nama dosen wali Anda" required />
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
                            <x-forms.label name="semester" required>Semester</x-forms.label>
                            <x-forms.input name="semester" placeholder="Masukan semester Anda sekarang. Contoh : 6" />
                        </div>
                        <div>
                            <x-forms.label name="program_yang_diikuti" required>Program yang akan
                                diikuti</x-forms.label>
                            <x-forms.input name="program_yang_diikuti"
                                placeholder="Tuliskan program yang akan diikuti. Contoh : MSIB Magang" required />
                        </div>
                        <div>
                            <x-forms.label name="ipk" required>IPK</x-forms.label>
                            <x-forms.input name="ipk" placeholder="Masukan IPK anda menggunakan menggunakan (.)"
                                required />
                        </div>
                        <div class="col-span-2">
                            <x-forms.label name="prestasi_akademik" required>Prestasi Akademik/Non-Akademik yang pernah
                                dicapai</x-forms.label>
                            <x-forms.input name="prestasi_akademik" required textarea="true" rows="4"
                                placeholder="Tuliskan seluruh prestasi bidang akademik/non-akademik yang pernah dicapai selama berstatus mahasiswa"></x-forms.input>
                        </div>
                        <div class="grid grid-cols-2 gap-6">
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
                    </section>
                    <!-- Mata Kuliah Baru -->
                    <div class="flex justify-end mt-16">
                        <x-button.primary>Submit</x-button.primary>
                    </div>
                </div>
            </form>

        </section>
    </main>
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
