<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white"><?= $flight[0]['nombre_comercial']; ?></h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="datos-generales-tab" data-toggle="tab" href="#datosGenerales" role="tab" aria-controls="datosGenerales" aria-selected="true">
                                        GENERALES
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="datos-fiscales-tab" data-toggle="tab" href="#datosFiscales" role="tab" aria-controls="datosFiscales" aria-selected="false">
                                        FISCALES
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="cuentas-bancarias-tab" data-toggle="tab" href="#cuentasBancarias" role="tab" aria-controls="cuentasBancarias" aria-selected="false">
                                        CUENTAS
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tarifas-tab" data-toggle="tab" href="#tarifas" role="tab" aria-controls="tarifas" aria-selected="false">
                                        TARIFAS
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="datosGenerales" role="tabpanel" aria-labelledby="datos-generales-tab2">
                                    <div class="card shadow mb-2">
                                        <div class="card-body">
                                            <form id="formDatosGeneralesNaturFlight" class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nombre</label>
                                                        <input type="text" class="form-control" id="nombreNaturFlight" name="nombreNaturFlight" value="<?= $flight[0]['nombre_comercial']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email Reservaciones</label> 
                                                        <input class="form-control" type="email" id="emailreservacionesNaturFlight" name="emailreservacionesNaturFlight" value="<?= $flight[0]['email_reservaciones']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email Tarifas</label> 
                                                        <input class="form-control" type="email" id="emailtarifasNaturFlight" name="emailtarifasNaturFlight" value="<?= $flight[0]['email_tarifas']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nombre Contacto</label> 
                                                        <input class="form-control" type="texto" id="contactoNaturFlight" name="contactoNaturFlight" value="<?= $flight[0]['nombre_contacto']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Teléfono Principal</label> 
                                                        <input class="form-control" type="texto" id="telefonoprincipalNaturFlight" name="telefonoprincipalNaturFlight" value="<?= $flight[0]['telefono_principal']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Teléfono Adicional</label> 
                                                        <input class="form-control" type="texto" id="telefonoadicionalNaturFlight" name="telefonoadicionalNaturFlight" value="<?= $flight[0]['telefono_adicional']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2 text-center">
                                                    <button id="btnDatosGeneralesNaturFlight" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="datosFiscales" role="tabpanel" aria-labelledby="datos-fiscales-tab2">
                                    <div class="card shadow mb-2">
                                        <div class="card-body">
                                            <form id="formDatosFiscalesNaturFlight" class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Razón Social</label>
                                                        <input type="text" class="form-control" id="razonsocialfiscalNaturFlight" name="razonsocialfiscalNaturFlight" value="<?= $flight[0]['razon_social']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>RFC</label>
                                                        <input type="text" class="form-control" id="rfcfiscalNaturFlight" name="rfcfiscalNaturFlight" value="<?= $flight[0]['rfc']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Código Postal</label>
                                                        <input class="form-control" type="number" id="cp_fiscalNaturFlight2" name="cp_fiscalNaturFlight2" value="<?= $flight[0]['codigo_postal']; ?>" onkeyup="BuscarCP('fiscalNaturFlight2')" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Calle y N°</label>
                                                        <input type="text" class="form-control" id="callenumfiscalNaturFlight" name="callenumfiscalNaturFlight" value="<?= $flight[0]['calle_numero']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Colonia</label>
                                                        <select class="form-control" id="colonia_fiscalNaturFlight2" name="colonia_fiscalNaturFlight2" required>
                                                            <?php if(!empty($colonias)){ foreach($colonias as $x){ ?>
                                                            <option value="<?= $x['nombre_colonia']; ?>" <?php if($x['nombre_colonia'] == $flight[0]['colonia']){ echo "selected"; } ?>><?= $x['nombre_colonia']; ?></option>
                                                            <?php }} ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Estado</label>
                                                        <input type="text" class="form-control" id="estado_fiscalNaturFlight2" name="estado_fiscalNaturFlight2" value="<?= $flight[0]['estado_fiscal']; ?>" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Municipio</label>
                                                        <input type="text" class="form-control" id="municipio_fiscalNaturFlight2" name="municipio_fiscalNaturFlight2" value="<?= $flight[0]['municipio']; ?>" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>País</label>
                                                        <input type="text" class="form-control" id="paisfiscalNaturFlight" name="paisfiscalNaturFlight" value="<?= $flight[0]['pais_fiscal']; ?>" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email</label> 
                                                        <input class="form-control" type="email" id="emailfiscalNaturFlight" name="emailfiscalNaturFlight" value="<?= $flight[0]['email_fiscal']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="formaPago">Forma de Pago</label>
                                                    <select class="form-control" id="formaPagoNaturFlight" name="formaPagoNaturFlight">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($formaspago as $x){ if($x['clave_forma_pago'] == '02' || $x['clave_forma_pago'] == '03' || $x['clave_forma_pago'] == '04'){ ?>
                                                        <option value="<?= $x['clave_forma_pago']; ?>" <?php if($flight[0]['clave_forma_pago'] == $x['clave_forma_pago']){ echo "selected"; } ?>><?= $x['nombre_forma_pago']; ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="metodoPago">Método de Pago</label>
                                                    <select class="form-control" id="metodoPagoNaturFlight" name="metodoPagoNaturFlight">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($metodospago as $x){ ?>
                                                        <option value="<?= $x['clave_metodo_pago']; ?>" <?php if($flight[0]['clave_metodo_pago'] == $x['clave_metodo_pago']){ echo "selected"; } ?>><?= $x['nombre_metodo_pago']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="regimenFiscal">Régimen Fiscal</label>
                                                    <select class="form-control" id="regimenFiscalNaturFlight" name="regimenFiscalNaturFlight">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($regimen as $x){ ?>
                                                        <option value="<?= $x['clave_regimen_fiscal']; ?>" <?php if($flight[0]['clave_regimen_fiscal'] == $x['clave_regimen_fiscal']){ echo "selected"; } ?>><?= $x['clave_regimen_fiscal']." - ".$x['nombre_regimen_fiscal']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="usoCFDI">Uso del CFDI</label>
                                                    <select class="form-control" id="usoCFDINaturFlight" name="usoCFDINaturFlight">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($cfdi as $x){ ?>
                                                        <option value="<?= $x['clave_cfdi']; ?>" <?php if($flight[0]['clave_uso_cfdi'] == $x['clave_cfdi']){ echo "selected"; } ?>><?= $x['clave_cfdi']." - ".$x['nombre_cfdi']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-12 mt-2 text-center">
                                                    <button id="btnDatosFiscalesNaturFlight" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button>
                                                </div>
                                            </form>                        
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="cuentasBancarias" role="tabpanel" aria-labelledby="cuentas-bancarias-tab">
                                    <div class="row">
                                        <div class="col-md-auto">
                                            <div class="card shadow mb-4">
                                                <div class="card-body">
                                                    <strong>CUENTAS BANCARIAS</strong> <button onclick="AgregarNuevaCuentaNF()" type="button" class="ml-4 btn btn-sm btn-primary" title="Agregar Cuenta"><i class="fas fa-plus"></i></button>
                                                    <hr>
                                                    <span class="text-primary">CUENTAS</span><br>
                                                    <?php if(!empty($cuentas)){ foreach($cuentas as $x){ ?>
                                                        <label style="cursor:pointer;" onclick="EditarCuentaNF(<?= $x['id_cuenta']; ?>)">•<?= $x['alias_cuenta']; ?></label><br>
                                                    <?php }} ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow mb-4">
                                                <div class="card-body">
                                                    <strong>DETALLE DE LA CUENTA</strong>
                                                    <hr>
                                                    <form id="FormGuardarCuentaNaturFlight" class="row g-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">Alias</label>
                                                            <input type="text" class="form-control" id="aliasCuentaNaturFlight" name="aliasCuentaNaturFlight" required>
                                                            <input type="hidden" class="form-control" id="idCuentaNaturFlight" name="idCuentaNaturFlight" value="0" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Nombre</label>
                                                            <input type="text" class="form-control" id="nombreCuentaNaturFlight" name="nombreCuentaNaturFlight" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Institución</label>
                                                            <input type="text" class="form-control" id="institucionCuentaNaturFlight" name="institucionCuentaNaturFlight" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Tipo Cuenta</label>
                                                            <input type="text" class="form-control" id="tipoCuentaNaturFlight" name="tipoCuentaNaturFlight" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">N° de Cuenta</label>
                                                            <input type="text" class="form-control" id="numCuentaNaturFlight" name="numCuentaNaturFlight" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Cuenta Clabe</label>
                                                            <input type="text" class="form-control" id="clabeCuentaNaturFlight" name="clabeCuentaNaturFlight" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Observaciones</label>
                                                            <input type="text" class="form-control" id="observacionesCuentaNaturFlight" name="observacionesCuentaNaturFlight" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Status</label>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="statusCuentaNaturFlight" name="statusCuentaNaturFlight">
                                                                <label class="custom-control-label" for="statusCuentaNaturFlight"></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-4 mb-2 text-center">
                                                            <button id="btnGuardarCuentaNaturFlight" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tarifas" role="tabpanel" aria-labelledby="tarifas-tab">
                                    <div id="accordion">
                                        <div class="card shadow mb-2">
                                            <div class="card-header bg-easycheck" id="headingVerTarifas">
                                                <h5 class="mb-0">
                                                <button class="btn btn-link font-weight-bold text-white" data-toggle="collapse" data-target="#collapseVerTarifas" aria-expanded="false" aria-controls="collapseOne">
                                                    VER TARIFAS <small>Clic para ver más</small>
                                                </button>
                                                </h5>
                                            </div>
                                            <div id="collapseVerTarifas" class="collapse" aria-labelledby="headingVerTarifas" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12 text-center">
                                                            Tarifas del<br>
                                                            <?php echo date("d/m/Y",strtotime($fecha1))." al ".date("d/m/Y",strtotime($fecha2)); ?>
                                                        </div>
                                                        <div class="col-md-3 col-sm-12">
                                                            <input type="date" class="form-control" id="fechaInicioTarifasNaturFlight" value="<?= $fecha1; ?>">
                                                        </div>
                                                        <div class="col-md-3 col-sm-12">
                                                            <input type="date" class="form-control" id="fechaFinTarifasNaturFlight" value="<?= $fecha2; ?>">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12">
                                                            <button id="BtnBuscarTarifasFechasNaturFlight" class="btn btn-primary">BUSCAR</button>
                                                        </div>
                                                        <div class="col-12 table-responsive">
                                                            <hr>
                                                            <table class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle bg-easycheck text-white">Rutas</th>
                                                                        <?php foreach($dates as $date){ ?>
                                                                        <th class="text-center align-middle bg-easycheck text-white">
                                                                            <?php
                                                                            $day_english = date('D', strtotime($date));
                                                                            $day_spanish = '';
                                                                            if ($day_english === 'Sun') {
                                                                                $day_spanish = 'Dom';
                                                                            } elseif ($day_english === 'Mon') {
                                                                                $day_spanish = 'Lun';
                                                                            } elseif ($day_english === 'Tue') {
                                                                                $day_spanish = 'Mar';
                                                                            } elseif ($day_english === 'Wed') {
                                                                                $day_spanish = 'Mié';
                                                                            } elseif ($day_english === 'Thu') {
                                                                                $day_spanish = 'Jue';
                                                                            } elseif ($day_english === 'Fri') {
                                                                                $day_spanish = 'Vie';
                                                                            } elseif ($day_english === 'Sat') {
                                                                                $day_spanish = 'Sáb';
                                                                            }
                                                                            echo $day_spanish . " " . date("d/m", strtotime($date));
                                                                            ?>
                                                                        </th>
                                                                        <?php } ?>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if(!empty($flights)): ?> 
                                                                    <?php foreach($flights as $x): ?>
                                                                    <tr class="text-center align-middle">
                                                                        <td class="align-middle"><?= $x['nombre_comercial']; ?></td>
                                                                        <?php foreach($dates as $date): ?>
                                                                        <td class="align-middle">
                                                                            <?php if(!empty($tarifas)): ?>
                                                                                <?php foreach($tarifas as $t): ?>
                                                                                    <?php if($date == $t['fecha_tarifa'] && $x['id_naturflight'] == $t['id_naturflight']):?>
                                                                                    <div class="card shadow-sm mb-2">
                                                                                        <div class="card-body p-2" style="font-size: 0.85rem; min-width: 180px;">
                                                                                            
                                                                                            <table class="table table-sm table-borderless mb-0">
                                                                                                <thead>
                                                                                                    <tr class="border-bottom">
                                                                                                        <th class="p-0">Tipo</th>
                                                                                                        <th class="p-0 text-right">Neta</th>
                                                                                                        <th class="p-0 text-right">Púb.</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td><span class="badge badge-primary">Adulto</span> <small class="text-muted"><?= number_format($t['adulto_markup'],0); ?>%</small></td>
                                                                                                        <td class="text-right text-monospace">$<?= number_format($t['adulto_neta'],2); ?></td>
                                                                                                        <td class="text-right font-weight-bold">$<?= number_format($t['adulto_publica'],2); ?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><span class="badge badge-info">Menor</span> <small class="text-muted"><?= number_format($t['menor_markup'],0); ?>%</small></td>
                                                                                                        <td class="text-right text-monospace">$<?= number_format($t['menor_neta'],2); ?></td>
                                                                                                        <td class="text-right font-weight-bold">$<?= number_format($t['menor_publica'],2); ?></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>

                                                                                        </div>
                                                                                    </div>
                                                                                    <?php endif; ?>
                                                                                <?php endforeach; ?>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <?php endforeach; ?>
                                                                    </tr>
                                                                    <?php endforeach; ?> 
                                                                    <?php endif; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card shadow mb-2">
                                        <div class="card-header bg-easycheck font-weight-bold text-white">ADMINISTRAR TARIFAS</div>
                                        <div class="card-body">
                                            <form id="formAdministrarTarifasNaturflight" class="row">
                                                <div class="col-md-4 col-sm-12">
                                                    <label for="fechaInicioTarifaNaturFlight">Fecha Inicial</label>
                                                    <input type="date" class="form-control" id="fechaInicioTarifaNaturFlight" name="fechaInicioTarifaNaturFlight" required>      
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <label for="fechaFinTarifaNaturFlight">Fecha Final</label>
                                                    <input type="date" class="form-control" id="fechaFinTarifaNaturFlight" name="fechaFinTarifaNaturFlight" required>      
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <label for="rutaTarifaNaturFlight">Rutas</label>
                                                    <select class="form-control" id="rutaTarifaNaturFlight" name="rutaTarifaNaturFlight">
                                                        <option value="0">Selecciona...</option>
                                                        <?php if(!empty($rutas)): foreach($rutas as $x): ?>
                                                        <option value="<?= $x['id_ruta']; ?>"><?= $x['nombre_ruta']; ?></option>
                                                        <?php endforeach; endif; ?>
                                                    <select> 
                                                </div>
                                                <div class="col-md-12 text-center col-sm-12 mt-4 mb-4">
                                                    <label>Días de la Semana</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasNaturFlight" type="checkbox" value="Monday" id="LunesNaturFlight">
                                                        <label class="form-check-label" for="Lunes">L</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasNaturFlight" type="checkbox" value="Tuesday" id="MartesNaturFlight">
                                                        <label class="form-check-label" for="Martes">M</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasNaturFlight" type="checkbox" value="Wednesday" id="MiércolesNaturFlight">
                                                        <label class="form-check-label" for="Miércoles">Mi</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasNaturFlight" type="checkbox" value="Thursday" id="JuevesNaturFlight">
                                                        <label class="form-check-label" for="Jueves">J</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasNaturFlight" type="checkbox" value="Friday" id="ViernesNaturFlight">
                                                        <label class="form-check-label" for="Viernes">V</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasNaturFlight" type="checkbox" value="Saturday" id="SábadoNaturFlight">
                                                        <label class="form-check-label" for="Sábado">S</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasNaturFlight" type="checkbox" value="Sunday" id="DomingoNaturFlight">
                                                        <label class="form-check-label" for="Domingo">D</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row mb-2 d-none d-md-flex font-weight-bold text-center">
                                                        <div class="col-md-3">Tipo Pasajero</div>
                                                        <div class="col-md-3">Tarifa Neta</div>
                                                        <div class="col-md-3">Markup / Utilidad</div>
                                                        <div class="col-md-3">Tarifa Pública</div>
                                                    </div>

                                                    <div class="row mb-3 align-items-center divTarifasPlanDefault">
                                                        <div class="col-md-3">
                                                            <label class="d-md-none font-weight-bold">Tipo:</label> <span class="h6 text-primary"><i class="fas fa-user"></i> Adulto</span>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-none small">Neta:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                                <input type="number" class="form-control cal-tarifa-naturflight" id="tarifaAdulto_netaNaturFlight" name="tarifaAdulto_netaNaturFlight" placeholder="0.00" step="0.01" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-none small">Markup:</label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control cal-tarifa-naturflight" id="tarifaAdulto_markupNaturFlight" name="tarifaAdulto_markupNaturFlight" placeholder="0" step="0.01">
                                                                <div class="input-group-append"><span class="input-group-text">%</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-none small">Pública:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text bg-light font-weight-bold">$</span></div>
                                                                <input type="number" class="form-control font-weight-bold" id="tarifaAdulto_publicaNaturFlight" name="tarifaAdulto_publicaNaturFlight" readonly placeholder="0.00" step="0.01" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="d-md-none"> <div class="row mb-3 align-items-center">
                                                        <div class="col-md-3">
                                                            <label class="d-md-none font-weight-bold">Tipo:</label>
                                                            <span class="h6 text-info"><i class="fas fa-child"></i> Menor</span>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-none small">Neta:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                                <input type="number" class="form-control cal-tarifa-naturflight" id="tarifaMenor_netaNaturFlight" name="tarifaMenor_netaNaturFlight" placeholder="0.00" step="0.01" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-none small">Markup:</label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control cal-tarifa-naturflight" id="tarifaMenor_markupNaturFlight" name="tarifaMenor_markupNaturFlight" placeholder="0" step="0.01">
                                                                <div class="input-group-append"><span class="input-group-text">%</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-none small">Pública:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text bg-light font-weight-bold">$</span></div>
                                                                <input type="number" class="form-control font-weight-bold" id="tarifaMenor_publicaNaturFlight" name="tarifaMenor_publicaNaturFlight" readonly placeholder="0.00" step="0.01" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4 text-center">
                                                    <button id="btnAdministrarTarifasNaturflight" type="submit" class="btn btn-primary font-weight-bold">GUARDAR TARIFAS</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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