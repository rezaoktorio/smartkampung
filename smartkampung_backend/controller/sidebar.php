<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="../../view/dashboard/" class="logo"><i class="md md-album icon-c-logo"></i><span>Smart<i class="md md-album"></i>Kampung</span></a>
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
                <div class="pull-left">
                    <button class="button-menu-mobile open-left waves-effect waves-light">
                        <i class="md md-menu"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>

                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="hidden-xs">
                        <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                    </li>
                    <li class="hidden-xs">
                        <a href="http://localhost/smartcity/" target="_" class="right-bar-toggle waves-effect waves-light"><i class="ti-layout"></i></a>
                    </li>
                    <li class="dropdown top-menu-item-xs">
                        <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="../../assets/images/users/avatar.png" alt="user-img" class="img-circle"> </a>
                        <ul class="dropdown-menu">
                            <?php if (is_null($_SESSION['username'])) {
                                echo "<li><a href='../../login.php'><i class='ti-lock m-r-10 text-custom'></i> Login</a></li>";
                                echo "<li class='divider'></li>";
                                break;
                            } else {
                                echo "&nbsp;";
                            }
                            ?>
                            <li><a href="../../logout.php"><i class="ti-power-off m-r-10 text-danger"></i> Keluar</a></li>
                        </ul>
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
            <ul>

            	<li class="text-muted menu-title">Navigasi</li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class=" ti-home"></i> <span> Beranda</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="../../view/dashboard/index.php"><i class=" ti-bar-chart"></i> <span>Dashboard</span></a></li>
                        <li><a href="../../view/visualisasi/" target="_"><i class=" ti-blackboard"></i> <span>Visualisasi</span></a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="../../view/upload/" class="waves-effect"><i class=" ti-pencil-alt"></i> <span> Upload Data</span></a>
                </li>

                <li class="has_sub">
                    <a href="../../view/pertanyaan/" class="waves-effect"><i class=" ti-agenda"></i> <span> Kuesioner </span></a>
                </li>

                <li class="has_sub">
                    <a href="../../view/admin/" class="waves-effect"><i class=" ti-user"></i> <span> Administrator </span></a>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->
