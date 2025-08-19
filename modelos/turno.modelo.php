<?php

require_once "conexion.php";

class ModeloTurno {

  /*=============================================
  MOSTRAR TURNOS
  =============================================*/
  static public function mdlMostrarTurnos($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    } else {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY turno");
      $stmt->execute();
      return $stmt->fetchAll();
    }
    $stmt = null;
  }

  /*=============================================
  INGRESAR TURNO
  =============================================*/
  static public function mdlIngresarTurno($tabla, $datos) {
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(turno, hora_inicio, hora_fin) VALUES (:turno, :hora_inicio, :hora_fin)");
    $stmt->bindParam(":turno", $datos["turno"], PDO::PARAM_STR);
    $stmt->bindParam(":hora_inicio", $datos["hora_inicio"], PDO::PARAM_STR);
    $stmt->bindParam(":hora_fin", $datos["hora_fin"], PDO::PARAM_STR);

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt = null;
  }

  /*=============================================
  EDITAR TURNO
  =============================================*/
  static public function mdlEditarTurno($tabla, $datos) {
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET turno = :turno, hora_inicio = :hora_inicio, hora_fin = :hora_fin WHERE id_turno = :id_turno");
    $stmt->bindParam(":id_turno", $datos["id_turno"], PDO::PARAM_INT);
    $stmt->bindParam(":turno", $datos["turno"], PDO::PARAM_STR);
    $stmt->bindParam(":hora_inicio", $datos["hora_inicio"], PDO::PARAM_STR);
    $stmt->bindParam(":hora_fin", $datos["hora_fin"], PDO::PARAM_STR);

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt = null;
  }

  /*=============================================
  BORRAR TURNO
  =============================================*/
  static public function mdlBorrarTurno($tabla, $datos) {
    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_turno = :id_turno");
    $stmt->bindParam(":id_turno", $datos, PDO::PARAM_INT);

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt = null;
  }
}

?>
