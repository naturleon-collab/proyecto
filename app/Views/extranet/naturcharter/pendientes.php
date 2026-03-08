<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white text-uppercase">
                        <i class="fas fa-bus mr-2"></i>Pendientes de Abordaje
                    </h6>
                </div>
                <div class="card-body">
                    <form id="FormFiltrosAbordaje">
                        
                        <div class="row align-items-end mb-3">
                            <div class="col-md-2">
                                <div class="form-group mb-0">
                                    <label class="small font-weight-bold text-dark text-uppercase">Ruta</label>
                                    <select class="form-control selectpicker show-tick" data-live-search="true" id="rutaAbordaje" name="rutaAbordaje" data-style="btn-outline-primary">
                                        <option value="">Selecciona...</option>
                                        <?php if(!empty($salidas)): foreach($salidas as $x): ?>
                                        <option value="<?= $x['id_salida']; ?>"><?= $x['nombre']; ?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-0">
                                    <label class="small font-weight-bold text-dark text-uppercase">Check In</label>
                                    <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" id="fechaCheckIn" name="fechaCheckIn">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-0">
                                    <label class="small font-weight-bold text-dark text-uppercase">Autobús</label>
                                    <select class="form-control" id="autobus" name="autobus">
                                        <option value="" selected>Selecciona...</option>
                                        <option value="TODOS">TODOS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-0">
                                    <label class="small font-weight-bold text-dark text-uppercase">Punto de Abordaje</label>
                                    <select class="form-control" id="puntoAbordaje" name="puntoAbordaje">
                                        <option value="" selected>Selecciona</option>
                                        <option value="0">TODOS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-block shadow-sm" type="submit">
                                    <strong>POR PASAJERO</strong>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-block shadow-sm" type="submit">
                                    <strong>SOLO PENDIENTES</strong>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>