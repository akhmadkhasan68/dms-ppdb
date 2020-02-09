<div class="modal fade bd-example-modal-lg" id="modal_verifikasi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Verifikasi Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mb-12">
                    <label for="validationCustom01">Nama</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Dokumen A" readonly>
                </div>

                <div class="col-md-12 mb-12" style="margin-top: 5px">
                    <label for="validationCustom01">NISN</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="123456" readonly>
                </div>


                <div class="col-md-12 mb-12" style="margin-top: 5px">
                    <label for="validationCustom01">Status Siswa</label>
                    <select class="form-control" id="persetujuan">
                        <option selected>Belum Di Verifikasi</option>
                        <option>Diterima</option>
                        <option>Di Tolak</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>