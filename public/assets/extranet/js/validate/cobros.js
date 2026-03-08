function BuscarReservacion(){
    const localizador = $("#cobro_localizador").val();

    $.ajax({
        type: "POST",
        url: base_url + 'ExtCobros/ObtenerReserva',
        dataType: "json",
        data:  {
            localizador
        },
        success: function(data){
            // console.log(data);
            if(data.msg != 'Error'){
                $("#nombre").focus();
                $("#cobro_reservacion").val(data.reservacion[0].id_reservacion);
                $("#cobro_hotel").val(data.reservacion[0].nombre_hotel);
                $("#cobro_titular").val(data.reservacion[0].nombre_cliente_reservacion+" "+data.reservacion[0].apellidos_cliente_reservacion);
                $("#cobro_monto").val(data.reservacion[0].total_reservacion);
                $("#txt_total").text("$"+data.reservacion[0].total_reservacion);
            }else{
                Swal.fire({   
                    title: "¡ERROR!",   
                    text: "No se encontro una reservacion con ese localizador...",
                    type: "error",
                    timer: 2000,   
                    showConfirmButton: false 
                });
            }
        }
    });
}

$("#formProcesarPago").submit(function (e) {
    e.preventDefault();
    $("#btnProcesarPago").attr("disabled", true);

    var formData = new FormData(this);

    let tipoTarjeta = $("input[name='tipo_t']:checked").val();
    formData.append("tipoTarjeta", tipoTarjeta);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtCobros/ProcesarPago',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnProcesarPago").removeAttr("disabled");
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
                $("#btnProcesarPago").removeAttr("disabled");
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

function BuscarReservacionLink(){
    const localizador = $("#link_localizador").val();

    $.ajax({
        type: "POST",
        url: base_url + 'ExtCobros/ObtenerReserva',
        dataType: "json",
        data:  {
            localizador
        },
        success: function(data){
            // console.log(data);
            if(data.msg != 'Error'){
                $("#nombre").focus();
                $("#id_link_reservacion").val(data.reservacion[0].id_reservacion);
                $("#link_hotel").val(data.reservacion[0].nombre_hotel);
                $("#link_titular_reservacion").val(data.reservacion[0].nombre_cliente_reservacion+" "+data.reservacion[0].apellidos_cliente_reservacion);
                $("#link_monto").val(data.reservacion[0].total_reservacion);
            }else{
                Swal.fire({   
                    title: "¡ERROR!",   
                    text: "No se encontro una reservacion con ese localizador...",
                    type: "error",
                    timer: 2000,   
                    showConfirmButton: false 
                });
            }
        }
    });
}

$("#formGuardarLinkPago").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarLinkPago").attr("disabled", true);

    var formData = new FormData(this);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtCobros/GuardarLinkPago',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnGuardarLinkPago").removeAttr("disabled");
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
                $("#btnGuardarLinkPago").removeAttr("disabled");
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

function copyToClipboard(text, button) {
    navigator.clipboard.writeText(text).then(() => {
        const icon = button.querySelector('i');
        
        icon.classList.remove('far', 'fa-copy');
        icon.classList.add('fas', 'fa-check', 'text-success');

        setTimeout(() => {
            icon.classList.remove('fas', 'fa-check', 'text-success');
            icon.classList.add('far', 'fa-copy');
        }, 2000);
    }).catch(err => {
        console.error('Error al copiar: ', err);
    });
}

function editarLink(id){
    $.ajax({
        type: "POST",
        url: base_url + 'ExtCobros/ObtenerLink',
        dataType: "json",
        data:  {
            id
        },
        success: function(data){
            // console.log(data);
            if(data.msg != 'Error'){
                $("#link_titular_reservacion").focus();
                $("#id_link_reservacion").val(data.link[0].id_reservacion);
                $("#link_hotel").val(data.link[0].hotel_reservacion);
                $("#link_localizador").val(data.link[0].folio_reservacion);
                $("#link_titular_reservacion").val(data.link[0].titular_reservacion);
                $("#link_monto").val(data.link[0].monto_pagar);
                $("#whatsapp").val(data.link[0].whatsapp);
                $("#email").val(data.link[0].email);
                $('#agencia_id option[value='+data.link[0].id_agencia+']').prop('selected',true);
                $('#agencia_id').selectpicker('refresh');
                $("#id_link").val(id);
            }else{
                Swal.fire({   
                    title: "¡ERROR!",   
                    text: "No se encontro una reservacion con ese localizador...",
                    type: "error",
                    timer: 2000,   
                    showConfirmButton: false 
                });
            }
        }
    });
}

function desactivarLink(id){
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Estás a punto de desactivar el link...",
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
                url: base_url + 'ExtCobros/DesactivarLink',
                data:  {
                    id: id
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