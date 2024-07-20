<x-mahasiswa-app>
    <!-- Content start -->
    <div class="main-container">
        <!-- home end -->
        <!-- clients start -->
        <section id="FormPengajuanDispensasi">
            <div class="container">
                <div class="clients p-4 bg-gradient-1">
                    <div class="card-body">
                        <div class="col-md-12">
                        </div>
                        <h2 class="title">Form Pengajuan Dispensasi Kuliah</h2>
                        <hr>
                        <br>
                        <form action="" method="POST">
                            @csrf
                            <section class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input class="form-control" type="text" value="" data-role="tagsinput"
                                                placeholder="Masukkan nama Anda" name="nama" id="nama" required />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label for="nim">NIM</label>
                                            <input class="form-control" type="text" value="" data-role="tagsinput"
                                                placeholder="Masukkan NIM Anda" name="nim" id="nim" required />

                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prodi_id">Program Studi</label>
                                            <select name="prodi_id" class="form-control" required>
                                                <option value="">Pilih program studi Anda</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="doswal">Dosen Wali</label>
                                            <input class="form-control" type="text" value="" data-role="tagsinput"
                                                placeholder="Masukkan nama Dosen wali Anda" name="doswal" id="doswal"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="koor_prodi">Koordinator Prodi</label>
                                            <input class="form-control" type="text"
                                                placeholder="Masukkan nama Koordinator prodi Anda" name="koor_prodi"
                                                id="koor_prodi" value="{{ old('koor_prodi') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tgl_mulai_dispen">Tanggal Mulai Dispensasi</label>
                                            <input class="form-control" type="date" placeholder="18 - Juni - 2023"
                                                name="tgl_mulai_dispen" id="tgl_mulai_dispen" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tgl_akhir_dispen">Tanggal Akhir Dispensasi</label>
                                            <input class="form-control" type="date" placeholder="18 - Juni - 2023"
                                                name="tgl_akhir_dispen" id="tgl_akhir_dispen" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="file_surat_pernyataan">Surat Pernyataan</label>
                                                <input class="" type="file" name="file_surat_pernyataan"
                                                    id="file_surat_pernyataan" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="file_undangan">Surat Undangan</label>
                                                <input class="" type="file" name="file_undangan" id="file_undangan"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tujuan_dispen">Tujuan Dispensasi Kuliah</label>
                                            <textarea class="form-control"
                                                placeholder="Jelaskan dengan rinci alasan Anda melakukan dispensasi kuliah"
                                                name="tujuan_dispen" id="tujuan_dispen" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Section Data Instansi -->
                                <div
                                    class="col-md-12 bg-primary-main text-white font-bold text-center py-2 rounded-10 mb-4">
                                    Mata Kuliah yang Ditinggalkan</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_matkul">Mata Kuliah</label>
                                            <input class="form-control" type="text"
                                                placeholder="Masukkan nama matakuliah yang ditinggalkan"
                                                name="nama_matkul" id="nama_matkul" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="hari_dispen">Hari</label>
                                            <input class="form-control" type="text"
                                                placeholder="Masukkan hari mata kuliah yang ditinggalkan (contoh: Senin)"
                                                name="hari_dispen" id="hari_dispen" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jam_dispen">Jam</label>
                                            <input class="form-control" type="text" placeholder="Contoh : 13.30 - 15.10"
                                                name="jam_dispen" id="jam_dispen" required>
                                        </div>
                                    </div>
                                </div>
                                <div id="newDataCountainer" class="hidden">
                                    <!-- Form akan ditambahkan disini -->
                                </div>
                                <div id="addCountainer" class="col-md-12 font-bold flex justify-center">
                                    <button id="newData" type="button"
                                        class="flex gap-1 bg-primary-main py-2 px-4 rounded-10 text-white">
                                        <x-eva-plus-circle-outline class="w-6 h-6" />Tambah Mata Kuliah
                                    </button>
                                </div>
                                <br>
                                <div class="col-md-12 flex justify-end">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                    </div>
                                </div>
                            </section>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- clients end -->
    </div>
    <script>
        let newData = document.getElementById('newData');
        newData.addEventListener('click', addNewData);

        let newDataCount = 2;
        const maxDataCount = 6;

        function addNewData() {
            const newDataCountainer = document.getElementById('newDataCountainer');
            const newDataDiv = document.createElement('div');
            newDataDiv.classList.add('data-item', 'mt-3');
            newDataDiv.innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_matkul${newDataCount}">Mata Kuliah ke-${newDataCount}"</label>
                            <input class="form-control" type="text"
                                placeholder="Masukkan nama matakuliah yang ditinggalkan"
                                name="nama_matkul${newDataCount}" id="nama_matkul${newDataCount}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hari_dispen${newDataCount}">Hari ke-${newDataCount}</label>
                            <input class="form-control" type="text"
                                placeholder="Masukkan hari mata kuliah yang ditinggalkan (contoh: Senin)"
                                name="hari_dispen${newDataCount}" id="hari_dispen${newDataCount}">
                        </div>
                    </div>
                </div>
                <br>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jam_dispen${newDataCount}">Jam ke-${newDataCount}</label>
                            <input class="form-control" type="text" placeholder="Contoh : 13.30 - 15.10"
                                name="jam_dispen${newDataCount}"" id="jam_dispen${newDataCount}"">
                        </div>
                    </div>
                </div>
                <button class="bg-slate-800 py-1 px-3 text-white font-bold rounded-10 mb-4" onclick="removeDataDiv(this)">Hapus</button>
                 <br>
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
            if (newDataCount === 2) {
                document.getElementById('newDataCountainer').classList.add('hidden');
            }
        }
    </script>
    <!-- End Content -->
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
