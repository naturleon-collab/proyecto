
<main class="main">
    <div class="site-breadcrumb">
        <div class="container">
        </div>
    </div>

    <div class="py-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 80px;"></i>
                    </div>
                    <h2 class="mb-10">¡Reservación Confirmada!</h2>
                    <p class="lead mb-40">Hemos enviado los detalles de tu reservación al correo: <strong><?= $res['email_cliente_reservacion'] ?></strong></p>
                    
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-primary text-white p-4">
                            <h4 class="mb-0 text-white">Resumen Detallado: <?= $res['folio_reservacion'] ?></h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <h6 class="text-uppercase text-muted small fw-bold mb-3">Información del Hospedaje</h6>
                                    <p class="mb-1"><strong>Hotel:</strong> <?= $res['nombre_hotel'] ?></p>
                                    <p class="mb-1"><strong>Habitación:</strong> <?= $res['nombre_habitacion'] ?></p>
                                    <p class="mb-1"><strong>Plan:</strong> <?= $res['nombre_tipo_plan'] ?></p>
                                    <p class="mb-1"><strong>Estancia:</strong> <?= $res['noches'] ?> Noches</p>
                                    <p class="mb-1 text-primary">
                                        <i class="far fa-calendar-check"></i> <?= date('d M, Y', strtotime($res['llegada_reservacion'])) ?> 
                                        al <?= date('d M, Y', strtotime($res['salida_reservacion'])) ?>
                                    </p>
                                </div>

                                <div class="col-md-6 mb-4 border-start">
                                    <h6 class="text-uppercase text-muted small fw-bold mb-3">Huéspedes</h6>
                                    <div class="d-flex flex-wrap gap-3 text-center">
                                        <div class="bg-light p-2 rounded text-center" style="min-width: 80px;">
                                            <span class="d-block fw-bold fs-5"><?= $res['adultos_reservacion'] ?></span>
                                            <small>Adultos</small>
                                        </div>
                                        <div class="bg-light p-2 rounded text-center" style="min-width: 80px;">
                                            <span class="d-block fw-bold fs-5"><?= $res['menores_reservacion'] ?></span>
                                            <small>Menores</small>
                                        </div>
                                        <div class="bg-light p-2 rounded text-center" style="min-width: 80px;">
                                            <span class="d-block fw-bold fs-5"><?= $res['numero_habitaciones_reservacion'] ?></span>
                                            <small>Hab(s).</small>
                                        </div>
                                    </div>
                                    <?php if(!empty($res['edades_reservacion'])): ?>
                                        <p class="mt-2 mb-0 small text-muted"><strong>Edades menores:</strong> <?= $res['edades_reservacion'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <hr>

                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h6 class="text-uppercase text-muted small fw-bold mb-2">Titular de la Reserva</h6>
                                    <p class="mb-0 fs-5"><?= $res['nombre_cliente_reservacion'] ?> <?= $res['apellidos_cliente_reservacion'] ?></p>
                                    <p class="text-muted small"><?= $res['email_cliente_reservacion'] ?> | <?= $res['telefono_cliente_reservacion'] ?></p>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <div class="display-6 fw-bold text-success">$<?= number_format($res['total_reservacion'], 2) ?> <small class="fs-6">MXN</small></div>
                                    <p class="text-muted small mb-0">Subtotal: $<?= number_format($res['subtotal_reservacion'], 2) ?> + Impuestos</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center gap-3 mt-5">
                        <a href="<?= base_url('Booking') ?>" class="theme-btn">Hacer otra reserva</a>
                        <!-- <button onclick="window.print();" class="theme-btn btn-outline-dark">
                            <i class="fas fa-print"></i> Imprimir Comprobante
                        </button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>