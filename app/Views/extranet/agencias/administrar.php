<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between text-center mb-4">
        <div class="col-md-12">
        <h1 class="h4 mb-0 text-gray-800">ADMINISTRANDO <strong><?= strtoupper($agencia[0]['alias_agencia']); ?></strong></h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="nav nav d-flex flex-row flex-xxl-column justify-content-center nav-pills nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                      <button class="nav-link active text-left" id="v-pills-agencia-tab" data-toggle="pill" data-target="#v-pills-agencia" type="button" role="tab" aria-controls="v-pills-agencia" aria-selected="true"><i class="fas fa-clipboard-list" title="DATOS AGENCIA"></i></button>
                      <button class="nav-link text-left" id="v-pills-usuarios-tab" data-toggle="pill" data-target="#v-pills-usuarios" type="button" role="tab" aria-controls="v-pills-usuarios" aria-selected="false"><i class="fas fa-user" title="USUARIOS"></i></button>
                      <button class="nav-link text-left" id="v-pills-cuentas-tab" data-toggle="pill" data-target="#v-pills-cuentas" type="button" role="tab" aria-controls="v-pills-cuentas" aria-selected="false"><i class="fas fa-university" title="CUENTAS BANCARIAS"></i></button>
                      <button class="nav-link text-left" id="v-pills-docs-tab" data-toggle="pill" data-target="#v-pills-docs" type="button" role="tab" aria-controls="v-pills-docs" aria-selected="false" title="DOCUMENTOS"><i class="far fa-copy"></i></button>
                      <button class="nav-link text-left" id="v-pills-facturacion-tab" data-toggle="pill" data-target="#v-pills-facturacion" type="button" role="tab" aria-controls="v-pills-facturacion" aria-selected="false" title="DATOS FACTURACIÓN"><i class="fas fa-briefcase"></i></button>
                      <button class="nav-link text-left" id="v-pills-config-tab" data-toggle="pill" data-target="#v-pills-config" type="button" role="tab" aria-controls="v-pills-config" aria-selected="false" title="CONFIGURACIÓN"><i class="fas fa-cog"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-agencia" role="tabpanel" aria-labelledby="v-pills-agencia-tab">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <strong>DATOS AGENCIA</strong>
                            <hr>
                            <form id="FormModificarAgencia" class="row g-3">
                                <div class="col-md-4">
                                    <label for="nombre" class="form-label">Alias</label>
                                    <input type="text" class="form-control" id="aliasagencia" name="aliasagencia" value="<?= $agencia[0]['alias_agencia']; ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nombre Comercial</label> 
                                        <input class="form-control" type="text" id="nombreagencia" name="nombreagencia" value="<?= $agencia[0]['nombre_agencia']; ?>" required> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Plaza</label>
                                        <select class="form-control" id="plazaagencia" name="plazaagencia" disabled>
                                            <option value="0">Seleccionar...</option>
                                            <?php if(!empty($plazas)){ foreach($plazas as $x){ ?>
                                            <option value="<?= $x['nombre_plaza']; ?>" <?php if($x['nombre_plaza'] == $agencia[0]['plaza_agencia']){ echo "selected"; } ?>><?= $x['nombre_plaza']; ?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Reg. Nacional/Estatal de Turismo</label> 
                                        <input class="form-control" type="text" id="regturismoagencia" name="regturismoagencia" value="<?= $agencia[0]['registro_agencia']; ?>"> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Código Postal</label> 
                                        <input class="form-control" type="text" id="cp_agencia2" name="cp_agencia2" onkeyup="BuscarCP('agencia2')" value="<?= $agencia[0]['codigopostal_agencia']; ?>"> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Calle y N°</label> 
                                        <input class="form-control" type="text" id="calleagencia" name="calleagencia" value="<?= $agencia[0]['callenum_agencia']; ?>"> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Colonia</label>
                                        <select class="form-control" id="colonia_agencia2" name="colonia_agencia2">
                                            <?php if(!empty($colonias)){ foreach($colonias as $x){ ?>
                                            <option value="<?= $x['nombre_colonia']; ?>" <?php if($x['nombre_colonia'] == $agencia[0]['colonia_agencia']){ echo "selected"; } ?>><?= $x['nombre_colonia']; ?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Municipio</label> 
                                        <input class="form-control" type="text" id="municipio_agencia2" name="municipio_agencia2" value="<?= $agencia[0]['municipio_agencia']; ?>" readonly> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Estado</label> 
                                        <input class="form-control" type="text" id="estado_agencia2" name="estado_agencia2" value="<?= $agencia[0]['estado_agencia']; ?>" readonly> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>País</label> 
                                        <input class="form-control" type="text" id="paisagencia" name="paisagencia" value="<?= $agencia[0]['pais_agencia']; ?>" readonly> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Teléfono Principal</label> 
                                        <input class="form-control" type="text" id="telefonoprincipalagencia" name="telefonoprincipalagencia" value="<?= $agencia[0]['telefono1_agencia']; ?>"> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Teléfono Adicional</label> 
                                        <input class="form-control" type="text" id="telefonoadicionalagencia" name="telefonoadicionalagencia" value="<?= $agencia[0]['telefono2_agencia']; ?>"> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Móvil 1</label> 
                                        <input class="form-control" type="text" id="movil1agencia" name="movil1agencia" value="<?= $agencia[0]['movil1_agencia']; ?>"> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Móvil 2</label> 
                                        <input class="form-control" type="text" id="movil2agencia" name="movil2agencia" value="<?= $agencia[0]['movil2_agencia']; ?>"> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Website</label> 
                                        <input class="form-control" type="text" id="websiteagencia" name="websiteagencia" value="<?= $agencia[0]['website_agencia']; ?>"> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Logotipo</label><small>.jpg máx de 2MB</small>
                                        <input type="file" class="form-control" name="logotipo" id="logotipo" accept="image/jpg, image/jpeg">
                                        <br>
                                        <img class="img-fluid" src="<?= base_url($agencia[0]['logotipo_agencia']); ?>">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Observaciones</label>
                                        <textarea class="form-control" id="observaciones" name="observaciones"><?= $agencia[0]['observaciones_agencia']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-12 mb-2 text-center">
                                    <button id="btnModificarAgencia" class="btn btn-primary" type="submit"><strong>MODIFICAR</strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-usuarios" role="tabpanel" aria-labelledby="v-pills-usuarios-tab">
                    <div class="row">
                        <div class="col-md-auto order-last order-sm-first">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <strong>USUARIOS</strong> <button onclick="AgregarNuevoUsuarioAgencia()" type="button" class="ml-4 btn btn-sm btn-primary" title="Agregar Usuario"><i class="fas fa-plus"></i></button>
                                    <hr>
                                    <?php if(!empty($usuarios)){ foreach($usuarios as $x){ ?>
                                        <label style="cursor:pointer;" onclick="EditarUsuarioAgencia(<?= $x['id_usuario']; ?>)">•<?= $x['nombre_usuario']; ?></label><br>
                                    <?php }} ?>
                                </div>
                            </div>
                        </div>
                        <div class="col order-first order-sm-last">
                            <div class="card shadow mb-2">
                                <div class="card-body">
                                    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-perfil-tab" data-toggle="pill" data-target="#pills-perfil" type="button" role="tab" aria-controls="pills-perfil" aria-selected="true">PERFIL</button>
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
                                        <div class="tab-pane fade show active" id="pills-perfil" role="tabpanel" aria-labelledby="pills-perfil-tab">
                                            <strong class="text-primary">PERFIL</strong>
                                            <hr>
                                            <form id="FormGuardarUsuarioAgencia" class="row g-3">
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
                                                    <label class="form-label">Cumpleaños</label>
                                                    <input type="date" class="form-control" id="cumpleUsuario" name="cumpleUsuario">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Status</label>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="statusUsuario">
                                                        <label class="custom-control-label" for="statusUsuario"></label>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-4 mb-2 text-center">
                                                    <button id="btnGuardarUsuarioAgencia" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
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
                <div class="tab-pane fade" id="v-pills-cuentas" role="tabpanel" aria-labelledby="v-pills-cuentas-tab">
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <strong>CUENTAS BANCARIAS</strong> <button onclick="AgregarNuevaCuenta()" type="button" class="ml-4 btn btn-sm btn-primary" title="Agregar Cuenta"><i class="fas fa-plus"></i></button>
                                    <hr>
                                    <span class="text-primary">CUENTAS</span><br>
                                    <?php if(!empty($cuentas)){ foreach($cuentas as $x){ ?>
                                        <label style="cursor:pointer;" onclick="EditarCuenta(<?= $x['id_cuenta']; ?>)">•<?= $x['alias_cuenta']; ?></label><br>
                                    <?php }} ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <strong>DETALLE DE LA CUENTA</strong>
                                    <hr>
                                    <form id="FormGuardarCuenta" class="row g-3">
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
                                            <button id="btnGuardarCuenta" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-docs" role="tabpanel" aria-labelledby="v-pills-docs-tab">
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <strong>DOCUMENTOS</strong> <button onclick="AgregarNuevoDocumento()" type="button" class="btn btn-sm btn-primary" title="Agregar Documento"><i class="fas fa-plus"></i></button>
                                    <hr>
                                    <span class="text-primary">DOCUMENTOS</span><br>
                                    <?php if(!empty($documentos)){ foreach($documentos as $x){ ?>
                                        <label style="cursor:pointer;" onclick="EditarDocumento(<?= $x['id_documento']; ?>)">•<?= $x['alias_documento']; ?></label><br>
                                    <?php }} ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <strong>DETALLE DEL DOCUMENTO</strong>
                                    <hr>
                                    <form id="FormGuardarDocumento" class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Alias</label>
                                            <input type="text" class="form-control" id="aliasDocumento" name="aliasDocumento" required>
                                            <input type="hidden" class="form-control" id="idDocumento" name="idDocumento" value="0">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Nombre Oficial</label>
                                            <input type="text" class="form-control" id="nombreDocumento" name="nombreDocumento" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Observaciones</label>
                                            <input type="text" class="form-control" id="observacionesDocumento" name="observacionesDocumento">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Archivo</label>
                                            <input type="file" class="form-control" id="archivoDocumento" name="archivoDocumento">
                                        </div>
                                        <div id="divDescargarArchivo" class="col-md-6 mt-4" hidden>
                                            <a id="descargarArchivo" download>Descargar Archivo</a>
                                        </div>
                                        <div class="col-12 mt-4 mb-2 text-center">
                                            <button id="btnGuardarDocumento" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-facturacion" role="tabpanel" aria-labelledby="v-pills-facturacion-tab">
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <strong>DATOS FACTURACIÓN</strong> <button type="button" class="ml-4 btn btn-sm btn-primary" title="Agregar Documento"><i class="fas fa-plus"></i></button>
                                    <hr>
                                    <span class="text-primary">DATOS FACTURACIÓN</span><br>
                                    <?php if(!empty($fiscales)){ foreach($fiscales as $x){ ?>
                                        <label style="cursor:pointer;" onclick="EditarDatoFiscal(<?= $x['id_dato_fiscal']; ?>)">•<?= $x['rfc_fiscal']; ?></label><br>
                                    <?php }} ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <strong>DATOS FACTURACIÓN</strong>
                                    <hr>
                                    <form id="FormGuardarDatoFiscal" class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Encargado Facturación</label>
                                            <input type="text" class="form-control" id="encargadoFiscal" name="encargadoFiscal" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Razón Social</label>
                                            <input type="text" class="form-control" id="razonSocialFiscal" name="razonSocialFiscal" required>
                                            <input type="hidden" class="form-control" id="idDatoFiscal" name="idDatoFiscal" value="0">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">RFC</label>
                                            <input type="text" class="form-control" id="rfcFiscal" name="rfcFiscal" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Código Postal</label>
                                            <input type="text" class="form-control" id="cp_Fiscal" name="cp_Fiscal" onkeyup="BuscarCP('Fiscal')" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Calle y N°</label>
                                            <input type="text" class="form-control" id="calleNumFiscal" name="calleNumFiscal" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Colonia</label>
                                            <select class="form-control" id="colonia_Fiscal" name="colonia_Fiscal">
                                                <option value="0">Selecciona...</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Municipio</label>
                                            <input type="text" class="form-control" id="municipio_Fiscal" name="municipio_Fiscal" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Estado</label>
                                            <input type="text" class="form-control" id="estado_Fiscal" name="estado_Fiscal" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Pais</label>
                                            <input type="text" class="form-control" id="paisFiscal" name="paisFiscal" value="México" readonly required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" id="emailFiscal" name="emailFiscal" required>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telefonofiscal">Teléfono Principal</label> 
                                                <input class="form-control" type="text" id="telefonofiscal" name="telefonofiscal" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telefonoadicionalfiscal">Teléfono Adicional</label> 
                                                <input class="form-control" type="text" id="telefonoadicionalfiscal" name="telefonoadicionalfiscal" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="movil1fiscal">Móvil 1</label> 
                                                <input class="form-control" type="text" id="movil1fiscal" name="movil1fiscal" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="movil2fiscal">Móvil 2</label> 
                                                <input class="form-control" type="text" id="movil2fiscal" name="movil2fiscal" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="formaPagoFiscal">Forma de Pago</label>
                                            <select class="form-control" id="formaPagoFiscal" name="formaPagoFiscal">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($formaspago as $x){ ?>
                                                <option value="<?= $x['clave_forma_pago']; ?>"><?= $x['nombre_forma_pago']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="metodoPagoFiscal">Método de Pago</label>
                                            <select class="form-control" id="metodoPagoFiscal" name="metodoPagoFiscal">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($metodospago as $x){ ?>
                                                <option value="<?= $x['clave_metodo_pago']; ?>"><?= $x['nombre_metodo_pago']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="regimenFiscalFiscal">Régimen Fiscal</label>
                                            <select class="form-control" id="regimenFiscalFiscal" name="regimenFiscalFiscal">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($regimen as $x){ ?>
                                                <option value="<?= $x['clave_regimen_fiscal']; ?>"><?= $x['clave_regimen_fiscal']." - ".$x['nombre_regimen_fiscal']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="usoCFDIFiscal">Uso del CFDI</label>
                                            <select class="form-control" id="usoCFDIFiscal" name="usoCFDIFiscal">
                                                <option value="0">Selecciona...</option>
                                                <?php foreach($cfdi as $x){ ?>
                                                <option value="<?= $x['clave_cfdi']; ?>"><?= $x['clave_cfdi']." - ".$x['nombre_cfdi']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Status</label>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="statusFiscal" name="statusFiscal">
                                                <label class="custom-control-label" for="statusFiscal"></label>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-4 mb-2 text-center">
                                            <button id="btnGuardarDatoFiscal" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-config" role="tabpanel" aria-labelledby="v-pills-config-tab">
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <strong>CONFIGURACIÓN</strong>
                                    <hr>
                                    <form id="FormGuardarConfiguracion" class="row g-3">
                                        <div class="row ml-4 mr-4">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="form-label"><strong>Tipos de Pagos</strong></label>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="pagoCredito" name="pagoCredito" <?php if(!empty($configuracion)){ if($configuracion[0]['credito_configuracion'] == 1){?>checked<?php } } ?>>
                                                            <label class="custom-control-label" for="pagoCredito">Crédito</label>
                                                        </div>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="pagoCronosPay" name="pagoCronosPay" <?php if(!empty($configuracion)){ if($configuracion[0]['cronospay_configuracion'] == 1){?>checked<?php } } ?>>
                                                            <label class="custom-control-label" for="pagoCronosPay">CronosPay</label>
                                                        </div>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="pagoPrepago" name="pagoPrepago" <?php if(!empty($configuracion)){ if($configuracion[0]['prepago_configuracion'] == 1){?>checked<?php } } ?>>
                                                            <label class="custom-control-label" for="pagoPrepago">Prepago</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label"><strong>No Reembolsables</strong></label>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="noReembolsables" name="noReembolsables" <?php if(!empty($configuracion)){ if($configuracion[0]['noreembolsable_configuracion'] == 1){?>checked<?php } } ?>>
                                                            <label class="custom-control-label" for="noReembolsables">Permitir</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label"><strong>Accesos</strong></label>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="accesoWeb" name="accesoWeb" <?php if(!empty($configuracion)){ if($configuracion[0]['web_configuracion'] == 1){?>checked<?php } } ?>>
                                                            <label class="custom-control-label" for="accesoWeb">Web</label>
                                                        </div>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="naturframe" name="naturframe" <?php if(!empty($configuracion)){ if($configuracion[0]['naturframe_configuracion'] == 1){?>checked<?php } } ?>>
                                                            <label class="custom-control-label" for="naturframe">NaturFrame</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="form-label"><strong>Canales</strong></label>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="canalWeb" name="canalWeb" <?php if(!empty($configuracion)){ if($configuracion[0]['canal_web_configuracion'] == 1){?>checked<?php } } ?>>
                                                            <label class="custom-control-label" for="canalWeb">Web</label>
                                                        </div>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="canalMbp" name="canalMbp" <?php if(!empty($configuracion)){ if($configuracion[0]['mbp_configuracion'] == 1){?>checked<?php } } ?>>
                                                            <label class="custom-control-label" for="canalMbp">Mi Boda en la Playa</label>
                                                        </div>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="canalGrupos" name="canalGrupos" <?php if(!empty($configuracion)){ if($configuracion[0]['grupos_configuracion'] == 1){?>checked<?php } } ?>>
                                                            <label class="custom-control-label" for="canalGrupos">Grupos</label>
                                                        </div>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="canalExpoViaja" name="canalExpoViaja" <?php if(!empty($configuracion)){ if($configuracion[0]['expoviaja_configuracion'] == 1){?>checked<?php } } ?>>
                                                            <label class="custom-control-label" for="canalExpoViaja">Expoviaja</label>
                                                        </div>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="canalBloqueoNaturleon" name="canalBloqueoNaturleon" <?php if(!empty($configuracion)){ if($configuracion[0]['bloqueos_naturleon_configuracion'] == 1){?>checked<?php } } ?>>
                                                            <label class="custom-control-label" for="canalBloqueoNaturleon">Bloqueo Naturleón</label>
                                                        </div>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="canalBloqueoAgencias" name="canalBloqueoAgencias" <?php if(!empty($configuracion)){ if($configuracion[0]['bloqueos_agencias_configuracion'] == 1){?>checked<?php } } ?>>
                                                            <label class="custom-control-label" for="canalBloqueoAgencias">Bloqueo Agencias</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="form-label">Comisión Efectivo</label>
                                                        <input type="text" class="form-control" id="comisionEfectivo" name="comisionEfectivo" <?php if(!empty($configuracion)){?> value="<?= $configuracion[0]['comision_efectivo_configuracion']; ?>" <?php } ?> required>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Comisión Tarjeta</label>
                                                        <input type="text" class="form-control" id="comisionTarjeta" name="comisionTarjeta" <?php if(!empty($configuracion)){?>  value="<?= $configuracion[0]['comision_tarjeta_configuracion']; ?>" <?php } ?> required>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Observaciones Internas</label>
                                                        <input type="text" class="form-control" id="observacionesInternas" name="observacionesInternas" <?php if(!empty($configuracion)){?>  value="<?= $configuracion[0]['observaciones_configuracion']; ?>" <?php } ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-4 mb-2 text-center">
                                            <button id="btnGuardarConfiguracion" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
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

    <!-- Content Row -->
    <div class="row">
        <!-- Basic Card Example -->
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">LISTADO DE AGENCIAS</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="selectPlazasAdministrarAgencias">Filtrar por plaza <span id="totalRegistrosAdministrarAgencias" class="ml-2 badge badge-primary"></span></label>
                            <select class="form-control" id="selectPlazasAdministrarAgencias">
                                <option value="0">Todas</option>
                                <?php if(!empty($plazas)){ foreach($plazas as $x){ ?>
                                <option value="<?= $x['nombre_plaza']; ?>"><?= $x['nombre_plaza']; ?></option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tablaAdministrarAgencias" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Estado</th>
                                    <th>Agencia / Alias</th>
                                    <th>Plaza / Ubicación</th>
                                    <th>Contacto</th>
                                    <th>Solicitud / Aprobación</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($agencias)){ foreach($agencias as $x){ 
                                    if($x['status_agencia'] == "1" || $x['status_agencia'] == "0"){ 
                                        $is_active = ($x['status_agencia'] == "1");
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <span class="badge <?= $is_active ? 'badge-success' : 'badge-danger'; ?>">
                                            <?= $is_active ? 'Activa' : 'Inactiva'; ?>
                                        </span>
                                    </td>

                                    <td>
                                        <span class="font-weight-bold text-dark mb-0 d-block" style="font-size: 1.1rem;">
                                            <?= $x['nombre_agencia']; ?>
                                        </span>
                                        <span class="badge <?= $is_active ? 'badge-light-success text-success' : 'badge-light-danger text-danger'; ?> font-weight-bold">
                                            <?= $x['alias_agencia']; ?>
                                        </span>
                                    </td>

                                    <td>
                                        <strong><?= $x['plaza_agencia']; ?></strong><br>
                                        <small class="text-muted">
                                            <?= $x['municipio_agencia']; ?>, <?= $x['estado_agencia']; ?>
                                        </small>
                                    </td>

                                    <td>
                                        <?= $x['telefono1_agencia']; ?>
                                    </td>

                                    <td class="text-center">
                                        <div class="d-flex flex-column">
                                            <small><b>S:</b> <?= date("d/m/Y", strtotime($x['fechahora_alta_agencia'])); ?></small>
                                            <small class="text-muted">
                                                <b>A:</b> <?= ($x['fechahora_aprobacion_agencia'] != "0000-00-00 00:00:00") ? date("d/m/Y", strtotime($x['fechahora_aprobacion_agencia'])) : '-'; ?>
                                            </small>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary btn-sm" title="Administrar Agencia" onclick="AdministrarAgencia(<?= $x['id_agencia']; ?>)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                            <?php if($is_active){ ?>
                                                <button type="button" class="btn btn-danger btn-sm" title="Desactivar" onclick="CambiarStatusAgencia(<?= $x['id_agencia']; ?>, 0)">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-success btn-sm" title="Activar" onclick="CambiarStatusAgencia(<?= $x['id_agencia']; ?>, 1)">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php }}} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->