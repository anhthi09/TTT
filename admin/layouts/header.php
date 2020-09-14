<?php ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Product List | jeweler - Material Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="/DoAnWeb2020/public/admin/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/css/owl.carousel.css">
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/css/owl.theme.css">
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="/DoAnWeb2020/public/admin/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="/DoAnWeb2020/public/admin/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- validation -->
    <script src="/DoAnWeb2020/public/admin/js/vendor/jquery-1.11.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.js"></script>

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="/DoAnWeb2020/admin/modules"><img class="main-logo" src="/DoAnWeb2020/public/admin/img/logo/logosongphat.png" alt="poto" /></a>
                <strong><img src="#" alt="" /></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="has-arrow" href="/DoAnWeb2020/admin/modules">
                                <i class="fa big-icon fa-home icon-wrap"></i>
                                <span class="mini-click-non">Trang Chủ</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.1" href="/DoAnWeb2020/admin/modules/admins"><i class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Quản Lý Admin</span></a></li>
                                <li><a title="Dashboard v.2" href="/DoAnWeb2020/admin/modules/category"><i class="fa fa-circle-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Quản Lý Danh Mục</span></a></li>
                                <li><a title="Dashboard v.4" href="/DoAnWeb2020/admin/modules/type"><i class="fa fa-circle-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Quản lý Loại Sản Phẩm</span></a></li>
                                <li><a title="Dashboard v.3" href="/DoAnWeb2020/admin/modules/product"><i class="fa fa-cube sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Quản Lý Sản Phẩm</span></a></li>
                                <li><a title="Dashboard v.1" href="/DoAnWeb2020/admin/modules/transaction"><i class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Quản Lý Đơn Hàng</span></a></li>
                                <li><a title="Product List" href="/DoAnWeb2020/admin/modules/users"><i class="fa fa-female sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Quản Lý Người Dùng</span></a></li>

                            </ul>
                        </li>



                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="/DoAnWeb2020/public/admin/img/logo/logosongphat.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="fa fa-bars"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="#" class="nav-link"></a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link"></a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link"></a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <!-- <li class="nav-item dropdown">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-envelope-o adminpro-chat-pro" aria-hidden="true"></i><span class="indicator-ms"></span></a>
                                                    <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                        <div class="message-single-top">
                                                            <h1>Tin Nhắn</h1>
                                                        </div>
                                                        <ul class="message-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="/DoAnWeb2020/public/admin/img/contact/1.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="/DoAnWeb2020/public/admin/img/contact/4.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>


                                                        </ul>
                                                        <div class="message-view">
                                                            <a href="#">Xem tất cả tin nhắn</a>
                                                        </div>
                                                    </div>
                                                </li> -->
                                                <!-- <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-bell-o" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Thông Báo</h1>
                                                        </div>
                                                        <ul class="notification-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-cloud adminpro-cloud-computing-down" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>


                                                        </ul>
                                                        <div class="notification-view">
                                                            <a href="#">Xem tất cả thông báo</a>
                                                        </div>
                                                    </div>
                                                </li> -->


                                                <li class="nav-item">
                                                    <?php if (isset($_SESSION['namead'])) :   ?>
                                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i>
                                                            <span class="admin-name"><?php echo $_SESSION['namead'] ?> </span>
                                                            <i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>
                                                        </a>
                                                        <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                            <li><a href="/DoAnWeb2020/public/index.php"><span class="fa fa-home author-log-ic"></span>Quay về trang mua sắm</a>
                                                            </li>

                                                            <li><a href="/DoAnWeb2020/admin/modules/admins/thoat.php"><span class="fa fa-lock author-log-ic"></span>Đăng Xuất</a>
                                                            </li>
                                                        </ul>
                                                </li>
                                            <?php else : ?>
                                                <a href="/DoAnWeb2020/admin/modules/admins/login.php" role="button" aria-expanded="false" class="nav-link ">
                                                    <i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i>
                                                    <span class="admin-name"> </span>
                                                    <i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>
                                                </a>
                                            <?php endif ?>


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Trang Chủ <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="/DoAnWeb2020/admin/modules/admins">Quản Lý Admin</a></li>
                                                <li><a href="/DoAnWeb2020/admin/modules/category">Quản Lý Danh Mục</a></li>
                                                <li><a href="/DoAnWeb2020/admin/modules/type">Quản Lý Loại Sản Phẩm</a></li>
                                                <li><a href="/DoAnWeb2020/admin/modules/product">Quản Lý Sản Phẩm</a></li>
                                                <li><a href="/DoAnWeb2020/admin/modules/transaction">Quản Lý Đơn Hàng</a></li>
                                                <li><a href="/DoAnWeb2020/admin/modules/users">Quản Lý Người Dùng</a></li>

                                            </ul>
                                        </li>
                                    </ul>


                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">
                                            <form class="form-inline " id="reseach" action="index.php" method="get">
                                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                                                <button class="btn btn-primary my-2 my-sm-0" type="submit" name="ok" value="search">Search</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <!-- <ul class="breadcome-menu">
                                            <li><a href="#">Trang Chủ</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Danh Mục</span>
                                            </li>
                                        </ul> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</html>