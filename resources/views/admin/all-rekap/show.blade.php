
    <div class="modal fade bs-example-modal-lg" id="showModal {{ $t->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content" data-bgcolor="#d0d0d0">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Rekap Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="pd-10 card-box card-hdr">
                        <div class="scrollable-table">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Program Studi</th>
                                        <th colspan="2">Jumlah Mahasiswa Aktif TS 2022/2024 + Mahasiswa PMB 2023</th>
                                        <th rowspan="2">Jumlah Total</th>
                                        <th colspan="2">Mahasiswa mengundurkan Diri TS 2023/2024</th>
                                        <th rowspan="2">Jumlah</th>
                                        <th colspan="2">Mahasiswa Dikeluarkan TS 2023/2024</th>
                                        <th rowspan="2">Jumlah</th>
                                        <th colspan="2">Mahasiswa Wafat TS 2023/2024</th>
                                        <th rowspan="2">Jumlah</th>
                                        <th colspan="12">Lulusan TS 2023/2024</th>
                                        <th rowspan="2">Jumlah</th>
                                        <th rowspan="2">Jumlah Lulusan Mahasiswa TA. 2023/2024</th>
                                        <th rowspan="2">Mahasiswa Aktif TS 2023/2024 (Gabungan TS 2023/2023)</th>
                                        <!-- Tambahkan bagian lain sesuai kebutuhan -->
                                    </tr>
                                    <tr>
                                        <th>2022/2023</th>
                                        <th>2023</th>
                                        <th>Genap</th>
                                        <th>Ganjil</th>
                                        <th>Genap</th>
                                        <th>Ganjil</th>
                                        <th>Genap</th>
                                        <th>Ganjil</th>
                                        <th>Jan</th>
                                        <th>Feb</th>
                                        <th>Mar</th>
                                        <th>Apr</th>
                                        <th>Mei</th>
                                        <th>Jun</th>
                                        <th>Jul</th>
                                        <th>Ags</th>
                                        <th>Sept</th>
                                        <th>Okt</th>
                                        <th>Nov</th>
                                        <th>Des</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Looping through $rekapmhs data -->
                                    @foreach($rekapmhs as $rekap)
                                    <tr>
                                        <td>{{ $rekap->prodi->prodi }}</td>

                                        <!-- Data Mahasiswa Aktif -->
                                        @php
                                        $total_mhs_aktif = $rekap->jumlah_mhs_aktif_ts + $rekap->jumlah_mhs_aktif_th;
                                        @endphp
                                        <td>{{ $rekap->jumlah_mhs_aktif_ts }}</td>
                                        <td>{{ $rekap->jumlah_mhs_aktif_th }}</td>
                                        <td>{{ $total_mhs_aktif }}</td>

                                        <!-- Data Mahasiswa Undur Diri -->
                                        @php
                                        $total_undur_diri = $rekap->mhs_undur_diri_genap + $rekap->mhs_undur_diri_ganjil;
                                        @endphp
                                        <td>{{ $rekap->mhs_undur_diri_genap }}</td>
                                        <td>{{ $rekap->mhs_undur_diri_ganjil }}</td>
                                        <td>{{ $total_undur_diri }}</td>

                                        <!-- Data Mahasiswa Dikeluarkan -->
                                        @php
                                        $total_mhs_keluar = $rekap->mhs_keluar_genap + $rekap->mhs_keluar_ganjil;
                                        @endphp
                                        <td>{{ $rekap->mhs_keluar_genap }}</td>
                                        <td>{{ $rekap->mhs_keluar_ganjil }}</td>
                                        <td>{{ $total_mhs_keluar }}</td>

                                        <!-- Data Mahasiswa Wafat -->
                                        @php
                                        $total_mhs_wafat = $rekap->mhs_wafat_genap + $rekap->mhs_wafat_ganjil;
                                        @endphp
                                        <td>{{ $rekap->mhs_wafat_genap }}</td>
                                        <td>{{ $rekap->mhs_wafat_ganjil }}</td>
                                        <td>{{ $total_mhs_wafat }}</td>

                                        <!-- Data Lulusan -->
                                        @php
                                        $total_lulusan = $rekap->mhs_lulus_januari + $rekap->mhs_lulus_februari + $rekap->mhs_lulus_maret + $rekap->mhs_lulus_april + $rekap->mhs_lulus_mei + $rekap->mhs_lulus_juni + $rekap->mhs_lulus_juli + $rekap->mhs_lulus_agustus + $rekap->mhs_lulus_september + $rekap->mhs_lulus_oktober + $rekap->mhs_lulus_november + $rekap->mhs_lulus_desember;
                                        @endphp
                                        <!-- Listing lulusan per bulan -->
                                        <td>{{ $rekap->mhs_lulus_januari }}</td>
                                        <!-- Tambahkan kolom lulusan lainnya -->
                                        <td>{{ $total_lulusan }}</td>

                                        <!-- Data Lulusan TA -->
                                        <td>{{ $rekap->mhs_lulus_ta }}</td>

                                        <!-- Jumlah Total -->
                                        <td>{{ $total_mhs_aktif + $total_undur_diri + $total_mhs_keluar + $total_mhs_wafat + $total_lulusan }}</td>
                                    </tr>
                                    @endforeach

                                    <!-- Total keseluruhan -->
                                    <tr>
                                        <td>Jumlah Total</td>
                                        <!-- Menambahkan total per kolom -->
                                        <td>{{ $rekapmhs->sum('jumlah_mhs_aktif_ts') }}</td>
                                        <td>{{ $rekapmhs->sum('jumlah_mhs_aktif_th') }}</td>
                                        <!-- Tambahkan kolom total lainnya -->
                                        <td>{{ $rekapmhs->sum('jumlah_mhs_aktif_ts') + $rekapmhs->sum('jumlah_mhs_aktif_th') }}</td>
                                        <td>{{ $rekapmhs->sum('mhs_undur_diri_genap') }}</td>
                                        <td>{{ $rekapmhs->sum('mhs_undur_diri_ganjil') }}</td>
                                        <!-- Tambahkan kolom total lainnya -->
                                        <td>{{ $rekapmhs->sum('mhs_undur_diri_genap') + $rekapmhs->sum('mhs_undur_diri_ganjil') }}</td>
                                        <!-- Dan seterusnya -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Kelola Data</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

