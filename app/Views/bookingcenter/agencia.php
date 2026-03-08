<main class="main bg-light">
    <div class="site-breadcrumb">
        <div class="container">

        </div>
    </div>

    <div class="reservations-list-area py-5">
        <div class="container">
            <div class="row g-4">
                
                <div class="col-lg-3">
                    <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                        <div class="card-header bg-white py-3">
                            <h6 class="mb-0 fw-bold text-uppercase small text-muted">Secciones de la Agencia</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                                <button class="nav-link active text-start py-3 px-4 border-bottom rounded-0" id="v-pills-agencia-tab" data-bs-toggle="pill" data-bs-target="#v-pills-agencia" type="button" role="tab"><i class="fas fa-building fa-fw me-2"></i> Datos Agencia</button>
                                <button class="nav-link text-start py-3 px-4 border-bottom rounded-0" id="v-pills-usuarios-tab" data-bs-toggle="pill" data-bs-target="#v-pills-usuarios" type="button" role="tab"><i class="fas fa-users fa-fw me-2"></i> Usuarios</button>
                                <button class="nav-link text-start py-3 px-4 border-bottom rounded-0" id="v-pills-cuentas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cuentas" type="button" role="tab"><i class="fas fa-university fa-fw me-2"></i> Cuentas Bancarias</button>
                                <button class="nav-link text-start py-3 px-4 border-bottom rounded-0" id="v-pills-docs-tab" data-bs-toggle="pill" data-bs-target="#v-pills-docs" type="button" role="tab"><i class="fas fa-file-pdf fa-fw me-2"></i> Documentos Legales</button>
                                <button class="nav-link text-start py-3 px-4 rounded-0" id="v-pills-facturacion-tab" data-bs-toggle="pill" data-bs-target="#v-pills-facturacion" type="button" role="tab"><i class="fas fa-receipt fa-fw me-2"></i> Datos Facturación</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="tab-content mt-0" id="v-pills-tabContent">
                        
                        <div class="tab-pane fade show active" id="v-pills-agencia" role="tabpanel">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-primary text-white py-3"><h5 class="mb-0">Perfil de la Agencia</h5></div>
                                <div class="card-body p-4">
                                    <form id="FormModificarAgencia" class="row g-3">
                                        <div class="col-md-4">
                                            <label for="aliasagencia" class="form-label fw-bold">Alias</label>
                                            <input type="text" class="form-control" id="aliasagencia" name="aliasagencia" value="<?= $agencia['alias_agencia']; ?>" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="nombreagencia" class="form-label fw-bold">Nombre Comercial</label> 
                                            <input type="text" class="form-control" id="nombreagencia" name="nombreagencia" value="<?= $agencia['nombre_agencia']; ?>" required> 
                                        </div>

                                        <div class="col-md-4">
                                            <label for="plazaagencia" class="form-label fw-bold">Plaza</label>
                                            <select class="form-select bg-light" id="plazaagencia" name="plazaagencia" disabled>
                                                <option value="0">Seleccionar...</option>
                                                <?php if(!empty($plazas)){ foreach($plazas as $x){ ?>
                                                    <option value="<?= $x['nombre_plaza']; ?>" <?= ($x['nombre_plaza'] == $agencia['plaza_agencia']) ? 'selected' : ''; ?>>
                                                        <?= $x['nombre_plaza']; ?>
                                                    </option>
                                                <?php }} ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="regturismoagencia" class="form-label fw-bold">Reg. Nacional/Estatal de Turismo</label> 
                                            <input type="text" class="form-control" id="regturismoagencia" name="regturismoagencia" value="<?= $agencia['registro_agencia']; ?>"> 
                                        </div>

                                        <div class="col-md-4">
                                            <label for="cp_agencia2" class="form-label fw-bold text-primary">Código Postal</label> 
                                            <input type="text" class="form-control border-primary" id="cp_agencia2" name="cp_agencia2" onkeyup="BuscarCP('agencia2')" value="<?= $agencia['codigopostal_agencia']; ?>"> 
                                        </div>

                                        <div class="col-md-4">
                                            <label for="calleagencia" class="form-label fw-bold">Calle y N°</label> 
                                            <input type="text" class="form-control" id="calleagencia" name="calleagencia" value="<?= $agencia['callenum_agencia']; ?>"> 
                                        </div>

                                        <div class="col-md-4">
                                            <label for="colonia_agencia2" class="form-label fw-bold">Colonia</label>
                                            <select class="form-select" id="colonia_agencia2" name="colonia_agencia2">
                                                <?php if(!empty($colonias)){ foreach($colonias as $x){ ?>
                                                    <option value="<?= $x['nombre_colonia']; ?>" <?= ($x['nombre_colonia'] == $agencia['colonia_agencia']) ? 'selected' : ''; ?>>
                                                        <?= $x['nombre_colonia']; ?>
                                                    </option>
                                                <?php }} ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="municipio_agencia2" class="form-label fw-bold">Municipio</label> 
                                            <input type="text" class="form-control bg-light" id="municipio_agencia2" name="municipio_agencia2" value="<?= $agencia['municipio_agencia']; ?>" readonly> 
                                        </div>

                                        <div class="col-md-4">
                                            <label for="estado_agencia2" class="form-label fw-bold">Estado</label> 
                                            <input type="text" class="form-control bg-light" id="estado_agencia2" name="estado_agencia2" value="<?= $agencia['estado_agencia']; ?>" readonly> 
                                        </div>

                                        <div class="col-md-4">
                                            <label for="paisagencia" class="form-label fw-bold">País</label> 
                                            <input type="text" class="form-control bg-light" id="paisagencia" name="paisagencia" value="<?= $agencia['pais_agencia']; ?>" readonly> 
                                        </div>

                                        <div class="col-md-4">
                                            <label for="telefonoprincipalagencia" class="form-label fw-bold">Teléfono Principal</label> 
                                            <input type="text" class="form-control" id="telefonoprincipalagencia" name="telefonoprincipalagencia" value="<?= $agencia['telefono1_agencia']; ?>"> 
                                        </div>

                                        <div class="col-md-4">
                                            <label for="movil1agencia" class="form-label fw-bold">Móvil 1 (WhatsApp)</label> 
                                            <input type="text" class="form-control" id="movil1agencia" name="movil1agencia" value="<?= $agencia['movil1_agencia']; ?>"> 
                                        </div>

                                        <div class="col-md-4">
                                            <label for="websiteagencia" class="form-label fw-bold">Website</label> 
                                            <input type="text" class="form-control" id="websiteagencia" name="websiteagencia" value="<?= $agencia['website_agencia']; ?>"> 
                                        </div>

                                        <div class="col-md-8">
                                            <label for="logotipo" class="form-label fw-bold">Logotipo</label>
                                            <div class="input-group mb-2">
                                                <input type="file" class="form-control form-control-sm" name="logotipo" id="logotipo" accept="image/jpg, image/jpeg">
                                            </div>
                                            <div class="text-center p-2 border rounded bg-white">
                                                <small class="d-block mb-1 text-muted">Vista previa actual:</small>
                                                <img class="img-fluid rounded" src="<?= base_url($agencia['logotipo_agencia']); ?>" style="max-height: 100px;">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="observaciones" class="form-label fw-bold">Observaciones</label>
                                            <textarea class="form-control" id="observaciones" name="observaciones" rows="5"><?= $agencia['observaciones_agencia']; ?></textarea>
                                        </div>

                                        <div class="col-12 text-center mt-4">
                                            <button id="btnModificarAgencia" class="btn btn-primary btn-lg px-5 shadow-sm" type="submit">
                                                <i class="fas fa-save me-2"></i><strong>GUARDAR CAMBIOS</strong>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-usuarios" role="tabpanel">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                                    <h5 class="mb-0">Gestión de Usuarios</h5>
                                    <button onclick="AgregarNuevoUsuario()" class="btn btn-sm btn-light fw-bold"><i class="fas fa-user-plus me-1"></i> Nuevo</button>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-4">
                                        <div class="col-md-4 col-lg-3 order-last order-md-first">
                                            <div class="card shadow-sm border-0">
                                                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0 fw-bold">USUARIOS</h6>
                                                    <button onclick="AgregarNuevoUsuarioAgencia()" type="button" class="btn btn-sm btn-primary rounded-circle" title="Agregar Usuario">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="list-group list-group-flush">
                                                        <?php if(!empty($usuarios)){ foreach($usuarios as $x){ ?>
                                                            <button type="button" 
                                                                    class="list-group-item list-group-item-action border-0 py-3 px-4" 
                                                                    onclick="EditarUsuarioAgencia(<?= $x['id_usuario']; ?>)">
                                                                <i class="fas fa-user-circle me-2 text-muted"></i> <?= $x['nombre_usuario']; ?>
                                                            </button>
                                                        <?php }} else { ?>
                                                            <div class="p-4 text-center text-muted small">No hay usuarios registrados</div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-8 col-lg-9 order-first order-md-last">
                                            <div class="card shadow-sm border-0 mb-3">
                                                <div class="card-body p-2">
                                                    <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active fw-bold px-5" id="pills-perfil-tab" data-bs-toggle="pill" data-bs-target="#pills-perfil" type="button" role="tab">
                                                                PERFIL
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="card shadow-sm border-0">
                                                <div class="card-body p-4">
                                                    <div class="tab-content" id="pills-tabContent">
                                                        <div class="tab-pane fade show active" id="pills-perfil" role="tabpanel" aria-labelledby="pills-perfil-tab">
                                                            <div class="d-flex align-items-center mb-4">
                                                                <i class="fas fa-user-edit text-primary me-2"></i>
                                                                <h5 class="mb-0 fw-bold text-primary text-uppercase">Información del Perfil</h5>
                                                            </div>
                                                            <hr class="text-muted opacity-25">

                                                            <form id="FormGuardarUsuarioAgencia" class="row g-3">
                                                                <input type="hidden" id="idUsuario" name="idUsuario" value="0">
                                                                
                                                                <div class="col-md-6">
                                                                    <label class="form-label fw-semibold">Alias / Apodo</label>
                                                                    <input type="text" class="form-control" id="aliasUsuario" name="aliasUsuario" required placeholder="Ej: Juan Perez">
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label fw-semibold">Nombre Completo</label>
                                                                    <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" required>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label fw-semibold">Correo Electrónico</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                                                                        <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label fw-semibold">Móvil / WhatsApp</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text bg-light"><i class="fas fa-mobile-alt"></i></span>
                                                                        <input type="text" class="form-control" id="movilUsuario" name="movilUsuario" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label fw-semibold text-primary">Nombre de Usuario (Login)</label>
                                                                    <input type="text" class="form-control border-primary" id="loginUsuario" name="loginUsuario" required>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label fw-semibold">Fecha de Cumpleaños</label>
                                                                    <input type="date" class="form-control" id="cumpleUsuario" name="cumpleUsuario">
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label fw-semibold">Nueva Contraseña</label>
                                                                    <input type="password" class="form-control" id="passwordUsuario" name="passwordUsuario" placeholder="Dejar vacío para no cambiar">
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label fw-semibold">Confirmar Contraseña</label>
                                                                    <input type="password" class="form-control" id="confirmacionPasswordUsuario" name="confirmacionPasswordUsuario">
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="bg-light p-3 rounded-3 d-flex align-items-center justify-content-between mt-2">
                                                                        <div>
                                                                            <h6 class="mb-0 fw-bold">Estatus del Usuario</h6>
                                                                            <small class="text-muted">Si se desactiva, el usuario no podrá entrar al sistema.</small>
                                                                        </div>
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input h4 mb-0" type="checkbox" role="switch" id="statusUsuario" checked>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 text-center mt-5">
                                                                    <button id="btnGuardarUsuarioAgencia" class="btn btn-primary px-5 py-2 fw-bold shadow-sm" type="submit">
                                                                        <i class="fas fa-save me-2"></i>GUARDAR USUARIO
                                                                    </button>
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

                        <div class="tab-pane fade" id="v-pills-cuentas" role="tabpanel">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                                    <h5 class="mb-0">Cuentas Bancarias</h5>
                                    <button onclick="AgregarNuevaCuenta()" class="btn btn-sm btn-light fw-bold"><i class="fas fa-plus me-1"></i> Añadir Cuenta</button>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-4">
                                        <div class="col-md-4 col-lg-3">
                                            <div class="card shadow-sm border-0">
                                                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0 fw-bold text-uppercase small text-muted">Cuentas Bancarias</h6>
                                                    <button onclick="AgregarNuevaCuenta()" type="button" class="btn btn-sm btn-primary rounded-circle" title="Agregar Cuenta">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="list-group list-group-flush">
                                                        <?php if(!empty($cuentas)){ foreach($cuentas as $x){ ?>
                                                            <button type="button" 
                                                                    class="list-group-item list-group-item-action border-0 py-3 px-4" 
                                                                    onclick="EditarCuenta(<?= $x['id_cuenta']; ?>)">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fas fa-university me-3 text-primary"></i>
                                                                    <div>
                                                                        <span class="d-block fw-bold small"><?= $x['alias_cuenta']; ?></span>
                                                                        <span class="text-muted tiny">Click para editar</span>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        <?php }} else { ?>
                                                            <div class="p-4 text-center text-muted small">No hay cuentas registradas</div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-8 col-lg-9">
                                            <div class="card shadow-sm border-0 h-100">
                                                <div class="card-header bg-primary text-white py-3">
                                                    <h6 class="mb-0 fw-bold"><i class="fas fa-info-circle me-2"></i> DETALLE DE LA CUENTA</h6>
                                                </div>
                                                <div class="card-body p-4">
                                                    <form id="FormGuardarCuenta" class="row g-3">
                                                        <input type="hidden" id="idCuenta" name="idCuenta" value="0">

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold small">Alias de la Cuenta</label>
                                                            <input type="text" class="form-control" id="aliasCuenta" name="aliasCuenta" placeholder="Ej: Cuenta Principal / Operativa" required>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold small">Titular de la Cuenta</label>
                                                            <input type="text" class="form-control" id="nombreCuenta" name="nombreCuenta" placeholder="Nombre completo del titular" required>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="form-label fw-bold small">Banco / Institución</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text bg-light"><i class="fas fa-building text-muted"></i></span>
                                                                <input type="text" class="form-control" id="institucionCuenta" name="institucionCuenta" placeholder="Ej: BBVA, Banamex..." required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="form-label fw-bold small">Tipo de Cuenta</label>
                                                            <select class="form-select" id="tipoCuenta" name="tipoCuenta" required>
                                                                <option value="">Seleccione...</option>
                                                                <option value="Cheques">Cheques</option>
                                                                <option value="Ahorro">Ahorro</option>
                                                                <option value="Débito">Débito</option>
                                                                <option value="Empresarial">Empresarial</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="form-label fw-bold small">Número de Cuenta</label>
                                                            <input type="text" class="form-control" id="numCuenta" name="numCuenta" required>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold small text-primary">Clabe Interbancaria (18 dígitos)</label>
                                                            <input type="text" class="form-control border-primary" id="clabeCuenta" name="clabeCuenta" maxlength="18" required>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold small">Estatus</label>
                                                            <div class="bg-light p-2 rounded border d-flex align-items-center justify-content-between">
                                                                <span class="small text-muted ps-2">¿Cuenta Activa para pagos?</span>
                                                                <div class="form-check form-switch mb-0">
                                                                    <input class="form-check-input h5 mb-0" type="checkbox" role="switch" id="statusCuenta" name="statusCuenta" checked>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label class="form-label fw-bold small">Observaciones Adicionales</label>
                                                            <textarea class="form-control" id="observacionesCuenta" name="observacionesCuenta" rows="2" placeholder="Notas sobre esta cuenta..."></textarea>
                                                        </div>

                                                        <div class="col-12 text-center mt-4">
                                                            <hr class="opacity-25">
                                                            <button id="btnGuardarCuenta" class="btn btn-primary px-5 py-2 fw-bold shadow-sm" type="submit">
                                                                <i class="fas fa-save me-2"></i> GUARDAR CUENTA
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-docs" role="tabpanel">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-primary text-white py-3"><h5 class="mb-0">Documentos Legales</h5></div>
                                <div class="card-body p-4">
                                    <div class="row g-4">
                                        <div class="col-md-4 col-lg-3">
                                            <div class="card shadow-sm border-0">
                                                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0 fw-bold text-uppercase small text-muted">Documentación</h6>
                                                    <button onclick="AgregarNuevoDocumento()" type="button" class="btn btn-sm btn-primary rounded-circle" title="Agregar Documento">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="list-group list-group-flush">
                                                        <?php if(!empty($documentos)){ foreach($documentos as $x){ ?>
                                                            <button type="button" 
                                                                    class="list-group-item list-group-item-action border-0 py-3 px-4" 
                                                                    onclick="EditarDocumento(<?= $x['id_documento']; ?>)">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fas fa-file-pdf me-3 text-danger"></i>
                                                                    <div>
                                                                        <span class="d-block fw-bold small"><?= $x['alias_documento']; ?></span>
                                                                        <span class="text-muted tiny">Click para ver detalle</span>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        <?php }} else { ?>
                                                            <div class="p-4 text-center text-muted small">No hay documentos cargados</div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-8 col-lg-9">
                                            <div class="card shadow-sm border-0 h-100">
                                                <div class="card-header bg-dark text-white py-3">
                                                    <h6 class="mb-0 fw-bold"><i class="fas fa-edit me-2"></i> DETALLE DEL DOCUMENTO</h6>
                                                </div>
                                                <div class="card-body p-4">
                                                    <form id="FormGuardarDocumento" class="row g-3">
                                                        <input type="hidden" id="idDocumento" name="idDocumento" value="0">

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold small">Alias / Identificador Corto</label>
                                                            <input type="text" class="form-control" id="aliasDocumento" name="aliasDocumento" placeholder="Ej: Acta Constitutiva" required>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold small">Nombre Oficial del Documento</label>
                                                            <input type="text" class="form-control" id="nombreDocumento" name="nombreDocumento" placeholder="Nombre completo según el archivo" required>
                                                        </div>

                                                        <div class="col-12">
                                                            <label class="form-label fw-bold small">Observaciones o Notas</label>
                                                            <textarea class="form-control" id="observacionesDocumento" name="observacionesDocumento" rows="2" placeholder="Información adicional sobre este documento..."></textarea>
                                                        </div>

                                                        <div class="col-md-7">
                                                            <label class="form-label fw-bold small">Subir / Reemplazar Archivo</label>
                                                            <input type="file" class="form-control" id="archivoDocumento" name="archivoDocumento">
                                                            <div class="form-text">Formatos permitidos: PDF, JPG, PNG (Máx 5MB).</div>
                                                        </div>

                                                        <div id="divDescargarArchivo" class="col-md-5 d-flex align-items-end" hidden>
                                                            <div class="w-100 p-2 border rounded bg-light text-center">
                                                                <a id="descargarArchivo" class="btn btn-outline-primary w-100 fw-bold" download>
                                                                    <i class="fas fa-download me-2"></i>DESCARGAR ACTUAL
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 text-center mt-5">
                                                            <hr class="opacity-25">
                                                            <button id="btnGuardarDocumento" class="btn btn-primary px-5 py-2 fw-bold shadow-sm" type="submit">
                                                                <i class="fas fa-save me-2"></i> GUARDAR DOCUMENTO
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-facturacion" role="tabpanel">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-primary text-white py-3"><h5 class="mb-0">Datos Facturación</h5></div>
                                <div class="card-body p-4">
                                    <div class="row g-4">
                                        <div class="col-md-4 col-lg-3">
                                            <div class="card shadow-sm border-0">
                                                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0 fw-bold text-uppercase small text-muted">Registros Fiscales</h6>
                                                    <button onclick="AgregarNuevoDatoFiscal()" type="button" class="btn btn-sm btn-primary rounded-circle" title="Agregar Dato Fiscal">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="list-group list-group-flush">
                                                        <?php if(!empty($fiscales)){ foreach($fiscales as $x){ ?>
                                                            <button type="button" 
                                                                    class="list-group-item list-group-item-action border-0 py-3 px-4" 
                                                                    onclick="EditarDatoFiscal(<?= $x['id_dato_fiscal']; ?>)">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fas fa-id-card me-3 text-primary"></i>
                                                                    <div>
                                                                        <span class="d-block fw-bold small"><?= $x['rfc_fiscal']; ?></span>
                                                                        <span class="text-muted tiny text-uppercase">Ver detalles fiscales</span>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        <?php }} else { ?>
                                                            <div class="p-4 text-center text-muted small">Sin datos de facturación</div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-8 col-lg-9">
                                            <div class="card shadow-sm border-0">
                                                <div class="card-header bg-primary text-white py-3">
                                                    <h6 class="mb-0 fw-bold"><i class="fas fa-file-invoice me-2"></i> DETALLES DE FACTURACIÓN</h6>
                                                </div>
                                                <div class="card-body p-4">
                                                    <form id="FormGuardarDatoFiscal" class="row g-3">
                                                        <input type="hidden" id="idDatoFiscal" name="idDatoFiscal" value="0">

                                                        <div class="col-12 mb-2">
                                                            <span class="badge bg-light text-dark border fw-bold text-uppercase p-2">1. Identificación</span>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold small">Razón Social</label>
                                                            <input type="text" class="form-control border-primary shadow-sm" id="razonSocialFiscal" name="razonSocialFiscal" required placeholder="Nombre legal de la empresa">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold small">RFC</label>
                                                            <input type="text" class="form-control text-uppercase" id="rfcFiscal" name="rfcFiscal" required placeholder="ABCD000000XXX">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label class="form-label fw-bold small">Encargado de Facturación / Atención</label>
                                                            <input type="text" class="form-control text-primary fw-bold" id="encargadoFiscal" name="encargadoFiscal" required>
                                                        </div>

                                                        <div class="col-12 mb-2 mt-4">
                                                            <span class="badge bg-light text-dark border fw-bold text-uppercase p-2">2. Domicilio Fiscal</span>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label class="form-label fw-bold small">Código Postal</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control border-primary" id="cp_Fiscal" name="cp_Fiscal" onkeyup="BuscarCP('Fiscal')" required>
                                                                <span class="input-group-text bg-primary text-white"><i class="fas fa-search-location"></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold small">Calle y Número</label>
                                                            <input type="text" class="form-control" id="calleNumFiscal" name="calleNumFiscal" required>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label class="form-label fw-bold small">Colonia</label>
                                                            <select class="form-select" id="colonia_Fiscal" name="colonia_Fiscal">
                                                                <option value="0">Selecciona...</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="form-label fw-bold small">Municipio / Alcaldía</label>
                                                            <input type="text" class="form-control bg-light" id="municipio_Fiscal" name="municipio_Fiscal" required readonly>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="form-label fw-bold small">Estado</label>
                                                            <input type="text" class="form-control bg-light" id="estado_Fiscal" name="estado_Fiscal" required readonly>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="form-label fw-bold small">País</label>
                                                            <input type="text" class="form-control bg-light" id="paisFiscal" name="paisFiscal" value="México" readonly required>
                                                        </div>

                                                        <div class="col-12 mb-2 mt-4">
                                                            <span class="badge bg-light text-dark border fw-bold text-uppercase p-2">3. Contacto y Configuración SAT</span>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold small text-primary">Email de Facturación</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                                <input type="email" class="form-control" id="emailFiscal" name="emailFiscal" required placeholder="facturas@empresa.com">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label class="form-label fw-bold small">Teléfono 1</label>
                                                            <input type="text" class="form-control" id="telefonofiscal" name="telefonofiscal" required>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label class="form-label fw-bold small">Teléfono 2 / Móvil</label>
                                                            <input type="text" class="form-control" id="movil1fiscal" name="movil1fiscal">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold small">Uso del CFDI</label>
                                                            <select class="form-select border-primary" id="usoCFDIFiscal" name="usoCFDIFiscal">
                                                                <option value="0">Selecciona...</option>
                                                                <?php foreach($cfdi as $x){ ?>
                                                                    <option value="<?= $x['clave_cfdi']; ?>"><?= $x['clave_cfdi']." - ".$x['nombre_cfdi']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-bold small">Régimen Fiscal</label>
                                                            <select class="form-select border-primary" id="regimenFiscalFiscal" name="regimenFiscalFiscal">
                                                                <option value="0">Selecciona...</option>
                                                                <?php foreach($regimen as $x){ ?>
                                                                    <option value="<?= $x['clave_regimen_fiscal']; ?>"><?= $x['clave_regimen_fiscal']." - ".$x['nombre_regimen_fiscal']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="form-label fw-bold small">Forma de Pago</label>
                                                            <select class="form-select" id="formaPagoFiscal" name="formaPagoFiscal">
                                                                <option value="0">Selecciona...</option>
                                                                <?php foreach($formaspago as $x){ ?>
                                                                    <option value="<?= $x['clave_forma_pago']; ?>"><?= $x['nombre_forma_pago']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="form-label fw-bold small">Método de Pago</label>
                                                            <select class="form-select" id="metodoPagoFiscal" name="metodoPagoFiscal">
                                                                <option value="0">Selecciona...</option>
                                                                <?php foreach($metodospago as $x){ ?>
                                                                    <option value="<?= $x['clave_metodo_pago']; ?>"><?= $x['nombre_metodo_pago']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="form-label fw-bold small text-center d-block">¿Estatus Activo?</label>
                                                            <div class="d-flex justify-content-center mt-1">
                                                                <div class="form-check form-switch h4">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="statusFiscal" name="statusFiscal" checked>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 text-center mt-5">
                                                            <button id="btnGuardarDatoFiscal" class="btn btn-primary btn-lg px-5 shadow" type="submit">
                                                                <i class="fas fa-save me-2"></i>GUARDAR DATOS FISCALES
                                                            </button>
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
        </div>
    </div>
</main>