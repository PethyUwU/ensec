<?php
class ControladorInscripcion {

  static public function ctrMostrar($item=null,$valor=null){
    return ModeloInscripcion::mdlMostrar($item,$valor);
  }

  static public function ctrCrear(){
    if(isset($_POST["id_usuario"],$_POST["id_gestion"],$_POST["id_carrera"],$_POST["id_curso"],$_POST["id_turno"])){
      session_start();
      if(!isset($_SESSION["id"]) || $_SESSION["perfil"] !== "Secretaria"){
        return ["ok"=>false,"msg"=>"No autorizado"];
      }
      $datos = [
        "id_usuario"     => (int)$_POST["id_usuario"],
        "id_gestion"     => (int)$_POST["id_gestion"],
        "id_carrera"     => (int)$_POST["id_carrera"],
        "id_curso"       => (int)$_POST["id_curso"],
        "id_turno"       => (int)$_POST["id_turno"],
        "id_responsable" => (int)$_SESSION["id"]
      ];
      $r = ModeloInscripcion::mdlCrear($datos);
      return $r==="ok" ? ["ok"=>true] : ["ok"=>false,"msg"=>"No se pudo guardar"];
    }
    return null;
  }

  static public function ctrEditar(){
    if(isset($_POST["id_inscripcion"])){
      $datos = [
        "id_inscripcion" => (int)$_POST["id_inscripcion"],
        "id_usuario"     => (int)$_POST["id_usuario"],
        "id_gestion"     => (int)$_POST["id_gestion"],
        "id_carrera"     => (int)$_POST["id_carrera"],
        "id_curso"       => (int)$_POST["id_curso"],
        "id_turno"       => (int)$_POST["id_turno"]
      ];
      $r = ModeloInscripcion::mdlEditar($datos);
      return $r==="ok" ? ["ok"=>true] : ["ok"=>false,"msg"=>"No se pudo actualizar"];
    }
    return null;
  }

  static public function ctrEliminar(){
    if(isset($_POST["id_inscripcion"])){
      $r = ModeloInscripcion::mdlEliminar((int)$_POST["id_inscripcion"]);
      return $r==="ok" ? ["ok"=>true] : ["ok"=>false,"msg"=>"No se pudo eliminar"];
    }
    return null;
  }

  static public function ctrCursosPorCarrera(){
    if(!isset($_POST["id_carrera"])) return ["ok"=>false,"msg"=>"Falta id_carrera"];
    return ["ok"=>true,"data"=>ModeloInscripcion::mdlCursosPorCarrera((int)$_POST["id_carrera"])];
  }
}
