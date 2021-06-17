<?php

require_once "conexion.php";

class GestorProductoServicioModel{

	#GUARDAR NEGOCIO
	#------------------------------------------------------------

	public function guardarProductoServicioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreProductoServicio, imagenProductoServicio, telefono, direccion, ubicacion) VALUES (:nombreProductoServicio, :imagenProductoServicio, :telefono, :direccion, :ubicacion)");

		$stmt -> bindParam(":nombreProductoServicio", $datosModel["nombreProductoServicio"], PDO::PARAM_STR);
		$stmt -> bindParam(":imagenProductoServicio", $datosModel["imagenProductoServicio"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);
        $stmt -> bindParam(":ubicacion", $datosModel["ubicacion"], PDO::PARAM_STR);


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
	public function mostrarProductoServicioModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT idproductoServicio, nombreProductoServicio, imagenProductoServicio, telefono, direccion, ubicacion FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#BORRAR NEGOCIOS
	#-----------------------------------------------------
	public function borrarProductoServicioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idproductoServicio = :idproductoServicio");

		$stmt->bindParam(":idProductoServicio", $datosModel, PDO::PARAM_INT);

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
	public function editarProductoServicioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreProductoServicio = :nombreProductoServicio, descripcion, :descripcion, imagenRuta = :imagenProductoServicio, telefono = :telefono, direccion = :direccion, ubicacion = :ubicacion WHERE idproductoServicio = :idproductoServicio");	

		$stmt -> bindParam(":nombreProductoServicio", $datosModel["nombreProductoServicio"], PDO::PARAM_STR);
		$stmt -> bindParam(":imagenProductoServicio", $datosModel["imagenProductoServicio"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);
        $stmt -> bindParam(":ubicacion", $datosModel["ubicacion"], PDO::PARAM_STR);
		$stmt -> bindParam(":idProductoServicio", $datosModel["idProductoServicio"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}



}