<?php require_once('../../controller/header.php'); ?>

    <body class="fixed-left">

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="chart/code/highcharts.js"></script>
        <script src="chart/code/modules/exporting.js"></script>
        <script src="chart/code/highcharts-more.js"></script>
        <script src="chart/code/modules/drilldown.js"></script>

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
                                <h4 class="page-title">Dashboard</h4>
                                <p class="text-muted page-title-alt">Selamat Datang Pada Menu Dashboard</p>
                            </div>
                        </div>
                        
                        <?php include('../../model/dashboard/fill.php'); ?>

                    </div> <!-- container -->
                </div> <!-- content -->

                <?php require_once('../../controller/footer.php'); ?>

            </div>

        </div>
        <!-- END wrapper -->

        <?php require_once('../../controller/bottom.php'); ?>

    </body>
</html>