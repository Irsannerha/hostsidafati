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
  <div class="modal fade" id="showModal{{ $taslab->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $taslab->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content" data-bgcolor="#d0d0d0">
        <div class="modal-header">
          <h5 class="modal-title" id="showModalLabel{{ $taslab->id }}"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data  Tendik, Asmik, Dan Laboran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive">
          <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
            <dl class="text-content-box">
              <dt>Nama</dt>
              <dd class="custom-dd">{{ $taslab->nama }}</dd>

              <dt>Tanggal Lahir</dt>
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

                $tgl_lahir = \Carbon\Carbon::parse($taslab->tgl_lahir)->timezone('Asia/Jakarta');
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_lahir->format('F'));
                $hari_indo = str_replace(array_keys($hari), array_values($hari), $tgl_lahir->format('l'));

                echo $hari_indo . ', ' . $tgl_lahir->format('d') . ' ' . $bulan_indo . ' ' . $tgl_lahir->format('Y');
                ?>
              </dd>

              <dt>Umur</dt>
              <dd class="custom-dd">
              <span class="badge badge-danger" style="border-radius: 8px; padding: 0.4rem 0.6rem; font-size: 12.5px;">
                  <?php
                  $start_date = \Carbon\Carbon::parse($taslab->tgl_lahir);
                  $end_date = \Carbon\Carbon::now();
                  $diff = $start_date->diff($end_date);
                  echo $diff->y . ' Tahun ' . $diff->m . ' Bulan ' . $diff->d . ' Hari';
                  ?></span>
              </dd>

              <dt>Unit Kerja</dt>
              <dd class="custom-dd">{{ $taslab->unit_kerja }}</dd>

              <dt>Pendidikan</dt>
              <dd class="custom-dd">{{ $taslab->pendidikan }}</dd>

              <dt>Jabatan</dt>
              <dd class="custom-dd">{{ $taslab->jabatan }}</dd>

              <dt>Status Pegawai</dt>
              <dd class="custom-dd">
                @if($taslab->status_pegawai == 'ASN')
                <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 15px;">ASN</span>
                @else
                <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 15px;">Non ASN</span>
                @endif
              </dd>

              <dt>Terhitung Mulai Tanggal</dt>
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

                  $tmt = \Carbon\Carbon::parse($taslab->tmt)->timezone('Asia/Jakarta');
                  $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tmt->format('F'));
                  $hari_indo = str_replace(array_keys($hari), array_values($hari), $tmt->format('l'));

                  echo $hari_indo . ', ' . $tmt->format('d') . ' ' . $bulan_indo . ' ' . $tmt->format('Y');
                  ?>
              </dd>

              <dt>Masa Kerja</dt>
              <dd class="custom-dd">
              <span class="badge badge-dark" style="border-radius: 8px; padding: 0.4rem 0.6rem; font-size: 12.5px;">
                <?php
                  $start_date = \Carbon\Carbon::parse($taslab->tmt);
                  $end_date = \Carbon\Carbon::now();
                  $diff = $start_date->diff($end_date);

                  echo $diff->y . ' Tahun ' . $diff->m . ' Bulan ' . $diff->d . ' Hari';
                  ?></span>
              </dd>

              <!-- <dt>Masa Kerja</dt>
              <dd class="custom-dd">{{ $taslab->masa_kerja }}</dd> -->

              <dt>Bagian Tugas</dt>
              <dd class="custom-dd">{{ $taslab->bagian_tugas }}</dd>

              <dt>NITK</dt>
              <dd class="custom-dd">{{ $taslab->nitk }}</dd>

              <dt>Nomor Hp</dt>
              <dd class="custom-dd">{{ $taslab->no_hp }}</dd>

              <dt>Email</dt>
              <dd class="custom-dd">{{ $taslab->email }}</dd>

              <!-- <dt>Umur</dt>
              <dd class="custom-dd">{{ $taslab->umur }}</dd> -->


            </dl>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>