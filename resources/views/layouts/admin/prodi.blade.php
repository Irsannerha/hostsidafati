<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title font-weight-bold">
                            <h4>Program Studi</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item font-weight-bold h5">
                                    <a href="/">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active font-weight-bold h5" aria-current="page">
                                    Prodi
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
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <div class="btn-group btn-group-toggle font-weight-400" data-toggle="buttons">
                        <button class="btn btn-primary" onclick="exportToPDF()">Cetak</button>
                        <button class="btn btn-primary" onclick="exportToExcel()">Excel</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ImportModal">Import</button>
                    </div>
                    <a href="{{ route('prodi.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">#</th>
                                <th>Program Studi</th>
                                <th>Akreditasi</th>
                                <th>Fakultas</th>
                                <th>Tingkat Pendidikan</th>
                                <th class="datatable-nosort">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prodis as $prodi)
                            <tr>
                                <td class="table-plus">{{ $loop->iteration }}</td>
                                <td>{{ $prodi->nama }}</td>
                                <td>{{ $prodi->akreditasi }}</td>
                                <td>{{ $prodi->fakultas }}</td>
                                <td>{{ $prodi->tingkat_pendidikan }}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('prodi.show', $prodi->id) }}" class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff" data-toggle="modal" data-target="#programStudiModal">
                                            <i class="icon-copy dw dw-eye"></i> Lihat
                                        </a>
                                        <a href="{{ route('prodi.edit', $prodi->id) }}" class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff">
                                            <i class="icon-copy dw dw-edit2"></i> Edit
                                        </a>
                                        <form action="{{ route('prodi.destroy', $prodi->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xxs btn-primary mr-1" style="border-radius: 15px; padding: 0.2rem 0.5rem; font-size: 0.9rem;" data-color="#fff">
                                                <i class="icon-copy dw dw-delete-3"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>
    </div>
</div>