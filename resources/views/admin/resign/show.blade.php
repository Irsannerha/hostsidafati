  <!-- Large modal -->
  <style>
    .modal-sm {
      max-width: 50%;
      /* Atur lebar maksimum modal */
      max-height: 50%;
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
  </style>
  <!-- Large modal Detail -->
  <!-- Modal -->
  <div class="modal fade" id="showModal{{ $resign->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content" data-bgcolor="#d0d0d0">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Resign</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive">
          <!-- Tambahkan card box di sini -->
          <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
            <!-- <dl class="row">
              <dt class="col-sm-3 font-16">Nama</dt>
              <dd class="col-sm-9 weight-500 font-16 text-dark">{{ $resign->nama }}</dd>

              <dt class="col-sm-3 font-16">Program Studi</dt>
              <dd class="col-sm-9 weight-500 font-16 text-dark">{{ $resign->Prodi->prodi }}</dd>

              <dt class="col-sm-3 font-16">NRK</dt>
              <dd class="col-sm-9 weight-500 font-16 text-dark"><kbd>{{ $resign->nrk }}</kbd></dd>

              <dt class="col-sm-3 font-16">NIDN</dt>
              <dd class="col-sm-9 weight-500 font-16 text-dark"><kbd>{{ $resign->nidn }}</kbd></dd>

              <dt class="col-sm-3 font-16">Jenis Kelamin</dt>
              <dd class="col-sm-9 weight-500 font-16 text-dark">{{ $resign->jenis_kelamin }}</dd>

              <dt class="col-sm-3 font-16">Terhitung Mulai Tanggal Masuk</dt>
              <dd class="col-sm-9 weight-500 font-16 text-dark">
                <?php
                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                $tmt_masuk = \Carbon\Carbon::parse($resign->tmt_masuk);
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tmt_masuk->format('F'));
                echo $tmt_masuk->format('d') . ' ' . $bulan_indo . ' ' . $tmt_masuk->format('Y');
                ?>
              </dd>

              <dt class="col-sm-3 font-16">Terhitung Mulai Tanggal Keluar</dt>
              <dd class="col-sm-9 weight-500 font-16 text-dark">
                <?php
                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                $tmt_keluar = \Carbon\Carbon::parse($resign->tmt_keluar);
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tmt_keluar->format('F'));
                echo $tmt_keluar->format('d') . ' ' . $bulan_indo . ' ' . $tmt_keluar->format('Y');
                ?>
              </dd>

              <dt class="col-sm-3 font-16">Alasannya</dt>
              <dd class="col-sm-9 weight-500 font-16 text-dark">{{ $resign->alasan }}</dd>

              <dt class="col-sm-3 font-16">Surat Keterangan</dt>
              <dd class="col-sm-9 weight-500 font-16 text-dark">
                @if($resign->surat_keterangan == 'Ada')
                <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 15px;">Ada</span>
                @else
                <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 15px;">Tidak Ada</span>
                @endif
              </dd>
            </dl> -->
            <dl class="text-content-box">
              <dt>Nama</dt>
              <dd>{{ $resign->nama }}</dd>

              <dt>Program Studi</dt>
              <dd>{{ $resign->prodi->prodi }}</dd>

              <dt>NRK</dt>
              <dd><kbd>{{ $resign->nrk }}</kbd></dd>

              <dt>NIDN</dt>
              <dd><kbd>{{ $resign->nidn }}</kbd></dd>

              <dt>Jenis Kelamin</dt>
              <dd>{{ $resign->jenis_kelamin }}</dd>

              <dt>Terhitung Mulai Tanggal Masuk</dt>
              <dd>
                <?php
                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                $tmt_masuk = \Carbon\Carbon::parse($resign->tmt_masuk);
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tmt_masuk->format('F'));
                echo $tmt_masuk->format('d') . ' ' . $bulan_indo . ' ' . $tmt_masuk->format('Y');
                ?>
              </dd>

              <dt>Terhitung Mulai Tanggal Keluar</dt>
              <dd>
                <?php
                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                $tmt_keluar = \Carbon\Carbon::parse($resign->tmt_keluar);
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tmt_keluar->format('F'));
                echo $tmt_keluar->format('d') . ' ' . $bulan_indo . ' ' . $tmt_keluar->format('Y');
                ?>
              </dd>

              <dt>Surat Keterangan</dt>
              <dd>
                @if($resign->surat_keterangan == 'Ada')
                <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 15px;">Ada</span>
                @else
                <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 15px;">Tidak Ada</span>
                @endif
              </dd>

              <dt>Alasannya</dt>
              <dd>{{ $resign->alasan }}</dd>

            </dl>
          </div>
          <!-- Akhir box -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>