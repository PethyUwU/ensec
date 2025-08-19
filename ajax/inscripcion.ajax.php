<?php
header("Content-Type: application/json; charset=utf-8");
require_once "../modelos/inscripcion.modelo.php";

$accion = $_GET["accion"] ?? "";

switch ($accion) {
  case "cursos":
    $id_carrera = (int)($_GET["id_carrera"] ?? 0);
    echo json_encode(ModeloInscripcion::mdlCursosPorCarrera($id_carrera));
    break;

  case "paralelos":
    $id_curso = (int)($_GET["id_curso"] ?? 0);
    echo json_encode(ModeloInscripcion::mdlParalelosPorCurso($id_curso));
    break;

  case "inscripcion":
    $id = (int)($_GET["id_inscripcion"] ?? 0);
    echo json_encode(ModeloInscripcion::mdlObtenerPorId("inscripcion",$id));
    break;

  default:
    echo json_encode(["error"=>"acción no válida"]);
}
