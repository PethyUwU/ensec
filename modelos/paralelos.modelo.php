<?php
require_once "conexion.php";

class ParaleloModel {
  /*=============================================
  MOSTRAR PARALELOS
  =============================================*/
  static public function mdlMostrarParalelos($tabla, $item, $valor) {
    if($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
      $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    } else {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
      $stmt->execute();
      return $stmt->fetchAll();
    }
    $stmt->close();
    $stmt = null;
  }

  /*=============================================
  CREAR PARALELO
  =============================================*/
  static public function mdlCrearParalelo($tabla, $datos) {
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(paralelo) VALUES (:paralelo)");
    $stmt->bindParam(":paralelo", $datos, PDO::PARAM_STR);
    
    if($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt = null;
  }

  /*=============================================
  EDITAR PARALELO
  =============================================*/
  static public function mdlEditarParalelo($tabla, $datos) {
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET paralelo = :paralelo WHERE id = :id");
    $stmt->bindParam(":paralelo", $datos["paralelo"], PDO::PARAM_STR);
    $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
    
    if($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt = null;
  }

  /*=============================================
  BORRAR PARALELO
  =============================================*/
  static public function mdlBorrarParalelo($tabla, $datos) {
    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
    $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
    
    if($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt = null;
  }
}
?>