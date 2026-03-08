<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-uppercase" style="letter-spacing: 1px;">Abordaje Charter</h1>
    </div>

    <div class="row mb-4">
        <div class="col-md-6 col-sm-12">
            <div class="card border-left-primary h-100 shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Buscar Asiento</div>
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="ESCRIBIR / ESCANEAR..." id="buscarAsiento">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card shadow mb-4 border-bottom-success">
                <div class="card-body">
                    <h4 class="font-weight-bold text-success text-uppercase">¡Bienvenid@!</h4>
                    <hr>
                    <p class="mb-0 text-gray-600">
                        Asegúrate de que el <strong>lector</strong>, la <strong>impresora</strong> y la aplicación de <strong>WhatsApp</strong> funcionan correctamente antes de iniciar el proceso de abordaje.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12"></div>
        <div class="col-md-6 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white text-uppercase">Abordajes por Autobús</h6>
                </div>
                <div class="card-body">
                    <form id="FormFiltrosAbordaje">
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label class="small font-weight-bold">Ruta:</label>
                                <select class="form-control" id="rutaAbordaje">
                                    <option value="0" selected>Selecciona...</option>
                                    <?php if($salidas): foreach($salidas as $x): ?>
                                    <option value="<?= $x['id_salida']; ?>"><?= $x['nombre']; ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="small font-weight-bold">Check In:</label>
                                <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" id="fechaCheckIn">
                            </div>
                            <div class="col-md-12">
                                <label class="small font-weight-bold">Punto de Abordaje:</label>
                                <select class="form-control" id="puntoAbordaje">
                                    <option value="0" selected>Selecciona...</option>
                                </select>
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
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase">Lista de Pasajeros - Unidad 01</h6>
                    <div class="dropdown no-arrow">
                        <span class="badge badge-info p-2">
                            <i class="fas fa-users"></i> TOTAL: 45 / ABORDADOS: 12
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover tablanaturleon" width="100%" cellspacing="0">
                            <thead class="bg-light text-dark">
                                <tr>
                                    <th class="text-center">Asiento</th>
                                    <th>Pasajero</th>
                                    <th>Folio / Boleto</th>
                                    <th>Punto de Abordaje</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center font-weight-bold">01</td>
                                    <td>
                                        <div class="font-weight-bold">NOMBRE PASAJERO</div>
                                        <small class="text-muted">Adulto</small>
                                    </td>
                                    <td><span class="badge badge-light">RESERV2A0E56</span></td>
                                    <td>Punto Abordaje</td>
                                    <td class="text-center">
                                        <span class="badge badge-success px-3 py-2">
                                            <i class="fas fa-check-circle"></i> ABORDÓ
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-circle btn-sm btn-info" title="Reimprimir Pase">
                                            <i class="fas fa-print"></i>
                                        </button>
                                        <button class="btn btn-circle btn-sm btn-success" title="Enviar WhatsApp">
                                            <i class="fab fa-whatsapp"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center font-weight-bold text-primary">02</td>
                                    <td>
                                        <div class="font-weight-bold">Nombre Pasajero Menor</div>
                                        <small class="text-muted">Menor</small>
                                    </td>
                                    <td><span class="badge badge-light">RESERV60B8EF</span></td>
                                    <td>Punto Abordaje</td>
                                    <td class="text-center">
                                        <span class="badge badge-warning px-3 py-2 text-dark">
                                            <i class="fas fa-clock"></i> PENDIENTE
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm px-3 shadow-sm">
                                            <strong>CONFIRMAR</strong>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>