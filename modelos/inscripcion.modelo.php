<?php
require_once "conexion.php";

class ModeloInscripcion {

  /* LISTAR (con joins para mostrar nombres) */
  static public function mdlListarInscripciones($tabla, $item=null, $valor=null){
    $sql = "SELECT 
              i.id_inscripcion,
              i.id_usuario,
              CONCAT(u.nombre,' ',COALESCE(u.apellidoP,'')) AS estudiante,
              i.id_gestion, g.nombre AS gestion,
              i.id_carrera, ca.nombre AS carrera,
              i.id_curso, cu.nombre AS curso,
              i.id_paralelo, pa.nombre AS paralelo,
              i.id_turno, tu.nombre AS turno,
              i.fecha_inscripcion,
              i.id_responsable,
              CONCAT(ur.nombre,' ',COALESCE(ur.apellidoP,'')) AS responsable
            FROM $tabla i
            LEFT JOIN usuarios  u  ON u.id = i.id_usuario
            LEFT JOIN gestiones g  ON g.id_gestion = i.id_gestion
            LEFT JOIN carreras  ca ON ca.id_carrera = i.id_carrera
            LEFT JOIN cursos    cu ON cu.id_curso = i.id_curso
            LEFT JOIN paralelos pa ON pa.id_paralelo = i.id_paralelo
            LEFT JOIN turnos    tu ON tu.id_turno = i.id_turno
            LEFT JOIN usuarios  ur ON ur.id = CAST(i.id_responsable AS UNSIGNED)";
    if($item !== null){ $sql .= " WHERE i.$item = :valor"; }

    $stmt = Conexion::conectar()->prepare($sql);
    if($item !== null) $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  static public function mdlObtenerPorId($tabla, $id){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_inscripcion=:id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute(); return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  static public function mdlCrear($tabla, $d){
    $stmt = Conexion::conectar()->prepare(
      "INSERT INTO $tabla
        (id_usuario,id_gestion,id_curso,id_carrera,id_turno,fecha_inscripcion,id_responsable,id_paralelo)
       VALUES
        (:id_usuario,:id_gestion,:id_curso,:id_carrera,:id_turno,:fecha_inscripcion,:id_responsable,:id_paralelo)");
    $stmt->bindParam(":id_usuario",        $d["id_usuario"], PDO::PARAM_INT);
    $stmt->bindParam(":id_gestion",        $d["id_gestion"], PDO::PARAM_INT);
    $stmt->bindParam(":id_curso",          $d["id_curso"], PDO::PARAM_INT);
    $stmt->bindParam(":id_carrera",        $d["id_carrera"], PDO::PARAM_INT);
    $stmt->bindParam(":id_turno",          $d["id_turno"], PDO::PARAM_INT);
    $stmt->bindParam(":fecha_inscripcion", $d["fecha_inscripcion"], PDO::PARAM_STR);
    $stmt->bindParam(":id_responsable",    $d["id_responsable"], PDO::PARAM_STR); // VARCHAR(11)
    $stmt->bindParam(":id_paralelo",       $d["id_paralelo"], PDO::PARAM_INT);
    return $stmt->execute() ? "ok" : "error";
  }

  static public function mdlEditar($tabla, $d){
    $stmt = Conexion::conectar()->prepare(
      "UPDATE $tabla SET
        id_usuario=:id_usuario, id_gestion=:id_gestion, id_curso=:id_curso,
        id_carrera=:id_carrera, id_turno=:id_turno, fecha_inscripcion=:fecha_inscripcion,
        id_responsable=:id_responsable, id_paralelo=:id_paralelo
       WHERE id_inscripcion=:id_inscripcion");
    $stmt->bindParam(":id_usuario",        $d["id_usuario"], PDO::PARAM_INT);
    $stmt->bindParam(":id_gestion",        $d["id_gestion"], PDO::PARAM_INT);
    $stmt->bindParam(":id_curso",          $d["id_curso"], PDO::PARAM_INT);
    $stmt->bindParam(":id_carrera",        $d["id_carrera"], PDO::PARAM_INT);
    $stmt->bindParam(":id_turno",          $d["id_turno"], PDO::PARAM_INT);
    $stmt->bindParam(":fecha_inscripcion", $d["fecha_inscripcion"], PDO::PARAM_STR);
    $stmt->bindParam(":id_responsable",    $d["id_responsable"], PDO::PARAM_STR);
    $stmt->bindParam(":id_paralelo",       $d["id_paralelo"], PDO::PARAM_INT);
    $stmt->bindParam(":id_inscripcion",    $d["id_inscripcion"], PDO::PARAM_INT);
    return $stmt->execute() ? "ok" : "error";
  }

  static public function mdlEliminar($tabla, $id){
    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_inscripcion=:id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    return $stmt->execute() ? "ok" : "error";
  }

  /* Combos dependientes */
  static public function mdlCursosPorCarrera($id_carrera){
    $stmt = Conexion::conectar()->prepare("SELECT id_curso, nombre FROM cursos WHERE id_carrera=:id ORDER BY nombre");
    $stmt->bindParam(":id", $id_carrera, PDO::PARAM_INT);
    $stmt->execute(); return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Si no tienes relación curso→paralelo, devuelve todos.
  static public function mdlParalelosPorCurso($id_curso){
    $stmt = Conexion::conectar()->prepare("SELECT id_paralelo, nombre FROM paralelos ORDER BY nombre");
    $stmt->execute(); return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
