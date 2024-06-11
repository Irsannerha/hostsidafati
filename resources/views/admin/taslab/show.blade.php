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
  <div class="modal fade" id="showModal{{ $taslab->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content" data-bgcolor="#d0d0d0">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Tendik, Asmik, Dan Laboran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive">
          <!-- Tambahkan card box di sini -->
          <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
            <dl class="text-content-box">
              <dt>Nama</dt>
              <dd>{{ $taslab->nama }}</dd>

              <dt>Unit Kerja</dt>
              <dd><kbd>{{ $taslab->unit_kerja }}</kbd></dd>

              <dt>Pendidikan</dt>
              <dd>{{ $taslab->pendidikan}}</dd>

              <dt>Terhitung Mulai Tanggal</dt>
              <dd>
                <?php
                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                $tmt = \Carbon\Carbon::parse($taslab->tmt);
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tmt->format('F'));
                echo $tmt->format('d') . ' ' . $bulan_indo . ' ' . $tmt->format('Y');
                ?>
              </dd>

              <dt>Masa Kerja</dt>
              <dd>{{ $taslab->masa_kerja}}</dd>

              <dt>Status Pegawai</dt>
              <dd>
                @if($taslab->status_pegawai == 'ASN')
                <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 15px;">ASN</span>
                @else
                <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 15px;">Non ASN</span>
                @endif
              </dd>

              <dt>Jabatan</dt>
              <dd>{{ $taslab->jabatan }}</dd>

              <dt>Bagian Tugas</dt>
              <dd>{{ $taslab->bagian_tugas }}</dd>

              <dt>NITK</dt>
              <dd>{{ $taslab->nitk }}</dd>

              <dt>Tanggal Lahir</dt>
              <dd>
                <?php
                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                $tgl_lahir = \Carbon\Carbon::parse($taslab->tgl_lahir);
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_lahir->format('F'));
                echo $tgl_lahir->format('d') . ' ' . $bulan_indo . ' ' . $tgl_lahir->format('Y');
                ?>
              </dd>

              <dt>Nomor Hp</dt>
              <dd>{{ $taslab->no_hp }}</dd>

              <dt>Umur</dt>
              <dd>{{ $taslab->umur }}</dd>

              <dt>Email</dt>
              <dd>{{ $taslab->email }}</dd>

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