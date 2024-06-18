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
  <div class="modal fade" id="showModal{{ $asmikbel->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $asmikbel->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content" data-bgcolor="#d0d0d0">
        <div class="modal-header">
          <h5 class="modal-title" id="showModalLabel{{ $asmikbel->id }}"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Asmik Tugas Belajar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive">
          <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
            <dl class="text-content-box">
              <dt>Program Studi</dt>
              <dd class="custom-dd">{{ $asmikbel->Prodi ? $asmikbel->Prodi->prodi : '' }}</dd>

              <dt>Nama</dt>
              <dd class="custom-dd">{{ $asmikbel->nama }}</dd>

              <dt>NIP/NRK</dt>
              <dd class="custom-dd">{{ $asmikbel->nip_nrk }}</dd>

              <dt>Status</dt>
              <dd class="custom-dd">
                @if($asmikbel->status == 'PNS')
                <span class="badge badge-success" data-bgcolor="#895c3c" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">PNS</span>
                @else
                <span class="badge badge-danger" data-bgcolor="#28354a" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">Non PNS</span>
                @endif
              </dd>

              <dt>Beasiswa</dt>
              <dd class="custom-dd">
                {{ $asmikbel->beasiswa }}
              </dd>


              <dt>Mulai Tugas Belajar</dt>
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

                $mulai_tubel = \Carbon\Carbon::parse($asmikbel->mulai_tubel)->timezone('Asia/Jakarta');
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $mulai_tubel->format('F'));
                $hari_indo = str_replace(array_keys($hari), array_values($hari), $mulai_tubel->format('l'));

                echo $hari_indo . ', ' . $mulai_tubel->format('d') . ' ' . $bulan_indo . ' ' . $mulai_tubel->format('Y');
                ?>
              </dd>

              <dt>Selesai Tugas Belajar</dt>
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

                $selesai_tubel = \Carbon\Carbon::parse($asmikbel->selesai_tubel)->timezone('Asia/Jakarta');
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $selesai_tubel->format('F'));
                $hari_indo = str_replace(array_keys($hari), array_values($hari), $selesai_tubel->format('l'));

                echo $hari_indo . ', ' . $selesai_tubel->format('d') . ' ' . $bulan_indo . ' ' . $selesai_tubel->format('Y');
                ?>

              <dt>SK Tugas Belajar</dt>
              <dd class="custom-dd">
                @if($asmikbel->sk_tubel == 'Ada')
                <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">Ada</span>
                @else
                <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">Tidak Ada</span>
                @endif
              </dd>

              <dt>Status Asmik</dt>
              <dd class="custom-dd">
                @if($asmikbel->status_asmik == 'Lulus')
                <span class="badge badge-info" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">Lulus</span>
                @else
                <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">Tidak Lulus</span>
                @endif
              </dd>

              <dt>Keterangan</dt>
              <dd class="custom-dd">{{ $asmikbel->keterangan }}</dd>

              <dt>Studi Lanjut</dt>
              <dd class="custom-dd">{{ $asmikbel->studi_lanjut}}</dd>

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