<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modificación de Solicitud | Naturleón</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="<?= base_url("assets/img/logo_naturleon.png");?>" />
    <link href="<?= base_url('assets/sweetalert/sweetalert2.css'); ?>" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; font-family: 'Inter', sans-serif; color: #334155; }
        .main-card { border: none; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .card-header { border-bottom: none; padding: 1.25rem 1.5rem; border-radius: 12px 12px 0 0 !important; }
        .form-group label { font-weight: 600; font-size: 0.9rem; color: #475569; margin-bottom: 0.5rem; }
        .form-control { border-radius: 8px; border: 1px solid #e2e8f0; padding: 0.6rem 0.75rem; transition: all 0.2s; }
        .form-control:focus { border-color: #003a70; box-shadow: 0 0 0 3px rgba(0, 58, 112, 0.1); }
        .btn-primary { background-color: #003a70; border-color: #003a70; border-radius: 8px; padding: 12px 30px; }
        .section-icon { margin-right: 10px; opacity: 0.8; }
        .badge-step { background: rgba(255,255,255,0.2); padding: 4px 8px; border-radius: 50%; margin-right: 10px; font-size: 0.8rem; }
        .bg-light-warning { background-color: #fffaf0; }
        .btn-view-current { font-size: 0.75rem; padding: 2px 8px; }
    </style>
</head>
<body>

<div class="container my-5">
    <?php if(empty($agencia)): ?>
        <div class="alert alert-custom bg-white shadow-sm text-center p-5" role="alert">
            <i class="fas fa-exclamation-circle fa-3x text-danger mb-3"></i>
            <h4 class="text-danger">Enlace Expirado</h4>
            <p class="text-muted">La opción para modificar la solicitud ha expirado o no es válida.</p>
        </div>
    <?php else: ?>
        
        <div class="text-center mb-5">
            <img src="<?= base_url("assets/img/naturleon_logo.png"); ?>" class="img-fluid mb-3" style="max-width: 220px;">
            <h2 class="font-weight-bold">Actualización de Información Agencia</h2>
            <p class="text-muted">Revisa y completa la información para continuar con tu proceso.</p>
        </div>

        <form id="formModificarSolicitud" enctype="multipart/form-data">
            
            <div class="card main-card mb-4">
                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <span class="badge-step">1</span>
                    <h5 class="mb-0"><i class="fas fa-building section-icon"></i> Datos Generales y Acceso</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre Comercial</label>
                                <input class="form-control" type="text" name="nombrecomercial" value="<?= $agencia[0]['nombre_agencia']; ?>" required>
                                <input type="hidden" name="idAgencia" value="<?= $idAgencia; ?>">  
                                <input type="hidden" name="tokenAgencia" value="<?= $token; ?>">  
                                <input type="hidden" name="idUsuario" value="<?= $usuarios[0]['id_usuario']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Razón Social</label>
                                <input class="form-control" type="text" name="razonsocial" value="<?= $fiscales[0]['razon_social_fiscal']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>RFC</label>
                                <input class="form-control" type="text" name="rfc" value="<?= $fiscales[0]['rfc_fiscal']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Reg. Nacional/Estatal (RNT)</label>
                                <input class="form-control" type="text" name="renatu" value="<?= $agencia[0]['registro_agencia']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Plaza</label>
                                <select class="form-control" name="plaza" required>
                                    <?php foreach($plazas as $x): ?>
                                        <option value="<?= $x['nombre_plaza']; ?>" <?= ($x['nombre_plaza'] == $agencia[0]['plaza_agencia']) ? 'selected' : ''; ?>>
                                            <?= $x['nombre_plaza']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Login de Usuario</label>
                                <input class="form-control bg-light" type="text" value="<?= $usuarios[0]['login_usuario']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="passwordagencia">Nueva Contraseña <small class="text-muted">(Opcional)</small></label>
                                <input class="form-control" type="password" id="passwordagencia" name="passwordagencia" placeholder="Dejar en blanco para no cambiar">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirmacionpassword">Confirmar Contraseña</label>
                                <input class="form-control" type="password" id="confirmacionpassword" name="confirmacionpassword">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card main-card mb-4">
                <div class="card-header bg-secondary text-white d-flex align-items-center">
                    <span class="badge-step">2</span>
                    <h5 class="mb-0"><i class="fas fa-address-book section-icon"></i> Datos de Contacto</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>Persona de Contacto</label>
                                <input class="form-control" type="text" name="personacontacto" value="<?= $usuarios[0]['nombre_usuario']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>Email Principal</label>
                                <input class="form-control" type="email" name="emailcontacto" value="<?= $usuarios[0]['email_usuario']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-2">
                            <div class="form-group">
                                <label for="cpcontacto">C.P.</label>
                                <input class="form-control" type="number" id="cpcontacto" name="cpcontacto" onkeyup="BuscarDatosCP()" value="<?= $agencia[0]['codigopostal_agencia']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-2">
                            <div class="form-group">
                                <label for="estadocontacto">Estado</label>
                                <input class="form-control bg-light" type="text" id="estadocontacto" name="estadocontacto" value="<?= $agencia[0]['estado_agencia']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="coloniacontacto">Colonia</label>
                                <select class="form-control" id="coloniacontacto" name="coloniacontacto" required>
                                    <?php foreach($coloniasagencia as $x): ?>
                                        <option value="<?= $x['nombre_colonia']; ?>" <?= ($x['nombre_colonia'] == $agencia[0]['colonia_agencia']) ? 'selected' : ''; ?>><?= $x['nombre_colonia']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="municipiocontacto">Municipio</label>
                                <input class="form-control bg-light" type="text" id="municipiocontacto" name="municipiocontacto" value="<?= $agencia[0]['municipio_agencia']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tel. Principal</label>
                                <input class="form-control" type="text" name="telefonocontacto" value="<?= $agencia[0]['telefono1_agencia']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Móvil 1</label>
                                <input class="form-control" type="text" name="movil1contacto" value="<?= $agencia[0]['movil1_agencia']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Calle y Número</label>
                                <input class="form-control" type="text" name="callecontacto" value="<?= $agencia[0]['callenum_agencia']; ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card main-card mb-4 border-warning">
                <div class="card-header bg-warning text-dark d-flex align-items-center">
                    <span class="badge-step text-white" style="background:#333">3</span>
                    <h5 class="mb-0 font-weight-bold"><i class="fas fa-file-upload section-icon"></i> Documentación Requerida</h5>
                </div>
                <div class="card-body p-4 bg-light-warning">
                    <div class="row">
                        <?php 
                        $docs = [
                            ['id' => 'altahacienda', 'label' => 'Alta Hacienda', 'info' => 'CIF'],
                            ['id' => 'identificacionoficial', 'label' => 'Identificación Oficial', 'info' => 'INE/Pasaporte'],
                            ['id' => 'comprobantedomicilio', 'label' => 'Comprobante Domicilio', 'info' => 'Max 3 meses'],
                            ['id' => 'cartamembretada', 'label' => 'Carta Membretada', 'info' => 'Firma autógrafa'],
                            ['id' => 'cedulaturistica', 'label' => 'Cédula Turística', 'info' => 'Vigente'],
                            ['id' => 'logotipoagencia', 'label' => 'Logotipo', 'info' => 'PNG/JPG']
                        ];

                        foreach($docs as $doc): ?>
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="p-3 bg-white rounded border shadow-sm h-100">
                                    <label class="d-flex justify-content-between">
                                        <span><?= $doc['label']; ?></span>
                                        <?php if(!empty($documentos)): 
                                            foreach($documentos as $d): 
                                                if($d['nombre_oficial_documento'] == $doc['label']): ?>
                                                    <a href="<?= base_url($d['archivo_documento']); ?>" class="btn btn-outline-primary btn-view-current" download>
                                                        <i class="fas fa-eye"></i> Ver
                                                    </a>
                                        <?php endif; endforeach; endif; ?>
                                    </label>
                                    <input class="form-control-file" type="file" name="<?= $doc['id']; ?>" accept="image/*,.pdf">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="text-center text-lg-right mt-5">
                <button id="btnModificarSolicitud" class="btn btn-primary btn-lg shadow" type="submit">
                    <i class="fas fa-save mr-2"></i> ACTUALIZAR MI SOLICITUD
                </button>
            </div>
            
        </form>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/sweetalert/sweetalert2.js'); ?>"></script>

<script>
    var base_url = "<?= base_url(); ?>";
    
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();

        $("#formModificarSolicitud").submit(function (e) {
            e.preventDefault();
            var btn = $("#btnModificarSolicitud");
            btn.attr("disabled", true);

            var pwd = $("#passwordagencia").val() || "";
            var confpwd = $("#confirmacionpassword").val() || "";

            if(pwd.length > 0 || confpwd.length > 0){
                if(pwd !== confpwd){
                    btn.removeAttr("disabled");
                    Swal.fire({ title: "¡Error!", text: "Las contraseñas no coinciden.", icon: "error" });
                    return false;
                }
            }

            Swal.fire({
                title: 'Procesando...',
                text: 'Guardando cambios y archivos',
                allowOutsideClick: false,
                didOpen: () => { Swal.showLoading(); }
            });

            $.ajax({
                type: "POST",
                url: base_url + 'Main/ModificarSolicitudBD',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success: function (data){
                    btn.removeAttr("disabled");
                    if(data == 'Success'){
                        $("#btnModificarSolicitud").removeAttr("disabled");
                        Swal.fire({   
                            title: "¡Guardado!",   
                            text: "Analizaremos la información proporcionada y nos pondremos en contacto contigo pronto.",
                            type: "success",
                            timer: 4000,   
                            showConfirmButton: false 
                        });
                        setTimeout(function(){
                            window.location.href = base_url;
                        }, 4000);
                    }else{
                        $("#btnModificarSolicitud").removeAttr("disabled");
                        Swal.fire({   
                            title: "¡Error!",   
                            text: data,
                            type: "error",
                            timer: 4000,   
                            showConfirmButton: false 
                        });
                    }
                },
                error: function() {
                    btn.removeAttr("disabled");
                    Swal.fire("Error", "No se pudo conectar con el servidor", "error");
                }
            });
        });
    });

    function BuscarDatosCP() {
        var cp = $("#cpcontacto").val();
        if (cp.length == 5) {
            $.ajax({
                url: base_url + "ExtAgencias/getDatosCP",
                type: "POST",
                data: { cp: cp },
                dataType: "json",
                success: function(res) {
                    if (res.length > 0) {
                        $("#estadocontacto").val(res[0].estado);
                        $("#municipiocontacto").val(res[0].municipio);
                        var html = "";
                        res.forEach(function(item) {
                            html += '<option value="' + item.colonia + '">' + item.colonia + '</option>';
                        });
                        $("#coloniacontacto").html(html);
                    }
                }
            });
        }
    }
</script>
</body>
</html>