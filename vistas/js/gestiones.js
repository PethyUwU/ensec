$(document).ready(function(){
    // Cargar gestiones
    function cargarGestiones() {
        $.ajax({
            url: "ajax/gestiones.ajax.php",
            method: "GET",
            success: function(respuesta) {
                const gestiones = JSON.parse(respuesta);
                let html = '';
                gestiones.forEach(function(gestion) {
                    html += `<tr>
                                <td>${gestion.id_gestion}</td>
                                <td>${gestion.gestion}</td>
                                <td>
                                    <button class="btn btn-info btnEditarGestion" data-toggle="modal" data-target="#modalEditarGestion" data-id="${gestion.id_gestion}">Editar</button>
                                    <button class="btn btn-danger btnEliminarGestion" data-id="${gestion.id_gestion}">Eliminar</button>
                                </td>
                            </tr>`;
                });
                $("#tablaGestiones tbody").html(html);
            }
        });
    }

    // Crear gestión
    $("#formGestion").submit(function(e){
        e.preventDefault();
        let gestion = $("#gestion").val();
        $.ajax({
            url: "ajax/gestiones.ajax.php",
            method: "POST",
            data: { gestion: gestion },
            success: function(respuesta) {
                if(respuesta == "ok") {
                    cargarGestiones();
                    $('#modalAgregarGestion').modal('hide');
                }
            }
        });
    });

    // Eliminar gestión
    $(document).on("click", ".btnEliminarGestion", function(){
        let id_gestion = $(this).data("id");
        $.ajax({
            url: "ajax/gestiones.ajax.php",
            method: "POST",
            data: { id_gestion: id_gestion },
            success: function(respuesta) {
                if(respuesta == "ok") {
                    cargarGestiones();
                }
            }
        });
    });

    // Editar gestión
    $(document).on("click", ".btnEditarGestion", function(){
        let id_gestion = $(this).data("id");
        $.ajax({
            url: "ajax/gestiones.ajax.php",
            method: "GET",
            data: { id_gestion: id_gestion },
            success: function(respuesta) {
                const gestion = JSON.parse(respuesta);
                $("#gestion").val(gestion.gestion);
            }
        });
    });

    // Inicializar carga de gestiones
    cargarGestiones();
});
