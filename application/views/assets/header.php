<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["status"])) {
    header('Location: ' . base_url());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Material Dash</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/jvectormap/jquery-jvectormap.css">
    <!-- End plugin css for this page -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/demo/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome-free/css/all.css">

</head>

<body>
    <script src="<?= base_url() ?>assets/js/preloader.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script> -->
    <script src="<?= base_url()?>assets/datatable/jquery.min.js"></script>
    <script src="<?= base_url()?>assets/datatable/jquery-3.1.0.js"></script>
    <script src="<?= base_url()?>assets/datatable/DataTables-1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()?>assets/datatable/jquery.min.js"></script>