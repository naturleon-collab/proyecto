$("#FormAgregarAgencia").submit(function (e) {
    e.preventDefault();

    $("#btnGuardarAgencia").attr("disabled", true);
    $.ajax({
        type: "POST",
        url: base_url + 'ExtAgencias/AgregarAgencia',
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnGuardarAgencia").removeAttr("disabled");
                Swal.fire({   
                    title: "¡SE HA GUARDADO CORRECTAMENTE!",   
                    text: "Espere un momento por favor...",
                    type: "success",
                    timer: 2000,   
                    showConfirmButton: false 
                });
                setTimeout(function(){
                   location.reload();
                }, 2000);
            }else{
                $("#btnGuardarAgencia").removeAttr("disabled");
                Swal.fire({   
                    title: "ERROR!",   
                    text: "Ocurrió un error, intente de nuevo...",
                    type: "error",
                    timer: 2000,   
                    showConfirmButton: false 
                });
            }
        }
    });
});

function AdministrarAgencia(id){
    $.ajax({
        type: "POST",
        url: base_url + 'ExtAgencias/SaveID',
        data:  {
            id: id
        },
        success: function(data){
            if(data=='Success'){
                window.location.href = base_url + "ExtAgencias/Administrar";
            }else if(data=='Error'){
                Swal.fire(
                    'Error',
                    '¡Ocurrió un error, favor de intentarlo de nuevo!',
                    'error'
                )
            }
        }
    });
}

$("#FormModificarAgencia").submit(function (e) {
    e.preventDefault();

    $("#btnModificarAgencia").attr("disabled", true);
    $.ajax({
        type: "POST",
        url: base_url + 'ExtAgencias/ModificarAgencia',
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnModificarAgencia").removeAttr("disabled");
                Swal.fire({   
                    title: "¡SE HA GUARDADO CORRECTAMENTE!",   
                    text: "Espere un momento por favor...",
                    type: "success",
                    timer: 2000,   
                    showConfirmButton: false 
                });
                setTimeout(function(){
                   location.reload();
                }, 2000);
            }else{
                $("#btnModificarAgencia").removeAttr("disabled");
                Swal.fire({   
                    title: "ERROR!",   
                    text: "Ocurrió un error, intente de nuevo...",
                    type: "error",
                    timer: 2000,   
                    showConfirmButton: false 
                });
            }
        }
    });
});

function CambiarStatusAgencia(id,status){
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Estás a punto de cambiar el status...",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'De acuerdo',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: base_url + 'ExtAgencias/Status',
                data:  {
                    id: id,
                    status: status,
                },
                success: function(data){
                    if(data=='Success'){
                        Swal.fire({   
                            title: "¡SE HA CAMBIADO CORRECTAMENTE!",   
                            text: "Espere un momento por favor...",
                            type: "success",
                            timer: 2000,   
                            showConfirmButton: false 
                        });
                        setTimeout(function(){
                            location.reload();
                        }, 2000);
                    }else{
                        Swal.fire({   
                            title: "ERROR!",   
                            text: "Ocurrió un error, intente de nuevo...",
                            type: "error",
                            timer: 2000,   
                            showConfirmButton: false 
                        });
                    }
                }
            });
        }
    });
}

function AgregarNuevoUsuarioHotel(){
    const form = document.getElementById('FormGuardarUsuario');
    form.reset();
    $("#idUsuario").val("0");
}

function EditarUsuarioAgencia(id){
    $("#idUsuario").val(id);
    const db = "usuarios";
    const namefield = "id_usuario";
    const nameresult = "usuario";

    $.ajax({
        type: "POST",
        url: base_url + 'ExtAgencias/DataModificar',
        dataType: "json",
        data:  {
            id,
            db,
            namefield,
            nameresult
        },
        success: function(data){
            if(data.msg != 'Error'){
                $("#aliasUsuario").focus();
                for (var i = 0; i < data.usuario.length; i++) {
                    $("#aliasUsuario").val(data.usuario[i].alias_usuario);
                    $("#nombreUsuario").val(data.usuario[i].nombre_usuario);
                    $("#emailUsuario").val(data.usuario[i].email_usuario);
                    $("#movilUsuario").val(data.usuario[i].movil_usuario);
                    $("#loginUsuario").val(data.usuario[i].login_usuario);

                    
                    let fecha = data.usuario[i].cumple_usuario;
                    if(fecha === "0000-00-00" || !fecha) {
                        $("#cumpleUsuario").val("");
                    }else{
                        $("#cumpleUsuario").val(fecha);
                    }

                    if(data.usuario[i].status_usuario == 1){$("#statusUsuario").prop("checked", true);}
                }
            }
        }
    });
}

