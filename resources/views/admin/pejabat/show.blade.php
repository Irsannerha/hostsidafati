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
  <div class="modal fade" id="showModal{{ $pejabat->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content" data-bgcolor="#d0d0d0">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Pejabat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive">
          <!-- Tambahkan card box di sini -->
          <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
            <dl class="text-content-box">
              <dt>Nama</dt>
              <dd>{{ $pejabat->nama }}</dd>

              <dt>NIP</dt>
              <dd>{{ $pejabat->nip }}</dd>

              <dt>Pangkat Golongan</dt>
              <dd>{{ $pejabat->pangkat_golongan}}</dd>

              <dt>Jabatan</dt>
              <dd>{{ $pejabat->jabatan}}</dd>
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