<?php
include 'MainDashboard.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="https://coderthemes.com/minton/layouts/assets/images/favicon.ico">

    <?php foreach ($linksCss as $value) : ?>
        <link href="<?= $value ?>" rel="stylesheet" />
    <?php endforeach; ?>
</head>

<!-- body start -->

<body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "dark", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom bg-dark">
            <div class="container-fluid">

                <ul class="list-unstyled topnav-menu float-end mb-0">

                    <li class="dropdown d-none d-lg-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                            <i class="fas fa-expand"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="far fa-bell"></i>
                            <span class="badge bg-danger rounded-circle noti-icon-badge">5</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    <span class="float-end">
                                    </span>Notificaciones
                                </h5>
                            </div>

                            <div class="noti-scroll" data-simplebar>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-soft-primary text-primary">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Doug Dukes commented on Admin Dashboard
                                        <small class="text-muted">1 min ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="../assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" />
                                    </div>
                                    <p class="notify-details">Mario Drummond</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Hi, How are you? What about our next meeting</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="../assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" />
                                    </div>
                                    <p class="notify-details">Karen Robinson</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Wow ! this admin looks good and awesome design</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-soft-warning text-warning">
                                        <i class="mdi mdi-account-plus"></i>
                                    </div>
                                    <p class="notify-details">New user registered.
                                        <small class="text-muted">5 hours ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">4 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-secondary">
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked
                                        <b>Admin</b>
                                        <small class="text-muted">13 days ago</small>
                                    </p>
                                </a>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                Ver todo
                                <i class="fe-arrow-right"></i>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?= $photoUser ?>" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ms-1">
                                <?= $userName ?> <i class="fas fa-angle-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Bienvenido !</h6>
                            </div>

                            <?php foreach ($menuSession as $ms) : ?>

                                <a href="<?= $ms['url'] ?>" class="dropdown-item notify-item">
                                    <i class="<?= $ms['icon'] ?>"></i>
                                    <span><?= $ms['text'] ?></span>
                                </a>

                            <?php endforeach; ?>

                        </div>
                    </li>

                </ul>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fas fa-bars"></i>
                        </button>
                    </li>

                    <li>
                        <!-- Mobile menu toggle (Horizontal Layout)-->
                        <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>
                <!-- <div class="clearfix"></div> -->
            </div>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu bg-dark">

            <!-- LOGO -->
            <div class="logo-box">
                <a href="<?= $mainLink ?>" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <span class="logo-lg-text-light"><?= $titleShort ?></span>
                    </span>
                    <span class="logo-lg">
                        <span class="logo-lg-text-light"><?= $title ?></span>
                    </span>
                </a>
            </div>

            <div class="h-100 bg-dark" data-simplebar>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">

                        <?php foreach ($linksSidebar as $key => $value) : ?>

                            <?php if (isset($value['header'])) : ?>
                                <li class="menu-title"><?php echo $value['header']; ?></li>
                            <?php endif; ?>

                            <?php if (isset($value['mode']) && $value['mode'] == 'menu') : ?>
                                <li>
                                    <a href="<?php echo $value['url']; ?>">
                                        <i class="<?php echo $value['icon']; ?>"></i>
                                        <span> <?php echo $value['text']; ?> </span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if (isset($value['mode']) && $value['mode'] == 'submenu') : ?>

                                <li>
                                    <a href="#sidebar<?php echo $value['text']; ?>" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebar<?php echo $value['text']; ?>">
                                        <i class="<?php echo $value['icon']; ?>"></i>
                                        <span> <?php echo $value['text']; ?> </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebar<?php echo $value['text']; ?>">
                                        <ul class="nav-second-level">
                                            <?php foreach ($value['submenu'] as $subValue) : ?>
                                                <li>
                                                    <a href="<?php echo $subValue['url']; ?>"><?php echo $subValue['text']; ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php endif; ?>

                        <?php endforeach; ?>

                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">