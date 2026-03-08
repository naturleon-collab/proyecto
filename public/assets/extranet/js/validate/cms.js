function AgregarNuevoSlider(){
    const form = document.getElementById('FormGuardarSlider');
    form.reset();
    $("#idSlider").val("0");
    const i = document.getElementById('vistaArchivo');
    i.src = "";
    $("#divArchivo").attr('hidden',true);
}

function EditarSlider(id){
    $("#idSlider").val(id);
    const db = "cms_slider";
    const namefield = "id_slider";
    const nameresult = "slider";

    $.ajax({
        type: "POST",
        url: base_url + 'CmsFrontpage/DataModificar/',
        dataType: "json",
        data:  {
            id,
            db,
            namefield,
            nameresult
        },
        success: function(data){
            if(data.msg != 'Error'){
                $("#divArchivo").removeAttr('hidden');
                $("#nombreSlider").focus();
                for (var i = 0; i < data.slider.length; i++) {
                    $("#nombreSlider").val(data.slider[i].nombre_slider);
                    $("#desdeSlider").val(data.slider[i].desde_slider);
                    $("#hastaSlider").val(data.slider[i].hasta_slider);
                    const x = document.getElementById('vistaArchivo');
                    x.src = base_url+data.slider[i].imagen_slider;
                }
            }
        }
    });
}

