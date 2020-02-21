<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-settings icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>Pengataran
                        <div class="page-title-subheading">Pengaturan akun dan website ppdb
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-<?php if($this->session->userdata('id_level') == 1){echo "8";}else{echo "12";}?>">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Profil</h5>
                        <hr>
                        <form id="formEdit">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            <input type="hidden" name="id" value="<?php echo $userdata->id?>">
                            <div>
                                <div style="margin-top: 4px">
                                    <label for="validationCustom01">Nama</label>
                                    <input type="text" class="form-control" name="name" id="edit_nama" placeholder="" value="<?php echo $userdata->name;?>">
                                </div>
                                <div style="margin-top: 4px">
                                    <label for="validationCustom01">Username</label>
                                    <input type="text" class="form-control" name="username" id="edit_username" placeholder="" value="<?php echo $userdata->username;?>">
                                </div>
                                <div id="edit-password" style="display:none;">
                                    <div style="margin-top: 4px">
                                        <label for="validationCustom01">Password Lama</label>
                                        <input type="password" class="form-control" name="old_password" id="edit_old_password" placeholder="">
                                    </div>
                                    <div style="margin-top: 4px">
                                        <label for="validationCustom01">Password Baru</label>
                                        <input type="password" class="form-control" name="new_password" id="edit_new_password" placeholder="">
                                    </div>
                                </div>
                                <br>
                                <input type="checkbox" id="edit-password-trigger"> Edit Password?
                            </div>
                            <div style="text-align:right;margin-top: 10px">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php if($this->session->userdata('id_level') == 1){?>
            <div class="col-lg-4">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Pengaturan PPDB</h5>
                        <hr>
                        <div style="margin-top: 4px">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <?php
                                            if($config->ppdb_status != 1)
                                            {
                                        ?>
                                            <div class="badge badge-warning">DITUTUP</div>
                                        <?php
                                            }else{
                                        ?>
                                            <div class="badge badge-success">DIBUKA</div>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <form id="formPpdb">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            <div style="margin-top: 10px">
                                <label for="">Status PPDB</label>
                                <select class="form-control" id="status-ppdb" name="ppdb_status">
                                    <option value='1' <?php if($config->ppdb_status == 1){echo "selected";}?>>Buka</option>
                                    <option value='0' <?php if($config->ppdb_status == 0){echo "selected";}?>>Tutup</option>                                    
                                </select>
                            </div>
                            <div style="text-align:right;margin-top: 15px">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>
</div>
<?php include 'js/js.php'; ?>