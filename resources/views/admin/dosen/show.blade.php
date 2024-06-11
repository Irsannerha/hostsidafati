  <!-- Large modal -->
  <style>
    .modal-sm {
      max-width: 50%;
      /* Atur lebar maksimum modal */
      max-height: 95%;
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
  <div class="modal fade" id="showModal{{ $dosen->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
      <div class="modal-content" data-bgcolor="#d0d0d0">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Dosen Aktif & Tetap</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive">
          <!-- Tambahkan card box di sini -->
          <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
            <dl class="text-content-box">
              <dt>Nama</dt>
              <dd>{{ $dosen->nama }}</dd>

              <dt>NIP/NRK</dt>
              <dd>{{ $dosen->nip_nrk }}</dd>
              
              <dt>Program Studi</dt>
              <dd>{{ $dosen->prodi->prodi }}</dd>

              <dt>Tanggal Lahir</dt>
              <dd>
                <?php
                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                $tgl_lahir = \Carbon\Carbon::parse($dosen->tgl_lahir);
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_lahir->format('F'));
                echo $tgl_lahir->format('d') . ' ' . $bulan_indo . ' ' . $tgl_lahir->format('Y');
                ?>
              </dd>
              
              <dt>Umur</dt>
              <dd>{{ $dosen->umur }}</dd>

              <dt>Pendidikan</dt>
              <dd>{{ $dosen->pendidikan }}</dd>

              <dt>Status Dosen</dt>
              <dd>
                @if($dosen->status_dosen == 'Dosen Aktif')
                <span class="badge badge-success" data-bgcolor="#9a1b1f" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Dosen Aktif</span>
                @else
                <span class="badge badge-dark" data-bgcolor="#28354a" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Dosen Tetap</span>
                @endif
              </dd>

              <dt>Status NIDN/NIDK/NUP</dt>
              <dd>
              @if($dosen->status_nidn_nidk == 'NIDN')
              <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">NIDN</span>
              @elseif($dosen->status_nidn_nidk == 'NIDK')
              <span class="badge badge-primary" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">NIDK</span>
              @else
              <span class="badge badge-info"style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">NUP</span>
              @endif
              </dd>

              <dt>Status Pegawai</dt>
              <dd>
                @if($dosen->status_pegawai == 'PNS')
                <span class="badge badge-success" data-bgcolor="#895c3c" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">PNS</span>
                @else
                <span class="badge badge-danger" data-bgcolor="#28354a" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Non PNS</span>
                @endif
              </dd>

              <dt>Jabatan Fungsional</dt>
              <dd>
              @if($dosen->jabfung == 'Asisten Ahli 150')
              <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Asisten Ahli 150</span>
              @elseif($dosen->jabfung == 'Lektor (L) 200, 300')
              <span class="badge badge-danger" data-bgcolor="#1d2a35" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Lektor (L) 200, 300</span>
              @elseif($dosen->jabfung == 'Lektor Kepala (LK) 400, 550, 700')
              <span class="badge badge-warning" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Lektor Kepala (LK) 400, 550, 700</span>
              @else
              <span class="badge badge-info" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Guru Besar/Profesor (Prof) 850, 1050</span>
              @endif
              </dd>

              <dt>TMT Jabatan Fungsional Terakhir</dt>
              <dd>
                <?php
                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                $tmt_jabfung_terakhir = \Carbon\Carbon::parse($dosen->tmt_jabfung_terakhir);
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tmt_jabfung_terakhir->format('F'));
                echo $tmt_jabfung_terakhir->format('d') . ' ' . $bulan_indo . ' ' . $tmt_jabfung_terakhir->format('Y');
                ?>
              </dd>

              <dt>Target Kenaikan Jabatan Fungsional</dt>
              <dd>
                <?php
                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                $target_kenaikan_jabfung = \Carbon\Carbon::parse($dosen->target_kenaikan_jabfung);
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $target_kenaikan_jabfung->format('F'));
                echo $target_kenaikan_jabfung->format('d') . ' ' . $bulan_indo . ' ' . $target_kenaikan_jabfung->format('Y');
                ?>
              </dd>
              <dt>Terhitung Mulai Tanggal</dt>
              <dd>
                <?php
                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                $tmt = \Carbon\Carbon::parse($dosen->tmt);
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tmt->format('F'));
                echo $tmt->format('d') . ' ' . $bulan_indo . ' ' . $tmt->format('Y');
                ?>
              </dd>
              <dt>TMT Masuk ITERA</dt>
              <dd>
                <?php
                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                $tmt_masuk_itera = \Carbon\Carbon::parse($dosen->tmt_masuk_itera);
                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tmt_masuk_itera->format('F'));
                echo $tmt_masuk_itera->format('d') . ' ' . $bulan_indo . ' ' . $tmt_masuk_itera->format('Y');
                ?>
              </dd>

              <dt>Masa Kerja</dt>
              <dd>{{ $dosen->masa_kerja}}</dd>
              <dt>Serdos</dt>
              <dd>
                @if($dosen->serdos == 'Ada')
                <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ada</span>
                @else
                <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Tidak Ada</span>
                @endif
              </dd>

              <dt>Pekerti</dt>
              <dd>
                @if($dosen->pekerti == 'Sudah')
                <span class="badge badge-success" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Sudah</span>
                @else
                <span class="badge badge-danger" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Belum</span>
                @endif
              </dd>
              <dt>SK PNS</dt>
              <dd><a href="{{ asset('assets/sk_pns/' . $dosen->sk_pns) }}" download class="btn btn-outline-primary btn-sm "><i class="fa fa-download"></i> Download SK PNS</a></dd>

              <dt>SK CPNS</dt>
              <dd><a href="{{ asset('assets/sk_cpns/' . $dosen->sk_cpns) }}" download class="btn btn-outline-primary btn-sm "><i class="fa fa-download"></i> Download SK CPNS</a></dd>

              <dt>SK Tugas Belajar</dt>
              <dd><a href="{{ asset('assets/sk_tubel/' . $dosen->sk_tubel) }}" download class="btn btn-outline-primary btn-sm "><i class="fa fa-download"></i> Download SK Tugas Belajar</a></dd>

              <dt>SK perpanjangan Tubel</dt>
              <dd><a href="{{ asset('assets/sk_perpanjangan_tubel/' . $dosen->sk_perpanjangan_tubel) }}" download class="btn btn-outline-primary btn-sm "><i class="fa fa-download"></i> Download SK perpanjangan Tubel </a></dd>

              <dt>SK Jabatan Fungsional</dt>
              <dd><a href="{{ asset('assets/sk_jabfung/' . $dosen->sk_jabfung) }}" download class="btn btn-outline-primary btn-sm "><i class="fa fa-download"></i> Download SK Jabatan Fungsional</a></dd>

              <dt>SK Pengaktifan</dt>
              <dd><a href="{{ asset('assets/sk_pengaktifan/' . $dosen->sk_pengaktifan) }}" download class="btn btn-outline-primary btn-sm "><i class="fa fa-download"></i> Download SK Pengaktifan</a></dd>

              <dt>SK Pengaktifan Kembali dari Tubel</dt>
              <dd><a href="{{ asset('assets/sk_pengaktifan_kembali/' . $dosen->sk_pengaktifan_kembali) }}" download class="btn btn-outline-primary btn-sm "><i class="fa fa-download"></i> Download SK Pengaktifan Kembali</a></dd>
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