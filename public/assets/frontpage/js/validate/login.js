$("#formRegistrarAgenciaFront").submit(function (e) {
    e.preventDefault();

    $("#BtnRegistrarAgencia").attr("disabled", true);
    $.ajax({
        type: "POST",
        url: base_url + 'Main/RegistrarAgenciaFront',
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#BtnRegistrarAgencia").removeAttr("disabled");
                Swal.fire({   
                    title: "¡Se ha registrado correctamente!",   
                    text: "Analizaremos la información proporcionada y nos pondremos en contacto contigo pronto.",
                    type: "success",
                    timer: 4000,   
                    showConfirmButton: false 
                });
                setTimeout(function(){
                    window.location.href = base_url;
                }, 4000);
            }else if(data == 'UsuarioExiste'){
                $("#BtnRegistrarAgencia").removeAttr("disabled");
                Swal.fire({   
                    title: "¡Error!",   
                    text: "El login/usuario ingresado no se encuentra disponible, favor de ingresar otra opción.",
                    type: "error",
                    timer: 4000,   
                    showConfirmButton: false 
                });
            }else{
                console.log(data);
                $("#BtnRegistrarAgencia").removeAttr("disabled");
                Swal.fire({   
                    title: "¡Error!",   
                    text: "Ocurrió un error al realizar el registro, intentalo más tarde.",
                    type: "error",
                    timer: 4000,   
                    showConfirmButton: false 
                });
            }
        }
    });
});
//     e.preventDefault();

//     $("#btnModificarSolicitud").attr("disabled", true);

//     var pwd = $("#passwordagencia").val();
//     var confpwd = $("#confirmacionpassword").val();

//     var band = true;

//     if(pwd.length != 0 || confpwd.length != 0){
//         if(pwd != confpwd){
//             band = false;
//             $("#btnModificarSolicitud").removeAttr("disabled");
//             Swal.fire({   
//                 title: "¡Error!",   
//                 text: "Las password no coinciden.",
//                 type: "error",
//                 timer: 4000,   
//                 showConfirmButton: false 
//             });
//         }
//     }

//     if(band == true){
//         $.ajax({
//             type: "POST",
//             url: base_url + 'Main/ModificarSolicitudBD',
//             data: new FormData(this),
//             processData: false,
//             contentType: false,
//             cache: false,
//             async: false,
//             success:  function (data){
//                 if(data == 'Success'){
//                     $("#btnModificarSolicitud").removeAttr("disabled");
//                     Swal.fire({   
//                         title: "¡Se ha guardado correctamente!",   
//                         text: "Analizaremos la información proporcionada y nos pondremos en contacto contigo pronto.",
//                         type: "success",
//                         timer: 4000,   
//                         showConfirmButton: false 
//                     });
//                     setTimeout(function(){
//                         window.location.href = base_url;
//                     }, 4000);
//                 }else if(data == 'UsuarioExiste'){
//                     $("#btnModificarSolicitud").removeAttr("disabled");
//                     Swal.fire({   
//                         title: "¡Error!",   
//                         text: "El login/usuario ingresado no se encuentra disponible, favor de ingresar otra opción.",
//                         type: "error",
//                         timer: 4000,   
//                         showConfirmButton: false 
//                     });
//                 }else{
//                     $("#btnModificarSolicitud").removeAttr("disabled");
//                     Swal.fire({   
//                         title: "¡Error!",   
//                         text: "Ocurrió un error al realizar el registro, intentalo más tarde.",
//                         type: "error",
//                         timer: 4000,   
//                         showConfirmButton: false 
//                     });
//                 }
//             }
//         });
//     }
// });

function BuscarDatosCP(){
    let cp = $("#cpcontacto").val();
    if(cp != 0){
        $.ajax({
            type: "POST",
            url: base_url + 'Main/BuscarDireccion',
            dataType: "json",
            data:  {
                cp,
            },
            success: function(data){
                if(data.msg != 'Error'){
                    $("#estadocontacto").val(data.estado[0].nombre_estado);
                    $("#municipiocontacto").val(data.municipio[0].nombre_municipio);
                    $("#coloniacontacto").empty();
                    for (var i = 0; i < data.colonias.length; i++) {
                        var newRow = jQuery('<option value="'+ data.colonias[i].nombre_colonia +'">'+ data.colonias[i].nombre_colonia +'</option>');
                        jQuery('#coloniacontacto').append(newRow);
                    }
                }
            }
        });
    }
}

