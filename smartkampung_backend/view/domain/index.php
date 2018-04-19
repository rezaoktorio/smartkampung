<?php require_once('../../controller/header.php'); ?>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

        <?php require_once('../../controller/sidebar.php'); ?>

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
                                <div class="btn-group pull-right m-t-15">
                                    <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Aksi <span class="m-l-5"><i class=" ti-panel"></i></span></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#"><i class=" ti-printer"></i> Cetak</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><i class=" ti-import"></i> Unduh</a></li>
                                    </ul>
                                </div>
                                <h4 class="page-title">Data Domain</h4>
                                <p class="text-muted page-title-alt">Selamat Datang Pada Menu Data Domain</p>
                            </div>
                        </div>
                        
                        <?php include('../../model/domain/fill.php'); ?>

                    </div> <!-- container -->
                </div> <!-- content -->

                <?php require_once('../../controller/footer.php'); ?>

            </div>

        </div>
        <!-- END wrapper -->

        <?php require_once('../../controller/bottom.php'); ?>

    </body>
</html>