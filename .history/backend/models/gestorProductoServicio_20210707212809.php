<?php

require_once "conexion.php";

class GestorProductoServicioModel{

	#GUARDAR NEGOCIO
	#------------------------------------------------------------

	public function guardarProductoServicioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreProductoServicio, descripcion, imagenRuta, precio, cantidad, disponibles, idTipoProductoServicio, idCategoria, idNegocio) VALUES (:nombreProductoServicio, :descripcion, :imagenRuta, :precio, :cantidad, :disponibles, :idTipoProductoServicio, :idCategoria, :idNegocio)");

        $stmt -> bindParam(":nombreProductoServicio", $datosModel["nombreProductoServicio"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":imagenRuta", $datosModel["imagenRuta"], PDO::PARAM_STR);
        $stmt -> bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);
        $stmt -> bindParam(":cantidad", $datosModel["cantidad"], PDO::PARAM_STR);
        $stmt -> bindParam(":disponibles", $datosModel["disponibles"], PDO::PARAM_STR);
		$stmt -> bindParam(":idTipoProductoServicio", $datosModel["idTipoProductoServicio"], PDO::PARAM_STR);
		$stmt -> bindParam(":idCategoria", $datosModel["idCategoria"], PDO::PARAM_STR);
		$stmt -> bindParam(":idNegocio", $datosModel["idNegocio"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#MOSTRAR NEGOCIO productoservicio   negocio  tipoproductoservicio
	#------------------------------------------------------
	public function mostrarProductoServicioModel($tabla1, $tabla2, $tabla3){

		$stmt = Conexion::conectar()->prepare("SELECT idproductoServicio, nombreProductoServicio, descripcion, imagenRuta, precio, cantidad, disponibles, nombreNegocio, nombreTipo, nombreCategoria, ps.idNegocio, ps.idTipoProductoServicio, ps.idCategoria FROM productoservicio AS ps INNER JOIN negocio AS n ON n.idNegocio= ps.idNegocio INNER JOIN tipoproductoservicio AS tps ON tps.idTipoProductoServicio = ps.idTipoProductoServicio INNER JOIN categorias AS c ON ps.idCategoria = c.idCategoria ORDER BY idproductoServicio ASC
		" );

		// $stmt = Conexion::conectar()->prepare("SELECT idproductoServicio, nombreProductoServicio, descripcion, imagenRuta, precio, cantidad, disponibles, idTipoProductoServicio, idCategoria, idNegocio FROM $tabla ORDER BY idproductoServicio ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

			#MOSTRAR NEGOCIO productoservicio   negocio  tipoproductoservicio sin inner
	#------------------------------------------------------
	public function mostrarProductoServicioModel2($tabla){


		$stmt = Conexion::conectar()->prepare("SELECT idproductoServicio, nombreProductoServicio, descripcion, imagenRuta, precio, cantidad, disponibles, idTipoProductoServicio, idCategoria, idNegocio FROM $tabla ORDER BY idproductoServicio ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		

	}
	
	

	#BORRAR NEGOCIOS
	#-----------------------------------------------------
	public function borrarProductoServicioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idproductoServicio = :idproductoServicio");

		$stmt->bindParam(":idproductoServicio", $datosModel, PDO::PARAM_INT);

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

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreProductoServicio = :nombreProductoServicio, descripcion = :descripcion, precio = :precio, cantidad = :cantidad, disponibles = :disponibles, idTipoProductoServicio = :idTipoProductoServicio, idCategoria = :idCategoria, idNegocio = :idNegocio WHERE idproductoServicio = :idproductoServicio");	


        $stmt -> bindParam(":nombreProductoServicio", $datosModel["nombreProductoServicio"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
        $stmt -> bindParam(":precio", $datosModel["precio"], PDO::PARAM_INT);
        $stmt -> bindParam(":cantidad", $datosModel["cantidad"], PDO::PARAM_INT);
        $stmt -> bindParam(":disponibles", $datosModel["disponibles"], PDO::PARAM_INT);
		$stmt -> bindParam(":idTipoProductoServicio", $datosModel["idTipoProductoServicio"], PDO::PARAM_INT);
		$stmt -> bindParam(":idCategoria", $datosModel["idCategoria"], PDO::PARAM_INT);
		$stmt -> bindParam(":idNegocio", $datosModel["idNegocio"], PDO::PARAM_INT);
		$stmt -> bindParam(":idproductoServicio", $datosModel["idproductoServicio"], PDO::PARAM_INT);
		if($stmt->execute()){

			return "ok";
		}

		else{


			
			return "error en modelo de Producto Servicios";
			// var_dump($stmt);
		}

		$stmt->close();

	}
	#ACTUALIZAR NEGOCIOS SOLO IMAGEN
	#---------------------------------------------------
	public function editarProductoServicioModel2($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET imagenRuta = :imagenRuta WHERE idproductoServicio = :idproductoServicio");	

		$stmt -> bindParam(":imagenRuta", $datosModel["imagenRuta"], PDO::PARAM_STR);
		$stmt -> bindParam(":idproductoServicio", $datosModel["idproductoServicio"], PDO::PARAM_INT);
		if($stmt->execute()){

			return "ok";
		}

		else{


			
			return "error en modelo de Producto Servicios IMAGEN";
			// var_dump($stmt);
		}

		$stmt->close();

	}



}