<x-admin-app>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title font-weight-bold">
                                <h4>Data Tendik, Asmik, Dan Laboran</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item font-weight-bold h5">
                                        <a href="dashboard.html">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                                        Tendik, Asmik, Dan Laboran
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <div class="time">
                                <button id="dateTime" class="btn btn-primary font-weight-bold" type="button" data-toggle="dropdown">
                                    <span id="currentDateTime"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Form Tambah Prodi -->
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-dark h4">Form Tambah Tendik, Asmik, Dan Laboran</h4>
                            </div>
                        </div>
                        <hr />
                        <br />
                        <form action="{{ route('superadmin.taslab.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Unit Kerja</label>
                                        <input type="text" name="unit_kerja" class="form-control" placeholder="Masukkan Unit Kerja" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Pendidikan</label>
                                        <select class="form-control" name="pendidikan" id="pendidikan">
                                            <option value="">Pilih Pendidikan</option>
                                            <option value="Strata (S1)">Strata (S1)</option>
                                            <option value="Magister (S2)">Magister (S2)</option>
                                            <option value="Doktor (S3)">Doktor (S3)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Terhitung Mulai Tanggal</label>
                                        <input type="date" name="tmt" class="form-control" placeholder="Masukkan Terhitung Mulai Tanggal" />
                                    </div>
                                </div>
                                <!-- <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Masa Kerja</label>
                                        <input type="text" name="masa_kerja" id="masa_kerja" class="form-control" placeholder="Masukkan Masa Kerja" />
                                    </div>
                                </div> -->
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Status Pegawai</label>
                                        <select class="form-control" name="status_pegawai" id="status_pegawai">
                                            <option value="">Pilih Status Pegawai</option>
                                            <option value="ASN">ASN</option>
                                            <option value="Non ASN">Non ASN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jabatan</label>
                                        <select class="form-control" name="jabatan" id="jabatan">
                                            <option value="">Pilih Jabatan</option>
                                            <option value="Tendik">Tendik</option>
                                            <option value="Asmik">Asmik</option>
                                            <option value="Laboran">Laboran</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Bagian Tugas</label>
                                        <input type="text" name="bagian_tugas" class="form-control" placeholder="Masukkan Bagian Tugas" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">NITK</label>
                                        <input type="text" name="nitk" class="form-control" placeholder="Masukkan NITK" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nomor HP</label>
                                        <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No.Hp" />
                                    </div>
                                </div>
                                <!-- <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Umur</label>
                                        <input type="text" name="umur" class="form-control" placeholder="Masukkan Umur" />
                                    </div>
                                </div> -->
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Masukkan Email" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary float-right" id="sa-custom-position">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Form Tambah Prodi End -->
                </div>
                <!-- Checkbox select Datatable End -->
            </div>
        </div>
    </div>
    <!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('tmt').addEventListener('change', function() {
            var tmtDate = new Date(this.value);
            var currentDate = new Date();
            
            var diffYears = currentDate.getFullYear() - tmtDate.getFullYear();
            var diffMonths = currentDate.getMonth() - tmtDate.getMonth();
            var diffDays = currentDate.getDate() - tmtDate.getDate();

            if (diffDays < 0) {
                diffMonths--;
                diffDays += new Date(tmtDate.getFullYear(), tmtDate.getMonth() + 1, 0).getDate();
            }

            if (diffMonths < 0) {
                diffYears--;
                diffMonths += 12;
            }

            var masaKerja = diffYears + ' Tahun ' + diffMonths + ' Bulan ' + diffDays + ' Hari';
            document.getElementById('masa_kerja').value = masaKerja;
        });
    });
</script> -->
</x-admin-app>
