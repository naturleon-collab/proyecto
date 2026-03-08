<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">ADMINISTRAR USUARIOS</h6>
                </div>
                <div class="card-body">
                    <form id="FormGuardarUsuario" class="row g-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                                <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="0">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Alias</label>
                                <input type="text" class="form-control" id="alias_usuario" name="alias_usuario" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tipo de Acceso</label>
                                <select class="form-control selectpicker" id="tipo_acceso" name="tipo_acceso" data-live-search="true" onchange="FiltrarEntidades(this.value)" required>
                                    <option value="">Seleccionar...</option>
                                    <option value="admin">Administrador Global</option>
                                    <option value="agencia">Agencia</option>
                                    <option value="hotel">Hotel</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3" id="container_entidad" style="display:none;">
                            <div class="form-group">
                                <label id="label_entidad">Asignar a...</label>
                                <select class="form-control selectpicker" id="id_entidad" name="id_entidad" data-live-search="true">
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email_usuario" name="email_usuario" required>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Login</label>
                                <input type="text" class="form-control" id="login_usuario" name="login_usuario" value="" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Contraseña</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="pwd_usuario" name="pwd_usuario" 
                                        value="" placeholder="Escribe o genera una..." 
                                        autocomplete="new-password" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" title="Generar contraseña" onclick="GenerarPassword()">
                                            <i class="fas fa-magic"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Móvil</label>
                                <input type="text" class="form-control" id="movil_usuario" name="movil_usuario">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Cumpleaños</label>
                                <input type="date" class="form-control" id="cumple_usuario" name="cumple_usuario">
                            </div>
                        </div>

                        <div class="col-12 text-center border-top pt-3">
                            <button id="btnGuardarUsuario" class="btn btn-primary px-5" type="submit">
                                <strong>GUARDAR</strong>
                            </button>
                            <button class="btn btn-secondary px-5" type="reset">
                                <strong>LIMPIAR</strong>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-white">LISTADO DE USUARIOS REGISTRADOS</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-buttons">
                        <table id="tablaUsuarios" class="display tablanaturleon" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Estado</th>
                                    <th>Nombre / Alias</th>
                                    <th>Acceso / Entidad</th>
                                    <th>Contacto</th>
                                    <th>Último Acceso</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($usuarios)){ foreach($usuarios as $user){ ?>
                                <tr>
                                    <td class="text-center">
                                        <?php if($user['status_usuario'] == 1){ ?>
                                            <span class="badge badge-success">Activo</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Inactivo</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <strong><?= $user['nombre_usuario']; ?></strong><br>
                                        <small class="text-muted">@<?= $user['alias_usuario']; ?></small>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-dark"><?= strtoupper($user['tipo_acceso']); ?></span><br>
                                        <small class="text-muted font-weight-bold">
                                            <?php 
                                                if($user['tipo_acceso'] == 'hotel'){
                                                    echo $user['nombre_hotel'] ?? 'Sin Hotel';
                                                } else {
                                                    // Para admin y agencia mostramos la agencia
                                                    echo $user['nombre_agencia'] ?? 'Sin Agencia';
                                                }
                                            ?>
                                        </small>
                                    </td>
                                    <td>
                                        <?= $user['email_usuario']; ?><br>
                                        <?= $user['movil_usuario']; ?>
                                    </td>
                                    <td class="text-center">
                                        <small><?= ($user['ultimo_acceso'] != "0000-00-00 00:00:00") ? date("d/m/Y g:i A", strtotime($user['ultimo_acceso'])) : 'Nunca'; ?></small>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary btn-sm" title="Editar Usuario" onclick="EditarUsuario(<?= $user['id_usuario']; ?>)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <?php if($user['status_usuario'] == 1){ ?>
                                                <button type="button" class="btn btn-danger btn-sm" title="Desactivar" onclick="CambiarEstadoUsuario(<?= $user['id_usuario']; ?>, 0)">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-success btn-sm" title="Activar" onclick="CambiarEstadoUsuario(<?= $user['id_usuario']; ?>, 1)">
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
