<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hoteles</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">AGREGAR HOTEL</h6>
                </div>
                <div class="card-body">
                    <form id="formAgregarHotel" class="row g-3">
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
                                                <input type="text" class="form-control" id="nombrehotel" name="nombrehotel" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Destino</label>
                                                <select class="form-control selectpicker" data-live-search="true" id="destinohotel" name="destinohotel" required>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Categoría</label>
                                                <div class="input-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="categoriatipo" id="cat1" value="1" checked>
                                                        <label class="form-check-label" for="cat1">1 <i class="fas fa-star text-warning"></i></label>
                                                    </div>
                                                    <div class="form-check ml-2">
                                                        <input class="form-check-input" type="radio" name="categoriatipo" id="cat2" value="2">
                                                        <label class="form-check-label" for="cat2">2 <i class="fas fa-star text-warning"></i></label>
                                                    </div>
                                                    <div class="form-check ml-2">
                                                        <input class="form-check-input" type="radio" name="categoriatipo" id="cat3" value="3">
                                                        <label class="form-check-label" for="cat3">3 <i class="fas fa-star text-warning"></i></label>
                                                    </div>
                                                    <div class="form-check ml-2">
                                                        <input class="form-check-input" type="radio" name="categoriatipo" id="cat4" value="4">
                                                        <label class="form-check-label" for="cat4">4 <i class="fas fa-star text-warning"></i></label>
                                                    </div>
                                                    <div class="form-check ml-2">
                                                        <input class="form-check-input" type="radio" name="categoriatipo" id="cat5" value="5">
                                                        <label class="form-check-label" for="cat5">5 <i class="fas fa-star text-warning"></i></label>
                                                    </div>
                                                    <div class="form-check ml-2">
                                                        <input class="form-check-input" type="radio" name="categoriatipo" id="gt" value="gt">
                                                        <label class="form-check-label" for="gt">GT</label>
                                                    </div>
                                                    <div class="form-check ml-2">
                                                        <input class="form-check-input" type="radio" name="categoriatipo" id="pqt" value="pqt">
                                                        <label class="form-check-label" for="pqt">PAQUETE</label>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Email Reservaciones</label> 
                                                <input class="form-control" type="email" id="emailreservacioneshotel" name="emailreservacioneshotel" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Email Tarifas</label> 
                                                <input class="form-control" type="email" id="emailtarifashotel" name="emailtarifashotel" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Markup (%)</label> 
                                                <input class="form-control" type="text" id="markuphotel" name="markuphotel" value="20" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>IVA (%)</label> 
                                                <input class="form-control" type="text" id="ivahotel" name="ivahotel" value="16" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>ISH (%)</label> 
                                                <input class="form-control" type="text" id="ishhotel" name="ishhotel" value="3" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nombre Contacto</label> 
                                                <input class="form-control" type="text" id="contactohotel" name="contactohotel" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Teléfono Principal</label> 
                                                <input class="form-control" type="text" id="telefonoprincipalhotel" name="telefonoprincipalhotel" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Teléfono Adicional</label> 
                                                <input class="form-control" type="text" id="telefonoadicionalhotel" name="telefonoadicionalhotel" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Ubicación</label>
                                                <input class="form-control" type="text" id="ubicacionhotel" name="ubicacionhotel" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Infante Desde</label> 
                                                <input class="form-control" type="number" id="infanteDesdeHotel" name="infanteDesdeHotel" value="0" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Infante Hasta</label> 
                                                <input class="form-control" type="number" id="infanteHastaHotel" name="infanteHastaHotel" value="0" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Menor Desde</label> 
                                                <input class="form-control" type="number" id="menorDesdeHotel" name="menorDesdeHotel" value="0" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Menor Hasta</label> 
                                                <input class="form-control" type="number" id="menorHastaHotel" name="menorHastaHotel" value="0" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Junior Desde</label> 
                                                <input class="form-control" type="number" id="juniorDesdeHotel" name="juniorDesdeHotel" value="0" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Junior Hasta</label> 
                                                <input class="form-control" type="number" id="juniorHastaHotel" name="juniorHastaHotel" value="0" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <textarea class="form-control" id="descripcionhotel" name="descripcionhotel" rows="5" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Logotipo</label> <small>.jpg máx de 2MB</small>
                                                <input type="file" class="form-control" name="logotipohotel" id="logotipohotel" accept="image/*" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="datosFiscales" role="tabpanel" aria-labelledby="datos-fiscales-tab">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Razón Social</label>
                                                <input type="text" class="form-control" id="razonsocialfiscalhotel" name="razonsocialfiscalhotel" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>RFC</label>
                                                <input type="text" class="form-control" id="rfcfiscalhotel" name="rfcfiscalhotel" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Código Postal</label> 
                                                <input class="form-control" type="number" id="cp_fiscalhotel" name="cp_fiscalhotel" onkeyup="BuscarCP('fiscalhotel')" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Calle y N°</label>
                                                <input type="text" class="form-control" id="callenumfiscalhotel" name="callenumfiscalhotel" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Colonia</label>
                                                <select class="form-control" id="colonia_fiscalhotel" name="colonia_fiscalhotel" required>
                                                    <option value="0">Seleccionar...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Municipio</label>
                                                <input type="text" class="form-control" id="municipio_fiscalhotel" name="municipio_fiscalhotel" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <input type="text" class="form-control" id="estado_fiscalhotel" name="estado_fiscalhotel" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>País</label>
                                                <input type="text" class="form-control" id="paisfiscalhotel" name="paisfiscalhotel" value="México" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label> 
                                                <input class="form-control" type="email" id="emailfiscalhotel" name="emailfiscalhotel" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="formaPago">Forma de Pago</label>
                                            <select class="form-control" id="formaPagoHotel" name="formaPagoHotel">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($formaspago as $x){ if($x['clave_forma_pago'] == '02' || $x['clave_forma_pago'] == '03' || $x['clave_forma_pago'] == '04'){ ?>
                                                <option value="<?= $x['clave_forma_pago']; ?>"><?= $x['nombre_forma_pago']; ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="metodoPago">Método de Pago</label>
                                            <select class="form-control" id="metodoPagoHotel" name="metodoPagoHotel">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($metodospago as $x){ ?>
                                                <option value="<?= $x['clave_metodo_pago']; ?>"><?= $x['nombre_metodo_pago']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="regimenFiscal">Régimen Fiscal</label>
                                            <select class="form-control" id="regimenFiscalHotel" name="regimenFiscalHotel">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($regimen as $x){ ?>
                                                <option value="<?= $x['clave_regimen_fiscal']; ?>"><?= $x['clave_regimen_fiscal']." - ".$x['nombre_regimen_fiscal']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="usoCFDI">Uso del CFDI</label>
                                            <select class="form-control" id="usoCFDIHotel" name="usoCFDIHotel">
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
                        <div class="col-12 mt-2 text-center"><button id="btnAgregarHotel" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button></div>
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
                    <h6 class="m-0 font-weight-bold text-white">LISTADO DE HOTELES</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="selectDestinoAgregarHoteles">Filtrar por destino <span id="totalRegistrosAgregarHoteles" class="ml-2 badge badge-primary"></span></label>
                            <select class="form-control selectpicker" data-live-search="true" id="selectDestinoAgregarHoteles" required>
                                <option value="0">Todos</option>
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
                    <div class="table-responsive">
                        <table id="tablaAgregarHoteles" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Estado</th>
                                    <th>Hotel / Destino</th>
                                    <th>Contacto</th>
                                    <th>Contacto Adicional</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($hoteles)){ foreach($hoteles as $x){ ?>
                                <tr>
                                    <td class="text-center">
                                        <?php if($x['status_hotel'] == "1"){ ?>
                                            <span class="badge badge-success">Activo</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Inactivo</span>
                                        <?php } ?>
                                    </td>

                                    <td>
                                        <strong><?= $x['nombre_hotel']; ?></strong><br>
                                        <small class="text-muted"><?= $x['nombre_destino']; ?></small>
                                    </td>

                                    <td>
                                        <small class="font-weight-bold"><?= $x['email_reservaciones_hotel']; ?></small><br>
                                        <small class="text-muted"><?= $x['telefono_principal_hotel']; ?></small>
                                    </td>

                                    <td>
                                        <small><?= $x['email_tarifas_hotel']; ?></small><br>
                                        <small class="text-muted"><?= $x['telefono_adicional_hotel']; ?></small>
                                    </td>

                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary btn-sm" title="Administrar Hotel" onclick="AdministrarHotel(<?= $x['id_hotel']; ?>)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                            <?php if($x['status_hotel'] == 1){ ?>
                                                <button type="button" class="btn btn-danger btn-sm" title="Desactivar Hotel" onclick="CambiarStatusDataHotel(<?= $x['id_hotel']; ?>,0,'ih','sh','h')">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-success btn-sm" title="Activar Hotel" onclick="CambiarStatusDataHotel(<?= $x['id_hotel']; ?>,1,'ih','sh','h')">
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