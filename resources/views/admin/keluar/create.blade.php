<x-admin-app>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title font-weight-bold">
                                <h4>Data Mahasiswa Dikeluarkan TS</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                            <li class="breadcrumb-item font-weight-bold h5">
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                        <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                        Data Mahasiswa Dikeluarkan TS
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
            @if(Auth::user()->role == 'superadmin')
            <form action="{{ route('superadmin.keluar.store') }}" method="POST" enctype="multipart/form-data">
            @elseif (Auth::user()->role == 'akademik')
            <form action="{{ route('akademik.keluar.store') }}" method="POST" enctype="multipart/form-data">
            @endif
              @csrf
              <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Tahun</label>
                    <select name="ts_id" class="form-control" id="ts">
                      <option value="">Pilih Tahun</option>
                      @foreach($tahun as $thid)
                      <option value="{{ $thid->id }}">{{ $thid->ts }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
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
                <div class="col-md-5 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Jumlah Mahasiswa Mengundurkan Diri Genap</label>
                    <input type="number" name="mhs_keluar_genap" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Dikeluarkan Genap" />
                  </div>
                </div>
                <div class="col-md-5 col-sm-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Jumlah Mahasiswa Mengundurkan Diri Ganjil</label>
                    <input type="number" name="mhs_keluar_ganjil" class="form-control" placeholder="Masukkan Jumlah Mahasiswa Dikeluarkan Ganjil" />
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
        fetchContent();
      });

      function fetchContent() {
        let value = $("#ts").val();
        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
          url: "",
          method: "GET",
          data: {
            "tahun_semester_id": parseInt(value),
            _token: csrfToken
          },
          success: function(data) {
            $("#prodi").empty();
            if (data.length < 1) {
              $("#prodi").append($('<option>', {
                value: "",
                text: "Semua prodi sudah terinput"
              }));
              swal("Sepertinya, Semua Prodi Sudah Terinput 🤔");
              return;
            }
            $.each(data, function(index, item) {
              $("#prodi").append($('<option>', {
                value: item.id,
                text: item.prodi
              }));
            });
          }
        });
      }
    });
  </script>
</x-admin-app>
