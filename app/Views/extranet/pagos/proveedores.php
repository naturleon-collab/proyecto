<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-uppercase font-weight-bold">Gestión de Pagos Proveedores</h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Filtros de Búsqueda</h6>
                </div>
                <div class="card-body">
                    <form id="filterForm">
                        <div class="row text-xs font-weight-bold text-uppercase">
                            
                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="Estatus_cobro">Estatus Cobro</label>
                                <select class="form-control form-control-sm " id="Estatus_cobro" name="Estatus_cobro">
                                    <option value="0">Todas</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="Estatus_pago">Estatus Pago</label>
                                <select class="form-control form-control-sm " id="Estatus_pago" name="Estatus_pago">
                                    <option value="0">Todas</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="tipo_fecha">Tipo Fechas</label>
                                <select class="form-control form-control-sm " id="tipo_fecha" name="tipo_fecha">
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="fecha_rango">Rango de Fechas</label>
                                <input id="fecha_rango" class="form-control form-control-sm daterangefilter" placeholder="Seleccionar fechas...">
                                <input type="hidden" id="fecha_inicio" name="fecha_inicio">
                                <input type="hidden" id="fecha_fin" name="fecha_fin">
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="canal_id">Canales</label>
                                <select class="form-control form-control-sm " id="canal_id" name="canal_id">
                                    <option value="0">Todos</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="proveedor_tipo">Tipo de Proveedor</label>
                                <select class="form-control form-control-sm " id="proveedor_tipo" name="proveedor_tipo">
                                    <option value="0">Todos</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="proveedor_id">Proveedor</label>
                                <select class="form-control selectpicker form-control-sm" data-live-search="true" id="proveedor_id" name="proveedor_id">
                                    <option value="0">Todos</option>
                                    <optgroup label="HOTELES">
                                        <?php if(!empty($hoteles)){ foreach($hoteles as $x){ ?>
                                            <option value="<?= $x['id_hotel']; ?>"><?= $x['nombre_hotel']; ?></option>
                                        <?php } } ?>
                                    </optgroup>
                                    <optgroup label="NATURCHARTER">
                                        <?php if(!empty($charters) ){ foreach($charters as $x){ ?>
                                            <option value="<?= $x['id_charter']; ?>"><?= $x['nombre_charter']; ?></option>
                                        <?php } } ?>
                                    </optgroup>
                                    <optgroup label="NATURFLIGHT">
                                        <?php if(!empty($flights)){ foreach($flights as $x){ ?>
                                            <option value="<?= $x['id_naturflight']; ?>"><?= $x['nombre_comercial']; ?></option>
                                        <?php } } ?>
                                    </optgroup>
                                    <optgroup label="TOURS">
                                        <?php if(!empty($tours) ){ foreach($tours as $x){ ?>
                                            <option value="<?= $x['id_tour']; ?>"><?= $x['nombre_tour']; ?></option>
                                        <?php } } ?>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="hotel_id">Hotel</label>
                                <select class="form-control form-control-sm selectpicker" data-live-search="true" id="hotel_id" name="hotel_id">
                                    <option value="0">Todos</option>
                                    <?php if(!empty($hoteles)){ foreach($hoteles as $x){ ?>
                                        <option value="<?= $x['id_hotel']; ?>"><?= $x['nombre_hotel']; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="reportada_a_proveedor">Loc. Externo</label>
                                <select class="form-control form-control-sm " id="reportada_a_proveedor" name="reportada_a_proveedor">
                                    <option value="0">Todas</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
                                <label for="localizadores_list">Localizadores</label>
                                <input class="form-control form-control-sm " id="localizadores_list" name="localizadores_list" placeholder="Ej: 123, 456">
                            </div>

                            <div class="col-12 col-xl-3 mb-3 d-flex align-items-end justify-content-end">
                                <button type="button" class="btn btn-primary btn-sm btn-block " id="boton_buscar">
                                    <i class="fas fa-search fa-sm mr-2"></i> Buscar
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-12 d-none" id="div_proveedores"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de Reservaciones</h6>
                </div>
                
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped text-uppercase small text-nowrap tablanaturleon" width="100%" cellspacing="0">
                            <thead class="bg-light">
                                <tr>
                                    <th><input type="checkbox" id="checkAll"></th>
                                    <th>Localizador</th>
                                    <th>F. Anticipo</th>
                                    <th>F. Pago Total</th>
                                    <th class="text-right">Total Público</th>
                                    <th class="text-right">Total Neto</th>
                                    <th class="text-right">Cobrado</th>
                                    <th class="text-right">Pagado</th>
                                    <th class="text-right">Saldo</th>
                                    <th>Hotel / Servicio</th>
                                    <th>Titular</th>
                                    <th>Agencia</th>
                                    <th>Check In</th>
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
            <h6 class="m-0 font-weight-bold text-primary">Información del Pago</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="font-weight-bold small">Tipo de Pago</label>
                    <select id="pago_clave" class="form-control form-control-sm" required>
                        <option value="TRANS">Transferencia</option>
                        <option value="CHQ">Cheque</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3" id="label_banco">
                    <label class="font-weight-bold small">Banco</label>
                    <select id="pago_banco" class="form-control form-control-sm">
                        <option value="BBVA">BBVA</option>
                        <option value="BTE">Banorte</option>
                        <option value="SFN">Santander</option>
                        </select>
                </div>

                <div class="col-md-3 mb-3" id="label_folio">
                    <label class="font-weight-bold small" id="leyenda_folio">Autorización</label>
                    <input id="pago_folio" type="text" class="form-control form-control-sm">
                </div>

                <div class="col-md-3 mb-3" id="label_fecha">
                    <label class="font-weight-bold small">Fecha de pago</label>
                    <input type="date" class="form-control form-control-sm" id="pago_fecha" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="d-flex justify-content-between">
                        <label class="font-weight-bold small">Archivos</label>
                    </div>
                    <input type="file" class="form-control-file small border p-1 w-100" id="pago_archivo_1">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="font-weight-bold small">Observaciones</label>
                    <textarea id="pago_observaciones" class="form-control" rows="2"></textarea>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="font-weight-bold small">Internas</label>
                    <textarea id="pago_observaciones_internas" class="form-control" rows="2"></textarea>
                </div>
            </div>

            <hr class="sidebar-divider">

            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Reservaciones</div>
                    <div id="reservaciones_total" class="h5 mb-0 font-weight-bold text-gray-800">$0.00</div>
                </div>
                <div class="col-md-3">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Monto a Pagar</div>
                    <div id="pago_monto" class="h5 mb-0 font-weight-bold text-gray-800">$0.00</div>
                </div>
                
                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Guardar Orden</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>