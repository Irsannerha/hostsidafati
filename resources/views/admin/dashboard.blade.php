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
                      <img src="vendors/images/banner-img.png" alt="" />
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
                      <img src="vendors/images/banner-img.png" alt="" />
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
          <!-- Card Box -->
          <!-- <div class="row pb-10">
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
          </div> -->
      </div>
  </div>
@endif
</x-admin-app>