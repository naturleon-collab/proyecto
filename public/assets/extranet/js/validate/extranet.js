function BuscarCP(prefijo){
    let cp = $("#cp_"+prefijo).val();
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
                    $("#estado_"+prefijo).val(data.estado[0].nombre_estado);
                    $("#municipio_"+prefijo).val(data.municipio[0].nombre_municipio);
                    $("#colonia_"+prefijo).empty();
                    for (var i = 0; i < data.colonias.length; i++) {
                        var newRow = jQuery('<option value="'+ data.colonias[i].nombre_colonia +'">'+ data.colonias[i].nombre_colonia +'</option>');
                        jQuery('#colonia_'+prefijo).append(newRow);
                    }
                }
            }
        });
    }
}