  <!-- Large modal -->
  <style>
    .modal-sm {
      max-width: 50%;
      /* Atur lebar maksimum modal */
      max-height: 80%;
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
    .btn-add {
  position: absolute;
  top: 20px; /* Kamu bisa menyesuaikan angka ini untuk menyesuaikan jarak dari atas */
  right: 23px; /* Kamu bisa menyesuaikan angka ini untuk menyesuaikan jarak dari kanan */
  padding: 8px 16px;
  border: 10px;
  border-radius: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn-add:hover {
  background-color: #0056b3;
}



  </style>
  <!-- Large modal Detail -->
  <!-- Modal -->
  <div class="modal fade" id="showModal{{ $prodiId }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
        <div class="modal-content" data-bgcolor="#d0d0d0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Jumlah (Aktif + Keluar + Non-Aktif + Lulusan) FTI </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <div class="pd-10 card-box card-hdr" data-bgcolor="#fff">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="wrapper wrapper-content animated fadeInRight">
                                    <div class="ibox-content m-b-sm border-bottom">
                                        <div class="p-xs">
                                            <div class="pull-left m-r-md">
                                            </div>
                                            <h2>Fakultas Teknologi Industri</h2>
                                            <span>{{ $prodi->prodi}}</span>
                                        </div>
                                    </div>
                                    <div class="ibox-content forum-container">
                                      <div class="col-md-12 col-md-6 col-sm-10 mb-10">
                                        <div class="pd-10">
                                            <ul class="list-group">
                                                @foreach ($aknalus as $aknalu)
                                                    @if($aknalu->prodi_id == $prodiId)
                                                        <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                                            {{ $aknalu->tahun }}
                                                            <span class="badge badge-success font-weight-bold text-white" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 15px;">{{ $aknalu->jumlah }} </span> &mdash;
                                                            @include('admin.aknalu.delete')
                                                            <div class="table-actions">
                                                            <a class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff" data-toggle="modal" data-target="#deleteModal{{ $prodiId }}">
                                                            <i class="icon-copy dw dw-delete-3"></i> Hapus
                                                            </a>  
                                                            <a href="{{ route('superadmin.aknalu.edit', $prodiId) }}" class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff">
                                                              <i class="icon-copy dw dw-edit2"></i> Edit
                                                          </a>
                                                        </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Akhir box -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


  