$("#FormGuardarUsuarioAgencia").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarUsuarioAgencia").attr("disabled", true);

    var pwd = $("#passwordUsuario").val(); var confpwd = $("#confirmacionPasswordUsuario").val();

    var idusuario = $("#idUsuario").val();

    if(idusuario == 0 && (pwd.length == 0 || confpwd == 0)){
        $("#btnGuardarUsuarioAgencia").removeAttr("disabled");
        Swal.fire({   
            title: "",   
            text: "Es necesario ingresar contraseña.",
            type: "warning",
            timer: 2000,   
            showConfirmButton: false 
        });
    }else{
        if(pwd != confpwd){
            $("#btnGuardarUsuarioAgencia").removeAttr("disabled");
            Swal.fire({   
                title: "",   
                text: "Las contraseñas ingresadas no coinciden.",
                type: "warning",
                timer: 2000,   
                showConfirmButton: false 
            });
        }else{
            var formData = new FormData(this);
            var statusAgencia = 0;
            if($('#statusUsuario').is(':checked')) {
                statusAgencia = 1;
            }
            formData.append("statusAgencia", statusAgencia);


            $.ajax({
                type: "POST",
                url: base_url + 'ExtAgencias/Usuarios',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success:  function (data){
                    if(data == 'Success'){
                        $("#btnGuardarUsuarioAgencia").removeAttr("disabled");
                        Swal.fire({   
                            title: "¡SE HA GUARDADO CORRECTAMENTE!",   
                            text: "Espere un momento por favor...",
                            type: "success",
                            timer: 2000,   
                            showConfirmButton: false 
                        });
                        setTimeout(function(){
                        location.reload();
                        }, 2000);
                    }else{
                        $("#btnGuardarUsuarioAgencia").removeAttr("disabled");
                        Swal.fire({   
                            title: "ERROR!",   
                            text: "Ocurrió un error, intente de nuevo...",
                            type: "error",
                            timer: 2000,   
                            showConfirmButton: false 
                        });
                    }
                }
            });
        }
    }
});

function AgregarNuevaCuenta(){
    const form = document.getElementById('FormGuardarCuenta');
    form.reset();
    $("#idCuenta").val("0");
}

function EditarCuenta(id){
    $("#idCuenta").val(id);
    const db = "agencias_cuentas";
    const namefield = "id_cuenta";
    const nameresult = "cuenta";

    $.ajax({
        type: "POST",
        url: base_url + 'ExtAgencias/DataModificar',
        dataType: "json",
        data:  {
            id,
            db,
            namefield,
            nameresult
        },
        success: function(data){
            if(data.msg != 'Error'){
                $("#aliasCuenta").focus();
                for (var i = 0; i < data.cuenta.length; i++) {
                    $("#aliasCuenta").val(data.cuenta[i].alias_cuenta);
                    $("#nombreCuenta").val(data.cuenta[i].nombre_cuenta);
                    $("#institucionCuenta").val(data.cuenta[i].institucion_cuenta);
                    $("#tipoCuenta").val(data.cuenta[i].tipo_cuenta);
                    $("#numCuenta").val(data.cuenta[i].num_cuenta);
                    $("#clabeCuenta").val(data.cuenta[i].clabe_cuenta);
                    $("#observacionesCuenta").val(data.cuenta[i].observaciones_cuenta);

                    if(data.cuenta[i].status_cuenta == 1){$("#statusCuenta").prop("checked", true);}
                }
            }
        }
    });
}

