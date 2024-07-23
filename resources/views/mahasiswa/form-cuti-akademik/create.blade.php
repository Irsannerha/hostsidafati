<x-mahasiswa-app>
    <main class="main-container" id="FormPengajuanCutiAkademik">
        <section class="m-40px">
            <h2 class="text-main-black">Form Pengajuan Cuti Akademik</h2>
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
                            <x-forms.label name="semester" required>Semester</x-forms.label>
                            <x-forms.select-input name="semester" tabindex="0" placeholder="Pilih semester Anda"
                                :options="['0' => 'Ganjil', '1' => 'Genap']" />
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
                            <x-forms.label name="doswal" required>Dosen Wali</x-forms.label>
                            <x-forms.input name="doswal" placeholder="Masukkan nama dosen wali Anda" required />
                        </div>
                        <div>
                            <x-forms.label name="koor_prodi" required>Koordinator Prodi</x-forms.label>
                            <x-forms.input name="koor_prodi" placeholder="Masukkan nama koordinator prodi Anda"
                                required />
                        </div>
                        <div>
                            <x-forms.label name="alamat_mhs" required>Alamat Lengkap</x-forms.label>
                            <x-forms.input name="alamat_mhs" required textarea="true" rows="6"
                                placeholder="Masukan alamat Anda dengan lengkap..."></x-forms.input>
                        </div>
                        <div class="col-span-2">
                            <x-forms.label name="alasan_cuti_akademik" required>Alasan Cuti Akademik</x-forms.label>
                            <x-forms.input name="alasan_cuti_akademik" rows="5"
                                placeholder="Ceritakan alasan Anda ingin cuti akademik secara detail kepada kami"
                                textarea="true" required />
                        </div>
                        <div class="col-span-2">
                            <p class="font-semibold">Upload file ukuran maksimal <span class="text-red-500">1mb</span>
                                <span>--------------------------------------------------------------------------------------------------------</span>
                            </p>
                        </div>
                    </section>
                    <!-- Mata Kuliah Baru -->
                    <section class="grid grid-cols-3 gap-10 mt-3">
                        <div>
                            <x-forms.label name="file_transkrip" required>Transkrip</x-forms.label>
                            <x-forms.input-file name="file_transkrip" required />
                        </div>
                        <div>
                            <x-forms.label name="file_khs" required>KHS</x-forms.label>
                            <x-forms.input-file name="file_khs" required />
                        </div>
                        <div>
                            <x-forms.label name="file_ktm" required>Upload KTM</x-forms.label>
                            <x-forms.input-file name="file_ktm" required />
                        </div>
                        <div>
                            <x-forms.label name="file_bukti_pembayaran_ukt" required>Bukti lunas pembayaran
                                UKT</x-forms.label>
                            <x-forms.input-file name="file_bukti_pembayaran_ukt" required />
                        </div>
                        <div>
                            <x-forms.label name="file_bebas_pinjam_perpus" required>Surat bebas pinjam
                                Perpustakaan</x-forms.label>
                            <x-forms.input-file name="file_bebas_pinjam_perpus" required />
                        </div>
                    </section>
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
