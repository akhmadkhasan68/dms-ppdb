<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PPDB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/sweetalert2.min.css">
    <link href="<?php echo base_url(); ?>assets/admin/mainPublic.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/admin/scripts/jquary.min.js"></script>
    <link href="<?php echo base_url(); ?>assets/admin/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>

    <div class="row" id="view_hasil" style="display: block">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">#Status Pendaftaran</h5>
                    <br>
                    <label for="exampleEmail11"><b>Berdasarkan hasil peninjauan kami , maka kami menyatakan bahwa data siswa dengan daata dibawah ini</b> </label>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <br>
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
                                            <div class="col-3">
                                                Nama Siswa
                                            </div>
                                            <div class="col-9">
                                                <p id="nama"></p>
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 10px">
                                            <div class="col-3">
                                                NISN
                                            </div>
                                            <div class="col-9">
                                                <p id="txt_nisn"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <br>
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
    <script>
        $(document).ready(function() {
            var link = "<?php echo base_url() . $this->config->item('index_page'); ?>ppdb/ajax_cek_status_siswa/";
            var form_data = new FormData();
            form_data.append('nisn', "<?= $this->uri->segment(3) ?>");
            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
            $(".loader").fadeIn();
            ajaxShowData(link, "POST", form_data, function(response) {
                if (response.result) {
                    $('#view_hasil').show(1000);
                    $('#txt_nisn').html(response.data[0].nisn);
                    $('#nama').html(response.data[0].nama_siswa);
                    $('#nama_sekolah').html(response.data[0].nama_sekolah);
                    var status = response.data[0].status_pendaftaran;
                    var status_pendaftaran = status;            
                    if (status == "BELUM") {
                        $('#div_status_pendaftaran').addClass("alert alert-info");
                        status_pendaftaran = "BELUM DIVERIFIKASI";
                    } else if (status == "DITERIMA") {
                        $('#div_status_pendaftaran').addClass("alert alert-success");
                    } else {
                        $('#div_status_pendaftaran').addClass("alert alert-danger");
                    }

                    $('#status_pendaftaran').html(status_pendaftaran);
                    window.print();
                } else {
                    message("Mohon Maaf", "Nisn tidak di temukan", "error", "info", 1000);
                    $('#view_hasil').hide(1000);
                    window.location.href = "<?php echo base_url() . $this->config->item('index_page'); ?>ppdb/pengumuman";
                }
                $(".loader").fadeOut();
            });
        });
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/scripts/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/scripts/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/scripts/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/scripts/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ajaxFunction.js"></script>
</body>

</html>