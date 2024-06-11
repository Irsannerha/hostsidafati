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
<div class="modal fade" id="showModal{{ $stm->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $stm->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content" data-bgcolor="#d0d0d0">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $stm->id }}"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Pengajuan Surat Tugas Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
                    <dl class="text-content-box">
                        <dt>Program Studi</dt>
                        <dd class="custom-dd">{{ $stm->Prodi ? $stm->Prodi->prodi : '' }}</dd>

                        <dt>Nama</dt>
                        <dd class="custom-dd">{{ str_replace(',', ', ', $stm->nama) }}</dd>

                        <dt>NIM</dt>
                        <dd class="custom-dd">{{ str_replace(',', ', ', $stm->nim) }}</dd>

                        <dt>Instansi</dt>
                        <dd class="custom-dd">{{ $stm->instansi }}</dd>
                        
                        <dt>Tanggal Balasan</dt>
                        <dd class="custom-dd">
                            <?php
                            $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                            $hari = ['Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jum\'at', 'Saturday' => 'Sabtu', 'Sunday' => 'Minggu'];
                            $tgl_balasan = \Carbon\Carbon::parse($stm->tgl_bls);
                            $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_balasan->format('F'));
                            $hari_indo = str_replace(array_keys($hari), array_values($hari), $tgl_balasan->format('l'));
                            echo $hari_indo . ', ' . $tgl_balasan->format('d') . ' ' . $bulan_indo . ' ' . $tgl_balasan->format('Y');
                            ?>
                        </dd>

                      <dt>Tanggal Mulai Pelaksanaan</dt>
                        <dd class="custom-dd">
                          <?php
                            $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                            $hari = ['Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jum\'at', 'Saturday' => 'Sabtu', 'Sunday' => 'Minggu'];
                            $tgl_mulai_pelaksanaan = \Carbon\Carbon::parse($stm->tgl_mulai_pelaksanaan);
                            $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_mulai_pelaksanaan->format('F'));
                            $hari_indo = str_replace(array_keys($hari), array_values($hari), $tgl_mulai_pelaksanaan->format('l'));
                            echo $hari_indo . ', ' . $tgl_mulai_pelaksanaan->format('d') . ' ' . $bulan_indo . ' ' . $tgl_mulai_pelaksanaan->format('Y');
                          ?>
                        </dd>

                        <dt>Tanggal Akhir Pelaksanaan</dt>
                        <dd class="custom-dd">
                          <?php
                            $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                            $hari = ['Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jum\'at', 'Saturday' => 'Sabtu', 'Sunday' => 'Minggu'];
                            $tgl_akhir_pelaksanaan = \Carbon\Carbon::parse($stm->tgl_akhir_pelaksanaan);
                            $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_akhir_pelaksanaan->format('F'));
                            $hari_indo = str_replace(array_keys($hari), array_values($hari), $tgl_akhir_pelaksanaan->format('l'));
                            echo $hari_indo . ', ' . $tgl_akhir_pelaksanaan->format('d') . ' ' . $bulan_indo . ' ' . $tgl_akhir_pelaksanaan->format('Y');
                          ?>
                        </dd>

                        <dt>Jenis Surat Tugas</dt>
                          <dd class="custom-dd">
                            @if($stm->jenis_surat_tugas == 'Surat Tugas Kerja Praktik (KP)')
                              <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Surat Tugas Kerja Praktik (KP)</span>
                              @elseif($stm->jenis_surat_tugas == 'Surat Tugas Akhir (TA)')
                              <span class="badge badge-info" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Surat Tugas Akhir (TA)</span>
                              @elseif($stm->jenis_surat_tugas == 'Surat Tugas Lomba')
                              <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Surat Tugas Lomba</span>
                              @else
                              <span class="badge badge-dark" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Surat Tugas Lainnya</span>
                              @endif
                        </dd>

                        <dt>Keterangan (Catatan)</dt>
                        <dd class="custom-dd">
                          {{ $stm->keterangan }}
                          </dd>
                          
                          <dt>Status</dt>
                          <dd class="custom-dd">
                              @if($stm->status == 'Selesai')
                              <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Selesai</span>
                              @elseif($stm->status == 'Diproses')
                              <span class="badge badge-warning" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Diproses</span>
                              @else
                              <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ditolak</span>
                              @endif
                          </dd>

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

                        $date = \Carbon\Carbon::parse($stm->created_at)->timezone('Asia/Jakarta');
                        $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $date->format('F'));
                        $hari_indo = str_replace(array_keys($hari), array_values($hari), $date->format('l'));

                        echo $hari_indo . ', ' . $date->format('d') . ' ' . $bulan_indo . ' ' . $date->format('Y') . ' / Pukul : ' . $date->format('H:i') . ' WIB';
                        ?>
                    </dd>
                    </dl>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
