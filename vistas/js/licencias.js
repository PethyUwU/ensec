/* INICIALIZAR FULLCALENDAR */
$(document).ready(function () {
    inicializarCalendario();
});

let calendar;

function inicializarCalendario() {
    const calendarEl = document.getElementById('calendar');

    calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        events: function (fetchInfo, successCallback, failureCallback) {
            $.ajax({
                url: 'ajax/licencias.ajax.php',
                method: 'POST',
                data: { accion: 'listar' },
                dataType: 'json',
                success: successCallback,
                error: failureCallback
            });
        },
        dateClick: function (info) {
            abrirModalAgregar(info.dateStr);
        },
        eventClick: function (info) {
            abrirModalEditar(info.event);
        }
    });

    calendar.render();
}

function abrirModalAgregar(fecha) {
    $('#modalAgregarLicencia').modal('show');
    $("input[name='fecha_inicio']").val(fecha);
    cargarSelects();
}

function cargarSelects() {
    $.post('ajax/licencias.ajax.php', { accion: 'cargarEstudiantes' }, function (data) {
        $('#selectEstudiante').html(data);
    });
    $.post('ajax/licencias.ajax.php', { accion: 'cargarCarreras' }, function (data) {
        $('#selectCarrera').html(data);
    });
    $.post('ajax/licencias.ajax.php', { accion: 'cargarCursos' }, function (data) {
        $('#selectCurso').html(data);
    });
}

function abrirModalEditar(evento) {
    $('#modalEditarLicencia').modal('show');
    $('#editarIdLicencia').val(evento.id);
    $('#editarFechaInicio').val(evento.startStr);
    $('#editarFechaFin').val(evento.extendedProps.fecha_fin);
    $('#editarMotivo').val(evento.extendedProps.motivo);

    const archivo = evento.extendedProps.justificativo;
    if (archivo) {
        const extension = archivo.split('.').pop().toLowerCase();
        if (extension === 'pdf') {
            $('#contenedorJustificativo').html(`<iframe src="${archivo}" width="100%" height="300px"></iframe>`);
        } else {
            $('#contenedorJustificativo').html(`<img src="${archivo}" class="img-fluid">`);
        }
    }
}

$('#formAgregarLicencia').submit(function (e) {
    e.preventDefault();
    let datos = new FormData(this);
    datos.append('accion', 'crear');

    $.ajax({
        url: 'ajax/licencias.ajax.php',
        method: 'POST',
        data: datos,
        contentType: false,
        processData: false,
        success: function () {
            $('#modalAgregarLicencia').modal('hide');
            calendar.refetchEvents();
        }
    });
});

$('#formEditarLicencia').submit(function (e) {
    e.preventDefault();
    let datos = new FormData(this);
    datos.append('accion', 'editar');

    $.ajax({
        url: 'ajax/licencias.ajax.php',
        method: 'POST',
        data: datos,
        contentType: false,
        processData: false,
        success: function () {
            $('#modalEditarLicencia').modal('hide');
            calendar.refetchEvents();
        }
    });
});

$('#btnEliminarLicencia').click(function () {
    const id = $('#editarIdLicencia').val();
    if (confirm('¿Estás seguro de eliminar esta licencia?')) {
        $.post('ajax/licencias.ajax.php', { accion: 'eliminar', id_licencia: id }, function () {
            $('#modalEditarLicencia').modal('hide');
            calendar.refetchEvents();
        });
    }
});
