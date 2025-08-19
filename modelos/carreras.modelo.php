<?php

require_once "conexion.php";

class ModeloCarreras {

	/*=============================================
	CREAR CARRERA
	=============================================*/

	static public function mdlIngresarCarrera($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(carrera) VALUES (:carrera)");

		$stmt->bindParam(":carrera", $datos, PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();
		$stmt = null; 

	}

	/*=============================================
	MOSTRAR CARRERAS
	=============================================*/

	static public function mdlMostrarCarreras($tabla, $item, $valor){

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

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR CARRERA
	=============================================*/

	static public function mdlEditarCarrera($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET carrera = :carrera WHERE id_carrera = :id_carrera");

		$stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera", $datos["id_carrera"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR CARRERA
	=============================================*/

	static public function mdlBorrarCarrera($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_carrera = :id_carrera");

		$stmt->bindParam(":id_carrera", $datos, PDO::PARAM_INT);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";	
		}

		$stmt->close();
		$stmt = null;

	}

}
?>
