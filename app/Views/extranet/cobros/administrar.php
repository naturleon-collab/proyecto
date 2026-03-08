<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-uppercase font-weight-bold">Gestión de Cobros</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-primary text-uppercase">
                <i class="fas fa-search-plus mr-2"></i>Criterios de Búsqueda
            </h6>
        </div>
        <div class="card-body">
            <form id="form_busqueda_cobros">
                <div class="row">
                    
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                        <label class="small font-weight-bold text-dark" for="f_status">Estatus</label>
                        <select class="form-control form-control-sm" name="f_status" id="f_status">
                        </select>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                        <label class="small font-weight-bold text-dark" for="f_tipo_servicio">Tipo</label>
                        <select class="form-control form-control-sm" name="f_tipo_servicio" id="f_tipo_servicio">
                        </select>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                        <label class="small font-weight-bold text-dark" for="f_plaza_id">Plaza</label>
                        <select class="form-control form-control-sm" name="f_plaza_id" id="f_plaza_id">
                        </select>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                        <label class="small font-weight-bold text-dark" for="f_agencia_nombre">Agencia</label>
                        <input class="form-control ui-autocomplete-input" name="f_agencia_nombre" id="f_agencia_nombre" placeholder="Nombre agencia..." autocomplete="off">
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                        <label class="small font-weight-bold text-dark" for="f_canal_id">Canales</label>
                        <select class="form-control form-control-sm" name="f_canal_id" id="f_canal_id">
                        </select>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                        <label class="small font-weight-bold text-dark" for="f_cliente_nombre">Cliente</label>
                        <input class="form-control form-control-sm" type="text" name="f_cliente_nombre" id="f_cliente_nombre" placeholder="Nombre completo">
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                        <label class="small font-weight-bold text-dark" for="f_fecha_rango">Periodo de Cobro</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control daterangefilter bg-white" readonly id="f_fecha_rango" value="23-FEB-2026 / 02-MAR-2026">
                            <input type="hidden" name="f_fecha_inicio" id="f_fecha_inicio">
                            <input type="hidden" name="f_fecha_fin" id="f_fecha_fin">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" title="Limpiar fechas"><i class="fas fa-undo-alt"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                        <label class="small font-weight-bold text-dark">ID Cobro (Rango)</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control text-center" name="f_id_inicio" id="f_id_inicio" placeholder="Inicio">
                            <input type="text" class="form-control text-center" name="f_id_fin" id="f_id_fin" placeholder="Fin">
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                        <label class="small font-weight-bold text-dark" for="f_metodo_pago">Tipo Cobro</label>
                        <select class="form-control form-control-sm" name="f_metodo_pago" id="f_metodo_pago">
                            <option value="o">Todos</option>
                        </select>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                        <label class="small font-weight-bold text-dark" for="f_banco_id">Banco</label>
                        <select class="form-control form-control-sm" name="f_banco_id" id="f_banco_id">
                            <option value="0">Todos</option>
                        </select>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                        <label class="small font-weight-bold text-dark" for="f_terminal_id">Terminal</label>
                        <select class="form-control form-control-sm" name="f_terminal_id" id="f_terminal_id">
                            <option value="0" selected>Todos</option>
                        </select>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                        <label class="small font-weight-bold text-dark" for="f_autorizacion">Autorización / Cheque</label>
                        <input class="form-control form-control-sm" type="text" name="f_autorizacion" id="f_autorizacion" placeholder="Folio...">
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-primary font-weight-bold px-4 shadow-sm">
                            <i class="fas fa-search mr-1"></i> BUSCAR
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover text-uppercase small tablanaturleon text-nowrap" width="100%">
                    <thead class="bg-gray-100">
                        <tr class="text-primary font-weight-bold">
                            <th>Localizador</th>
                            <th>ID Cobro</th>
                            <th>Usuario</th>
                            <th>Agencia</th>
                            <th>Fecha de Cobro</th>
                            <th>Tipo</th>
                            <th>Aut / Cheque</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>