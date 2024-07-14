<style>
    .modal-sm {
        max-width: 50%;
        /* Atur lebar maksimum modal */
        max-height: 95%;
        /* Atur tinggi maksimum modal */
        margin: 1.95rem auto;
        /* Atur margin */
    }

    .table-responsive {
        overflow-x: auto;
        /* Mengaktifkan scroll horizontal */
    }

    /* CSS untuk menambahkan z-index ke thead */
    @media screen and (max-width: 576px) {
        .modal-sm {
            max-width: 95%;
            /* Atur lebar maksimum modal untuk perangkat seluler */
        }
    }

    .text-content-box {
        display: grid;
        grid-template-columns: max-content 1fr;
        column-gap: 45px;
    }

    .text-content-box dd {
        font-weight: 500;
        margin-bottom: 5px;
    }

    @media only screen and (max-width: 768px) {
        .card-hdr {
            max-height: 500px;
            /* Atur ketinggian maksimum yang diinginkan */
            overflow-y: auto;
            /* Aktifkan pengguliran vertikal jika konten lebih panjang dari ketinggian maksimum */
        }
    }

    .custom-dd {
        border: 1px solid #999;
        /* Border dengan ketebalan 1px dan warna abu-abu */
        border-radius: 5px;
        /* Radius border 5px */
        padding: 4px;
        /* Padding untuk jarak antara konten dan border */
        font-size: 14px;
        /* Ukuran font */
    }

    .custom-dd ol {
        list-style-type: none;
        /* Menghilangkan bullet point */
        padding: 0;
    }

    .custom-dd li {
        margin-bottom: 5px;
        /* Margin antara setiap item daftar */
    }

    .card {
        border: 1px solid #999;
        /* Border dengan ketebalan 1px dan warna abu-abu */
        border-radius: 5px;
        /* Radius border 5px */
    }
</style>

<!-- Modal Lihat -->
<div class="modal fade" id="showModal{{ $ta->id }}" tabindex="-1" role="dialog"
    aria-labelledby="showModalLabel{{ $ta->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content" data-bgcolor="#d0d0d0">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $ta->id }}"><i class="fa fa-paperclip"
                        aria-hidden="true"></i> Detail Data Pengajuan Tugas Akhir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
                    <div class="container-fluid">
                        <!-- Header row -->
                        <div class="row font-weight-bold border-bottom">
                            <div class="col-2">No</div>
                            <div class="col-10">Nama</div>
                        </div>
                        <!-- Data rows -->
                        <div class="row border-bottom">
                            <div class="col-2">1</div>
                            <div class="col-10">Mahasiswa 1</div>
                        </div>
                        <!-- Add more rows as needed -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>