<!DOCTYPE html>
<html lang="en">

<head>

    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- title -->
    <title>Naturleón</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url("assets/img/logo_naturleon.png") ?>">

    <!-- css -->
    <link href="<?= base_url("assets/bookingcenter/css/bootstrap.min.css") ?>" rel="stylesheet" />
    <link href="<?= base_url("assets/bookingcenter/css/fontawesome.min.css") ?>" rel="stylesheet" />
    <link href="<?= base_url("assets/bookingcenter/css/themify-icons.css") ?>" rel="stylesheet" />
    <link href="<?= base_url("assets/bookingcenter/css/icofont.min.css") ?>" rel="stylesheet" />
    <link href="<?= base_url("assets/bookingcenter/css/flaticon.css") ?>" rel="stylesheet" />
    <link href="<?= base_url("assets/bookingcenter/css/magnific-popup.css") ?>" rel="stylesheet" />
    <link href="<?= base_url("assets/bookingcenter/css/owl.carousel.min.css") ?>" rel="stylesheet" />
    <link href="<?= base_url("assets/bookingcenter/css/owl.theme.default.min.css") ?>" rel="stylesheet" />
    <link href="<?= base_url("assets/bookingcenter/css/nice-select.min.css") ?>" rel="stylesheet" />
    <link href="<?= base_url("assets/bookingcenter/css/jquery-ui.min.css") ?>" rel="stylesheet" />
    <link href="<?= base_url("assets/bookingcenter/css/animate.min.css") ?>" rel="stylesheet" />
    <link href="<?= base_url("assets/bookingcenter/css/style.css") ?>" rel="stylesheet">

    <link href="<?= base_url('assets/sweetalert/sweetalert2.css'); ?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

</head>

<body>
    <!-- preloader -->
    <div class="preloader">
        <div class="loader">
            <div class="loader-box-1"></div>
            <div class="loader-box-2"></div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- header area -->
    <header class="home-3 header">

        <!-- top-header -->
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="top-header-left">
                            <div class="top-contact-info">
                                <ul>
                                    <li><a href="tel:+524776373250"><i class="fas fa-phone"></i>+52 477 637 3250</a></li>
                                    <li><a href="mailto:atencionaagencias@naturleon.com"><i class="fas fa-envelope"></i>Atención</a></li>
                                </ul>
                            </div>
                            <div class="top-social">
                                <a href="https://www.facebook.com/Naturleon/"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/naturleon_oficial"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="top-header-right">
                            <div class="account text-white">
                                ¡Hola, <?= $usuario['nombre_usuario']; ?>! | 
                                <a class="ml-4" href="<?= base_url('Dashboard/LogOut/'); ?>"> <i class="fas fa-sign-out-alt"></i>Cerrar Sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- main nav -->
        <div class="main-navigation">
            <nav class="navbar navbar-expand-lg">
                <div class="container g-0">
                    <a class="navbar-brand" href="<?= base_url("Booking/"); ?>">
                        <img src="<?= base_url("assets/img/logo-naturleon-blanco.svg");?>" class="logo-display" alt="thumb">
                        <img src="<?= base_url("assets/img/logo-naturleon.svg");?>" class="logo-scrolled" alt="thumb">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="far fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="main_nav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="<?= base_url("Booking/"); ?>">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url("Booking/Agencia"); ?>">Mi Agencia</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url("Booking/Reservaciones"); ?>">Reservaciones</a></li>
                        </ul>
                        <?php if($usuario['tipo_usuario'] == "admin"){ ?>
                        <div class="header-btn">
                            <a href="<?= base_url("Dashboard/"); ?>" class="theme-btn">VER DASHBOARD<i class="fas fa-arrow-right"></i></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- header area end -->