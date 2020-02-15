<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-user icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>Data Pengguna
                        <div class="page-title-subheading">Semua Data pengguna yang telah ditambahkan akan tercatat di sisni
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Pengguna</h5>
                        <div style="text-align: right">
                            <button class="mb-2 mr-2 btn btn-primary btn-lg " data-toggle="modal" data-target="#add_pengguna">Tambah Pengguna</button>
                        </div>
                        <table class="mb-0 table table-striped" id="table_dokumen" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Status User</th>
                                    <th style="text-align: center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Adi</td>
                                    <td>Adi</td>
                                    <td>kepala Sekolah</td>
                                    <td><div class="badge badge-danger">User Nonaktif</div></td>
                                    <td style="text-align: center">
                                        <label><button class="mb-2 mr-2 btn btn-info" data-toggle="modal" data-target="#edit_pengguna">Edit</button></label>
                                        <label><button class="mb-2 mr-2 btn btn-danger" onclick="remove()">Hapus</button></label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php include 'modal/modal.php'; ?>
<?php include 'js/js.php'; ?>