<?php
require_once "conexion.php";

class ModeloLicencias {

  static public function mdlMostrarLicencias() {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM licencias");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  static public function mdlCrearLicencia($datos) {
    $stmt = Conexion::conectar()->prepare("INSERT INTO licencias(id_estudiante, id_carrera, id_curso, fecha_inicio, fecha_fin, motivo, justificativo) VALUES (:id_estudiante, :id_carrera, :id_curso, :fecha_inicio, :fecha_fin, :motivo, :justificativo)");
    $stmt->bindParam(":id_estudiante", $datos["id_estudiante"], PDO::PARAM_INT);
    $stmt->bindParam(":id_carrera", $datos["id_carrera"], PDO::PARAM_INT);
    $stmt->bindParam(":id_curso", $datos["id_curso"], PDO::PARAM_INT);
    $stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
    $stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);
    $stmt->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
    $stmt->bindParam(":justificativo", $datos["justificativo"], PDO::PARAM_STR);
    return $stmt->execute();
  }

  static public function mdlEditarLicencia($datos) {
    $sql = "UPDATE licencias SET fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin, motivo = :motivo";
    if (!empty($datos['justificativo'])) {
      $sql .= ", justificativo = :justificativo";
    }
    $sql .= " WHERE id_licencia = :id_licencia";

    $stmt = Conexion::conectar()->prepare($sql);
    $stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
    $stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);
    $stmt->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
    if (!empty($datos['justificativo'])) {
      $stmt->bindParam(":justificativo", $datos["justificativo"], PDO::PARAM_STR);
    }
    $stmt->bindParam(":id_licencia", $datos["id_licencia"], PDO::PARAM_INT);
    return $stmt->execute();
  }

  static public function mdlEliminarLicencia($id) {
    $stmt = Conexion::conectar()->prepare("DELETE FROM licencias WHERE id_licencia = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    return $stmt->execute();
  }

  static public function mdlCargarEstudiantes() {
    $stmt = Conexion::conectar()->prepare("SELECT id_estudiante FROM estudiante");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  static public function mdlCargarCarreras() {
    $stmt = Conexion::conectar()->prepare("SELECT id_carrera, carrera FROM carreras");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  static public function mdlCargarCursos() {
    $stmt = Conexion::conectar()->prepare("SELECT id_curso, curso FROM cursos");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
