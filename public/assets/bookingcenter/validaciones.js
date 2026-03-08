$(document).ready(function() {
    // 1. Detectamos si existen parámetros previos (Vista Resultados) 
    const p = (typeof paramsExistentes !== 'undefined' && paramsExistentes !== null) ? paramsExistentes : {};

    // --- LÓGICA DE ESCALAMIENTO DE PASAJEROS ---
    $('#habitaciones').on('change', function() {
        let numHab = parseInt($(this).val());
        
        // --- ADULTOS ---
        let selectAdultos = $('#adultos');
        let valorActualA = selectAdultos.val() || p.adultos || (numHab * 2); 

        selectAdultos.empty();
        let minAdultos = numHab; 
        let maxAdultos = numHab * 4;

        for (let i = minAdultos; i <= maxAdultos; i++) {
            let selected = (i == valorActualA) ? 'selected' : '';
            selectAdultos.append(`<option value="${i}" ${selected}>${i}</option>`);
        }

        // --- MENORES ---
        let selectMenores = $('#menores');
        let valorActualM = selectMenores.val() || p.menores || 0;

        selectMenores.empty();
        let maxMenores = numHab * 3;

        for (let i = 0; i <= maxMenores; i++) {
            let selected = (i == valorActualM) ? 'selected' : '';
            selectMenores.append(`<option value="${i}" ${selected}>${i}</option>`);
        }
    });

    // --- LÓGICA DE EDADES DE NIÑOS ---
    $('#menores').on('change', function() {
        let cantidad = parseInt($(this).val());
        let contenedor = $('#DivEdadesMenores');
        
        contenedor.empty();

        if (cantidad > 0) {
            contenedor.fadeIn().css('display', 'flex');
            let edadesArray = p.edades ? p.edades.toString().split(',') : [];

            for (let i = 0; i < cantidad; i++) {
                let edadGuardada = edadesArray[i] || 0;
                let options = "";
                for (let e = 0; e <= 17; e++) {
                    let sel = (e == edadGuardada) ? 'selected' : '';
                    options += `<option value="${e}" ${sel}>${e} años</option>`;
                }

                contenedor.append(`
                    <div class="col-6 col-md-3 col-lg-2 mb-2">
                        <label class="small">Edad Niño ${i+1}</label>
                        <select class="form-control edad-nino-input" required>
                            ${options}
                        </select>
                    </div>
                `);
            }
        } else {
            contenedor.fadeOut();
        }
    });

    // --- AUTOCOMPLETE ---
    if ($("#destino_nombre").length > 0) {
        $("#destino_nombre").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: base_url + 'Booking/getDestinos/',
                    dataType: "json",
                    data: { term: request.term },
                    success: function(data) { response(data); }
                });
            },
            select: function(event, ui) {
                $("#destino_id").val(ui.item.id);
            }
        });
    }

    // --- FUNCIÓN CENTRAL DE BÚSQUEDA (CON FILTROS) ---
    function ejecutarBusqueda() {
        if ($('#destino_id').val() === "") {
            Swal.fire({ text: "Por favor, selecciona un destino de la lista.", type: "error" });
            return;
        }

        // Recolectar edades de niños
        let edades = [];
        $('.edad-nino-input').each(function() {
            edades.push($(this).val());
        });

        // Recolectar Planes (Checkboxes seleccionados)
        let planes = [];
        $('.filtro-plan:checked').each(function() {
            planes.push($(this).val());
        });

        // Recolectar Rangos de Precio (Checkboxes seleccionados)
        let precios = [];
        $('.filtro-precio:checked').each(function() {
            precios.push($(this).val());
        });

        const params = {
            destino: $('#destino_id').val(),
            checkin: $('#checkin').val(),
            checkout: $('#checkout').val(),
            habitaciones: $('#habitaciones').val(),
            adultos: $('#adultos').val(),
            menores: $('#menores').val(),
            edades: edades.join(','),
            planes: planes.join(','),
            precios: precios.join(',')
        };

        window.location.href = base_url + "Booking/Search?" + $.param(params);
    }

    // Evento para el botón de la barra superior y el botón lateral de filtros
    $('#btnBuscarMotor, #btnAplicarFiltros').on('click', function() {
        ejecutarBusqueda();
    });

    // EJECUCIÓN INICIAL
    $('#habitaciones').trigger('change');
});

// --- DATEPICKER ---
$(function() {
    let checkinInput = $('#checkin');
    let checkoutInput = $('#checkout');
    let fechasInput = $('#fechas_rango');

    let start = checkinInput.val() ? moment(checkinInput.val()) : moment().startOf('day');
    let end = checkoutInput.val() ? moment(checkoutInput.val()) : moment().startOf('day').add(3, 'days');

    fechasInput.daterangepicker({
        locale: {
            format: 'DD/MM/YYYY',
            separator: ' - ',
            applyLabel: 'Aplicar',
            cancelLabel: 'Cancelar',
            daysOfWeek: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            firstDay: 1
        },
        startDate: start,
        endDate: end,
        minDate: moment().startOf('day'),
        autoUpdateInput: true
    }, function(start, end) {
        checkinInput.val(start.format('YYYY-MM-DD'));
        checkoutInput.val(end.format('YYYY-MM-DD'));
    });

    if (!checkinInput.val()) checkinInput.val(start.format('YYYY-MM-DD'));
    if (!checkoutInput.val()) checkoutInput.val(end.format('YYYY-MM-DD'));
});