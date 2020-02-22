<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-add-user icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>Data Siswa
                        <div class="page-title-subheading">Semua Siswa yang teleah mendaftar akan tercatat di sini
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Siswa</h5>

                        <button data-toggle="modal" data-target="#modal_verifikasi" id="show-modal-verif-trigger" style="display:none;">Show modal</button>

                        <table class="mb-0 table table-striped" id="table_pendaftaran" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>NISN</th>
                                    <th>STATUS PENDAFTARAN</th>
                                    <th style="text-align: center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Adi</td>
                                    <td>1231232112</td>
                                    <td style="text-align: center">
                                        <label><button class="mb-2 mr-2 btn btn-primary" onclick="open_detail()">Detail</button></label>
                                        <label><button class="mb-2 mr-2 btn btn-info" data-toggle="modal" data-target="#modal_verifikasi">Verifikasi</button></label>
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