<?php

require_once "../controladores/gestiones.controlador.php";
require_once "../modelos/gestiones.modelo.php";

class AjaxGestiones{

	/*=============================================
	EDITAR GESTIÓN
	=============================================*/	

	public $idGestion;

	public function ajaxEditarGestion(){

		$item = "id_gestion";
		$valor = $this->idGestion;

		$respuesta = ControladorGestiones::ctrMostrarGestiones($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR GESTIÓN
=============================================*/	
if(isset($_POST["idGestion"])){

	$gestion = new AjaxGestiones();
	$gestion -> idGestion = $_POST["idGestion"];
	$gestion -> ajaxEditarGestion();
}
