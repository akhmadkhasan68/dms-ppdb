<div class="modal fade bd-example-modal-lg" id="edit_pengguna" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-user">
                <div class="modal-body">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" id="csrf_edit" value="<?php echo $this->security->get_csrf_hash();?>">
                    <input type="hidden" id="id-admin" name="id">
                    <div class="col-md-12 mb-12">
                        <label for="validationCustom01">Nama</label>
                        <input type="text" class="form-control" id="name-edit" name="name" placeholder="">
                    </div>

                    <div class="col-md-12 mb-12" style="margin-top: 5px">
                        <label for="validationCustom01">Username</label>
                        <input type="text" class="form-control" id="username-edit" name="username" placeholder="">
                    </div>

                    <div class="col-md-12 mb-12" style="margin-top: 5px">
                        <label for="validationCustom01">Password</label>
                        <input type="password" class="form-control" id="password-edit" name="password" placeholder="Kosongi jika tidak ingin mengganti password">
                    </div>


                    <div class="col-md-12 mb-12" style="margin-top: 5px">
                        <label for="validationCustom01">Level</label>
                        <select class="form-control" id="level-edit" name="id_level">
                            <?php
                                foreach($get_level as $level)
                                {
                            ?>
                                <option value="<?php echo $level->id_level;?>"><?php echo $level->name;?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="add_pengguna" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add-user">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" id="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <div class="modal-body">
                    <div class="col-md-12 mb-12">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="">
                    </div>

                    <div class="col-md-12 mb-12" style="margin-top: 5px">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="">
                    </div>

                    <div class="col-md-12 mb-12" style="margin-top: 5px">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="">
                    </div>


                    <div class="col-md-12 mb-12" style="margin-top: 5px">
                        <label for="level">Level</label>
                        <select name="id_level" id="id_level" class="form-control">                   
                            <?php
                                foreach($get_level as $level)
                                {
                            ?>
                                <option value="<?php echo $level->id_level;?>"><?php echo $level->name?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>