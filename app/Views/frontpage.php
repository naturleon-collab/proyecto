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
  <link rel="stylesheet" href="<?= base_url("assets/frontpage/wizard.css");?>">
  <link rel="stylesheet" href="<?= base_url("assets/sweetalert/sweetalert2.css")?>">

  <link rel="icon" type="image/png" href="<?= base_url("assets/img/logo_naturleon.png");?>" />

</head>

<body>

  <!-- Page-->
  <div id="Inicio" class="page text-center">
    <!-- Page Header-->
    <header class="page-header slider-menu-position">
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-light rd-navbar-right-side rd-navbar-right-side-contacts rd-navbar-right-side-contacts-mobile rd-navbar-dark-stuck rd-navbar-overlay" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fullwidth" data-xl-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-lg-stick-up-offset="1px" data-xl-stick-up-offset="1px" data-xxl-stick-up-offset="1px">
            <div class="rd-navbar-inner">
              <div class="rd-navbar-panel">
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <div class="rd-navbar-brand rd-navbar-brand-desktop"><a class="brand-name" href="./"><img width="148" height="30" src="<?= base_url("assets/img/naturleon_logo.png"); ?>" alt=""></a></div>
                <div class="rd-navbar-brand rd-navbar-brand-mobile"><a class="brand-name" href="./"><img width="148" height="30" src="<?= base_url("assets/img/naturleon_logo.png"); ?>" alt=""></a></div>
                <button class="rd-navbar-collapse" data-rd-navbar-toggle=".rd-navbar-right-side-contacts"><span></span></button>
              </div>
              <div class="rd-navbar-right-side-wrap">
                <div class="rd-navbar-nav-wrap">
                  <ul class="rd-navbar-nav">
                    <li><a href="#Inicio">Inicio</a></li>
                    <li><a href="#Nosotros">Nosotros</a></li>
                    <li><a href="#Contacto">Contacto</a></li>
                  </ul>
                </div>
                <div class="divider-vertical bg-default-primary d-none d-lg-inline-block"></div>
                <div class="rd-navbar-right-side-contacts">
                  <ul class="list-inline list-inline-13">
                    <li><a class="text-black" href="tel:#4776373250"><img class="img-semi-transparent-inverse d-inline-block" src="<?= base_url("assets/frontpage/images/icons/icon-02-19x19.png"); ?>" width="19" height="19" alt=""></a></li>
                    <li><a class="text-black" href="mailto:#atencionaagencias@naturleon.com"><img class="img-semi-transparent-inverse d-inline-block" src="<?= base_url("assets/frontpage/images/icons/icon-04-20x13.png"); ?>" width="20" height="13" alt=""></a></li>
                    <li><a class="text-black" target="_blank" href="https://maps.app.goo.gl/DEqz8qvRthxPP5TE6"><img class="img-semi-transparent-inverse d-inline-block" src="<?= base_url("assets/frontpage/images/icons/icon-01-16x21.png"); ?>" width="16" height="21" alt=""></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>

    <section class="swiper-container swiper-slider swiper-slider-variant-2" data-height="" data-min-height="400px" data-simulate-touch="false" data-slide-effect="fade">
      <div class="swiper-wrapper">
        <?php if(!empty($sliders)){ foreach($sliders as $x){ ?>
        <div class="swiper-slide" data-slide-bg="<?= base_url($x['imagen_slider']); ?>"></div>
        <?php } }else{ ?>
        <div class="swiper-slide" data-slide-bg="<?= base_url("assets/frontpage/images/backgrounds/background-01-1920x900.jpg"); ?>"></div>
        <?php } ?>
      </div>
      <div class="swiper-caption-absolute">
        <div class="container">
          <div class="row justify-content-sm-center">
            <div class="col-md-10 col-xl-6">
              <div class="box box-sm d-block bg-default inset-xl-left-60 inset-xl-right-60">
                <h6 class="text-ubold text-md-center text-naturleon">¡BIENVENIDO A NATURLEÓN!</h6>
                <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-modern animate__animated animate__shakeX" role="alert">
                    <div class="alert-icon">
                        <i class="mdi mdi-alert-circle-outline"></i>
                    </div>
                    <div class="alert-content">
                        <span class="alert-title">¡Ups! Algo salió mal</span>
                        <p><?= session()->getFlashdata('error') ?></p>
                    </div>
                    <button type="button" class="btn-close-custom" onclick="this.parentElement.remove();">&times;</button>
                </div>
                <?php endif; ?>
                <form method="POST" action="<?= base_url("Main/logIn"); ?>" class="mt-4">
                  <div class="form-wrap form-wrap-xs">
                    <label class="form-label" for="login-user">Ingresa tu usuario</label>
                    <input class="form-control" type="text" id="login-user" name="login-user" value="" data-constraints="@Required" autocomplete="off">
                  </div>
                  <div class="form-wrap form-wrap-xs form-offset-bottom-none">
                    <label class="form-label" for="login-password">Ingresa tu contraseña</label>
                    <input class="form-control" type="password" id="login-password" name="login-password" value="" data-constraints="@Required" autocomplete="new-password">
                  </div>
                  <div class="form-button">
                    <button id="btnLogIn" class="button button-block button-icon button-icon-right button-primary" type="submit"><span>INGRESAR</span><span class="icon icon-xxs mdi mdi-chevron-right" style="float:none; margin-top: -1px;"></span></button>
                  </div>
                  <div class="form-wrap-checkbox text-center">
                      <p class="text-small"><a class="text-primary" data-target="#recoverPWD" data-toggle="modal" href="#recoverPWD"><strong>¿Olvidaste tú contraseña?</strong></a></p>
                    <div class="clearfix"></div>
                  </div>
                </form>
                <p class="text-small">¿Aún no tienes cuenta? <a class="text-primary" data-target="#registroAgencia" data-toggle="modal" href="#registroAgencia"><strong>Regístrate Aquí.</strong></a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Swiper Pagination-->
      <div class="swiper-pagination d-xl-none"></div>
      <!-- Swiper Navigation-->
      <div class="swiper-button-prev swiper-button-prev-variant-2 swiper-button-prev-variant-2-wide d-none d-xl-inline-block"><span class="icon icon-lg icon-circle icon-filled-white mdi mdi-chevron-left text-gray text-right"></span></div>
      <div class="swiper-button-next swiper-button-next-variant-2 swiper-button-next-variant-2-wide d-none d-xl-inline-block"><span class="icon icon-lg icon-circle icon-filled-white mdi mdi-chevron-right text-gray text-left"></span></div>
    </section>
    
    <?php if(!empty($plazas)){ ?>
    <section class="section-80 bg-wild-wand text-left box-privacy">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h4 class="text-ubold text-md-center text-naturleon">NUESTRAS PLAZAS</h4>
                    <p>En Naturleón estamos comprometidos con el servicio y la calidad, es por ello que nos ponemos siempre a sus órdenes para apoyarle y aclararle cualquier duda o necesidad que pueda llegar a tener. Contáctenos, será un placer atenderle.</p>
                </div>
            </div>
            <div class="row">
                <?php foreach($plazas as $x){ ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                    <div class="box bg-default d-block text-silver-chalice text-small">
                        <div class="text-center text-ubold text-naturleon"><?= strtoupper($x['nombre_plaza']); ?></div><br>
                        <p class="text-left"><i class="fas fa-envelope-square"></i> <a href="mailto:<?= $x['correo_plaza']; ?>?subject=Hola Naturleón!"><?= $x['correo_plaza']; ?></a></p>
                        <?php $telx = str_replace(' ', '',$x['telefono_plaza']); $tel = str_replace('-', '',$telx);  ?>
                        <p class="text-left"><i class="fas fa-phone-square"></i> <a href="<?= $tel; ?>"><?= $x['telefono_plaza']; ?></a></p>
                        <p class="text-left"><i class="fas fa-map-marker"></i> <span class="text-naturleon"><?= $x['ubicacion_plaza']; ?></span></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <section id="Nosotros" class="section parallax-container bg-black wow fadeIn" data-parallax-img="<?= $nosotros[0]['banner_nosotros']; ?>" data-wow-delay=".2s">
      <div class="parallax-content">
        <div class="bg-overlay-inverse-md-darker">
          <div class="container section-80 section-md-top-70">
            <h3 class="text-white text-ubold">NOSOTROS</h3>
            <div class="row row-30 justify-content-sm-center justify-content-lg-start text-sm-left text-lg-center">
              <div class="col-md-12 col-lg-4">
                <!-- Box-->
                <div class="box d-lg-block bg-default">
                  <div class="unit flex-column flex-sm-row flex-lg-column unit-spacing-box-icon">
                    <div class="unit-left">
                      <div class="icon-circle icon-circle-lg icon-filled-primary center-block"><img class="img-responsive center-block" src="assets/frontpage/images/icons/icon-06-14x21.png" width="14" height="21" alt=""></div>
                    </div>
                    <div class="unit-body">
                      <p class="text-small text-black text-uppercase text-ubold">NUESTRA MISIÓN</p>
                      <p class="text-small text-silver-chalice text-justify"><?= $nosotros[0]['mision_nosotros']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <!-- Box-->
                <div class="box d-lg-block bg-default">
                  <div class="unit flex-column flex-sm-row flex-lg-column unit-spacing-box-icon">
                    <div class="unit-left">
                      <div class="icon-circle icon-circle-lg icon-filled-primary center-block"><img class="img-responsive center-block" src="assets/frontpage/images/icons/icon-09-20x20.png" width="20" height="20" alt=""></div>
                    </div>
                    <div class="unit-body">
                      <p class="text-small text-black text-uppercase text-ubold">NUESTRA VISIÓN</p>
                      <p class="text-small text-silver-chalice text-justify"><?= $nosotros[0]['mision_nosotros']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <!-- Box-->
                <div class="box d-lg-block bg-default">
                  <div class="unit flex-column flex-sm-row flex-lg-column unit-spacing-box-icon">
                    <div class="unit-left">
                      <div class="icon-circle icon-circle-lg icon-filled-primary center-block"><img class="img-responsive center-block" src="assets/frontpage/images/icons/icon-07-21x18.png" width="21" height="18" alt=""></div>
                    </div>
                    <div class="unit-body">
                      <p class="text-small text-black text-uppercase text-ubold">NUESTROS VALORES</p>
                      <p class="text-small text-silver-chalice">
                        <ul class="text-justify list-marked-icon">
                          <?php if($valores > 0){ foreach($valores as $x){ ?>
                          <li><?= $x['texto_valor']; ?></li>
                          <?php } } ?>
                        </ul>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer id="Contacto" class="page-footer footer-default section-top-80 section-bottom-34 section-lg-bottom-15 text-md-left">
      <div class="container">
        <div class="row justify-content-sm-center">
          <div class="col-md-12">
            <div class="row row-40 justify-content-sm-center">
              <div class="col-sm-12 col-md-6 col-lg-4">
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
              <div class="col-sm-12 col-md-6 col-lg-4 col-xl-2">
                <p class="text-big text-black">Síguenos</p>
                <!-- List Inline-->
                <ul class="list-inline">
                  <li class="text-center"><a class="icon icon-square icon-filled-gallery fa fa-facebook-f text-gray" href="https://www.facebook.com/Naturleon/"></a></li>
                  <li class="text-center"><a class="icon icon-square icon-filled-gallery fa fa-instagram text-gray" href="https://www.instagram.com/naturleon_oficial"></a></li>
                </ul>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <p class="text-big text-black">¿Tienes alguna duda?</p>
                <!-- RD Mailform-->
                <form class="rd-mailform text-left" data-form-output="form-output-global" data-form-type="contact" method="post" action="">
                  <div class="form-wrap form-wrap-xs">
                    <label class="form-label" for="questions-contact-name">Tú nombre</label>
                    <input class="form-input text-regular" id="questions-contact-name" type="text" name="name" data-constraints="@Required">
                  </div>
                  <div class="form-wrap form-wrap-xs">
                    <label class="form-label" for="questions-contact-email">Email</label>
                    <input class="form-input text-regular" id="questions-contact-email" type="email" name="email" data-constraints="@Email @Required">
                  </div>
                  <div class="form-wrap form-wrap-xs">
                    <label class="form-label" for="questions-contact-message">Mensaje</label>
                    <textarea class="form-input text-regular" id="questions-contact-message" name="message" data-constraints="@Required" style="height:120px;"></textarea>
                  </div>
                  <div class="form-button text-center text-md-left">
                    <button class="button button-width-110 button-primary" type="button">ENVIAR</button>
                  </div>
                </form>
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

  <div class="snackbars" id="form-output-global"> </div>

  <!-- MODAL RECUPERAR CONTRASEÑA -->
  <div class="modal fade" id="recoverPWD" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="TituloModal"
        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#003a70;">
          <h6 class="text-white">Recuperar contraseña</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-12 col-sm-12 mb-2">
              <label for="correoRecoverPwd" class="form-label">Dirección de correo electrónico o usuario</label>
              <input type="text" class="form-control" name="correoRecoverPwd" id="correoRecoverPwd">
            </div>
            <div class="col-12 text-center"> 
              <label class="text-small">Te enviaremos un correo electrónico para ayudarte a reestablecer tú contraseña.</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="col-md-12 text-center mb-2">
            <button id="btnRecoverPwd" class="button button-block button-icon button-icon-right button-primary" type="button">
              <span>ENVIAR</span><span class="icon icon-xxs mdi mdi-chevron-right" style="float:none; margin-top: -1px;"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL REGISTRO AGENCIA -->
  <div class="modal fade" id="registroAgencia" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="TituloModal"
        aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#003a70;">
          <h5 class="modal-title text-white">Solicitud de registro para agencia</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <section class="pt-4">
            <div class="container">
              <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                  <div class="wizard">
                    <div class="wizard-inner">
                      <div class="connecting-line"></div>
                      <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li role="presentation" class="active">
                          <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Datos Generales</i></a>
                        </li>
                        <li role="presentation" class="disabled">
                          <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Datos de Contacto</i></a>
                        </li>
                        <li role="presentation" class="disabled">
                          <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Datos Fiscales</i></a>
                        </li>
                        <li role="presentation" class="disabled">
                          <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Documentación</i></a>
                        </li>
                      </ul>
                    </div>
                    <form id="formRegistrarAgenciaFront" role="form" class="login-box">
                      <div class="tab-content" id="main_form">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                          * Todos los campos son requeridos.
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Nombre Comercial</label> 
                                      <input class="form-control" type="text" id="nombrecomercial" name="nombrecomercial" required> 
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Razón Social</label> 
                                      <input class="form-control" type="text" id="razonsocial" name="razonsocial" required> 
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>RFC</label> 
                                      <input class="form-control" type="text" id="rfc" name="rfc" required> 
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Reg. Nacional/Estatal de Turismo</label> 
                                      <input class="form-control" type="text" id="renatu" name="renatu" required> 
                                  </div>
                              </div>

                              <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Plaza</label>
                                    <select id="plaza" class="form-control" name="plaza" required>
                                      <option value="0">Seleccionar</option>
                                      <?php if(!empty($plazas)){ foreach($plazas as $x){ ?>
                                      <option value="<?= $x['nombre_plaza']; ?>"><?= $x['nombre_plaza']; ?></option>
                                      <?php }} ?>
                                    </select> 
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Otros Datos</label>
                                      <textarea class="form-control" id="otrosdatos" name="otrosdatos" rows="4"></textarea>
                                  </div>
                              </div>
                              
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Login/Usuario</label> 
                                      <input class="form-control" type="text" id="loginagencia" name="loginagencia" autocomplete="new-text" required> 
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Password</label> 
                                      <input class="form-control" type="password" id="passwordagencia" name="passwordagencia" autocomplete="new-password" required> 
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Confirmación Password</label> 
                                      <input class="form-control" type="password" id="confirmacionpassword" name="confirmacionpassword" required> 
                                  </div>
                              </div>
                          </div>
                          <ul class="list-inline pull-right">
                              <li>
                                <button class="button button-block button-icon button-icon-right button-primary next-step" type="button">
                                  <span>CONTINUAR</span>
                                </button>
                              </li>
                          </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step2">
                          * Todos los campos son requeridos.
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Persona de Contacto</label> 
                                <input class="form-control" type="text" id="personacontacto" name="personacontacto" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>E-mail</label> 
                                <input class="form-control" type="email" id="emailcontacto" name="emailcontacto" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Calle</label> 
                                <input class="form-control" type="text" id="callecontacto" name="callecontacto" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Código Postal</label> 
                                <input class="form-control" type="number" id="cpcontacto" name="cpcontacto" onkeyup="BuscarDatosCP()" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Colonia</label> 
                                <select class="form-control" id="coloniacontacto" name="coloniacontacto" required>
                                  <option value="0">Seleccionar...</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Estado</label> 
                                <input class="form-control" type="text" id="estadocontacto" name="estadocontacto" readonly>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Municipio</label>
                                <input class="form-control" type="text" id="municipiocontacto" name="municipiocontacto" readonly> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>País</label> 
                                <input class="form-control" type="text" id="paiscontacto" name="paiscontacto" value="México" readonly disabled> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Teléfono Principal</label> 
                                <input class="form-control" type="text" id="telefonocontacto" name="telefonocontacto" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Teléfono Adicional</label> 
                                <input class="form-control" type="text" id="telefonoadicionalcontacto" name="telefonoadicionalcontacto" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Móvil 1</label> 
                                <input class="form-control" type="text" id="movil1contacto" name="movil1contacto" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Móvil 2</label> 
                                <input class="form-control" type="text" id="movil2contacto" name="movil2contacto" required> 
                              </div>
                            </div>
                          </div>
                          <ul class="list-inline pull-right">
                            <li>
                              <button class="button button-block button-icon button-icon-right button-secondary prev-step" type="button">
                                <span>REGRESAR</span>
                              </button>
                            </li>
                            <li>
                              <button class="button button-block button-icon button-icon-right button-primary next-step" type="button">
                                <span>CONTINUAR</span>
                              </button>
                            </li>
                          </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step3">
                          * Todos los campos son requeridos.
                          <div class="row">
                            <div class="col-md-12">
                              <input type="checkbox" id="copiardatoscontacto"/>
                              <label for="copiardatoscontacto">COPIAR DATOS DE CONTACTO</label>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Encargado</label> 
                                <input class="form-control" type="text" id="personafacturacion" name="personafacturacion" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>E-mail</label> 
                                <input class="form-control" type="email" id="emailfacturacion" name="emailfacturacion" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Calle</label> 
                                <input class="form-control" type="text" id="callefacturacion" name="callefacturacion" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Código Postal</label> 
                                <input class="form-control" type="number" id="cpfacturacion" name="cpfacturacion" onkeyup="BuscarDatosCPFiscales()" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Colonia</label>
                                <select name="coloniafacturacion" class="form-control" id="coloniafacturacion" required>
                                  <option value="0"></option>
                                </select> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Estado</label>
                                <input class="form-control" type="text" id="estadofacturacion" name="estadofacturacion" readonly>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Municipio</label>
                                <input class="form-control" type="text" id="municipiofacturacion" name="municipiofacturacion" readonly>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>País</label> 
                                <input class="form-control" type="text" id="paisfacturacion" name="paisfacturacion" value="México" readonly disabled> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Teléfono Principal</label> 
                                <input class="form-control" type="text" id="telefonofacturacion" name="telefonofacturacion" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Teléfono Adicional</label> 
                                <input class="form-control" type="text" id="telefonoadicionalfacturacion" name="telefonoadicionalfacturacion" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Móvil 1</label> 
                                <input class="form-control" type="text" id="movil1facturacion" name="movil1facturacion" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Móvil 2</label> 
                                <input class="form-control" type="text" id="movil2facturacion" name="movil2facturacion" required> 
                              </div>
                            </div>
                          </div>
                          <ul class="list-inline pull-right">
                            <li>
                              <button class="button button-block button-icon button-icon-right button-secondary prev-step" type="button">
                                <span>REGRESAR</span>
                              </button>
                            </li>
                            <li>
                              <button class="button button-block button-icon button-icon-right button-primary next-step" type="button">
                                <span>CONTINUAR</span>
                              </button>
                            </li>
                          </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step4">
                          * Todos los campos son requeridos.
                          <div class="row mt-2">
                            <div class="col-md-12">
                              <p class="text-justify">
                                Naturleón S.A de CV. hace de su conocimiento que debido a las nuevas reformas fiscales, es de suma importancia ingresar toda la documentación de su agencia de viajes.</p>
                              <p class="text-justify">
                                Es por eso que buscando siempre la protección de nuestros socios comerciales y brindar un excelente servicio con agencias establecidas y avaladas ante el SAT y SECTUR, resaltamos la importancia de tener al día dicha documentación, ya que con esto tenemos la certeza de que los viajeros se sentirán seguros de reservar a través de su agencia de viajes.
                              </p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Alta de Hacienda <i title="Alta de hacienda como persona física o moral, en donde se especifique la actividad empresarial de la agencia de viajes, dirección fiscal y nombre del titular. En caso de persona moral, la razón social de la agencias de viajes y acta constitutiva de la empresa." class="ti-help-alt"></i></label>
                                <input class="form-control" type="file" id="altahacienda" name="altahacienda" accept="image/*,.pdf" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Identificación Oficial <i title="Copia de identificación oficial del propietario de la agencia de viajes o representante legal." class="ti-help-alt"></i></label> 
                                <input class="form-control" type="file" id="identificacionoficial" name="identificacionoficial" accept="image/*,.pdf" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Comprobante Domicilio <i title="Comprobante de domicilio del local de la agencia de viajes." class="ti-help-alt"></i></label> 
                                <input class="form-control" type="file" id="comprobantedomicilio" name="comprobantedomicilio" accept="image/*,.pdf" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Carta Membretada <i title="Carta membretada de la agencia de viajes en donde soliciten los servicios de Naturleón, haciendo mención de: domicilio, código postal, teléfonos fijos, nombres, fechas de cumpleaños, números celulares y correos electrónicos de las personas autorizadas para reservar." class="ti-help-alt"></i></label> 
                                <input class="form-control" type="file" id="cartamembretada" name="cartamembretada" accept="image/*,.pdf" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Cédula Turística <i title="Cédula turística vigente, RNT y/o RET." class="ti-help-alt"></i></label>
                                <input class="form-control" type="file" id="cedulaturistica" name="cedulaturistica" accept="image/*,.pdf" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Foto Exterior <i title="Fotografía del exterior de la agencia de viajes." class="ti-help-alt"></i></label>
                                <input class="form-control" type="file" id="fotoexterioragencia" name="fotoexterioragencia" accept="image/*,.pdf" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Foto Interior <i title="Fotografía del interior de la agencia de viajes." class="ti-help-alt"></i></label>
                                <input class="form-control" type="file" id="fotointerioragencia" name="fotointerioragencia" accept="image/*,.pdf" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Logotipo <i title="Logotipo de la agencia de viajes en formato en alta resolución. (jpg, png, ai, psd)" class="ti-help-alt"></i></label>
                                <input class="form-control" type="file" id="logotipoagencia" name="logotipoagencia" accept="image/*,.pdf,.psd,.ai" required> 
                              </div>
                            </div>
                          </div>
                          <ul class="list-inline pull-right">
                            <li>
                              <button class="button button-block button-icon button-icon-right button-secondary prev-step" type="button">
                                <span>REGRESAR</span>
                              </button>
                            </li>
                            <li>
                              <button id="BtnRegistrarAgencia" class="button button-block button-icon button-icon-right button-primary" type="submit">
                                <span>REGISTRAR AGENCIA</span>
                              </button>
                            </li>
                          </ul>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>

  <!-- COOKIES -->

  <div class="fixed-bottom text-white p-3 cookie-consent-faded" id="cookieConsent" style="display: none;background-color:#202124;">
    <div class="container justify-content-between align-items-center text-center flex-wrap">
      <p class="mb-0 mr-3 text-center text-md-center">Este sitio web utiliza cookies para mejorar tu experiencia de usuario. Al continuar navegando, aceptas nuestra <a href="#" class="text-white">política de cookies</a>.</p>
      <div class="flex-column flex-md-row pt-3">
        <button type="button" class="btn btn-primary btn-sm mt-2 mt-md-0 mr-md-2" id="acceptCookies">Aceptar todas</button>
        <button type="button" class="btn btn-secondary btn-sm mt-2 mt-md-0 mr-md-2" id="configureCookies">Configurar</button>
        <button type="button" class="btn btn-danger btn-sm mt-2 mt-md-0" id="rejectCookies">Rechazar</button>
      </div>
    </div>
  </div>

  <div class="modal fade" id="cookieConfigModal" tabindex="-1" role="dialog" aria-labelledby="cookieConfigModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#202124;">
          <h5 class="modal-title text-white" id="cookieConfigModalLabel">Configuración de Cookies</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Selecciona qué tipos de cookies deseas permitir:</p>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="functionalCookies" checked disabled>
            <label class="form-check-label" for="functionalCookies">
              Cookies Esenciales (Siempre activas)
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="analyticsCookies">
            <label class="form-check-label" for="analyticsCookies">
              Cookies de Rendimiento y Análisis
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="marketingCookies">
            <label class="form-check-label" for="marketingCookies">
              Cookies de Marketing y Publicidad
            </label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="saveCookieConfig">Guardar preferencias</button>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="modal fade" id="cookieConsentModal" tabindex="-1" role="dialog" aria-labelledby="cookieConsentModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cookieConsentModalLabel">Aviso de Cookies</h5>
        </div>
        <div class="modal-body">
          <p>Este sitio web utiliza cookies para mejorar tu experiencia de usuario, analizar el tráfico y personalizar contenido. Al hacer clic en "Aceptar", consientes el uso de todas las cookies. Para configurar tus preferencias o saber más, consulta nuestra <a href="[URL_A_TU_POLITICA_DE_COOKIES]" class="text-info">política de cookies</a>.</p>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="acceptAllModal" checked>
            <label class="form-check-label" for="acceptAllModal">
              Acepto todas las cookies
            </label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="acceptCookiesModal">Aceptar</button>
          <button type="button" class="btn btn-secondary" id="configureCookiesModal" data-toggle="modal" data-target="#cookieConfigModal">Configurar</button>
          <button type="button" class="btn btn-danger" id="rejectCookiesModal">Rechazar</button>
        </div>
      </div>
    </div>
  </div> -->

  <script src="<?= base_url("assets/frontpage/js/core.min.js"); ?>"></script>
  <script src="<?= base_url("assets/frontpage/js/script.js"); ?>"></script>
  <script src="<?= base_url("assets/frontpage/wizard.js"); ?>"></script>
  <script src="<?= base_url("assets/sweetalert/sweetalert2.js")?>"></script>
  <script src="<?= base_url("assets/frontpage/js/validate/login.js")?>"></script>
  <!-- endinject -->
  <script type="text/javascript">
    var base_url = "<?= base_url(); ?>";
  </script>

</body>

</html>
