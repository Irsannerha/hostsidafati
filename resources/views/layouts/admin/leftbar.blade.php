@if (Auth::user()->role == 'superadmin')
<div class="left-side-bar">
    <div class="brand-logo">
        <a href="/dashboard">
            <img src="/vendors/images/sidafati-light.png" alt="" class="dark-logo" />
            <img src="/vendors/images/sidafati-dark.png" alt="" class="light-logo" />
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
                        <span class="micon fa fa-vcard-o"></span>
                        <span class="mtext">Pegawai</span>
                    </a>
                    <ul class="submenu">
                    <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon fa fa-address-book-o"></span
                                ><span class="mtext">Cuti Pegawai</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="javascript:;">Cuti Dosen</a></li>
                                <li><a href="javascript:;">Cuti Tendik</a></li>
                            </ul>
						</li>
                        <li><a href="/prodi">Program studi</a></li>
                        <li><a href="pejabat.html">Pejabat</a></li>
                        <li><a href="jumlah_dosen.html">Jumlah Dosen</a></li>
                        <li><a href="dosen_tubel.html">Dosen Tubel</a></li>
                        <li><a href="asmik_tubel.html">Asmik Tubel</a></li>
                        <li><a href="dlb_nidk.html">DLB NIDK</a></li>
                        <li><a href="dosen_aktif.html">Dosen Aktif</a></li>
                        <li><a href="dosen_tetap.html">Dosen Tetap</a></li>
                        <li><a href="tendik_asmik_laboran.html">Tendik, Asmik, Laboran</a></li>
                        <li><a href="resign.html">Resign</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-institution"></span><span class="mtext"> Akademik </span>
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
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-graduation-cap"></span><span class="mtext">Kemahasiswaan</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="basic-table.html">Basic Tables</a></li>
                        <li><a href="datatable.html">DataTables</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-paper-plane"></span><span class="mtext">Pengajuan Mahasiswa</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="video-player.html">Video Player</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="forgot-password.html">Forgot Password</a></li>
                        <li><a href="reset-password.html">Reset Password</a></li>
                    </ul>
                </li>
                <li class="dropdown">
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
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-envelope"></span><span class="mtext">Surat Masuk & Keluar</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="highchart.html">Highchart</a></li>
                        <li><a href="knob-chart.html">jQuery Knob</a></li>
                        <li><a href="jvectormap.html">jvectormap</a></li>
                        <li><a href="apexcharts.html">Apexcharts</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-gears"></span><span class="mtext">Sarpras</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="video-player.html">Video Player</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="forgot-password.html">Forgot Password</a></li>
                        <li><a href="reset-password.html">Reset Password</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon ti-headphone-alt"></span><span class="mtext">Admin</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="400.html">400</a></li>
                        <li><a href="403.html">403</a></li>
                        <li><a href="404.html">404</a></li>
                        <li><a href="500.html">500</a></li>
                        <li><a href="503.html">503</a></li>
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
@elseif (Auth::user()->role == 'pegawai')
<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="../vendors/images/sidafati-light.png" alt="" class="dark-logo" />
            <img src="../vendors/images/sidafati-dark.png" alt="" class="light-logo" />
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
                        <span class="micon fa fa-vcard-o"></span>
                        <span class="mtext">Pegawai</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="/prodi">Program studi</a></li>
                        <li><a href="pejabat.html">Pejabat</a></li>
                        <li><a href="jumlah_dosen.html">Jumlah Dosen</a></li>
                        <li><a href="dosen_tubel.html">Dosen Tubel</a></li>
                        <li><a href="asmik_tubel.html">Asmik Tubel</a></li>
                        <li><a href="dlb_nidk.html">DLB NIDK</a></li>
                        <li><a href="dosen_aktif.html">Dosen Aktif</a></li>
                        <li><a href="dosen_tetap.html">Dosen Tetap</a></li>
                        <li><a href="tendik_asmik_laboran.html">Tendik, Asmik, Laboran</a></li>
                        <li><a href="resign.html">Resign</a></li>
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
        <a href="index.html">
            <img src="../vendors/images/sidafati-light.png" alt="" class="dark-logo" />
            <img src="../vendors/images/sidafati-dark.png" alt="" class="light-logo" />
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
                        <span class="micon fa fa-institution"></span><span class="mtext"> Akademik </span>
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
@elseif (Auth::user()->role == 'kemahasiswaan')
<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="../vendors/images/sidafati-light.png" alt="" class="dark-logo" />
            <img src="../vendors/images/sidafati-dark.png" alt="" class="light-logo" />
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
                        <span class="micon fa fa-graduation-cap"></span><span class="mtext">Kemahasiswaan</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="basic-table.html">Basic Tables</a></li>
                        <li><a href="datatable.html">DataTables</a></li>
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
            <img src="../vendors/images/sidafati-light.png" alt="" class="dark-logo" />
            <img src="../vendors/images/sidafati-dark.png" alt="" class="light-logo" />
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