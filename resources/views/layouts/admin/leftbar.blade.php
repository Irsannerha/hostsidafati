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
@if (Auth::user()->role == 'superadmin')
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
                    <a href="{{ route('superadmin.dashboard') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-tachometer"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-vcard-o"></span>
                        <span class="mtext">Pegawai</span>
                    </a>
                    <ul class="submenu">
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon fa fa-address-book-o"></span><span class="mtext">Cuti Pegawai</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="javascript:;">Cuti Dosen</a></li>
                                <li><a href="javascript:;">Cuti Tendik</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('superadmin.prodi.index') }}">Program studi</a></li>
                        <li><a href="{{ route('superadmin.pejabat.index') }}">Pejabat</a></li>
                        <li><a href="{{ route('superadmin.jumlah_dosen.index') }}">Jumlah Dosen</a></li>
                        <li><a href="{{ route('superadmin.dosbel.index') }}">Dosen Tubel</a></li>
                        <li><a href="{{ route('superadmin.asmikbel.index') }}">Asmik Tubel</a></li>
                        <li><a href="{{ route('superadmin.doslubi.index') }}">DLB NIDK</a></li>
                        <li><a href="{{ route('superadmin.dosen.index') }}">Dosen Aktif & Tetap</a></li>
                        <li><a href="{{ route('superadmin.taslab.index') }}">Tendik, Asmik, Laboran</a></li>
                        <li><a href="{{ route('superadmin.resign.index') }}">Dosen Resign</a></li>
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
                        <span class="micon fa fa-graduation-cap"></span><span class="mtext">Kemahasiswaan</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('superadmin.prestasi.index') }}">Prestasi Mahasiswa</a></li>
                        <li><a href="{{ route('superadmin.kegiatan.index') }}">Izin Kegiatan HIMA </a></li>.
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-paper-plane"></span><span class="mtext">Pengajuan Mahasiswa</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('superadmin.form-ta.index') }}">Form Pengajuan Tugas Akhir</a></li>
                        <li><a href="{{ route('superadmin.form-kp.index') }}">Form Pengajuan Kerja Praktik</a></li>
                        <li><a href="{{ route('superadmin.form-khs.index') }}">Form Pengajuan Pengajuan KHS/Transkrip/Dokumen</a></li>
                        <li><a href="{{ route('superadmin.form-wcr.index') }}">Form Pengajuan Pengantar Wawancara Mahasiswa</a></li>
                        <li><a href="{{ route('superadmin.form-rekom.index') }}">Form Pengajuan Surat Rekomendasi</a></li>
                        <li><a href="{{ route('superadmin.form-stm.index') }}">Form Pengajuan Surat Tugas Mahasiswa</a></li>
                        <li><a href="{{ route('superadmin.form-bukrim.index') }}">Form Form Tanda Bukti Penerimaan Berkas</a></li>
                    </ul>
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
@elseif (Auth::user()->role == 'pegawai')
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
                    <a href="{{ route('pegawai.dashboard') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-tachometer"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-vcard-o"></span>
                        <span class="mtext">Pegawai</span>
                    </a>
                    <ul class="submenu">
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon fa fa-address-book-o"></span><span class="mtext">Cuti Pegawai</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="javascript:;">Cuti Dosen</a></li>
                                <li><a href="javascript:;">Cuti Tendik</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('pegawai.prodi.index') }}">Program studi</a></li>
                        <li><a href="{{ route('pegawai.pejabat.index') }}">Pejabat</a></li>
                        <li><a href="{{ route('pegawai.jumlah_dosen.index') }}">Jumlah Dosen</a></li>
                        <li><a href="{{ route('pegawai.dosbel.index') }}">Dosen Tubel</a></li>
                        <li><a href="{{ route('pegawai.asmikbel.index') }}">Asmik Tubel</a></li>
                        <li><a href="{{ route('pegawai.doslubi.index') }}">DLB NIDK</a></li>
                        <li><a href="{{ route('pegawai.dosen.index') }}">Dosen Aktif & Tetap</a></li>
                        <li><a href="{{ route('pegawai.taslab.index') }}">Tendik, Asmik, Laboran</a></li>
                        <li><a href="{{ route('pegawai.resign.index') }}">Dosen Resign</a></li>
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
@elseif (Auth::user()->role == 'akademik')
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
                    <a href="{{ route('akademik.dashboard') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-tachometer"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-institution"></span><span class="mtext"> Akademik </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('akademik.tahun.index') }}">Tahun Semester</a></li>
                        <li><a href="{{ route('akademik.mhs-aktif.index') }}">Mahasiswa Aktif</a></li>
                        <li><a href="{{ route('akademik.mhs-ta.index') }}">Mahasiswa Lulus Tugas Akhir</a></li>
                        <li><a href="{{ route('akademik.undur-diri.index') }}">Mahasiswa Mengundurkan Diri</a></li>
                        <li><a href="{{ route('akademik.keluar.index') }}">Mahasiswa Dikeluarkan</a></li>
                        <li><a href="{{ route('akademik.wafat.index') }}">Mahasiswa Wafat</a></li>
                        <li><a href="{{ route('akademik.lulus.index') }}">Lulus/Wisuda</a></li>
                        <li><a href="{{ route('akademik.jumlah.index') }}">Jumlah Gabungan</a></li>
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
@elseif (Auth::user()->role == 'kemahasiswaan')
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
                    <a href="{{ route('kemahasiswaan.dashboard') }}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-tachometer"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-graduation-cap"></span><span class="mtext">Kemahasiswaan</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('kemahasiswaan.prestasi.index') }}">Prestasi Mahasiswa</a></li>
                        <li><a href="{{ route('kemahasiswaan.kegiatan.index') }}">Izin Kegiatan HIMA </a></li>.
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
@elseif (Auth::user()->role == 'keuangan')
<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
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
                    <a href="/" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-tachometer"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-institution"></span><span class="mtext"> Keuangan </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-cards.html">Cards</a></li>
                        <li><a href="ui-cards-hover.html">Cards Hover</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-tabs.html">Tabs</a></li>
                        <li>
                            <a href="ui-tooltip-popover.html">Tooltip &amp; Popover</a>
                        </li>
                        <li><a href="ui-sweet-alert.html">Sweet Alert</a></li>
                        <li><a href="ui-notification.html">Notification</a></li>
                        <li><a href="ui-timeline.html">Timeline</a></li>
                        <li><a href="ui-progressbar.html">Progressbar</a></li>
                        <li><a href="ui-typography.html">Typography</a></li>
                        <li><a href="ui-list-group.html">List group</a></li>
                        <li><a href="ui-range-slider.html">Range slider</a></li>
                        <li><a href="ui-carousel.html">Carousel</a></li>
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
@endif