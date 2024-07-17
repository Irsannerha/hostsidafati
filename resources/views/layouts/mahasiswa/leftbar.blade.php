<style>
    .dropdown .submenu {
        max-height: 450px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #ccc transparent;
    }

    .dropdown .submenu::-webkit-scrollbar {
        width: 5px;
    }

    .dropdown .submenu::-webkit-scrollbar-thumb {
        background-color: #ccc;
        border-radius: 2.5px;
    }

    .dropdown .submenu::-webkit-scrollbar-track {
        background-color: transparent;
        border-bottom-right-radius: 16px;
    }
</style>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="/dashboard">
            <img src="{{ url('vendors/images/harmony-light.png') }}" alt="" class="dark-logo" />
            <img src="{{ url('vendors/images/harmony-dark.png') }}" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="{{ route('mahasiswa.dashboard') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-tachometer"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-institution"></span><span class="mtext">Akademik</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{route('mahasiswa.dashboard')}}" data-toggle="modal" data-target="#inputKrs">
                                Lihat
                            </a>
                            <!-- <div class="modal fade" id="krs" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            Cek
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </li>
                        <li><a href="#">Pengajuan Dispendansasi Kuliah</a>
                        </li>
                        <li><a href="{{ route('mahasiswa.form-ta.create') }}">Pengantar TA/Survei Data TA</a></li>
                        <li><a href="{{ route('mahasiswa.form-kp.create') }}">Pengajuan Pengantar Kerja Praktik</a></li>
                        <li><a href="{{ route('mahasiswa.form-kp.create') }}">Pengajuan Pengantar Kuliah
                                Lapangan</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-graduation-cap"></span><span class="mtext">Kemahasiswaan</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="#">Pengajuan Cuti Akademik</a></li>
                        <li><a href="#">Pengajuan Pemotongan UKT</a></li>
                        <li><a href="#">Pengajuan Permohonanan Pengantar Studio</a></li>
                        <li><a href="#">Pengajuan Rekomendasi Mahasiswa</a></li>
                        <li><a href="#">Pengunduran Diri Mahasiswa</a></li>
                        <li><a href="#">Sistem Informasi Yudisium</a></li>
                        <li><a href="#">Permohonana Pangantar Izin Penelitian dan Alat Lab</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-gears"></span><span class="mtext">Sarana dan Prasarana</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="#">Pengajuan Izin Kegiatan Senin-Jumat HIMA</a></li>
                        <li><a href="#">Pengajuan Izin Kegiatan Sabtu-Minggu HIMA</a></li>
                        <li><a href="#">Pengajuan Izin Kegiatan Senin-Jumat UKM</a></li>
                        <li><a href="#">Pengajuan Izin Kegiatan Sabtu-Minggu UKM</a></li>
                        <li><a href="#">Pengajuan Izin Peminjaman Ruang Kelas</a></li>
                    </ul>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                    <a href="/logout" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-box-arrow-right"></span><span class="mtext">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>