<x-mahasiswa-app>
    <main class="main-container" id="FormPengajuanPemotonganUKT">
        <section class="m-40px">
            <h2 class="text-main-black">Form Pemotongan UKT</h2>
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
                            <x-forms.label name="koor_prodi" required>Koordinator Prodi</x-forms.label>
                            <x-forms.input name="koor_prodi" placeholder="Masukkan nama koordinator prodi Anda"
                                required />
                        </div>
                        <div>
                            <x-forms.label name="nip" required>NIP/NRK</x-forms.label>
                            <x-forms.input name="nip" placeholder="Masukan nip koordinator prodi Anda" required />
                        </div>
                        <div>
                            <x-forms.label name="gol_ukt" required>Golongan UKT</x-forms.label>
                            <x-forms.input name="gol_ukt" placeholder="Masukan golongan UKT. Contoh : Gol VI" />
                        </div>
                        <div>
                            <x-forms.label name="besaran_ukt" required>Besaran UKT yang dibayarkan</x-forms.label>
                            <x-forms.input name="besaran_ukt" placeholder="Masukan besaran UKT. Contoh : 3.500.000"
                                required />
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
