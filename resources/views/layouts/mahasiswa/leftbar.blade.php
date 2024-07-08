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
                        <span class="micon fa fa-graduation-cap"></span><span class="mtext">Kemahasiswaan</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('mahasiswa.form-ta.create') }}">Form Pengajuan Tugas Akhir</a></li>
                        <li><a href="{{ route('superadmin.form-kp.index') }}">Form Pengajuan Kerja Praktik</a></li>
                        <li><a href="{{ route('superadmin.form-khs.index') }}">Form Pengajuan Pengajuan
                                KHS/Transkrip/Dokumen</a></li>
                        <li><a href="{{ route('superadmin.form-wcr.index') }}">Form Pengajuan Pengantar Wawancara
                                Mahasiswa</a></li>
                        <li><a href="{{ route('superadmin.form-rekom.index') }}">Form Pengajuan Surat Rekomendasi</a>
                        </li>
                        <li><a href="{{ route('superadmin.form-stm.index') }}">Form Pengajuan Surat Tugas Mahasiswa</a>
                        </li>
                        <li><a href="{{ route('superadmin.form-bukrim.index') }}">Form Form Tanda Bukti Penerimaan
                                Berkas</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-institution"></span><span class="mtext">Akademik</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('superadmin.tahun.index') }}">Tahun Semester</a></li>
                        <li><a href="{{ route('superadmin.mhs-aktif.index') }}">Mahasiswa Aktif</a></li>
                        <li><a href="{{ route('superadmin.mhs-ta.index') }}">Mahasiswa Lulus Tugas Akhir</a></li>
                        <li><a href="{{ route('superadmin.undur-diri.index') }}">Mahasiswa Mengundurkan Diri</a></li>
                        <li><a href="{{ route('superadmin.keluar.index') }}">Mahasiswa Dikeluarkan</a></li>
                        <li><a href="{{ route('superadmin.wafat.index') }}">Mahasiswa Wafat</a></li>
                        <li><a href="{{ route('superadmin.lulus.index') }}">Lulus/Wisuda</a></li>
                        <li><a href="{{ route('superadmin.jumlah.index') }}">Jumlah Gabungan</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-paper-plane"></span><span class="mtext">Pengajuan Mahasiswa</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon ti-headphone-alt"></span><span class="mtext">Admin</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('superadmin.user.index') }}">User Admin</a></li>
                    </ul>
                </li>
                <!-- <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-money"></span><span class="mtext">Keuangan</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="bootstrap-icon.html">Bootstrap Icons</a></li>
                        <li><a href="font-awesome.html">FontAwesome Icons</a></li>
                        <li><a href="foundation.html">Foundation Icons</a></li>
                        <li><a href="ionicons.html">Ionicons Icons</a></li>
                        <li><a href="themify.html">Themify Icons</a></li>
                        <li><a href="custom-icon.html">Custom Icons</a></li>
                    </ul>
                </li> -->
                <!-- <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-envelope"></span><span class="mtext">Surat Masuk & Keluar</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="highchart.html">Highchart</a></li>
                        <li><a href="knob-chart.html">jQuery Knob</a></li>
                        <li><a href="jvectormap.html">jvectormap</a></li>
                        <li><a href="apexcharts.html">Apexcharts</a></li>
                    </ul>
                </li> -->
                <!-- <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-gears"></span><span class="mtext">Sarpras</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="video-player.html">Video Player</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="forgot-password.html">Forgot Password</a></li>
                        <li><a href="reset-password.html">Reset Password</a></li>
                    </ul>
                </li> -->
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