$("#FormGuardarCuenta").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarCuenta").attr("disabled", true);

    var formData = new FormData(this);
    var statusCuenta = 0;
    if($('#statusCuenta').is(':checked')) {
        statusCuenta = 1;
    }
    formData.append("statusCuenta", statusCuenta);


    $.ajax({
        type: "POST",
        url: base_url + 'ExtAgencias/Cuentas',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnGuardarCuenta").removeAttr("disabled");
                Swal.fire({   
                    title: "¡SE HA GUARDADO CORRECTAMENTE!",   
                    text: "Espere un momento por favor...",
                    type: "success",
                    timer: 2000,   
                    showConfirmButton: false 
                });
                setTimeout(function(){
                location.reload();
                }, 2000);
            }else{
                $("#btnGuardarCuenta").removeAttr("disabled");
                Swal.fire({   
                    title: "ERROR!",   
                    text: "Ocurrió un error, intente de nuevo...",
                    type: "error",
                    timer: 2000,   
                    showConfirmButton: false 
                });
            }
        }
    });
});

function AgregarNuevoDocumento(){
    const form = document.getElementById('FormGuardarDocumento');
    form.reset();
    $("#idDocumento").val("0");
    const a = document.getElementById('descargarArchivo');
    a.href = "";
    $("#divDescargarArchivo").attr('hidden',true);
}

function EditarDocumento(id){
    $("#idDocumento").val(id);
    const db = "agencias_documentos";
    const namefield = "id_documento";
    const nameresult = "documento";

    $.ajax({
        type: "POST",
        url: base_url + 'ExtAgencias/DataModificar',
        dataType: "json",
        data:  {
            id,
            db,
            namefield,
            nameresult
        },
        success: function(data){
            if(data.msg != 'Error'){
                $("#aliasDocumento").focus();
                $("#divDescargarArchivo").removeAttr('hidden');
                for (var i = 0; i < data.documento.length; i++) {
                    $("#aliasDocumento").val(data.documento[i].alias_documento);
                    $("#nombreDocumento").val(data.documento[i].nombre_oficial_documento);
                    $("#observacionesDocumento").val(data.documento[i].observaciones_documento);
                    const a = document.getElementById('descargarArchivo');
                    a.href = base_url+data.documento[i].archivo_documento;
                }
            }
        }
    });
}

$("#FormGuardarDocumento").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarDocumento").attr("disabled", true);

    var formData = new FormData(this);

    var idDocumento = $("#idDocumento").val();

    if(idDocumento == 0 && !$('#archivoDocumento').val()){
        $("#btnGuardarDocumento").removeAttr("disabled");
        Swal.fire({   
            title: "",   
            text: "Es necesario seleccionar un archivo.",
            type: "warning",
            timer: 2000,   
            showConfirmButton: false 
        });
    }else{
        $.ajax({
            type: "POST",
            url: base_url + 'ExtAgencias/Documentos',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success:  function (data){
                if(data == 'Success'){
                    $("#btnGuardarDocumento").removeAttr("disabled");
                    Swal.fire({   
                        title: "¡SE HA GUARDADO CORRECTAMENTE!",   
                        text: "Espere un momento por favor...",
                        type: "success",
                        timer: 2000,   
                        showConfirmButton: false 
                    });
                    setTimeout(function(){
                    location.reload();
                    }, 2000);
                }else{
                    $("#btnGuardarDocumento").removeAttr("disabled");
                    Swal.fire({   
                        title: "ERROR!",   
                        text: "Ocurrió un error, intente de nuevo...",
                        type: "error",
                        timer: 2000,   
                        showConfirmButton: false 
                    });
                }
            }
        });
    }
});

function AgregarNuevoDatoFiscal(){
    const form = document.getElementById('FormGuardarDatoFiscal');
    form.reset();
    $("#idDatoFiscal").val("0");
}

