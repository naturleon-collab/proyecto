<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-uppercase font-weight-bold">Historial Pagos Proveedores</h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4 border-left-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Filtros de Búsqueda</h6>
                </div>
                <div class="card-body">
                    <div class="row align-items-end">
                        
                        <div class="col-xl-3 col-md-6 mb-3">
                            <label class="small font-weight-bold text-dark">Folio de reservación</label>
                            <input id="input_busqueda" type="text" class="form-control form-control-sm ui-autocomplete-input" autocomplete="off">
                        </div>

                        <div class="col-xl-3 col-md-6 mb-3">
                            <label class="small font-weight-bold text-dark">Tipo de Proveedor</label>
                            <select id="proveedor_tipo" class="form-control form-control-sm">
                                <option value="O">TODOS</option>
                                <option value="1">Hotelería</option>
                                <option value="2">Charter</option>
                                <option value="3">Traslados</option>
                            </select>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-3">
                            <label class="small font-weight-bold text-dark">Proveedor</label>
                            <select id="proveedor_id" class="form-control form-control-sm selectpicker" data-live-search="true">
                                <option value="O">TODOS</option>
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

                        <div class="col-xl-3 col-md-6 mb-3">
                            <label class="small font-weight-bold text-dark">Tipo de Pago</label>
                            <select id="pago_clave" class="form-control form-control-sm">
                                <option value="T">Todos</option>
                                <option value="TRANS">Transferencia</option>
                                <option value="CHQ">Cheque</option>
                            </select>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-3">
                            <label class="small font-weight-bold text-dark">Monto</label>
                            <div class="input-group input-group-sm">
                                <input id="monto_min" class="form-control" placeholder="Mín">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-gray-200"><i class="fas fa-arrows-alt-h"></i></span>
                                </div>
                                <input id="monto_max" class="form-control" placeholder="Máx">
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-3">
                            <label class="small font-weight-bold text-dark">Fecha de Pago</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gray-200"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input id="fecha_rango" class="form-control daterangefilter">
                            </div>
                            <input type="hidden" id="fecha_inicio" value="02-MAR-2026">
                            <input type="hidden" id="fecha_fin" value="02-MAR-2026">
                        </div>

                        <div class="col-xl-3 col-md-6 mb-3">
                            <label class="small font-weight-bold text-dark">Orden de Pago</label>
                            <div class="input-group input-group-sm">
                                <input id="id_min" class="form-control" placeholder="Mín">
                                <input id="id_max" class="form-control" placeholder="Máx">
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-3 text-right">
                            <button id="btn_buscar" class="btn btn-sm btn-primary w-100">
                                <i class="fas fa-search"></i> Consultar Reservas
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
                        <i class="fas fa-history mr-2"></i>Historial de Pagos Recientes
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabla_historial" class="table table-bordered table-hover text-dark tablanaturleon" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID Orden</th>
                                    <th>Proveedor</th>
                                    <th>Fecha Pago</th>
                                    <th>Tipo</th>
                                    <th class="text-right">Importe</th>
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
                            <span class="mr-3 small text-uppercase font-weight-bold">Total mostrado:</span>
                            <span class="h5 mb-0 font-weight-bold text-gray-800">$63,450.50</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>