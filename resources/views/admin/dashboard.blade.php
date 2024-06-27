
<x-admin-app>
@if(auth()->user()->role == 'superadmin')
  <div class="main-container">
      <div class="xs-pd-20-10 pd-ltr-20">
          <div class="title pb-20">
              <h2 class="h3 mb-0">Dashboard Overview</h2>
          </div>
          <div class="card-box pd-20 height-100-p mb-30">
              <div class="row align-items-center">
                  <div class="col-md-4">
                      <img src="{{ url('vendors/images/banner-img.png') }}" alt="" />
                  </div>
                  <div class="col-md-8">
                      <h4 class="font-20 weight-500 mb-10 text-capitalize">
                          Selamat Datang
                          <div class="weight-600 font-30 text-blue">{{Auth::user()->name}}</div>
                      </h4>
                      <p class="font-18 max-width-600">
                          Anda telah berhasil masuk ke dalam sistem sebagai <span class="font-weight-bold">{{Auth::user()->name}}</span> SIDAFATI. 
                          Mohon gunakan hak akses ini dengan penuh tanggung jawab dan pastikan untuk menjaga kerahasiaan serta integritas data yang disimpan dalam sistem. 
                          Terima kasih atas kerjasamanya dalam menjaga keamanan informasi.
                      </p>
                  </div>
              </div>
          </div>
                <div class="row">
                     <div class="col-sm-12 mb-30">
						<div class="card-box height-100-p pd-20">
							<h2 class="h4 mb-20">Activity</h2>
							<div id="chartmhs"></div>
						</div>
					</div>
                     <div class="col-xl-6 col-lg-6 col-md-6 mb-20">
                            <div class="card-box">
                                <h2 class="h4 mb-20">Pergerakan Jumlah Mahasiswa Fakultas Teknologi Industri</h2>
                                <div class="chartCard">
                                    <div class="chartBoxBar">
                                        <canvas id="myChartBar"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-30">
                            <div class="card-box height-100-p overflow-hidden">
                                <div class="profile-tab height-100-p">
                                    <div class="tab height-100-p">
                                        <ul class="nav nav-tabs customtab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active font-weight-bold" data-toggle="tab" href="#timeline" role="tab">Recent Activity</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <!-- Timeline Tab start -->
                                            <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                                                <div class="pd-20">
                                                    <div class="profile-timeline">
                                                        <!-- Juni, 2024 -->
                                                        <div class="timeline-month">
                                                            <h5>Juni, 2024</h5>
                                                        </div>
                                                        <div class="profile-timeline-list">
                                                            <ul>
                                                                <!-- Entry 5 Juni -->
                                                                <li>
                                                                    <div class="date">5 Juni</div>
                                                                    <div class="task-name">
                                                                        <i class="icon-copy fa fa-user" aria-hidden="true"></i> Superadmin
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                                    <div class="task-time">10:00 am</div>
                                                                </li>
                                                                <!-- Entry 7 Juni -->
                                                                <li>
                                                                    <div class="date">7 Juni</div>
                                                                    <div class="task-name">
                                                                        <i class="icon-copy fa fa-user" aria-hidden="true"></i> Pegawai
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                                    <div class="task-time">09:30 am</div>
                                                                </li>
                                                                <!-- Entry 10 Juni (Akademik) -->
                                                                <li>
                                                                    <div class="date">10 Juni</div>
                                                                    <div class="task-name">
                                                                        <i class="icon-copy fa fa-user" aria-hidden="true"></i> Akademik
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                                    <div class="task-time">11:00 am</div>
                                                                </li>
                                                                <!-- Entry 10 Juni (Task Added) -->
                                                                <li>
                                                                    <div class="date">10 Juni</div>
                                                                    <div class="task-name">
                                                                        <i class="icon-copy fa fa-user" aria-hidden="true"></i> Pegawai
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                                    <div class="task-time">09:30 am</div>
                                                                </li>
                                                                <!-- Entry 10 Juni (Event Added) -->
                                                                <li>
                                                                    <div class="date">10 Juni</div>
                                                                    <div class="task-name">
                                                                        <i class="icon-copy fa fa-user" aria-hidden="true"></i> Akademik
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                                    <div class="task-time">09:30 am</div>
                                                                </li>
                                                                <!-- Entry 12 Juni -->
                                                                <li>
                                                                    <div class="date">12 Juni</div>
                                                                    <div class="task-name">
                                                                        <i class="icon-copy fa fa-user" aria-hidden="true"></i> SuperAdmin
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                                    <div class="task-time">09:30 am</div>
                                                                </li>
                                                                <!-- Entry 15 Juni -->
                                                                <li>
                                                                    <div class="date">15 Juni</div>
                                                                    <div class="task-name">
                                                                        <i class="icon-copy fa fa-user" aria-hidden="true"></i> Kemahasiswaan
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                                    <div class="task-time">01:00 pm</div>
                                                                </li>
                                                                <!-- Entry 20 Juni -->
                                                                <li>
                                                                    <div class="date">20 Juni</div>
                                                                    <div class="task-name">
                                                                        <i class="icon-copy fa fa-user" aria-hidden="true"></i> Keuangan
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                                    <div class="task-time">02:30 pm</div>
                                                                </li>
                                                                <!-- Entry 24 Juni -->
                                                                <li>
                                                                    <div class="date">24 Juni</div>
                                                                    <div class="task-name">
                                                                        <i class="icon-copy fa fa-user" aria-hidden="true"></i> Akademik
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                                    <div class="task-time">09:30 am</div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- Juni, 2024 (additional if needed) -->
                                                        <div class="timeline-month">
                                                            <h5>Juni, 2024</h5>
                                                        </div>
                                                        <div class="profile-timeline-list">
                                                            <ul>
                                                                <!-- Entry 25 Juni -->
                                                                <li>
                                                                    <div class="date">25 Juni</div>
                                                                    <div class="task-name">
                                                                        <i class="icon-copy fa fa-user" aria-hidden="true"></i> SuperAdmin
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                                    <div class="task-time">Time for 25 Juni</div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Timeline Tab End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
          <!-- Card Box -->
          <div class="row pb-10">
              <div class="col-md-4 mb-20">
                  <div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#073042">
                      <div class="d-flex justify-content-between pb-20 text-white">
                          <div class="icon h1 text-white">
                              <i class="fa fa-vcard-o" aria-hidden="true"></i>
                          </div>
                          <div class="font-14 text-right">
                              <div><i class="icon-copy ion-arrow-up-c"></i> 2.69%</div>
                              <div class="font-12">Since last month</div>
                          </div>
                      </div>
                      <div class="d-flex justify-content-between align-items-end">
                          <div class="text-white">
                              <div class="font-14">Pegawai</div>
                              <div class="font-24 weight-500">1865</div>
                          </div>
                          <div class="max-width-150">
                              <div id="appointment-chart"></div>
                          </div>
                      </div>
                  </div>
                  <div class="card-box min-height-200px pd-20" data-bgcolor="#265ed7">
                      <div class="d-flex justify-content-between pb-20 text-white">
                          <div class="icon h1 text-white">
                              <i class="fa fa-institution" aria-hidden="true"></i>
                          </div>
                          <div class="font-14 text-right">
                              <div><i class="icon-copy ion-arrow-down-c"></i> 3.69%</div>
                              <div class="font-12">Since last month</div>
                          </div>
                      </div>
                      <div class="d-flex justify-content-between align-items-end">
                          <div class="text-white">
                              <div class="font-14">Akademik</div>
                              <div class="font-24 weight-500">250</div>
                          </div>
                          <div class="max-width-150">
                              <div id="surgery-chart"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 mb-20">
                  <div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#004e64">
                      <div class="d-flex justify-content-between pb-20 text-white">
                          <div class="icon h1 text-white">
                              <i class="fa fa-vcard-o" aria-hidden="true"></i>
                          </div>
                          <div class="font-14 text-right">
                              <div><i class="icon-copy ion-arrow-up-c"></i> 2.69%</div>
                              <div class="font-12">Since last month</div>
                          </div>
                      </div>
                      <div class="d-flex justify-content-between align-items-end">
                          <div class="text-white">
                              <div class="font-14">Pegawai</div>
                              <div class="font-24 weight-500">1865</div>
                          </div>
                          <div class="max-width-150">
                              <div id="appointment-chart"></div>
                          </div>
                      </div>
                  </div>
                  <div class="card-box min-height-200px pd-20" data-bgcolor="#0a2f35">
                      <div class="d-flex justify-content-between pb-20 text-white">
                          <div class="icon h1 text-white">
                              <i class="fa fa-institution" aria-hidden="true"></i>
                          </div>
                          <div class="font-14 text-right">
                              <div><i class="icon-copy ion-arrow-down-c"></i> 3.69%</div>
                              <div class="font-12">Since last month</div>
                          </div>
                      </div>
                      <div class="d-flex justify-content-between align-items-end">
                          <div class="text-white">
                              <div class="font-14">Akademik</div>
                              <div class="font-24 weight-500">250</div>
                          </div>
                          <div class="max-width-150">
                              <div id="surgery-chart"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 mb-20">
                  <div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#28a745">
                      <div class="d-flex justify-content-between pb-20 text-white">
                          <div class="icon h1 text-white">
                              <i class="fa fa-vcard-o" aria-hidden="true"></i>
                          </div>
                          <div class="font-14 text-right">
                              <div><i class="icon-copy ion-arrow-up-c"></i> 2.69%</div>
                              <div class="font-12">Since last month</div>
                          </div>
                      </div>
                      <div class="d-flex justify-content-between align-items-end">
                          <div class="text-white">
                              <div class="font-14">Pegawai</div>
                              <div class="font-24 weight-500">1865</div>
                          </div>
                          <div class="max-width-150">
                              <div id="appointment-chart"></div>
                          </div>
                      </div>
                  </div>
                  <div class="card-box min-height-200px pd-20" data-bgcolor="#0b846d">
                      <div class="d-flex justify-content-between pb-20 text-white">
                          <div class="icon h1 text-white">
                              <i class="fa fa-institution" aria-hidden="true"></i>
                          </div>
                          <div class="font-14 text-right">
                              <div><i class="icon-copy ion-arrow-down-c"></i> 3.69%</div>
                              <div class="font-12">Since last month</div>
                          </div>
                      </div>
                      <div class="d-flex justify-content-between align-items-end">
                          <div class="text-white">
                              <div class="font-14">Akademik</div>
                              <div class="font-24 weight-500">250</div>
                          </div>
                          <div class="max-width-150">
                              <div id="surgery-chart"></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@elseif(auth()->user()->role == 'pegawai')
  <div class="main-container">
      <div class="xs-pd-20-10 pd-ltr-20">
          <div class="title pb-20">
              <h2 class="h3 mb-0">Dashboard Overview</h2>
          </div>
          <div class="card-box pd-20 height-100-p mb-30">
              <div class="row align-items-center">
                  <div class="col-md-4">
                      <img src="{{ url('vendors/images/banner-img.png') }}" alt="" />
                  </div>
                  <div class="col-md-8">
                      <h4 class="font-20 weight-500 mb-10 text-capitalize">
                          Selamat Datang
                          <div class="weight-600 font-30 text-blue">Admin {{Auth::user()->name}}!</div>
                      </h4>
                      <p class="font-18 max-width-600">
                          Anda telah berhasil masuk ke dalam sistem sebagai <span class="font-weight-bold">{{Auth::user()->name}}</span> SIDAFATI. 
                          Mohon gunakan hak akses ini dengan penuh tanggung jawab dan pastikan untuk menjaga kerahasiaan serta integritas data yang disimpan dalam sistem. 
                          Terima kasih atas kerjasamanya dalam menjaga keamanan informasi.
                      </p>
                  </div>
              </div>
          </div>
          <!-- Card Box -->
          <div class="row pb-10">
              <div class="col-md-4 mb-20">
                  <div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#073042">
                      <div class="d-flex justify-content-between pb-20 text-white">
                          <div class="icon h1 text-white">
                              <i class="fa fa-vcard-o" aria-hidden="true"></i>
                          </div>
                          <!-- <div class="font-14 text-right">
                              <div><i class="icon-copy ion-arrow-up-c"></i> 2.69%</div>
                              <div class="font-12">Since last month</div>
                          </div> -->
                      </div>
                      <div class="d-flex justify-content-between align-items-end">
                          <div class="text-white">
                              <div class="font-14 font-weight-bold">Program Studi</div>
                              <div class="font-24 weight-500">21</div>
                          </div>
                          <div class="max-width-150">
                              <div id="appointment-chart"></div>
                          </div>
                      </div>
                  </div>
                  <div class="card-box min-height-200px pd-20" data-bgcolor="#265ed7">
                      <div class="d-flex justify-content-between pb-20 text-white">
                          <div class="icon h1 text-white">
                              <i class="fa fa-institution" aria-hidden="true"></i>
                          </div>
                          <!-- <div class="font-14 text-right">
                              <div><i class="icon-copy ion-arrow-down-c"></i> 3.69%</div>
                              <div class="font-12">Since last month</div>
                          </div> -->
                      </div>
                      <div class="d-flex justify-content-between align-items-end">
                          <div class="text-white">
                              <div class="font-14 font-weight-bold">Pejabat</div>
                              <div class="font-24 weight-500">250</div>
                          </div>
                          <div class="max-width-150">
                              <div id="surgery-chart"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 mb-20">
                  <div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#004e64">
                      <div class="d-flex justify-content-between pb-20 text-white">
                          <div class="icon h1 text-white">
                              <i class="fa fa-vcard-o" aria-hidden="true"></i>
                          </div>
                          <!-- <div class="font-14 text-right">
                              <div><i class="icon-copy ion-arrow-up-c"></i> 2.69%</div>
                              <div class="font-12">Since last month</div>
                          </div> -->
                      </div>
                      <div class="d-flex justify-content-between align-items-end">
                          <div class="text-white">
                              <div class="font-14 font-weight-bold">Jumlah Dosen</div>
                              <div class="font-24 weight-500">1865</div>
                          </div>
                          <div class="max-width-150">
                              <div id="appointment-chart"></div>
                          </div>
                      </div>
                  </div>
                  <div class="card-box min-height-200px pd-20" data-bgcolor="#0a2f35">
                      <div class="d-flex justify-content-between pb-20 text-white">
                          <div class="icon h1 text-white">
                              <i class="fa fa-institution" aria-hidden="true"></i>
                          </div>
                          <!-- <div class="font-14 text-right">
                              <div><i class="icon-copy ion-arrow-down-c"></i> 3.69%</div>
                              <div class="font-12">Since last month</div>
                          </div> -->
                      </div>
                      <div class="d-flex justify-content-between align-items-end">
                          <div class="text-white">
                              <div class="font-14 font-weight-bold">Dosen Tugas Belajar</div>
                              <div class="font-24 weight-500">250</div>
                          </div>
                          <div class="max-width-150">
                              <div id="surgery-chart"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 mb-20">
                  <div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#28a745">
                      <div class="d-flex justify-content-between pb-20 text-white">
                          <div class="icon h1 text-white">
                              <i class="fa fa-vcard-o" aria-hidden="true"></i>
                          </div>
                          <!-- <div class="font-14 text-right">
                              <div><i class="icon-copy ion-arrow-up-c"></i> 2.69%</div>
                              <div class="font-12">Since last month</div>
                          </div> -->
                      </div>
                      <div class="d-flex justify-content-between align-items-end">
                          <div class="text-white">
                              <div class="font-14 font-weight-bold">Asmik Tugas Belajar</div>
                              <div class="font-24 weight-500">1865</div>
                          </div>
                          <div class="max-width-150">
                              <div id="appointment-chart"></div>
                          </div>
                      </div>
                  </div>
                  <div class="card-box min-height-200px pd-20" data-bgcolor="#0b846d">
                      <div class="d-flex justify-content-between pb-20 text-white">
                          <div class="icon h1 text-white">
                              <i class="fa fa-institution" aria-hidden="true"></i>
                          </div>
                          <!-- <div class="font-14 text-right">
                              <div><i class="icon-copy ion-arrow-down-c"></i> 3.69%</div>
                              <div class="font-12">Since last month</div>
                          </div> -->
                      </div>
                      <div class="d-flex justify-content-between align-items-end">
                          <div class="text-white">
                              <div class="font-14 font-weight-bold">Dosen Luar Biasa NIDK</div>
                              <div class="font-24 weight-500">250</div>
                          </div>
                          <div class="max-width-150">
                              <div id="surgery-chart"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 mb-20">
                  <div class="card-box min-height-200px pd-20 mb-20" data-bgcolor="#28a745">
                      <div class="d-flex justify-content-between pb-20 text-white">
                          <div class="icon h1 text-white">
                              <i class="fa fa-vcard-o" aria-hidden="true"></i>
                          </div>
                          <!-- <div class="font-14 text-right">
                              <div><i class="icon-copy ion-arrow-up-c"></i> 2.69%</div>
                              <div class="font-12">Since last month</div>
                          </div> -->
                      </div>
                      <div class="d-flex justify-content-between align-items-end">
                          <div class="text-white">
                              <div class="font-14 font-weight-bold">Dosen Aktif & Tetap</div>
                              <div class="font-24 weight-500">1865</div>
                          </div>
                          <div class="max-width-150">
                              <div id="appointment-chart"></div>
                          </div>
                      </div>
                  </div>
                  <div class="card-box min-height-200px pd-20" data-bgcolor="#0b846d">
                      <div class="d-flex justify-content-between pb-20 text-white">
                          <div class="icon h1 text-white">
                              <i class="fa fa-institution" aria-hidden="true"></i>
                          </div>
                          <!-- <div class="font-14 text-right">
                              <div><i class="icon-copy ion-arrow-down-c"></i> 3.69%</div>
                              <div class="font-12">Since last month</div>
                          </div> -->
                      </div>
                      <div class="d-flex justify-content-between align-items-end">
                          <div class="text-white">
                              <div class="font-14 font-weight-bold">Tendik, Asmik, Laboran</div>
                              <div class="font-24 weight-500">250</div>
                          </div>
                          <div class="max-width-150">
                              <div id="surgery-chart"></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@elseif(auth()->user()->role == 'akademik')
