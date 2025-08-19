<?php
require_once "conexion.php";

class ModeloInscripcion {

  private static $tabla = "inscripcion"; // ← Cambia a "inscripciones" si tu tabla real se llama así.

  static public function mdlMostrar($item = null, $valor = null){
    $pdo = Conexion::conectar();

    $sqlBase = "SELECT i.*,
                   CONCAT(est.nombre,' ',COALESCE(est.apellidoP,''),' ',COALESCE(est.apellidoM,'')) AS estudiante,
                   c.nombre AS carrera, cu.nombre AS curso, t.nombre AS turno,
                   CONCAT(sec.nombre,' ',COALESCE(sec.apellidoP,''),' ',COALESCE(sec.apellidoM,'')) AS responsable
                FROM ".self::$tabla." i
                JOIN usuarios est ON est.id = i.id_usuario
                JOIN carreras c   ON c.id_carrera = i.id_carrera
                JOIN cursos cu    ON cu.id_curso   = i.id_curso
                JOIN turnos t     ON t.id_turno    = i.id_turno
                JOIN usuarios sec ON sec.id = i.id_responsable";

    if($item){
      $stmt = $pdo->prepare($sqlBase." WHERE i.$item = :valor ORDER BY i.id_inscripcion DESC");
      $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }else{
      $stmt = $pdo->query($sqlBase." ORDER BY i.id_inscripcion DESC");
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  }

  static public function mdlCrear($datos){
    $sql = "INSERT INTO ".self::$tabla."
            (id_usuario,id_gestion,id_carrera,id_curso,id_turno,id_responsable)
            VALUES (:id_usuario,:id_gestion,:id_carrera,:id_curso,:id_turno,:id_responsable)";
    $stmt = Conexion::conectar()->prepare($sql);

    $stmt->bindParam(":id_usuario",     $datos["id_usuario"],     PDO::PARAM_INT);
    $stmt->bindParam(":id_gestion",     $datos["id_gestion"],     PDO::PARAM_INT);
    $stmt->bindParam(":id_carrera",     $datos["id_carrera"],     PDO::PARAM_INT);
    $stmt->bindParam(":id_curso",       $datos["id_curso"],       PDO::PARAM_INT);
    $stmt->bindParam(":id_turno",       $datos["id_turno"],       PDO::PARAM_INT);
    $stmt->bindParam(":id_responsable", $datos["id_responsable"], PDO::PARAM_INT);

    return $stmt->execute() ? "ok" : "error";
  }

  static public function mdlEditar($datos){
    $sql = "UPDATE ".self::$tabla." SET
              id_usuario=:id_usuario, id_gestion=:id_gestion,
              id_carrera=:id_carrera, id_curso=:id_curso, id_turno=:id_turno
            WHERE id_inscripcion=:id_inscripcion";
    $stmt = Conexion::conectar()->prepare($sql);

    $stmt->bindParam(":id_usuario",     $datos["id_usuario"],     PDO::PARAM_INT);
    $stmt->bindParam(":id_gestion",     $datos["id_gestion"],     PDO::PARAM_INT);
    $stmt->bindParam(":id_carrera",     $datos["id_carrera"],     PDO::PARAM_INT);
    $stmt->bindParam(":id_curso",       $datos["id_curso"],       PDO::PARAM_INT);
    $stmt->bindParam(":id_turno",       $datos["id_turno"],       PDO::PARAM_INT);
    $stmt->bindParam(":id_inscripcion", $datos["id_inscripcion"], PDO::PARAM_INT);

    return $stmt->execute() ? "ok" : "error";
  }

  static public function mdlEliminar($id){
    $stmt = Conexion::conectar()->prepare("DELETE FROM ".self::$tabla." WHERE id_inscripcion=:id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    return $stmt->execute() ? "ok" : "error";
  }

  static public function mdlCursosPorCarrera($idCarrera){
    $stmt = Conexion::conectar()->prepare("SELECT id_curso, nombre FROM cursos WHERE id_carrera=:id");
    $stmt->bindParam(":id",$idCarrera,PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
