<style>
    .modal-sm {
        max-width: 80%;
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
        column-gap: 30px;
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

    .modal-footer {
        display: flex !important;
        flex-direction: row;
        justify-content: space-between;
    }
</style>

<!-- Modal Lihat -->
<div class="modal fade" id="showModal{{ $ta->id }}" tabindex="-1" role="dialog"
    aria-labelledby="showModalLabel{{ $ta->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content p-6" data-bgcolor="#ffffff">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $ta->id }}">
                    Detail Data Pengajuan Tugas Akhir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
                    <dl class="text-content-box">
                        <dt>Program Studi</dt>
                        <dd class="custom-dd"><span
                                class="font-bold mr-3">:</span>{{ $ta->Prodi ? $ta->Prodi->prodi : '' }}</dd>

                        <dt>Nama</dt>
                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>{{ $ta->nama }}</dd>

                        <dt>NIM</dt>
                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>{{ $ta->nim }}</dd>

                        <dt>Keperluan</dt>
                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>
                            @if($ta->keperluan == 'Permohonan Izin Penelitian Tugas Akhir')
                                <span class="badge badge-success"
                                    style="border-radius: 10px; padding: 0.2rem 1.2rem; font-size: 15px;">Permohonan Izin
                                    Penelitian
                                    Tugas Akhir</span>
                            @else
                                <span class="badge badge-danger"
                                    style="border-radius: 10px; padding: 0.2rem 1.2rem; font-size: 15px;">Permohonan Data
                                    Tugas
                                    Akhir</span>
                            @endif
                        </dd>

                        <dt>Instansi</dt>
                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>{{ $ta->instansi }}</dd>

                        <dt>Alamat Instansi</dt>
                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>{{ $ta->alamat_instansi }}</dd>

                        <dt>Tujuan Jabatan Pimpinan</dt>
                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>{{ $ta->tjp }}</dd>

                        <dt>Pelaksanaan</dt>
                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>
                            @if($ta->pelaksanaan == 'Offline')
                                <span class="badge badge-success"
                                    style="border-radius: 10px; padding: 0.2rem 1.2rem; font-size: 15px;">{{ $ta->pelaksanaan }}</span>
                            @else
                                <span class="badge badge-danger"
                                    style="border-radius: 10px; padding: 0.2rem 1.2rem; font-size: 15px;">{{ $ta->pelaksanaan }}</span>
                            @endif
                        </dd>

                        <dt>Waktu Mulai Pelaksanaan</dt>
                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>
                            <?php
                                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                                $hari = ['Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jum\'at', 'Saturday' => 'Sabtu', 'Sunday' => 'Minggu'];
                                $waktu_mulai_pelaksanaan = \Carbon\Carbon::parse($ta->waktu_mulai_pelaksanaan);
                                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $waktu_mulai_pelaksanaan->format('F'));
                                $hari_indo = str_replace(array_keys($hari), array_values($hari), $waktu_mulai_pelaksanaan->format('l'));
                                echo $hari_indo . ', ' . $waktu_mulai_pelaksanaan->format('d') . ' ' . $bulan_indo . ' ' . $waktu_mulai_pelaksanaan->format('Y');
                            ?>
                        </dd>

                        <dt>Waktu Akhir Pelaksanaan</dt>
                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>
                            <?php
                                $bulan = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
                                $hari = ['Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jum\'at', 'Saturday' => 'Sabtu', 'Sunday' => 'Minggu'];
                                $waktu_akhir_pelaksanaan = \Carbon\Carbon::parse($ta->waktu_akhir_pelaksanaan);
                                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $waktu_akhir_pelaksanaan->format('F'));
                                $hari_indo = str_replace(array_keys($hari), array_values($hari), $waktu_akhir_pelaksanaan->format('l'));
                                echo $hari_indo . ', ' . $waktu_akhir_pelaksanaan->format('d') . ' ' . $bulan_indo . ' ' . $waktu_akhir_pelaksanaan->format('Y');
                            ?>
                        </dd>

                        <dt>No. HP</dt>
                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>{{ $ta->no_hp }}</dd>

                        <dt>Email</dt>
                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>{{ $ta->email }}</dd>

                        <dt>Nama Pembimbing Satu</dt>
                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>{{ $ta->nama_pembimbing_satu }}</dd>

                        <dt>Nama Pembimbing Dua</dt>
                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>{{ $ta->nama_pembimbing_dua }}</dd>

                        <dt>Judul</dt>
                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>{{ $ta->judul }}</dd>

                        <dt>Keterangan (Catatan)</dt>
                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>
                            {{ $ta->keterangan }}
                        </dd>

                        <dt>Status</dt>
                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>
                            @if($ta->status == 'Selesai')
                                <span class="badge badge-success"
                                    style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Selesai</span>
                            @elseif($ta->status == 'Diproses')
                                <span class="badge badge-warning"
                                    style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Diproses</span>
                            @else
                                <span class="badge badge-danger"
                                    style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 13px;">Ditolak</span>
                            @endif
                        </dd>
                        <dt>Diajukan Pada Tanggal</dt>

                        <dd class="custom-dd"><span class="font-bold mr-3">:</span>
                            <?php
                                $bulan = [
                                    'January' => 'Januari',
                                    'February' => 'Februari',
                                    'March' => 'Maret',
                                    'April' => 'April',
                                    'May' => 'Mei',
                                    'June' => 'Juni',
                                    'July' => 'Juli',
                                    'August' => 'Agustus',
                                    'September' => 'September',
                                    'October' => 'Oktober',
                                    'November' => 'November',
                                    'December' => 'Desember'
                                ];

                                $hari = [
                                    'Monday' => 'Senin',
                                    'Tuesday' => 'Selasa',
                                    'Wednesday' => 'Rabu',
                                    'Thursday' => 'Kamis',
                                    'Friday' => 'Jum\'at',
                                    'Saturday' => 'Sabtu',
                                    'Sunday' => 'Minggu'
                                ];

                                $tgl_kegiatan = \Carbon\Carbon::parse($ta->created_at)->timezone('Asia/Jakarta');
                                $bulan_indo = str_replace(array_keys($bulan), array_values($bulan), $tgl_kegiatan->format('F'));
                                $hari_indo = str_replace(array_keys($hari), array_values($hari), $tgl_kegiatan->format('l'));

                                echo $hari_indo . ', ' . $tgl_kegiatan->format('d') . ' ' . $bulan_indo . ' ' . $tgl_kegiatan->format('Y') . ' / Pukul : ' . $tgl_kegiatan->format('H:i') . ' WIB';
                            ?>
                        </dd>
                    </dl>
                </div>
            </div>
            <div class="modal-footer">
                @if ($ta->status != 'Selesai')
                    <button type="button" id="cancel-btn"
                        class="border border-secondary-border md:w-[180px] py-1 rounded-md bg-secondary-btn font-bold"
                        onclick="toggleForm()">Tolak</button>

                    <div id="form-canceled" class="hidden w-full">
                        <form action="{{ route('dosen.form-ta.tolak', ['id' => $ta->id]) }}" method="POST">
                            @csrf
                            @method('POST')
                            <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                placeholder="Masukkan alasan mengapa pengajuan ini ditolak" name="keterangan"
                                id="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                            <button type="submit"
                                class="border mt-3 border-secondary-border md:w-[180px] py-1 rounded-md bg-secondary-btn font-bold float-end">Kirim</button>
                        </form>
                        <button type="button" id="cancel-btn"
                            class="border mt-3 border-secondary-border md:w-[180px] py-1 rounded-md bg-secondary-btn font-bold"
                            onclick="toggleForm()">Batal</button>
                    </div>

                    <div id="accept-btn">
                        <form action="{{ route('dosen.form-ta.terima', ['id' => $ta->id])}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <button type="submit"
                                class="border border-secondary-border md:w-[180px] py-1 rounded-md bg-secondary-btn font-bold">Setuju</button>
                        </form>
                    </div>
                @else
                    <button type="button"
                        class="border border-secondary-border md:w-[180px] py-1 rounded-md bg-secondary-btn font-bold"
                        data-dismiss="modal">Tutup</button>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    function toggleForm() {
        const form = document.getElementById('form-canceled');
        const accept = document.getElementById('accept-btn');
        const cancel = document.getElementById('cancel-btn');
        if (form.classList.contains('hidden')) {
            form.classList.remove('hidden');
            form.classList.add('block');
            accept.classList.add('hidden');
            cancel.classList.add('hidden');
        } else {
            form.classList.remove('block');
            form.classList.add('hidden');
            accept.classList.remove('hidden');
            cancel.classList.remove('hidden');
        }
    }
</script>