function EditarDatoFiscal(id){
    $("#idDatoFiscal").val(id);
    const db = "agencias_datos_fiscales";
    const namefield = "id_dato_fiscal";
    const nameresult = "datofiscal";

    $.ajax({
        type: "POST",
        url: base_url + 'ExtAgencias/DataModificar',
        dataType: "json",
        data:  {
            id,
            db,
            namefield,
            nameresult
        },
        success: function(data){
            if(data.msg != 'Error'){
                $("#razonSocialFiscal").focus();

                $("#colonia_Fiscal").empty();
                for (var i = 0; i < data.colonias.length; i++) {
                    var newRow = jQuery('<option value="'+ data.colonias[i].nombre_colonia +'">'+ data.colonias[i].nombre_colonia +'</option>');
                    jQuery('#colonia_Fiscal').append(newRow);
                }

                for (var i = 0; i < data.datofiscal.length; i++) {
                    $("#razonSocialFiscal").val(data.datofiscal[i].razon_social_fiscal);
                    $("#rfcFiscal").val(data.datofiscal[i].rfc_fiscal);
                    $("#paisFiscal").val(data.datofiscal[i].pais_fiscal);
                    $("#estado_Fiscal").val(data.datofiscal[i].estado_fiscal);
                    $("#municipio_Fiscal").val(data.datofiscal[i].municipio_fiscal);
                    $("#cp_Fiscal").val(data.datofiscal[i].cp_fiscal);
                    $("#calleNumFiscal").val(data.datofiscal[i].callenum_fiscal);
                    $("#emailFiscal").val(data.datofiscal[i].email_fiscal);
                    $("#encargadoFiscal").val(data.datofiscal[i].encargado_fiscal);
                    $("#telefonofiscal").val(data.datofiscal[i].telefono1_fiscal);
                    $("#telefonoadicionalfiscal").val(data.datofiscal[i].telefono2_fiscal);
                    $("#movil1fiscal").val(data.datofiscal[i].movil1_fiscal);
                    $("#movil2fiscal").val(data.datofiscal[i].movil2_fiscal);
                    $('#formaPagoFiscal option[value='+data.datofiscal[i].forma_pago+']').prop('selected',true);
                    $('#metodoPagoFiscal option[value='+data.datofiscal[i].metodo_pago+']').prop('selected',true);
                    $('#regimenFiscalFiscal option[value='+data.datofiscal[i].regimen_fiscal+']').prop('selected',true);
                    $('#usoCFDIFiscal option[value='+data.datofiscal[i].uso_cfdi+']').prop('selected',true);
                    $('#colonia_Fiscal option[value="' + data.datofiscal[i].colonia_fiscal + '"]').prop('selected', true);

                    if(data.datofiscal[i].status_fiscal == 1){$("#statusFiscal").prop("checked", true);}
                }

            }
        }
    });
}

$("#FormGuardarDatoFiscal").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarDatoFiscal").attr("disabled", true);

    var formData = new FormData(this);
    var statusFiscal = 0;
    if($('#statusFiscal').is(':checked')) {
        statusFiscal = 1;
    }
    formData.append("statusFiscal", statusFiscal);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtAgencias/DatosFiscales',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnGuardarDatoFiscal").removeAttr("disabled");
                Swal.fire({   
                    title: "¡SE HA GUARDADO CORRECTAMENTE!",   
                    text: "Espere un momento por favor...",
                    type: "success",
                    timer: 2000,   
                    showConfirmButton: false 
                });
                setTimeout(function(){
                location.reload();
                }, 2000);
            }else{
                $("#btnGuardarDatoFiscal").removeAttr("disabled");
                Swal.fire({   
                    title: "ERROR!",   
                    text: "Ocurrió un error, intente de nuevo...",
                    type: "error",
                    timer: 2000,   
                    showConfirmButton: false 
                });
            }
        }
    });
});

