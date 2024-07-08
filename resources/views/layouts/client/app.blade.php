<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HARMONY | Fakultas Teknologi Industri</title>
    <link rel="canonical" href="" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendors/images/harmony.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendors/images/harmony.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendors/images/harmony.png') }}">
    <link rel="manifest" href="">
    <link rel="mask-icon" href="https://fti.itera.ac.id/img/favicon/safari-pinned-tab.svg&quot; color=&quot;#5bbad5">
    <!-- <link rel="shortcut icon" href="img/favicon/favicon.ico"> -->
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-config" content="/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#673ab7">
    <meta name="google-site-verification" content="aIYE2YV_FJqExOnu9EqZbXfWAXkKgYBWqbV1hK_SgRk" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/styleLanding.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">

    <style>
        .pagination {
            flex-wrap: wrap !important;
        }

        div.dataTables_info {
            white-space: normal !important;
        }

        div.dataTables_wrapper div.dataTables_processing {
            background-color: #B18E63;
            color: #fff;
        }

        hr {
            border: none;
            height: 2px;
            background: linear-gradient(to right, #031e23, #B18E63, #031e23, #B18E63);
            background-size: 500% auto;
            animation: animateGradient 5s linear infinite;
        }

        @keyframes animateGradient {
            0% {
                background-position: 0%;
                /* Posisi awal */
            }

            100% {
                background-position: 100%;
                /* Posisi akhir */
            }
        }
    .modal-sm {
      max-width: 75%; /* Atur lebar maksimum modal */
      max-height: 95%; /* Atur tinggi maksimum modal */
      margin: 1.95rem auto; /* Atur margin */
    }

    .table-responsive {
      overflow-x: auto; /* Mengaktifkan scroll horizontal */
    }

    /* CSS untuk menambahkan z-index ke thead */
    @media screen and (max-width: 576px) {
      .modal-sm {
        max-width: 95%; /* Atur lebar maksimum modal untuk perangkat seluler */
      }
    }
    @media only screen and (max-width: 768px) {
    .card-hdr {
      max-height: 500px; /* Atur ketinggian maksimum yang diinginkan */
      overflow-y: auto; /* Aktifkan pengguliran vertikal jika konten lebih panjang dari ketinggian maksimum */
    }
  }
  @keyframes animateGradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}

