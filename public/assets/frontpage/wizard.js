$(document).ready(function () {
    $('.nav-tabs > li a[title]').tooltip();

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target);
        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {
        
        e.preventDefault();

        var activeTabPaneId = $('.tab-pane.active').attr('id');
        var currentForm = $('#' + activeTabPaneId);
        var isValid = true;

        currentForm.find('[required]').each(function() {
            if ($(this).val() === '' || $(this).val() === '0') {
                isValid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

       
        if (activeTabPaneId === 'step1') {
            var password = $('#passwordagencia').val();
            var confirmPassword = $('#confirmacionpassword').val();
            if (password != confirmPassword) {
                Swal.fire({   
                    title: "¡Error!",   
                    text: "Las contraseñas no coinciden.",
                    type: "error"
                });
                isValid = false;
                $('#passwordagencia').addClass('is-invalid');
                $('#confirmacionpassword').addClass('is-invalid');
            }
        }


        if (isValid) {
            var active = $('.wizard .nav-tabs li.active');
            active.next().removeClass('disabled');
            nextTab(active);
        } else {
            Swal.fire({   
                title: "¡Error!",   
                text: "Por favor, completa todos los campos requeridos antes de continuar.",
                type: "error"
            });
        }
    });

    $(".prev-step").click(function (e) {
        var active = $('.wizard .nav-tabs li.active');
        prevTab(active);
    });

});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}

function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

$('.nav-tabs').on('click', 'li', function() {

    var activeTabPaneId = $('.tab-pane.active').attr('id');
    var currentForm = $('#' + activeTabPaneId);
    var isValid = true;

    currentForm.find('[required]').each(function() {
        if ($(this).val() === '' || $(this).val() === '0') {
            isValid = false;
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });

    if (activeTabPaneId === 'step1') {
        var password = $('#passwordagencia').val();
        var confirmPassword = $('#confirmacionpassword').val();
        if (password !== confirmPassword) {
            isValid = false;
            $('#passwordagencia').addClass('is-invalid');
            $('#confirmacionpassword').addClass('is-invalid');
        }
    }

    if (!$(this).hasClass('disabled') && isValid) {
        $('.nav-tabs li.active').removeClass('active');
        $(this).addClass('active');
    } else if ($(this).hasClass('disabled')) {
        return false;
    } else {
        Swal.fire({   
            title: "¡Error!",   
            text: "Por favor, completa todos los campos requeridos antes de continuar.",
            type: "error"
        });
        return false;
    }
});