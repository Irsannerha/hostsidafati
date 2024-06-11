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
  <div class="modal fade" id="showModal{{ $asmikbel->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content" data-bgcolor="#d0d0d0">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Dosen Tugas Belajar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive">
          <!-- Tambahkan card box di sini -->
          <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
            <dl class="text-content-box">
              <dt>Program Studi</dt>
              <dd>{{ $asmikbel->Prodi->prodi }}</dd>

              <dt>Nama</dt>
              <dd>{{ $asmikbel->nama }}</dd>

              <dt>NIP/NRK</dt>
              <dd>{{ $asmikbel->nip_nrk }}</dd>

              <dt>Status</dt>
              <dd>
                @if($asmikbel->status == 'PNS')
                <span class="badge badge-success" data-bgcolor="#895c3c" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">PNS</span>
                @else
                <span class="badge badge-danger" data-bgcolor="#28354a" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">Non PNS</span>
                @endif
              </dd>

              <dt>Beasiswa</dt>
              <dd>{{ $asmikbel->beasiswa}}</dd>

              <dt>Mulai Tugas Belajar</dt>
              <dd>
                <?php
                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                $mulai_tubel = \Carbon\Carbon::parse($asmikbel->mulai_tubel);
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $mulai_tubel->format('F'));
                echo $mulai_tubel->format('d') . ' ' . $bulan_indo . ' ' . $mulai_tubel->format('Y');
                ?>
              </dd>

              <dt>Selesai Tugas Belajar</dt>
              <dd>
                <?php
                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                $selesai_tubel = \Carbon\Carbon::parse($asmikbel->selesai_tubel);
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $selesai_tubel->format('F'));
                echo $selesai_tubel->format('d') . ' ' . $bulan_indo . ' ' . $selesai_tubel->format('Y');
                ?>
              </dd>

              <dt>SK Tugas Belajar</dt>
              <dd>
                @if($asmikbel->sk_tubel == 'Ada')
                <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">Ada</span>
                @else
                <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">Tidak Ada</span>
                @endif
              </dd>

              <dt>Status Asmik</dt>
              <dd>
                @if($asmikbel->status_asmik == 'Lulus')
                <span class="badge badge-info" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">Lulus</span>
                @else
                <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">Tidak Lulus</span>
                @endif
              </dd>

              <dt>Keterangan</dt>
              <dd>{{ $asmikbel->keterangan }}</dd>
              
              <dt>Studi Lanjut</dt>
              <dd>{{ $asmikbel->studi_lanjut}}</dd>
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