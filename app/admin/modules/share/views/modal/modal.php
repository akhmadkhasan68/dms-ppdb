<div class="modal fade bd-example-modal-lg" id="modal_send_dokument" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Kirim Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formSendDoc">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <input type="hidden" name="id" id="id-document">
                <input type="hidden" name="is_approval" id="is-approval-send">
                <div class="modal-body" style="overflow: scroll; max-height:500px;">
                    <div class="col-md-12 mb-12">
                        <label for="">Nama</label>
                        <input type="text" class="form-control disabled" id="name-send" name="name" readonly>
                    </div>

                    <br>

                    <div class="col-md-12 mb-12" style="margin-top: 5px">
                        <label for="">File</label>
                        <input type="text" class="form-control disabled" id="file-send" name="file" readonly>
                    </div>

                    <br>

                    <div class="col-md-12 mb-12" style="margin-top: 5px">
                        <label for="">Kirim Ke</label>
                        <table class="mb-0 table table-striped">
                            <thead>
                            <tr>
                                <th>Pilih</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                            </tr>
                            </thead>
                            <tbody id="data-user">
                                <?php
                                    foreach($get_admin as $admin)
                                    {
                                ?>
                                    <tr>
                                        <td><input type="checkbox" class="check-approval-modal" value="<?php echo $admin->id;?>" name="send_to[]"></td>
                                        <td><?php echo $admin->name;?></td>
                                        <td><?php echo $admin->username;?></td>
                                        <td><?php echo $admin->level;?></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kirim Dokumen</button>
                </div>
            </form>
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