<x-client-app>
        <!-- Content start -->
        <section class="bg-home bg-hexa" id="home">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 text-center">
                                <div class="title-heading mt-4">
                                    <h1 class="heading mb-1 font-weight-bold text-white">
                                        Form Izin Kegiatan Himpunan Mahasiswa
                                    </h1>
                                    <p class="para-desc text-white">
                                        Form ini digunakan untuk mengajukan izin kegiatan mahasiswa,
                                        guna mempermudah proses pengajuan kegiatan himpunan mahasiswa.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- home end -->
        <!-- clients start -->
        <section id="FormIzinKegiatan">
            <div class="container">
                <div class="clients p-4 bg-gradient-1">
                <button type="submit" class="btn btn-primary float-right btn-key" data-toggle="modal" data-target="#tabelTa">
                        <i class="fa fa-eye"></i>
                       Lihat Pengajuan
                    </button>
                    <div class="card-body">
                    <div class="col-md-12">
                    </div>
                        <h2 class="title">Form Izin Kegiatan HIMA</h2>
                        <form action="{{ route('kegiatan.store') }}" method="POST">
                            @csrf
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prodi_id">Program Studi</label>
                                    <select name="prodi_id" class="form-control">
                                        <option value="">Pilih Program Studi</option>
                                        @foreach($prodi as $prodi)
                                        <option value="{{ $prodi->id }}">{{ $prodi->prodi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Prodi</small>
                            </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" placeholder="Email Pemohon Kegiatan" name="email" id="email" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Email Student ITERA</small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_kegiatan">Nama Kegiatan</label>
                                        <input class="form-control" type="text" placeholder="Nama Kegiatan" name="nama_kegiatan" id="nama_kegiatan" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Contoh : Acara Ramah Tamah atau Acara Kegiatan PPLK/Himpunan/UKM</small>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tgl_kegiatan">Tanggal Kegiatan</label>
                                        <input class="form-control" type="date" placeholder="Tanggal Kegiatan" name="tgl_kegiatan" id="tgl_kegiatan" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Contoh : 09/09/1999 </small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mulai_kegiatan">Waktu Mulai Kegiatan</label>
                                        <input class="form-control" type="time" placeholder="Waktu Mulai Kegiatan" name="mulai_kegiatan" id="mulai_kegiatan" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Contoh : 07:30</small>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="akhir_kegiatan">Waktu Akhir Kegiatan</label>
                                        <input class="form-control" type="time" placeholder="Waktu Akhir Kegiatan" name="akhir_kegiatan" id="akhir_kegiatan" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Contoh : 10:45</small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tempat_pelaksanaan">Tempat Pelaksanaan</label>
                                        <input class="form-control" type="text" placeholder="Tempat Pelaksanaan" name="tempat_pelaksanaan" id="tempat_pelaksanaan" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Contoh : Kampus/Lapangan/Gedung/Dll</small>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jumlah_peserta">Jumlah Peserta</label>
                                        <input class="form-control" type="number" placeholder="Jumlah Peserta" name="jumlah_peserta" id="jumlah_peserta" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Contoh : 100 Peserta</small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="penanggung_jawab">Penanggung Jawab Kegiatan</label>
                                        <input class="form-control" type="text" placeholder="Penanggung Jawab Kegiatan" name="penanggung_jawab" id="penanggung_jawab" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Nama Penanggung Jawab Kegiatan Contoh : Jacklyn</small>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_pemohon">Nama Pemohon Kegiatan</label>
                                        <input class="form-control" type="text" placeholder="Nama Pemohon Kegiatan" name="nama_pemohon" id="nama_pemohon" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Nama Pemohon Kegiatan Contoh : Fulan Jacklyn</small>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp">Kontak/No.Telp/WA</label>
                                        <input class="form-control" type="text" placeholder="Kontak/No.Telp/WA" name="no_hp" id="no_hp" required>
                                    </div>
                                    <small class="text-dark font-5" style="margin-top: -10px; display: block;">*Isi Nomor Hp/Telp/Wa</small>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                <!-- Modal -->
        <div class="modal fade" id="tabelTa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">
                            <i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Pengajuan Kegiatan Mahasiswa
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive ">
                            <div class="row mb-3">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6 text-end"></div>
                            </div>
                            <table id="example" style="width: 100%;"  class="table table-striped table-bordered text-dark font-weight-500">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Pemohon</th>
                                        <th>Email</th>
                                        <th>Prodi</th>
                                        <th>Kegiatan</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Pengajuan</th>
                                        <th>Selesai</th>
                                    </tr>
                                </thead>
                                <tbody style="color: black;">
                                    @foreach ($kegiatan as $kegiatan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kegiatan->nama_pemohon }}</td>
                                        <td>{{ $kegiatan->email }}</td>
                                        <td>{{ $kegiatan->prodi ? $kegiatan->prodi->prodi : '' }}</td>
                                        <td>{{ $kegiatan->nama_kegiatan }}</td>
                                        <td>
                                            @if($kegiatan->status == 'Selesai')
                                                <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Selesai</span>
                                            @elseif($kegiatan->status == 'Diproses')
                                                <span class="badge badge-warning" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Diproses</span>
                                            @else
                                                <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>{{ $kegiatan->keterangan }}</td>
                                        <td>
                                        <?php
                                        $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                                        $tgl_kegiatan = \Carbon\Carbon::parse($kegiatan->created_at)->timezone('Asia/Jakarta');
                                        $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_kegiatan->format('F'));
                                        echo $tgl_kegiatan->format('d') . ' ' . $bulan_indo . ' ' . $tgl_kegiatan->format('Y') . ' / ' . $tgl_kegiatan->format('H:i') . ' WIB';
                                        ?>
                                        </td>
                                        <td>
                                            <?php
                                            $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                                            $tgl_updated = \Carbon\Carbon::parse($kegiatan->updated_at)->timezone('Asia/Jakarta');
                                            $bulan_indo_updated = str_replace(array_keys($bulan), array_values($bulan), $tgl_updated->format('F'));
                                            echo $tgl_updated->format('d') . ' ' . $bulan_indo_updated . ' ' . $tgl_updated->format('Y') . ' / ' . $tgl_updated->format('H:i') . ' WIB';
                                            ?>
                                        </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- Akhir Modal -->
    <div class="notification">
        <div class="notification__message">
            <h1>SELAMAT DATANG!</h1>
                <p>👋 Halo Mahasiswa ITERA!. Selamat datang di Formulir Pengajuan Izin Kegiatan HIMA!</p>
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
             </div>
        </section>
        <!-- clients end -->
        <!-- features start -->
        <section class="section-sm" id="faq" style="margin-top: -100px">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mb-4 pb-1">
                            <h2>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </h2>
                            <p class="text-muted">Form Izin Kegiatan</p>
                        </div>
                    </div>
                </div>

                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </section>
        <!-- End Content -->
</x-client-app>
<!-- Sweet Alert -->
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
@endif

<script>
$(document).ready( function () {
    $('#example').DataTable();
} );
</script>