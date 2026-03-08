$("#formAgregarNaturcharter").submit(function (e) {
    e.preventDefault();
    $("#btnAgregarNaturcharter").attr("disabled", true);

    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url + 'ExtNaturcharter/Agregar',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnAgregarNaturcharter").removeAttr("disabled");
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
                $("#btnAgregarNaturcharter").removeAttr("disabled");
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

function AdministrarNC(id){
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
        url: base_url + 'ExtNaturcharter/SaveID',
        data:  {
            id: id
        },
        success: function(data){
            if(data=='Success'){
                window.location.href = base_url + "ExtNaturcharter/Administrar?fechainicial="+fecha1Formatted+"&fechafinal="+fecha2Formatted;
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

function CambiarStatusNC(id,status){
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
                url: base_url + 'ExtNaturcharter/CambiarStatus',
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

$("#formDatosGeneralesCharter").submit(function (e) {
    e.preventDefault();
    $("#btnDatosGeneralesCharter").attr("disabled", true);

    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url + 'ExtNaturcharter/DatosGenerales',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnDatosGeneralesCharter").removeAttr("disabled");
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
                $("#btnDatosGeneralesCharter").removeAttr("disabled");
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

$("#formDatosFiscalesCharter").submit(function (e) {
    e.preventDefault();
    $("#btnDatosFiscalesCharter").attr("disabled", true);

    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url + 'ExtNaturcharter/DatosFiscales',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnDatosFiscalesCharter").removeAttr("disabled");
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
                $("#btnDatosFiscalesCharter").removeAttr("disabled");
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

function AgregarNuevaCuentaCharter(){
    const form = document.getElementById('FormGuardarCuentaCharter');
    form.reset();
    $("#idCuentaCharter").val("0");
}

$("#FormGuardarCuentaCharter").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarCuentaCharter").attr("disabled", true);

    var formData = new FormData(this);
    var statusCuentaCharter = 0;
    if($('#statusCuentaCharter').is(':checked')) {
        statusCuentaCharter = 1;
    }
    formData.append("statusCuentaCharter", statusCuentaCharter);
    $.ajax({
        type: "POST",
        url: base_url + 'ExtNaturcharter/Cuentas',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnGuardarCuentaCharter").removeAttr("disabled");
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
                $("#btnGuardarCuentaCharter").removeAttr("disabled");
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

function EditarCuentaCharter(id){
    $("#idCuentaCharter").val(id);
    const db = "naturcharter_cuentas";
    const namefield = "id_cuenta";
    const nameresult = "cuenta";

    $.ajax({
        type: "POST",
        url: base_url + 'ExtNaturcharter/DataModificar',
        dataType: "json",
        data:  {
            id,
            db,
            namefield,
            nameresult
        },
        success: function(data){
            console.log(data);
            if(data.msg != 'Error'){
                $("#aliasCuentaCharter").focus();
                for (var i = 0; i < data.cuenta.length; i++) {
                    $("#aliasCuentaCharter").val(data.cuenta[i].alias_cuenta);
                    $("#nombreCuentaCharter").val(data.cuenta[i].nombre_cuenta);
                    $("#institucionCuentaCharter").val(data.cuenta[i].institucion_cuenta);
                    $("#tipoCuentaCharter").val(data.cuenta[i].tipo_cuenta);
                    $("#numCuentaCharter").val(data.cuenta[i].numero_cuenta);
                    $("#clabeCuentaCharter").val(data.cuenta[i].clabe_cuenta);
                    $("#observacionesCuentaCharter").val(data.cuenta[i].observaciones_cuenta);
                    if(data.cuenta[i].estatus_cuenta == 1){$("#statusCuentaCharter").prop("checked", true);}else{$("#statusCuentaCharter").prop("checked", false);}
                }
            }
        }
    });
}

$("#FormGuardarSalidas").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarSalidas").attr("disabled", true);

    var formData = new FormData(this);
    var status = 0;
    if($('#statusSalida').is(':checked')) {status = 1;}
    formData.append("status", status);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtNaturcharter/AdministrarSalidas',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnGuardarSalidas").removeAttr("disabled");
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
                $("#btnGuardarSalidas").removeAttr("disabled");
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

function EditarSalida(id){
    $("#idSalida").val(id);
    const db = "naturcharter_salidas";
    const namefield = "id_salida";
    const nameresult = "salida";

    $.ajax({
        type: "POST",
        url: base_url + 'ExtNaturcharter/DataModificar',
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
                for (var i = 0; i < data.salida.length; i++) {
                    $("#nombreSalida").val(data.salida[i].nombre);
                    $('#origenSalida option[value='+data.salida[i].origen+']').prop('selected',true);
                    $('#destinoSalida option[value='+data.salida[i].destino+']').prop('selected',true);
                    if(data.salida[i].estatus == 1){$("#statusSalida").prop("checked", true);}else{$("#statusSalida").prop("checked", false);}
                }
            }
        }
    });
}

$("#formAdministrarTarifasCharter").submit(function (e) {
    e.preventDefault();
    $("#btnAdministrarTarifasCharter").attr("disabled", true);

    var formData = new FormData(this);

    const diasCheckeados = $('.checkboxdiastarifasCharter:checked').map(function() {
        return $(this).val();
    }).get();

    formData.append("diasCheckeados", JSON.stringify(diasCheckeados));

    var band = true;

    let errores = [];

    if (diasCheckeados.length === 0) {
        errores.push("Error");
    }

    if(band === false){
        $("#btnAdministrarTarifasCharter").removeAttr("disabled");
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
            url: base_url + 'ExtNaturcharter/Tarifas',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success:  function (data){
                if(data == 'Success'){
                    $("#btnAdministrarTarifasCharter").removeAttr("disabled");
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
                    $("#btnAdministrarTarifasCharter").removeAttr("disabled");
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

$("#BtnBuscarTarifasFechasCharter").on("click", function(e) {
    e.preventDefault();
    var fechaInicio = $('#fechaInicioTarifasCharter').val();
    var fechaFin = $('#fechaFinTarifasCharter').val();
    if(fechaInicio < fechaFin){
        window.location.href = base_url + "ExtNaturcharter/Administrar?fechainicial="+fechaInicio+"&fechafinal="+fechaFin;
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

$(document).on('input', '.tarifa-neta, .tarifa-markup', function() {
    let $fila = $(this).closest('.row');
    
    let neta = parseFloat($fila.find('.tarifa-neta').val()) || 0;
    let markup = parseFloat($fila.find('.tarifa-markup').val()) || 0;
    
    let publica = neta + (neta * (markup / 100));
    
    $fila.find('.tarifa-publica').val(publica.toFixed(2));
});