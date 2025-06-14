<?php

require_once "conexion.php";

class ModeloGestiones {

    /*=============================================
    CREAR GESTIÓN
    =============================================*/

    static public function mdlIngresarGestion($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(gestion) VALUES (:gestion)");

        $stmt->bindParam(":gestion", $datos, PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt = null;
    }

    /*=============================================
    MOSTRAR GESTIONES
    =============================================*/

    static public function mdlMostrarGestiones($tabla, $item, $valor){

        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt = null;
    }

    /*=============================================
    EDITAR GESTIÓN
    =============================================*/

    static public function mdlEditarGestion($tabla, $datos){
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET gestion = :gestion WHERE id_gestion = :id_gestion");

        $stmt->bindParam(":gestion", $datos["gestion"], PDO::PARAM_STR);
        $stmt->bindParam(":id_gestion", $datos["id_gestion"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt = null;
    }

    /*=============================================
    ELIMINAR GESTIÓN
    =============================================*/

    static public function mdlEliminarGestion($tabla, $id_gestion){
        
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_gestion = :id_gestion");

        $stmt->bindParam(":id_gestion", $id_gestion, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt = null;
    }
}
?>
