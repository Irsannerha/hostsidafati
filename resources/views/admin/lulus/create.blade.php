<x-admin-app>
  <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
        <div class="page-header">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="title font-weight-bold">
                <h4>Data Mahasiswa Lulus TS</h4>
              </div>
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item font-weight-bold h5">
                    <a href="dashboard.html">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                    Data Mahasiswa Lulus TS
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
            <form action="{{ route('superadmin.lulus.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Program Studi</label>
                    <select name="prodi_id" class="form-control">
                      <option value="">Pilih Program Studi</option>
                      @foreach($prodi as $p)
                      <option value="{{ $p->id }}">{{ $p->prodi }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Tahun </label>
                    <select name="tahun_id" id="tahun_id" class="form-control" id="ts">
                      <option value="">Pilih Tahun</option>
                      @foreach($tahun as $thnid)
                      <option value="{{ $thnid->id }}" {{ request('tahun_id') == $thnid->id ? 'selected' : '' }}>{{ $thnid->tahun }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">September</label>
                    <input type="number" name="september" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus TS September" />
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">November</label>
                    <input type="number" name="november" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus TS November" />
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Maret</label>
                    <input type="number" name="maret" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus TS Maret" />
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Mei</label>
                    <input type="number" name="mei" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus TS Mei" />
                  </div>
                </div>
                <div class="col-md-3 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Juli</label>
                    <input type="number" name="juli" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Lulus TS Juli" />
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
          $("#ts").change(function() {
            console.log("change")
            fetchContent()
          })

          function fetchContent() {
            let value = $("#ts").val();
            let csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
              url: "",
              method: "GET",
              data: {"tahun_semester_id": parseInt(value), _token: csrfToken},
              success: function(data) {
                $("#prodi").empty();
                $.each(data, function(index, item) {
                  $("#prodi").append($('<option>', { value: item.id, text: item.prodi  }))
                }
              )},
            })
          }
      });
</script>
</x-admin-app>