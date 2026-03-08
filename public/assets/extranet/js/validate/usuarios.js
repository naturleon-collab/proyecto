function FiltrarEntidades(tipo) {
    const container = $('#container_entidad');
    const select = $('#id_entidad');
    const label = $('#label_entidad');
    
    // Limpiamos el select y destruimos el picker momentáneamente
    select.empty().append('<option value="">Cargando...</option>');
    select.selectpicker('refresh');

    if (tipo === 'admin' || tipo === 'agencia') {
        label.text(tipo === 'admin' ? 'Asignar Plaza (Naturleon)' : 'Seleccionar Agencia');
        container.fadeIn();
        CargarAgencias(); 
    } else if (tipo === 'hotel') {
        label.text('Seleccionar Hotel');
        container.fadeIn();
        CargarHoteles();
    } else {
        container.fadeOut();
    }
}

function CargarAgencias(){
    $.ajax({
        type: "POST",
        url: base_url + 'ExtUsuarios/CargarAgencias',
        dataType: "json",
        success: function(data){
            let options = '<option value="">Seleccionar Agencia...</option>';
            $.each(data.agencias, function(i, item){
                options += `<option value="${item.id_agencia}">${item.nombre_agencia}</option>`;
            });
            $('#id_entidad').html(options).selectpicker('refresh');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error en petición: " + textStatus, errorThrown);
        }
    });
}

function CargarHoteles(){
    $.ajax({
        type: "POST",
        url: base_url + 'ExtUsuarios/CargarHoteles',
        dataType: "json",
        success: function(data){
            let options = '<option value="">Seleccionar Hotel...</option>';
            $.each(data.hoteles, function(i, item){
                options += `<option value="${item.id_hotel}">${item.nombre_hotel}</option>`;
            });
            $('#id_entidad').html(options).selectpicker('refresh');
        }
    });
}

function GenerarPassword() {
    const caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$";
    let password = "";
    const longitud = 10;

    for (let i = 0; i < longitud; i++) {
        password += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }

    $('#pwd_usuario').val(password);
}

$("#FormGuardarUsuario").submit(function (e) {
    e.preventDefault();

    $("#btnGuardarUsuario").attr("disabled", true);
    $.ajax({
        type: "POST",
        url: base_url + 'ExtUsuarios/AdministrarUsuario',
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnGuardarUsuario").removeAttr("disabled");
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
                $("#btnGuardarUsuario").removeAttr("disabled");
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

function EditarUsuario(id) {
    $.ajax({
        type: "POST",
        url: base_url + 'ExtUsuarios/DataUsuario',
        dataType: "json",
        data: { id: id },
        success: function(data) {
            const user = data.usuario;

            $('#id_usuario').val(user.id_usuario);
            $('#nombre_usuario').val(user.nombre_usuario);
            $('#alias_usuario').val(user.alias_usuario);
            $('#email_usuario').val(user.email_usuario);
            $('#login_usuario').val(user.login_usuario);
            $('#movil_usuario').val(user.movil_usuario);
            $('#cumple_usuario').val(user.cumple_usuario);

            $('#pwd_usuario').val('').removeAttr('required');
            $('#tipo_acceso').val(user.tipo_acceso).selectpicker('refresh');

            if (user.tipo_acceso === 'agencia' || user.tipo_acceso === 'hotel' || user.tipo_acceso === 'admin') {
                CargarEntidadesYSeleccionar(user.tipo_acceso, user.id_entidad);
                
            } else {
                $('#container_entidad').fadeOut();
            }

            $('html, body').animate({ scrollTop: $("#FormGuardarUsuario").offset().top - 100 }, 500);
        }
    });
}

function CargarEntidadesYSeleccionar(tipo, idSeleccionar) {
    const container = $('#container_entidad');
    const select = $('#id_entidad');
    const label = $('#label_entidad');
    
    container.show();
    label.text(tipo === 'hotel' ? 'Seleccionar Hotel' : 'Seleccionar Agencia');

    const urlEntidad = (tipo === 'hotel') ? 'ExtUsuarios/CargarHoteles' : 'ExtUsuarios/CargarAgencias';

    $.ajax({
        type: "POST",
        url: base_url + urlEntidad,
        dataType: "json",
        success: function(data) {
            let options = '<option value="">Seleccionar...</option>';
            const lista = data.hoteles || data.agencias;
            
            $.each(lista, function(i, item) {
                const idItem = item.id_hotel || item.id_agencia;
                const nombreItem = item.nombre_hotel || item.nombre_agencia;
                const aliasItem = item.alias_agencia ? `(${item.alias_agencia}) ` : '';
                
                options += `<option value="${idItem}">${aliasItem}${nombreItem}</option>`;
            });

            $('#id_entidad').html(options);
            $('#id_entidad').selectpicker('refresh');
            $('#id_entidad').selectpicker('val', idSeleccionar);
        }
    });
}

function CambiarEstadoUsuario(id, estado){
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Estás a punto de cambiar el estado...",
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
                url: base_url + 'ExtUsuarios/CambiarEstado',
                data:  {
                    id: id,
                    estado: estado,
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