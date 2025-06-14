/*=============================================
EDITAR CARRERA
=============================================*/
$(".btnEditarCarrera").click(function() {
    var idCarrera = $(this).attr("idCarrera");

    var datos = new FormData();
    datos.append("idCarrera", idCarrera);
    datos.append("action", "edit");  // Añadimos el identificador de acción

    $.ajax({
        url: "ajax/carreras.ajax.php", // Ruta correcta de tu archivo PHP
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            // Verificamos que la respuesta sea válida
            if (respuesta) {
                $("#editarCarrera").val(respuesta["carrera"]);
                $("#idCarrera").val(respuesta["id_carrera"]);
            } else {
                swal({
                    type: "error",
                    title: "Error",
                    text: "No se pudo obtener la información de la carrera.",
                    confirmButtonText: "Cerrar"
                });
            }
        },
        error: function() {
            swal({
                type: "error",
                title: "Error",
                text: "Hubo un problema al intentar editar la carrera. Por favor, intente nuevamente.",
                confirmButtonText: "Cerrar"
            });
        }
    });
});

/*=============================================
ELIMINAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnEliminarCarrera", function() {
    var idCarrera = $(this).attr("idCarrera");

    swal({
        title: '¿Está seguro de borrar la carrera?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar carrera!'
    }).then(function(result) {
        if (result.value) {
            // Llamada AJAX para eliminar la carrera
            $.ajax({
                url: "ajax/carreras.ajax.php",
                method: "POST",
                data: { 
                    idCarrera: idCarrera,
                    action: 'delete'  // Indicamos que la acción es eliminar
                },
                success: function(response) {
                    if(response === "ok") {
                        swal({
                            type: "success",
                            title: "La carrera ha sido borrada correctamente",
                            confirmButtonText: "Cerrar"
                        }).then(function() {
                            location.reload();  // Refrescamos la página
                        });
                    } else {
                        swal({
                            type: "error",
                            title: "Error al borrar la carrera",
                            text: "No se pudo eliminar la carrera. Intente nuevamente.",
                            confirmButtonText: "Cerrar"
                        });
                    }
                },
                error: function() {
                    swal({
                        type: "error",
                        title: "Error",
                        text: "Hubo un problema al intentar borrar la carrera. Por favor, intente nuevamente.",
                        confirmButtonText: "Cerrar"
                    });
                }
            });
        }
    });
});
