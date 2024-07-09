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
                        <li><a href="{{ route('mahasiswa.form-ta.create') }}">Pengajuan Tugas Akhir</a></li>
                        <li><a href="{{ route('superadmin.form-kp.index') }}">Pengajuan Kerja Praktik</a></li>
                        <li><a href="{{ route('superadmin.form-khs.index') }}">Pengajuan
                                KHS/Transkrip/Dokumen</a></li>
                        <li><a href="{{ route('superadmin.form-kp.index') }}">Pendaftaran Yudisium</a></li>
                        <li><a href="{{ route('superadmin.form-kp.index') }}">Pengajuan Dispendansasi Kuliah</a>
                        </li>
                        <li><a href="{{ route('superadmin.form-kp.index') }}">Pengajuan Pengantar Kerja</a>
                        <li><a href="{{ route('superadmin.form-kp.index') }}">Pengajuan Pengantar Kuliah
                                Lapangan</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-graduation-cap"></span><span class="mtext">Kemahasiswaan</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="#">Pengajuan Pemotongan UKT</a></li>
                        <li><a href="#">Pengajuan Pengajuan Cuti</a></li>
                        <li><a href="#">Pengajuan Permohonanan Pengantar Studio</a></li>
                        <li><a href="#">Pengajuan Pengunduran Diri Mahasiswa</a></li>
                        <li><a href="#">Pengajuan Rekomendasi Mahasiswa</a></li>
                        <li><a href="#">Peminjaman Alat Laboratorium</a></li>
                        <li><a href="#">Permohonanan Izin Penelitian</a></li>

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