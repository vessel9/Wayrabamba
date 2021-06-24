<?php

require_once "conexion.php";

class GestorCategoriasModel{

    #GUARDAR CATEGORIA
	#------------------------------------------------------------
    public function guardarCategoriasModel($datosModel, $tabla){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreCategoria) VALUES (:nombreCategoria)");
    
    $stmt -> bindParam(":nombreCategoria", $datosModel["nombreCategoria"], PDO::PARAM_STR);
    
    if($stmt->execute()){

        return "ok";
    }

    else{

        return "error";
    }

    $stmt->close();

}
	#MOSTRAR CATEGORIA
	#------------------------------------------------------
	public function mostrarCategoriasModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT idCategoria, nombreCategoria FROM $tabla"  );

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}
		#MOSTRAR CATEGORIA
	#------------------------------------------------------
	public function mostrarPruebasModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}
    
	#BORRAR CATEGORIA
	#-----------------------------------------------------
	public function borrarCategoriasModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCategoria = :idCategoria");

		$stmt->bindParam(":idCategoria", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#ACTUALIZAR CATEGORIA
	#---------------------------------------------------
	public function editarCategoriasModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreCategoria = :nombreCategoria WHERE idCategoria = :idCategoria");	

		$stmt -> bindParam(":nombreCategoria", $datosModel["nombreCategoria"], PDO::PARAM_STR);
		$stmt -> bindParam(":idCategoria", $datosModel["idCategoria"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}


}