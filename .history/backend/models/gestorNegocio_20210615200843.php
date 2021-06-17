<?php

require_once "conexion.php";

class GestorNegocioModel{

	#GUARDAR NEGOCIO
	#------------------------------------------------------------

	public function guardarNegocioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreNegocio, imagenNegocio, telefono, direccion, ubicacion) VALUES (:nombreNegocio, :imagenNegocio, :telefono, :direccion, :ubicacion)");

		$stmt -> bindParam(":nombreNegocio", $datosModel["nombreNegocio"], PDO::PARAM_STR);
		$stmt -> bindParam(":imagenNegocio", $datosModel["imagenNegocio"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
		$stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);

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

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idNegocio = :idNegocio, imagenNegocio = :imagenNegocio, ruta = :ruta, contenido = :contenido WHERE ididNegocio = :idNegocio");	

		$stmt -> bindParam(":nombreNegocio", $datosModel["nombreNegocio"], PDO::PARAM_STR);
		$stmt -> bindParam(":imagenNegocio", $datosModel["imagenNegocio"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
		$stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);
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