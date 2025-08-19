// turno.js actualizado
document.addEventListener("DOMContentLoaded", function () {

  // Editar Turno - Cargar datos en el modal
  document.querySelectorAll(".btnEditarTurno").forEach(function (btn) {
    btn.addEventListener("click", function () {
      var idTurno = this.getAttribute("idTurno");

      var datos = new FormData();
      datos.append("idTurno", idTurno);

      fetch("ajax/turnos.ajax.php", {
        method: "POST",
        body: datos
      })
        .then(response => response.json())
        .then(respuesta => {
          document.getElementById("editarTurno").value = respuesta["turno"];
          document.getElementById("editarHorainicio").value = respuesta["hora_inicio"];
          document.getElementById("editarHorafin").value = respuesta["hora_fin"];
          document.getElementById("idTurno").value = respuesta["id_turno"];
        });
    });
  });

  // Eliminar Turno
  document.querySelectorAll(".btnEliminarTurno").forEach(function (btn) {
    btn.addEventListener("click", function () {
      var idTurno = this.getAttribute("idTurno");

      swal({
        title: '¿Está seguro de borrar el turno?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Sí, borrar turno!'
      }).then((result) => {
        if (result.value) {
          window.location = "index.php?ruta=turnos&idTurno=" + idTurno;
        }
      });
    });
  });
});
