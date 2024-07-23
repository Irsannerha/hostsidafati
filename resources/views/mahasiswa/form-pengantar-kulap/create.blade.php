<x-mahasiswa-app>
    <main class="main-container" id="FormPengantarKulap">
        <section class="m-40px">
            <h2 class="text-main-black">Form Pengajuan Pengantar Kuliah Lapangan</h2>
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
                            <x-forms.label name="no_hp_mhs" required>No.Hp Mahasiswa</x-forms.label>
                            <x-forms.input name="no_hp_mhs" placeholder="Masukkan nomor telepon Anda" type="tel"
                                required />
                        </div>
                        <div>
                            <x-forms.label name="alamat_mhs" required>Alamat Lengkap</x-forms.label>
                            <x-forms.input name="alamat_mhs" required textarea="true" rows="6"
                                placeholder="Masukan alamat Anda dengan lengkap..."></x-forms.input>
                        </div>
                        <div>
                            <x-forms.label name="email" required>Email</x-forms.label>
                            <x-forms.input name="email" placeholder="Masukkan email Anda" type="email" required />
                        </div>
                    </section>
                    <!-- Mata Kuliah Baru -->
                    <section>
                        <x-cards.section>Data Instansi</x-cards.section>
                        <div class="grid grid-cols-2 grid-flow-row gap-6">
                            <div>
                                <x-forms.label name="nama_instansi" required>Nama Instansi</x-forms.label>
                                <x-forms.input name="nama_instansi" placeholder="Masukkan nama instansi Anda"
                                    required />
                            </div>
                            <div class="row-span-3">
                                <x-forms.label name="alamat_instansi" required>Alamat Instansi</x-forms.label>
                                <x-forms.input name="alamat_instansi" required textarea="true" rows="5"
                                    placeholder="Masukan alamat dengan lengkap.."></x-forms.input>
                            </div>
                            <div>
                                <x-forms.label name="nama_pimpinan_instansi" required>Nama
                                    Pimpinan Instansi
                                </x-forms.label>
                                <x-forms.input name="nama_pimpinan_instansi"
                                    placeholder="Masukan nama pimpinan instansi" required />
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <x-forms.label name="file_ksm" required info="maks 1mb">Upload KSM
                                    </x-forms.label>
                                    <x-forms.input-file name="file_ksm" required />
                                </div>
                                <div>
                                    <x-forms.label name="file_pengantar_prodi" required info="maks 1mb">Upload Pengantar
                                        Prodi</x-forms.label>
                                    <x-forms.input-file name="file_pengantar_prodi" required />
                                </div>
                            </div>
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