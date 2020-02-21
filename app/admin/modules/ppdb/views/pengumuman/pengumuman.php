<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-volume2 icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>Halaman Pengumuman
                        <div class="page-title-subheading">Halaman ini di gunakan untuk melihat pengumuman terbaru dari website ini
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Pengumuman</h5>
                        <br>
                        <label for="exampleEmail11" class="text text-info"><b>Masukkan NISN untuk melihat status pendaftaran anda</b> </label>
                        <div class="" style="margin-top: 10px">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">NISN</label><input name="nisn" id="nisn" placeholder="" type="number" class="form-control"></div>
                                </div>
                            </div>
                            <div style="text-align: right">
                                <button class="btn btn-primary btn-lg" onclick="ajax_cek_siswa()">Cari Data Saya
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="view_hasil" style="display: none">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">#Status Pendaftaran</h5>
                        <br>
                        <label for="exampleEmail11"><b>Berdasarkan hasil peninjauan kami , maka kami menyatakan bahwa data siswa dengan daata dibawah ini</b> </label>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card widget-content">
                                    <div class="widget-content-outer">
                                        <div class="">
                                            <div class="widget-content-left">
                                                <div class="widget-heading" style="color:black">
                                                    <center>No.Pendaftaran:0014/PNT-PPDB/20</center>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <hr>
                                            <div class="row" style="padding: 10px">
                                                <div class="col-sm-3">
                                                    Nama Siswa
                                                </div>
                                                <div class="col-sm-9">
                                                    <p id="nama"></p>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 10px">
                                                <div class="col-sm-3">
                                                    NISN
                                                </div>
                                                <div class="col-sm-9">
                                                    <p id="txt_nisn"></p>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 10px;">
                                                <div class="col-sm-3">
                                                    Bukti Pendaftaran
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="display: none" id="nama_sekolah"></p>
                                                    <button id="cetak_bukti" class="btn btn-primary" onclick="cetak_bukti()">Cetak Bukti</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card widget-content">
                                    <div class="widget-content-outer">
                                        <div class="">
                                            <div class="widget-content-left">
                                                <div class="widget-heading" style="color:black">
                                                    <center>Status Pendaftaran</center>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <hr>
                                            <div class="row" style="padding: 10px">
                                                <div class="fade show" id="div_status_pendaftaran" role="alert" style="width: 100%;margin-top: 15px">
                                                    <center>
                                                        <h2>
                                                            <p id="status_pendaftaran"></p>
                                                        </h2>
                                                    </center>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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