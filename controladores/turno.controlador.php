<?php

class ControladorTurno {
    
    /* Mostrar turnos */
    static public function ctrMostrarTurnos($item, $valor) {
        $tabla = "turno";
        $respuesta = ModeloTurno::mdlMostrarTurnos($tabla, $item, $valor);
        return $respuesta;
    }

    /* Crear turno */
    public function ctrCrearTurno() {
        if(isset($_POST["nuevoNombre"])) {
            $datos = array(
                "nombre" => $_POST["nuevoNombre"],
                "horainicio" => $_POST["nuevoHorainicio"],
                "horafin" => $_POST["nuevoHorafin"]
            );
            
            $respuesta = ModeloTurno::mdlCrearTurno("turno", $datos);
            
            if($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "¡El turno ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location = "turnos";
                        }
                    });
                </script>';
            }
        }
    }

    /* Editar turno */

    public static function ctrEditarTurno() {

        if (isset($_POST["editarNombre"])) {
            $tabla = "turno";
            $datos = array(
                "id" => $_POST["idTurno"],
                "nombre" => $_POST["editarNombre"],
                "horainicio" => $_POST["editarHorainicio"],
                "horafin" => $_POST["editarHorafin"]
            );
    
            $respuesta = ModeloTurno::mdlEditarTurno($tabla, $datos);
    
            if($respuesta == "ok") {

                echo '<script>
                    swal({
                        type: "success",
                        title: "¡La turno ha sido actualizada correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if (result.value) {
                            window.location = "turnos";
                        }
                    })
                </script>';

            } else {

                echo '<script>
                    swal({
                        type: "error",
                        title: "¡Error al actualizar la turno!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if (result.value) {
                            window.location = "turnos";
                        }
                    })
                </script>';
            }
        }
    }
    

    /* Eliminar turno */
    public function ctrEliminarTurno() {
        if(isset($_GET["idTurno"])) {
            $respuesta = ModeloTurno::mdlEliminarTurno("turno", $_GET["idTurno"]);
            
            if($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "¡El turno ha sido eliminado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location = "turnos";
                        }
                    });
                </script>';
            }
        }
    }
}