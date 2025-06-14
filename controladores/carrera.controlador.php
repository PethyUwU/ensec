<?php

class ControladorCarreras {

    /*=============================================
    CREAR CARRERAS
    =============================================*/
    static public function ctrCrearCarrera() {

        if (isset($_POST["nuevaCarrera"])) {

            // Validación del nombre de la carrera (solo letras y números, sin caracteres especiales)
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCarrera"])) {

                $tabla = "carreras";
                $datos = $_POST["nuevaCarrera"];

                // Llamada al modelo para insertar la carrera
                $respuesta = ModeloCarreras::mdlIngresarCarrera($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "La carrera ha sido guardada correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if (result.value) {
                                window.location = "carreras";
                            }
                        })
                    </script>';
                }

            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡La carrera no puede ir vacía o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "carreras";
                        }
                    })
                </script>';
            }
        }
    }

    /*=============================================
    MOSTRAR CARRERAS
    =============================================*/
    static public function ctrMostrarCarreras($item, $valor) {

        $tabla = "carreras";
        $respuesta = ModeloCarreras::mdlMostrarCarreras($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
    EDITAR CARRERA
    =============================================*/
    public function ctrEditarCarrera() {

        if (isset($_POST["editarCarrera"])) {

            // Validar que el campo no esté vacío y no tenga caracteres especiales
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCarrera"])) {

                $tabla = "carreras";
                $datos = array(
                    "id_carrera" => $_POST["idCarrera"],
                    "carrera" => $_POST["editarCarrera"],
                    "fecha" => date('Y-m-d H:i:s') // Actualiza la fecha al momento de editar
                );

                // Llamada al modelo para editar la carrera
                $respuesta = ModeloCarreras::mdlEditarCarrera($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "¡La carrera ha sido actualizada correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if (result.value) {
                                window.location = "carreras";
                            }
                        })
                    </script>';
                } else {
                    echo '<script>
                        swal({
                            type: "error",
                            title: "¡Error al actualizar la carrera!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if (result.value) {
                                window.location = "carreras";
                            }
                        })
                    </script>';
                }

            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡El nombre de la carrera no puede ir vacío o contener caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "carreras";
                        }
                    })
                </script>';
            }
        }
    }

    /*=============================================
    BORRAR CARRERA
    =============================================*/
    static public function ctrBorrarCarrera() {

        if (isset($_POST["idCarrera"])) {

            $tabla = "carreras";
            $datos = $_POST["idCarrera"];

            // Llamada al modelo para borrar la carrera
            $respuesta = ModeloCarreras::mdlBorrarCarrera($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "La carrera ha sido borrada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "carreras";
                        }
                    })
                </script>';
            }
        }
    }
}
?>
