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
    <title>Perpustakaan</title>
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

    <!-- datatable -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/datatable/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- sweetalert -->
    <script src="<?= base_url() ?>assets/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>assets/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/sweetalert2.min.css">
    <style>
        body {
            font-family: Arial;
        }

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ffffff;
            background-color: #ccc;
        }

        /* Style the buttons inside the tab */
        .tab button {
            width: 50%;
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            width: 50%;
            background-color: #2bb5ff;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <script src="<?= base_url() ?>assets/js/preloader.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script> -->