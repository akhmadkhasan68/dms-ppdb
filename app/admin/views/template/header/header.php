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
    <link href="<?php echo base_url(); ?>assets/admin/main.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/admin/scripts/jquary.min.js"></script>
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