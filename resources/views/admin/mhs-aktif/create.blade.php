<x-admin-app>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title font-weight-bold">
                                <h4>Data Jumlah Mahasiswa Aktif TS + PMB</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                            <li class="breadcrumb-item font-weight-bold h5">
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                        <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                        Data Jumlah Mahasiswa Aktif TS + PMB
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
          <!-- Form Tambah Prodi -->
          <div class="pd-20 card-box mb-30">
            <div class="clearfix">
              <div class="pull-left">
                <h4 class="text-dark h4">Form Tambah </h4>
              </div>
            </div>
            <hr />
            <br />
            <form action="{{ route('superadmin.mhs-aktif.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Program Studi</label>
                    <select name="prodi_id" class="form-control" id="prodi">
                      <option value="">Pilih Program Studi</option>
                      @foreach($prodi as $p)
                      <option value="{{ $p->id }}">{{ $p->prodi }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Tahun Semester</label>
                    <select name="tahun_id" class="form-control" id="tahun">
                      <option value="">Pilih Tahun Semester</option>
                      @foreach($tahun as $thnid)
                      <option value="{{ $thnid->id }}">{{ $thnid->ts }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Jumlah Mahasiswa Aktif TS <span id="ts_sebelum">(Sebelumnya)</span></label>
                    <input type="number" name="jumlah_mhs_aktif_ts" class="form-control" value="{{ old('jumlah_mhs_aktif_ts') }}" placeholder="Masukkan Jumlah Mahasiswa Aktif TS" />
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Jumlah Mahasiswa PMB <span id="thn_pmb"></span></label>
                    <input type="number" name="jumlah_mhs_aktif_th" class="form-control" value="{{ old('jumlah_mhs_aktif_th') }}" placeholder="Masukkan Jumlah Mahasiswa Aktif Tahun" />
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary float-right" id="sa-custom-position">
                    <i class="fa fa-save"></i> Simpan
                  </button>
                </div>
              </div>
            </form>
          </div>
          <!-- Form Tambah Prodi End -->
        </div>
        <!-- Checkbox select Datatable End -->
      </div>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        $("#tahun").change(function() {
          $("#tahun").attr('ts', $("#tahun option:selected").text())
            let value = $("#tahun").attr('ts')
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
            value = value === "Pilih Tahun Semester" ? "(Sebelumnya)" : value
            let ts_id = $("#tahun").val()
            if (value === "(Sebelumnya)") {
              $("#thn_pmb").text("")
            }
            else {
              console.log(value)
              $.ajax({
                url: "",
                method: "GET",
                data: {"tahun_semester_id": parseInt(ts_id), _token: csrfToken},
                success: function(data) {
                  $("#prodi").empty();
                  if (data.length < 1) {
                    $("#prodi").append($('<option>', { value: "", text: "Semua prodi sudah terinput" }))
                    return
                  }
                  $.each(data, function(index, item) {
                    $("#prodi").append($('<option>', { value: item.id, text: item.prodi  }))
                  }
                )},
              })
              let tahun = value.split("/")
              $("#thn_pmb").text(tahun[0])
              let ts = tahun.map((item, index) => {
                return parseInt(item) - 1
              })
              value = ts.join("/")
            }
            $("#ts_sebelum").text(value)
          })
      })
      </script>
</x-admin-app>
