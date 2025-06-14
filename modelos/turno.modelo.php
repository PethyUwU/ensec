<?php
require_once "conexion.php";

class ModeloTurno {
    
    /* Mostrar turnos */
    static public function mdlMostrarTurnos($tabla, $item, $valor) {
        if($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre");
            $stmt -> execute();
            return $stmt -> fetchAll();
        }
        $stmt -> close();
        $stmt = null;
    }

    /* Crear turno */
    static public function mdlCrearTurno($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, horainicio, horafin) VALUES (:nombre, :horainicio, :horafin)");
        
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":horainicio", $datos["horainicio"], PDO::PARAM_STR);
        $stmt->bindParam(":horafin", $datos["horafin"], PDO::PARAM_STR);

        if($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    /* Editar turno */
    public static function mdlEditarTurno($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, horainicio = :horainicio, horafin = :horafin WHERE id = :id");
    
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":horainicio", $datos["horainicio"], PDO::PARAM_STR);
        $stmt->bindParam(":horafin", $datos["horafin"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    
        $stmt = null;
    }
    

    /* Eliminar turno */
    static public function mdlEliminarTurno($tabla, $id) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id", $id, PDO::PARAM_INT);

        if($stmt -> execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt -> close();
        $stmt = null;
    }
}