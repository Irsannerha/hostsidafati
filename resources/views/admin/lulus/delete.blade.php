<div class="row clearfix">
    <div class="col-md-12 col-sm-12">
        <div class="modal fade" id="deleteModal{{ $ls->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" data-bgcolor="#d0d0d0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body text-center font-18">
                        <div class="modal-body">
                            <div class="pd-10 card-box " data-bgcolor="#fff">
                                <h3 class="mb-10"><i class="fa fa-trash" aria-hidden="true"></i> HAPUS </h3>
                                <div class="modal-body">
                                    <div class="center">
                                        <h6>Apakah Anda yakin ingin menghapus data ini?</h6>
                                        <center><small><span class="font-weight-bold badge badge-danger" style="border-radius: 10px; padding: 0.2rem 1.2rem; font-size: 15px;">{{ $ls->prodi->prodi }}</span></small></center>
                                        <p style="font-size:medium;">Mahasiswa Lulus September : {{ $ls->september}}</p>
                                        <p style="font-size:medium;">Mahasiswa Lulus November : {{ $ls->november }}</p>
                                        <p style="font-size:medium;">Mahasiswa Lulus Maret : {{ $ls->maret }}</p>
                                        <p style="font-size:medium;">Mahasiswa Lulus Mei : {{ $ls->mei }}</p>
                                        <p style="font-size:medium;">Mahasiswa Lulus Juli : {{ $ls->juli }}</p>
                                    </div>
                                </div>
                                <div class="modal-footer text-center justify-content-center">
                                    @if (Auth::user()->role == 'superadmin')
                                    <form action="{{ route('superadmin.lulus.destroy', $ls->id) }}" method="POST">
                                    @elseif (Auth::user()->role == 'akademik')
                                    <form action="{{ route('akademik.lulus.destroy', $ls->id) }}" method="POST">
                                    @endif
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                                        <input type="submit" class="btn btn-danger light" name="" id="toastBasicTrigger" value="Hapus">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