$("#FormGuardarSlider").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarSlider").attr("disabled", true);

    var formData = new FormData(this);

    var idSlider = $("#idSlider").val();

    if(idSlider == 0 && !$('#archivoSlider').val()){
        $("#btnGuardarSlider").removeAttr("disabled");
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
            url: base_url + 'CmsFrontpage/AdministrarSlider/',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success:  function (data){
                if(data == 'Success'){
                    $("#btnGuardarSlider").removeAttr("disabled");
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
                    $("#btnGuardarSlider").removeAttr("disabled");
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

function CambiarStatusSlider(id,status){
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
                url: base_url + 'CmsFrontpage/StatusSlider/',
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

function AgregarNuevoPlaza(){
    const form = document.getElementById('FormGuardarPlaza');
    form.reset();
    $("#idPlaza").val("0");
}

function EditarPlaza(id){
    $("#idPlaza").val(id);
    const db = "cms_plazas";
    const namefield = "id_plaza";
    const nameresult = "plaza";

    $.ajax({
        type: "POST",
        url: base_url + 'CmsFrontpage/DataModificar/',
        dataType: "json",
        data:  {
            id,
            db,
            namefield,
            nameresult
        },
        success: function(data){
            if(data.msg != 'Error'){
                $("#nombrePlaza").focus();
                for (var i = 0; i < data.plaza.length; i++) {
                    $("#nombrePlaza").val(data.plaza[i].nombre_plaza);
                    $("#correoPlaza").val(data.plaza[i].correo_plaza);
                    $("#telefonoPlaza").val(data.plaza[i].telefono_plaza);
                    $("#ubicacionPlaza").val(data.plaza[i].ubicacion_plaza);
                }
            }
        }
    });
}

$("#FormGuardarPlaza").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarPlaza").attr("disabled", true);

    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url + 'CmsFrontpage/AdministrarPlazas/',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnGuardarPlaza").removeAttr("disabled");
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
                $("#btnGuardarPlaza").removeAttr("disabled");
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

$("#FormGuardarNosotros").submit(function (e) {
    e.preventDefault();
    $("#BtnGuardarNosotros").attr("disabled", true);

    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url + 'CmsFrontpage/AdministrarNosotros/',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#BtnGuardarNosotros").removeAttr("disabled");
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
                $("#BtnGuardarNosotros").removeAttr("disabled");
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

function AgregarNuevoValor(){
    const form = document.getElementById('FormGuardarValores');
    form.reset();
    $("#idValor").val("0");
}

function EditarValor(id){
    $("#idValor").val(id);
    const db = "cms_nosotros_valores";
    const namefield = "id_valor";
    const nameresult = "valor";

    $.ajax({
        type: "POST",
        url: base_url + 'CmsFrontpage/DataModificar/',
        dataType: "json",
        data:  {
            id,
            db,
            namefield,
            nameresult
        },
        success: function(data){
            if(data.msg != 'Error'){
                $("#textoValor").focus();
                for (var i = 0; i < data.valor.length; i++) {
                    $("#textoValor").val(data.valor[i].texto_valor);
                }
            }
        }
    });
}

$("#FormGuardarValores").submit(function (e) {
    e.preventDefault();
    $("#BtnGuardarValores").attr("disabled", true);

    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url + 'CmsFrontpage/AdministrarValores/',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#BtnGuardarValores").removeAttr("disabled");
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
                $("#BtnGuardarValores").removeAttr("disabled");
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

$("#FormGuardarBannerAviso").submit(function (e) {
    e.preventDefault();
    $("#BtnGuardarBannerAviso").attr("disabled", true);

    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url + 'CmsFrontpage/AdministrarBannerAviso/',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#BtnGuardarBannerAviso").removeAttr("disabled");
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
                $("#BtnGuardarBannerAviso").removeAttr("disabled");
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

function AgregarNuevoAviso(){
    const form = document.getElementById('FormGuardarAvisos');
    form.reset();
    $("#idAviso").val("0");
    $("#textoAviso").text("");
}

function EditarAviso(id){
    $("#idAviso").val(id);
    const db = "cms_aviso";
    const namefield = "id_aviso";
    const nameresult = "aviso";

    $.ajax({
        type: "POST",
        url: base_url + 'CmsFrontpage/DataModificar/',
        dataType: "json",
        data:  {
            id,
            db,
            namefield,
            nameresult
        },
        success: function(data){
            if(data.msg != 'Error'){
                $("#tituloAviso").focus();
                for (var i = 0; i < data.aviso.length; i++) {
                    $("#tituloAviso").val(data.aviso[i].titulo_aviso);
                    $("#textoAviso").text(data.aviso[i].texto_aviso);
                }
            }
        }
    });
}

$("#FormGuardarAvisos").submit(function (e) {
    e.preventDefault();
    $("#BtnGuardarAvisos").attr("disabled", true);

    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url + 'CmsFrontpage/AdministrarAvisos/',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#BtnGuardarAvisos").removeAttr("disabled");
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
                $("#BtnGuardarAvisos").removeAttr("disabled");
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

//SECCION MBP

$("#FormGuardarImagenLogoMBP").submit(function (e) {
    e.preventDefault();
    $("#BtnGuardarImagenLogoMBP").attr("disabled", true);

    let formData = new FormData(this);
    formData.append("ubicacion", "header");

    $.ajax({
        type: "POST",
        url: base_url + 'CmsFrontpage/AdministrarLogoMBP',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            $("#BtnGuardarImagenLogoMBP").attr("disabled", false);

            if(data == 'Success'){
                Swal.fire({
                    title: "¡SE HA GUARDADO CORRECTAMENTE!",
                    text: "Espere un momento por favor...",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                });
                setTimeout(function(){
                    location.reload(); // opcional: reemplázalo por refrescar solo la tabla/imagen
                }, 2000);
            } else {
                Swal.fire({
                    title: "ERROR!",
                    text: "Ocurrió un error, intente de nuevo...",
                    icon: "error",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        },
        error: function(xhr){
            $("#BtnGuardarImagenSliderMBP").attr("disabled", false);
            Swal.fire({
                title: "ERROR!",
                text: "Error en la conexión o en el servidor.",
                icon: "error",
                showConfirmButton: true
            });
        }
    });
});

$("#FormGuardarImagenSliderMBP").submit(function (e) {
    e.preventDefault();
    $("#BtnGuardarImagenSliderMBP").attr("disabled", true);

    let formData = new FormData(this);
    formData.append("ubicacion", "slider");

    $.ajax({
        type: "POST",
        url: base_url + 'CmsFrontpage/AdministrarSliderMBP',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            $("#BtnGuardarImagenSliderMBP").attr("disabled", false);

            if(data == 'Success'){
                Swal.fire({
                    title: "¡SE HA GUARDADO CORRECTAMENTE!",
                    text: "Espere un momento por favor...",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                });
                setTimeout(function(){
                    location.reload(); // opcional: reemplázalo por refrescar solo la tabla/imagen
                }, 2000);
            } else {
                Swal.fire({
                    title: "ERROR!",
                    text: "Ocurrió un error, intente de nuevo...",
                    icon: "error",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        },
        error: function(xhr){
            $("#BtnGuardarImagenSliderMBP").attr("disabled", false);
            Swal.fire({
                title: "ERROR!",
                text: "Error en la conexión o en el servidor.",
                icon: "error",
                showConfirmButton: true
            });
        }
    });
});

$("#FormGuardarTextoFooterMBP").submit(function (e) {
    e.preventDefault();
    $("#BtnGuardarTextoFooterMBP").attr("disabled", true);
    const formData = new FormData(this);

    $.ajax({
        type: "POST",
        url: base_url + 'CmsFrontpage/AdministrarTextoFooterMBP',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            $("#BtnGuardarTextoFooterMBP").attr("disabled", false);

            if(data == 'Success'){
                Swal.fire({
                    title: "¡SE HA ACTUALIZADO CORRECTAMENTE!",
                    text: "Espere un momento por favor...",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                });
                setTimeout(function(){
                    location.reload(); // opcional: reemplázalo por refrescar solo la tabla/imagen
                }, 2000);
            } else {
                Swal.fire({
                    title: "ERROR!",
                    text: "Ocurrió un error, intente de nuevo...",
                    icon: "error",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        },
        error: function(xhr){
            $("#BtnGuardarTextoFooterMBP").attr("disabled", false);
            Swal.fire({
                title: "ERROR!",
                text: "Error en la conexión o en el servidor.",
                icon: "error",
                showConfirmButton: true
            });
        }
    });
});

function EditarTextoFooter(texto) {
    document.getElementById('idTextoFooterMBP').value = texto.id_mbp_texto;
    document.getElementById('textoFooterMBP').value = texto.texto_mbp;
    const valor = texto.ubicacion_mbp_texto;

    const radio = document.querySelector(`input[name="rdBtnFooterMBP"][value="${valor}"]`);
    if (radio) radio.checked = true;
};

function EliminarTextoFooter(id){
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Estás a punto de eliminar el registro...",
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
                url: base_url + 'CmsFrontpage/EliminarTextoFooterMBP',
                data:  {
                    id
                },
                success: function(data){
                    if(data=='Success'){
                        Swal.fire({
                            title: "¡SE HA ELIMINADO CORRECTAMENTE!",
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
};

$("#FormGuardarImagenFooterMBP").submit(function (e) {
    e.preventDefault();
    $("#BtnGuardarImagenFooterMBP").attr("disabled", true);

    let formData = new FormData(this);
    formData.append("ubicacion", "footer");

    $.ajax({
        type: "POST",
        url: base_url + 'CmsFrontpage/AdministrarFooterMBP',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function (data){
            $("#BtnGuardarImagenFooterMBP").attr("disabled", false);

            if (data == 'Success') {
                Swal.fire({
                    title: "¡SE HA GUARDADO CORRECTAMENTE!",
                    text: "Espere un momento por favor...",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                });
                setTimeout(function(){
                    location.reload(); // opcional: reemplázalo por refrescar solo la tabla/imagen
                }, 2000);
            } else {
                Swal.fire({
                    title: "ERROR!",
                    text: "Ocurrió un error, intente de nuevo...",
                    icon: "error",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        },
        error: function(xhr){
            $("#BtnGuardarImagenSliderMBP").attr("disabled", false);
            Swal.fire({
                title: "ERROR!",
                text: "Error en la conexión o en el servidor.",
                icon: "error",
                showConfirmButton: true
            });
        }
    });
});

function CambiarStatusImagenMBP(id, status){
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
                url: base_url + 'CmsFrontpage/CambiarStatusImagenMBP',
                data:  {
                    id,
                    status
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