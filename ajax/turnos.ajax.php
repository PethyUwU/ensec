<?php
require_once "../controladores/turno.controlador.php";
require_once "../modelos/turno.modelo.php";

if(isset($_POST["idTurno"])) {
    $item = "id";
    $valor = $_POST["idTurno"];
    $respuesta = ControladorTurno::ctrMostrarTurnos($item, $valor);
    echo json_encode($respuesta);
}