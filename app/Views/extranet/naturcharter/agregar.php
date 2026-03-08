<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Naturcharter</h1>
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
                    <form id="formAgregarNaturcharter" class="row g-3">
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
                                                <input type="text" class="form-control" id="nombrecharter" name="nombrecharter" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email Reservaciones</label> 
                                                <input class="form-control" type="email" id="emailreservacionescharter" name="emailreservacionescharter" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email Tarifas</label> 
                                                <input class="form-control" type="email" id="emailtarifascharter" name="emailtarifascharter" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nombre Contacto</label> 
                                                <input class="form-control" type="texto" id="contactocharter" name="contactocharter" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Teléfono Principal</label> 
                                                <input class="form-control" type="texto" id="telefonoprincipalcharter" name="telefonoprincipalcharter" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Teléfono Adicional</label> 
                                                <input class="form-control" type="texto" id="telefonoadicionalcharter" name="telefonoadicionalcharter" required> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="datosFiscales" role="tabpanel" aria-labelledby="datos-fiscales-tab">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Razón Social</label>
                                                <input type="text" class="form-control" id="razonsocialfiscalcharter" name="razonsocialfiscalcharter" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>RFC</label>
                                                <input type="text" class="form-control" id="rfcfiscalcharter" name="rfcfiscalcharter" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Código Postal</label> 
                                                <input class="form-control" type="number" id="cp_fiscalcharter" name="cp_fiscalcharter" onkeyup="BuscarCP('fiscalcharter')" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Calle y N°</label>
                                                <input type="text" class="form-control" id="callenumfiscalcharter" name="callenumfiscalcharter" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Colonia</label>
                                                <select class="form-control" id="colonia_fiscalcharter" name="colonia_fiscalcharter" required>
                                                    <option value="0">Seleccionar...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Municipio</label>
                                                <input type="text" class="form-control" id="municipio_fiscalcharter" name="municipio_fiscalcharter" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <input type="text" class="form-control" id="estado_fiscalcharter" name="estado_fiscalcharter" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>País</label>
                                                <input type="text" class="form-control" id="paisfiscalcharter" name="paisfiscalcharter" value="México" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label> 
                                                <input class="form-control" type="email" id="emailfiscalcharter" name="emailfiscalcharter" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="formaPago">Forma de Pago</label>
                                            <select class="form-control" id="formaPagocharter" name="formaPagocharter">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($formaspago as $x){ if($x['clave_forma_pago'] == '02' || $x['clave_forma_pago'] == '03' || $x['clave_forma_pago'] == '04'){ ?>
                                                <option value="<?= $x['clave_forma_pago']; ?>"><?= $x['nombre_forma_pago']; ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="metodoPago">Método de Pago</label>
                                            <select class="form-control" id="metodoPagocharter" name="metodoPagocharter">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($metodospago as $x){ ?>
                                                <option value="<?= $x['clave_metodo_pago']; ?>"><?= $x['nombre_metodo_pago']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="regimenFiscal">Régimen Fiscal</label>
                                            <select class="form-control" id="regimenFiscalcharter" name="regimenFiscalcharter">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($regimen as $x){ ?>
                                                <option value="<?= $x['clave_regimen_fiscal']; ?>"><?= $x['clave_regimen_fiscal']." - ".$x['nombre_regimen_fiscal']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="usoCFDI">Uso del CFDI</label>
                                            <select class="form-control" id="usoCFDIcharter" name="usoCFDIcharter">
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
                        <div class="col-12 mt-2 text-center"><button id="btnAgregarNaturcharter" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button></div>
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
                    <h6 class="m-0 font-weight-bold text-white">LISTADO NATURCHARTER</h6>
                </div>
                <?php
                    $fecha1Formatted = date('Y-m-d');$fecha2Formatted = date('Y-m-d', strtotime('+31 days'));
                    $urlDestino = base_url()."ExtNaturcharter/Administrar?fechainicial=" . $fecha1Formatted . "&fechafinal=" . $fecha2Formatted;
                ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display tablanaturleon" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Estado</th>
                                    <th>Naturcharter</th>
                                    <th>Correos</th>
                                    <th>Teléfonos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($charters): foreach($charters as $x): ?>
                                <tr>
                                    <td class="text-center">
                                        <?php if($x['estatus'] == "1"){ ?>
                                            <span class="badge badge-success">Activo</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Inactivo</span>
                                        <?php } ?>
                                    </td>

                                    <td>
                                        <strong><?= $x['nombre_charter']; ?></strong><br>
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
                                            <button type="button" class="btn btn-primary btn-sm" title="Administrar" onclick="AdministrarNC(<?= $x['id_charter']; ?>)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                            <?php if($x['estatus'] == 1){ ?>
                                                <button type="button" class="btn btn-danger btn-sm" title="Desactivar" onclick="CambiarStatusNC(<?= $x['id_charter']; ?>,0)">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-success btn-sm" title="Activar" onclick="CambiarStatusNC(<?= $x['id_charter']; ?>,1)">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->