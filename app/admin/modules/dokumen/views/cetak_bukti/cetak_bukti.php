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
                    <h5 class="card-title">#Cetak Bukti Persetujuan Dokumen</h5>
                    <span>Nama: <span id="sender"></span></span>
                    <br>
                    <span>Nama File: <span id="file-send"></span></span>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Tanggal Disetujui</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
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
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '<?php echo site_url('dokumen/ajax_get_approval_data');?>',
                type: 'GET',
                dataType: 'JSON',
                data:{
                    id : '<?= $this->uri->segment(3) ?>',
                    <?php echo $this->security->get_csrf_token_name();?>: '<?php echo $this->security->get_csrf_hash();?>'
                },
                success: function(response){
                    $("#sender").html(response.data[0].sender);
                    $("#file-send").html(response.data[0].file);

                    var i;
                    var no = 1;
                    var html = '';
                    for(i = 0; i < response.data.length; i++)
                    {
                        html += `
                            <tr>
                                <td>`+ no++ +`</td>
                                <td>`+ response.data[i].admin +` (`+ response.data[i].level +`)</td>
                                <td>`;
                                    if(response.data[i].status == 'BELUM'){
                                        html += `<div class="badge badge-warning">Belum Disetujui</div>`;
                                    }else if(response.data[i].status == 'DITERIMA'){
                                        html += `<div class="badge badge-success">Disetujui</div>`;
                                    }else{
                                        html += `<div class="badge badge-danger">Ditolak</div>`;
                                    }
                                html += `</td>
                                <td>`;
                                    if(response.data[i].updated_at != null){
                                        html += response.data[i].updated_at;
                                    }else{
                                        html += `<div class="badge badge-warning">Belum Disetujui</div>`;
                                    }
                                html += `</td>
                            </tr>
                        `;
                    }

                    $("tbody").html(html);
                    window.print();
                },
                error: function(){
                    alert('Error data!');
                }
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