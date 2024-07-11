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
<div class="modal fade" id="showModal{{ $khs->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $khs->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content" data-bgcolor="#d0d0d0">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $khs->id }}"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Pengajuan KHS/Transkrip/Dokumen Lainnya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
                    <dl class="text-content-box">
                        <dt>Program Studi</dt>
                        <dd class="custom-dd">{{ $khs->Prodi ? $khs->Prodi->prodi : '' }}</dd>

                        <dt>Nama</dt>
                        <dd class="custom-dd">{{ str_replace(',', ', ', $khs->nama) }}</dd>

                        <dt>NIM</dt>
                        <dd class="custom-dd">{{ str_replace(',', ', ', $khs->nim) }}</dd>

                        <dt>No. HP Mahasiswa</dt>
                        <dd class="custom-dd">{{ $khs->no_hp_mhs }}</dd>

                        <dt>Email Mahasiswa</dt>
                        <dd class="custom-dd">{{ $khs->email }}</dd>

                        <dt>Keperluan</dt>
                        <dd class="custom-dd">
                        @if($khs->keperluan == 'KHS')
                          <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">KHS</span>
                          @elseif($khs->keperluan == 'Transkrip')
                          <span class="badge badge-primary" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Transkrip</span>
                          @elseif($khs->keperluan == 'KHS dan Transkrip')
                          <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">KHS dan Transkrip</span>
                          @else
                           <span class="badge badge-dark" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Dokumen Lainnya</span>
                           @endif
                        </dd>

                        <dt>Jumlah Dokumen</dt>
                        <dd class="custom-dd">{{ $khs->jumlah }} Dokumen</dd>

                        <dt>Keterangan (Catatan)</dt>
                        <dd class="custom-dd">
                          {{ $khs->keterangan }}
                          </dd>
                          
                          <dt>Status</dt>
                          <dd class="custom-dd">
                              @if($khs->status == 'Selesai')
                              <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Selesai</span>
                              @elseif($khs->status == 'Diproses')
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

                        $tgl_kegiatan = \Carbon\Carbon::parse($khs->created_at)->timezone('Asia/Jakarta');
                        $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_kegiatan->format('F'));
                        $hari_indo = str_replace(array_keys($hari), array_values($hari), $tgl_kegiatan->format('l'));

                        echo $hari_indo . ', ' . $tgl_kegiatan->format('d') . ' ' . $bulan_indo . ' ' . $tgl_kegiatan->format('Y') . ' / Pukul : ' . $tgl_kegiatan->format('H:i') . ' WIB';
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
