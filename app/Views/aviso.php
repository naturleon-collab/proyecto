<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Naturleón</title>

  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900,900i">
  <link rel="stylesheet" href="<?= base_url("assets/frontpage/css/bootstrap.css"); ?>">
  <link rel="stylesheet" href="<?= base_url("assets/frontpage/css/fonts.css"); ?>">
  <link rel="stylesheet" href="<?= base_url("assets/frontpage/css/style.css"); ?>">

  <link rel="shortcut icon" href="<?= base_url("assets/img/logo_naturleon.png");?>" />
</head>

<body>
    <!-- Page-->
    <div class="page text-center">
        <!-- Page Header-->
        <header class="page-header">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-light" data-sm-device-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="1px" data-xl-stick-up-offset="1px" data-xxl-stick-up-offset="1px" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static">
                <div class="rd-navbar-inner">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                    <!-- RD Navbar Toggle-->
                    <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                    <!-- RD Navbar Brand-->
                    <div class="rd-navbar-brand rd-navbar-brand-desktop"><a class="brand-name" href="<?= base_url(); ?>"><img width="148" height="30" src="<?= base_url("assets/img/naturleon_logo.png"); ?>" alt=""></a></div>
                    <!-- RD Navbar Brand-->
                    <div class="rd-navbar-brand rd-navbar-brand-mobile"><a class="brand-name" href="<?= base_url(); ?>"><img width="148" height="30" src="<?= base_url("assets/img/naturleon_logo.png"); ?>" alt=""></a></div>
                    </div>
                    <div class="rd-navbar-nav-wrap">
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                        <li><a href="<?= base_url(); ?>">Inicio</a></li>
                    </ul>
                    </div>
                </div>
                </nav>
            </div>
        </header>
      
        <section class="section parallax-container bg-black section-height-mac context-dark" data-parallax-img="<?= base_url($banner[0]['archivo_aviso']); ?>">
            <div class="parallax-content">
            <div class="bg-overlay-darker">
                <div class="container section-34 section-md-100 section-lg-top-170 section-lg-bottom-165">
                <h1 class="d-none d-lg-inline-block"><?= $banner[0]['titulo_aviso']; ?></h1>
                <h6 class="font-italic"><?= $banner[0]['texto_aviso']; ?></h6>
                </div>
            </div>
            </div>
        </section>

        <!-- About Us-->
        <?php if($avisos > 0){ ?>
        <section class="section-80 bg-wild-wand text-left box-privacy">
            <div class="container">
                <!-- Box-->
                <div class="box bg-default d-block text-silver-chalice text-small inset-xl-left-60 inset-xl-right-60">
                    <?php foreach($avisos as $x){ ?>
                    <h4 class="text-ubold"><?= nl2br($x['titulo_aviso']); ?></h4>
                    <p class="text-justify"><?= nl2br($x['texto_aviso']); ?></p>
                    <?php } ?>
                </div>
            </div>
        </section>
        <?php } ?>

        <!-- Page Footer-->
        <footer class="page-footer footer-default section-top-80 section-bottom-34 section-lg-bottom-15 text-md-left">
            <div class="container">
                <div class="row justify-content-sm-center">
                <div class="col-md-8 col-lg-12">
                    <div class="row row-40 justify-content-sm-center">
                    <div class="col-md-6 col-lg-3 col-xl-4 order-lg-1"><a class="brand-logo" href="<?= base_url(); ?>"><img width="148" height="30" src="<?= base_url("assets/img/naturleon_logo.png"); ?>" alt=""></a>
                        <p class="text-small inset-xl-right-80">Tu operador mayorista de confianza en el sector turístico nacional e internacional desde 2002.</p>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-2 order-lg-4">
                        <p class="text-big text-black">Síguenos</p>
                        <!-- List Inline-->
                        <ul class="list-inline">
                        <li class="text-center"><a class="icon icon-square icon-filled-gallery fa fa-facebook-f text-gray" href="https://www.facebook.com/Naturleon/"></a></li>
                        <li class="text-center"><a class="icon icon-square icon-filled-gallery fa fa-instagram text-gray" href="https://www.instagram.com/naturleon_oficial"></a></li>
                        </ul>
                    </div>
                    <div class="col-sm-8 col-md-12 col-lg-6 order-lg-2">
                        <p class="text-big text-black">Contáctanos</p>
                        <!-- Contact Info-->
                        <address class="contact-info text-left">
                        <div class="row row-15 justify-content-sm-center">
                            <div class="col-md-12">
                            <p class="d-block text-small contact-info-address">
                                <a class="text-gray" href="#">
                                <span class="unit flex-row unit-spacing-xs">
                                    <span class="unit-left">
                                    <img class="img-responsive center-block" src="<?= base_url("assets/frontpage/images/icons/icon-01-16x21.png");?>" width="16" height="21" alt="">
                                    </span>
                                    <span class="unit-body">
                                    <span>León, Guanajuato, México</span>
                                    </span>
                                </span>
                                </a>
                            </p>
                            <p class="d-block text-small">
                                <a class="text-gray" href="tel:#4776373250">
                                <span class="unit align-items-center flex-row unit-spacing-xs">
                                    <span class="unit-left">
                                    <img class="img-responsive center-block" src="<?= base_url("assets/frontpage/images/icons/icon-02-19x19.png"); ?>" width="19" height="19" alt="">
                                    </span>
                                    <span class="unit-body">
                                    <span>477-637-3250</span>
                                    </span>
                                </span>
                                </a>
                            </p>
                            <p class="d-block text-small">
                                <a class="text-gray" href="mailto:atencionaagencias@naturleon.com">
                                <span class="unit align-items-center flex-row unit-spacing-xs">
                                    <span class="unit-left">
                                    <img class="img-responsive center-block" src="<?= base_url("assets/frontpage/images/icons/icon-04-20x13.png"); ?>" width="20" height="13" alt="">
                                    </span>
                                    <span class="unit-body">
                                    <span>atencionaagencias@naturleon.com</span>
                                    </span>
                                </span>
                                </a>
                            </p>
                            </div>
                        </div>
                        </address>
                    </div>
                    </div>
                </div>
                </div>
                <div class="hr bg-gallery"></div>
                <div class="row row-0 justify-content-sm-center justify-content-md-between">
                <div class="col-md-5 col-lg-4 text-md-left">
                    <p class="text-extra-small">
                    &#169;<span class="copyright-year"></span><a href="./"> Naturleón</a>. Todos los derechos reservados.</a>
                    </p>
                </div>
                <div class="col-md-5 col-lg-4 text-md-right">
                    <!-- List Inline-->
                    <ul class="list-inline list-inline-8">
                    <li>
                        <p class="text-extra-small"><a class="text-gray" target="_blank" href="<?= base_url("Aviso/"); ?>">Aviso de Privacidad</a></p>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"> </div>
    <!-- Java script-->
    <script src="<?= base_url("assets/frontpage/js/core.min.js"); ?>"></script>
    <script src="<?= base_url("assets/frontpage/js/script.js"); ?>"></script>
    <!-- endinject -->
</body>

</html>