
<?php
// modelos/ModeloLicencias.php
class ModeloLicencias {

  static public function mdlIngresarLicencia($tabla, $datos){
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_estudiante, id_carrera, id_curso, fecha_inicio, fecha_fin, motivo, justificativo) VALUES (:id_estudiante, :id_carrera, :id_curso, :fecha_inicio, :fecha_fin, :motivo, :justificativo)");

    $stmt->bindParam(":id_estudiante", $datos["id_estudiante"], PDO::PARAM_INT);
    $stmt->bindParam(":id_carrera", $datos["id_carrera"], PDO::PARAM_INT);
    $stmt->bindParam(":id_curso", $datos["id_curso"], PDO::PARAM_INT);
    $stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
    $stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);
    $stmt->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
    $stmt->bindParam(":justificativo", $datos["justificativo"], PDO::PARAM_STR);

    if($stmt->execute()){
      return "ok";
    } else {
      return "error";
    }
  }
}
?>