$("#formAgregarNaturFlight").submit(function (e) {
    e.preventDefault();
    $("#btnAgregarNaturFlight").attr("disabled", true);

    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url + 'ExtNaturflight/Agregar',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnAgregarNaturFlight").removeAttr("disabled");
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
                $("#btnAgregarNaturFlight").removeAttr("disabled");
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

function AdministrarNF(id){
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
        url: base_url + 'ExtNaturflight/SaveID',
        data:  {
            id: id
        },
        success: function(data){
            if(data=='Success'){
                window.location.href = base_url + "ExtNaturflight/Administrar?fechainicial="+fecha1Formatted+"&fechafinal="+fecha2Formatted;
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

function CambiarStatusNF(id,status){
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
                url: base_url + 'ExtNaturflight/CambiarStatus',
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

$("#formDatosGeneralesNaturFlight").submit(function (e) {
    e.preventDefault();
    $("#btnDatosGeneralesNaturFlight").attr("disabled", true);

    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url + 'ExtNaturflight/DatosGenerales',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnDatosGeneralesNaturFlight").removeAttr("disabled");
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
                $("#btnDatosGeneralesNaturFlight").removeAttr("disabled");
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

$("#formDatosFiscalesNaturFlight").submit(function (e) {
    e.preventDefault();
    $("#btnDatosFiscalesNaturFlight").attr("disabled", true);

    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url + 'ExtNaturflight/DatosFiscales',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnDatosFiscalesNaturFlight").removeAttr("disabled");
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
                $("#btnDatosFiscalesNaturFlight").removeAttr("disabled");
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

function AgregarNuevaCuentaNF(){
    const form = document.getElementById('FormGuardarCuentaNaturFlight');
    form.reset();
    $("#idCuentaNaturFlight").val("0");
}

$("#FormGuardarCuentaNaturFlight").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarCuentaNaturFlight").attr("disabled", true);

    var formData = new FormData(this);
    var statusCuentaNaturFlight = 0;
    if($('#statusCuentaNaturFlight').is(':checked')) {
        statusCuentaNaturFlight = 1;
    }
    formData.append("statusCuentaNaturFlight", statusCuentaNaturFlight);
    $.ajax({
        type: "POST",
        url: base_url + 'ExtNaturflight/Cuentas',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnGuardarCuentaNaturFlight").removeAttr("disabled");
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
                $("#btnGuardarCuentaNaturFlight").removeAttr("disabled");
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

function EditarCuentaNF(id){
    $("#idCuentaNaturFlight").val(id);
    const db = "naturflight_cuentas";
    const namefield = "id_cuenta";
    const nameresult = "cuenta";

    $.ajax({
        type: "POST",
        url: base_url + 'ExtNaturflight/DataModificar',
        dataType: "json",
        data:  {
            id,
            db,
            namefield,
            nameresult
        },
        success: function(data){
            if(data.msg != 'Error'){
                $("#aliasCuentaNaturFlight").focus();
                for (var i = 0; i < data.cuenta.length; i++) {
                    $("#aliasCuentaNaturFlight").val(data.cuenta[i].alias_cuenta);
                    $("#nombreCuentaNaturFlight").val(data.cuenta[i].nombre_cuenta);
                    $("#institucionCuentaNaturFlight").val(data.cuenta[i].institucion_cuenta);
                    $("#tipoCuentaNaturFlight").val(data.cuenta[i].tipo_cuenta);
                    $("#numCuentaNaturFlight").val(data.cuenta[i].numero_cuenta);
                    $("#clabeCuentaNaturFlight").val(data.cuenta[i].clabe_cuenta);
                    $("#observacionesCuentaNaturFlight").val(data.cuenta[i].observaciones_cuenta);
                    if(data.cuenta[i].estatus_cuenta == 1){$("#statusCuentaNaturFlight").prop("checked", true);}else{$("#statusCuentaNaturFlight").prop("checked", false);}
                }
            }
        }
    });
}

$("#FormGuardarRutas").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarRutas").attr("disabled", true);

    var formData = new FormData(this);
    var status = 0; var lunes = 0; var martes = 0; var miercoles = 0; var jueves = 0; var viernes = 0; var sabado = 0; var domingo = 0;
    if($('#statusRuta').is(':checked')) {status = 1;}
    if($('#LunesRuta').is(':checked')) {lunes = 1;}
    if($('#MartesRuta').is(':checked')) {martes = 1;}
    if($('#MiercolesRuta').is(':checked')) {miercoles = 1;}
    if($('#JuevesRuta').is(':checked')) {jueves = 1;}
    if($('#ViernesRuta').is(':checked')) {viernes = 1;}
    if($('#SabadoRuta').is(':checked')) {sabado = 1;}
    if($('#DomingoRuta').is(':checked')) {domingo = 1;}
    formData.append("status", status);
    formData.append("lunes", lunes);
    formData.append("martes", martes);
    formData.append("miercoles", miercoles);
    formData.append("jueves", jueves);
    formData.append("viernes", viernes);
    formData.append("sabado", sabado);
    formData.append("domingo", domingo);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtNaturflight/AdministrarRutas',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnGuardarRutas").removeAttr("disabled");
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
                $("#btnGuardarRutas").removeAttr("disabled");
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

function EditarRuta(id){
    $("#idRuta").val(id);
    const db = "naturflight_rutas";
    const namefield = "id_ruta";
    const nameresult = "ruta";

    $.ajax({
        type: "POST",
        url: base_url + 'ExtNaturflight/DataModificar',
        dataType: "json",
        data:  {
            id,
            db,
            namefield,
            nameresult
        },
        success: function(data){
            if(data.msg != 'Error'){
                $("#nombreRuta").focus();
                for (var i = 0; i < data.ruta.length; i++) {
                    $("#nombreRuta").val(data.ruta[i].nombre_ruta);
                    $('#aerolineaRuta option[value='+data.ruta[i].id_aerolinea+']').prop('selected',true);
                    $('#origenRuta option[value='+data.ruta[i].id_destino_origen+']').prop('selected',true);
                    $('#destinoRuta option[value='+data.ruta[i].id_destino_final+']').prop('selected',true);
                    if(data.ruta[i].frecuencia_lunes == 1){$("#LunesRuta").prop("checked", true);}else{$("#LunesRuta").prop("checked", false);}
                    if(data.ruta[i].frecuencia_martes == 1){$("#MartesRuta").prop("checked", true);}else{$("#MartesRuta").prop("checked", false);}
                    if(data.ruta[i].frecuencia_miercoles == 1){$("#MiercolesRuta").prop("checked", true);}else{$("#MiercolesRuta").prop("checked", false);}
                    if(data.ruta[i].frecuencia_jueves == 1){$("#JuevesRuta").prop("checked", true);}else{$("#JuevesRuta").prop("checked", false);}
                    if(data.ruta[i].frecuencia_viernes == 1){$("#ViernesRuta").prop("checked", true);}else{$("ViernesRuta").prop("checked", false);}
                    if(data.ruta[i].frecuencia_sabado == 1){$("#SabadoRuta").prop("checked", true);}else{$("#SabadoRuta").prop("checked", false);}
                    if(data.ruta[i].frecuencia_domingo == 1){$("#DomingoRuta").prop("checked", true);}else{$("#DomingoRuta").prop("checked", false);}
                    if(data.ruta[i].estatus == 1){$("#statusRuta").prop("checked", true);}else{$("#statusRuta").prop("checked", false);}
                }
            }
        }
    });
}

$("#formAdministrarTarifasNaturflight").submit(function (e) {
    e.preventDefault();
    $("#btnAdministrarTarifasNaturflight").attr("disabled", true);

    var formData = new FormData(this);

    const diasCheckeados = $('.checkboxdiastarifasNaturFlight:checked').map(function() {
        return $(this).val();
    }).get();

    formData.append("diasCheckeados", JSON.stringify(diasCheckeados));

    var band = true;

    let errores = [];

    if (diasCheckeados.length === 0) {
        errores.push("Error");
    }

    if(band === false){
        $("#btnAdministrarTarifasNaturflight").removeAttr("disabled");
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
            url: base_url + 'ExtNaturflight/Tarifas',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success:  function (data){
                if(data == 'Success'){
                    $("#btnAdministrarTarifasNaturflight").removeAttr("disabled");
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
                    $("#btnAdministrarTarifasNaturflight").removeAttr("disabled");
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

$("#BtnBuscarTarifasFechasNaturFlight").on("click", function(e) {
    e.preventDefault();
    var fechaInicio = $('#fechaInicioTarifasNaturFlight').val();
    var fechaFin = $('#fechaFinTarifasNaturFlight').val();
    if(fechaInicio < fechaFin){
        window.location.href = base_url + "ExtNaturflight/Administrar?fechainicial="+fechaInicio+"&fechafinal="+fechaFin;
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

$(document).on('input', '.cal-tarifa-naturflight', function() {
    let idActual = $(this).attr('id');
    let prefijo = idActual.split('_')[0];

    let neta = parseFloat($(`#${prefijo}_netaNaturFlight`).val()) || 0;
    let markup = parseFloat($(`#${prefijo}_markupNaturFlight`).val()) || 0;

    let publica = neta + (neta * (markup / 100));

    $(`#${prefijo}_publicaNaturFlight`).val(publica.toFixed(2));
});