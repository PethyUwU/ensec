<?php

require_once "../controladores/carreras.controlador.php";
require_once "../modelos/carreras.modelo.php";

class AjaxCarreras{

	/*=============================================
	EDITAR CARRERA
	=============================================*/	

	public $idCarrera;

	public function ajaxEditarCarrera(){

		$item = "id_carrera"; 
		$valor = $this->idCarrera;

		$respuesta = ControladorCarreras::ctrMostrarCarreras($item, $valor);

		echo json_encode($respuesta);

	}



}

/*=============================================
EDITAR CARRERA
=============================================*/	
if(isset($_POST["idCarrera"])){

	$carrera = new AjaxCarreras();
	$carrera -> idCarrera = $_POST["idCarrera"];
	$carrera -> ajaxEditarCarrera();
}
