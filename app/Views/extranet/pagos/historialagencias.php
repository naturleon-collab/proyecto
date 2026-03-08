<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-uppercase font-weight-bold">Historial Pagos a Agencias</h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4 border-left-success"> <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Filtros de Búsqueda de Comisiones</h6>
                </div>
                <div class="card-body">
                    <div class="row align-items-end">
                        
                        <div class="col-xl-3 col-md-6 mb-3">
                            <label class="small font-weight-bold text-dark">Folio de Reservación / Venta</label>
                            <input id="input_busqueda" type="text" class="form-control form-control-sm ui-autocomplete-input" placeholder="Ej: VTA-10293" autocomplete="off">
                        </div>

                        <div class="col-xl-3 col-md-6 mb-3">
                            <label class="small font-weight-bold text-dark">Canal de Agencia</label>
                            <select id="agencia_tipo" class="form-control form-control-sm">
                                <option value="%">TODOS LOS CANALES</option>
                                <option value="1">Agencia Minorista</option>
                                <option value="2">Freelance</option>
                                <option value="3">Agencia Online (OTA)</option>
                                <option value="4">Afiliados</option>
                            </select>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-3">
                            <label class="small font-weight-bold text-dark">Seleccionar Agencia</label>
                            <select id="agencia_id" class="form-control form-control-sm selectpicker" data-live-search="true">
                                <option value="T">TODAS LAS AGENCIAS</option>
                                <?php if(!empty($agencias)){ foreach($agencias as $x){ ?>
                                    <option value="<?= $x['id_agencia']; ?>"><?= $x['nombre_agencia']; ?></option>
                                <?php } } ?>
                            </select>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-3">
                            <label class="small font-weight-bold text-dark">Método de Pago</label>
                            <select id="pago_clave" class="form-control form-control-sm">
                                <option value="T">Todos</option>
                                <option value="TRANS">Transferencia Bancaria</option>
                                <option value="DEP">Depósito</option>
                                <option value="EFE">Efectivo / Caja</option>
                            </select>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-3">
                            <label class="small font-weight-bold text-dark">Rango de Comisión ($)</label>
                            <div class="input-group input-group-sm">
                                <input id="monto_min" class="form-control" placeholder="Mín">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-gray-200"><i class="fas fa-arrows-alt-h"></i></span>
                                </div>
                                <input id="monto_max" class="form-control" placeholder="Máx">
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-3">
                            <label class="small font-weight-bold text-dark">Fecha de Liquidación</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gray-200"><i class="fas fa-calendar-check"></i></span>
                                </div>
                                <input id="fecha_rango" class="form-control daterangefilter">
                            </div>
                            <input type="hidden" id="fecha_inicio" value="02-MAR-2026">
                            <input type="hidden" id="fecha_fin" value="02-MAR-2026">
                        </div>

                        <div class="col-xl-3 col-md-6 mb-3">
                            <label class="small font-weight-bold text-dark">ID Recibo Pago</label>
                            <div class="input-group input-group-sm">
                                <input id="id_min" class="form-control" placeholder="Desde">
                                <input id="id_max" class="form-control" placeholder="Hasta">
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-3 text-right">
                            <button id="btn_buscar" class="btn btn-sm btn-success w-100 shadow-sm">
                                <i class="fas fa-search-dollar"></i> Consultar Comisiones
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4 border-left-info">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-light">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-list-ul mr-2"></i>Desglose de Comisiones Pagadas
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabla_historial" class="table table-bordered table-hover text-dark" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID Pago</th>
                                    <th>Agencia / Freelance</th>
                                    <th>Fecha Pago</th>
                                    <th>Método</th>
                                    <th>Referencia Vta.</th>
                                    <th class="text-right">Comisión</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-3 bg-gray-100">
                    <div class="row text-right">
                        <div class="col-12">
                            <span class="mr-3 small text-uppercase font-weight-bold">Total Comisiones Pagadas:</span>
                            <span class="h5 mb-0 font-weight-bold text-success">$2,390.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>