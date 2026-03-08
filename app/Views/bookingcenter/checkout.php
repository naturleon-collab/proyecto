<?php
// Calculamos las noches para el resumen
$fecha1 = new DateTime($params['checkin']);
$fecha2 = new DateTime($params['checkout']);
$noches = $fecha1->diff($fecha2)->days;

// Formateamos fechas para mostrar (Ej: 20 Dic 2025)
$checkin_f = strftime("%d %b %Y", strtotime($params['checkin']));
$checkout_f = strftime("%d %b %Y", strtotime($params['checkout']));

// Imagen del hotel (usamos la primera disponible o una por defecto)
$imagen_url = !empty($resumen['imagenes']) ? base_url($resumen['imagenes'][0]['archivo_hotel_imagen']) : base_url("assets/img/hoteldemo.png");
?>

<main class="main">
    <div class="site-breadcrumb">
        <div class="container">
            <!-- <h2 class="breadcrumb-title">Finalizar Reserva</h2> -->
        </div>
    </div>

    <div class="room-booking py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="booking-widget">
                        <h4 class="booking-widget-title">Datos del Cliente</h4>
                        <div class="booking-form">
                            <form action="<?= base_url('Booking/Confirmar'); ?>" method="POST" id="formConfirmar">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre(s)</label>
                                            <input type="text" name="nombre_cliente" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Apellido(s)</label>
                                            <input type="text" name="apellido_cliente" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Correo Electrónico</label>
                                            <input type="email" name="email_cliente" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Teléfono</label>
                                            <input type="text" name="telefono_cliente" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Código Postal</label>
                                            <input type="number" name="codigopostal_cliente" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="id_hotel" value="<?= $params['id_hotel'] ?>">
                                    <input type="hidden" name="id_hab" value="<?= $params['id_habitacion'] ?>">
                                    <input type="hidden" name="id_plan" value="<?= $params['id_plan'] ?>">
                                    <input type="hidden" name="destino" value="<?= $params['destino'] ?>">
                                    <input type="hidden" name="checkin" value="<?= $params['checkin'] ?>">
                                    <input type="hidden" name="checkout" value="<?= $params['checkout'] ?>">
                                    <input type="hidden" name="habitaciones" value="<?= $params['habitaciones'] ?>">
                                    <input type="hidden" name="adultos" value="<?= $params['adultos'] ?>">
                                    <input type="hidden" name="menores" value="<?= $params['menores'] ?>">
                                    <input type="hidden" name="edades" value="<?= $params['edades'] ?>">
                                    <input type="hidden" name="id_usuario" value="<?= $usuario['id_usuario'] ?>">
                                    <input type="hidden" name="id_agencia" value="<?= $usuario['entidad_usuario'] ?>">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="booking-widget">
                        <h4 class="booking-widget-title">Información de Pago</h4>
                        <div class="booking-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nombre del Titular</label>
                                        <input type="text" class="form-control" placeholder="Nombre en la Tarjeta">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Número de Tarjeta</label>
                                        <input type="text" class="form-control" placeholder="**** **** **** ****">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Fecha de Vencimiento</label>
                                        <input type="text" class="form-control" placeholder="MM/AA">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>CCV / CVC</label>
                                        <input type="text" class="form-control" placeholder="CVV">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="booking-summary">
                        <h4 class="mb-30">Resumen de la Reserva</h4>
                        <div class="booking-room-img">
                            <img src="<?= $imagen_url ?>" alt="<?= $resumen['hotel']['nombre_hotel'] ?>">
                        </div>
                        <div class="booking-room-content">
                            <div class="booking-room-title">
                                <div>
                                    <h5><?= $resumen['hotel']['nombre_hotel'] ?></h5>
                                    <p><i class="far fa-map-marker-alt"></i> <?= $resumen['hotel']['ubicacion_hotel']; ?></p>
                                </div>
                                <a href="javascript:history.back()" class="book-edit-btn" title="Editar"><i class="far fa-pen"></i></a>
                            </div>
                        </div>

                        <div class="booking-order-info">
                            <div class="booking-room-summary">
                                <h5>Detalles del Hospedaje</h5>
                                <ul>
                                    <li>Llegada: <span><?= $checkin_f ?></span></li>
                                    <li>Salida: <span><?= $checkout_f ?></span></li>
                                    <li>Habitación: <span><?= $resumen['seleccion']['nombre_hab'] ?></span></li>
                                    <li>Plan: <span><?= $resumen['seleccion']['nombre_plan'] ?></span></li>
                                    <li>Cantidad: <span><?= $params['habitaciones'] ?> Hab.</span></li>
                                    <li>Adultos: <span><?= $params['adultos'] ?></span></li>
                                    <li>Menores: <span><?= $params['menores'] ?></span></li>
                                    <li>Estancia: <span><?= $noches ?> Noches</span></li>
                                </ul>
                            </div>

                            <div class="booking-pay-info">
                                <h5>Resumen de Pagos</h5>
                                <ul>
                                    <li><strong>Subtotal:</strong> <span>$<?= number_format($resumen['seleccion']['subtotal'], 2) ?> MXN</span></li>
                                    <li><strong>Impuestos:</strong> <span>$<?= number_format($resumen['seleccion']['iva'] + $resumen['seleccion']['ish'], 2) ?> MXN</span></li>
                                    
                                    <?php if(!empty($resumen['seleccion']['promos'])): ?>
                                        <li class="text-success small">
                                            <strong>Promoción:</strong> 
                                            <span><?= implode(', ', $resumen['seleccion']['promos']) ?></span>
                                        </li>
                                    <?php endif; ?>

                                    <li class="order-total">
                                        <strong>Total a Pagar:</strong> 
                                        <span>$<?= number_format($resumen['seleccion']['tarifa_total'], 2) ?> MXN</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="text-end mt-40">
                                <button type="button" onclick="$('#formConfirmar').submit();" class="theme-btn w-100">
                                    Confirmar Reserva <i class="far fa-arrow-right"></i>
                                </button>
                                <p class="small text-muted mt-2 text-center">Al confirmar, aceptas nuestras políticas de cancelación.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>