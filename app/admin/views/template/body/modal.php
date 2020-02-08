<div class="modal fade bd-example-modal-lg" id="modal_new_dokument" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mb-12">
                    <label for="validationCustom01">Nama</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Masukkan Nama file Anda" required>
                </div>

                <div class="col-md-12 mb-12" style="margin-top: 5px">
                    <label for="validationCustom01">File</label>
                    <input type="file" class="form-control" id="validationCustom01" required>
                </div>

                <div class="col-md-12 mb-12" style="margin-top: 5px">
                    <label for="validationCustom01">Persetujuan</label>
                    <select class="form-control" id="persetujuan">
                        <option>Ya</option>
                        <option>Tidak</option>
                    </select>
                </div>

                <div class="col-md-12 mb-12" style="margin-top: 5px">
                    <label for="validationCustom01">Persetujuan Ke</label>
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

<div class="modal fade bd-example-modal-lg" id="modal_setting" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mb-12" style="margin-top: 4px">
                    <label for="validationCustom01">Nama</label>
                    <input type="text" class="form-control" id="edit_nama" placeholder="">
                </div>
                <div class="col-md-12 mb-12" style="margin-top: 4px">
                    <label for="validationCustom01">Username</label>
                    <input type="text" class="form-control" id="edit_username" placeholder="">
                </div>
                <div class="col-md-12 mb-12" style="margin-top: 4px">
                    <label for="validationCustom01">Password</label>
                    <input type="password" class="form-control" id="edit_password" placeholder="">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Edit Password</button>
            </div>
        </div>
    </div>
</div>