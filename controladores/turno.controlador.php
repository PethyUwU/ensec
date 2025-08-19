<?php

class ControladorTurno {

  /*=============================================
  MOSTRAR TURNOS
  =============================================*/
  static public function ctrMostrarTurnos($item, $valor) {
    $tabla = "turnos";
    $respuesta = ModeloTurno::mdlMostrarTurnos($tabla, $item, $valor);
    return $respuesta;
  }

  /*=============================================
  CREAR TURNO
  =============================================*/
  static public function ctrCrearTurno() {
    if (isset($_POST["nuevoTurno"])) {

      $tabla = "turnos";
      $datos = array(
        "turno" => $_POST["nuevoTurno"],
        "hora_inicio" => $_POST["nuevoHorainicio"],
        "hora_fin" => $_POST["nuevoHorafin"]
      );

      $respuesta = ModeloTurno::mdlIngresarTurno($tabla, $datos);

      if ($respuesta == "ok") {
        echo '<script>
          swal({
            type: "success",
            title: "¡El turno ha sido guardado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
          }).then(function(result){
            if (result.value) {
              window.location = "turnos";
            }
          });
        </script>';
      }
    }
  }

  /*=============================================
  EDITAR TURNO
  =============================================*/
  static public function ctrEditarTurno() {
    if (isset($_POST["editarTurno"])) {


      $tabla = "turnos";
      $datos = array(
        "id_turno" => $_POST["idTurno"],
        "turno" => $_POST["editarTurno"],
        "hora_inicio" => $_POST["editarHorainicio"],
        "hora_fin" => $_POST["editarHorafin"]
      );

      $respuesta = ModeloTurno::mdlEditarTurno($tabla, $datos);

      if ($respuesta == "ok") {
        echo '<script>
          swal({
            type: "success",
            title: "¡El turno ha sido editado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
          }).then(function(result){
            if (result.value) {
              window.location = "turnos";
            }
          });
        </script>';
      }
    }
  }

  /*=============================================
  BORRAR TURNO
  =============================================*/
  static public function ctrBorrarTurno() {
    if (isset($_GET["idTurno"])) {
      $tabla = "turnos";
      $datos = $_GET["idTurno"];
      $respuesta = ModeloTurno::mdlBorrarTurno($tabla, $datos);

      if ($respuesta == "ok") {
        echo '<script>
          swal({
            type: "success",
            title: "¡El turno ha sido eliminado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
          }).then(function(result){
            if (result.value) {
              window.location = "turnos";
            }
          });
        </script>';
      }
    }
  }
}

?>
