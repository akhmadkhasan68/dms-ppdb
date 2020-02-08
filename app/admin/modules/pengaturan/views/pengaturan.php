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
            <div class="col-lg-8">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Profil</h5>
                        <hr>
                        <div>
                            <div style="margin-top: 4px">
                                <label for="validationCustom01">Nama</label>
                                <input type="text" class="form-control" id="edit_nama" placeholder="">
                            </div>
                            <div style="margin-top: 4px">
                                <label for="validationCustom01">Username</label>
                                <input type="text" class="form-control" id="edit_username" placeholder="">
                            </div>
                            <div style="margin-top: 4px">
                                <label for="validationCustom01">Password</label>
                                <input type="password" class="form-control" id="edit_password" placeholder="">
                            </div>
                        </div>
                        <div style="text-align:right;margin-top: 10px">
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Pengaturan PPDB</h5>
                        <hr>
                        <div>
                            <div style="margin-top: 4px">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Status</td>
                                        <td>Dibuka</td>
                                    </tr>
                                </table>
                            </div>
                            <div style="margin-top: 10px">
                                <label for="validationCustom01">Status PPDB</label>
                                <select class="form-control" id="persetujuan">
                                    <option selected>Buka</option>
                                    <option>Tutup</option>
                                    <option>Di Tolak</option>
                                </select>
                            </div>

                        </div>
                        <div style="text-align:right;margin-top: 15px">
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php include 'js/js.php'; ?>