$("#FormGuardarConfiguracion").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarConfiguracion").attr("disabled", true);

    var formData = new FormData(this);
    var pagoCredito = 0; if($('#pagoCredito').is(':checked')){pagoCredito = 1;} formData.append("pagoCredito", pagoCredito);
    var pagoCronosPay = 0; if($('#pagoCronosPay').is(':checked')){pagoCronosPay = 1;} formData.append("pagoCronosPay", pagoCronosPay);
    var pagoPrepago = 0; if($('#pagoPrepago').is(':checked')){pagoPrepago = 1;} formData.append("pagoPrepago", pagoPrepago);
    var noReembolsables = 0; if($('#noReembolsables').is(':checked')){noReembolsables = 1;} formData.append("noReembolsables", noReembolsables);
    var accesoWeb = 0; if($('#accesoWeb').is(':checked')){accesoWeb = 1;} formData.append("accesoWeb", accesoWeb);
    var naturframe = 0; if($('#naturframe').is(':checked')){naturframe = 1;} formData.append("naturframe", naturframe);
    var canalWeb = 0; if($('#canalWeb').is(':checked')){canalWeb = 1;} formData.append("canalWeb", canalWeb);
    var canalMbp = 0; if($('#canalMbp').is(':checked')){canalMbp = 1;} formData.append("canalMbp", canalMbp);
    var canalGrupos = 0; if($('#canalGrupos').is(':checked')){canalGrupos = 1;} formData.append("canalGrupos", canalGrupos);
    var canalExpoViaja = 0; if($('#canalExpoViaja').is(':checked')){canalExpoViaja = 1;} formData.append("canalExpoViaja", canalExpoViaja);
    var canalBloqueoNaturleon = 0; if($('#canalBloqueoNaturleon').is(':checked')){canalBloqueoNaturleon = 1;} formData.append("canalBloqueoNaturleon", canalBloqueoNaturleon);
    var canalBloqueoAgencias = 0; if($('#canalBloqueoAgencias').is(':checked')){canalBloqueoAgencias = 1;} formData.append("canalBloqueoAgencias", canalBloqueoAgencias);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtAgencias/Configuracion',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnGuardarConfiguracion").removeAttr("disabled");
                Swal.fire({   
                    title: "¡SE HA GUARDADO CORRECTAMENTE!",   
                    text: "Espere un momento por favor...",
                    type: "success",
                    timer: 2000,   
                    showConfirmButton: false 
                });
                setTimeout(function(){
                location.reload();
                }, 2000);
            }else{
                $("#btnGuardarConfiguracion").removeAttr("disabled");
                Swal.fire({   
                    title: "ERROR!",   
                    text: "Ocurrió un error, intente de nuevo...",
                    type: "error",
                    timer: 2000,   
                    showConfirmButton: false 
                });
            }
        }
    });
});

function VerDatosAgencia(id){
    $.ajax({
        type: "POST",
        url: base_url + 'ExtAgencias/DataAgencia',
        dataType: "json",
        data:  {
            id,
        },
        success: function(data){
            // console.log(data.agencia);
            if(data.msg != 'Error'){
                for (var i = 0; i < data.agencia.length; i++) {
                    $("#displayIdAgencia").text(data.agencia[i].id_agencia);
                    $("#displayNombreComercial").text(data.agencia[i].nombre_agencia);
                    $("#displayRenatu").text(data.agencia[i].registro_agencia);
                    $("#displayPlaza").text(data.agencia[i].plaza_agencia);
                    $("#displayPais").text(data.agencia[i].pais_agencia);
                    $("#displayEstado").text(data.agencia[i].estado_agencia);
                    $("#displayMunicipio").text(data.agencia[i].municipio_agencia);
                    $("#displayCodigoPostal").text(data.agencia[i].codigopostal_agencia);
                    $("#displayCalle").text(data.agencia[i].callenum_agencia);
                    $("#displayColonia").text(data.agencia[i].colonia_agencia);
                    $("#displayTelefonoPrincipal").text(data.agencia[i].telefono1_agencia);
                    $("#displayTelefonoAdicional").text(data.agencia[i].telefono2_agencia);
                    $("#displayMovil1").text(data.agencia[i].movil1_agencia);
                    $("#displayMovil2").text(data.agencia[i].movil2_agencia);
                    $("#displayOtrosDatos").text(data.agencia[i].observaciones_agencia);
                    $("#displayFechaSolicitud").text(formatearFechaJSON(data.agencia[i].fechahora_alta_agencia));
                }
                for (var i = 0; i < data.usuarios.length; i++) {
                    $("#displayPersonaContacto").text(data.usuarios[i].nombre_usuario);
                    $("#displayEmail").text(data.usuarios[i].email_usuario);
                }
                for (var i = 0; i < data.fiscales.length; i++) {
                    $("#displayFacturacionRazonSocial").text(data.fiscales[i].razon_social_fiscal);
                    $("#displayFacturacionRfc").text(data.fiscales[i].rfc_fiscal);
                    $("#displayFacturacionCalle").text(data.fiscales[i].callenum_fiscal);
                    $("#displayFacturacionColonia").text(data.fiscales[i].colonia_fiscal);
                    $("#displayFacturacionCodigoPostal").text(data.fiscales[i].cp_fiscal);
                    $("#displayFacturacionEmail").text(data.fiscales[i].email_fiscal);
                    $("#displayFacturacionPais").text(data.fiscales[i].pais_fiscal);
                    $("#displayFacturacionEstado").text(data.fiscales[i].estado_fiscal);
                    $("#displayFacturacionMunicipio").text(data.fiscales[i].municipio_fiscal);
                    $("#displayTelefonoPrincipalFacturacion").text(data.fiscales[i].telefono1_fiscal);
                    $("#displayTelefonoAdicionalFacturacion").text(data.fiscales[i].telefono2_fiscal);
                    $("#displayMovil1Facturacion").text(data.fiscales[i].movil1_fiscal);
                    $("#displayMovil2Facturacion").text(data.fiscales[i].movil2_fiscal);
                    $("#displayFacturacionContacto").text(data.fiscales[i].encargado_fiscal);
                }
                $("#divDocumentos").empty();
                for (var i = 0; i < data.documentos.length; i++) {
                    const nombre = data.documentos[i].nombre_oficial_documento;
                    const enlace = base_url + data.documentos[i].archivo_documento;
                    var link = "";
                    link = "<div class='col-md-6 mb-2'><a href='"+enlace+"' download><button class='btn btn-block btn-primary'>"+nombre+"</button></a></div>";
                    $("#divDocumentos").append(link);
                }
                
                $('#modalDatosSolicitudAgencia').modal('show');
            }
            
        }
    });
}

