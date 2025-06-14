<?php
require_once "modelos/asistencia.modelo.php";

class ControladorAsistencia {

  // Mostrar estudiantes y asistencia
  static public function ctrMostrarEstudiantesAsistencia($idAsignatura, $fecha) {
    $estudiantes = ModeloAsistencia::mdlMostrarEstudiantes($idAsignatura);
    $asistencia = ModeloAsistencia::mdlMostrarAsistencia($idAsignatura, $fecha);

    return ['estudiantes' => $estudiantes, 'asistencia' => $asistencia];
  }

  // Guardar asistencia
  static public function ctrGuardarAsistencia($datos) {
    return ModeloAsistencia::mdlGuardarAsistencia($datos);
  }
}
