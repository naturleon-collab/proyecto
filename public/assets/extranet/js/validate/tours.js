$("#formAgregarTour").submit(function (e) {
    e.preventDefault();
    $("#btnAgregarTour").attr("disabled", true);

    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url + 'ExtTours/AgregarTour',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnAgregarTour").removeAttr("disabled");
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
                $("#btnAgregarTour").removeAttr("disabled");
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

function AdministrarTour(id){
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
        url: base_url + 'ExtTours/SaveID',
        data:  {
            id: id
        },
        success: function(data){
            if(data=='Success'){
                window.location.href = base_url + "ExtTours/Administrar?fechainicial="+fecha1Formatted+"&fechafinal="+fecha2Formatted;
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

function CambiarStatusTour(id,status){
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
                url: base_url + 'ExtTours/CambiarStatus',
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

$("#formDatosGeneralesTour").submit(function (e) {
    e.preventDefault();
    $("#btnDatosGeneralesTour").attr("disabled", true);

    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url + 'ExtTours/DatosGenerales',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnDatosGeneralesTour").removeAttr("disabled");
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
                $("#btnDatosGeneralesTour").removeAttr("disabled");
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

$("#formDatosFiscalesTour").submit(function (e) {
    e.preventDefault();
    $("#btnDatosFiscalesTour").attr("disabled", true);

    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url + 'ExtTours/DatosFiscales',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnDatosFiscalesTour").removeAttr("disabled");
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
                $("#btnDatosFiscalesTour").removeAttr("disabled");
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

function AgregarNuevaCuentaTour(){
    const form = document.getElementById('FormGuardarCuentaTour');
    form.reset();
    $("#idCuentaTour").val("0");
}

$("#FormGuardarCuentaTour").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarCuentaTour").attr("disabled", true);

    var formData = new FormData(this);
    var statusCuentaTour = 0;
    if($('#statusCuentaTour').is(':checked')) {
        statusCuentaTour = 1;
    }
    formData.append("statusCuentaTour", statusCuentaTour);
    $.ajax({
        type: "POST",
        url: base_url + 'ExtTours/Cuentas',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnGuardarCuentaTour").removeAttr("disabled");
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
                $("#btnGuardarCuentaTour").removeAttr("disabled");
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

function EditarCuentaTour(id){
    $("#idCuentaTour").val(id);
    const db = "tours_cuentas";
    const namefield = "id_cuenta_tour";
    const nameresult = "cuenta";

    $.ajax({
        type: "POST",
        url: base_url + 'ExtTours/DataModificar',
        dataType: "json",
        data:  {
            id,
            db,
            namefield,
            nameresult
        },
        success: function(data){
            if(data.msg != 'Error'){
                $("#aliasCuentaTour").focus();
                for (var i = 0; i < data.cuenta.length; i++) {
                    $("#aliasCuentaTour").val(data.cuenta[i].alias_cuenta);
                    $("#nombreCuentaTour").val(data.cuenta[i].nombre_cuenta);
                    $("#institucionCuentaTour").val(data.cuenta[i].institucion_cuenta);
                    $("#tipoCuentaTour").val(data.cuenta[i].tipo_cuenta);
                    $("#numCuentaTour").val(data.cuenta[i].numero_cuenta);
                    $("#clabeCuentaTour").val(data.cuenta[i].clabe_cuenta);
                    $("#observacionesCuentaTour").val(data.cuenta[i].observaciones_cuenta);
                    if(data.cuenta[i].estatus_cuenta == 1){$("#statusCuentaTour").prop("checked", true);}else{$("#statusCuentaTour").prop("checked", false);}
                }
            }
        }
    });
}

$("#formAdministrarTarifasTour").submit(function (e) {
    e.preventDefault();
    $("#btnAdministrarTarifasTour").attr("disabled", true);

    var formData = new FormData(this);

    const diasCheckeados = $('.checkboxdiastarifasTour:checked').map(function() {
        return $(this).val();
    }).get();

    formData.append("diasCheckeados", JSON.stringify(diasCheckeados));

    var band = true;

    let errores = [];

    if (diasCheckeados.length === 0) {
        errores.push("Error");
    }

    if(band === false){
        $("#btnAdministrarTarifasTour").removeAttr("disabled");
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
            url: base_url + 'ExtTours/Tarifas',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success:  function (data){
                if(data == 'Success'){
                    $("#btnAdministrarTarifasTour").removeAttr("disabled");
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
                    $("#btnAdministrarTarifasTour").removeAttr("disabled");
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

$("#BtnBuscarTarifasFechasTour").on("click", function(e) {
    e.preventDefault();
    var fechaInicio = $('#fechaInicioTarifasTour').val();
    var fechaFin = $('#fechaFinTarifasTour').val();
    if(fechaInicio < fechaFin){
        window.location.href = base_url + "ExtTours/Administrar?fechainicial="+fechaInicio+"&fechafinal="+fechaFin;
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

$(document).on('input', '.cal-tarifa', function() {
    let idActual = $(this).attr('id');
    let prefijo = idActual.split('_')[0];

    let neta = parseFloat($(`#${prefijo}_netaTour`).val()) || 0;
    let markup = parseFloat($(`#${prefijo}_markupTour`).val()) || 0;

    let publica = neta + (neta * (markup / 100));

    $(`#${prefijo}_publicaTour`).val(publica.toFixed(2));
});