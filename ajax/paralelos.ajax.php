<?php
require_once "../controladores/paralelos.controlador.php";
require_once "../modelos/paralelos.modelo.php";

class AjaxParalelos {
  public $idParalelo;

  public function ajaxEditarParalelo() {
    $item = "id_paralelo";
    $valor = $this->idParalelo;
    $respuesta = ControladorParalelos::ctrMostrarParalelos($item, $valor);
    echo json_encode($respuesta);
  } 
}

if(isset($_POST["idParalelo"])) {
  $editar = new AjaxParalelos();
  $editar->idParalelo = $_POST["idParalelo"];
  $editar->ajaxEditarParalelo();
}
?>