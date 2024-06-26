<div class="row clearfix">
    <div class="col-md-12 col-sm-12">
        <div class="modal fade" id="deleteModal{{ $tahun->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" data-bgcolor="#d0d0d0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body text-center font-18">
                        <div class="modal-body table-responsive">
                            <div class="pd-20 card-box card-hdr" data-bgcolor="#fff">
                                <h3 class="mb-20"><i class="fa fa-trash" aria-hidden="true"></i> HAPUS </h3>
                                <div class="modal-body">
                                    <div class="center">
                                        <h6>Apakah Anda yakin ingin menghapus data ini ?</h6>
                                        <center><h6><span class="font-10 font-weight-bold">&mdash;</span></h6></center>
                                        <center><span><small><span class="btn btn-outline-primary btn-lg" style="border-radius: 10px; padding: 0.4rem 0.6rem; font-size: 12px;">Tahun {{ $tahun->ts }}</span></small></span></center>
                                    </div>
                                </div>
                                <div class="modal-footer text-center justify-content-center">
                                    @if(Auth::user()->role == 'superadmin')
                                    <form action="{{ route('superadmin.tahun.destroy', $tahun->id) }}" method="POST">
                                     @elseif(Auth::user()->role == 'akademik')
                                     <form action="{{ route('akademik.tahun.destroy', $tahun->id) }}" method="POST">
                                    @endif
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger light" name="" id="toastBasicTrigger" value="Hapus">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
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