<div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="title pb-20">
                <h2 class="h3 mb-0">Dashboard Overview</h2>
            </div>
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img src="{{ url('vendors/images/banner-img.png') }}" alt="Banner Image" />
                    </div>
                    <div class="col-md-8">
                        <h4 class="font-20 weight-500 mb-10 text-capitalize">
                            Selamat Datang
                            <span class="weight-600 font-30 text-blue">Admin {{Auth::user()->name}}!</span>
                        </h4>
                        <p class="font-18 max-width-600">
                            Anda telah berhasil masuk ke dalam sistem sebagai <span class="font-weight-bold">{{Auth::user()->name}}</span> HARMONY. 
                            Mohon gunakan hak akses ini dengan penuh tanggung jawab dan pastikan untuk menjaga kerahasiaan serta integritas data yang disimpan dalam sistem. 
                            Terima kasih atas kerjasamanya dalam menjaga keamanan informasi.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mb-20">
                    <div class="card-box height-100-p pd-20">
                        <div class="d-flex flex-wrap justify-content-between align-items-center pb-0 pb-md-3">
                            <div class="h5 mb-md-0 text-dark">Grafik Rekap Mahasiswa</div>
                            <div class="form-group mb-md-0">
                                <select class="form-control form-control-sm selectpicker">
                                    <option value="aktif">Mahasiswa Aktif + PMB</option>
                                    <option value="mengundurkan">Mahasiswa Mengundurkan Diri</option>
                                    <option value="dikeluarkan">Mahasiswa Dikeluarkan</option>
                                    <option value="wafat">Mahasiswa Wafat</option>
                                    <option value="lulus">Mahasiswa Lulus/Wisuda</option>
                                    <option value="tugasAkhir">Mahasiswa Lulusan Tugas Akhir</option>
                                </select>
                            </div>
                        </div>
                        <div class="chart">
                            <div class="row">
                                <div class="col-md-12 chart">
                                    <canvas id="myChartUndurDiri"></canvas>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <!-- Simple Card-Box start -->
            <div class="row">
                @foreach($tahun as $t)
                <div class="col-xl-4 mb-20">
                    <div class="card-box height-100-p widget-style1">
                        <a href="#" class="btn-block" data-toggle="modal" data-target="#modalS" type="button">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="progress-data">
                                    <div id="chartAllRekap"></div>
                                </div>
                                <div class="widget-data">
                                    <div class="h4 mb-0 text-dark">4478 Data</div>
                                    <div class="weight-600 font-14">TS - {{ $t->ts }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
</div>
@elseif (auth()->user()->role == 'kemahasiswaan')
  <div class="main-container">
      <div class="xs-pd-20-10 pd-ltr-20">
          <div class="title pb-20">
              <h2 class="h3 mb-0">Dashboard Overview</h2>
          </div>
          <div class="card-box pd-20 height-100-p mb-30">
              <div class="row align-items-center">
                  <div class="col-md-4">
                      <img src="{{ url('vendors/images/banner-img.png') }}" alt="" />
                  </div>
                  <div class="col-md-8">
                      <h4 class="font-20 weight-500 mb-10 text-capitalize">
                          Selamat Datang
                          <div class="weight-600 font-30 text-blue">Admin {{Auth::user()->name}}!</div>
                      </h4>
                      <p class="font-18 max-width-600">
                          Anda telah berhasil masuk ke dalam sistem sebagai <span class="font-weight-bold">{{Auth::user()->name}}</span> SIDAFATI. 
                          Mohon gunakan hak akses ini dengan penuh tanggung jawab dan pastikan untuk menjaga kerahasiaan serta integritas data yang disimpan dalam sistem. 
                          Terima kasih atas kerjasamanya dalam menjaga keamanan informasi.
                      </p>
                  </div>
              </div>
          </div>
          <div class="row pb-10">
					<div class="col-md-8 mb-20">
						<div class="card-box height-100-p pd-20">
							<div
								class="d-flex flex-wrap justify-content-between align-items-center pb-0 pb-md-3"
							>
								<div class="h5 mb-md-0 text-dark">Kemahasiswaan</div>
								<div class="form-group mb-md-0">
                                <select class="form-control form-control-sm selectpicker">
                                    <option value="">Prestasi Mahasiswa</option>
                                    <option value="">Izin Kegiatan HIMA</option>
                                    
                                </select>
								</div>
							</div>
							<div id="myChartMhsAktif"></div>
						</div>
					</div>
					<div class="col-md-4 mb-20">
						<div
							class="card-box min-height-200px pd-20 mb-20"
							data-bgcolor="#073042"
						>
							<div class="d-flex justify-content-between pb-20 text-white">
								<div class="icon h1 text-white">
                                    <i class="icon-copy fa fa-trophy" aria-hidden="true"></i>
									<!-- <i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i> -->
								</div>
								<div class="font-14 text-right">
									<div><i class="icon-copy ion-arrow-up-c"></i> 2.69%</div>
									<div class="font-12">Since last month</div>
								</div>
							</div>
							<div class="d-flex justify-content-between align-items-end">
								<div class="text-white">
									<div class="font-14">Prestasi Mahasiswa</div>
									<div class="font-24 weight-500">1865</div>
								</div>
								<div class="max-width-150">
									<div id="appointment-chart"></div>
								</div>
							</div>
						</div>
						<div class="card-box min-height-200px pd-20" data-bgcolor="#0b846d">
							<div class="d-flex justify-content-between pb-20 text-white">
								<div class="icon h1 text-white">
                                    <i class="icon-copy fa fa-users" aria-hidden="true"></i>
								</div>
								<div class="font-14 text-right">
									<div><i class="icon-copy ion-arrow-down-c"></i> 3.69%</div>
									<div class="font-12">Since last month</div>
								</div>
							</div>
							<div class="d-flex justify-content-between align-items-end">
								<div class="text-white">
									<div class="font-14">Izin Kegiatan HIMA</div>
									<div class="font-24 weight-500">250</div>
								</div>
								<div class="max-width-150">
									<div id="surgery-chart"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
        </div>
  </div>
@endif
</x-admin-app>