<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Naturleón</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="<?= base_url("assets/img/logo_naturleon.png");?>" />

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/extranet/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/extranet/css/sb-admin-2.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/extranet/css/style.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/sweetalert/sweetalert2.css'); ?>" rel="stylesheet">

    <link href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css" rel="stylesheet">
    
    <link href="https://cdn.datatables.net/columncontrol/1.0.4/css/columnControl.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.dataTables.min.css"/>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.dataTables.min.css"/>
    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Dashboard/');?>">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url("assets/img/naturlogo.png"); ?>">
                </div>
                <div class="sidebar-brand-text mx-3">NATURLEÓN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('Dashboard/');?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <?php if($usuario['tipo_usuario'] == 'hotel'): ?>
            <?php 
                $fechaHoy = date('Y-m-d'); 
                $fechaFinal = date('Y-m-d', strtotime('+31 days')); 
            ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('ExtHoteles/Administrar'); ?>?fechainicial=<?= $fechaHoy ?>&fechafinal=<?= $fechaFinal ?>">
                    <i class="fas fa-fw fa-hotel"></i>
                    <span>Mi Hotel</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if($usuario['tipo_usuario'] == 'admin'): ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                BOOKING CENTER
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Booking/');?>">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Reservar</span>
                </a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                EXTRANET
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('ExtReservaciones/');?>">
                    <i class="fas fa-fw fa-bookmark"></i>
                    <span>Reservaciones</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagos"
                    aria-expanded="true" aria-controls="collapsePagos">
                    <i class="fas fa-fw fa-file-invoice-dollar"></i>
                    <span>Pagos</span>
                </a>
                <div id="collapsePagos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item collapsed" href="#" data-toggle="collapse" data-target="#collapseProveedores"
                            aria-expanded="true" aria-controls="collapseProveedores">
                            <span>Proveedores</span> <i class="fas fa-angle-down"></i>
                        </a>
                        <div id="collapseProveedores" class="collapse" aria-labelledby="headingTwo" data-parent="#collapsePagos">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="<?= base_url("ExtPagos/Proveedores/"); ?>">Pagar a Proveedores</a>
                                <a class="collapse-item" href="<?= base_url("ExtPagos/HistorialProveedores/"); ?>">Historial</a>
                            </div>
                        </div>
                        <a class="collapse-item collapsed" href="#" data-toggle="collapse" data-target="#collapseAgencias"
                            aria-expanded="true" aria-controls="collapseAgencias">
                            <span>Agencias</span> <i class="fas fa-angle-down"></i>
                        </a>
                        <div id="collapseAgencias" class="collapse" aria-labelledby="headingTwo" data-parent="#collapsePagos">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="<?= base_url("ExtPagos/Agencias/"); ?>">Pagar a Agencias</a>
                                <a class="collapse-item" href="<?= base_url("ExtPagos/HistorialAgencias/"); ?>">Historial</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCobros"
                    aria-expanded="true" aria-controls="collapseCobros">
                    <i class="fas fa-fw fa-file-invoice-dollar"></i>
                    <span>Cobros</span>
                </a>
                <div id="collapseCobros" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url("ExtCobros/"); ?>">Cobros</a>
                        <a class="collapse-item" href="<?= base_url("ExtCobros/CronosPay/"); ?>">CronosPay</a>
                        <a class="collapse-item" href="<?= base_url("ExtCobros/CronosPayLink/"); ?>">Link de Pago</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdministrar"
                    aria-expanded="true" aria-controls="collapseAdministrar">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Administrar</span>
                </a>
                <div id="collapseAdministrar" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url("ExtAgencias/"); ?>">Agencias</a>
                        <a class="collapse-item" href="<?= base_url("ExtDestinos/"); ?>">Destinos</a>
                        <a class="collapse-item" href="<?= base_url("ExtHoteles/"); ?>">Hoteles</a>
                        <a class="collapse-item collapsed" href="#" data-toggle="collapse" data-target="#collapseNaturcharter"
                            aria-expanded="true" aria-controls="collapseNaturcharter">
                            <span>Naturcharter</span> <i class="fas fa-angle-down"></i>
                        </a>
                        <div id="collapseNaturcharter" class="collapse" aria-labelledby="headingTwo" data-parent="#collapseAdministrar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="<?= base_url("ExtNaturcharter/Abordaje/"); ?>">Abordaje</a>
                                <a class="collapse-item" href="<?= base_url("ExtNaturcharter/"); ?>">Naturcharter</a>
                                <a class="collapse-item" href="<?= base_url("ExtNaturcharter/Reportes/"); ?>">Reportes</a>
                                <a class="collapse-item" href="<?= base_url("ExtNaturcharter/Pendientes/"); ?>">Pendientes</a>
                                <a class="collapse-item" href="<?= base_url("ExtNaturcharter/Salidas/"); ?>">Salidas</a>
                            </div>
                        </div>
                        <a class="collapse-item collapsed" href="#" data-toggle="collapse" data-target="#collapseAereo"
                            aria-expanded="true" aria-controls="collapseAereo">
                            <span>Naturflight</span> <i class="fas fa-angle-down"></i>
                        </a>
                        <div id="collapseAereo" class="collapse" aria-labelledby="headingTwo" data-parent="#collapseAdministrar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="<?= base_url("ExtNaturflight/"); ?>">Tarifas</a>
                                <a class="collapse-item" href="<?= base_url("ExtNaturflight/Rutas"); ?>">Rutas</a>
                            </div>
                        </div>
                        <a class="collapse-item" href="<?= base_url("ExtTours/"); ?>">Tours</a>
                        <a class="collapse-item" href="<?= base_url("ExtUsuarios/"); ?>">Usuarios</a>
                        <!-- <a class="collapse-item collapsed" href="#" data-toggle="collapse" data-target="#collapseOtros"
                            aria-expanded="true" aria-controls="collapseOtros">
                            <span>Otros</span> <i class="fas fa-angle-down"></i>
                        </a>
                        <div id="collapseOtros" class="collapse" aria-labelledby="headingTwo" data-parent="#collapseAdministrar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="#">Tipo de Cambio</a>
                                <a class="collapse-item" href="#">Bitácora</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                CMS
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFront"
                    aria-expanded="true" aria-controls="collapseFront">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Frontpage</span>
                </a>
                <div id="collapseFront" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('CmsFrontpage/Slider/'); ?>">Slider</a>
                        <a class="collapse-item" href="<?= base_url('CmsFrontpage/Plazas/'); ?>">Plazas</a>
                        <a class="collapse-item" href="<?= base_url('CmsFrontpage/Nosotros/'); ?>">Nosotros</a>
                        <a class="collapse-item" href="<?= base_url('CmsFrontpage/Aviso/'); ?>">Aviso de Privacidad</a>
                    </div>
                </div>
            </li>

            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

               <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- <h4 class="text-center"><strong>NOMBRE AGENCIA</strong></h4> -->

                    <!-- <form class="d-none d-sm-inline-block form-inline ml-auto my-2 my-md-0 mw-100 navbar-search">
                        
                    </form> -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <form class="nav-link navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Localizador..."
                                        aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- <li class="nav-item">
                             <a class="nav-link" href="https:
                        </li> -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <?php $numnotis = 0;  ?>
                                <span class="badge badge-primary badge-counter"><?= $numnotis; ?>+</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notificaciones
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-info-circle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"></div>
                                        No cuentas con notificaciones
                                    </div>
                                </a>
                            </div>
                        </li> -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline small"><?= $usuario['nombre_usuario']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('assets/img/undraw_profile.svg'); ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-lg fa-fw mr-2"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

 