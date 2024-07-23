<style>
    .modal-dialog {
        top: 7.5rem;
        /* 112px */
        bottom: 7.5rem;
        /* 112px */
    }
</style>
<div class="modal fade" id="inputKrs" tabindex="-1" role="dialog" aria-labelledby="krsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content py-6" data-bgcolor="#ECF0F4">
            <div class="modal-body mx-auto mb-5">
                <h4 class="text-center">Pilih menu layanan KRS dan Transkrip</h4>
                <div class="flex flex-col gap-4 mt-5">
                    <a href="{{ route('mahasiswa.form-krs.perubahan-krs.create')}}"><button type="button"
                            class="py-2 w-full bg-modal-btn font-bold rounded-10">Perubahan
                            KRS</button></a>
                    <a href="{{ route('mahasiswa.form-krs.pengisian-krs.create')}}"><button type="button"
                            class="py-2 w-full bg-modal-btn font-bold rounded-10">Pengisian
                            KRS</button></a>
                    <a href="{{ route('mahasiswa.form-krs.penghapusan-matkul.create')}}"><button type="button"
                            class="py-2 w-full bg-modal-btn font-bold rounded-10">Menyembunyikan
                            Mata Kuliah</button></a>
                    <a href="{{ route('mahasiswa.form-krs.menampilkan-matkul.create')}}"><button type="button"
                            class="py-2 w-full bg-modal-btn font-bold rounded-10">Menampilkan
                            Mata Kuliah</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