.btn-key {
background: linear-gradient(-45deg, #B18E62, #e8bc85);
background-size: 200% 200%;
  animation: animateGradient 2s infinite;
  border: 2px solid #fff; 
  border-radius: 20px;
  padding: 10px 10px; 
  font-size: 10px; 
  text-align: center;
  cursor: pointer;
  position: absolute;
  top: 13px; /* Kamu bisa menyesuaikan angka ini untuk menyesuaikan jarak dari atas */
  right: 13px; /* Kamu bisa menyesuaikan angka ini untuk menyesuaikan jarak dari kanan */
}

.btn-key:hover {
  animation: none; /* Menghentikan animasi saat tombol dihover */
}

.back-to-top {
   width: 40px;
   height: 40px;
   position: fixed;
   bottom: 80px;
   right: 20px;
   display: none;
   text-align: center;
   z-index: 10000;
   border-radius: 3px;
   background-color: #B18E63;
   transition: all 0.5s; /* Menghapus prefix vendor -webkit- */
}

.back-to-top {
   display: block;
}
@keyframes blink {
    0% { opacity: 1; }
    50% { opacity: 0; }
    100% { opacity: 1; }
}

.blink {
    animation: blink 1s step-start infinite;
}

    </style>
    <meta name="keywords" content="Harmony fti itera, Holistic Administration and Resource Management System fti itera, fakultas teknologi industri itera, itera, fti, sidafati, Holistic Administration and Resource Management System, fakultas teknologi industri, institut teknologi sumatera, lampung selatan, indonesia" />
    <meta name="description" content="Sistem Informasi Holistic Administration and Resource Management System Institut Teknologi Sumatera Lampung Selatan Indonesia" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Icons font CSS-->
    <link href="{{ asset('css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <script src="{{ asset('src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('src/plugins/sweetalert2/sweet-alert.init.js') }}"></script>

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>

</head>

<body>
    <noscript>
        <style>
            #app {
                display: none;
            }
        </style>
    </noscript>
    <div id="app">
        <!--Navbar Start-->
        <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark">
            <div class="container-fluid">
                <!-- LOGO -->
                <a class="logo text-uppercase" href="{{ route('home')}}">
                    <img src="img/logo-harmony.png" alt="" class="logo-light" height="50" />
                    <img src="img/logo-harmony.png" alt="" class="logo-dark" height="50" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mx-auto navbar-center" id="mySidenav">
                        <li class="nav-item active">
                            <a href="{{ route('home')}}" class="nav-link">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data')}}" class="nav-link">Data Insight</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Publikasi <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('kegiatan')}}">Form Izin Kegiatan Mahasiswa</a>
                                <a class="dropdown-item" href="{{ route('pengajuan')}}">Form Pengajuan Mahasiswa</a>
                                <a class="dropdown-item" href="{{ route('prestasi')}}">Form Prestasi Mahasiswa</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tentang')}}" class="nav-link">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kontak')}}" class="nav-link">Kontak Kami</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->
        <!-- Content start -->
        {{ $slot }}
        <!-- End Content -->
        <!-- cta start -->
        <section class="section-sm bg-light" id="kontak">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <h2 class="mb-0 mo-mb-20">Hubungi kami di
                        </h2>
                        <div class="row align-items-center mt-1">
                            <span class="col-lg-2 col-xlg-1 ">
                                <img src="img/harmonys.png" class="logo-satudatafti">
                            </span>
                            <span class="col">
                                <p class="m-0">
                                    <b>Fakultas Teknologi Industri</b><br />
                                    Jalan Terusan Ryacudu, Ruang D105, Gedung D<br />
                                    Institut Teknologi Sumatera, Lampung Selatan<br />
                                </p>
                                <div class="pt-2">
                                    <i class="fas fa-envelope" style="color:#031e23"></i>
                                    Email: <a href="mailto:fti@itera.ac.id">fti@itera.ac.id</a><br />
                                    <i class="fab fa-instagram" style="color:#031e23"></i>
                                    Instagram: <a href="https://www.instagram.com/ftiitera/" target="_blank">@ftiitera</a>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </section>
        <!-- cta end -->
        <!-- footer start -->
        <footer class="bg-dark footer">
            <div class="container-fluid">
                <!-- end row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-left pull-none">
                            <div class="text-white-50">
                                Copyright &copy; <?php echo date("Y"); ?> - HARMONY<br />
                                Holistic Administration and Resource Management System <br />
                                Fakultas Teknologi Industri<br />
                                Institut Teknologi Sumatera, Lampung selatan, Indonesia
                            </p>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <br>
                <hr class="custom-hr">
                <!-- container-fluid -->
        </footer>
        <!-- footer end -->
        <!-- Back to top -->
        <a href="#" class="back-to-top" id="back-to-top">
            <i class="mdi mdi-chevron-up">
            </i>
        </a>

        <script src="js/jquery-3.7.0.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <script src="js/datatables.min.js"></script>
        <script src="js/datatables.idn.js"></script>
        <!-- custom js -->
        <script src="js/custom.js"></script>
        <script src="js/show-element.js"></script>
        <script src="js/reg-serviceworker.js"></script>
        <!-- Start of Zendesk Widget script -->
        <script id="ze-snippet" src="ekr/snippet.js" defer></script>
        <!-- End of Zendesk Widget script -->
        <!-- Jquery JS-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <!-- Vendor JS-->
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/datepicker/moment.min.js"></script>
        <script src="vendor/datepicker/daterangepicker.js"></script>
        <!-- Main JS-->
        <script src="js/global.js"></script>
        <script src="js/notif.js"></script>
        <script src="js/tagsinput.js"></script>
        <script src="owlcarousel/owl.carousel.min.js"></script>
        <script src="js/chart.js"></script>
        <script src="js/new.js"></script>
        <script src="{{ asset('src/plugins/highcharts-6.0.7/code/highcharts.js') }}"></script>
		<script src="https://code.highcharts.com/highcharts-3d.js"></script>
		<script src="{{ asset('src/plugins/highcharts-6.0.7/code/highcharts-more.') }}"></script>
		<script src="{{ asset('vendors/scripts/highchart-setting.js') }}"></script>
        <script>
  $(document).ready(function(){
    var owl = $('.owl-carousel');
    owl.owlCarousel({
      items: 6, 
      loop: true,
      margin: 55,
      autoplay: true,
      autoplayTimeout: 1000,
      autoplayHoverPause: true,
      responsive:{
        0:{
          items: 2,
          margin: 20
        },
        576:{
          items: 3,
          margin: 20
        },
        768:{
          items: 4,
          margin: 30
        },
        992:{
          items: 6, 
          margin: 55
        }
      }
    });
  });
</script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    </div>

</html>