$("#btnAceptarSolicitud").on("click", function(e) {
    e.preventDefault();
    const agencia = $("#displayIdAgencia").text();

    $("#btnAceptarSolicitud").attr("disabled", true);
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Estás a punto de aceptar la solicitud de la agencia...",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'De acuerdo',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: base_url + 'ExtAgencias/AceptarSolicitud',
                data:  {
                    agencia: agencia
                },
                success: function(data){
                    if(data=='Success'){
                        $("#btnAceptarSolicitud").removeAttr("disabled");
                        Swal.fire({   
                            title: "¡Aceptaste la solicitud de la agencia!",   
                            text: "Es necesario ir a administrar la agencia para configurarla.",
                            type: "success",
                            timer: 4000,   
                            showConfirmButton: false 
                        });
                        setTimeout(function(){
                            location.reload();
                        }, 4000);
                    }else if(data=='Error'){
                        $("#btnAceptarSolicitud").removeAttr("disabled");
                        Swal.fire(
                          'Error',
                          '¡Ocurrió un error, favor de intentarlo de nuevo!',
                          'error'
                        )
                    }
                }
            });
        }else{
            $("#btnAceptarSolicitud").removeAttr("disabled");
        }
    })
});

function btnRechazarSolicitud(){
    const agencia = $("#displayIdAgencia").text();
    const observaciones = $("#txtObservacionesRechazarEliminar").val();

    $("#btnRechazarSolicitud").attr("disabled", true);

    Swal.fire({
        title: '¿Estás seguro?',
        text: "Enviarás el feedback del porque se rechazó la solicitud, la agencia tendrá la opción de atender tus observaciones.",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'De acuerdo',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: base_url + 'ExtAgencias/RechazarSolicitud',
                data:  {
                    agencia: agencia,
                    observaciones: observaciones
                },
                success: function(data){
                    if(data=='Success'){
                        $("#btnRechazarSolicitud").removeAttr("disabled");
                        Swal.fire({   
                            title: "!Rechazaste la solicitud de la agencia!",   
                            text: "Se enviará un enlace para que la agencia tenga la oportunidad de atender las observaciones enviadas.",
                            type: "success",
                            timer: 4000,   
                            showConfirmButton: false 
                        });
                        setTimeout(function(){
                            location.reload();
                        }, 4000);
                    }else if(data=='Error'){
                        $("#btnRechazarSolicitud").removeAttr("disabled");
                        Swal.fire(
                          'Error',
                          '¡Ocurrió un error, favor de intentarlo de nuevo!',
                          'error'
                        )
                    }
                }
            });
        }else{
            $("#btnRechazarSolicitud").removeAttr("disabled");
        }
    })
}

