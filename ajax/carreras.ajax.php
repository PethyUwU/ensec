<?php

require_once "../controladores/carrera.controlador.php";
require_once "../modelos/carrera.modelo.php";

class AjaxCarreras {

    public $idCarrera;

    public function ajaxEditarCarrera() {
        // Definimos los parámetros para la consulta
        $item = "id_carrera";
        $valor = $this->idCarrera;

        // Llamamos al controlador para obtener la carrera correspondiente
        $respuesta = ControladorCarreras::ctrMostrarCarreras($item, $valor);

        // Devolvemos la respuesta en formato JSON
        echo json_encode($respuesta);
    }
}

/*=============================================
EDITAR CARRERA
=============================================*/  
if (isset($_POST["idCarrera"])) {
    $carrera = new AjaxCarreras();
    $carrera->idCarrera = $_POST["idCarrera"];  // Asignamos el valor del idCarrera
    $carrera->ajaxEditarCarrera();  // Llamamos al método para obtener la carrera
}
