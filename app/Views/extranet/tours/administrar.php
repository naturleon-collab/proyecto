<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white"><?= $tour[0]['nombre_tour']; ?></h6>
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
                                            <form id="formDatosGeneralesTour" class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Nombre</label>
                                                        <input type="text" class="form-control" id="nombreTour" name="nombreTour" value="<?= $tour[0]['nombre_tour']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Destino</label>
                                                        <select class="form-control selectpicker" data-live-search="true" id="destinoTour" name="destinoTour" required>
                                                            <option value="0">Seleccionar...</option>
                                                            <optgroup label="NACIONALES">
                                                                <?php if(!empty($destinosnacionales)){ foreach($destinosnacionales as $x){ ?>
                                                                    <option value="<?= $x['id_destino']; ?>" <?php if($x['id_destino'] == $tour[0]['destino_tour']){ echo "selected"; } ?>><?= $x['nombre_destino']; ?></option>
                                                                <?php } } ?>
                                                            </optgroup>
                                                            <optgroup label="INTERNACIONALES">
                                                                <?php if(!empty($destinosinternacionales)){ foreach($destinosinternacionales as $x){ ?>
                                                                    <option value="<?= $x['id_destino']; ?>" <?php if($x['id_destino'] == $tour[0]['destino_tour']){ echo "selected"; } ?>><?= $x['nombre_destino']; ?></option>
                                                                <?php } } ?>
                                                            </optgroup>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Email Reservaciones</label> 
                                                        <input class="form-control" type="email" id="emailreservacionesTour" name="emailreservacionesTour" value="<?= $tour[0]['email_reservaciones']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Email Tarifas</label> 
                                                        <input class="form-control" type="email" id="emailtarifasTour" name="emailtarifasTour" value="<?= $tour[0]['email_tarifas']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Nombre Contacto</label> 
                                                        <input class="form-control" type="texto" id="contactoTour" name="contactoTour" value="<?= $tour[0]['nombre_contacto']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Teléfono Principal</label> 
                                                        <input class="form-control" type="texto" id="telefonoprincipalTour" name="telefonoprincipalTour" value="<?= $tour[0]['telefono_principal']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Teléfono Adicional</label> 
                                                        <input class="form-control" type="texto" id="telefonoadicionalTour" name="telefonoadicionalTour" value="<?= $tour[0]['telefono_adicional']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Ubicación</label>
                                                        <input class="form-control" type="texto" id="ubicacionTour" name="ubicacionTour" value="<?= $tour[0]['ubicacion_texto']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Descripción</label>
                                                        <textarea class="form-control" id="descripcionTour" name="descripcionTour" rows="5" required><?= $tour[0]['descripcion_tour']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Logotipo</label> <small>.jpg máx de 2MB</small>
                                                        <input type="file" class="form-control" name="logotipo_tour" id="logotipo_tour" accept="image/*"><br>
                                                        <label>Logotipo Actual</label><br>
                                                        <img width="50%" src="<?= base_url($tour[0]['logotipo_tour']); ?>" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2 text-center">
                                                    <button id="btnDatosGeneralesTour" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="datosFiscales" role="tabpanel" aria-labelledby="datos-fiscales-tab2">
                                    <div class="card shadow mb-2">
                                        <div class="card-body">
                                            <form id="formDatosFiscalesTour" class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Razón Social</label>
                                                        <input type="text" class="form-control" id="razonsocialfiscalTour" name="razonsocialfiscalTour" value="<?= $tour[0]['razon_social_fiscal']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>RFC</label>
                                                        <input type="text" class="form-control" id="rfcfiscalTour" name="rfcfiscalTour" value="<?= $tour[0]['rfc_fiscal']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Código Postal</label>
                                                        <input class="form-control" type="number" id="cp_fiscalTour2" name="cp_fiscalTour2" value="<?= $tour[0]['cp_fiscal']; ?>" onkeyup="BuscarCP('fiscalTour2')" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Calle y N°</label>
                                                        <input type="text" class="form-control" id="callenumfiscalTour" name="callenumfiscalTour" value="<?= $tour[0]['calle_num_fiscal']; ?>"  required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Colonia</label>
                                                        <select class="form-control" id="colonia_fiscalTour2" name="colonia_fiscalTour2" required>
                                                            <?php if(!empty($colonias)){ foreach($colonias as $x){ ?>
                                                            <option value="<?= $x['nombre_colonia']; ?>" <?php if($x['nombre_colonia'] == $tour[0]['colonia_fiscal']){ echo "selected"; } ?>><?= $x['nombre_colonia']; ?></option>
                                                            <?php }} ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Estado</label>
                                                        <input type="text" class="form-control" id="estado_fiscalTour2" name="estado_fiscalTour2" value="<?= $tour[0]['municipio_fiscal']; ?>" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Municipio</label>
                                                        <input type="text" class="form-control" id="municipio_fiscalTour2" name="municipio_fiscalTour2" value="<?= $tour[0]['estado_fiscal']; ?>" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>País</label>
                                                        <input type="text" class="form-control" id="paisfiscalTour" name="paisfiscalTour" value="<?= $tour[0]['pais_fiscal']; ?>" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email</label> 
                                                        <input class="form-control" type="email" id="emailfiscalTour" name="emailfiscalTour" value="<?= $tour[0]['email_fiscal']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="formaPago">Forma de Pago</label>
                                                    <select class="form-control" id="formaPagoTour" name="formaPagoTour">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($formaspago as $x){ if($x['clave_forma_pago'] == '02' || $x['clave_forma_pago'] == '03' || $x['clave_forma_pago'] == '04'){ ?>
                                                        <option value="<?= $x['clave_forma_pago']; ?>" <?php if($tour[0]['clave_forma_pago'] == $x['clave_forma_pago']){ echo "selected"; } ?>><?= $x['nombre_forma_pago']; ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="metodoPago">Método de Pago</label>
                                                    <select class="form-control" id="metodoPagoTour" name="metodoPagoTour">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($metodospago as $x){ ?>
                                                        <option value="<?= $x['clave_metodo_pago']; ?>" <?php if($tour[0]['clave_metodo_pago'] == $x['clave_metodo_pago']){ echo "selected"; } ?>><?= $x['nombre_metodo_pago']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="regimenFiscal">Régimen Fiscal</label>
                                                    <select class="form-control" id="regimenFiscalTour" name="regimenFiscalTour">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($regimen as $x){ ?>
                                                        <option value="<?= $x['clave_regimen_fiscal']; ?>" <?php if($tour[0]['clave_regimen_fiscal'] == $x['clave_regimen_fiscal']){ echo "selected"; } ?>><?= $x['clave_regimen_fiscal']." - ".$x['nombre_regimen_fiscal']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="usoCFDI">Uso del CFDI</label>
                                                    <select class="form-control" id="usoCFDITour" name="usoCFDITour">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($cfdi as $x){ ?>
                                                        <option value="<?= $x['clave_cfdi']; ?>" <?php if($tour[0]['clave_uso_cfdi'] == $x['clave_cfdi']){ echo "selected"; } ?>><?= $x['clave_cfdi']." - ".$x['nombre_cfdi']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-12 mt-2 text-center">
                                                    <button id="btnDatosFiscalesTour" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button>
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
                                                    <strong>CUENTAS BANCARIAS</strong> <button onclick="AgregarNuevaCuentaTour()" type="button" class="ml-4 btn btn-sm btn-primary" title="Agregar Cuenta"><i class="fas fa-plus"></i></button>
                                                    <hr>
                                                    <span class="text-primary">CUENTAS</span><br>
                                                    <?php if(!empty($cuentas)){ foreach($cuentas as $x){ ?>
                                                        <label style="cursor:pointer;" onclick="EditarCuentaTour(<?= $x['id_cuenta_tour']; ?>)">•<?= $x['alias_cuenta']; ?></label><br>
                                                    <?php }} ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow mb-4">
                                                <div class="card-body">
                                                    <strong>DETALLE DE LA CUENTA</strong>
                                                    <hr>
                                                    <form id="FormGuardarCuentaTour" class="row g-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">Alias</label>
                                                            <input type="text" class="form-control" id="aliasCuentaTour" name="aliasCuentaTour" required>
                                                            <input type="hidden" class="form-control" id="idCuentaTour" name="idCuentaTour" value="0" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Nombre</label>
                                                            <input type="text" class="form-control" id="nombreCuentaTour" name="nombreCuentaTour" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Institución</label>
                                                            <input type="text" class="form-control" id="institucionCuentaTour" name="institucionCuentaTour" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Tipo Cuenta</label>
                                                            <input type="text" class="form-control" id="tipoCuentaTour" name="tipoCuentaTour" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">N° de Cuenta</label>
                                                            <input type="text" class="form-control" id="numCuentaTour" name="numCuentaTour" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Cuenta Clabe</label>
                                                            <input type="text" class="form-control" id="clabeCuentaTour" name="clabeCuentaTour" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Observaciones</label>
                                                            <input type="text" class="form-control" id="observacionesCuentaTour" name="observacionesCuentaTour" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Status</label>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="statusCuentaTour" name="statusCuentaTour">
                                                                <label class="custom-control-label" for="statusCuentaTour"></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-4 mb-2 text-center">
                                                            <button id="btnGuardarCuentaTour" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
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
                                                            <input type="date" class="form-control" id="fechaInicioTarifasTour" value="<?= $fecha1; ?>">
                                                        </div>
                                                        <div class="col-md-3 col-sm-12">
                                                            <input type="date" class="form-control" id="fechaFinTarifasTour" value="<?= $fecha2; ?>">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12">
                                                            <button id="BtnBuscarTarifasFechasTour" class="btn btn-primary">BUSCAR</button>
                                                        </div>
                                                        <div class="col-12 table-responsive">
                                                            <hr>
                                                            <table class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle bg-easycheck text-white">Tours</th>
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
                                                                    <?php if(!empty($tours)): foreach($tours as $x): ?>
                                                                    <tr class="text-center align-middle">
                                                                        <td class="align-middle"><?= $x['nombre_tour']; ?></td>
                                                                        <?php foreach($dates as $date): ?>
                                                                            <td class="align-middle">
                                                                                <?php if(!empty($tarifas)): ?>
                                                                                    <?php foreach($tarifas as $t): ?>
                                                                                        <?php if($date == $t['fecha_tarifa'] && $x['id_tour'] == $t['id_tour']):?>
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
                                                                                                        <tr>
                                                                                                            <td><span class="badge badge-success">Infantil</span> <small class="text-muted"><?= number_format($t['infantil_markup'],0); ?>%</small></td>
                                                                                                            <td class="text-right text-monospace">$<?= number_format($t['infantil_neta'],2); ?></td>
                                                                                                            <td class="text-right font-weight-bold">$<?= number_format($t['infantil_publica'],2); ?></td>
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
                                                                    <?php endforeach; endif; ?>
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
                                            <form id="formAdministrarTarifasTour" class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="fechaInicioTarifaTour">Fecha Inicial</label>
                                                    <input type="date" class="form-control" id="fechaInicioTarifaTour" name="fechaInicioTarifaTour" required>      
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="fechaFinTarifaTour">Fecha Final</label>
                                                    <input type="date" class="form-control" id="fechaFinTarifaTour" name="fechaFinTarifaTour" required>      
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <label>Días de la Semana</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasTour" type="checkbox" value="Monday" id="LunesTour" checked>
                                                        <label class="form-check-label" for="Lunes">L</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasTour" type="checkbox" value="Tuesday" id="MartesTour" checked>
                                                        <label class="form-check-label" for="Martes">M</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasTour" type="checkbox" value="Wednesday" id="MiércolesTour" checked>
                                                        <label class="form-check-label" for="Miércoles">Mi</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasTour" type="checkbox" value="Thursday" id="JuevesTour" checked>
                                                        <label class="form-check-label" for="Jueves">J</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasTour" type="checkbox" value="Friday" id="ViernesTour" checked>
                                                        <label class="form-check-label" for="Viernes">V</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasTour" type="checkbox" value="Saturday" id="SábadoTour" checked>
                                                        <label class="form-check-label" for="Sábado">S</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasTour" type="checkbox" value="Sunday" id="DomingoTour" checked>
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

                                                    <div class="row mb-3 align-items-center">
                                                        <div class="col-md-3">
                                                            <label class="d-md-none font-weight-bold">Tipo:</label> <span class="h6 text-primary"><i class="fas fa-user"></i> Adulto</span>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-none small">Neta:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                                <input type="number" class="form-control cal-tarifa" id="tarifaAdulto_netaTour" name="tarifaAdulto_netaTour" placeholder="0.00" step="0.01" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-none small">Markup:</label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control cal-tarifa" id="tarifaAdulto_markupTour" name="tarifaAdulto_markupTour" placeholder="0" step="0.01" required>
                                                                <div class="input-group-append"><span class="input-group-text">%</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-none small">Pública:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text bg-light font-weight-bold">$</span></div>
                                                                <input type="number" class="form-control font-weight-bold" id="tarifaAdulto_publicaTour" name="tarifaAdulto_publicaTour" placeholder="0.00" step="0.01" readonly required>
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
                                                                <input type="number" class="form-control cal-tarifa" id="tarifaMenor_netaTour" name="tarifaMenor_netaTour" placeholder="0.00" step="0.01" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-none small">Markup:</label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control cal-tarifa" id="tarifaMenor_markupTour" name="tarifaMenor_markupTour" placeholder="0" step="0.01" required>
                                                                <div class="input-group-append"><span class="input-group-text">%</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-none small">Pública:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text bg-light font-weight-bold">$</span></div>
                                                                <input type="number" class="form-control font-weight-bold" id="tarifaMenor_publicaTour" name="tarifaMenor_publicaTour" placeholder="0.00" step="0.01" readonly required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="d-md-none">

                                                    <div class="row mb-3 align-items-center">
                                                        <div class="col-md-3">
                                                            <label class="d-md-none font-weight-bold">Tipo:</label>
                                                            <span class="h6 text-success"><i class="fas fa-baby"></i> Infantil</span>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-none small">Neta:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                                <input type="number" class="form-control cal-tarifa" id="tarifaInfantil_netaTour" name="tarifaInfantil_netaTour" placeholder="0.00" step="0.01" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-none small">Markup:</label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control cal-tarifa" id="tarifaInfantil_markupTour" name="tarifaInfantil_markupTour" placeholder="0" step="0.01" required>
                                                                <div class="input-group-append"><span class="input-group-text">%</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="d-md-none small">Pública:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text bg-light font-weight-bold">$</span></div>
                                                                <input type="number" class="form-control font-weight-bold" id="tarifaInfantil_publicaTour" name="tarifaInfantil_publicaTour" placeholder="0.00" step="0.01" readonly required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4 text-center">
                                                    <button id="btnAdministrarTarifasTour" type="submit" class="btn btn-primary font-weight-bold">GUARDAR TARIFAS</button>
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
                    <h6 class="m-0 font-weight-bold text-white">LISTADO DE TourS</h6>
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
                                        <strong><?= $x['nombre_Tour']; ?></strong><br>
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