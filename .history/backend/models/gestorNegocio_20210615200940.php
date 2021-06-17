<?php

require_once "conexion.php";

class GestorNegocioModel{

	#GUARDAR NEGOCIO
	#------------------------------------------------------------

	public function guardarNegocioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreNegocio, imagenNegocio, telefono, direccion, ubicacion) VALUES (:nombreNegocio, :imagenNegocio, :telefono, :direccion, :ubicacion)");

		$stmt -> bindParam(":nombreNegocio", $datosModel["nombreNegocio"], PDO::PARAM_STR);
		$stmt -> bindParam(":imagenNegocio", $datosModel["imagenNegocio"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#MOSTRAR NEGOCIO
	#------------------------------------------------------
	public function mostrarNegocioModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT idNegocio, nombreNegocio, imagenNegocio, telefono, direccion, ubicacion FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#BORRAR NEGOCIOS
	#-----------------------------------------------------
	public function borrarNegocioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idNegocio = :idNegocio");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#ACTUALIZAR NEGOCIOS
	#---------------------------------------------------
	public function editarNegocioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idNegocio = :idNegocio, imagenNegocio = :imagenNegocio, telefono = :telefono, direccion = :direccion WHERE ididNegocio = :idNegocio");	

		$stmt -> bindParam(":nombreNegocio", $datosModel["nombreNegocio"], PDO::PARAM_STR);
		$stmt -> bindParam(":imagenNegocio", $datosModel["imagenNegocio"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}



}