function btnEliminarSolicitud(){
    const agencia = $("#displayIdAgencia").text();
    const observaciones = $("#txtObservacionesRechazarEliminar").val();

    $("#btnEliminarSolicitud").attr("disabled", true);

    Swal.fire({
        title: '¿Estás seguro?',
        text: "Estás a punto de eliminar la solicitud. Se perderán todos los registros relacionados a la agencia.",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'De acuerdo',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: base_url + 'ExtAgencias/EliminarSolicitud',
                data:  {
                    agencia: agencia,
                    observaciones: observaciones
                },
                success: function(data){
                    if(data=='Success'){
                        $("#btnEliminarSolicitud").removeAttr("disabled");
                        Swal.fire({   
                            title: "!Se ha eliminado la solicitud de la agencia!",   
                            text: "",
                            type: "success",
                            timer: 4000,   
                            showConfirmButton: false 
                        });
                        setTimeout(function(){
                            location.reload();
                        }, 4000);
                    }else if(data=='Error'){
                        $("#btnEliminarSolicitud").removeAttr("disabled");
                        Swal.fire(
                          'Error',
                          '¡Ocurrió un error, favor de intentarlo de nuevo!',
                          'error'
                        )
                    }
                }
            });
        }else{
            $("#btnEliminarSolicitud").removeAttr("disabled");
        }
    })
}

function RechazarEliminarSolicitudModal(tipo){
    $("#modalFooterRechazarEliminar").empty();

    if(tipo == 1){ //Rechazar
        $("#tituloModalRechazarEliminar").text("Feedback Rechazar Agencia");
        $("#modalFooterRechazarEliminar").append('<button id="btnRechazarSolicitud" onclick="btnRechazarSolicitud()" title="Rechazar Solicitud" type="button" class="btn btn-warning font-weight-bold">RECHAZAR</button>');
    }else{ //Eliminar
        $("#tituloModalRechazarEliminar").text("Feedback Eliminación Agencia");
        $("#modalFooterRechazarEliminar").append('<button id="btnEliminarSolicitud" onclick="btnEliminarSolicitud()" title="Eliminar Solicitud" type="button" class="btn btn-danger font-weight-bold">ELIMINAR</button>');
    }

    $('#modalRechazarEliminarSolicitudAgencia').modal('show');

    $('#txtObservacionesRechazarEliminar').focus();
}

function actualizarTotalRegistros(tabla,span) {
    var total = tabla.rows({ search: 'applied' }).count();
    $('#'+span).text('Total: ' + total);
}

$('#selectPlazasAgregarAgencias').on('change', function() {
    var plazaSeleccionada = $(this).val();
    var tablaAgencias = $('#tablaAgregarAgencias').DataTable();
    var span = "totalRegistrosAgregarAgencias";

    if(plazaSeleccionada === "0"){
        tablaAgencias.column(3).search('').draw();
    }else{
        tablaAgencias.column(3).search(plazaSeleccionada, true, false).draw();
    }
    actualizarTotalRegistros(tablaAgencias,span);
});

$('#selectPlazasAdministrarAgencias').on('change', function() { 
    var plazaSeleccionada = $(this).val();
    var tablaAgencias = $('#tablaAdministrarAgencias').DataTable();
    var span = "totalRegistrosAdministrarAgencias";

    if(plazaSeleccionada === "0"){
        tablaAgencias.column(3).search('').draw();
    }else{
        tablaAgencias.column(3).search(plazaSeleccionada, true, false).draw();
    }
    actualizarTotalRegistros(tablaAgencias,span);
});

function formatearFechaJSON(cadenaFecha) {
  const fecha = new Date(cadenaFecha);

  const dia = String(fecha.getDate()).padStart(2, '0');
  const mes = String(fecha.getMonth() + 1).padStart(2, '0');
  const anio = fecha.getFullYear();

  let horas = fecha.getHours();
  const minutos = String(fecha.getMinutes()).padStart(2, '0');
  const ampm = horas >= 12 ? 'PM' : 'AM';

  horas = horas % 12;
  horas = horas ? String(horas).padStart(2, '0') : 12;

  return `${dia}/${mes}/${anio} ${horas}:${minutos} ${ampm}`;
}