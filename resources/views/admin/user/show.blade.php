  <!-- Large modal -->
  <style>
    .modal-sm {
      max-width: 20%; /* Atur lebar maksimum modal */
      max-height: 20%; /* Atur tinggi maksimum modal */
      margin: 1.95rem auto; /* Atur margin */
    }

    .table-responsive {
      overflow-x: auto; /* Mengaktifkan scroll horizontal */
    }

    /* CSS untuk menambahkan z-index ke thead */
    @media screen and (max-width: 576px) {
      .modal-sm {
        max-width: 95%; /* Atur lebar maksimum modal untuk perangkat seluler */
      }
    }
    @media only screen and (max-width: 768px) {
    .card-hdr {
      max-height: 500px; /* Atur ketinggian maksimum yang diinginkan */
      overflow-y: auto; /* Aktifkan pengguliran vertikal jika konten lebih panjang dari ketinggian maksimum */
    }
  }
  </style>
  <!-- Large modal Detail -->
  <!-- Modal -->
  <div class="modal fade" id="showModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" data-bgcolor="#d0d0d0">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data User Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <!-- Tambahkan card box di sini -->
        <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
          <dl class="row">
            <dt class="col-sm-3 font-16">Nama</dt>
            <dd class="col-sm-9 weight-500 font-16 text-dark">{{ $user->name }}</dd>

            <dt class="col-sm-3 font-16">Email</dt>
            <dd class="col-sm-9 weight-500 font-16 text-dark"><kbd>{{ $user->email }}</kbd></dd>

            <dt class="col-sm-3 font-16">Role</dt>
            <dd class="col-sm-9 weight-500 font-16 text-dark">{{ $user->role }}</dd>

            <dt class="col-sm-3 font-16">Status</dt>
            <dd class="col-sm-9 weight-500 font-16 text-dark">
              @if($user->status == 'aktif')
              <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 15px;">Aktif</span>
              @else
              <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 15px;">Tidak Aktif</span>
              @endif
            </dd>
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

