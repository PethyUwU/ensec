$(document).ready(function() {
    
  // Editar Turno - Cargar datos en el modal
  $(".btnEditarTurno").click(function() {
      var idTurno = $(this).attr("idTurno");
      
      var datos = new FormData();
      datos.append("idTurno", idTurno);

      $.ajax({
          url: "ajax/turnos.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(respuesta) {
              $("#editarNombre").val(respuesta["nombre"]);
              $("#editarHorainicio").val(respuesta["horainicio"]);
              $("#editarHorafin").val(respuesta["horafin"]);
              $("#idTurno").val(respuesta["id"]);
          }
      });
  });

  // Eliminar Turno
  $(".btnEliminarTurno").click(function() {
      var idTurno = $(this).attr("idTurno");
      
      swal({
          title: '¿Está seguro de borrar el turno?',
          text: "¡Si no lo está puede cancelar la acción!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Si, borrar turno!'
      }).then((result) => {
          if (result.value) {
              window.location = "index.php?ruta=turnos&idTurno="+idTurno;
          }
      });
  });
});