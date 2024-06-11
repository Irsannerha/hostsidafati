<!-- Large modal -->
<style>
  .modal-sm {
    max-width: 80%;
    max-height: 50%;

  }

  .card-inbox {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    border-radius: 6px;
    border: 2px solid #ddd;
  }

  .user-icons img {
    width: 120px;
    height: 155px;
    border-radius: 5%;
    margin-right: 5px;
  }

  .unspace {
    word-wrap: break-word;
    text-wrap: wrap;
    text-align: justify !important;
  }

  .table-responsive {
    overflow-x: auto;
  }

  /* CSS untuk menambahkan z-index ke thead */
  @media screen and (max-width: 576px) {
    .modal-sm {
      max-width: 95%;
    }
  }

  @media only screen and (max-width: 768px) {
    .card-hdr {
      max-height: 500px;
      overflow-y: auto;
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

  .img-thumbnail {
    display: inline-block;
    height: 185px;
    max-width: 100%;
    padding: 3px;
    line-height: 1.428571429;
    background-color: #fff;
    border: 2px solid #daa520;
    border-radius: 4px;
    -webkit-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
  }
</style>
<!-- Large modal Detail -->
<!-- Modal -->
<div class="modal fade" id="showModal{{ $prodi->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content" data-bgcolor="#d0d0d0">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Program Studi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <!-- <img src="{{ asset('vendors/images/iconbars.png') }}" alt="" width="65px" height="65px" /> -->
      </div>
      <div class="modal-body table-responsive">
        <!-- Tambahkan card box di sini -->
        <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
          <div class="row pb-20">
            <div class="col-md-8 mb-4">
              <dl class="text-content-box">
                <dt>Akreditasi</dt>
                <dd>
                  @if($prodi->akreditasi == 'A')
                  <span class="badge badge-success" style="border-radius: 10px; padding: 0.2rem 1.2rem; font-size: 15px;">A</span>
                  @elseif($prodi->akreditasi == 'B')
                  <span class="badge badge-danger" style="border-radius: 10px; padding: 0.2rem 1.2rem; font-size: 15px;">B</span>
                  @else
                  <span class="badge badge-warning" style="border-radius: 10px; padding: 0.2rem 1.2rem; font-size: 15px;">C</span>
                  @endif
                </dd>

                <dt>Program Studi</dt>
                <dd>{{ $prodi->prodi }}</dd>

                <dt>Fakultas</dt>
                <dd>{{ $prodi->fakultas }}</dd>

                <dt>Program Pendidikan</dt>
                <dd>{{ $prodi->prodik }}</dd>

                <dt>Jumlah Mahasiswa</dt>
                <dd>
                  <span class="badge badge-pill badge-info" style="padding: 0.3rem 1.1rem; font-size: 14px;">
                    {{ $prodi->jumlah_mahasiswa }}
                  </span>
                </dd>

                <dt>Tanggal Pendirian</dt>
                <dd>
                  <?php
                  $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                  $tanggal_pendirian = \Carbon\Carbon::parse($prodi->tgl_pendirian);
                  $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tanggal_pendirian->format('F'));
                  echo $tanggal_pendirian->format('d') . ' ' . $bulan_indo . ' ' . $tanggal_pendirian->format('Y');
                  ?>
                </dd>
                <dt>Deskripsi</dt>
                <dd class="unspace">{{ $prodi->deskripsi }}</dd>

                <dt>SK Program Studi</dt>
                <dd><a href="{{ asset('assets/sk_prodi/' . $prodi->sk_prodi) }}" download class="btn btn-outline-primary btn-sm "><i class="fa fa-download"></i> Download SK Program Studi</a></dd>
              </dl>
            </div>
            <!-- Ini Profil -->
            <div class="col-md-4 mb-10">
              <div class="card-box min-height-100px pd-10 mb-20 card-inbox" data-bgcolor="#f2f6fc">
                <div class="d-flex justify-content-between pb-10 text-dark">
                  <div class="icon h1 text-white">
                    @if($prodi->foto && file_exists(public_path('storage/'.$prodi->foto)))
                    <img src="{{ url(asset('storage/'.$prodi->foto)) }}" alt="foto" class="img-thumbnail">
                    @else
                    <img src="{{ asset('vendors/images/foto683x1024.png') }}" alt="Default Foto" class="img-thumbnail">
                    @endif
                  </div>
                  <div class="font-14 text-right">
                    <div>Koordinator Program Studi</div>
                    <div class="font-12">{{ $prodi->prodi }}</div>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-end">
                  <div class="text-dark">
                    <div class="font-20">{{ $prodi->kapro }}</div>
                    <div class="font-12">{{ $prodi->email }}</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- akhir profil -->
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
<!-- Akhir modal -->