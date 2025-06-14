<?php

require_once "modelos/gestiones.modelo.php";

class ControladorGestiones {

    /*=============================================
    CREAR GESTIÓN
    =============================================*/

    static public function ctrCrearGestion(){

        if(isset($_POST["gestion"])){
            $tabla = "gestiones";  // Se mantiene el nombre de la tabla
            $datos = $_POST["gestion"];
            $respuesta = ModeloGestiones::mdlIngresarGestion($tabla, $datos);
            echo $respuesta;
        }
    }

    /*=============================================
    MOSTRAR GESTIONES
    =============================================*/

    static public function ctrMostrarGestiones($item, $valor){

        $tabla = "gestiones";  // Se mantiene el nombre de la tabla
        $respuesta = ModeloGestiones::mdlMostrarGestiones($tabla, $item, $valor);
        return $respuesta;
    }

    /*=============================================
    EDITAR GESTIÓN
    =============================================*/

    static public function ctrEditarGestion(){

        if(isset($_POST["id_gestion"])){
            $tabla = "gestiones";  // Se mantiene el nombre de la tabla
            $datos = array(
                "id_gestion" => $_POST["id_gestion"],
                "gestion" => $_POST["gestion"]
            );
            $respuesta = ModeloGestiones::mdlEditarGestion($tabla, $datos);
            echo $respuesta;
        }
    }

    /*=============================================
    ELIMINAR GESTIÓN
    =============================================*/

    static public function ctrEliminarGestion(){

        if(isset($_POST["id_gestion"])){
            $tabla = "gestiones";  // Se mantiene el nombre de la tabla
            $respuesta = ModeloGestiones::mdlEliminarGestion($tabla, $_POST["id_gestion"]);
            echo $respuesta;
        }
    }
}
?>
