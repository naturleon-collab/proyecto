$("#FormGuardarDestino").submit(function (e) {
    e.preventDefault();
    $("#btnGuardarDestino").attr("disabled", true);

    var formData = new FormData(this);
    var statusdestino = 0; if($('#statusdestino').is(':checked')){statusdestino = 1;} formData.append("statusdestino", statusdestino);
    var aerodestino = 0; if($('#aerodestino').is(':checked')){aerodestino = 1;} formData.append("aerodestino", aerodestino);
    var charterdestino = 0; if($('#charterdestino').is(':checked')){charterdestino = 1;} formData.append("charterdestino", charterdestino);
    var hoteleriadestino = 0; if($('#hoteleriadestino').is(':checked')){hoteleriadestino = 1;} formData.append("hoteleriadestino", hoteleriadestino);
    var trasladodestino = 0; if($('#trasladodestino').is(':checked')){trasladodestino = 1;} formData.append("trasladodestino", trasladodestino);
    var actividadesdestino = 0; if($('#actividadesdestino').is(':checked')){actividadesdestino = 1;} formData.append("actividadesdestino", actividadesdestino);
    var naturflightdestino = 0; if($('#naturflightdestino').is(':checked')){naturflightdestino = 1;} formData.append("naturflightdestino", naturflightdestino);
    var mpbdestino = 0; if($('#mpbdestino').is(':checked')){mpbdestino = 1;} formData.append("mpbdestino", mpbdestino);
    var tipodestino = $('input[name=destinotipo]:checked', '#FormGuardarDestino').val(); formData.append("tipodestino", tipodestino);

    $.ajax({
        type: "POST",
        url: base_url + 'ExtDestinos/Administrar',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:  function (data){
            if(data == 'Success'){
                $("#btnGuardarDestino").removeAttr("disabled");
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
                $("#btnGuardarDestino").removeAttr("disabled");
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

$("#destino").on("change", function(e) {
    e.preventDefault();
    const destino = $("#destino").val();

    if(destino != 0){
        $.ajax({
            type: "POST",
            url: base_url + 'ExtDestinos/Data',
            dataType: "json",
            data:  {
                destino,
            },
            success: function(data){
                if(data.msg != 'Error'){
                    for (var i = 0; i < data.destino.length; i++) {
                        $("#nombredestino").val(data.destino[i].nombre_destino);
                        $("#abrevdestino").val(data.destino[i].abrev_destino);
                        $("#iatadestino").val(data.destino[i].iata_destino);
                        if(data.destino[i].aereo_destino == 1){$("#aerodestino").prop("checked", true);}
                        if(data.destino[i].charter_destino == 1){$("#charterdestino").prop("checked", true);}
                        if(data.destino[i].hoteleria_destino == 1){$("#hoteleriadestino").prop("checked", true);}
                        if(data.destino[i].traslado_destino == 1){$("#trasladodestino").prop("checked", true);}
                        if(data.destino[i].actividades_destino == 1){$("#actividadesdestino").prop("checked", true);}
                        if(data.destino[i].naturflight_destino == 1){$("#naturflightdestino").prop("checked", true);}
                        if(data.destino[i].mbp_destino == 1){$("#mpbdestino").prop("checked", true);}
                        if(data.destino[i].tipo_destino == "Nacional"){$("#destinotipo1").prop("checked", true);}else{$("#destinotipo2").prop("checked", true);}
                        if(data.destino[i].status_destino == 1){$("#statusdestino").prop("checked", true);}
                    }
                }
            }
        });
    }else{
        const form = document.getElementById('FormGuardarDestino');
        form.reset();
    }
});