<?php

require_once "../controladores/cursos.controlador.php";
require_once "../modelos/cursos.modelo.php";

class AjaxCursos {

  public $idCurso;

  public function ajaxEditarCurso(){

    $item = "id_curso";
    $valor = $this->idCurso;

    $respuesta = ControladorCursos::ctrMostrarCursos($item, $valor);

    echo json_encode($respuesta);
  }
}

/*=============================================
EDITAR CURSO
=============================================*/	
if(isset($_POST["idCurso"])){

  $editar = new AjaxCursos();
  $editar -> idCurso = $_POST["idCurso"];
  $editar -> ajaxEditarCurso();
}
