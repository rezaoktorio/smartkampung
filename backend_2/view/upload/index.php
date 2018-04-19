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
                                <h4 class="page-title">Upload Data</h4>
                                <p class="text-muted page-title-alt">Selamat Datang Pada Menu Upload Data</p>
                            </div>
                        </div>
                        
                        <?php include('../../model/upload/fill.php'); ?>

                    </div> <!-- container -->
                </div> <!-- content -->

                <?php require_once('../../controller/footer.php'); ?>

            </div>

        </div>
        <!-- END wrapper -->

        <?php require_once('../../controller/bottom.php'); ?>

    </body>
</html>