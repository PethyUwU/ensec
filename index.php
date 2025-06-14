<?php 

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/carrera.controlador.php";
require_once "controladores/gestiones.controlador.php";
require_once "controladores/turno.controlador.php";
require_once "controladores/paralelos.controlador.php";
require_once "controladores/cursos.controlador.php";
//require_once "controladores/asistencia.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/carrera.modelo.php";
require_once "modelos/gestiones.modelo.php";
require_once "modelos/turno.modelo.php";
require_once "modelos/paralelos.modelo.php";
require_once "modelos/cursos.modelo.php";
//require_once "modelos/asistencia.modelo.php";


 
 $plantilla=new ControladorPlantilla();
 $plantilla->crtPlantilla();

 ?>