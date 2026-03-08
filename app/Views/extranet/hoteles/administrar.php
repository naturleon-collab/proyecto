<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white"><?= strtoupper($hotel[0]['nombre_hotel']); ?></h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="datos-generales-tab2" data-toggle="tab" href="#datosGenerales2" role="tab" aria-controls="datosGenerales2" aria-selected="true">
                                        GENERALES
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="datos-fiscales-tab2" data-toggle="tab" href="#datosFiscales2" role="tab" aria-controls="datosFiscales2" aria-selected="false">
                                        FISCALES
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="usuarios-tab" data-toggle="tab" href="#usuarios" role="tab" aria-controls="usuarios" aria-selected="false">
                                        USUARIOS
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="cuentas-bancarias-tab" data-toggle="tab" href="#cuentasBancarias" role="tab" aria-controls="cuentasBancarias" aria-selected="false">
                                        CUENTAS
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="habitaciones-tab" data-toggle="tab" href="#habitaciones" role="tab" aria-controls="habitaciones" aria-selected="false">
                                        HABITACIONES
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tarifas-tab" data-toggle="tab" href="#tarifas" role="tab" aria-controls="tarifas" aria-selected="false">
                                        TARIFAS
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="promociones-tab" data-toggle="tab" href="#promociones" role="tab" aria-controls="promociones" aria-selected="false">
                                        PROMOCIONES
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="restricciones-tab" data-toggle="tab" href="#restricciones" role="tab" aria-controls="restricciones" aria-selected="false">
                                        RESTRICCIONES
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="inventario-tab" data-toggle="tab" href="#inventario" role="tab" aria-controls="inventario" aria-selected="false">
                                        INVENTARIO
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="imagenes-tab" data-toggle="tab" href="#imagenes" role="tab" aria-controls="imagenes" aria-selected="false">
                                        FOTOS
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="configuracion-tab" data-toggle="tab" href="#configuracion" role="tab" aria-controls="configuracion" aria-selected="false">
                                        CONFIG.
                                    </a>
                                </li> -->
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="datosGenerales2" role="tabpanel" aria-labelledby="datos-generales-tab2">
                                    <div class="card shadow mb-2">
                                        <div class="card-body">
                                            <form id="formDatosGeneralesHotel" class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Nombre</label>
                                                        <input type="text" class="form-control" id="nombrehotel" name="nombrehotel" value="<?= $hotel[0]['nombre_hotel']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Destino</label>
                                                        <select class="form-control selectpicker" data-live-search="true" id="destinohotel" name="destinohotel" required>
                                                            <option value="0">Seleccionar...</option>
                                                            <optgroup label="NACIONALES">
                                                                <?php if(!empty($destinosnacionales)){ foreach($destinosnacionales as $x){ ?>
                                                                    <option value="<?= $x['id_destino']; ?>" <?php if($x['id_destino'] == $hotel[0]['destino_hotel']){ echo "selected"; } ?>><?= $x['nombre_destino']; ?></option>
                                                                <?php } } ?>
                                                            </optgroup>
                                                            <optgroup label="INTERNACIONALES">
                                                                <?php if(!empty($destinosinternacionales)){ foreach($destinosinternacionales as $x){ ?>
                                                                    <option value="<?= $x['id_destino']; ?>" <?php if($x['id_destino'] == $hotel[0]['destino_hotel']){ echo "selected"; } ?>><?= $x['nombre_destino']; ?></option>
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
                                                                <input class="form-check-input" type="radio" name="categoriatipo" id="cat1" value="1" <?php if($hotel[0]['categoria_hotel'] == "1"){ echo "checked"; } ?>>
                                                                <label class="form-check-label" for="cat1">1 <i class="fas fa-star text-warning"></i></label>
                                                            </div>
                                                            <div class="form-check ml-2">
                                                                <input class="form-check-input" type="radio" name="categoriatipo" id="cat2" value="2" <?php if($hotel[0]['categoria_hotel'] == "2"){ echo "checked"; } ?>>
                                                                <label class="form-check-label" for="cat2">2 <i class="fas fa-star text-warning"></i></label>
                                                            </div>
                                                            <div class="form-check ml-2">
                                                                <input class="form-check-input" type="radio" name="categoriatipo" id="cat3" value="3" <?php if($hotel[0]['categoria_hotel'] == "3"){ echo "checked"; } ?>>
                                                                <label class="form-check-label" for="cat3">3 <i class="fas fa-star text-warning"></i></label>
                                                            </div>
                                                            <div class="form-check ml-2">
                                                                <input class="form-check-input" type="radio" name="categoriatipo" id="cat4" value="4" <?php if($hotel[0]['categoria_hotel'] == "4"){ echo "checked"; } ?>>
                                                                <label class="form-check-label" for="cat4">4 <i class="fas fa-star text-warning"></i></label>
                                                            </div>
                                                            <div class="form-check ml-2">
                                                                <input class="form-check-input" type="radio" name="categoriatipo" id="cat5" value="5" <?php if($hotel[0]['categoria_hotel'] == "5"){ echo "checked"; } ?>>
                                                                <label class="form-check-label" for="cat5">5 <i class="fas fa-star text-warning"></i></label>
                                                            </div>
                                                            <div class="form-check ml-2">
                                                                <input class="form-check-input" type="radio" name="categoriatipo" id="gt" value="gt" <?php if($hotel[0]['categoria_hotel'] == "gt"){ echo "checked"; } ?>>
                                                                <label class="form-check-label" for="gt">GT</label>
                                                            </div>
                                                            <div class="form-check ml-2">
                                                                <input class="form-check-input" type="radio" name="categoriatipo" id="pqt" value="pqt" <?php if($hotel[0]['categoria_hotel'] == "pqt"){ echo "checked"; } ?>>
                                                                <label class="form-check-label" for="pqt">PAQUETE</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Email Reservaciones</label> 
                                                        <input class="form-control" type="email" id="emailreservacioneshotel" name="emailreservacioneshotel" value="<?= $hotel[0]['email_reservaciones_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Email Tarifas</label> 
                                                        <input class="form-control" type="email" id="emailtarifashotel" name="emailtarifashotel" value="<?= $hotel[0]['email_tarifas_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Markup (%)</label> 
                                                        <input class="form-control" type="text" id="markuphotel" name="markuphotel" value="<?= $hotel[0]['markup_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>IVA (%)</label> 
                                                        <input class="form-control" type="text" id="ivahotel" name="ivahotel" value="<?= $hotel[0]['iva_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>ISH (%)</label> 
                                                        <input class="form-control" type="text" id="ishhotel" name="ishhotel" value="<?= $hotel[0]['ish_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Nombre Contacto</label> 
                                                        <input class="form-control" type="texto" id="contactohotel" name="contactohotel" value="<?= $hotel[0]['contacto_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Teléfono Principal</label> 
                                                        <input class="form-control" type="texto" id="telefonoprincipalhotel" name="telefonoprincipalhotel" value="<?= $hotel[0]['telefono_principal_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Teléfono Adicional</label> 
                                                        <input class="form-control" type="texto" id="telefonoadicionalhotel" name="telefonoadicionalhotel" value="<?= $hotel[0]['telefono_adicional_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Ubicación</label>
                                                        <input class="form-control" type="texto" id="ubicacionhotel" name="ubicacionhotel" value="<?= $hotel[0]['ubicacion_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Infante Desde</label> 
                                                        <input class="form-control" type="number" id="infanteDesdeHotel" name="infanteDesdeHotel" value="<?= $hotel[0]['infante_desde_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Infante Hasta</label> 
                                                        <input class="form-control" type="number" id="infanteHastaHotel" name="infanteHastaHotel" value="<?= $hotel[0]['infante_hasta_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Menor Desde</label> 
                                                        <input class="form-control" type="number" id="menorDesdeHotel" name="menorDesdeHotel" value="<?= $hotel[0]['menor_desde_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Menor Hasta</label> 
                                                        <input class="form-control" type="number" id="menorHastaHotel" name="menorHastaHotel" value="<?= $hotel[0]['menor_hasta_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Junior Desde</label> 
                                                        <input class="form-control" type="number" id="juniorDesdeHotel" name="juniorDesdeHotel" value="<?= $hotel[0]['junior_desde_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Junior Hasta</label> 
                                                        <input class="form-control" type="number" id="juniorHastaHotel" name="juniorHastaHotel" value="<?= $hotel[0]['junior_hasta_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Descripción</label>
                                                        <textarea class="form-control" id="descripcionhotel" name="descripcionhotel" rows="5" required><?= $hotel[0]['descripcion_hotel']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Logotipo</label> <small>.jpg máx de 2MB</small>
                                                        <input type="file" class="form-control" name="logotipohotel" id="logotipohotel" accept="image/*"><br>
                                                        <label>Logotipo Actual</label><br>
                                                        <img width="50%" src="<?= base_url($hotel[0]['logotipo_hotel']); ?>" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2 text-center">
                                                    <button id="btnDatosGeneralesHotel" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="datosFiscales2" role="tabpanel" aria-labelledby="datos-fiscales-tab2">
                                    <div class="card shadow mb-2">
                                        <div class="card-body">
                                            <form id="formDatosFiscalesHotel" class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Razón Social</label>
                                                        <input type="text" class="form-control" id="razonsocialfiscalhotel" name="razonsocialfiscalhotel" value="<?= $hotel[0]['razon_social_hotel']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>RFC</label>
                                                        <input type="text" class="form-control" id="rfcfiscalhotel" name="rfcfiscalhotel" value="<?= $hotel[0]['rfc_hotel']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Código Postal</label>
                                                        <input class="form-control" type="number" id="cp_fiscalhotel2" name="cp_fiscalhotel2" onkeyup="BuscarCP('fiscalhotel2')" value="<?= $hotel[0]['codigo_postal_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Calle y N°</label>
                                                        <input type="text" class="form-control" id="callenumfiscalhotel" name="callenumfiscalhotel" value="<?= $hotel[0]['callenum_hotel']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Colonia</label>
                                                        <select class="form-control" id="colonia_fiscalhotel2" name="colonia_fiscalhotel2" required>
                                                            <?php if(!empty($colonias)){ foreach($colonias as $x){ ?>
                                                            <option value="<?= $x['nombre_colonia']; ?>" <?php if($x['nombre_colonia'] == $hotel[0]['colonia_hotel']){ echo "selected"; } ?>><?= $x['nombre_colonia']; ?></option>
                                                            <?php }} ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Estado</label>
                                                        <input type="text" class="form-control" id="estado_fiscalhotel2" name="estado_fiscalhotel2" value="<?= $hotel[0]['estado_hotel']; ?>" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Municipio</label>
                                                        <input type="text" class="form-control" id="municipio_fiscalhotel2" name="municipio_fiscalhotel2" value="<?= $hotel[0]['municipio_hotel']; ?>" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>País</label>
                                                        <input type="text" class="form-control" id="paisfiscalhotel" name="paisfiscalhotel" value="<?= $hotel[0]['pais_hotel']; ?>" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email</label> 
                                                        <input class="form-control" type="email" id="emailfiscalhotel" name="emailfiscalhotel" value="<?= $hotel[0]['email_hotel']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="formaPago">Forma de Pago</label>
                                                    <select class="form-control" id="formaPagoHotel" name="formaPagoHotel">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($formaspago as $x){ if($x['clave_forma_pago'] == '02' || $x['clave_forma_pago'] == '03' || $x['clave_forma_pago'] == '04'){ ?>
                                                        <option value="<?= $x['clave_forma_pago']; ?>" <?php if($hotel[0]['forma_pago_hotel'] == $x['clave_forma_pago']){ echo "selected"; } ?>><?= $x['nombre_forma_pago']; ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="metodoPago">Método de Pago</label>
                                                    <select class="form-control" id="metodoPagoHotel" name="metodoPagoHotel">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($metodospago as $x){ ?>
                                                        <option value="<?= $x['clave_metodo_pago']; ?>" <?php if($hotel[0]['metodo_pago_hotel'] == $x['clave_metodo_pago']){ echo "selected"; } ?>><?= $x['nombre_metodo_pago']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="regimenFiscal">Régimen Fiscal</label>
                                                    <select class="form-control" id="regimenFiscalHotel" name="regimenFiscalHotel">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($regimen as $x){ ?>
                                                        <option value="<?= $x['clave_regimen_fiscal']; ?>" <?php if($hotel[0]['regimen_fiscal_hotel'] == $x['clave_regimen_fiscal']){ echo "selected"; } ?>><?= $x['clave_regimen_fiscal']." - ".$x['nombre_regimen_fiscal']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="usoCFDI">Uso del CFDI</label>
                                                    <select class="form-control" id="usoCFDIHotel" name="usoCFDIHotel">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($cfdi as $x){ ?>
                                                        <option value="<?= $x['clave_cfdi']; ?>" <?php if($hotel[0]['uso_cfdi_hotel'] == $x['clave_cfdi']){ echo "selected"; } ?>><?= $x['clave_cfdi']." - ".$x['nombre_cfdi']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-12 mt-2 text-center">
                                                    <button id="btnDatosFiscalesHotel" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button>
                                                </div>
                                            </form>                        
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="usuarios" role="tabpanel" aria-labelledby="usuarios-tab">
                                    <div class="row">
                                        <div class="col-md-auto order-last order-sm-first">
                                            <div class="card shadow mb-4">
                                                <div class="card-body">
                                                    <strong>USUARIOS</strong> <button onclick="AgregarNuevoUsuarioHotel()" type="button" class="ml-4 btn btn-sm btn-primary" title="Agregar Usuario"><i class="fas fa-plus"></i></button>
                                                    <hr>
                                                    <?php if(!empty($usuarios)){ foreach($usuarios as $x){ ?>
                                                        <label style="cursor:pointer;" onclick="EditarUsuarioHotel(<?= $x['id_usuario']; ?>)">•<?= $x['nombre_usuario']; ?></label><br>
                                                    <?php }} ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col order-first order-sm-last">
                                            <div class="card shadow mb-2">
                                                <div class="card-body">
                                                    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="pills-datos-tab" data-toggle="pill" data-target="#pills-datos" type="button" role="tab" aria-controls="pills-datos" aria-selected="true">DATOS</button>
                                                        </li>
                                                        <!-- <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="pills-permisos-tab" data-toggle="pill" data-target="#pills-permisos" type="button" role="tab" aria-controls="pills-permisos" aria-selected="false">PERMISOS</button>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card shadow mb-4">
                                                <div class="card-body">
                                                    <div class="tab-content" id="pills-tabContent">
                                                        <div class="tab-pane fade show active" id="pills-datos" role="tabpanel" aria-labelledby="pills-datos-tab">
                                                            <strong class="text-primary">DATOS</strong>
                                                            <hr>
                                                            <form id="formGuardarUsuarioHotel" class="row g-3">
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Alias</label>
                                                                    <input type="text" class="form-control" id="aliasUsuario" name="aliasUsuario" required>
                                                                    <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" value="0">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Nombre</label>
                                                                    <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Movil</label>
                                                                    <input type="text" class="form-control" id="movilUsuario" name="movilUsuario" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Login</label>
                                                                    <input type="text" class="form-control" id="loginUsuario" name="loginUsuario" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Contraseña</label>
                                                                    <input type="text" class="form-control" id="passwordUsuario" name="passwordUsuario">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Confirmacion Password</label>
                                                                    <input type="text" class="form-control" id="confirmacionPasswordUsuario" name="confirmacionPasswordUsuario">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Status</label>
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox" class="custom-control-input" id="statusUsuario">
                                                                        <label class="custom-control-label" for="statusUsuario"></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-4 mb-2 text-center">
                                                                    <button id="btnGuardarUsuarioHotel" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--<div class="tab-pane fade" id="pills-permisos" role="tabpanel" aria-labelledby="pills-permisos-tab">
                                                            <strong class="text-primary">PERMISOS</strong>
                                                            <hr>
                                                            <form class="row g-3">
                                                                <div class="row ml-4 mr-4">
                                                                </div>
                                                                <div class="col-12 mt-4 mb-2 text-center">
                                                                    <button id="btnGuardarUsuario" class="btn btn-primary" type="button"><strong>GUARDAR</strong></button>
                                                                </div>
                                                            </form>
                                                        </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="cuentasBancarias" role="tabpanel" aria-labelledby="cuentas-bancarias-tab">
                                    <div class="row">
                                        <div class="col-md-auto">
                                            <div class="card shadow mb-4">
                                                <div class="card-body">
                                                    <strong>CUENTAS BANCARIAS</strong> <button onclick="AgregarNuevaCuentaHotel()" type="button" class="ml-4 btn btn-sm btn-primary" title="Agregar Cuenta"><i class="fas fa-plus"></i></button>
                                                    <hr>
                                                    <span class="text-primary">CUENTAS</span><br>
                                                    <?php if(!empty($cuentas)){ foreach($cuentas as $x){ ?>
                                                        <label style="cursor:pointer;" onclick="EditarCuentaHotel(<?= $x['id_cuenta']; ?>)">•<?= $x['alias_cuenta']; ?></label><br>
                                                    <?php }} ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow mb-4">
                                                <div class="card-body">
                                                    <strong>DETALLE DE LA CUENTA</strong>
                                                    <hr>
                                                    <form id="FormGuardarCuentaHotel" class="row g-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">Alias</label>
                                                            <input type="text" class="form-control" id="aliasCuenta" name="aliasCuenta" required>
                                                            <input type="hidden" class="form-control" id="idCuenta" name="idCuenta" value="0" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Nombre</label>
                                                            <input type="text" class="form-control" id="nombreCuenta" name="nombreCuenta" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Institución</label>
                                                            <input type="text" class="form-control" id="institucionCuenta" name="institucionCuenta" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Tipo Cuenta</label>
                                                            <input type="text" class="form-control" id="tipoCuenta" name="tipoCuenta" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">N° de Cuenta</label>
                                                            <input type="text" class="form-control" id="numCuenta" name="numCuenta" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Cuenta Clabe</label>
                                                            <input type="text" class="form-control" id="clabeCuenta" name="clabeCuenta" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Observaciones</label>
                                                            <input type="text" class="form-control" id="observacionesCuenta" name="observacionesCuenta" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Status</label>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="statusCuenta" name="statusCuenta">
                                                                <label class="custom-control-label" for="statusCuenta"></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-4 mb-2 text-center">
                                                            <button id="btnGuardarCuentaHotel" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="habitaciones" role="tabpanel" aria-labelledby="habitaciones-tab">
                                    <div class="row">
                                        <div class="col-md-auto">
                                            <div class="card shadow mb-4">
                                                <div class="card-body">
                                                    <strong>HABITACIONES</strong> <button onclick="AgregarNuevaHabitacionHotel()" type="button" class="ml-4 btn btn-sm btn-primary" title="Agregar Cuenta"><i class="fas fa-plus"></i></button>
                                                    <hr>
                                                    <?php if(!empty($habitaciones)){ foreach($habitaciones as $x){ ?>
                                                        <label title="Editar Habitación" style="cursor:pointer;" onclick="EditarHabitacion(<?= $x['id_habitacion']; ?>)">•<?= $x['nombre_habitacion']; ?></label> <button title="Galería Habitación" class="btn btn-primary btn-sm" onclick="GaleriaHabitacion(<?= $x['id_habitacion']; ?>,'<?= $x['nombre_habitacion']; ?>')"><i class="fas fa-image"></i></button><br>
                                                    <?php }} ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow mb-4">
                                                <div class="card-body">
                                                    <strong>DETALLE DE LA HABITACION</strong>
                                                    <hr>
                                                    <form id="FormGuardarHabitacionHotel" class="row g-3">
                                                        <div class="col-md-8">
                                                            <label class="form-label">Nombre</label>
                                                            <input type="text" class="form-control" id="nombreHabitacion" name="nombreHabitacion" required>
                                                            <input type="hidden" class="form-control" id="idHabitacion" name="idHabitacion" value="0" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Tipo</label>
                                                            <input type="text" class="form-control" id="tipoHabitacion" name="tipoHabitacion" placeholder="Jr/Suite/Estudio" required>
                                                        </div>
                                                        <div class="col-md-12 mt-4">
                                                            <strong>Camas</strong>
                                                            <hr>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">Sencilla</label>
                                                            <input type="number" class="form-control" id="sencillaHabitacion" name="sencillaHabitacion" value="0" required>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">Doble</label>
                                                            <input type="number" class="form-control" id="dobleHabitacion" name="dobleHabitacion" value="0" required>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">Queen</label>
                                                            <input type="number" class="form-control" id="queenHabitacion" name="queenHabitacion" value="0" required>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">King</label>
                                                            <input type="number" class="form-control" id="kingHabitacion" name="kingHabitacion" value="0" required>
                                                        </div>
                                                        <div class="col-md-12 mt-4">
                                                            <strong>Ocupación</strong>
                                                            <hr>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">Adultos mínimos</label>
                                                            <input type="number" class="form-control" id="adultosMinimosHabitacion" name="adultosMinimosHabitacion" value="0" required>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">Adultos máximos</label>
                                                            <input type="number" class="form-control" id="adultosMaximosHabitacion" name="adultosMaximosHabitacion" value="0" required>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">Menores máximos</label>
                                                            <input type="number" class="form-control" id="menoresMaximosHabitacion" name="menoresMaximosHabitacion" value="0" required>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">Personas máximas</label>
                                                            <input type="number" class="form-control" id="personasMaximasHabitacion" name="personasMaximasHabitacion" value="0" required>
                                                        </div>
                                                        <div class="col-md-12 mt-4">
                                                            <strong>Información habitación</strong>
                                                            <hr>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="form-label">Resumen</label>
                                                            <textarea class="form-control" id="resumenHabitacion" name="resumenHabitacion" required></textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="form-label">Descripción</label>
                                                            <textarea class="form-control" id="descripcionHabitacion" name="descripcionHabitacion" required></textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="form-label">Servicios</label>
                                                            <textarea class="form-control" id="serviciosHabitacion" name="serviciosHabitacion" required></textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Status</label>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="statusHabitacion" name="statusHabitacion">
                                                                <label class="custom-control-label" for="statusHabitacion"></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-4 mb-2 text-center">
                                                            <button id="btnGuardarHabitacionHotel" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="galeriaHabitacion" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="TituloModal"
                                                aria-hidden="true">
                                            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-easycheck">
                                                        <h5 class="modal-title text-white" id="tituloGaleriaHabitacion"></h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="FormAgregarImagenesHabitacion" class="row g-3">
                                                            <div class="col-12">
                                                                <strong>AGREGAR IMÁGENES</strong>
                                                                <hr>
                                                            </div>
                                                            <input type="hidden" id="idHabitacionImagen" name="idHabitacionImagen">
                                                            <input type="hidden" id="nombreHabitacionImagen" name="nombreHabitacionImagen">
                                                            <div class="col-md-6 col-sm-12 mb-2">
                                                                <label for="imagenesHabitacion" class="form-label text-dark"><strong>Imágenes</strong></label>
                                                                <input type="file" name="imagenesHabitacion[]" id="imagenesHabitacion" class="form-control" multiple>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 mb-2">
                                                                <label for="nombreImagenHabitacion" class="form-label text-dark"><strong>Nombre</strong></label>
                                                                <input type="text" name="nombreImagenHabitacion" id="nombreImagenHabitacion" class="form-control">
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 text-center mt-4 mb-2">
                                                                <button id="btnAgregarImagenesHabitacion" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button>
                                                            </div>
                                                        </form>
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <strong>LISTADO DE IMÁGENES</strong>
                                                                <hr>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Acciones</th>
                                                                                <th class="w-25">Nombre</th>
                                                                                <th>Imagen</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="tbodyImagenesHabitaciones">
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                            <input type="date" class="form-control" id="fechaInicioTarifas" value="<?= $fecha1; ?>">
                                                        </div>
                                                        <div class="col-md-3 col-sm-12">
                                                            <input type="date" class="form-control" id="fechaFinTarifas" value="<?= $fecha2; ?>">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12">
                                                            <button id="BtnBuscarTarifasFechas" class="btn btn-primary">BUSCAR</button>
                                                        </div>
                                                        <div class="col-12 table-responsive">
                                                            <hr>
                                                            <table class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle bg-easycheck text-white">Habitaciones</th>
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
                                                                <?php if(!empty($habitaciones)){ ?>
                                                                <?php foreach($habitaciones as $h){ ?>
                                                                    <tr class="text-center align-middle">
                                                                        <td class="align-middle"><?= $h['nombre_habitacion']; ?></td>
                                                                        <?php foreach($dates as $date){ ?>
                                                                        <td class="align-middle">
                                                                            <?php if(!empty($tarifas)){ ?>
                                                                            <?php foreach($tarifas as $t){ 
                                                                                if($date == $t['fecha_tarifa'] && $h['id_habitacion'] == $t['id_habitacion_tarifa']){?>
                                                                                    <?php if($t['plan_tarifa'] == 3){ ?>
                                                                                        Plan <?= $t['abrev_tipo_plan']; ?><br>
                                                                                        <strong>Pax1</strong> $<?= number_format($t['pax1_tarifa'],2); ?><br>
                                                                                        <strong>Pax2</strong>  $<?= number_format($t['pax2_tarifa'],2); ?><br>
                                                                                        <strong>Pax3</strong>  $<?= number_format($t['pax3_tarifa'],2); ?><br>
                                                                                        <strong>Pax4</strong>  $<?= number_format($t['pax4_tarifa'],2); ?><br>
                                                                                        <strong>Pax5</strong>  $<?= number_format($t['pax5_tarifa'],2); ?><br>
                                                                                        <strong>Pax6</strong>  $<?= number_format($t['pax6_tarifa'],2); ?><br>
                                                                                        <strong>Infante</strong>  $<?= number_format($t['infante_tarifa'],2); ?><br>
                                                                                        <strong>Menor</strong>  $<?= number_format($t['menor_tarifa'],2); ?><br>
                                                                                        <strong>Junior</strong>  $<?= number_format($t['junior_tarifa'],2); ?><br>
                                                                                    <?php }else{ ?>
                                                                                        Plan <?= $t['abrev_tipo_plan']; ?><br>
                                                                                        <strong>Doble</strong> $<?= number_format($t['base_tarifa'],2); ?><br>
                                                                                        <strong>Infante</strong> $<?= number_format($t['infante_tarifa'],2); ?><br>
                                                                                        <strong>Menor</strong> $<?= number_format($t['menor_tarifa'],2); ?><br>
                                                                                        <strong>Junior</strong> $<?= number_format($t['junior_tarifa'],2); ?><br>
                                                                                        <strong>Adicional</strong> $<?= number_format($t['paxextra_tarifa'],2); ?><br>
                                                                                    <?php } ?>
                                                                                    <br>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <?php } ?>
                                                                    </tr>
                                                                <?php } ?>
                                                                <?php } ?>
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
                                            <form id="formAdministrarTarifas" class="row">
                                                <div class="col-md-3 col-sm-12 mb-2">
                                                    <label for="habitacionTarifa">Habitación</label>
                                                    <select class="form-control" id="habitacionTarifa" name="habitacionTarifa">
                                                        <option value="0">Selecciona...</option>
                                                        <?php if(!empty($habitaciones)){ foreach($habitaciones as $x){ ?>
                                                        <option value="<?= $x['id_habitacion']; ?>"><?= $x['nombre_habitacion']; ?></option>
                                                        <?php } } ?>
                                                    </select>        
                                                </div>
                                                <div class="col-md-3 col-sm-12 mb-2">
                                                    <label for="planTarifa">Plan</label>
                                                    <select class="form-control" id="planTarifa" name="planTarifa">
                                                        <option value="0">Selecciona...</option>
                                                        <?php if(!empty($planes)){ foreach($planes as $x){ ?>
                                                        <option value="<?= $x['id_tipo_plan']; ?>"><?= $x['abrev_tipo_plan']." - ".$x['nombre_tipo_plan']; ?></option>
                                                        <?php } } ?>
                                                    </select>   
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="fechaInicioTarifa">Fecha Inicial</label>
                                                    <input type="date" class="form-control" id="fechaInicioTarifa" name="fechaInicioTarifa" required>      
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="fechaFinTarifa">Fecha Final</label>
                                                    <input type="date" class="form-control" id="fechaFinTarifa" name="fechaFinTarifa" required>      
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label>Días de la Semana</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifas" type="checkbox" value="Monday" id="Lunes2" checked>
                                                        <label class="form-check-label" for="Lunes">L</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifas" type="checkbox" value="Tuesday" id="Martes2" checked>
                                                        <label class="form-check-label" for="Martes">M</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifas" type="checkbox" value="Wednesday" id="Miércoles2" checked>
                                                        <label class="form-check-label" for="Miércoles">Mi</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifas" type="checkbox" value="Thursday" id="Jueves2" checked>
                                                        <label class="form-check-label" for="Jueves">J</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifas" type="checkbox" value="Friday" id="Viernes2" checked>
                                                        <label class="form-check-label" for="Viernes">V</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifas" type="checkbox" value="Saturday" id="Sábado2" checked>
                                                        <label class="form-check-label" for="Sábado">S</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiastarifas" type="checkbox" value="Sunday" id="Domingo2" checked>
                                                        <label class="form-check-label" for="Domingo">D</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="ivaTarifa">IVA (%)</label>
                                                    <input type="number" class="form-control" id="ivaTarifa" name="ivaTarifa" value="<?= $hotel[0]['iva_hotel']; ?>" required>      
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="ishTarifa">ISH (%)</label>
                                                    <input type="number" class="form-control" id="ishTarifa" name="ishTarifa" value="<?= $hotel[0]['ish_hotel']; ?>" required>      
                                                </div>
                                                <div class="col-md-3 divTarifasPlanDefault">
                                                    <label for="tarifaDoble">Tarifa Doble</label>
                                                    <input type="number" class="form-control" id="tarifaDoble" name="tarifaDoble" value="0" required>      
                                                </div>
                                                <div class="col-md-3 divTarifasPlanAL" hidden>
                                                    <label for="tarifaPax1">Tarifa Pax 1</label>
                                                    <input type="number" class="form-control" id="tarifaPax1" name="tarifaPax1" value="0" required>      
                                                </div>
                                                <div class="col-md-3 divTarifasPlanDefault">
                                                    <label for="tarifaPersonaAdicional">Tarifa Persona Adicional</label>
                                                    <input type="number" class="form-control" id="tarifaPersonaAdicional" name="tarifaPersonaAdicional" value="0" required>      
                                                </div>
                                                <div class="col-md-3 divTarifasPlanAL" hidden>
                                                    <label for="tarifaPax2">Tarifa Pax 2</label>
                                                    <input type="number" class="form-control" id="tarifaPax2" name="tarifaPax2" value="0" required>      
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="tarifaInfante">Tarifa Infante</label>
                                                    <input type="number" class="form-control" id="tarifaInfante" name="tarifaInfante" value="0" required>      
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="tarifaMenor">Tarifa Menor</label>
                                                    <input type="number" class="form-control" id="tarifaMenor" name="tarifaMenor" value="0" required>      
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="tarifaJunior">Tarifa Junior</label>
                                                    <input type="number" class="form-control" id="tarifaJunior" name="tarifaJunior" value="0" required>      
                                                </div>
                                                <div class="col-md-3 divTarifasPlanAL" hidden>
                                                    <label for="tarifaPax3">Tarifa Pax 3</label>
                                                    <input type="number" class="form-control" id="tarifaPax3" name="tarifaPax3" value="0" required>      
                                                </div>
                                                <div class="col-md-3 divTarifasPlanAL" hidden>
                                                    <label for="tarifaPax4">Tarifa Pax 4</label>
                                                    <input type="number" class="form-control" id="tarifaPax4" name="tarifaPax4" value="0" required>      
                                                </div>
                                                <div class="col-md-3"></div><div class="col-md-3"></div>
                                                <div class="col-md-3 divTarifasPlanAL" hidden>
                                                    <label for="tarifaPax5">Tarifa Pax 5</label>
                                                    <input type="number" class="form-control" id="tarifaPax5" name="tarifaPax5" value="0" required>      
                                                </div>
                                                <div class="col-md-3 divTarifasPlanAL" hidden>
                                                    <label for="tarifaPax6">Tarifa Pax 6</label>
                                                    <input type="number" class="form-control" id="tarifaPax6" name="tarifaPax6" value="0" required>      
                                                </div>
                                                <div class="col-md-12 mt-4 text-center">
                                                    <button id="btnAdministrarTarifas" type="submit" class="btn btn-primary font-weight-bold">GUARDAR TARIFAS</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="promociones" role="tabpanel" aria-labelledby="promociones-tab">
                                    <div id="accordion">
                                        <div class="card shadow mb-2">
                                            <div class="card-header bg-easycheck" id="headingVerPromociones">
                                                <h5 class="mb-0">
                                                <button class="btn btn-link font-weight-bold text-white" data-toggle="collapse" data-target="#collapseVerPromociones" aria-expanded="false" aria-controls="collapseOne">
                                                    VER PROMOCIONES <small>Clic para ver más</small>
                                                </button>
                                                </h5>
                                            </div>
                                            <div id="collapseVerPromociones" class="collapse" aria-labelledby="headingVerPromociones" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 table-responsive">
                                                            <table class="display tablanaturleon" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Acciones</th>
                                                                        <th>Nombre</th>
                                                                        <th>Habitación | Plan</th>
                                                                        <th>Promoción</th>
                                                                        <th>Booking Window</th>
                                                                        <th>Travel Window</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if(!empty($promociones)){foreach($promociones as $x){ ?>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <button type="button" class="btn btn-primary" title="Administrar Promoción" onclick="EditarPromocion(<?= $x['id_promocion']; ?>)"><i class="fas fa-edit"></i></button>
                                                                            <?php if($x['status_promocion'] == 1){ ?>
                                                                            <button type="button" class="btn btn-danger" title="Desactivar Promoción" onclick="CambiarStatusDataHotel(<?= $x['id_promocion']; ?>,0,'ip','sp','hp')"><i class="fas fa-times-circle"></i></button>
                                                                            <?php }else{ ?>
                                                                            <button type="button" class="btn btn-success" title="Activar Promoción" onclick="CambiarStatusDataHotel(<?= $x['id_promocion']; ?>,1,'ip','sp','hp')"><i class="fas fa-check-circle"></i></button>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td class="text-center text-white <?php if($x['status_promocion'] == "1"){?>bg-success<?php }else{ ?>bg-danger<?php } ?>">
                                                                            <?= $x['nombre_promocion']; ?>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <?php if(!empty($habitaciones)){ foreach($habitaciones as $h){ if($h['id_habitacion'] == $x['habitacion_promocion']){
                                                                                echo $h['nombre_habitacion']." | ".$x['abrev_tipo_plan'];
                                                                            }}} ?>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <?php 
                                                                                echo $x['valor_promocion'];
                                                                                if($x['tipo_promocion'] == 1){
                                                                                    echo " Menor(es) Gratis";
                                                                                }else if($x['tipo_promocion'] == 2){
                                                                                    echo " Persona(s) Gratis";
                                                                                }else if($x['tipo_promocion'] == 5){
                                                                                    echo " Noche(s) Gratis";
                                                                                }else if($x['tipo_promocion'] == 3 || $x['tipo_promocion'] == 4 || $x['tipo_promocion'] == 6 || $x['tipo_promocion'] == 7
                                                                                || $x['tipo_promocion'] == 8 || $x['tipo_promocion'] == 9 || $x['tipo_promocion'] == 10){
                                                                                    echo "% ".$x['nombre_tipo_promocion'];
                                                                                }
                                                                            ?>
                                                                            <?php if($x['tipo_promocion'] == "6"){
                                                                                echo " | ".$x['periodo_promocion']." días.";
                                                                            } ?>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <?= date("d/m/Y",strtotime($x['fechainicio_booking_promocion']))." > ".date("d/m/Y",strtotime($x['fechafin_booking_promocion'])); ?>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <?= date("d/m/Y",strtotime($x['fechainicio_travel_promocion']))." > ".date("d/m/Y",strtotime($x['fechafin_travel_promocion'])); ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php }} ?>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Acciones</th>
                                                                        <th>Nombre</th>
                                                                        <th>Habitación | Plan</th>
                                                                        <th>Promoción</th>
                                                                        <th>Booking</th>
                                                                        <th>Travel</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card shadow mb-2">
                                        <div class="card-header bg-easycheck font-weight-bold text-white">ADMINISTRAR PROMOCIONES</div>
                                        <div class="card-body">
                                            <form id="formAdministrarPromociones" class="row">
                                                <input type="hidden" name="idPromocion" id="idPromocion" value="0">
                                                <div class="col-md-12 mb-2">
                                                    <button class="btn btn-primary font-weight-bold" onclick="AgregarNuevaPromocion()">NUEVA PROMOCIÓN</button>
                                                </div>
                                                <div class="col-md-4 col-sm-12 mb-2">
                                                    <label for="nombrePromocion">Nombre Promoción</label>
                                                    <input type="text" class="form-control" id="nombrePromocion" name="nombrePromocion" required>      
                                                </div>
                                                <div class="col-md-4 col-sm-12 mb-2">
                                                    <label for="habitacionPromocion">Habitación</label>
                                                    <select class="form-control" id="habitacionPromocion" name="habitacionPromocion">
                                                        <option value="0">Selecciona...</option>
                                                        <?php if(!empty($habitaciones)){ foreach($habitaciones as $x){ ?>
                                                        <option value="<?= $x['id_habitacion']; ?>"><?= $x['nombre_habitacion']; ?></option>
                                                        <?php } } ?>
                                                    </select>        
                                                </div>
                                                <div class="col-md-4 col-sm-12 mb-2">
                                                    <label for="planPromocion">Plan</label>
                                                    <select class="form-control" id="planPromocion" name="planPromocion">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($planes as $x){ ?>
                                                        <option value="<?= $x['id_tipo_plan']; ?>"><?= $x['abrev_tipo_plan']." - ".$x['nombre_tipo_plan']; ?></option>
                                                        <?php } ?>
                                                    </select>   
                                                </div>
                                                <div class="col-md-4 col-sm-12 mb-2">
                                                    <label for="tipoPromocion">Tipo Promoción</label>
                                                    <select class="form-control" id="tipoPromocion" name="tipoPromocion">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($tipospromociones as $x){ ?>
                                                        <option value="<?= $x['id_tipo_promocion']; ?>"><?= $x['nombre_tipo_promocion']; ?></option>
                                                        <?php } ?>
                                                    </select>        
                                                </div>
                                                <div class="col-md-4 col-sm-12 mb-2">
                                                    <label for="valorPromocion">Valor Promoción (#/%)</label>
                                                    <input type="number" class="form-control" id="valorPromocion" name="valorPromocion" value="0" required>      
                                                </div>
                                                <div class="col-md-4 col-sm-12 mb-2">
                                                    <label for="periodoPromocion">Periodo Promoción (Días)</label>
                                                    <input type="number" class="form-control" id="periodoPromocion" name="periodoPromocion" value="0" required>      
                                                </div>
                                                <div class="col-md-6 col-sm-12 mb-2 font-weight-bold text-center">Booking Window</div>
                                                <div class="col-md-6 col-sm-12 mb-2 font-weight-bold text-center">Travel Window</div>
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="fechaInicioBookingWindow">Fecha Inicial</label>
                                                    <input type="date" class="form-control" id="fechaInicioBookingWindow" name="fechaInicioBookingWindow" required>      
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="fechaFinBookingWindow">Fecha Final</label>
                                                    <input type="date" class="form-control" id="fechaFinBookingWindow" name="fechaFinBookingWindow" required>      
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="fechaInicioTravelWindow">Fecha Inicial</label>
                                                    <input type="date" class="form-control" id="fechaInicioTravelWindow" name="fechaInicioTravelWindow" required>      
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="fechaFinTravelWindow">Fecha Final</label>
                                                    <input type="date" class="form-control" id="fechaFinTravelWindow" name="fechaFinTravelWindow" required>      
                                                </div>
                                                <div class="col-md-12 mt-4 text-center">
                                                    <button id="btnAdministrarPromociones" type="submit" class="btn btn-primary font-weight-bold">GUARDAR PROMOCIONES</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="restricciones" role="tabpanel" aria-labelledby="restricciones-tab">
                                    <div id="accordion">
                                        <div class="card shadow mb-2">
                                            <div class="card-header bg-easycheck" id="headingVerRestricciones">
                                                <h5 class="mb-0">
                                                <button class="btn btn-link font-weight-bold text-white" data-toggle="collapse" data-target="#collapseVerRestricciones" aria-expanded="false" aria-controls="collapseOne">
                                                    VER RESTRICCIONES <small>Clic para ver más</small>
                                                </button>
                                                </h5>
                                            </div>
                                            <div id="collapseVerRestricciones" class="collapse" aria-labelledby="headingVerRestricciones" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12 text-center">
                                                            Restricciones del<br>
                                                            <?php echo date("d/m/Y",strtotime($fecha1))." al ".date("d/m/Y",strtotime($fecha2)); ?>
                                                        </div>
                                                        <div class="col-md-3 col-sm-12">
                                                            <input type="date" class="form-control" id="fechaInicioRestricciones" value="<?= $fecha1; ?>">
                                                        </div>
                                                        <div class="col-md-3 col-sm-12">
                                                            <input type="date" class="form-control" id="fechaFinRestricciones" value="<?= $fecha2; ?>">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12">
                                                            <button id="BtnBuscarRestriccionesFechas" class="btn btn-primary">BUSCAR</button>
                                                        </div>
                                                        <div class="col-12 table-responsive">
                                                            <hr>
                                                            <table class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle bg-easycheck text-white">Habitaciones</th>
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
                                                                <?php if(!empty($habitaciones)){ ?>
                                                                <?php foreach($habitaciones as $h){ ?>
                                                                    <tr class="text-center align-middle">
                                                                        <td class="align-middle"><?= $h['nombre_habitacion']; ?></td>
                                                                        <?php foreach($dates as $date){ ?>
                                                                        <td class="align-middle">
                                                                            <?php if($restricciones > 0){ ?>
                                                                            <?php foreach($restricciones as $r){ 
                                                                                if($date == $r['fecha_restriccion'] && $h['id_habitacion'] == $r['habitacion_restriccion']){?>
                                                                                    <?php if($r['tipo_restriccion'] == 1 || $r['tipo_restriccion'] == 2){ ?>
                                                                                        Plan <?= $r['abrev_tipo_plan']; ?><br>
                                                                                        <strong><?= $r['nombre_tipo_restriccion']; ?></strong><br><?= $r['dias_restriccion']; ?> días<br>
                                                                                    <?php }else{ ?>
                                                                                        Plan <?= $t['abrev_tipo_plan']; ?><br>
                                                                                        <strong><?= $r['nombre_tipo_restriccion']; ?></strong><br>
                                                                                    <?php } ?>
                                                                                    <br>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <?php } ?>
                                                                    </tr>
                                                                <?php } ?>
                                                                <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card shadow mb-2">
                                        <div class="card-header bg-easycheck font-weight-bold text-white">ADMINISTRAR RESTRICCIONES</div>
                                        <div class="card-body">
                                            <form id="formAdministrarRestriccion" class="row">
                                                <div class="col-md-4 col-sm-12 mb-2">
                                                    <label for="habitacionRestriccion">Habitación</label>
                                                    <select class="form-control" id="habitacionRestriccion" name="habitacionRestriccion">
                                                        <option value="0">Selecciona...</option>
                                                        <?php if(!empty($habitaciones)){ foreach($habitaciones as $x){ ?>
                                                        <option value="<?= $x['id_habitacion']; ?>"><?= $x['nombre_habitacion']; ?></option>
                                                        <?php } } ?>
                                                    </select>        
                                                </div>
                                                <div class="col-md-4 col-sm-12 mb-2">
                                                    <label for="planRestriccion">Plan</label>
                                                    <select class="form-control" id="planRestriccion" name="planRestriccion">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($planes as $x){ ?>
                                                        <option value="<?= $x['id_tipo_plan']; ?>"><?= $x['abrev_tipo_plan']." - ".$x['nombre_tipo_plan']; ?></option>
                                                        <?php } ?>
                                                    </select>   
                                                </div>
                                                <div class="col-md-4 col-sm-12 mb-2">
                                                    <label for="tipoRestriccion">Restricción</label>
                                                    <select class="form-control" id="tipoRestriccion" name="tipoRestriccion">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($tiposrestricciones as $x){ ?>
                                                        <option value="<?= $x['id_tipo_restriccion']; ?>"><?= $x['nombre_tipo_restriccion']; ?></option>
                                                        <?php } ?>
                                                    </select>   
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <label for="diasRestriccion">Núm. Días</label>
                                                    <input type="number" class="form-control" id="diasRestriccion" name="diasRestriccion" value="0">
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <label for="fechaInicioRestriccion">Fecha Inicial</label>
                                                    <input type="date" class="form-control" id="fechaInicioRestriccion" name="fechaInicioRestriccion" required>      
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <label for="fechaFinRestriccion">Fecha Final</label>
                                                    <input type="date" class="form-control" id="fechaFinRestriccion" name="fechaFinRestriccion" required>      
                                                </div>
                                                <div class="col-md-12 col-sm-12 mt-2">
                                                    <label>Días de la Semana</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiasrestriccion" type="checkbox" value="Monday" id="Lunes3" checked>
                                                        <label class="form-check-label" for="Lunes">L</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiasrestriccion" type="checkbox" value="Tuesday" id="Martes3" checked>
                                                        <label class="form-check-label" for="Martes">M</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiasrestriccion" type="checkbox" value="Wednesday" id="Miércoles3" checked>
                                                        <label class="form-check-label" for="Miércoles">Mi</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiasrestriccion" type="checkbox" value="Thursday" id="Jueves3" checked>
                                                        <label class="form-check-label" for="Jueves">J</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiasrestriccion" type="checkbox" value="Friday" id="Viernes3" checked>
                                                        <label class="form-check-label" for="Viernes">V</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiasrestriccion" type="checkbox" value="Saturday" id="Sábado3" checked>
                                                        <label class="form-check-label" for="Sábado">S</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiasrestriccion" type="checkbox" value="Sunday" id="Domingo3" checked>
                                                        <label class="form-check-label" for="Domingo">D</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4 text-center">
                                                    <button id="btnAdministrarRestriccion" type="submit" class="btn btn-primary font-weight-bold">GUARDAR RESTRICCION</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="inventario" role="tabpanel" aria-labelledby="inventario-tab">
                                    <div id="accordion">
                                        <div class="card shadow mb-2">
                                            <div class="card-header bg-easycheck" id="headingVerInventario">
                                                <h5 class="mb-0">
                                                <button class="btn btn-link font-weight-bold text-white" data-toggle="collapse" data-target="#collapseVerInventario" aria-expanded="false" aria-controls="collapseOne">
                                                    VER INVENTARIO <small>Clic para ver más</small>
                                                </button>
                                                </h5>
                                            </div>
                                            <div id="collapseVerInventario" class="collapse" aria-labelledby="headingVerInventario" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12 text-center">
                                                            Inventario del<br>
                                                            <?php echo date("d/m/Y",strtotime($fecha1))." al ".date("d/m/Y",strtotime($fecha2)); ?>
                                                        </div>
                                                        <div class="col-md-3 col-sm-12">
                                                            <input type="date" class="form-control" id="fechaInicioInventario" value="<?= $fecha1; ?>">
                                                        </div>
                                                        <div class="col-md-3 col-sm-12">
                                                            <input type="date" class="form-control" id="fechaFinInventario" value="<?= $fecha2; ?>">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12">
                                                            <button id="BtnBuscarInventarioFechas" class="btn btn-primary btn-block">BUSCAR</button>
                                                        </div>
                                                        <div class="col-12 table-responsive">
                                                            <hr>
                                                            <table class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle bg-easycheck text-white">Habitaciones</th>
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
                                                                <?php if(!empty($habitaciones)){ ?>
                                                                <?php foreach($habitaciones as $h){ ?>
                                                                    <tr class="text-center align-middle">
                                                                        <td class="align-middle"><?= $h['nombre_habitacion']; ?></td>
                                                                        <?php foreach($dates as $date){ ?>
                                                                        <td class="align-middle">
                                                                        <?php if(!empty($inventario)){ ?>
                                                                        <?php foreach($inventario as $i){
                                                                            if($date == $i['fecha_inventario'] && $h['id_habitacion'] == $i['id_habitacion_inventario']){?>
                                                                                <?php echo $i['abrev_tipo_plan']." Inv: ".$i['cantidad_inventario']; ?>
                                                                                <?php if($i['status_inventario'] == "1"){ ?>
                                                                                    <label class="text-success">Open</label>
                                                                                <?php }else{ ?>
                                                                                    <label class="text-danger">Close</label>
                                                                                <?php } ?>
                                                                                <br>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                        <?php } ?>
                                                                        </td>
                                                                        <?php } ?>
                                                                    </tr>
                                                                <?php } ?>
                                                                <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card shadow mb-2">
                                        <div class="card-header bg-easycheck font-weight-bold text-white">ADMINISTRAR INVENTARIO</div>
                                        <div class="card-body">
                                            <form id="formAdministrarInventario" class="row">
                                                <div class="col-md-3 col-sm-12 mb-2">
                                                    <label for="habitacionInventario">Habitación</label>
                                                    <select class="form-control" id="habitacionInventario" name="habitacionInventario">
                                                        <option value="0">Selecciona...</option>
                                                        <?php if(!empty($habitaciones)){ foreach($habitaciones as $x){ ?>
                                                        <option value="<?= $x['id_habitacion']; ?>"><?= $x['nombre_habitacion']; ?></option>
                                                        <?php } } ?>
                                                    </select>        
                                                </div>
                                                <div class="col-md-3 col-sm-12 mb-2">
                                                    <label for="planInventario">Plan</label>
                                                    <select class="form-control" id="planInventario" name="planInventario">
                                                        <option value="0">Selecciona...</option>
                                                        <?php foreach($planes as $x){ ?>
                                                        <option value="<?= $x['id_tipo_plan']; ?>"><?= $x['abrev_tipo_plan']." - ".$x['nombre_tipo_plan']; ?></option>
                                                        <?php } ?>
                                                    </select>   
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="fechaInicioInventario">Fecha Inicial</label>
                                                    <input type="date" class="form-control" id="fechaInicioInventario" name="fechaInicioInventario" required>      
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="fechaFinInventario">Fecha Final</label>
                                                    <input type="date" class="form-control" id="fechaFinInventario" name="fechaFinInventario" required>      
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="cantidadInventario">Núm. Habitaciones</label>
                                                    <input type="number" class="form-control" id="cantidadInventario" name="cantidadInventario" value="0">
                                                </div>
                                                <div class="col-md-9 col-sm-12">
                                                    <label>Días de la Semana</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiasinventario" type="checkbox" value="Monday" id="Lunes" checked>
                                                        <label class="form-check-label" for="Lunes">L</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiasinventario" type="checkbox" value="Tuesday" id="Martes" checked>
                                                        <label class="form-check-label" for="Martes">M</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiasinventario" type="checkbox" value="Wednesday" id="Miércoles" checked>
                                                        <label class="form-check-label" for="Miércoles">Mi</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiasinventario" type="checkbox" value="Thursday" id="Jueves" checked>
                                                        <label class="form-check-label" for="Jueves">J</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiasinventario" type="checkbox" value="Friday" id="Viernes" checked>
                                                        <label class="form-check-label" for="Viernes">V</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiasinventario" type="checkbox" value="Saturday" id="Sábado" checked>
                                                        <label class="form-check-label" for="Sábado">S</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkboxdiasinventario" type="checkbox" value="Sunday" id="Domingo" checked>
                                                        <label class="form-check-label" for="Domingo">D</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4 text-center">
                                                    <button id="btnAdministrarInventario" type="submit" class="btn btn-primary font-weight-bold">GUARDAR INVENTARIO</button>
                                                    <button id="btnAbrirFechasInventario" onclick="AbrirCerrarFechasInventario(1)" type="button" class="btn btn-success font-weight-bold">ABRIR FECHAS</button>
                                                    <button id="btnCerrarFechasInventario" onclick="AbrirCerrarFechasInventario(0)" type="button" class="btn btn-danger font-weight-bold">CERRAR FECHAS</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="imagenes" role="tabpanel" aria-labelledby="imagenes-tab">
                                    <div class="card shadow mb-2">
                                        <div class="card-header bg-easycheck font-weight-bold text-white">AGREGAR FOTOS</div>
                                        <div class="card-body">
                                            <form id="FormAgregarImagenesHotel" class="row g-3" enctype="multipart/form-data">
                                                <input type="hidden" id="idHotelImagen" name="idHotelImagen">
                                                <input type="hidden" id="nombreHotelImagen" name="nombreHotelImagen">
                                                <div class="col-md-6 col-sm-12 mb-2">
                                                    <label for="archivosImagenesHotel" class="form-label text-dark"><strong>Imágenes</strong></label>
                                                    <input type="file" name="archivosImagenesHotel[]" id="archivosImagenesHotel" class="form-control" multiple>
                                                </div>
                                                <div class="col-md-6 col-sm-12 mb-2">
                                                    <label for="nombreImagenHotel" class="form-label text-dark"><strong>Nombre</strong></label>
                                                    <input type="text" name="nombreImagenHotel" id="nombreImagenHotel" class="form-control">
                                                </div>
                                                <div class="col-md-12 col-sm-12 text-center mt-4 mb-2">
                                                    <button id="btnAgregarImagenesHotel" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button>
                                                </div>
                                            </form>
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <button class="btn btn-primary font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseImagenesHotel" aria-expanded="false" aria-controls="collapseExample">
                                                        MOSTRAR/OCULTAR FOTOS HOTEL
                                                    </button>

                                                    <div class="collapse show" id="collapseImagenesHotel">
                                                        <div class="card card-body">
                                                            <ul class="image-gallery">
                                                                <?php if(!empty($imageneshotel)){foreach($imageneshotel as $x){ ?>
                                                                <li>
                                                                    <img src="<?= base_url($x['archivo_hotel_imagen']); ?>">
                                                                    <?php if($x['status_hotel_imagen'] == 1){ ?>
                                                                        <div class="image-caption green-caption"><p>ACTIVA</p></div>
                                                                        <button title="Activar Imagen Hotel" onclick="CambiarStatusDataHotel(<?= $x['id_hotel_imagen']; ?>,0,'ihi','shi','hi')" class="active-btn"><i class="fas fa-check-circle"></i></button>
                                                                    <?php }else{ ?>
                                                                        <div class="image-caption red-caption"><p>INACTIVA</p></div>
                                                                        <button title="Desactivar Imagen Hotel" onclick="CambiarStatusDataHotel(<?= $x['id_hotel_imagen']; ?>,1,'ihi','shi','hi')" class="delete-btn"><i class="fas fa-times-circle"></i></button>
                                                                    <?php } ?>
                                                                </li>
                                                                <?php }} ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="tab-pane fade" id="configuracion" role="tabpanel" aria-labelledby="configuracion-tab">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-12 order-1 order-xs-2">
                                            <ul class="nav nav-tabs flex-column" id="myTabConfig" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="mbp-tab" data-toggle="tab" href="#mbp" role="tab" aria-controls="mbp" aria-selected="true">
                                                        MBP
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="imagenes-hotel-tab" data-toggle="tab" href="#imagenesHotel" role="tab" aria-controls="imagenesHotel" aria-selected="true">
                                                        IMÁGENES
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-10 col-sm-12 order-2 order-xs-1">
                                            <div class="tab-content" id="myTabContentConfig">
                                                <div class="tab-pane fade show active" id="mbp" role="tabpanel" aria-labelledby="mbp-tab">
                                                    <ul class="nav nav-pills nav-justified" id="mbpTab" role="tablist">
                                                        <li class="nav-item col-xs-6">
                                                            <a class="nav-link active" id="mbp-destino-tab" data-toggle="tab" href="#mbpDestino" role="tab" aria-controls="mbpDestino" aria-selected="true">
                                                                DESTINO
                                                            </a>
                                                        </li>
                                                        <li class="nav-item col-xs-6">
                                                            <a class="nav-link" id="mbp-hotel-tab" data-toggle="tab" href="#mbpHotel" role="tab" aria-controls="mbpHotel" aria-selected="false">
                                                                HOTEL
                                                            </a>
                                                        </li>
                                                        <li class="nav-item col-xs-6">
                                                            <a class="nav-link" id="mbp-paquetes-tab" data-toggle="tab" href="#mbpPaquetes" role="tab" aria-controls="mbpPaquetes" aria-selected="false">
                                                                PAQUETES
                                                            </a>
                                                        </li>
                                                        <li class="nav-item col-xs-6">
                                                            <a class="nav-link" id="mbp-fotos-tab" data-toggle="tab" href="#mbpFotos" role="tab" aria-controls="mbpFotos" aria-selected="false">
                                                                FOTOS
                                                            </a>
                                                        </li>
                                                        <li class="nav-item col-xs-6">
                                                            <a class="nav-link" id="mbp-videos-tab" data-toggle="tab" href="#mbpVideos" role="tab" aria-controls="mbpVideos" aria-selected="false">
                                                                VIDEOS
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="TabContentMbp">
                                                        <div class="tab-pane fade show active" id="mbpDestino" role="tabpanel" aria-labelledby="mbp-destino-tab">
                                                            <div class="card shadow mb-2">
                                                                <div class="card-header bg-easycheck font-weight-bold text-white">DESTINO</div>
                                                                <div class="card-body">
                                                                    <form id="FormMbpDestino" class="row g-3">
                                                                        <div class="col-md-6 col-sm-12 mb-2">
                                                                            <input type="hidden" id="destinoMbp" name="destinoMbp" value="<?= $hotel[0]['destino_hotel']; ?>">
                                                                            <input type="hidden" name="nombrehotel" value="<?= $hotel[0]['nombre_hotel']; ?>">
                                                                            <label for="imagenDestinoMbp" class="form-label text-dark"><strong>Imagen</strong></label>
                                                                            <input type="file" name="imagenDestinoMbp" id="imagenDestinoMbp" class="form-control" accept="image/*">
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 mb-2">
                                                                            <div class="card p-2 text-center">
                                                                                <label for="imagePreviewMbp" class="form-label text-dark"><strong>Imagen Actual</strong></label>
                                                                                <img id="imagePreviewMbp" src="<?= base_url().$hotel[0]['imagen_mbp_destino']; ?>" alt="Vista previa de la imagen" class="img-fluid" style="max-height: 100%;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 text-center mt-4 mb-2">
                                                                            <button id="btnMbpDestino" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="mbpHotel" role="tabpanel" aria-labelledby="mbp-hotel-tab">
                                                            <div class="card shadow mb-2">
                                                                <div class="card-header bg-easycheck font-weight-bold text-white">HOTEL</div>
                                                                <div class="card-body">
                                                                    <form id="FormMbpHotel" class="row g-3">
                                                                        <div class="col-md-6 col-sm-12 mb-2">
                                                                            <input type="hidden" name="nombrehotel" value="<?= $hotel[0]['nombre_hotel']; ?>">
                                                                            <label for="imagenHotelMbp" class="form-label text-dark"><strong>Imagen</strong></label>
                                                                            <input type="file" name="imagenHotelMbp" id="imagenHotelMbp" class="form-control" accept="image/*">
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 mb-2">
                                                                            <div class="card p-2 text-center">
                                                                                <label for="previewHotelMbp" class="form-label text-dark"><strong>Imagen Actual</strong></label>
                                                                                <img id="previewHotelMbp" src="<?= base_url().$hotel[0]['imagen_mbp_hotel']; ?>" alt="Vista previa de la imagen" class="img-fluid" style="max-height: 100%;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 text-center mt-4 mb-2">
                                                                            <button id="btnMbpHotel" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="mbpPaquetes" role="tabpanel" aria-labelledby="mbp-paquetes-tab">
                                                            <div class="card shadow mb-2">
                                                                <div class="card-header bg-easycheck font-weight-bold text-white">PAQUETES</div>
                                                                <div class="card-body">
                                                                    <form id="FormMbpPaquetes" class="row g-3">
                                                                        <div class="col-md-6 col-sm-6 mb-2">
                                                                            <input type="hidden" name="nombrehotel" value="<?= $hotel[0]['nombre_hotel']; ?>">
                                                                            <label for="paquetesMbp" class="form-label text-dark"><strong>Imágenes</strong></label>
                                                                            <input type="file" name="paquetesMbp[]" id="paquetesMbp" class="form-control" accept="image/*" multiple required>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6 mb-2">
                                                                            <label for="nombrePaquete" class="form-label text-dark"><strong>Nombre Paquete</strong></label>
                                                                            <input type="text" name="nombrePaquete" id="nombrePaquete" class="form-control" required>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 text-center mt-4 mb-2">
                                                                            <button id="btnAgregarMbpPaquetes" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button>
                                                                        </div>
                                                                    </form>
                                                                    <div class="">
                                                                        <div class="col-12">
                                                                            <button class="btn btn-primary font-weight-bold" type="button" data-toggle="collapse" data-target="#collapsePaquetesMBP" aria-expanded="false" aria-controls="collapseExample">
                                                                                MOSTRAR/OCULTAR PAQUETES
                                                                            </button>

                                                                            <div class="collapse show" id="collapsePaquetesMBP">
                                                                                <div class="card card-body">
                                                                                    <?php if (!empty($paquetesMbp)){ ?>
                                                                                    <?php foreach ($paquetesMbp as $titulo_paquete => $items_paquete){ ?>
                                                                                        <h2><?php echo htmlspecialchars($titulo_paquete); ?></h2>
                                                                                        <ul class="image-gallery">
                                                                                            <?php foreach ($items_paquete as $x){ ?>
                                                                                                <li>
                                                                                                    <a href="#" 
                                                                                                        data-toggle="modal" 
                                                                                                        data-target="#imageModal"
                                                                                                        data-img-src="<?= base_url($x['imagen_paquete_mbp']); ?>"
                                                                                                        data-img-id="<?= $x['id_paquete_mbp']; ?>"
                                                                                                        data-img-title="<?= htmlspecialchars($titulo_paquete); ?>">
                                                                                                            <img src="<?= base_url($x['imagen_paquete_mbp']); ?>" alt="<?= htmlspecialchars($titulo_paquete); ?>">
                                                                                                    </a>
                                                                                                    <?php if($x['status_paquete_mbp'] == 1){ ?>
                                                                                                        <div class="image-caption green-caption"><p>ACTIVA</p></div>
                                                                                                        <button title="Desactivar Foto" onclick="CambiarStatusDataHotel(<?= $x['id_paquete_mbp']; ?>,0,'ipm','spm','mp')" class="delete-btn"><i class="fas fa-times-circle"></i></button>
                                                                                                    <?php }else{ ?>
                                                                                                        <div class="image-caption red-caption"><p>INACTIVA</p></div>
                                                                                                        <button title="Activar Foto" onclick="CambiarStatusDataHotel(<?= $x['id_paquete_mbp']; ?>,1,'ipm','spm','mp')" class="active-btn"><i class="fas fa-check-circle"></i></button>
                                                                                                    <?php } ?>
                                                                                                </li>
                                                                                            <?php } ?>
                                                                                        </ul>
                                                                                        <hr>
                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="mbpFotos" role="tabpanel" aria-labelledby="mbp-fotos-tab">
                                                            <div class="card shadow mb-2">
                                                                <div class="card-header bg-easycheck font-weight-bold text-white">FOTOS</div>
                                                                <div class="card-body">
                                                                    <div class="row g-3">
                                                                        <form id="FormMbpFotos" class="col-12">
                                                                            <div class="col-md-12 col-sm-12 mb-2">
                                                                                <input type="hidden" name="nombrehotel" value="<?= $hotel[0]['nombre_hotel']; ?>">
                                                                                <label for="fotosMbp" class="form-label text-dark"><strong>Imágenes</strong></label>
                                                                                <input type="file" name="fotosMbp[]" id="fotosMbp" class="form-control" accept="image/*" multiple>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 text-center mt-4 mb-2">
                                                                                <button id="btnAgregarMbpFotos" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button>
                                                                            </div>
                                                                        </form>
                                                                        <div class="col-12">
                                                                            <button class="btn btn-primary font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseFotosMBP" aria-expanded="false" aria-controls="collapseExample">
                                                                                MOSTRAR/OCULTAR FOTOS
                                                                            </button>

                                                                            <div class="collapse show" id="collapseFotosMBP">
                                                                                <div class="card card-body">
                                                                                    <ul class="image-gallery">
                                                                                        <?php if(!empty($fotosMbp)){ usort($fotosMbp, function($a, $b) {return $b['status_foto_mbp'] <=> $a['status_foto_mbp'];}); foreach($fotosMbp as $x){ ?>
                                                                                        <li>
                                                                                            <img src="<?= base_url($x['foto_mbp']); ?>">
                                                                                            <?php if($x['status_foto_mbp'] == 1){ ?>
                                                                                                <div class="image-caption green-caption"><p>ACTIVA</p></div>
                                                                                                <button title="Desactivar Foto" onclick="CambiarStatusDataHotel(<?= $x['id_foto_mbp']; ?>,0,'ifm','sfm','mf')" class="delete-btn"><i class="fas fa-times-circle"></i></button>
                                                                                            <?php }else{ ?>
                                                                                                <div class="image-caption red-caption"><p>INACTIVA</p></div>
                                                                                                <button title="Activar Foto" onclick="CambiarStatusDataHotel(<?= $x['id_foto_mbp']; ?>,1,'ifm','sfm','mf')" class="active-btn"><i class="fas fa-check-circle"></i></button>
                                                                                            <?php } ?>
                                                                                        </li>
                                                                                        <?php }} ?>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="mbpVideos" role="tabpanel" aria-labelledby="mbp-videos-tab">
                                                            <div class="card shadow mb-2">
                                                                <div class="card-header bg-easycheck font-weight-bold text-white">VIDEOS</div>
                                                                <div class="card-body">
                                                                    <div class="row g-3">
                                                                        <form id="FormMbpVideos" class="col-12">
                                                                            <div class="col-md-12 col-sm-12 mb-2">
                                                                                <input type="hidden" name="nombrehotel" value="<?= $hotel[0]['nombre_hotel']; ?>">
                                                                                <label for="videosMbp" class="form-label text-dark"><strong>Video</strong></label>
                                                                                <input type="file" name="videosMbp" id="videosMbp" class="form-control" accept="video/*">
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 text-center mt-4 mb-2">
                                                                                <button id="btnAgregarMbpVideos" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button>
                                                                            </div>
                                                                        </form>
                                                                        <div class="col-12">
                                                                            <button class="btn btn-primary font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseVideosMBP" aria-expanded="false" aria-controls="collapseExample">
                                                                                MOSTRAR/OCULTAR VIDEOS
                                                                            </button>

                                                                            <div class="collapse show" id="collapseVideosMBP">
                                                                                <div class="card card-body">
                                                                                    <ul class="video-gallery">
                                                                                        <?php if(!empty($videosMbp)){ usort($videosMbp, function($a, $b) {return $b['status_video_mbp'] <=> $a-['status_video_mbp'];}); foreach($videosMbp as $x){ ?>
                                                                                        <li>
                                                                                            <video src="<?= base_url($x['video_mbp']); ?>" muted controls controlsList="nodownload"></video>
                                                                                            <?php if($x['status_video_mbp'] == 1){ ?>
                                                                                                <div class="video-caption green-caption">ACTIVO</div>
                                                                                                <button title="Desactivar Video" onclick="CambiarStatusDataHotel(<?= $x['id_video_mbp']; ?>,0,'ivm','svm','mv')" class="delete-btn"><i class="fas fa-times-circle"></i></button>
                                                                                            <?php }else{ ?>
                                                                                                <div class="video-caption red-caption">INACTIVO</div>
                                                                                                <button title="Activar Video" onclick="CambiarStatusDataHotel(<?= $x['id_video_mbp']; ?>,1,'ivm','svm','mv')" class="active-btn"><i class="fas fa-check-circle"></i></button>
                                                                                            <?php } ?>
                                                                                        </li>
                                                                                        <?php }} ?>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="imagenesHotel" role="tabpanel" aria-labelledby="imagenes-hotel-tab">
                                                    <div class="card shadow mb-2">
                                                        <div class="card-header bg-easycheck font-weight-bold text-white">AGREGAR IMÁGENES</div>
                                                        <div class="card-body">
                                                            <form id="FormAgregarImagenesHotel" class="row g-3">
                                                                <input type="hidden" id="idHotelImagen" name="idHotelImagen">
                                                                <input type="hidden" id="nombreHotelImagen" name="nombreHotelImagen">
                                                                <div class="col-md-6 col-sm-12 mb-2">
                                                                    <label for="archivosImagenesHotel" class="form-label text-dark"><strong>Imágenes</strong></label>
                                                                    <input type="file" name="archivosImagenesHotel[]" id="archivosImagenesHotel" class="form-control" multiple>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 mb-2">
                                                                    <label for="nombreImagenHotel" class="form-label text-dark"><strong>Nombre</strong></label>
                                                                    <input type="text" name="nombreImagenHotel" id="nombreImagenHotel" class="form-control">
                                                                </div>
                                                                <div class="col-md-12 col-sm-12 text-center mt-4 mb-2">
                                                                    <button id="btnAgregarImagenesHotel" type="submit" class="btn btn-primary"><strong>GUARDAR</strong></button>
                                                                </div>
                                                            </form>
                                                            <div class="row g-3">
                                                                <div class="col-12">
                                                                    <button class="btn btn-primary font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseImagenesHotel" aria-expanded="false" aria-controls="collapseExample">
                                                                        MOSTRAR/OCULTAR IMÁGENES HOTEL
                                                                    </button>

                                                                    <div class="collapse show" id="collapseImagenesHotel">
                                                                        <div class="card card-body">
                                                                            <ul class="image-gallery">
                                                                                <?php if(!empty($imageneshotel)){foreach($imageneshotel as $x){ ?>
                                                                                <li>
                                                                                    <img src="<?= base_url($x['archivo_hotel_imagen']); ?>">
                                                                                    <?php if($x['status_hotel_imagen'] == 1){ ?>
                                                                                        <div class="image-caption green-caption"><p>ACTIVA</p></div>
                                                                                        <button title="Activar Imagen Hotel" onclick="CambiarStatusDataHotel(<?= $x['id_hotel_imagen']; ?>,0,'ihi','shi','hi')" class="active-btn"><i class="fas fa-check-circle"></i></button>
                                                                                    <?php }else{ ?>
                                                                                        <div class="image-caption red-caption"><p>INACTIVA</p></div>
                                                                                        <button title="Desactivar Imagen Hotel" onclick="CambiarStatusDataHotel(<?= $x['id_hotel_imagen']; ?>,1,'ihi','shi','hi')" class="delete-btn"><i class="fas fa-times-circle"></i></button>
                                                                                    <?php } ?>
                                                                                </li>
                                                                                <?php }} ?>
                                                                            </ul>
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
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php if($datosUsuario['tipo_usuario'] == "admin"): ?>

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
                            <label for="selectDestinoAdministrarHoteles">Filtrar por destino <span id="totalRegistrosAdministrarHoteles" class="ml-2 badge badge-primary"></span></label>
                            <select class="form-control selectpicker" data-live-search="true" id="selectDestinoAdministrarHoteles" required>
                                <option value="0">Todos</option>
                                <optgroup label="NACIONALES">
                                    <?php if(!empty($destinosnacionales)){ foreach($destinosnacionales as $x){ ?>
                                        <option value="<?= $x['nombre_destino']; ?>"><?= $x['nombre_destino']; ?></option>
                                    <?php } } ?>
                                </optgroup>
                                <optgroup label="INTERNACIONALES">
                                    <?php if(!empty($destinosinternacionales) ){ foreach($destinosinternacionales as $x){ ?>
                                        <option value="<?= $x['nombre_destino']; ?>"><?= $x['nombre_destino']; ?></option>
                                    <?php } } ?>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tablaAdministrarHoteles" class="display" style="width:100%">
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

    <?php endif; ?>

</div>
<!-- /.container-fluid -->

<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img id="modalImage" src="" class="img-fluid" alt="Imagen en grande">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>