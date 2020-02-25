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
            <form id="formEditDocument"  enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <input type="hidden" name="id" id="id-document-edit">

                <div class="modal-body">
                    <div class="col-md-12 mb-12">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="name" id="name-edit" placeholder="Masukkan Nama file Anda" required>
                    </div>

                    <br>

                    <div class="col-md-12 mb-12" style="margin-top: 5px">    
                        <input type="checkbox" id="change-file-edit"> Ubah file?
                    </div>
                    
                    <div id="fileAttributeCurrent" style="display:block;">
                        <div class="col-md-12 mb-12" style="margin-top: 5px">  
                            <input type="text" id="file-edit" class="form-control" readonly>
                        </div>
                    </div>

                    <div id="fileAttribute" style="display:none;">
                        <div class="col-md-12 mb-12" style="margin-top: 5px">
                            <input type="file" class="form-control" name="file">
                        </div>
                    </div>

                    <div class="col-md-12 mb-12" style="margin-top: 5px">
                        <label for="">Persetujuan</label>
                        <select class="form-control" id="persetujuan-edit" disabled readonly>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>

                    <div id="user-approval-edit">
                        <div class="col-md-12 mb-12" style="margin-top: 5px">
                            <label for="">Persetujuan Ke</label>
                            <table class="mb-0 table table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                </tr>
                                </thead>
                                <tbody id="data-user-edit">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit Dokumen</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Detail Approval -->

<div class="modal fade bd-example-modal-lg" id="modal_detail_approval" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Approval</h5>                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-approval-detail">
                Nama Dokumen : <span id="judul-dokumen"></span> <br/>
                File : <span id="judul-file"></span> <br/><br/>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Level</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="table-body-approval">
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-danger">Tutup</button>
            </div>
        </div>
    </div>
</div>