<?php

require_once "../controladores/gestiones.controlador.php";

if(isset($_POST["gestion"])) {
    ControladorGestiones::ctrCrearGestion();
}

if(isset($_GET["id_gestion"])) {
    ControladorGestiones::ctrMostrarGestiones("id_gestion", $_GET["id_gestion"]);
}

if(isset($_POST["id_gestion"])) {
    ControladorGestiones::ctrEliminarGestion();
}

?>
