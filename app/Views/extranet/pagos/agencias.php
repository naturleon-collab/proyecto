<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-uppercase font-weight-bold">Gestión de Pagos a Agencias (Comisiones)</h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4 border-left-success">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Filtros de Reservaciones por Liquidar</h6>
                </div>
                <div class="card-body">
                    <form id="filterForm">
                        <div class="row text-xs font-weight-bold text-uppercase">
                            
                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="Estatus_cobro">Estatus Pago Cliente</label>
                                <select class="form-control form-control-sm" id="Estatus_cobro" name="Estatus_cobro">
                                    <option value="0">Todas (Saldadas/Pendientes)</option>
                                    <option value="1">Solo Pagadas al 100%</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="Estatus_comision">Estatus Comisión</label>
                                <select class="form-control form-control-sm" id="Estatus_comision" name="Estatus_comision">
                                    <option value="0">Pendientes de Pago</option>
                                    <option value="1">Pagadas / Liquidadas</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="tipo_fecha">Filtrar por Fecha de:</label>
                                <select class="form-control form-control-sm" id="tipo_fecha" name="tipo_fecha">
                                    <option value="1">Reservación</option>
                                    <option value="2">Check-In</option>
                                    <option value="3">Check-Out (Viaje Finalizado)</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="fecha_rango">Rango de Fechas</label>
                                <input id="fecha_rango" class="form-control form-control-sm daterangefilter" placeholder="Seleccionar fechas...">
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="canal_id">Tipo de Agencia</label>
                                <select class="form-control form-control-sm" id="canal_id" name="canal_id">
                                    <option value="0">Todos los Canales</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="agencia_id">Seleccionar Agencia</label>
                                <select class="form-control form-control-sm selectpicker" data-live-search="true" id="agencia_id" name="agencia_id">
                                    <option value="0">Todas las Agencias</option>
                                    <?php if(!empty($agencias)){ foreach($agencias as $x){ ?>
                                        <option value="<?= $x['id_agencia']; ?>"><?= $x['nombre_agencia']; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="localizadores_list">Localizadores / Vales</label>
                                <input class="form-control form-control-sm" id="localizadores_list" name="localizadores_list" placeholder="Ej: V-992, V-105">
                            </div>

                            <div class="col-12 col-xl-3 mb-3 d-flex align-items-end justify-content-end">
                                <button type="button" class="btn btn-success btn-sm btn-block" id="boton_buscar">
                                    <i class="fas fa-search fa-sm mr-2"></i> Consultar Ventas
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de Ventas por Comisionar</h6>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped text-uppercase small text-nowrap" width="100%" cellspacing="0">
                            <thead class="bg-light">
                                <tr>
                                    <th><input type="checkbox" id="checkAll"></th>
                                    <th>Localizador</th>
                                    <th>Check-In</th>
                                    <th class="text-right border-left-info">Venta Público</th>
                                    <th class="text-right text-primary">Comisión %</th>
                                    <th class="text-right font-weight-bold">Monto Comisión</th>
                                    <th class="text-right">Pagado Ag.</th>
                                    <th class="text-right text-danger">Saldo Ag.</th>
                                    <th>Agencia / Vendedor</th>
                                    <th>Titular / Cliente</th>
                                    <th>Servicio</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4 border-left-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detalle de la Dispersión (Pago de Comisiones)</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="font-weight-bold small">Método de Salida</label>
                    <select id="pago_clave" class="form-control form-control-sm" required>
                        <option value="TRANS">Transferencia Bancaria</option>
                        <option value="EFE">Efectivo (Caja)</option>
                        <option value="SFA">Saldo a Favor Agencia</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="font-weight-bold small">Banco Emisor</label>
                    <select id="pago_banco" class="form-control form-control-sm">
                        <option value="BBVA">BBVA - Operativa</option>
                        <option value="BTE">Banorte - Comisiones</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="font-weight-bold small">Referencia de Pago</label>
                    <input id="pago_folio" type="text" class="form-control form-control-sm" placeholder="Núm. de rastreo">
                </div>

                <div class="col-md-3 mb-3">
                    <label class="font-weight-bold small">Fecha de Liquidación</label>
                    <input type="date" class="form-control form-control-sm" id="pago_fecha" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold small">Observaciones para la Agencia (Aparecen en recibo)</label>
                    <textarea id="pago_observaciones" class="form-control" rows="2" placeholder="Ej: Pago de comisiones mayo 2026..."></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold small">Notas Administrativas (Internas)</label>
                    <textarea id="pago_observaciones_internas" class="form-control" rows="2"></textarea>
                </div>
            </div>

            <hr class="sidebar-divider">

            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ventas Seleccionadas</div>
                    <div id="reservaciones_total" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                </div>
                <div class="col-md-3">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total a Comisionar</div>
                    <div id="pago_monto" class="h5 mb-0 font-weight-bold text-gray-800">$0.00</div>
                </div>
                
                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-success btn-icon-split shadow">
                        <span class="icon text-white-50">
                            <i class="fas fa-check-circle"></i>
                        </span>
                        <span class="text">Liquidar Comisiones Seleccionadas</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>