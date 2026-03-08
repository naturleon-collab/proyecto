// $(document).ready(function() {
//     $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
//         if (e.target.id === 'datos-fiscales-tab') {
//             const datosGeneralesTab = $('#datosGenerales');
//             let isValid = true;
//             datosGeneralesTab.find('[required]').each(function() {
//                 if (!$(this).val() || $(this).val() == 0) {
//                     isValid = false;
//                     $(this).addClass('is-invalid');
//                 } else {
//                     $(this).removeClass('is-invalid');
//                 }
//             });

//             if (!isValid) {
//                 e.preventDefault();
//                 Swal.fire({   
//                     title: "¡Error!",   
//                     text: "Por favor, completa todos los campos obligatorios en la sección actual antes de continuar.",
//                     type: "error"
//                 });
//                 datosGeneralesTab.find('.is-invalid').first().focus();
//             }
//         }
//     });
//     $('#datosGenerales').on('input change', 'input, select', function() {
//         if ($(this).val()) {
//             $(this).removeClass('is-invalid');
//         }
//     });
// });

$("#formAgregarHotel").submit(function (e) {
    e.preventDefault();
    $("#btnAgregarHotel").attr("disabled", true);

    var formData = new FormData(this);
    var status = 0; var expo = 0; var mbp = 0; var naturcharter = 0; var solobus = 0; var traslado = 0;
    if($('#statushotel').is(':checked')) {status = 1;}
    if($('#expohotel').is(':checked')) {expo = 1;}
    if($('#mbphotel').is(':checked')) {mbp = 1;}
    if($('#naturcharterhotel').is(':checked')) {naturcharter = 1;}
    if($('#solobushotel').is(':checked')) {solobus = 1;}
    if($('#trasladohotel').is(':checked')) {traslado = 1;}
    formData.append("status", status);
    formData.append("expo", expo);
    formData.append("mbp", mbp);
    formData.append("naturcharter", naturcharter);
    formData.append("solobus", solobus);
    formData.append("traslado", traslado);

    var categoria = $('input[name="categoriatipo"]:checked').val();
    formData.append("categoria", categoria);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/AgregarHotel',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnAgregarHotel").removeAttr("disabled");
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
                $("#btnAgregarHotel").removeAttr("disabled");
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

$('#selectDestinoAgregarHoteles').on('change', function() {
    var valor = $(this).val();
    console.log(valor);
    var tabla = $('#tablaAgregarHoteles').DataTable();
    var span = "totalRegistrosAgregarHoteles";

    if(valor === "0"){
        tabla.column(2).search('').draw();
    }else{
        tabla.column(2).search(valor, true, false).draw();
    }
    actualizarTotalRegistros(tabla,span);
});

function AdministrarHotel(id){
    const fecha1 = new Date();
    const fecha2 = new Date();

    fecha2.setDate(fecha2.getDate() + 31);

    const formatDate2 = (date) => {
        const year = date.getFullYear();
        const month = (date.getMonth() + 1).toString().padStart(2, '0');
        const day = date.getDate().toString().padStart(2, '0');
        return `${year}-${month}-${day}`;
    };

    const fecha1Formatted = formatDate2(fecha1);
    const fecha2Formatted = formatDate2(fecha2);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/SaveID',
        data:  {
            id: id
        },
        success: function(data){
            if(data=='Success'){
                window.location.href = base_url + "ExtHoteles/Administrar?fechainicial="+fecha1Formatted+"&fechafinal="+fecha2Formatted;
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

$('#selectDestinoAdministrarHoteles').on('change', function() {
    var valor = $(this).val();
    console.log(valor);
    var tabla = $('#tablaAdministrarHoteles').DataTable();
    var span = "totalRegistrosAdministrarHoteles";

    if(valor === "0"){
        tabla.column(2).search('').draw();
    }else{
        tabla.column(2).search(valor, true, false).draw();
    }
    actualizarTotalRegistros(tabla,span);
});

$("#formDatosGeneralesHotel").submit(function (e) {
    e.preventDefault();
    $("#btnDatosGeneralesHotel").attr("disabled", true);

    var formData = new FormData(this);
    var status = 0; var expo = 0; var mbp = 0; var naturcharter = 0; var solobus = 0; var traslado = 0;
    if($('#statushotel').is(':checked')) {status = 1;}
    if($('#expohotel').is(':checked')) {expo = 1;}
    if($('#mbphotel').is(':checked')) {mbp = 1;}
    if($('#naturcharterhotel').is(':checked')) {naturcharter = 1;}
    if($('#solobushotel').is(':checked')) {solobus = 1;}
    if($('#trasladohotel').is(':checked')) {traslado = 1;}
    formData.append("status", status);
    formData.append("expo", expo);
    formData.append("mbp", mbp);
    formData.append("naturcharter", naturcharter);
    formData.append("solobus", solobus);
    formData.append("traslado", traslado);

    var categoria = $('input[name="categoriatipo"]:checked').val();
    formData.append("categoria", categoria);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/DatosGenerales',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnDatosGeneralesHotel").removeAttr("disabled");
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
                $("#btnDatosGeneralesHotel").removeAttr("disabled");
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

$("#formDatosFiscalesHotel").submit(function (e) {
    e.preventDefault();
    $("#btnDatosFiscalesHotel").attr("disabled", true);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/DatosFiscales',
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnDatosFiscalesHotel").removeAttr("disabled");
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
                $("#btnDatosFiscalesHotel").removeAttr("disabled");
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

function AgregarNuevoUsuarioHotel(){
    const form = document.getElementById('formGuardarUsuarioHotel');
    form.reset();
    $("#idUsuario").val("0");
}

function EditarUsuarioHotel(id){
    $("#idUsuario").val(id);
    const db = "usuarios";
    const namefield = "id_usuario";
    const nameresult = "usuario";

    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/DataModificar',
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
                    if(data.usuario[i].status_usuario == 1){$("#statusUsuario").prop("checked", true);}
                }
            }
        }
    });
}

$("#formGuardarUsuarioHotel").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarUsuarioHotel").attr("disabled", true);

    var pwd = $("#passwordUsuario").val(); var confpwd = $("#confirmacionPasswordUsuario").val();

    var idusuario = $("#idUsuario").val();

    if(idusuario == 0 && (pwd.length == 0 || confpwd == 0)){
        $("#btnGuardarUsuarioHotel").removeAttr("disabled");
        Swal.fire({   
            title: "",   
            text: "Es necesario ingresar contraseña.",
            type: "warning",
            timer: 2000,   
            showConfirmButton: false 
        });
    }else{
        if(pwd != confpwd){
            $("#btnGuardarUsuarioHotel").removeAttr("disabled");
            Swal.fire({   
                title: "",   
                text: "Las contraseñas ingresadas no coinciden.",
                type: "warning",
                timer: 2000,   
                showConfirmButton: false 
            });
        }else{
            var formData = new FormData(this);
            var statusUsuario = 0;
            if($('#statusUsuario').is(':checked')) {
                statusUsuario = 1;
            }
            formData.append("statusUsuario", statusUsuario);


            $.ajax({
                type: "POST",
                url: base_url + 'ExtHoteles/Usuarios',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success:  function (data){
                    if(data == 'Success'){
                        $("#btnGuardarUsuarioHotel").removeAttr("disabled");
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
                        $("#btnGuardarUsuarioHotel").removeAttr("disabled");
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

function AgregarNuevaCuentaHotel(){
    const form = document.getElementById('FormGuardarCuentaHotel');
    form.reset();
    $("#idCuenta").val("0");
}

function EditarCuentaHotel(id){
    $("#idCuenta").val(id);
    const db = "hoteles_cuentas";
    const namefield = "id_cuenta";
    const nameresult = "cuenta";

    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/DataModificar2',
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

$("#FormGuardarCuentaHotel").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarCuentaHotel").attr("disabled", true);

    var formData = new FormData(this);
    var statusCuenta = 0;
    if($('#statusCuenta').is(':checked')) {
        statusCuenta = 1;
    }
    formData.append("statusCuenta", statusCuenta);


    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/Cuentas',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnGuardarCuentaHotel").removeAttr("disabled");
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
                $("#btnGuardarCuentaHotel").removeAttr("disabled");
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

function AgregarNuevaHabitacionHotel(){
    const form = document.getElementById('FormGuardarHabitacionHotel');
    form.reset();
    $("#idHabitacion").val("0");
}

$("#FormGuardarHabitacionHotel").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarHabitacionHotel").attr("disabled", true);

    var formData = new FormData(this);
    var statusHabitacion = 0;
    if($('#statusHabitacion').is(':checked')) {
        statusHabitacion = 1;
    }
    formData.append("statusHabitacion", statusHabitacion);


    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/Habitaciones',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnGuardarHabitacionHotel").removeAttr("disabled");
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
                $("#btnGuardarHabitacionHotel").removeAttr("disabled");
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

function EditarHabitacion(id){
    $("#idHabitacion").val(id);
    const db = "hoteles_habitaciones";
    const namefield = "id_habitacion";
    const nameresult = "habitacion";

    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/DataModificar2',
        dataType: "json",
        data:  {
            id,
            db,
            namefield,
            nameresult
        },
        success: function(data){
            if(data.msg != 'Error'){
                $("#nombreHabitacion").focus();
                for (var i = 0; i < data.habitacion.length; i++) {
                    $("#nombreHabitacion").val(data.habitacion[i].nombre_habitacion);
                    $("#tipoHabitacion").val(data.habitacion[i].tipo_habitacion);
                    $("#sencillaHabitacion").val(data.habitacion[i].cama_sencilla_habitacion);
                    $("#dobleHabitacion").val(data.habitacion[i].cama_doble_habitacion);
                    $("#queenHabitacion").val(data.habitacion[i].cama_queen_habitacion);
                    $("#kingHabitacion").val(data.habitacion[i].cama_king_habitacion);
                    $("#adultosMinimosHabitacion").val(data.habitacion[i].adultos_minimos_habitacion);
                    $("#adultosMaximosHabitacion").val(data.habitacion[i].adultos_maximos_habitacion);
                    $("#menoresMaximosHabitacion").val(data.habitacion[i].menores_maximos_habitacion);
                    $("#personasMaximasHabitacion").val(data.habitacion[i].personas_maximas_habitacion);
                    $("#resumenHabitacion").text(data.habitacion[i].resumen_habitacion);
                    $("#descripcionHabitacion").text(data.habitacion[i].descripcion_habitacion);
                    $("#serviciosHabitacion").text(data.habitacion[i].servicios_habitacion);
                    if(data.habitacion[i].status_habitacion == 1){$("#statusHabitacion").prop("checked", true);}
                }
            }
        }
    });
}

function GaleriaHabitacion(id,cuarto){
    $("#tituloGaleriaHabitacion").text("Galería habitación "+cuarto);
    $("#idHabitacionImagen").val(id);
    $("#nombreHabitacionImagen").val(cuarto);
    $("#galeriaHabitacion").modal('show');

    const db = "hoteles_habitaciones_imagenes";
    const namefield = "id_habitacion";
    const nameresult = "imagenes";

    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/DataModificar2',
        dataType: "json",
        data:  {
            id,
            db,
            namefield,
            nameresult
        },
        success: function(data){
            $('#tbodyImagenesHabitaciones').empty();
            if(data.msg != 'Error'){
                for (var i = 0; i < data.imagenes.length; i++) {
                    if(data.imagenes[i].status_imagen_habitacion == "1"){
                        //Activo
                        var color = 'bg-success';
                        var rowButton = '<button type="button" class="btn btn-danger" title="Desactivar Imagen" onclick="CambiarStatusImagen('+data.imagenes[i].id_imagen_habitacion+','+id+',0)"><i class="fas fa-times-circle"></i></button>';
                    }else{
                        //Inactivo
                        var color = 'bg-danger';
                        var rowButton = '<button type="button" class="btn btn-success" title="Activar Imagen" onclick="CambiarStatusImagen('+data.imagenes[i].id_imagen_habitacion+','+id+',1)"><i class="fas fa-check-circle"></i></button>';
                    }

                    var newRow = jQuery('<tr>'
                    +'<td class="align-middle text-center">'+ rowButton
                    +'</td><td class="align-middle '+color+' text-white text-center">'+ data.imagenes[i].nombre_imagen_habitacion
                    +'</td><td class="align-middle text-center"><img class="img-fluid" width="40%" src="'+ base_url + data.imagenes[i].archivo_imagen_habitacion
                    +'"></td></tr>');
                    jQuery('#tbodyImagenesHabitaciones').append(newRow);
                }
            }
        }
    });
}

$("#FormAgregarImagenesHabitacion").submit(function (e) {
    e.preventDefault();
    $("#btnAgregarImagenesHabitacion").attr("disabled", true);

    var formData = new FormData(this);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/ImagenesHabitaciones',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnAgregarImagenesHabitacion").removeAttr("disabled");
                Swal.fire({   
                    title: "¡SE HA GUARDADO CORRECTAMENTE!",   
                    text: "Espere un momento por favor...",
                    type: "success",
                    timer: 2000,   
                    showConfirmButton: false 
                });
                setTimeout(function(){
                    const form = document.getElementById('FormAgregarImagenesHabitacion');
                    form.reset();
                    $('#tbodyImagenesHabitaciones').empty();
                    const db = "hoteles_habitaciones_imagenes";
                    const namefield = "id_habitacion";
                    const nameresult = "imagenes";
                    let id = $("#idHabitacionImagen").val();

                    $.ajax({
                        type: "POST",
                        url: base_url + 'ExtHoteles/DataModificar2',
                        dataType: "json",
                        data:  {
                            id,
                            db,
                            namefield,
                            nameresult
                        },
                        success: function(data){
                            if(data.msg != 'Error'){
                                for (var i = 0; i < data.imagenes.length; i++) {
                                    if(data.imagenes[i].status_imagen_habitacion == "1"){
                                        //Activo
                                        var color = 'bg-success';
                                        var rowButton = '<button type="button" class="btn btn-danger" title="Desactivar Imagen" onclick="CambiarStatusImagen('+data.imagenes[i].id_imagen_habitacion+','+id+',0)"><i class="fas fa-times-circle"></i></button>';
                                    }else{
                                        //Inactivo
                                        var color = 'bg-danger';
                                        var rowButton = '<button type="button" class="btn btn-success" title="Activar Imagen" onclick="CambiarStatusImagen('+data.imagenes[i].id_imagen_habitacion+','+id+',1)"><i class="fas fa-check-circle"></i></button>';
                                    }

                                    var newRow = jQuery('<tr>'
                                    +'<td class="align-middle text-center">'+ rowButton
                                    +'</td><td class="align-middle '+color+' text-white text-center">'+ data.imagenes[i].nombre_imagen_habitacion
                                    +'</td><td class="align-middle text-center"><img class="img-fluid" width="40%" src="'+ base_url + data.imagenes[i].archivo_imagen_habitacion
                                    +'"></td></tr>');
                                    jQuery('#tbodyImagenesHabitaciones').append(newRow);
                                }
                            }
                        }
                    });
                }, 2000);
            }else{
                $("#btnAgregarImagenesHabitacion").removeAttr("disabled");
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

$("#formAdministrarInventario").submit(function (e) {
    e.preventDefault();
    $("#btnAdministrarInventario").attr("disabled", true);

    var formData = new FormData(this);

    const diasCheckeados = $('.checkboxdiasinventario:checked').map(function() {
        return $(this).val();
    }).get();

    formData.append("diasCheckeados", JSON.stringify(diasCheckeados));

    var band = true;

    let errores = [];

    if (diasCheckeados.length === 0) {
        errores.push("Error");
    }

    const esVacioOCero = (valor) => {
        if (typeof valor === 'string') {
            valor = valor.trim();
        }
        return valor === "" || valor === null || valor === undefined || valor == 0;
    };

    if (esVacioOCero($("#habitacionInventario").val())) {
        errores.push("Error");
    }
    if (esVacioOCero($("#planInventario").val())) {
        errores.push("Error");
    }
    if (esVacioOCero($("#fechaInicioInventario").val())) {
        errores.push("Error");
    }
    if (esVacioOCero($("#fechaFinInventario").val())) {
        errores.push("Error");
    }
    if (esVacioOCero($("#cantidadInventario").val()) || parseInt($("#cantidadInventario").val()) <= 0) {
        errores.push("Error");
    }
    if($("#fechaInicioInventario").val() > $("#fechaFinInventario").val()){
        errores.push("Error");
    }

    if (errores.length > 0) {
        band = false;
    }


    if(band === false){
        $("#btnAdministrarInventario").removeAttr("disabled");
        Swal.fire({   
            title: "¡ERROR!",   
            text: "Debes de llenar correctamente los campos.",
            type: "error",
            timer: 2000,   
            showConfirmButton: false 
        });
    }else{
        $.ajax({
            type: "POST",
            url: base_url + 'ExtHoteles/Inventario',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success:  function (data){
                if(data == 'Success'){
                    $("#btnAdministrarInventario").removeAttr("disabled");
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
                    $("#btnAdministrarInventario").removeAttr("disabled");
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

$("#BtnBuscarInventarioFechas").on("click", function(e) {
    e.preventDefault();
    var fechaInicio = $('#fechaInicioInventario').val();
    var fechaFin = $('#fechaFinInventario').val();
    if(fechaInicio < fechaFin){
        window.location.href = base_url + "ExtHoteles/Administrar?fechainicial="+fechaInicio+"&fechafinal="+fechaFin+"#inventario";
    }else{
        Swal.fire({   
            title: "¡ERROR!",   
            text: "Selecciona las fechas correctamente.",
            type: "error",
            timer: 2000,   
            showConfirmButton: false 
        });
    }
});

function AbrirCerrarFechasInventario(status){
    const diasCheckeados = $('.checkboxdiasinventario:checked').map(function() {
        return $(this).val();
    }).get();

    var diasSeleccionados = JSON.stringify(diasCheckeados);
    var habitacion = $("#habitacionInventario").val();
    var plan = $("#planInventario").val();
    var fechainicio = $("#fechaInicioInventario").val();
    var fechafin = $("#fechaFinInventario").val();

    var band = true;

    let errores = [];

    if (diasCheckeados.length === 0) {
        errores.push("Error");
    }

    const esVacioOCero = (valor) => {
        if (typeof valor === 'string') {
            valor = valor.trim();
        }
        return valor === "" || valor === null || valor === undefined || valor == 0;
    };

    if (esVacioOCero(habitacion)) {
        errores.push("Error");
    }
    if (esVacioOCero(plan)) {
        errores.push("Error");
    }
    if (esVacioOCero(fechainicio)) {
        errores.push("Error");
    }
    if (esVacioOCero(fechafin)) {
        errores.push("Error");
    }

    if (errores.length > 0) {
        band = false;
    }


    if(band === false){
        Swal.fire({   
            title: "¡ERROR!",   
            text: "Debes de llenar correctamente los campos.",
            type: "error",
            timer: 2000,   
            showConfirmButton: false 
        });
    }else{
        $.ajax({
            type: "POST",
            url: base_url + 'ExtHoteles/AbrirCerrarFechasInventario',
            data:  {
                diasSeleccionados,
                habitacion,
                plan,
                fechainicio,
                fechafin,
                status
            },
            success:  function (data){
                if(data == 'Success'){
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

function formatDate(dateString) {
    var parts = dateString.split('/');
    var day = parts[0];
    var month = parts[1];
    var year = parts[2];
    
    return year + '-' + month + '-' + day;
}

$('#planTarifa').on('change', function() {
    var valor = $(this).val();
    if(valor === "3"){
        $(".divTarifasPlanDefault").prop("hidden",true);
        $(".divTarifasPlanAL").prop("hidden",false);
    }else{
        $(".divTarifasPlanDefault").prop("hidden",false);
        $(".divTarifasPlanAL").prop("hidden",true);
    }
});

$("#formAdministrarTarifas").submit(function (e) {
    e.preventDefault();
    $("#btnAdministrarTarifas").attr("disabled", true);

    var formData = new FormData(this);

    const diasCheckeados = $('.checkboxdiastarifas:checked').map(function() {
        return $(this).val();
    }).get();

    formData.append("diasCheckeados", JSON.stringify(diasCheckeados));

    var band = true;

    let errores = [];

    if (diasCheckeados.length === 0) {
        errores.push("Error");
    }

    const esVacioOCero = (valor) => {
        if (typeof valor === 'string') {
            valor = valor.trim();
        }
        return valor === "" || valor === null || valor === undefined || valor == 0;
    };

    if (esVacioOCero($("#habitacionTarifa").val())) {
        errores.push("Error");
    }
    if (esVacioOCero($("#planTarifa").val())) {
        errores.push("Error");
    }
    if (esVacioOCero($("#fechaInicioTarifa").val())) {
        errores.push("Error");
    }
    if (esVacioOCero($("#fechaFinTarifa").val())) {
        errores.push("Error");
    }

    if($("#fechaInicioTarifa").val() > $("#fechaFinTarifa").val()){
        errores.push("Error");
    }

    if ($("#planTarifa").val() == "3" && (parseInt($("#tarifaPax1").val()) <= 0 || parseInt($("#tarifaPax2").val()) <= 0 || parseInt($("#tarifaPax3").val()) <= 0 || parseInt($("#tarifaPax4").val()) <= 0
        || parseInt($("#tarifaPax5").val()) <= 0 || parseInt($("#tarifaPax6").val()) <= 0 || parseInt($("#tarifaMenor").val()) <= 0 || parseInt($("#tarifaJunior").val()) <= 0)) {
        errores.push("Error");
    }

    if ($("#planTarifa").val() != "3" && (parseInt($("#tarifaDoble").val()) <= 0 || parseInt($("#tarifaPersonaAdicional").val()) <= 0 ||  parseInt($("#tarifaMenor").val()) <= 0 || parseInt($("#tarifaJunior").val()) <= 0)) {
        errores.push("Error");
    }

    if (errores.length > 0) {
        band = false;
    }


    if(band === false){
        $("#btnAdministrarTarifas").removeAttr("disabled");
        Swal.fire({   
            title: "¡ERROR!",   
            text: "Debes de llenar correctamente los campos.",
            type: "error",
            timer: 2000,   
            showConfirmButton: false 
        });
    }else{
        $.ajax({
            type: "POST",
            url: base_url + 'ExtHoteles/Tarifas',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success:  function (data){
                if(data == 'Success'){
                    $("#btnAdministrarTarifas").removeAttr("disabled");
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
                    $("#btnAdministrarTarifas").removeAttr("disabled");
                    Swal.fire({   
                        title: "¡ERROR!",   
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

$("#BtnBuscarTarifasFechas").on("click", function(e) {
    e.preventDefault();
    var fechaInicio = $('#fechaInicioTarifas').val();
    var fechaFin = $('#fechaFinTarifas').val();
    if(fechaInicio < fechaFin){
        window.location.href = base_url + "ExtHoteles/Administrar?fechainicial="+fechaInicio+"&fechafinal="+fechaFin+"#tarifas";
    }else{
        Swal.fire({   
            title: "¡ERROR!",   
            text: "Selecciona las fechas correctamente.",
            type: "error",
            timer: 2000,   
            showConfirmButton: false 
        });
    }
});

function AgregarNuevaPromocion(){
    const form = document.getElementById('formAdministrarPromociones');
    form.reset();
    $("#idPromocion").val("0");
}

$("#formAdministrarPromociones").submit(function (e) {
    e.preventDefault();
    $("#btnAdministrarPromociones").attr("disabled", true);

    var formData = new FormData(this);

    var band = true;

    let errores = [];

    const esVacioOCero = (valor) => {
        if (typeof valor === 'string') {
            valor = valor.trim();
        }
        return valor === "" || valor === null || valor === undefined || valor == 0;
    };

    if (esVacioOCero($("#nombrePromocion").val())) {
        errores.push("Error");
    }

    if (esVacioOCero($("#habitacionPromocion").val())) {
        errores.push("Error");
    }

    if (esVacioOCero($("#planPromocion").val())) {
        errores.push("Error");
    }

    if (esVacioOCero($("#fechaInicioBookingWindow").val())) {
        errores.push("Error");
    }

    if (esVacioOCero($("#fechaFinBookingWindow").val())) {
        errores.push("Error");
    }

    if (esVacioOCero($("#fechaInicioTravelWindow").val())) {
        errores.push("Error");
    }

    if (esVacioOCero($("#fechaFinTravelWindow").val())) {
        errores.push("Error");
    }

    if($("#fechaInicioBookingWindow").val() > $("#fechaFinBookingWindow").val()){
        errores.push("Error");
    }

    if($("#fechaInicioTravelWindow").val() > $("#fechaFinTravelWindow").val()){
        errores.push("Error");
    }

    if ($("#tipoPromocion").val() == "6" && parseInt($("#periodoPromocion").val()) <= 0) {
        errores.push("Error");
    }

    if (errores.length > 0) {
        band = false;
    }


    if(band === false){
        $("#btnAdministrarPromociones").removeAttr("disabled");
        Swal.fire({   
            title: "¡ERROR!",   
            text: "Debes de llenar correctamente los campos.",
            type: "error",
            timer: 2000,   
            showConfirmButton: false 
        });
    }else{
        $.ajax({
            type: "POST",
            url: base_url + 'ExtHoteles/Promociones',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success:  function (data){
                if(data == 'Success'){
                    $("#btnAdministrarPromociones").removeAttr("disabled");
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
                    $("#btnAdministrarPromociones").removeAttr("disabled");
                    Swal.fire({   
                        title: "¡ERROR!",   
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

function EditarPromocion(id){
    $("#idPromocion").val(id);
    const db = "hoteles_promociones";
    const namefield = "id_promocion";
    const nameresult = "promocion";

    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/DataModificar2',
        dataType: "json",
        data:  {
            id,
            db,
            namefield,
            nameresult
        },
        success: function(data){
            if(data.msg != 'Error'){
                $("#nombrePromocion").focus();
                for (var i = 0; i < data.promocion.length; i++) {
                    $("#nombrePromocion").val(data.promocion[i].nombre_promocion);
                    $("#valorPromocion").val(data.promocion[i].valor_promocion);
                    $("#periodoPromocion").val(data.promocion[i].periodo_promocion);
                    $("#fechaInicioBookingWindow").val(data.promocion[i].fechainicio_booking_promocion);
                    $("#fechaFinBookingWindow").val(data.promocion[i].fechafin_booking_promocion);
                    $("#fechaInicioTravelWindow").val(data.promocion[i].fechainicio_travel_promocion);
                    $("#fechaFinTravelWindow").val(data.promocion[i].fechafin_travel_promocion);
                    $('#habitacionPromocion option[value='+data.promocion[i].habitacion_promocion+']').prop('selected',true);
                    $('#planPromocion option[value='+data.promocion[i].plan_promocion+']').prop('selected',true);
                    $('#tipoPromocion option[value='+data.promocion[i].tipo_promocion+']').prop('selected',true);
                }
            }
        }
    });
}

$("#formAdministrarRestriccion").submit(function (e) {
    e.preventDefault();
    $("#btnAdministrarRestriccion").attr("disabled", true);

    var formData = new FormData(this);

    const diasCheckeados = $('.checkboxdiasrestriccion:checked').map(function() {
        return $(this).val();
    }).get();

    formData.append("diasCheckeados", JSON.stringify(diasCheckeados));

    var band = true;

    let errores = [];

    if (diasCheckeados.length === 0) {
        errores.push("Error");
    }

    const esVacioOCero = (valor) => {
        if (typeof valor === 'string') {
            valor = valor.trim();
        }
        return valor === "" || valor === null || valor === undefined || valor == 0;
    };

    if (esVacioOCero($("#habitacionRestriccion").val())) {
        errores.push("Error");
    }
    if (esVacioOCero($("#planRestriccion").val())) {
        errores.push("Error");
    }
    if (esVacioOCero($("#tipoRestriccion").val())) {
        errores.push("Error");
    }
    if (esVacioOCero($("#fechaInicioRestriccion").val())) {
        errores.push("Error");
    }
    if (esVacioOCero($("#fechaFinRestriccion").val())) {
        errores.push("Error");
    }
    if ((esVacioOCero($("#diasRestriccion").val()) || parseInt($("#diasRestriccion").val()) <= 0)  && ($("#tipoRestriccion").val() == 1 || $("#tipoRestriccion").val() == 2)) {
        errores.push("Error");
    }
    if($("#fechaInicioRestriccion").val() > $("#fechaFinRestriccion").val()){
        errores.push("Error");
    }

    if (errores.length > 0) {
        band = false;
    }


    if(band === false){
        $("#btnAdministrarRestriccion").removeAttr("disabled");
        Swal.fire({   
            title: "¡ERROR!",   
            text: "Debes de llenar correctamente los campos.",
            type: "error",
            timer: 2000,   
            showConfirmButton: false 
        });
    }else{
        $.ajax({
            type: "POST",
            url: base_url + 'ExtHoteles/Restricciones',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success:  function (data){
                if(data == 'Success'){
                    $("#btnAdministrarRestriccion").removeAttr("disabled");
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
                    $("#btnAdministrarRestriccion").removeAttr("disabled");
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

$("#BtnBuscarRestriccionesFechas").on("click", function(e) {
    e.preventDefault();
    var fechaInicio = $('#fechaInicioRestricciones').val();
    var fechaFin = $('#fechaFinRestricciones').val();
    if(fechaInicio < fechaFin){
        window.location.href = base_url + "ExtHoteles/Administrar?fechainicial="+fechaInicio+"&fechafinal="+fechaFin+"#restricciones";
    }else{
        Swal.fire({   
            title: "¡ERROR!",   
            text: "Selecciona las fechas correctamente.",
            type: "error",
            timer: 2000,   
            showConfirmButton: false 
        });
    }
});

$("#FormAgregarImagenesHotel").submit(function (e) {
    e.preventDefault();
    $("#btnAgregarImagenesHotel").attr("disabled", true);

    var formData = new FormData(this);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/ImagenesHotel',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function (data) {
            if (data.trim() == 'Success') {
                $("#btnAgregarImagenesHotel").removeAttr("disabled");
                Swal.fire({
                    title: "¡SE HA GUARDADO CORRECTAMENTE!",
                    text: "Espere un momento por favor...",
                    type: "success",
                    timer: 2000,
                    showConfirmButton: false
                });
                
                setTimeout(function () {
                    // Limpieza del formulario
                    document.getElementById('FormAgregarImagenesHotel').reset();
                    
                    // Aquí puedes añadir la lógica para recargar la tabla de imágenes del hotel
                    // si tienes una similar a la de habitaciones (DataModificar2)
                    location.reload(); 
                }, 2000);
            } else {
                $("#btnAgregarImagenesHotel").removeAttr("disabled");
                Swal.fire({
                    title: "ERROR!",
                    text: data, // Mostramos el error que devuelva el servidor
                    type: "error",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        }
    });
});

$("#FormMbpDestino").submit(function (e) {
    e.preventDefault();
    $("#btnMbpDestino").attr("disabled", true);

    var formData = new FormData(this);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/DestinoMBP',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnMbpDestino").removeAttr("disabled");
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
                $("#btnMbpDestino").removeAttr("disabled");
                Swal.fire({   
                    title: "¡ERROR!",   
                    text: "Ocurrió un error, intente de nuevo...",
                    type: "error",
                    timer: 2000,   
                    showConfirmButton: false 
                });
            }
        }
    });
});

$("#FormMbpHotel").submit(function (e) {
    e.preventDefault();
    $("#btnMbpHotel").attr("disabled", true);

    var formData = new FormData(this);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/HotelMBP',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnMbpHotel").removeAttr("disabled");
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
                $("#btnMbpHotel").removeAttr("disabled");
                Swal.fire({   
                    title: "¡ERROR!",   
                    text: "Ocurrió un error, intente de nuevo...",
                    type: "error",
                    timer: 2000,   
                    showConfirmButton: false 
                });
            }
        }
    });
});

$("#FormMbpFotos").submit(function (e) {
    e.preventDefault();
    $("#btnAgregarMbpFotos").attr("disabled", true);

    var formData = new FormData(this);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/FotosMBP',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnAgregarMbpFotos").removeAttr("disabled");
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
                $("#btnAgregarMbpFotos").removeAttr("disabled");
                Swal.fire({   
                    title: "¡ERROR!",   
                    text: "Ocurrió un error, intente de nuevo...",
                    type: "error",
                    timer: 2000,   
                    showConfirmButton: false 
                });
            }
        }
    });
});

$("#FormMbpVideos").submit(function (e) {
    e.preventDefault();
    $("#btnAgregarMbpVideos").attr("disabled", true);

    var formData = new FormData(this);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/VideosMBP',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnAgregarMbpVideos").removeAttr("disabled");
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
                $("#btnAgregarMbpVideos").removeAttr("disabled");
                Swal.fire({   
                    title: "¡ERROR!",   
                    text: "Ocurrió un error, intente de nuevo...",
                    type: "error",
                    timer: 2000,   
                    showConfirmButton: false 
                });
            }
        }
    });
});

$("#FormMbpPaquetes").submit(function (e) {
    e.preventDefault();
    $("#btnAgregarMbpPaquetes").attr("disabled", true);

    var formData = new FormData(this);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtHoteles/PaquetesMBP',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnAgregarMbpPaquetes").removeAttr("disabled");
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
                $("#btnAgregarMbpPaquetes").removeAttr("disabled");
                Swal.fire({   
                    title: "¡ERROR!",   
                    text: "Ocurrió un error, intente de nuevo...",
                    type: "error",
                    timer: 2000,   
                    showConfirmButton: false 
                });
            }
        }
    });
});

function CambiarStatusImagen(idimagen,idhabitacion,status){

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
                url: base_url + 'ExtHoteles/CambiarStatusImagenesHabitaciones',
                data:  {
                    id: idimagen,
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
                            $('#tbodyImagenesHabitaciones').empty();
                            const db = "hoteles_habitaciones_imagenes";
                            const namefield = "id_habitacion";
                            const nameresult = "imagenes";
                            let id = idhabitacion;

                            $.ajax({
                                type: "POST",
                                url: base_url + 'ExtHoteles/DataModificar2',
                                dataType: "json",
                                data:  {
                                    id,
                                    db,
                                    namefield,
                                    nameresult
                                },
                                success: function(data){
                                    if(data.msg != 'Error'){
                                        for (var i = 0; i < data.imagenes.length; i++) {
                                            if(data.imagenes[i].status_imagen_habitacion == "1"){
                                                //Activo
                                                var color = 'bg-success';
                                                var rowButton = '<button type="button" class="btn btn-danger" title="Desactivar Imagen" onclick="CambiarStatusImagen('+data.imagenes[i].id_imagen_habitacion+','+id+',0)"><i class="fas fa-times-circle"></i></button>';
                                            }else{
                                                //Inactivo
                                                var color = 'bg-danger';
                                                var rowButton = '<button type="button" class="btn btn-success" title="Activar Imagen" onclick="CambiarStatusImagen('+data.imagenes[i].id_imagen_habitacion+','+id+',1)"><i class="fas fa-check-circle"></i></button>';
                                            }

                                            var newRow = jQuery('<tr>'
                                            +'<td class="align-middle text-center">'+ rowButton
                                            +'</td><td class="align-middle '+color+' text-white text-center">'+ data.imagenes[i].nombre_imagen_habitacion
                                            +'</td><td class="align-middle text-center"><img class="img-fluid" width="40%" src="'+ base_url + data.imagenes[i].archivo_imagen_habitacion
                                            +'"></td></tr>');
                                            jQuery('#tbodyImagenesHabitaciones').append(newRow);
                                        }
                                    }
                                }
                            });
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

function CambiarStatusDataHotel(id,status,idcol,statuscol,bd){
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
                url: base_url + 'ExtHoteles/CambiarStatus',
                data:  {
                    id: id,
                    status: status,
                    idcol: idcol,
                    statuscol: statuscol,
                    bd: bd,
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
                            title: "¡ERROR!",   
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