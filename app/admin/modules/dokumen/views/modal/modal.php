<div class="modal fade bd-example-modal-lg" id="modal_send_dokument" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Kirim Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mb-12">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" id="" placeholder="Dokumen A" readonly>
                </div>

                <div class="col-md-12 mb-12" style="margin-top: 5px">
                    <label for="">File</label>
                    <input type="text" class="form-control" id="" placeholder="Dokumen_a.doc" readonly>
                </div>


                <div class="col-md-12 mb-12" style="margin-top: 5px">
                    <label for="">Kirim Ke</label>
                    <select class="form-control" id="persetujuan">
                        <option>Kepala Sekolah</option>
                        <option>Waka Kesiswaan</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Kirim Dokumen</button>
            </div>
        </div>
    </div>
</div>


<!-- edit dokument -->

<div class="modal fade bd-example-modal-lg" id="modal_edit_dokument" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mb-12">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" id="" placeholder="Masukkan Nama file Anda" required>
                </div>

                <div class="col-md-12 mb-12" style="margin-top: 5px">
                    <label for="">File</label>
                    <input type="file" class="form-control" id="" required>
                </div>

                <div class="col-md-12 mb-12" style="margin-top: 5px">
                    <label for="">Persetujuan</label>
                    <select class="form-control" id="persetujuan">
                        <option>Ya</option>
                        <option>Tidak</option>
                    </select>
                </div>

                <div class="col-md-12 mb-12" style="margin-top: 5px">
                    <label for="">Persetujuan Ke</label>
                    <select class="form-control" id="persetujuan">
                        <option>Kepala Sekolah</option>
                        <option>Waka Kesiswaan</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Tambah Dokumen</button>
            </div>
        </div>
    </div>
</div>

<!-- Detail Approval -->

<div class="modal fade bd-example-modal-lg" id="modal_detail_approval" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Approval</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-approval-detail">
                
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-danger">Tutup</button>
            </div>
        </div>
    </div>
</div>