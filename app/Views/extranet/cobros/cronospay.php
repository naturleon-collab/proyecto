<div class="container-fluid">

    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card bg-info text-white shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 font-weight-bold mb-3">
                                <i class="fas fa-shield-alt mr-2"></i>Seguridad 3DSecure
                            </div>
                            <p class="mb-3">Con CronosPay tu tarjeta e información personal están protegidas bajo los más altos estándares de seguridad.</p>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <i class="fas fa-lock fa-4x text-white-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 bg-light">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        <i class="fas fa-exclamation-triangle"></i> Importante
                    </div>
                    <ul class="small mt-2 mb-0 pl-3 font-weight-bold text-dark">
                        <li>NO CERRAR NI REFRESCAR el navegador durante el proceso.</li>
                        <li>NO PRESIONAR la tecla ESC ni el botón "Regresar".</li>
                        <li>Si no recibe confirmación en 10 min, contáctenos.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <form id="formProcesarPago" class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase">
                        <i class="fas fa-credit-card mr-2"></i> Datos del Tarjetahabiente
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="small font-weight-bold">Localizador</label>
                            <input type="text" class="form-control form-control-sm border-left-primary" id="cobro_localizador" name="cobro_localizador" onChange="BuscarReservacion()" required>
                            <input type="hidden" id="cobro_reservacion" name="cobro_reservacion" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="small font-weight-bold">Hotel</label>
                            <input type="text" class="form-control form-control-sm" id="cobro_hotel" name="cobro_hotel" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="small font-weight-bold">Titular Reserva</label>
                            <input type="text" class="form-control form-control-sm" id="cobro_titular" name="cobro_titular" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="small font-weight-bold">Nombre (Tarjetahabiente)</label>
                            <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small font-weight-bold">Apellido</label>
                            <input type="text" class="form-control form-control-sm" id="apellido" name="apellido" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="small font-weight-bold">Email</label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small font-weight-bold">Móvil</label>
                            <input type="text" class="form-control form-control-sm" id="movil" name="movil" maxlength="10" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="small font-weight-bold">C.P.</label>
                            <input type="text" class="form-control form-control-sm" id="cp_cronosPay" name="cp_cronosPay" onkeyup="BuscarCP('cronosPay')" maxlength="5">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="small font-weight-bold">Estado</label>
                            <input type="text" class="form-control form-control-sm" id="estado_cronosPay" name="estado_cronosPay">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="small font-weight-bold">Municipio</label>
                            <input type="text" class="form-control form-control-sm" id="municipio_cronosPay" name="municipio_cronosPay">
                        </div>

                        <div class="col-md-6">
                            <label class="small font-weight-bold">Colonia</label>
                            <select class="form-control form-control-sm" id="colonia_cronosPay" name="colonia_cronosPay" required>
                                <option value="0">Seleccionar...</option>
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <label class="small font-weight-bold">Calle y Número</label>
                            <input type="text" class="form-control form-control-sm" id="domicilio" name="domicilio">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="small font-weight-bold d-block">Tipo de Tarjeta</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="credito" name="tipo_t" value="credito" class="custom-control-input">
                                <label class="custom-control-label small" for="credito">Crédito</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="debito" name="tipo_t" value="debito" class="custom-control-input">
                                <label class="custom-control-label small" for="debito">Débito</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label class="small font-weight-bold">Banco</label>
                                    <select class="form-control form-control-sm" id="banco" name="banco">
                                        <option value="BBVA">BBVA</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="small font-weight-bold">Plazo</label>
                                    <select class="form-control form-control-sm" id="plazo" name="plazo">
                                        <option value="1">1 MES</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 mb-3">
                            <label class="small font-weight-bold">Número de Tarjeta</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="0000-0000-0000-0000">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label class="small font-weight-bold">Vence</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="MM/AA">
                                </div>
                                <div class="col-6">
                                    <label class="small font-weight-bold">CVV</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="123">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">RESUMEN DE PAGO</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="small font-weight-bold text-dark">Monto a Pagar</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">$</span>
                            </div>
                            <input type="text" class="form-control form-control-lg text-right font-weight-bold" id="cobro_monto" name="cobro_monto" readonly placeholder="0.00">
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-2 small font-weight-bold">
                        <span>Sobre Tasa:</span>
                        <span id="txt_sobretasa">$0</span>
                    </div>
                    <div class="d-flex justify-content-between mb-4 h5 font-weight-bold text-primary">
                        <span>TOTAL:</span>
                        <span id="txt_total"></span>
                    </div>
                    <button id="btnProcesarPago" type="submit" class="btn btn-primary btn-block btn-lg shadow">
                        <i class="fas fa-check-circle mr-2"></i> PROCESAR PAGO
                    </button>
                </div>
            </div>
        </div>
    </form>

</div>