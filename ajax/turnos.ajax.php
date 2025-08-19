<?php

require_once "../controladores/turno.controlador.php";
require_once "../modelos/turno.modelo.php";

class AjaxTurnos {

  public $idTurno;

  public function ajaxEditarTurno() {
    $item = "id_turno";
    $valor = $this->idTurno;

    $respuesta = ControladorTurno::ctrMostrarTurnos($item, $valor);
    echo json_encode($respuesta);
  }
}

/*=============================================
=            EDITAR TURNO           =
=============================================*/

if (isset($_POST["idTurno"])) {
  $editar = new AjaxTurnos();
  $editar->idTurno = $_POST["idTurno"];
  $editar->ajaxEditarTurno();
}

?>
