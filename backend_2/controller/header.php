<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="../../assets/images/favicon_1.ico">

        <title>Smart Kampung for Smart City</title>

        <!-- DataTables -->
        <link href="../../assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>

        <!-- Plugins css-->
        <link href="../../assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="../../assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" />
        <link href="../../assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="../../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="../../assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="../../assets/plugins/morris/morris.css">
        <link rel="stylesheet" href="../../assets/plugins/custombox/css/custombox.css">

        <!--Upload CSS -->
        <link href="../../assets/plugins/dropzone/dropzone.css" rel="stylesheet" type="text/css" />

        <!-- Basic -->
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/modernizr.min.js"></script>

        <!-- Highchart -->
        <script src="code/highcharts.js"></script>
        <script src="code/modules/exporting.js"></script>

    </head>

    <?php
    // $server = "mysql.hostinger.co.id";
    // $username = "u573987905_admin";
    // $password = "Qwerty12345";
    // $database = "u573987905_smart";
    // $koneksi = mysqli_connect($server,$username,$password) or die("Koneksi gagal");
    // mysqli_select_db($koneksi, $database) or die("Database tidak bisa dibuka");

    $server = "mysql.hostinger.co.id";
    $username = "u573987905_admin";
    $password = "Pumi0xVNmnKp";
    $database = "u573987905_smart";
    $koneksi = mysqli_connect($server,$username,$password) or die("Koneksi gagal");
    mysqli_select_db($koneksi, $database) or die("Database tidak bisa dibuka");
    ?>

<?php
session_start();

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    //redirect ke halaman login
    header('Location: http://localhost/smartcity_backend/login.php');
    // header('Location: http://localhost/smartcity_backend/view/visualisasi/');
}
?>
