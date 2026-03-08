<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
        $solicitudes = false; $resultagencias = false;
        if(!empty($agencias)){
            $resultagencias = true;
            foreach ($agencias as $x) {
                if ($x['status_agencia'] == 2 || $x['status_agencia'] == 3 || $x['status_agencia'] == 4) {
                    $solicitudes = true;
                    break;
                }
            }
        }else{
            $resultagencias = false;
        }
    ?>

    <?php if($resultagencias === true && $solicitudes === true){ ?>
    <div class="row">
        <div class="col-12">
            <p class="text-right">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <strong>SOLICITUDES DE AGENCIAS</strong> <i class="fa fa-bell blinking-icon"></i>
                </button>
            </p>
            <div class="collapse mb-2" id="collapseExample">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-easycheck">
                        <h6 class="m-0 font-weight-bold text-white">SOLICITUDES DE AGENCIAS</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-buttons">
                            <table class="display tablanaturleon" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Plaza</th>
                                        <th>Dirección</th>
                                        <th>Teléfonos</th>
                                        <th>Solicitud</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($agencias)){foreach($agencias as $x){if($x['status_agencia'] == 2 || $x['status_agencia'] == 3 || $x['status_agencia'] == 4){ ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $x['nombre_agencia']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $x['plaza_agencia']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $x['callenum_agencia']; ?><br><?= $x['colonia_agencia']; ?> C.P. <?= $x['codigopostal_agencia']; ?><br>
                                            <?= $x['municipio_agencia']; ?>, <?= $x['estado_agencia']; ?>, <?= $x['pais_agencia']; ?>
                                        </td>
                                        <td class="text-center">
                                            Tel. <?= $x['telefono1_agencia']; ?><br>
                                            Móv. <?= $x['movil1_agencia']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= date("d/m/Y g:i A",strtotime($x['fechahora_alta_agencia'])); ?>
                                        </td>
                                        <td class="text-center">
                                            <?php 
                                                if($x['status_agencia'] == 2){ //En espera de modificación solicitud
                                                    echo "<span class='badge badge-info'>En espera de modificación de solicitud.</span>";
                                                }else if($x['status_agencia'] == 3){ //En espera de respuesta de solicitud
                                                    echo "<span class='badge badge-primary'>En espera de respuesta de solicitud.</span>";
                                                }else if($x['status_agencia'] == 4){//En espera de revisión de solicitud
                                                    echo "<span class='badge badge-warning text-dark'>En espera de revisión de solicitud.</span>";
                                                }
                                            ?>
                                            <br>
                                            <?= date("d/m/Y g:i A",strtotime($x['fechahora_modificacion_agencia'])); ?>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-md" title="Ver Datos Agencia" onclick="VerDatosAgencia(<?= $x['id_agencia']; ?>)"><i class="fas fa-info"></i></button>
                                        </td>
                                    </tr>
                                    <?php }}} ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>Nombre</th>
                                        <th>Plaza</th>
                                        <th>Dirección</th>
                                        <th>Teléfonos</th>
                                        <th>Solicitud</th>
                                        <th>Estado</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">AGREGAR AGENCIA</h6>
                </div>
                <div class="card-body">
                    <form id="FormAgregarAgencia" class="row g-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Alias</label>
                                <input type="text" class="form-control" id="aliasagencia" name="aliasagencia" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nombre Comercial</label> 
                                <input class="form-control" type="text" id="nombreagencia" name="nombreagencia"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Plaza</label>
                                <select class="form-control" id="plazaagencia" name="plazaagencia">
                                    <option value="0">Seleccionar...</option>
                                    <?php if(!empty($plazas)){ foreach($plazas as $x){ ?>
                                    <option value="<?= $x['nombre_plaza']; ?>"><?= $x['nombre_plaza']; ?></option>
                                    <?php }} ?>
                                </select> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Reg. Nacional/Estatal de Turismo</label> 
                                <input class="form-control" type="text" id="regturismoagencia" name="regturismoagencia"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Código Postal</label> 
                                <input class="form-control" type="number" id="cp_agencia" name="cp_agencia" onkeyup="BuscarCP('agencia')"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Colonia</label> 
                                <select class="form-control" id="colonia_agencia" name="colonia_agencia" >
                                  <option value="0">Seleccionar...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Calle y N°</label> 
                                <input class="form-control" type="text" id="calleagencia" name="calleagencia"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="estado_agencia">Estado</label>
                                <input class="form-control" type="text" id="estado_agencia" name="estado_agencia" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Municipio</label>
                                <input class="form-control" type="text" id="municipio_agencia" name="municipio_agencia" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>País</label> 
                                <input class="form-control" type="text" id="paisagencia" name="paisagencia" value="México" readonly> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Teléfono Principal</label> 
                                <input class="form-control" type="text" id="telefonoprincipalagencia" name="telefonoprincipalagencia"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Teléfono Adicional</label> 
                                <input class="form-control" type="text" id="telefonoadicionalagencia" name="telefonoadicionalagencia"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Móvil 1</label> 
                                <input class="form-control" type="text" id="movil1agencia" name="movil1agencia"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Móvil 2</label> 
                                <input class="form-control" type="text" id="movil2agencia" name="movil2agencia"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Website</label> 
                                <input class="form-control" type="text" id="websiteagencia" name="websiteagencia"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Logotipo</label> <small>.jpg máx de 2MB</small>
                                <input type="file" class="form-control" name="logotipo" id="logotipo" accept="image/jpg, image/jpeg">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Observaciones</label>
                                <textarea class="form-control" id="observaciones" name="observaciones"></textarea>
                            </div>
                        </div>
                        <div class="col-12 mb-2 text-center">
                            <button id="btnGuardarAgencia" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
                        </div>
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
                    <h6 class="m-0 font-weight-bold text-white">LISTADO DE AGENCIAS</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="selectPlazasAgregarAgencias">Filtrar por plaza <span id="totalRegistrosAgregarAgencias" class="ml-2 badge badge-primary"></span></label>
                            <select class="form-control" id="selectPlazasAgregarAgencias">
                                <option value="0">Todas</option>
                                <?php if(!empty($plazas)){ foreach($plazas as $x){ ?>
                                <option value="<?= $x['nombre_plaza']; ?>"><?= $x['nombre_plaza']; ?></option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive table-buttons">
                        <table id="tablaAgregarAgencias" class="display table-hover" style="width:100%">
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

    <div class="modal fade" id="modalDatosSolicitudAgencia" data-backdrop="static" data-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header bg-easycheck">
                <h5 class="modal-title text-white">Información de la Agencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12"><strong>Fecha solicitud: </strong><label id="displayFechaSolicitud"></label></div>
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-easycheck text-white">
                                    Datos Generales
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item" hidden><span id="displayIdAgencia"></span></li>
                                        <li class="list-group-item"><strong>Nombre:</strong> <span id="displayNombreComercial"></span></li>
                                        <li class="list-group-item"><strong>Reg. Turismo:</strong> <span id="displayRenatu"></span></li>
                                        <li class="list-group-item"><strong>Plaza:</strong> <span id="displayPlaza"></span></li>
                                        <li class="list-group-item"><strong>Otros Datos:</strong> <span id="displayOtrosDatos"></span></li>
                                        <li class="list-group-item"><strong>Persona de Contacto:</strong> <span id="displayPersonaContacto"></span></li>
                                        <li class="list-group-item"><strong>Email:</strong> <span id="displayEmail"></span></li>
                                        <li class="list-group-item"><strong>Calle:</strong> <span id="displayCalle"></span></li>
                                        <li class="list-group-item"><strong>Colonia:</strong> <span id="displayColonia"></span></li>
                                        <li class="list-group-item"><strong>Código Postal:</strong> <span id="displayCodigoPostal"></span></li>
                                        <li class="list-group-item"><strong>País:</strong> <span id="displayPais"></span></li>
                                        <li class="list-group-item"><strong>Estado:</strong> <span id="displayEstado"></span></li>
                                        <li class="list-group-item"><strong>Municipio:</strong> <span id="displayMunicipio"></span></li>
                                        <li class="list-group-item"><strong>Teléfono Principal:</strong> <span id="displayTelefonoPrincipal"></span></li>
                                        <li class="list-group-item"><strong>Teléfono Adicional:</strong> <span id="displayTelefonoAdicional"></span></li>
                                        <li class="list-group-item"><strong>Móvil 1:</strong> <span id="displayMovil1"></span></li>
                                        <li class="list-group-item"><strong>Móvil 2:</strong> <span id="displayMovil2"></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-easycheck text-white">
                                    Datos Facturación
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Contacto:</strong> <span id="displayFacturacionContacto"></span></li>
                                        <li class="list-group-item"><strong>Razón Social:</strong> <span id="displayFacturacionRazonSocial"></span></li>
                                        <li class="list-group-item"><strong>RFC:</strong> <span id="displayFacturacionRfc"></span></li>
                                        <li class="list-group-item"><strong>Email:</strong> <span id="displayFacturacionEmail"></span></li>
                                        <li class="list-group-item"><strong>Calle:</strong> <span id="displayFacturacionCalle"></span></li>
                                        <li class="list-group-item"><strong>Colonia:</strong> <span id="displayFacturacionColonia"></span></li>
                                        <li class="list-group-item"><strong>Código Postal:</strong> <span id="displayFacturacionCodigoPostal"></span></li>
                                        <li class="list-group-item"><strong>País:</strong> <span id="displayFacturacionPais"></span></li>
                                        <li class="list-group-item"><strong>Estado:</strong> <span id="displayFacturacionEstado"></span></li>
                                        <li class="list-group-item"><strong>Municipio:</strong> <span id="displayFacturacionMunicipio"></span></li>
                                        <li class="list-group-item"><strong>Teléfono Principal:</strong> <span id="displayTelefonoPrincipalFacturacion"></span></li>
                                        <li class="list-group-item"><strong>Teléfono Adicional:</strong> <span id="displayTelefonoAdicionalFacturacion"></span></li>
                                        <li class="list-group-item"><strong>Móvil 1:</strong> <span id="displayMovil1Facturacion"></span></li>
                                        <li class="list-group-item"><strong>Móvil 2:</strong> <span id="displayMovil2Facturacion"></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card mt-4">
                                <div class="card-header bg-easycheck text-white">
                                    Documentos
                                </div>
                                <div class="card-body">
                                    <div class="row" id="divDocumentos"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button id="btnAceptarSolicitud" title="Aceptar Solicitud" type="button" class="btn btn-primary font-weight-bold">ACEPTAR</button>
                <button onclick="RechazarEliminarSolicitudModal(1)" title="Rechazar Solicitud" type="button" class="btn btn-warning font-weight-bold">RECHAZAR</button>
                <button onclick="RechazarEliminarSolicitudModal(2)" title="Eliminar Solicitud" type="button" class="btn btn-danger font-weight-bold">ELIMINAR</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalRechazarEliminarSolicitudAgencia" data-backdrop="static" data-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-easycheck">
                    <h5 id="tituloModalRechazarEliminar" class="modal-title text-white"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="form-control" id="txtObservacionesRechazarEliminar" rows="8"></textarea>
                            <div>
                        </div>
                    </div>
                </div>
                <div id="modalFooterRechazarEliminar" class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->