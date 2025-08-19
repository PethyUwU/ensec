<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
header("Content-Type: application/json; charset=utf-8");

require_once "./controladores/inscripcion.controlador.php";
require_once "./modelos/inscripcion.modelo.php";

$accion = $_POST["accion"] ?? $_GET["accion"] ?? "datatable";

switch ($accion) {

  // === LISTADO PARA DATATABLE ===
  case "datatable":
    $ins = ControladorInscripcion::ctrMostrar(null,null);
    $rows = [];
    if(is_array($ins)){
      foreach ($ins as $r) {
        $acciones = "<div class='btn-group'>
            <button class='btn btn-warning btnEditarInscripcion' idInscripcion='{$r["id_inscripcion"]}'><i class='fa fa-pencil'></i></button>
            <button class='btn btn-danger btnEliminarInscripcion' idInscripcion='{$r["id_inscripcion"]}'><i class='fa fa-times'></i></button>
          </div>";
        $rows[] = [
          $r["id_inscripcion"],
          $r["estudiante"] ?? "",
          $r["carrera"] ?? "",
          $r["curso"] ?? "",
          $r["turno"] ?? "",
          $r["fecha_inscripcion"] ?? "",
          $r["responsable"] ?? "",
          $acciones
        ];
      }
    }
    echo json_encode(["data"=>$rows], JSON_UNESCAPED_UNICODE);
    break;

  // === CRUD ===
  case "crear":
    echo json_encode(ControladorInscripcion::ctrCrear() ?: ["ok"=>false,"msg"=>"Solicitud inválida"]);
    break;

  case "editar":
    echo json_encode(ControladorInscripcion::ctrEditar() ?: ["ok"=>false,"msg"=>"Solicitud inválida"]);
    break;

  case "eliminar":
    echo json_encode(ControladorInscripcion::ctrEliminar() ?: ["ok"=>false,"msg"=>"Solicitud inválida"]);
    break;

  case "obtener":
    if(!isset($_POST["id_inscripcion"])) { echo json_encode(["ok"=>false,"msg"=>"Falta id_inscripcion"]); break; }
    $data = ControladorInscripcion::ctrMostrar("id_inscripcion",(int)$_POST["id_inscripcion"]);
    echo json_encode(["ok"=>true,"data"=>$data]);
    break;

  // Dependiente: Carrera -> Cursos
  case "cursosPorCarrera":
    echo json_encode(ControladorInscripcion::ctrCursosPorCarrera());
    break;

  default:
    echo json_encode(["ok"=>false,"msg"=>"Acción no soportada"]);
}
