<style>
.modal-sm {
    max-width: 50%;
    /* Atur lebar maksimum modal */
    max-height: 95%;
    /* Atur tinggi maksimum modal */
    margin: 1.95rem auto;
    /* Atur margin */
}

.table-responsive {
    overflow-x: auto;
    /* Mengaktifkan scroll horizontal */
}

/* CSS untuk menambahkan z-index ke thead */
@media screen and (max-width: 576px) {
    .modal-sm {
        max-width: 95%;
        /* Atur lebar maksimum modal untuk perangkat seluler */
    }
}

.text-content-box {
    display: grid;
    grid-template-columns: max-content 1fr;
    column-gap: 45px;
}

.text-content-box dd {
    font-weight: 500;
    margin-bottom: 5px;
}

@media only screen and (max-width: 768px) {
    .card-hdr {
        max-height: 500px;
        /* Atur ketinggian maksimum yang diinginkan */
        overflow-y: auto;
        /* Aktifkan pengguliran vertikal jika konten lebih panjang dari ketinggian maksimum */
    }
}

.custom-dd {
    border: 1px solid #999;
    /* Border dengan ketebalan 1px dan warna abu-abu */
    border-radius: 5px;
    /* Radius border 5px */
    padding: 4px;
    /* Padding untuk jarak antara konten dan border */
    font-size: 14px;
    /* Ukuran font */
}

.custom-dd ol {
    list-style-type: none;
    /* Menghilangkan bullet point */
    padding: 0;
}

.custom-dd li {
    margin-bottom: 5px;
    /* Margin antara setiap item daftar */
}

.card {
    border: 1px solid #999;
    /* Border dengan ketebalan 1px dan warna abu-abu */
    border-radius: 5px;
    /* Radius border 5px */
}
</style>

<!-- Modal Lihat -->
<div class="modal fade" id="showModal{{ $atan->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $atan->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content" data-bgcolor="#d0d0d0">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $atan->id }}"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Izin Kegiatan Mahasiswa HIMA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
                    <dl class="text-content-box">
                        <dt>Program Studi</dt>
                        <dd class="custom-dd">{{ $atan->Prodi ? $atan->Prodi->prodi : '' }}</dd>

                        <dt>Nama Pemohon</dt>
                        <dd class="custom-dd">{{ $atan->nama_pemohon }}</dd>

                        <dt>Email</dt>
                        <dd class="custom-dd">{{ $atan->email }}</dd>

                        <dt>Status</dt>
                          <dd class="custom-dd">
                              @if($atan->status == 'Selesai')
                              <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Selesai</span>
                              @elseif($atan->status == 'Diproses')
                              <span class="badge badge-warning" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Diproses</span>
                              @else
                              <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ditolak</span>
                              @endif
                          </dd>

                        <dt>Nama Kegiatan</dt>
                        <dd class="custom-dd">{{ $atan->nama_kegiatan }}</dd>

                        <dt>Tanggal Kegiatan</dt>
                        <dd class="custom-dd">
                            <?php
                            $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                            $hari = ['Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jum\'at', 'Saturday' => 'Sabtu', 'Sunday' => 'Minggu'];
                            $tgl_kegiatan = \Carbon\Carbon::parse($atan->tgl_kegiatan);
                            $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_kegiatan->format('F'));
                            $hari_indo = str_replace(array_keys($hari), array_values($hari), $tgl_kegiatan->format('l'));
                            echo $hari_indo . ', ' . $tgl_kegiatan->format('d') . ' ' . $bulan_indo . ' ' . $tgl_kegiatan->format('Y');
                            ?>
                        </dd>

                        <dt>Waktu Mulai Kegiatan</dt>
                        <dd class="custom-dd">{{ \Carbon\Carbon::parse($atan->mulai_kegiatan)->format('H:i') }} WIB</dd>

                        <dt>Waktu Akhir Kegiatan</dt>
                        <dd class="custom-dd">{{ \Carbon\Carbon::parse($atan->akhir_kegiatan)->format('H:i') }} WIB</dd>

                        

                        <dt>No. HP</dt>
                        <dd class="custom-dd">{{ $atan->no_hp }}</dd>

                        <dt>Tempat Pelaksanaan</dt>
                        <dd class="custom-dd">{{ $atan->tempat_pelaksanaan }}</dd>

                        <dt>Jumlah Peserta</dt>
                        <dd class="custom-dd">{{ $atan->jumlah_peserta }}</dd>

                        <dt>Judul</dt>
                        <dd class="custom-dd">{{ $atan->penanggung_jawab }}</dd>
                
                          <dt>Diajukan Pada Tanggal</dt>

                        <dd class="custom-dd">
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];

                        $hari = [
                            'Monday' => 'Senin',
                            'Tuesday' => 'Selasa',
                            'Wednesday' => 'Rabu',
                            'Thursday' => 'Kamis',
                            'Friday' => 'Jum\'at',
                            'Saturday' => 'Sabtu',
                            'Sunday' => 'Minggu'
                        ];

                        $tgl_kegiatan = \Carbon\Carbon::parse($atan->created_at)->timezone('Asia/Jakarta');
                        $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_kegiatan->format('F'));
                        $hari_indo = str_replace(array_keys($hari), array_values($hari), $tgl_kegiatan->format('l'));

                        echo $hari_indo . ', ' . $tgl_kegiatan->format('d') . ' ' . $bulan_indo . ' ' . $tgl_kegiatan->format('Y') . ' / Pukul : ' . $tgl_kegiatan->format('H:i') . ' WIB';
                        ?>
                    </dd>
                    <dt>Surat Izin Kegiatan</dt>
                    <dd class="custom-dd"><a href="{{ asset('assets/surat_izin/' . $atan->surat_izin) }}" download class="btn btn-outline-primary btn-sm "><i class="fa fa-download"></i> Download Surat Izin Kegiatan</a></dd>
                    </dl>
                    </dl>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
