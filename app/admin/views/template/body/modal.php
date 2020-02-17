<div class="modal fade bd-example-modal-lg" id="modal_new_dokument" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add-doc-modal" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <div class="modal-body">
                    <div class="col-md-12 mb-12">
                        <label for="validationCustom01">Nama</label>
                        <input type="text" class="form-control" id="name_add_document" name="name" placeholder="Masukkan Nama file Anda" required>
                    </div>

                    <div class="col-md-12 mb-12" style="margin-top: 5px">
                        <label for="validationCustom01">File</label>
                        <input type="file" name="file" class="form-control" id="file_add_document" required>
                    </div>

                    <div class="col-md-12 mb-12" style="margin-top: 5px">
                        <label for="validationCustom01">Persetujuan</label>
                        <select class="form-control" id="persetujuan_add_document" name="is_approval">
                            <option value="1">Ya</option>
                            <option selected value="0">Tidak</option>
                        </select>
                    </div>

                    <br>

                    <div id="approval-document-to" style="display:none;">
                        <div class="col-md-12 mb-12" style="margin-top: 5px">
                            <label for="validationCustom01">Persetujuan Ke</label>
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
                                            <td><input type="checkbox" class="check-approval-modal" value="<?php echo $admin->id;?>" name="id_admin_approval[]"></td>
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
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-add-doc-modal" class="btn btn-primary">Tambah Dokumen</button>
                </div>
            </form>
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

<script>
    var base_url = '<?php echo base_url();?>';
    
    $("#persetujuan_add_document").change(function(){
        var value = $(this).val();

        if(value == 1)
        {
            $("#approval-document-to").css('display', 'block');
        }
        else
        {
            $("#approval-document-to").css('display', 'none');
        }
    });

    $("#form-add-doc-modal").submit(function(e){
        e.preventDefault();

        $.ajax({
            url:'<?php echo site_url('dokumen/ajax_action_add_file');?>',
            type:"post",
            dataType: 'json',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            beforeSend: function(){
                $(".loader").show();
            },
            success: function(response){
                $(".loader").hide();
                
                if(response.result == false)
                {
                    message(response.message.head, response.message.body, "error", "info");
                }

                if(response.result == true)
                {
                    message(response.message.head, response.message.body, "success", "info", 1000);
                    setInterval(function(){ 
                        window.location.replace(base_url + response.redirect);
                    }, 1000);
                }
            },
            error: function(){
                alert("Error Data!");
            }
        });
    });

</script>