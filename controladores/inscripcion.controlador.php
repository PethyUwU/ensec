<?php
class ControladorInscripcion {

  static public function ctrlListar($item=null, $valor=null){
    return ModeloInscripcion::mdlListarInscripciones("inscripcion", $item, $valor);
  }

  public function ctrlCrearInscripcion(){
    if(isset($_POST["id_usuario"], $_POST["id_gestion"], $_POST["id_curso"],
             $_POST["id_carrera"], $_POST["id_turno"], $_POST["id_paralelo"], $_POST["fecha_inscripcion"])){

      if (!isset($_SESSION)) session_start();
      $responsable = $_POST["id_responsable"] ?? ($_SESSION["id"] ?? "");

      $d = [
        "id_usuario"        => (int)$_POST["id_usuario"],
        "id_gestion"        => (int)$_POST["id_gestion"],
        "id_curso"          => (int)$_POST["id_curso"],
        "id_carrera"        => (int)$_POST["id_carrera"],
        "id_turno"          => (int)$_POST["id_turno"],
        "id_paralelo"       => (int)$_POST["id_paralelo"],
        "fecha_inscripcion" => $_POST["fecha_inscripcion"],
        "id_responsable"    => substr((string)$responsable,0,11)
      ];
      if(ModeloInscripcion::mdlCrear("inscripcion",$d)=="ok"){
        echo "<script>window.location='inscripcion';</script>";
      }
    }
  }

  public function ctrlEditarInscripcion(){
    if(isset($_POST["id_inscripcion"])){
      if (!isset($_SESSION)) session_start();
      $responsable = $_POST["id_responsable"] ?? ($_SESSION["id"] ?? "");
      $d = [
        "id_inscripcion"    => (int)$_POST["id_inscripcion"],
        "id_usuario"        => (int)$_POST["id_usuario"],
        "id_gestion"        => (int)$_POST["id_gestion"],
        "id_curso"          => (int)$_POST["id_curso"],
        "id_carrera"        => (int)$_POST["id_carrera"],
        "id_turno"          => (int)$_POST["id_turno"],
        "id_paralelo"       => (int)$_POST["id_paralelo"],
        "fecha_inscripcion" => $_POST["fecha_inscripcion"],
        "id_responsable"    => substr((string)$responsable,0,11)
      ];
      if(ModeloInscripcion::mdlEditar("inscripcion",$d)=="ok"){
        echo "<script>window.location='inscripcion';</script>";
      }
    }
  }

  public function ctrlBorrarInscripcion(){
    if(isset($_GET["idInscripcion"])){
      if(ModeloInscripcion::mdlEliminar("inscripcion",(int)$_GET["idInscripcion"])=="ok"){
        echo "<script>window.location='inscripcion';</script>";
      }
    }
  }
}
