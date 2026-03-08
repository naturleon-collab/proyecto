<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white"><?= $charter[0]['nombre_charter']; ?></h6>
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
                                            <form id="formDatosGeneralesCharter" class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nombre</label>
                                                        <input type="text" class="form-control" id="nombrecharter" name="nombrecharter" value="<?= $charter[0]['nombre_charter']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email Reservaciones</label> 
                                                        <input class="form-control" type="email" id="emailreservacionescharter" name="emailreservacionescharter" value="<?= $charter[0]['email_reservaciones']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email Tarifas</label> 
                                                        <input class="form-control" type="email" id="emailtarifascharter" name="emailtarifascharter" value="<?= $charter[0]['email_tarifas']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nombre Contacto</label> 
                                                        <input class="form-control" type="texto" id="contactocharter" name="contactocharter" value="<?= $charter[0]['contacto_principal']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Teléfono Principal</label> 
                                                        <input class="form-control" type="texto" id="telefonoprincipalcharter" name="telefonoprincipalcharter" value="<?= $charter[0]['telefono_principal']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Teléfono Adicional</label> 
                                                        <input class="form-control" type="texto" id="telefonoadicionalcharter" name="telefonoadicionalcharter" value="<?= $charter[0]['telefono_adicional']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2 text-center">
                                                    <button id="btnDatosGeneralesCharter" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="datosFiscales" role="tabpanel" aria-labelledby="datos-fiscales-tab2">
                                    <div class="card shadow mb-2">
                                        <div class="card-body">
                                            <form id="formDatosFiscalesCharter" class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Razón Social</label>
                                                        <input type="text" class="form-control" id="razonsocialfiscalcharter" name="razonsocialfiscalcharter" value="<?= $charter[0]['razon_social_fiscal']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>RFC</label>
                                                        <input type="text" class="form-control" id="rfcfiscalcharter" name="rfcfiscalcharter" value="<?= $charter[0]['rfc_fiscal']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Código Postal</label>
                                                        <input class="form-control" type="number" id="cp_fiscalcharter2" name="cp_fiscalcharter2" value="<?= $charter[0]['cp_fiscal']; ?>" onkeyup="BuscarCP('fiscalcharter2')" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Calle y N°</label>
                                                        <input type="text" class="form-control" id="callenumfiscalcharter" name="callenumfiscalcharter" value="<?= $charter[0]['calle_num_fiscal']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Colonia</label>
                                                        <select class="form-control" id="colonia_fiscalcharter2" name="colonia_fiscalcharter2" required>
                                                            <?php if(!empty($colonias)){ foreach($colonias as $x){ ?>
                                                            <option value="<?= $x['nombre_colonia']; ?>" <?php if($x['nombre_colonia'] == $charter[0]['colonia_fiscal']){ echo "selected"; } ?>><?= $x['nombre_colonia']; ?></option>
                                                            <?php }} ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Estado</label>
                                                        <input type="text" class="form-control" id="estado_fiscalcharter2" name="estado_fiscalcharter2" value="<?= $charter[0]['estado_fiscal']; ?>" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Municipio</label>
                                                        <input type="text" class="form-control" id="municipio_fiscalcharter2" name="municipio_fiscalcharter2" value="<?= $charter[0]['municipio_fiscal']; ?>" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>País</label>
                                                        <input type="text" class="form-control" id="paisfiscalcharter" name="paisfiscalcharter" value="<?= $charter[0]['pais_fiscal']; ?>" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email</label> 
                                                        <input class="form-control" type="email" id="emailfiscalcharter" name="emailfiscalcharter" value="<?= $charter[0]['email_fiscal']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="formaPago">Forma de Pago</label>
                                                    <select class="form-control" id="formaPagocharter" name="formaPagocharter">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($formaspago as $x){ if($x['clave_forma_pago'] == '02' || $x['clave_forma_pago'] == '03' || $x['clave_forma_pago'] == '04'){ ?>
                                                        <option value="<?= $x['clave_forma_pago']; ?>" <?php if($charter[0]['clave_forma_pago'] == $x['clave_forma_pago']){ echo "selected"; } ?>><?= $x['nombre_forma_pago']; ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="metodoPago">Método de Pago</label>
                                                    <select class="form-control" id="metodoPagocharter" name="metodoPagocharter">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($metodospago as $x){ ?>
                                                        <option value="<?= $x['clave_metodo_pago']; ?>" <?php if($charter[0]['clave_metodo_pago'] == $x['clave_metodo_pago']){ echo "selected"; } ?>><?= $x['nombre_metodo_pago']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="regimenFiscal">Régimen Fiscal</label>
                                                    <select class="form-control" id="regimenFiscalcharter" name="regimenFiscalcharter">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($regimen as $x){ ?>
                                                        <option value="<?= $x['clave_regimen_fiscal']; ?>" <?php if($charter[0]['clave_regimen_fiscal'] == $x['clave_regimen_fiscal']){ echo "selected"; } ?>><?= $x['clave_regimen_fiscal']." - ".$x['nombre_regimen_fiscal']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="usoCFDI">Uso del CFDI</label>
                                                    <select class="form-control" id="usoCFDIcharter" name="usoCFDIcharter">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($cfdi as $x){ ?>
                                                        <option value="<?= $x['clave_cfdi']; ?>" <?php if($charter[0]['clave_uso_cfdi'] == $x['clave_cfdi']){ echo "selected"; } ?>><?= $x['clave_cfdi']." - ".$x['nombre_cfdi']; ?>><?= $x['clave_cfdi']." - ".$x['nombre_cfdi']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-12 mt-2 text-center">
                                                    <button id="btnDatosFiscalesCharter" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button>
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
                                                    <strong>CUENTAS BANCARIAS</strong> <button onclick="AgregarNuevaCuentaCharter()" type="button" class="ml-4 btn btn-sm btn-primary" title="Agregar Cuenta"><i class="fas fa-plus"></i></button>
                                                    <hr>
                                                    <span class="text-primary">CUENTAS</span><br>
                                                    <?php if(!empty($cuentas)){ foreach($cuentas as $x){ ?>
                                                        <label style="cursor:pointer;" onclick="EditarCuentaCharter(<?= $x['id_cuenta']; ?>)">•<?= $x['alias_cuenta']; ?></label><br>
                                                    <?php }} ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow mb-4">
                                                <div class="card-body">
                                                    <strong>DETALLE DE LA CUENTA</strong>
                                                    <hr>
                                                    <form id="FormGuardarCuentaCharter" class="row g-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">Alias</label>
                                                            <input type="text" class="form-control" id="aliasCuentaCharter" name="aliasCuentaCharter" required>
                                                            <input type="hidden" class="form-control" id="idCuentaCharter" name="idCuentaCharter" value="0" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Nombre</label>
                                                            <input type="text" class="form-control" id="nombreCuentaCharter" name="nombreCuentaCharter" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Institución</label>
                                                            <input type="text" class="form-control" id="institucionCuentaCharter" name="institucionCuentaCharter" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Tipo Cuenta</label>
                                                            <input type="text" class="form-control" id="tipoCuentaCharter" name="tipoCuentaCharter" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">N° de Cuenta</label>
                                                            <input type="text" class="form-control" id="numCuentaCharter" name="numCuentaCharter" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Cuenta Clabe</label>
                                                            <input type="text" class="form-control" id="clabeCuentaCharter" name="clabeCuentaCharter" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Observaciones</label>
                                                            <input type="text" class="form-control" id="observacionesCuentaCharter" name="observacionesCuentaCharter" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Status</label>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="statusCuentaCharter" name="statusCuentaCharter">
                                                                <label class="custom-control-label" for="statusCuentaCharter"></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-4 mb-2 text-center">
                                                            <button id="btnGuardarCuentaCharter" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
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
                                                            <input type="date" class="form-control" id="fechaInicioTarifasCharter" value="<?= $fecha1; ?>">
                                                        </div>
                                                        <div class="col-md-3 col-sm-12">
                                                            <input type="date" class="form-control" id="fechaFinTarifasCharter" value="<?= $fecha2; ?>">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12">
                                                            <button id="BtnBuscarTarifasFechasCharter" class="btn btn-primary">BUSCAR</button>
                                                        </div>
                                                        <div class="col-12 table-responsive">
                                                            <hr>
                                                            <table class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle bg-easycheck text-white">Salidas</th>
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
                                                                            echo $day_spanish . " " . date("d/m/Y", strtotime($date));
                                                                            ?>
                                                                        </th>
                                                                        <?php } ?>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php if(!empty($salidas)): ?> 
                                                                    <?php foreach($salidas as $x): ?>
                                                                    <tr class="text-center align-middle">
                                                                        <td class="align-middle font-weight-bold text-dark">
                                                                            <?= $x['nombre']; ?>
                                                                        </td>

                                                                        <?php foreach($dates as $date): ?>
                                                                        <td class="p-1 align-middle">
                                                                            <?php if(!empty($tarifas)): ?>
                                                                                <?php foreach($tarifas as $t): ?>
                                                                                    <?php if($date == $t['fecha_tarifa'] && $x['id_salida'] == $t['id_salida']): ?>
                                                                                        
                                                                                        <div class="d-flex flex-column" style="min-width: 200px; font-size: 0.75rem;">
                                                                                            <?php 
                                                                                            $servicios = [
                                                                                                ['label' => 'ASIENTO', 'color' => 'primary', 'prefix' => 'asiento'],
                                                                                                ['label' => 'NATUR', 'color' => 'success', 'prefix' => 'natur'],
                                                                                                ['label' => 'PREMIER', 'color' => 'warning', 'prefix' => 'premier'],
                                                                                                ['label' => 'N. PREMIER', 'color' => 'danger', 'prefix' => 'natur_premier']
                                                                                            ];

                                                                                            foreach ($servicios as $s): 
                                                                                                $p = $s['prefix'];
                                                                                                // Solo mostramos el bloque si hay una tarifa neta mayor a 0 para no saturar la tabla
                                                                                                if ($t[$p.'_adulto_neta'] > 0 || $t[$p.'_menor_neta'] > 0):
                                                                                            ?>
                                                                                                <div class="card shadow-sm mb-1 border-left-<?= $s['color'] ?>">
                                                                                                    <div class="card-body p-1">
                                                                                                        <div class="text-<?= $s['color'] ?> font-weight-bold mb-1 border-bottom" style="font-size: 0.65rem; text-align: left;">
                                                                                                            <?= $s['label'] ?>
                                                                                                        </div>
                                                                                                        <table class="table table-sm table-borderless mb-0">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td class="p-0 text-left" width="40%">
                                                                                                                        <span class="badge badge-light">A</span> 
                                                                                                                        <small><?= number_format($t[$p.'_adulto_markup'], 0); ?>%</small>
                                                                                                                    </td>
                                                                                                                    <td class="p-0 text-right text-monospace text-muted">$<?= number_format($t[$p.'_adulto_neta'], 2); ?></td>
                                                                                                                    <td class="p-0 text-right font-weight-bold text-dark">$<?= number_format($t[$p.'_adulto_publica'], 2); ?></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td class="p-0 text-left">
                                                                                                                        <span class="badge badge-light">M</span> 
                                                                                                                        <small><?= number_format($t[$p.'_menor_markup'], 0); ?>%</small>
                                                                                                                    </td>
                                                                                                                    <td class="p-0 text-right text-monospace text-muted">$<?= number_format($t[$p.'_menor_neta'], 2); ?></td>
                                                                                                                    <td class="p-0 text-right font-weight-bold text-dark">$<?= number_format($t[$p.'_menor_publica'], 2); ?></td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                </div>
                                                                                            <?php 
                                                                                                endif;
                                                                                            endforeach; 
                                                                                            ?>

                                                                                            <div class="text-center mt-1 bg-white rounded border" style="font-size: 0.65rem;">
                                                                                                <span class="text-muted">Edades:</span>
                                                                                                <span class="badge badge-secondary">M: <?= $t['menor_desde'] ?>+</span>
                                                                                                <span class="badge badge-secondary">A: <?= $t['adulto_desde'] ?>+</span>
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
                                            <form id="formAdministrarTarifasCharter" class="row">
                                                <div class="col-md-3 col-sm-12 mb-4">
                                                    <label for="fechaInicioTarifaCharter">Fecha Inicial</label>
                                                    <input type="date" class="form-control" id="fechaInicioTarifaCharter" name="fechaInicioTarifaCharter" required>      
                                                </div>
                                                <div class="col-md-3 col-sm-12 mb-4">
                                                    <label for="fechaFinTarifaCharter">Fecha Final</label>
                                                    <input type="date" class="form-control" id="fechaFinTarifaCharter" name="fechaFinTarifaCharter" required>      
                                                </div>
                                                <div class="col-md-6 text-center col-sm-12 mb-4">
                                                    <label>Días de la Semana</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasCharter" type="checkbox" value="Monday" id="LunesCharter" checked>
                                                        <label class="form-check-label" for="Lunes">L</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasCharter" type="checkbox" value="Tuesday" id="MartesCharter" checked>
                                                        <label class="form-check-label" for="Martes">M</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasCharter" type="checkbox" value="Wednesday" id="MiércolesCharter" checked>
                                                        <label class="form-check-label" for="Miércoles">Mi</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasCharter" type="checkbox" value="Thursday" id="JuevesCharter" checked>
                                                        <label class="form-check-label" for="Jueves">J</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasCharter" type="checkbox" value="Friday" id="ViernesCharter" checked>
                                                        <label class="form-check-label" for="Viernes">V</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasCharter" type="checkbox" value="Saturday" id="SábadoCharter" checked>
                                                        <label class="form-check-label" for="Sábado">S</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifasCharter" type="checkbox" value="Sunday" id="DomingoCharter" checked>
                                                        <label class="form-check-label" for="Domingo">D</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-12 mb-4">
                                                    <label for="salidaTarifaCharter">Salida</label>
                                                    <select class="form-control" id="salidaTarifaCharter" name="salidaTarifaCharter">
                                                        <option value="0" selected>Selecciona...</option>
                                                        <?php if(!empty($salidas)): foreach($salidas as $x): ?>
                                                        <option value="<?= $x['id_salida']; ?>"><?= $x['nombre']; ?></option>
                                                        <?php endforeach; endif; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 col-sm-12 mb-4">
                                                    <label for="menorDesdeCharter">Menor Desde</label>
                                                    <select class="form-control" id="menorDesdeCharter" name="menorDesdeCharter">
                                                        <?php for($i=0;$i<22;$i++): ?>
                                                        <option value="<?= $i ?>"><?= $i ?></option>
                                                        <?php endfor; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 col-sm-12 mb-4">
                                                    <label for="adultoDesdeCharter">Adulto Desde</label>
                                                    <select class="form-control" id="adultoDesdeCharter" name="adultoDesdeCharter">
                                                        <?php for($i=0;$i<22;$i++): ?>
                                                        <option value="<?= $i ?>"><?= $i ?></option>
                                                        <?php endfor; ?>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <div class="card shadow mb-4">
                                                        <div class="card-header py-3 bg-easycheck">
                                                            <h6 class="m-0 font-weight-bold text-white uppercase">
                                                                <i class="fas fa- tags mr-2"></i> Configuración de Tarifas por Servicio
                                                            </h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <ul class="nav nav-pills mb-4 nav-justified bg-light p-2 rounded" id="pills-tab" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" id="tab-asiento" data-toggle="pill" href="#pills-asiento" role="tab" aria-selected="true">ASIENTO</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" id="tab-natur" data-toggle="pill" href="#pills-natur" role="tab" aria-selected="false">NATURCHARTER</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" id="tab-premier" data-toggle="pill" href="#pills-premier" role="tab" aria-selected="false">ASIENTO PREMIER</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" id="tab-natur-premier" data-toggle="pill" href="#pills-natur-premier" role="tab" aria-selected="false">NATUR PREMIER</a>
                                                                </li>
                                                            </ul>

                                                            <div class="tab-content border-0" id="pills-tabContent">

                                                                <div class="tab-pane fade show active" id="pills-asiento" role="tabpanel" aria-labelledby="tab-asiento">
                                                                    <div class="alert bg-gray-100 border-left-primary mb-4">
                                                                        <span class="font-weight-bold text-primary">Editando Tarifas: ASIENTO</span>
                                                                    </div>

                                                                    <div class="row mb-2 d-none d-md-flex font-weight-bold text-center small text-gray-600">
                                                                        <div class="col-md-3">TIPO PASAJERO</div>
                                                                        <div class="col-md-3">TARIFA NETA</div>
                                                                        <div class="col-md-3">MARKUP (%)</div>
                                                                        <div class="col-md-3">TARIFA PÚBLICA</div>
                                                                    </div>

                                                                    <div class="row mb-3 align-items-center bg-white py-3 shadow-sm rounded border mx-0">
                                                                        <div class="col-md-3 text-center text-md-left">
                                                                            <span class="h6 font-weight-bold text-dark"><i class="fas fa-user-tie mr-2"></i>Adulto</span>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                                                <input type="number" class="form-control tarifa-neta" id="tarifa_asiento_adulto_neta" name="tarifa_asiento_adulto_neta" placeholder="0.00" step="0.01">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <input type="number" class="form-control tarifa-markup" id="tarifa_asiento_adulto_markup" name="tarifa_asiento_adulto_markup" placeholder="0">
                                                                                <div class="input-group-append"><span class="input-group-text">%</span></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text bg-light font-weight-bold">$</span></div>
                                                                                <input type="text" class="form-control font-weight-bold tarifa-publica" id="tarifa_asiento_adulto_publica" name="tarifa_asiento_adulto_publica" readonly placeholder="0.00">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3 align-items-center bg-white py-3 shadow-sm rounded border mx-0">
                                                                        <div class="col-md-3 text-center text-md-left">
                                                                            <span class="h6 font-weight-bold text-dark"><i class="fas fa-child mr-2"></i>Menor</span>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                                                <input type="number" class="form-control tarifa-neta" id="tarifa_asiento_menor_neta" name="tarifa_asiento_menor_neta" placeholder="0.00" step="0.01">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <input type="number" class="form-control tarifa-markup" id="tarifa_asiento_menor_markup" name="tarifa_asiento_menor_markup" placeholder="0">
                                                                                <div class="input-group-append"><span class="input-group-text">%</span></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text bg-light font-weight-bold">$</span></div>
                                                                                <input type="text" class="form-control font-weight-bold tarifa-publica" id="tarifa_asiento_menor_publica" name="tarifa_asiento_menor_publica" readonly placeholder="0.00">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane fade" id="pills-natur" role="tabpanel" aria-labelledby="tab-natur">
                                                                    <div class="alert bg-gray-100 border-left-success mb-4">
                                                                        <span class="font-weight-bold text-success">Editando Tarifas: NATURCHARTER</span>
                                                                    </div>

                                                                    <div class="row mb-3 align-items-center bg-white py-3 shadow-sm rounded border mx-0">
                                                                        <div class="col-md-3 text-center text-md-left">
                                                                            <span class="h6 font-weight-bold text-dark"><i class="fas fa-user-tie mr-2"></i>Adulto</span>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                                                <input type="number" class="form-control tarifa-neta" id="tarifa_natur_adulto_neta" name="tarifa_natur_adulto_neta" placeholder="0.00" step="0.01">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <input type="number" class="form-control tarifa-markup" id="tarifa_natur_adulto_markup" name="tarifa_natur_adulto_markup" placeholder="0">
                                                                                <div class="input-group-append"><span class="input-group-text">%</span></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text bg-light font-weight-bold">$</span></div>
                                                                                <input type="text" class="form-control font-weight-bold tarifa-publica" id="tarifa_natur_adulto_publica" name="tarifa_natur_adulto_publica" readonly placeholder="0.00">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3 align-items-center bg-white py-3 shadow-sm rounded border mx-0">
                                                                        <div class="col-md-3 text-center text-md-left">
                                                                            <span class="h6 font-weight-bold text-dark"><i class="fas fa-child mr-2"></i>Menor</span>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                                                <input type="number" class="form-control tarifa-neta" id="tarifa_natur_menor_neta" name="tarifa_natur_menor_neta" placeholder="0.00" step="0.01">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <input type="number" class="form-control tarifa-markup" id="tarifa_natur_menor_markup" name="tarifa_natur_menor_markup" placeholder="0">
                                                                                <div class="input-group-append"><span class="input-group-text">%</span></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text bg-light font-weight-bold">$</span></div>
                                                                                <input type="text" class="form-control font-weight-bold  tarifa-publica" id="tarifa_natur_menor_publica" name="tarifa_natur_menor_publica" readonly placeholder="0.00">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane fade" id="pills-premier" role="tabpanel" aria-labelledby="tab-premier">
                                                                    <div class="alert bg-gray-100 border-left-warning mb-4">
                                                                        <span class="font-weight-bold text-warning">Editando Tarifas: ASIENTO PREMIER</span>
                                                                    </div>

                                                                    <div class="row mb-3 align-items-center bg-white py-3 shadow-sm rounded border mx-0">
                                                                        <div class="col-md-3 text-center text-md-left">
                                                                            <span class="h6 font-weight-bold text-dark"><i class="fas fa-user-tie mr-2"></i>Adulto</span>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                                                <input type="number" class="form-control tarifa-neta" id="tarifa_premier_adulto_neta" name="tarifa_premier_adulto_neta" placeholder="0.00" step="0.01">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <input type="number" class="form-control tarifa-markup" id="tarifa_premier_adulto_markup" name="tarifa_premier_adulto_markup" placeholder="0">
                                                                                <div class="input-group-append"><span class="input-group-text">%</span></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text bg-light font-weight-bold">$</span></div>
                                                                                <input type="text" class="form-control font-weight-bold  tarifa-publica" id="tarifa_premier_adulto_publica" name="tarifa_premier_adulto_publica" readonly placeholder="0.00">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3 align-items-center bg-white py-3 shadow-sm rounded border mx-0">
                                                                        <div class="col-md-3 text-center text-md-left">
                                                                            <span class="h6 font-weight-bold text-dark"><i class="fas fa-child mr-2"></i>Menor</span>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                                                <input type="number" class="form-control tarifa-neta" id="tarifa_premier_menor_neta" name="tarifa_premier_menor_neta" placeholder="0.00" step="0.01">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <input type="number" class="form-control tarifa-markup" id="tarifa_premier_menor_markup" name="tarifa_premier_menor_markup" placeholder="0">
                                                                                <div class="input-group-append"><span class="input-group-text">%</span></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text bg-light font-weight-bold">$</span></div>
                                                                                <input type="text" class="form-control font-weight-bold  tarifa-publica" id="tarifa_premier_menor_publica" name="tarifa_premier_menor_publica" readonly placeholder="0.00">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane fade" id="pills-natur-premier" role="tabpanel" aria-labelledby="tab-natur-premier">
                                                                    <div class="alert bg-gray-100 border-left-danger mb-4">
                                                                        <span class="font-weight-bold text-danger">Editando Tarifas: NATURCHARTER PREMIER</span>
                                                                    </div>

                                                                    <div class="row mb-3 align-items-center bg-white py-3 shadow-sm rounded border mx-0">
                                                                        <div class="col-md-3 text-center text-md-left">
                                                                            <span class="h6 font-weight-bold text-dark"><i class="fas fa-user-tie mr-2"></i>Adulto</span>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                                                <input type="number" class="form-control tarifa-neta" id="tarifa_natur_premier_adulto_neta" name="tarifa_natur_premier_adulto_neta" placeholder="0.00" step="0.01">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <input type="number" class="form-control tarifa-markup" id="tarifa_natur_premier_adulto_markup" name="tarifa_natur_premier_adulto_markup" placeholder="0">
                                                                                <div class="input-group-append"><span class="input-group-text">%</span></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text bg-light font-weight-bold">$</span></div>
                                                                                <input type="text" class="form-control font-weight-bold  tarifa-publica" id="tarifa_natur_premier_adulto_publica" name="tarifa_natur_premier_adulto_publica" readonly placeholder="0.00">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3 align-items-center bg-white py-3 shadow-sm rounded border mx-0">
                                                                        <div class="col-md-3 text-center text-md-left">
                                                                            <span class="h6 font-weight-bold text-dark"><i class="fas fa-child mr-2"></i>Menor</span>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                                                <input type="number" class="form-control tarifa-neta" id="tarifa_natur_premier_menor_neta" name="tarifa_natur_premier_menor_neta" placeholder="0.00" step="0.01">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <input type="number" class="form-control tarifa-markup" id="tarifa_natur_premier_menor_markup" name="tarifa_natur_premier_menor_markup" placeholder="0">
                                                                                <div class="input-group-append"><span class="input-group-text">%</span></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text bg-light font-weight-bold">$</span></div>
                                                                                <input type="text" class="form-control font-weight-bold tarifa-publica" id="tarifa_natur_premier_menor_publica" name="tarifa_natur_premier_menor_publica" readonly placeholder="0.00">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4 text-center">
                                                    <button id="btnAdministrarTarifasCharter" type="submit" class="btn btn-primary font-weight-bold">GUARDAR TARIFAS</button>
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