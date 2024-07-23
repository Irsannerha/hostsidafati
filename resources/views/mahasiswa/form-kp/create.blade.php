<x-mahasiswa-app>
<<<<<<< HEAD
    <main class="main-container" id="FormPengajuanKP">
        <section class="m-40px">
            <h2 class="text-main-black">Form Pengajuan Kerja Praktik</h2>
            <hr class="border-1 mt-10px border-secondary-border">
=======
    <!-- Content start -->
    <div class="main-container">
        <!-- home end -->
        <!-- clients start -->
        <section id="FormPengajuanKP">
            <div class="container">
                <div class="clients p-4 bg-gradient-1">
                    <div class="card-body">
                        <div class="col-md-12">
                        </div>
                        <h2 class="title">Form Pengajuan Kerja Praktik</h2>
                        <small class="text-dark font-5" style="margin-top: 10px; display: block;"><em>*Note: Harap
                                dibaca
                                panduan di bawah kolom!</em></small>
                        <br>
                        <form action="{{ route('mahasiswa.form-kp.store') }}" method="POST">
                            @csrf
                            <section id="firstSection" class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nama">Nama</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" value="" data-role="tagsinput"
                                                placeholder="Nama" name="nama" id="nama" />
>>>>>>> parent of 96d0443 (Merge pull request #12 from Irsannerha/FE-changeAllToComponents)

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label for="nim">NIM</label>
                                            <input class="form-control" type="text" value="" data-role="tagsinput"
                                                placeholder="NIM" name="nim" id="nim" />

                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prodi_id">Program Studi</label>
                                            <select name="prodi_id" class="form-control">
                                                <option value="">Pilih Program Studi</option>
                                                @foreach($prodi as $p)
                                                    <option value="{{ $p->id }}">{{ $p->prodi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                            Prodi</small>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_hp_mhs">No. Hp Mahasiswa</label>
                                            <input class="form-control" type="tel" placeholder="No.Hp Mahasiswa"
                                                name="no_hp_mhs" id="no_hp_mhs" required>
                                        </div>
                                        <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                            Nomor
                                            Hp</small>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email Mahasiswa</label>
                                            <input class="form-control" type="email" placeholder="Email" name="email"
                                                id="email" required>
                                        </div>
                                        <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                            Email
                                            Student ITERA @student.itera.ac.id</small>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="waktu_mulai_pelaksanaan">Waktu Mulai Pelaksanaan</label>
                                            <input class="form-control" type="date"
                                                placeholder="Waktu Mulai Pelaksanaan" name="waktu_mulai_pelaksanaan"
                                                id="waktu_mulai_pelaksanaan" required>
                                        </div>
                                        <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                            Contoh :
                                            09/09/1999 </small>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="alamat_lengkap">Alamat Lengkap</label>
                                            <textarea class="form-control" placeholder="Masukkan Alamat Anda"
                                                name="alamat_lengkap" id="alamat_lengkap" rows="3"></textarea>
                                        </div>
                                        <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                            Contoh :
                                            Jalan. Soekarno Hatta No. 10, Bandar Lampung </small>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="waktu_akhir_pelaksanaan">Waktu Akhir Pelaksanaan</label>
                                            <input class="form-control" type="date"
                                                placeholder="Waktu Akhir Pelaksanaan" name="waktu_akhir_pelaksanaan"
                                                id="waktu_akhir_pelaksanaan" required>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="file_pengantar_prodi">Upload Pengantar Prodi</label>
                                                    <input class="" type="file" name="file_pengantar_prodi"
                                                        id="file_pengantar_prodi" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="file_transkrip">Transkrip</label>
                                                    <input class="" type="file" name="file_transkrip"
                                                        id="file_transkrip" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <!-- Section Data Instansi -->
                                <div
                                    class="col-md-12 bg-primary-main text-white font-bold text-center py-2 rounded-10 mb-4">
                                    Data Instansi</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="instansi">Instansi</label>
                                            <input class="form-control" type="text" placeholder="Instansi"
                                                name="instansi" id="instansi" required>
                                        </div>
                                        <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                            Instansi
                                        </small>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tjp">Tujuan Jabatan Pimpinan</label>
                                            <input class="form-control" type="text"
                                                placeholder="Tujuan Jabatan Pimpinan" name="tjp" id="tjp">
                                        </div>
                                        <small class="text-dark font-5"
                                            style="margin-top: -10px; display: block;">*TIDAK
                                            PERLU
                                            memasukan Nama Pimpinan, Kecuali Permintaan dari Instansi Terkait </small>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="alamat_instansi">Alamat Instansi</label>
                                            <textarea class="form-control" placeholder="Masukkan Alamat Instansi"
                                                name="alamat_instansi" id="alamat_instansi" rows="3"></textarea>
                                        </div>
                                        <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                            Contoh :
                                            Jalan. Soekarno Hatta No. 10, Bandar Lampung </small>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_hp_ins">No. Hp Instansi</label>
                                            <input class="form-control" type="tel" placeholder="No.Hp Instansi"
                                                name="no_hp_ins" id="no_hp_ins" required>
                                        </div>
                                        <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                            Nomor
                                            Hp</small>
                                    </div>
                                </div>
                            </section>
                            <br>
                            <section id="addSection" class="hidden">
                                <div
                                    class="col-md-12 bg-primary-main text-white font-bold text-center py-2 rounded-10 mb-4">
                                    Data Mahasiswa 2</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nama2">Nama</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" value="" data-role="tagsinput"
                                                placeholder="Nama" name="nama2" id="nama2" />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label for="nim2">NIM</label>
                                            <input class="form-control" type="text" value="" data-role="tagsinput"
                                                placeholder="NIM" name="nim2" id="nim2" />

                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prodi_id2">Program Studi</label>
                                            <select name="prodi_id2" class="form-control">
                                                <option value="">Pilih Program Studi</option>
                                                @foreach($prodi as $p)
                                                    <option value="{{ $p->id }}">{{ $p->prodi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                                            Prodi</small>
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
                                <div class="flex justify-between">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="button"
                                                onclick="hideSection()">Kembali</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="col-md-12 flex justify-end" id="hideBtn">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="button"
                                        onclick="hideSection()">Lanjutkan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- clients end -->
    </div>
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

        let newData = document.getElementById('newData');
        newData.addEventListener('click', addNewData);

        let newDataCount = 3;
        const maxDataCount = 5;

        function addNewData() {
            const newDataCountainer = document.getElementById('newDataCountainer');
            const newDataDiv = document.createElement('div');
            newDataDiv.classList.add('data-item', 'mt-3');
            newDataDiv.innerHTML = `
            <div
                class="col-md-12 bg-primary-main text-white font-bold text-center py-2 rounded-10 mb-4">
                Data Mahasiswa ${newDataCount}</div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="nama${newDataCount}">Nama</label>
                        <div class="form-group">
                            <input class="form-control" type="text" value="" data-role="tagsinput"
                                placeholder="Nama" name="nama${newDataCount}" id="nama${newDataCount}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nim${newDataCount}">NIM</label>
                            <input class="form-control" type="text" value="" data-role="tagsinput"
                                placeholder="NIM" name="nim${newDataCount}" id="nim${newDataCount}" />
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prodi_id${newDataCount}">Program Studi</label>
                            <select name="prodi_id${newDataCount}" class="form-control">
                                <option value="">Pilih Program Studi</option>
                                @foreach($prodi as $p)
                                    <option value="{{ $p->id }}">{{ $p->prodi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi
                            Prodi</small>
                    </div>
                </div>
                <button class="bg-slate-800 py-1 px-3 text-white font-bold rounded-10 mb-4" onclick="removeDataDiv(this)">Hapus</button>
                 <br>
            `;
            if (newDataCount === maxDataCount) {
                document.getElementById('addCountainer').classList.add('hidden');
                return;
            }

            newDataCountainer.appendChild(newDataDiv);
            newDataCount++;
            newDataCountainer.classList.remove('hidden');
        }

        function removeDataDiv(button) {
            const newDataDiv = button.parentElement;
            newDataDiv.remove();
            newDataCount--;
            if (newDataCount === 3) {
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
