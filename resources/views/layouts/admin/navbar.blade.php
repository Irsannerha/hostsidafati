<?php

use App\Models\Prestasi;

// Fetch latest 5 achievements
$prestasi = Prestasi::orderBy('created_at', 'desc')->take(150)->get();
$prestasi_count = Prestasi::whereYear('tgl_kegiatan', date('Y'))->count();

?>
<style>
    .notification-list ul {
        list-style-type: none;
        padding: 0; 
        margin: 0; 
    }

    .notification-list ul li {
        display: flex;
        justify-content: space-between; 
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ddd; 
    }

    .notification-list ul li .left-content {
        display: flex;
        align-items: center;
    }

    .notification-list ul li h3 {
        margin: 0; 
        margin-left: 10px; 
        font-size: 14px; 
        font-weight: bold; 
    }

    .notification-list ul li p {
        margin: 0; 
        margin-left: 10px; 
        font-size: 12px; 
    }

    .timing {
        font-size: 10px; 
        color: gray; 
    }

    .fa-trophy {
        font-size: 30px; 
        margin-right: 10px; 
    }
    .left  {
        font-size: 15px;;
        font-weight: bold;
        position: absolute;
        right: 10px;
        top: 21px;
        border-radius: 10px; 
        padding: 0.4rem 0.6rem; 
        font-size: 13px;
    }
</style>
<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
        <div class="header-search">
            <form>
                <div class="form-group mb-0">
                    <i class="dw dw-search2 search-icon"></i>
                    <input type="text" class="form-control search-input" placeholder="Search Here" />
                    <div class="dropdown">
                        <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                            <i class="ion-arrow-down-c"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">From</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">To</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text" />
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    <span class="badge notification-active custom-badge blink" id="notif"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="Notification">
                        <h3 class="weight-600 font-16 text-blue">
                            Notifikasi
                            <span class="badge badge-warning btn-lg left">{{ $prestasi_count > 9 ? '9+' : $prestasi_count }}</span>
                        </h3>
                    </div>
                    <div class="notification-list mx-h-350 customscroll">
                        <ul id="notificationList">
                            @foreach($prestasi as $item)
                            <li>
                                <div class="left-content">
                                    <i class="icon-copy fa fa-trophy" aria-hidden="true"></i>
                                    <div>
                                        <h3>{{ $item->nama_mahasiswa }}</h3>
                                        <p>{{ $item->jenis_prestasi }}</p>
                                    </div>
                                </div>
                                <p class="timing">{{ $item->created_at->diffForHumans() }}</p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{ url('vendors/images/user-profile.png') }}" alt="" />
                    </span>
                    <span class="user-name">Halo, {{Auth::user()->email}}</span>
                </a>
                <!-- <div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="profile.html"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="profile.html"
								><i class="dw dw-settings2"></i> Setting</a
							>
							<a class="dropdown-item" href="faq.html"
								><i class="dw dw-help"></i> Help</a
							>
							<a class="dropdown-item" href="login.blade.php"
								><i class="dw dw-logout"></i> Log Out</a
							>
						</div> -->
            </div>
        </div>
        <div class="fti-link">
            <a href="https://fti.itera.ac.id/" target="_blank"><img src="/vendors/images/iconbars.png" alt="" /></a>
        </div>
    </div>
</div>