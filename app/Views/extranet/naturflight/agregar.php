<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Naturflight</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">AGREGAR</h6>
                </div>
                <div class="card-body">
                    <form id="formAgregarNaturFlight" class="row g-3">
                        <div class="col-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="datos-generales-tab" data-toggle="tab" href="#datosGenerales" role="tab" aria-controls="datosGenerales" aria-selected="true">
                                        <strong>Datos Generales</strong>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="datos-fiscales-tab" data-toggle="tab" href="#datosFiscales" role="tab" aria-controls="datosFiscales" aria-selected="false">
                                        <strong>Datos Fiscales</strong>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="datosGenerales" role="tabpanel" aria-labelledby="datos-generales-tab">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control" id="nombreNaturFlight" name="nombreNaturFlight" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email Reservaciones</label> 
                                                <input class="form-control" type="email" id="emailreservacionesNaturFlight" name="emailreservacionesNaturFlight" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email Tarifas</label> 
                                                <input class="form-control" type="email" id="emailtarifasNaturFlight" name="emailtarifasNaturFlight" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nombre Contacto</label> 
                                                <input class="form-control" type="texto" id="contactoNaturFlight" name="contactoNaturFlight" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Teléfono Principal</label> 
                                                <input class="form-control" type="texto" id="telefonoprincipalNaturFlight" name="telefonoprincipalNaturFlight" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Teléfono Adicional</label> 
                                                <input class="form-control" type="texto" id="telefonoadicionalNaturFlight" name="telefonoadicionalNaturFlight" required> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="datosFiscales" role="tabpanel" aria-labelledby="datos-fiscales-tab">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Razón Social</label>
                                                <input type="text" class="form-control" id="razonsocialfiscalNaturFlight" name="razonsocialfiscalNaturFlight" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>RFC</label>
                                                <input type="text" class="form-control" id="rfcfiscalNaturFlight" name="rfcfiscalNaturFlight" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Código Postal</label> 
                                                <input class="form-control" type="number" id="cp_fiscalNaturFlight" name="cp_fiscalNaturFlight" onkeyup="BuscarCP('fiscalNaturFlight')" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Calle y N°</label>
                                                <input type="text" class="form-control" id="callenumfiscalNaturFlight" name="callenumfiscalNaturFlight" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Colonia</label>
                                                <select class="form-control" id="colonia_fiscalNaturFlight" name="colonia_fiscalNaturFlight" required>
                                                    <option value="0">Seleccionar...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Municipio</label>
                                                <input type="text" class="form-control" id="municipio_fiscalNaturFlight" name="municipio_fiscalNaturFlight" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <input type="text" class="form-control" id="estado_fiscalNaturFlight" name="estado_fiscalNaturFlight" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>País</label>
                                                <input type="text" class="form-control" id="paisfiscalNaturFlight" name="paisfiscalNaturFlight" value="México" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label> 
                                                <input class="form-control" type="email" id="emailfiscalNaturFlight" name="emailfiscalNaturFlight" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="formaPago">Forma de Pago</label>
                                            <select class="form-control" id="formaPagoNaturFlight" name="formaPagoNaturFlight">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($formaspago as $x){ if($x['clave_forma_pago'] == '02' || $x['clave_forma_pago'] == '03' || $x['clave_forma_pago'] == '04'){ ?>
                                                <option value="<?= $x['clave_forma_pago']; ?>"><?= $x['nombre_forma_pago']; ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="metodoPago">Método de Pago</label>
                                            <select class="form-control" id="metodoPagoNaturFlight" name="metodoPagoNaturFlight">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($metodospago as $x){ ?>
                                                <option value="<?= $x['clave_metodo_pago']; ?>"><?= $x['nombre_metodo_pago']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="regimenFiscal">Régimen Fiscal</label>
                                            <select class="form-control" id="regimenFiscalNaturFlight" name="regimenFiscalNaturFlight">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($regimen as $x){ ?>
                                                <option value="<?= $x['clave_regimen_fiscal']; ?>"><?= $x['clave_regimen_fiscal']." - ".$x['nombre_regimen_fiscal']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="usoCFDI">Uso del CFDI</label>
                                            <select class="form-control" id="usoCFDINaturFlight" name="usoCFDINaturFlight">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($cfdi as $x){ ?>
                                                <option value="<?= $x['clave_cfdi']; ?>"><?= $x['clave_cfdi']." - ".$x['nombre_cfdi']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2 text-center"><button id="btnAgregarNaturFlight" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Basic Card Example -->
        <div class="col-12"> 
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">LISTADO NATURFLIGHT</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display tablanaturleon" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Estado</th>
                                    <th>Aerolinea</th>
                                    <th>Emails</th>
                                    <th>Teléfonos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($flights)){ foreach($flights as $x){ ?>
                                <tr>
                                    <td class="text-center">
                                        <?php if($x['estatus_naturflight'] == "1"){ ?>
                                            <span class="badge badge-success">Activo</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Inactivo</span>
                                        <?php } ?>
                                    </td>

                                    <td>
                                        <strong><?= $x['nombre_comercial']; ?></strong><br>
                                    </td>

                                    <td>
                                        <small class="font-weight-bold"><?= $x['email_reservaciones']; ?></small><br>
                                        <small class="text-muted"><?= $x['telefono_principal']; ?></small>
                                    </td>

                                    <td>
                                        <small><?= $x['email_tarifas']; ?></small><br>
                                        <small class="text-muted"><?= $x['telefono_adicional']; ?></small>
                                    </td>

                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary btn-sm" title="Administrar" onclick="AdministrarNF(<?= $x['id_naturflight']; ?>)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                            <?php if($x['estatus_naturflight'] == 1){ ?>
                                                <button type="button" class="btn btn-danger btn-sm" title="Desactivar" onclick="CambiarStatusNF(<?= $x['id_naturflight']; ?>,0)">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-success btn-sm" title="Activar" onclick="CambiarStatusNF(<?= $x['id_naturflight']; ?>,1)">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php }} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->