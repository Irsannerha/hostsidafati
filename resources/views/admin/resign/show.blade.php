<!-- Large modal -->
    <style>
    .modal-sm {
      max-width: 50%;
      max-height: 95%;
      margin: 1.95rem auto;
    }

    .table-responsive {
      overflow-x: auto;
    }

    @media screen and (max-width: 576px) {
      .modal-sm {
        max-width: 95%;

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
        overflow-y: auto;
      }
    }

    .custom-dd {
      border: 1px solid #999;
      border-radius: 5px;
      padding: 4px;
      font-size: 14px;
    }

    .custom-dd ol {
      list-style-type: none;
      padding: 0;
    }

    .custom-dd li {
      margin-bottom: 5px;
    }

    .card {
      border: 1px solid #999;
      border-radius: 5px;
    }
  </style>

<!-- Modal Lihat -->
  <div class="modal fade" id="showModal{{ $resign->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $resign->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content" data-bgcolor="#d0d0d0">
        <div class="modal-header">
          <h5 class="modal-title" id="showModalLabel{{ $resign->id }}"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Resign</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive">
          <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
            <dl class="text-content-box">
              <dt>Program Studi</dt>
              <dd class="custom-dd">{{ $resign->Prodi ? $resign->Prodi->prodi : '' }}</dd>

              <dt>Nama</dt>
              <dd class="custom-dd">{{ $resign->nama }}</dd>

              <dt>NRK</dt>
              <dd class="custom-dd">{{ $resign->nrk }}</dd>

              <dt>NIDN</dt>
              <dd class="custom-dd">{{ $resign->nidn }}</dd>

              <dt>Jenis  Kelamin</dt>
              <dd class="custom-dd">{{ $resign->jenis_kelamin }}</dd>

              <dt>Surat Keterangan</dt>
              <dd class="custom-dd">
              @if($resign->surat_keterangan == 'Ada')
                <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 15px;">Ada</span>
                @else
                <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 15px;">Tidak Ada</span>
                @endif
              </dd>

              <dt>Terhitung Mulai Tanggal Masuk</dt>
              <dd class="custom-dd">
                <?php
                $bulan = [
                  'January'   => 'Januari',
                  'February'  => 'Februari',
                  'March'     => 'Maret',
                  'April'     => 'April',
                  'May'       => 'Mei',
                  'June'      => 'Juni',
                  'July'      => 'Juli',
                  'August'    => 'Agustus',
                  'September' => 'September',
                  'October'   => 'Oktober',
                  'November'  => 'November',
                  'December'  => 'Desember'
                ];

                $hari = [
                  'Monday'    => 'Senin',
                  'Tuesday'   => 'Selasa',
                  'Wednesday' => 'Rabu',
                  'Thursday'  => 'Kamis',
                  'Friday'    => 'Jum\'at',
                  'Saturday'  => 'Sabtu',
                  'Sunday'    => 'Minggu'
                ];

                $tmt_masuk = \Carbon\Carbon::parse($resign->tmt_masuk)->timezone('Asia/Jakarta');
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tmt_masuk->format('F'));
                $hari_indo = str_replace(array_keys($hari), array_values($hari), $tmt_masuk->format('l'));

                echo $hari_indo . ', ' . $tmt_masuk->format('d') . ' ' . $bulan_indo . ' ' . $tmt_masuk->format('Y');
                ?>
              </dd>

              <dt>Terhitung Mulai Tanggal Keluar</dt>
              <dd class="custom-dd">
                <?php
                $bulan = [
                  'January'   => 'Januari',
                  'February'  => 'Februari',
                  'March'     => 'Maret',
                  'April'     => 'April',
                  'May'       => 'Mei',
                  'June'      => 'Juni',
                  'July'      => 'Juli',
                  'August'    => 'Agustus',
                  'September' => 'September',
                  'October'   => 'Oktober',
                  'November'  => 'November',
                  'December'  => 'Desember'
                ];

                $hari = [
                  'Monday'    => 'Senin',
                  'Tuesday'   => 'Selasa',
                  'Wednesday' => 'Rabu',
                  'Thursday'  => 'Kamis',
                  'Friday'    => 'Jum\'at',
                  'Saturday'  => 'Sabtu',
                  'Sunday'    => 'Minggu'
                ];

                $tmt_keluar = \Carbon\Carbon::parse($resign->tmt_keluar)->timezone('Asia/Jakarta');
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tmt_keluar->format('F'));
                $hari_indo = str_replace(array_keys($hari), array_values($hari), $tmt_keluar->format('l'));

                echo $hari_indo . ', ' . $tmt_keluar->format('d') . ' ' . $bulan_indo . ' ' . $tmt_keluar->format('Y');
                ?>
              </dd>

              <dt>Alasan</dt>
              <dd class="custom-dd">{{ $resign->alasan }}</dd>
            </dl>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>