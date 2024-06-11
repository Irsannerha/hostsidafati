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
  <div class="modal fade" id="showModal{{ $doslubi->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content" data-bgcolor="#d0d0d0">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Dosen Luar Biasa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive">
          <!-- Tambahkan card box di sini -->
          <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
            <dl class="text-content-box">
              <dt>NIP/NIDK</dt>
              <dd>{{ $doslubi->nup_nidk }}</dd>
              
              <dt>Nama</dt>
              <dd>{{ $doslubi->nama }}</dd>
              
              <dt>Program Studi</dt>
              <dd>{{ $doslubi->prodi->prodi }}</dd>
              
              <dt>Jurusan</dt>
              <dd>{{ $doslubi->jurusan }}</dd>

              <dt>Status</dt>
              <dd>
                @if($doslubi->status == 'Purna Tugas atau Pensiunan')
                <span class="badge text-white" data-bgcolor="#f68319" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">Purna Tugas atau Pensiunan</span>
                @else
                <span class="badge text-white" data-bgcolor="#00863f" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">Dosen Luar Biasa Praktisi</span>
                @endif
              </dd>

              <dt>Tanggal Lahir</dt>
              <dd>
                <?php
                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                $tgl_lahir = \Carbon\Carbon::parse($doslubi->tgl_lahir);
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_lahir->format('F'));
                echo $tgl_lahir->format('d') . ' ' . $bulan_indo . ' ' . $tgl_lahir->format('Y');
                ?>
              </dd>

              <dt>Jabatan Terakhir</dt>
              <dd>{{ $doslubi->jabatan_terakhir }}</dd>
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