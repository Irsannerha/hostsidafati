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

    .custom-dd {
      border: 1px solid #999;
      /* Border dengan ketebalan 1px dan warna abu-abu */
      border-radius: 5px;
      /* Radius border 5px */
      padding: 4px;
      /* Padding untuk jarak antara konten dan border */
      font-size: 14px;
      /* Ukuran font */
    }

    .custom-dd ol {
      list-style-type: none;
      /* Menghilangkan bullet point */
      padding: 0;
    }

    .custom-dd li {
      margin-bottom: 5px;
      /* Margin antara setiap item daftar */
    }

    .card {
      border: 1px solid #999;
      /* Border dengan ketebalan 1px dan warna abu-abu */
      border-radius: 5px;
      /* Radius border 5px */
    }
  </style>
  <!-- Large modal Detail -->
  <!-- Modal -->
  <div class="modal fade" id="showModal{{ $prestasi->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
        <div class="modal-content" style="background-color: #d0d0d0;">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Prestasi Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <!-- Tambahkan card box di sini -->
                <div class="pd-20 card-box card-hdr" style="background-color: #fff;">
                    <dl class="text-content-box">
                        <dt>Program Studi</dt>
                        <dd class="custom-dd">{{ $prestasi->Prodi ? $prestasi->Prodi->prodi : 'N/A' }}</dd>

                        <dt>Nama Mahasiswa/Peserta/Ketua</dt>
                        <dd class="custom-dd">{{ $prestasi->nama_mahasiswa }}</dd>

                        <dt>NIM</dt>
                        <dd class="custom-dd">{{ $prestasi->nim }}</dd>

                        <dt>Nama TIM/Kelompok</dt>
                        <dd class="custom-dd">{{ $prestasi->nama_tim }}</dd>

                        <dt>Kontak</dt>
                        <dd class="custom-dd">{{ $prestasi->kontak }}</dd>

                        <dt>Jenis Prestasi</dt>
                        <dd class="custom-dd"><span class="badge badge-success" style="background-color: #28354a; border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">{{ $prestasi->jenis_prestasi }}</span></dd>

                        <dt>Jumlah Peserta</dt>
                        <dd class="custom-dd">{{ $prestasi->jumlah_peserta }}</dd>

                        <dt>Kategori Olahraga</dt>
                        <dd class="custom-dd">{{ $prestasi->kategori_olahraga }}</dd>

                        <dt>Tahun Kegiatan</dt>
                        <dd class="custom-dd">{{ substr($prestasi->tahun_kegiatan, 0, 4) }}</dd>

                        <dt>URL Penyelenggara</dt>
                        <dd class="custom-dd"><a href="{{ $prestasi->url_penyelenggara }}">{{ $prestasi->url_penyelenggara }}</a></dd>

                        <dt>Nama Penyelenggara</dt>
                        <dd class="custom-dd">{{ $prestasi->nama_penyelenggara }}</dd>

                        <dt>Tanggal Kegiatan</dt>
                        <dd class="custom-dd">
                            <?php
                            $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                            $tgl_kegiatan = \Carbon\Carbon::parse($prestasi->tgl_kegiatan);
                            $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_kegiatan->format('F'));
                            echo $tgl_kegiatan->format('d') . ' ' . $bulan_indo . ' ' . $tgl_kegiatan->format('Y');
                            ?>
                        </dd>

                        <dt>Tingkat Kejuaraan</dt>
                        <dd class="custom-dd">{{ $prestasi->tingkat_kejuaraan }}</dd>

                        <dt>Judul Karya</dt>
                        <dd class="custom-dd">{{ $prestasi->judul_karya }}</dd>

                        <dt>Anggota Karya</dt>
                        <dd class="custom-dd">
                            <ol>
                                @foreach (explode("\n", $prestasi->anggota_karya) as $anggota)
                                <li>{{ $anggota }}</li>
                                @endforeach
                            </ol>
                        </dd>
                        @php
                            $foto = json_decode($prestasi->foto);
                        @endphp
                        <dt>Foto</dt>
                        <dd class="custom-dd">
                            <div id="carouselExampleControls{{ $prestasi->id }}" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($foto as $index => $item)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <div class="card card-box">
                                            <img class="card-img" src="{{ asset('assets/foto/' . $item) }}" alt="Card image">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls{{ $prestasi->id }}" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls{{ $prestasi->id }}" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
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
