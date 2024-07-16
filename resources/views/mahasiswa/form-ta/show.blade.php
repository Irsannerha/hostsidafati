<style>
    .modal-sm {
        max-width: 80%;
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
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content p-6" data-bgcolor="#ffffff">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $ta->id }}">
                    Detail Data Pengajuan Tugas Akhir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive" data-bgcolor="#fff">
                <p>Tanggal Pengajuan : <span class="font-bold">12-04-2040</span></p>
                <div class="flex flex-col w-full text-center border-x-[1px] border-t-[1px] border-black">
                    <div class="flex w-full bg-primary-main text-white border-b border-black">
                        <div class="w-1/3 px-4 py-2 font-bold ">Status Pengajuan</div>
                        <div class="w-1/3 px-4 py-2 font-bold border-x border-black">Keterangan</div>
                        <div class="w-1/3 px-4 py-2 font-bold ">Timestamp</div>
                    </div>
                    @foreach ($ket_pengajuan as $keterangan)
                        @if ($keterangan->jenis_pengajuan_id == $ta->jenis_pengajuan_id && $keterangan->id_pengajuan == $ta->id)
                            <div class="flex w-full border-b border-black">
                                <div class="w-1/3 px-4 py-2 bg-gray-200">{{ $keterangan->status_keterangan }}</div>
                                <div class="w-1/3 px-4 py-2 border-x border-black">{{ $keterangan->keterangan }}</div>
                                <div class="w-1/3 px-4 py-2">{{ $keterangan->created_at }}</div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <p class="ml-3">Silahkan klik pada tautan disini untuk mulai mengunduh file</p>
            <div class="modal-footer">
                <button type="button"
                    class="border border-secondary-border md:w-[180px] py-1 rounded-md bg-secondary-btn font-bold"
                    data-dismiss="modal">Selesai</button>
            </div>
        </div>
    </div>
</div>
