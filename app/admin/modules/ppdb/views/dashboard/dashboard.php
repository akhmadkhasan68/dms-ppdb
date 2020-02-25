<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row" style=" display: block;
  margin-left: auto;
  margin-right: auto;">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body" style="padding: 50px">
                        <div class="row">
                            <div class="col-sm-12" style="text-align: center">
                                <img src="<?php echo base_url(); ?>uploads/config/<?php echo $config->logo; ?>" style="max-height: 230px;margin-top:40px">
                                <div style="margin-top: 5px"></div>
                                <h3>Selamat Datang</h3>
                                <h3>Calon Peserta Didik Baru</h3>
                                <h3><b><?php echo $config->name; ?></b></h3>
                                <br>
                                <div>
                                    <div class="col-md-6 " style=" display: block;
  margin-left: auto;
  margin-right: auto;">
                                        <a href="<?php echo base_url() . index_page(); ?>ppdb/pendaftaran"><button class="btn btn-primary btn-lg">Pendaftaran</button></a>
                                        <a href="<?php echo base_url() . index_page(); ?>ppdb/pengumuman"><button class="btn btn-primary btn-lg">Pengumuman</button></a>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-6 " style=" display: block;
  margin-left: auto;
  margin-right: auto;">
                                    <div class="card widget-content">
                                        <div class="widget-content-outer">
                                            <div class="col-sm-12">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Biodata Sekolah</div>
                                                </div>
                                            </div>

                                            <div style="margin-top: 2px;">
                                                <hr>
                                                <div class="row" style="padding: 10px">
                                                    <div class="col-sm-3">
                                                        Alamat
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <?php echo $config->address; ?>
                                                    </div>
                                                </div>
                                                <div class="row" style="padding: 10px">
                                                    <div class="col-sm-3">
                                                        Email
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <?php echo $config->email; ?>

                                                    </div>
                                                </div>
                                                <div class="row" style="padding: 10px">
                                                    <div class="col-sm-3">
                                                        No Telp
                                                    </div>
                                                    <div class="col-sm-9">
                                                        -
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
</div>
<?php include 'modal/modal.php'; ?>
<?php include 'js/js.php'; ?>