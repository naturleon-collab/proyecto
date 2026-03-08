$( document ).ready(function() {
    $('.selectpicker').selectpicker();

    $.extend(true, $.fn.dataTable.defaults, {
        language: {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "infoPostFix": "",
            "search": "Buscar:",
            "url": "",
            "thousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "<<",
                "last": ">>",
                "next": ">",
                "previous": "<"
            },
            "aria": {
                "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            },
        },
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "responsive": true,
        columnControl: [['orderAsc', 'orderDesc', 'search']],
        layout: {
            topEnd: {
                features: ['buttons','search']
            },
            bottomStart: 'info',
            bottomEnd: 'paging',
        },
        buttons: [
            {
                extend: 'excelHtml5',
                text: 'Exportar a Excel',
                className: 'btn btn-success',
                exportOptions: {
                    columns: ':visible',
                    columns: ':not(:first-child)'
                },
                init: function(api, node, config) {
                    node.removeClass('dt-button');
                }
            },
            {
                extend: 'pdfHtml5',
                text: 'Exportar a PDF',
                className: 'btn btn-danger',
                orientation: 'landscape', // 'portrait' o 'landscape'
                pageSize: 'A4', // 'A3', 'A4', 'A5', 'LEGAL', 'LETTER', 'TABLOID'
                exportOptions: {
                    columns: ':visible',
                    columns: ':not(:first-child)'
                },
                init: function(api, node, config) {
                    node.removeClass('dt-button');
                },
                customize: function (doc) {
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            },
            'colvis'
        ]
    });

    $('.tablanaturleon').DataTable();
    $('#tablaAgregarAgencias').DataTable();
    $('#tablaAdministrarAgencias').DataTable();
    $('#tablaAgregarHoteles').DataTable();
    $('#tablaAdministrarHoteles').DataTable();

    var today = new Date();
    var tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    $('.daterangefilter').daterangepicker({
        // "minDate": today,
        // "endDate": tomorrow,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Seleccionar",
            "cancelLabel": "Cancelar",
            "fromLabel": "Desde",
            "toLabel": "A",
            "customRangeLabel": "Custom",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        }
    },function(start, end) {
        startDate = start.format('YYYY-MM-DD');
        endDate = end.format('YYYY-MM-DD');    

        }
    )
});

document.addEventListener('DOMContentLoaded', function() {
    const myTab = document.getElementById('myTab');
    myTab.addEventListener('click', function(event) {
        const clickedTab = event.target.closest('.nav-link');
        if (clickedTab) {
            localStorage.setItem('lastActiveTabId', clickedTab.id);
        }
    });

    const lastActiveTabId = localStorage.getItem('lastActiveTabId');
    if (lastActiveTabId) {
        const lastActiveTab = document.getElementById(lastActiveTabId);
        if (lastActiveTab) {
            const defaultActiveTab = document.querySelector('#myTab .nav-link.active');
            if (defaultActiveTab) {
                defaultActiveTab.classList.remove('active');
                const defaultActivePane = document.querySelector('.tab-pane.fade.show.active');
                if (defaultActivePane) {
                    defaultActivePane.classList.remove('show', 'active');
                }
            }
            lastActiveTab.classList.add('active');
            const targetPaneId = lastActiveTab.getAttribute('href').substring(1);
            const targetPane = document.getElementById(targetPaneId);
            if (targetPane) {
                targetPane.classList.add('show', 'active');
            }
        }
    }

    $('#imageModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var imgSrc = button.data('img-src');
        var imgTitle = button.data('img-title');

        var modal = $(this);
        modal.find('.modal-title').text(imgTitle);
        modal.find('#modalImage').attr('src', imgSrc);
    });

});