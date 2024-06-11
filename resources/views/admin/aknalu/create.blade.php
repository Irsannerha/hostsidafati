<style>
        .scrollable-table {
            overflow-x: auto;
        }
        table {
            border-collapse: collapse;
            overflow-x: auto;
        }
        table, th, td {
            border: 2px solid #d4d4d4;
            
        }
        th, td {
            padding: 8px;
            font-weight: bold;
            font-family: Roboto Condensed,  sans-serif;
            text-align: center;
        }
        th {
            background-color: #142127;
            color: white;
            text-align: center;
        }
        .modal-sm {
      max-width: 90%;
      max-height: 80%;
      margin: 1.95rem auto;
    }
    </style>
<x-admin-app>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title font-weight-bold">
                                <h4>Data Jumlah</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item font-weight-bold h5">
                                        <a href="dashboard.html">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                                        Jumlah
                                    </li>
                                    <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                                        Tambah Jumlah
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <div class="time">
                                <button id="dateTime" class="btn btn-primary font-weight-bold" type="button" data-toggle="dropdown">
                                    <span id="currentDateTime"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Tambah Prodi -->
                <div class="row clearfix">
                    <!-- Large modal -->
                    <div class="col-md-4 col-sm-12 mb-30">
                        <div class="pd-20 card-box height-100-p">
                                <h5 class="h4">Large modal</h5>
                                <a href="#" class="btn-block" data-toggle="modal" data-target="#bd-example-modal-lg" type="button">
                                </a>
                                <div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                        <div class="modal-content" data-bgcolor="#d0d0d0">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel"><i class="fa fa-paperclip" aria-hidden="true"></i> Detail Data Rekap Mahasiswa Prodi Teknik Elektro</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="pd-20 card-box card-hdr">
                                                <div class="scrollable-table">
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th rowspan="2">Prodi</th>
                                                                <th colspan="2">Jumlah Mahasiswa Aktif TS 2022/2024 + Mahasiswa PMB 2023</th>
                                                                <th rowspan="2">Jumlah Total</th>
                                                                <th colspan="2">Mahasiswa mengundurkan Diri TS 2023/2024</th>
                                                                <th rowspan="2">Jumlah</th>
                                                                <th colspan="2">Mahasiswa Dikeluarkan TS 2023/2024</th>
                                                                <th rowspan="2">Jumlah</th>
                                                                <th colspan="2">Mahasiswa Wafat TS 2023/2024</th>
                                                                <th rowspan="2">Jumlah</th>
                                                                <th colspan="5">Lulusan TS 2023/2024</th>
                                                                <th rowspan="2">Jumlah</th>
                                                                <th rowspan="2">Jumlah Lulusan Mahasiswa TA. 2023/2024</th>
                                                                <th rowspan="2">Mahasiswa Aktif TS 2023/2024 (Gabungan TS 2023/2023)</th>
                                                            </tr>
                                                            <tr>
                                                                <th>2022/2023</th>
                                                                <th>2023</th>
                                                                <th>Ganjil</th>
                                                                <th>Genap</th>
                                                                <th>Ganjil</th>
                                                                <th>Genap</th>
                                                                <th>Ganjil</th>
                                                                <th>Genap</th>
                                                                <th>September</th>
                                                                <th>November</th>
                                                                <th>Maret</th>
                                                                <th>Mei</th>
                                                                <th>Juli</th>
                                                            </tr>
                                                            <tr>
                                                                <td>Teknik Elektro</td>
                                                                <td>76</td>
                                                                <td>80</td>
                                                                <td>81</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Teknik Informatika</td>
                                                                <td>76</td>
                                                                <td>80</td>
                                                                <td>81</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>22</td>
                                                                <td>20</td>
                                                                <td>22</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Teknik Telekomunikasi</td>
                                                                <td>76</td>
                                                                <td>80</td>
                                                                <td>81</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>22</td>
                                                                <td>30</td>
                                                                <td>32</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rekayasa Instrumentasi dan Automasi</td>
                                                                <td>76</td>
                                                                <td>80</td>
                                                                <td>81</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>22</td>
                                                                <td>40</td>
                                                                <td>20</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rekayasa Instrumentasi dan Automasi</td>
                                                                <td>76</td>
                                                                <td>80</td>
                                                                <td>81</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>22</td>
                                                                <td>40</td>
                                                                <td>20</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rekayasa Instrumentasi dan Automasi</td>
                                                                <td>76</td>
                                                                <td>80</td>
                                                                <td>81</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>22</td>
                                                                <td>40</td>
                                                                <td>20</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rekayasa Instrumentasi dan Automasi</td>
                                                                <td>76</td>
                                                                <td>80</td>
                                                                <td>81</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>22</td>
                                                                <td>40</td>
                                                                <td>20</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rekayasa Instrumentasi dan Automasi</td>
                                                                <td>76</td>
                                                                <td>80</td>
                                                                <td>81</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>22</td>
                                                                <td>40</td>
                                                                <td>20</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rekayasa Instrumentasi dan Automasi</td>
                                                                <td>76</td>
                                                                <td>80</td>
                                                                <td>81</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>12</td>
                                                                <td>22</td>
                                                                <td>22</td>
                                                                <td>10</td>
                                                                <td>22</td>
                                                                <td>40</td>
                                                                <td>20</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Form Tambah Prodi End -->
                </div>
                <!-- Checkbox select Datatable End -->
            </div>
        </div>
        <!-- <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Tag</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td><span class="badge badge-primary">Primary</span></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td><span class="badge badge-secondary">Secondary</span></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td><span class="badge badge-success">Success</span></td>
                </tr>
            </tbody>
        </table> -->
</x-admin-app>
