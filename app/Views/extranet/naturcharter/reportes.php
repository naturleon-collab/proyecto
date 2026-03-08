<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-uppercase">Reportes NaturCharter</h1>
    </div>

    <div class="card shadow mb-4 border-left-primary">
        <div class="card-body">
            <form id="formFiltrosReportes" class="row align-items-end">
                <div class="col-md-5">
                    <div class="form-group mb-0">
                        <label class="small font-weight-bold text-primary text-uppercase">Seleccionar Ruta</label>
                        <select class="form-control selectpicker" data-live-search="true" id="filtroRuta">
                            <option value="0" selected>TODAS LAS RUTAS</option>
                            <?php if(!empty($salidas)): foreach($salidas as $x): ?>
                            <option value="<?= $x['id_salida']; ?>"><?= $x['nombre']; ?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-0">
                        <label class="small font-weight-bold text-primary text-uppercase">Año</label>
                        <select class="form-control selectpicker" data-live-search="true" id="filtroAnio">
                            <option value="" selected>Selecciona...</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-0">
                        <label class="small font-weight-bold text-primary text-uppercase">Mes</label>
                        <select class="form-control selectpicker" data-live-search="true" id="filtroMes">
                            <option value="" selected>Selecciona...</option>
					        <option value="0">TODOS</option>
                            <option value="1">ENERO</option>
                            <option value="2">FEBRERO</option>
                            <option value="3">MARZO</option>
                            <option value="4">ABRIL</option>
                            <option value="5">MAYO</option>
                            <option value="6">JUNIO</option>
                            <option value="7">JULIO</option>
                            <option value="8">AGOSTO</option>
                            <option value="9">SEPTIEMBRE</option>
                            <option value="10">OCTUBRE</option>
                            <option value="11">NOVIEMBRE</option>
                            <option value="12">DICIEMBRE</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <ul class="nav nav-tabs card-header-tabs border-bottom-0 nav-fill" id="reporteTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active text-uppercase font-weight-bold" data-toggle="tab" href="#pasajeros">
                        <i class="fas fa-users"></i> REPORTE PASAJEROS
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase font-weight-bold" data-toggle="tab" href="#pagos">
                        <i class="fas fa-dollar-sign"></i> REPORTE PAGOS
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase font-weight-bold" data-toggle="tab" href="#autobusesxmes">
                        <i class="fas fa-bus-alt"></i> REPORTE AUTOBUSES X MES
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase font-weight-bold" data-toggle="tab" href="#pasajerospendientes">
                        <i class="fas fa-user-clock"></i> PASAJEROS PENDIENTES
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase font-weight-bold" data-toggle="tab" href="#salidaspendientes">
                        <i class="fas fa-route"></i> SALIDAS PENDIENTES
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="card-body">
            <div class="tab-content">
                
                <div class="tab-pane fade show active" id="pasajeros" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped display-report tablanaturleon" width="100%">
                            <thead>
                                <tr>
                                    <th>Ruta</th>
                                    <th>Fecha Salida</th>
                                    <th>Transporte</th>
                                    <th>Asiento</th>
                                    <th>Clave</th>
                                    <th>Pasajero</th>
                                    <th>Hotel</th>
                                    <th>Origen</th>
                                    <th>Tarifa Neta</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="pagos" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-bordered display-report tablanaturleon" width="100%">
                            <thead>
                                <tr>
                                    <th>Ruta</th>
                                    <th>Fecha Salida</th>
                                    <th>No. Transportes</th>
                                    <th>Asientos Ocupados</th>
                                    <th>Asientos Disponibles</th>
                                    <th>Orígenes / Rutas</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="autobusesxmes" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-bordered display-report tablanaturleon text-center" width="100%">
                            <thead>
                                <tr class="bg-light">
                                    <th>Año</th>
                                    <th>Mes</th>
                                    <th>Total Buses</th>
                                    <th>VTA (AGS)</th>
                                    <th>IXT (DLIZ)</th>
                                    <th>VTA (TTUR)</th>
                                    <th>Total Pasajeros</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="pasajerospendientes" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-bordered display-report tablanaturleon" width="100%">
                            <thead>
                                <tr>
                                    <th>Ruta</th>
                                    <th>Fecha Salida</th>
                                    <th>Transporte</th>
                                    <th>Asiento</th>
                                    <th>Clave</th>
                                    <th>Nombre Pasajero</th>
                                    <th>Origen</th>
                                    <th>Agencia</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="salidaspendientes" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-bordered display-report tablanaturleon" width="100%">
                            <thead>
                                <tr>
                                    <th>Ruta</th>
                                    <th>Próxima Fecha</th>
                                    <th>Unidades Asignadas</th>
                                    <th>Capacidad Total</th>
                                    <th>Estatus</th>
                                    <th>Acción</th>
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
</div>