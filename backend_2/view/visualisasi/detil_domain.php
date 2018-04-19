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
    $server = "mysql.hostinger.co.id";
    $username = 'u156760488_admin';
    $password = "gmdw66ZmXBMY";
    $database = 'u156760488_smart';
    mysql_connect($server,$username,$password) or die("Koneksi gagal");
    mysql_select_db($database) or die("Database tidak bisa dibuka"); 
?>

    <body class="fixed-left">

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="chart/code/highcharts.js"></script>
        <script src="chart/code/modules/exporting.js"></script>
        <script src="chart/code/highcharts-more.js"></script>
        <script src="chart/code/modules/drilldown.js"></script>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="http://smartcity.webplussolution.com/smartcity_backend/view/visualisasi/" class="logo"><i class="md md-album icon-c-logo"></i><span>Smart<i class="md md-album"></i>Kampung</span></a>
                        <!-- Image Logo here -->
                        <!--<a href="index.html" class="logo">-->
                            <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
                            <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
                        <!--</a>-->
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="http://smartcity.webplussolution.com/smartcity/" target="_" class="right-bar-toggle waves-effect waves-light"><i class="ti-layout"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="http://smartcity.webplussolution.com/smartcity_backend/view/dashboard/" target="_" class="right-bar-toggle waves-effect waves-light"><i class="ti-home"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <div class="col-sm-12" style="margin-bottom:1%">
                            <center>
                                <img src="../../assets/images/cs.png" alt="user-img" style="width:60%"><br>
                            </center><br><hr>
                        </div>
                        <ul>
                            <li class="text-muted menu-title">Pilih Kampung</li>
                        </ul>
                        <form name="cari" action="detil.php" method="post">
                            <div class="col-sm-12 clearfix">
                                <select class="selectpicker" name="kampung" data-live-search="true" data-style="btn-white" tabindex="-98">
                                    <?php
                                      $query = mysql_query("SELECT DISTINCT(kampung.namakampung) AS nama, rekapitulasi.idkampung AS id FROM rekapitulasi JOIN kampung ON rekapitulasi.idkampung = kampung.idkampung");
                                      $no = 1;
                                      while ($data = mysql_fetch_array($query)) {
                                      ?>
                                          
                                          <option value="<?php echo $data['id'];?>" ><?php echo $data['nama']; ?></option>
                                          
                                      <?php 
                                          $no++;
                                      }  
                                      ?>
                                </select>
                                <br><br><button type="submit" value="Upload" name="submit" class="btn btn-default waves-effect waves-light">
                                   <span class="btn-label"><i class="fa fa-search"></i>
                                   </span>Cari
                               </button>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <!--<div class="btn-group pull-right m-t-15">
                                    <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Menu <span class="m-l-5"><i class=" ti-view-list-alt "></i></span></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="../../view/visualisasi/"><i class=" ti-home"></i> Beranda</a></li>
                                        <li><a href="../../view/mengapa/"><i class=" ti-help-alt"></i> Mengapa Smart Kampung?</a></li>
                                        <li><a href="../../view/model/"><i class="ti-book"></i> Model Smart Kampung</a></li>
                                        <li><a href="../../view/penilaian/"><i class=" ti-write"></i> Penilaian Smart Kampung</a></li>
                                        <li><a href="../../view/profil/"><i class=" ti-map-alt"></i> Profil Kampung</a></li>
                                        <li><a href="../../view/tim/"><i class=" ti-user"></i> Tim Penyusun</a></li>
                                    </ul>
                                </div>-->
                                <h4 class="page-title">Visualisasi Informasi</h4>
                                <p class="text-muted page-title-alt">Selamat Datang Pada Menu Visualisasi Informasi</p>
                            </div>
                        </div>
                        
                        <?php include('../../model/visualisasi_detil_domain/fill.php'); ?>

                    </div> <!-- container -->
                </div> <!-- content -->

                <?php require_once('../../controller/footer.php'); ?>

            </div>

        </div>
        <!-- END wrapper -->

        <?php require_once('../../controller/bottom.php'); ?>

    </body>
</html>