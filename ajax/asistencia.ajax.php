<?php
require_once "../modelos/asistencia.modelo.php";
require_once "../controladores/asistencia.controlador.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $datos = [
    'id_asignatura' => $_POST['id_asignatura'],
    'fecha' => $_POST['fecha'],
    'id_docente' => $_POST['id_docente'],
    'asistencia' => $_POST['asistencia'],
  ];

  $respuesta = ControladorAsistencia::ctrGuardarAsistencia($datos);

  if ($respuesta === "ok") {
    echo "Asistencia guardada correctamente";
  } else {
    echo "Error: " . $respuesta;
  }
}
