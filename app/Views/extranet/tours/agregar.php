<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tours</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">AGREGAR TOUR</h6>
                </div>
                <div class="card-body">
                    <form id="formAgregarTour" class="row g-3">
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control" id="nombreTour" name="nombreTour" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Destino</label>
                                                <select class="form-control selectpicker" data-live-search="true" id="destinoTour" name="destinoTour" required>
                                                    <option value="0">Seleccionar...</option>
                                                    <optgroup label="NACIONALES">
                                                        <?php if(!empty($destinosnacionales)){ foreach($destinosnacionales as $x){ ?>
                                                            <option value="<?= $x['id_destino']; ?>"><?= $x['nombre_destino']; ?></option>
                                                        <?php } } ?>
                                                    </optgroup>
                                                    <optgroup label="INTERNACIONALES">
                                                        <?php if(!empty($destinosinternacionales)){ foreach($destinosinternacionales as $x){ ?>
                                                            <option value="<?= $x['id_destino']; ?>"><?= $x['nombre_destino']; ?></option>
                                                        <?php } } ?>
                                                    </optgroup>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Email Reservaciones</label> 
                                                <input class="form-control" type="email" id="emailreservacionesTour" name="emailreservacionesTour" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Email Tarifas</label> 
                                                <input class="form-control" type="email" id="emailtarifasTour" name="emailtarifasTour" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nombre Contacto</label> 
                                                <input class="form-control" type="texto" id="contactoTour" name="contactoTour" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Teléfono Principal</label> 
                                                <input class="form-control" type="texto" id="telefonoprincipalTour" name="telefonoprincipalTour" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Teléfono Adicional</label> 
                                                <input class="form-control" type="texto" id="telefonoadicionalTour" name="telefonoadicionalTour" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Ubicación</label>
                                                <input class="form-control" type="texto" id="ubicacionTour" name="ubicacionTour" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <textarea class="form-control" id="descripcionTour" name="descripcionTour" rows="5" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Logotipo</label> <small>.jpg máx de 2MB</small>
                                                <input type="file" class="form-control" name="logotipoTour" id="logotipoTour" accept="image/*" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="datosFiscales" role="tabpanel" aria-labelledby="datos-fiscales-tab">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Razón Social</label>
                                                <input type="text" class="form-control" id="razonsocialfiscalTour" name="razonsocialfiscalTour" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>RFC</label>
                                                <input type="text" class="form-control" id="rfcfiscalTour" name="rfcfiscalTour" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Código Postal</label> 
                                                <input class="form-control" type="number" id="cp_fiscalTour" name="cp_fiscalTour" onkeyup="BuscarCP('fiscalTour')" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Calle y N°</label>
                                                <input type="text" class="form-control" id="callenumfiscalTour" name="callenumfiscalTour" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Colonia</label>
                                                <select class="form-control" id="colonia_fiscalTour" name="colonia_fiscalTour" required>
                                                    <option value="0">Seleccionar...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Municipio</label>
                                                <input type="text" class="form-control" id="municipio_fiscalTour" name="municipio_fiscalTour" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <input type="text" class="form-control" id="estado_fiscalTour" name="estado_fiscalTour" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>País</label>
                                                <input type="text" class="form-control" id="paisfiscalTour" name="paisfiscalTour" value="México" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label> 
                                                <input class="form-control" type="email" id="emailfiscalTour" name="emailfiscalTour" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="formaPago">Forma de Pago</label>
                                            <select class="form-control" id="formaPagoTour" name="formaPagoTour">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($formaspago as $x){ if($x['clave_forma_pago'] == '02' || $x['clave_forma_pago'] == '03' || $x['clave_forma_pago'] == '04'){ ?>
                                                <option value="<?= $x['clave_forma_pago']; ?>"><?= $x['nombre_forma_pago']; ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="metodoPago">Método de Pago</label>
                                            <select class="form-control" id="metodoPagoTour" name="metodoPagoTour">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($metodospago as $x){ ?>
                                                <option value="<?= $x['clave_metodo_pago']; ?>"><?= $x['nombre_metodo_pago']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="regimenFiscal">Régimen Fiscal</label>
                                            <select class="form-control" id="regimenFiscalTour" name="regimenFiscalTour">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($regimen as $x){ ?>
                                                <option value="<?= $x['clave_regimen_fiscal']; ?>"><?= $x['clave_regimen_fiscal']." - ".$x['nombre_regimen_fiscal']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="usoCFDI">Uso del CFDI</label>
                                            <select class="form-control" id="usoCFDITour" name="usoCFDITour">
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
                        <div class="col-12 mt-2 text-center"><button id="btnAgregarTour" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button></div>
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
                    <h6 class="m-0 font-weight-bold text-white">LISTADO DE TOURS</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display tablanaturleon" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Estado</th>
                                    <th>Tour / Destino</th>
                                    <th>Contacto</th>
                                    <th>Contacto Adicional</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($tours)){ foreach($tours as $x){ ?>
                                <tr>
                                    <td class="text-center">
                                        <?php if($x['estado_registro'] == "1"){ ?>
                                            <span class="badge badge-success">Activo</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Inactivo</span>
                                        <?php } ?>
                                    </td>

                                    <td>
                                        <strong><?= $x['nombre_tour']; ?></strong><br>
                                        <small class="text-muted"><?= $x['nombre_destino']; ?></small>
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
                                            <button type="button" class="btn btn-primary btn-sm" title="Administrar" onclick="AdministrarTour(<?= $x['id_tour']; ?>)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                            <?php if($x['estado_registro'] == 1){ ?>
                                                <button type="button" class="btn btn-danger btn-sm" title="Desactivar" onclick="CambiarStatusTour(<?= $x['id_tour']; ?>,0)">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-success btn-sm" title="Activar" onclick="CambiarStatusTour(<?= $x['id_tour']; ?>,1)">
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