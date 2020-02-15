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
    <script src="<?php echo base_url(); ?>assets/ajaxFunction.js"></script>
    <link href="<?php echo base_url(); ?>assets/admin/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<style>
    .loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('<?php echo base_url(); ?>assets/loading.gif') 50% 50% no-repeat rgb(249, 249, 249);
        opacity: .8;
    }
</style>

<body>
    <div class="loader"></div>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header closed-sidebar">
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header closed-sidebar">
            <div class="app-header header-shadow">
                <div class="app-header__logo">
                    <div class="" style="margin-top: 6px">
                        <h5>PPDB</h5>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="app-header__content">
                    <div class="app-header-right">
                        <div class="header-btn-lg pr-0">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left  ml-3 header-user-info">
                                        <div class="widget-heading">
                                            <?php echo $name;?>
                                        </div>
                                        <div class="widget-subheading">
                                            PPDB
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-main">
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body" style="padding: 50px">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <center>
                                                    <img src="<?php echo base_url(); ?>uploads/config/<?php echo $logo;?>" style="max-height: 230px;margin-top:40px">
                                                    <div style="margin-top: 5px"></div>
                                                    <h3>Selamat Datang</h3>
                                                    <h3>Panitia Penerimaan Peserta Didik Baru</h3>
                                                    <h3><b><?php echo $name;?></b></h3>
                                                </center>
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="card widget-content">
                                                    <div class="widget-content-outer">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Login</div>
                                                            </div>
                                                        </div>

                                                        <div style="margin-top: 2px;">
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-12">
                                                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Username</label><input name="username" id="username" placeholder="" type="text" class="form-control"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-md-12">
                                                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Password</label><input name="password" id="password" placeholder="" type="password" class="form-control"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-md-12">
                                                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Login Sebagai</label>
                                                                        <select class="form-control" name="login_as" id="login_as">
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="text-align: right">
                                                                <input type="button" class="btn btn-primary btn-lg" value="Login" style="width:100%" onclick="login()">
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


        <!-- edit dokument -->


    </div>
    </div>
    </div>
    <?php include 'js/js.php'; ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/scripts/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/scripts/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/scripts/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/scripts/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".loader").fadeOut();
            
            //AJAX GET LEVEL
            $.ajax({
                url: '<?php echo site_url('login/ajax_get_level')?>',
                type: 'GET',
                dataType:'json',
                data: {
                    <?php echo $this->security->get_csrf_token_name();?>: '<?php echo $this->security->get_csrf_hash();?>'
                },
                beforeSend: function() {
                    $(".loader").show();
                },
                success: function(response){
                    var html = '';
                    var i;

                    for(i = 0; i < response.data.length; i++){
                        html += `
                            <option value='`+ response.data[i].id_level +`'>`+ response.data[i].name +`</option>
                        `;
                    }

                    $("#login_as").html(html);
                }
            }); 


        });
    </script>
</body>


</html>