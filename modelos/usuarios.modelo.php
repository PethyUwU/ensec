<?php

require_once "conexion.php";

class ModeloUsuarios{

    /*=============================================
    MOSTRAR USUARIOS
    =============================================*/

    static public function mdlMostrarUsuarios($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }
        

        $stmt -> close();

        $stmt = null;

    }

    /*=============================================
    REGISTRO DE USUARIO
    =============================================*/

    static public function mdlIngresarUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellidoP, apellidoM, ci, genero, celular, gmail, usuario, password, perfil, foto, estado, ultimo_login) VALUES (:nombre, :apellidoP, :apellidoM, :ci, :genero, :celular, :gmail, :usuario, :password, :perfil, :foto, :estado, :ultimo_login)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidoP", $datos["apellidoP"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidoM", $datos["apellidoM"], PDO::PARAM_STR);
        $stmt->bindParam(":ci", $datos["ci"], PDO::PARAM_STR);
        $stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
        $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt->bindParam(":gmail", $datos["gmail"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":ultimo_login", $datos["ultimo_login"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";    

        }else{

            return "error";
        
        }

        $stmt->close();
        
        $stmt = null;

    }

    /*=============================================
    EDITAR USUARIO
    =============================================*/

    static public function mdlEditarUsuario($tabla, $datos){
    
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellidoP = :apellidoP, apellidoM = :apellidoM, ci = :ci, genero = :genero, celular = :celular, gmail = :gmail, password = :password, perfil = :perfil, foto = :foto, estado = :estado, ultimo_login = :ultimo_login WHERE usuario = :usuario");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellidoP", $datos["apellidoP"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellidoM", $datos["apellidoM"], PDO::PARAM_STR);
        $stmt -> bindParam(":ci", $datos["ci"], PDO::PARAM_STR);
        $stmt -> bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
        $stmt -> bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt -> bindParam(":gmail", $datos["gmail"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt -> bindParam(":ultimo_login", $datos["ultimo_login"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";
        
        }else{

            return "error";    

        }

        $stmt -> close();

        $stmt = null;

    }

    /*=============================================
    ACTUALIZAR USUARIO
    =============================================*/

    static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
        $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";
        
        }else{

            return "error";    

        }

        $stmt -> close();

        $stmt = null;

    }

    /*=============================================
    BORRAR USUARIO
    =============================================*/

    static public function mdlBorrarUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

        if($stmt -> execute()){

            return "ok";
        
        }else{

            return "error";    

        }

        $stmt -> close();

        $stmt = null;

    }

    
public static function mdlInsertarDocente($id_usuario) {
    $stmt = Conexion::conectar()->prepare("INSERT INTO docente(id_usuario) VALUES (:id_usuario)");
    $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
    return $stmt->execute() ? "ok" : "error";
}

public static function mdlInsertarAdministrativo($id_usuario) {
    $stmt = Conexion::conectar()->prepare("INSERT INTO administrativo(id_usuario, cargo) VALUES (:id_usuario, '')");
    $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
    return $stmt->execute() ? "ok" : "error";
}

public static function mdlInsertarEstudiante($id_usuario) {
    $stmt = Conexion::conectar()->prepare("INSERT INTO estudiante(id_usuario) VALUES (:id_usuario)");
    $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
    return $stmt->execute() ? "ok" : "error";
}


}