function BuscarDatosCPFiscales(){
    let cp = $("#cpfacturacion").val();
    if(cp != 0){
        $.ajax({
            type: "POST",
            url: base_url + 'Main/BuscarDireccion',
            dataType: "json",
            data:  {
                cp,
            },
            success: function(data){
                if(data.msg != 'Error'){
                    $("#estadofacturacion").val(data.estado[0].nombre_estado);
                    $("#municipiofacturacion").val(data.municipio[0].nombre_municipio);
                    $("#coloniafacturacion").empty();
                    for (var i = 0; i < data.colonias.length; i++) {
                        var newRow = jQuery('<option value="'+ data.colonias[i].nombre_colonia +'">'+ data.colonias[i].nombre_colonia +'</option>');
                        jQuery('#coloniafacturacion').append(newRow);
                    }
                }
            }
        });
    }
}

$('#copiardatoscontacto').on('change', function() {
    if ($(this).is(':checked')) {
        $('#personafacturacion').val($('#personacontacto').val());
        $('#emailfacturacion').val($('#emailcontacto').val());
        $('#callefacturacion').val($('#callecontacto').val());
        $('#municipiofacturacion').val($('#municipiocontacto').val());
        $('#cpfacturacion').val($('#cpcontacto').val());
        $('#estadofacturacion').val($('#estadocontacto').val());

        const selectOrigen = document.getElementById('coloniacontacto');
        const selectDestino = document.getElementById('coloniafacturacion');

        selectDestino.innerHTML = '';

        for (const opcion of selectOrigen.options) {
            const nuevaOpcion = document.createElement('option');
            nuevaOpcion.value = opcion.value;
            nuevaOpcion.text = opcion.text;
            
            if (opcion.selected) {
                nuevaOpcion.selected = true;
            }

            selectDestino.appendChild(nuevaOpcion);
        }

        $('#telefonofacturacion').val($('#telefonocontacto').val());
        $('#telefonoadicionalfacturacion').val($('#telefonoadicionalcontacto').val());
        $('#movil1facturacion').val($('#movil1contacto').val());
        $('#movil2facturacion').val($('#movil2contacto').val());
    } else {
        $('#personafacturacion, #municipiofacturacion, #estadofacturacion, #emailfacturacion, #callefacturacion, #coloniafacturacion, #cpfacturacion, #telefonofacturacion, #telefonoadicionalfacturacion, #movil1facturacion, #movil2facturacion').val('');
        $('#coloniafacturacion').html('<option value="0">Seleccionar...</option>');
    }
});

function LogOut() {
    window.location.href = baseurl + "Main/LogOut/";
}

function showCookieConsent() {
  if (!localStorage.getItem('cookieConsent')) {
    $('#cookieConsent').fadeIn();
  }
}

$('#acceptCookies').on('click', function() {
  localStorage.setItem('cookieConsent', 'accepted');
  console.log("Cookies aceptadas: todas.");
  $('#cookieConsent').fadeOut();
});

$('#rejectCookies').on('click', function() {
  localStorage.setItem('cookieConsent', 'rejected');
  console.log("Cookies rechazadas.");
  $('#cookieConsent').fadeOut();
});

$('#configureCookies').on('click', function() {
  $('#cookieConsent').fadeOut();
  $('#cookieConfigModal').modal('show');
});

$('#saveCookieConfig').on('click', function() {
  const functional = $('#functionalCookies').is(':checked');
  const analytics = $('#analyticsCookies').is(':checked');
  const marketing = $('#marketingCookies').is(':checked');

  const preferences = {
    functional: functional,
    analytics: analytics,
    marketing: marketing
  };

  localStorage.setItem('cookieConsent', 'configured');
  localStorage.setItem('cookiePreferences', JSON.stringify(preferences));

  if (analytics) {
    console.log("Analytics activado.");
  } else {
    console.log("Analytics desactivado.");
  }

  if (marketing) {
    console.log("Marketing activado.");
  } else {
    console.log("Marketing desactivado.");
  }

  $('#cookieConfigModal').modal('hide');
});

$(document).ready(function() {
  showCookieConsent();

  const savedPreferences = localStorage.getItem('cookiePreferences');
  if (savedPreferences) {
    const preferences = JSON.parse(savedPreferences);
    $('#analyticsCookies').prop('checked', preferences.analytics);
    $('#marketingCookies').prop('checked', preferences.marketing);
  }
});