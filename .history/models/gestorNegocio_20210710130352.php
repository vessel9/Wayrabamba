<?php

require_once "backend/models/conexion.php";

class ProductoServicioModels{

	public function seleccionarProductoServicioModel($tabla1, $tabla2, $tabla3, $tabla4){

		$stmt = Conexion::conectar()->prepare("SELECT idNegocio, nombreNegocio, imagenNegocio, telefono, correo, direccion, ubicacion FROM $tabla ORDER BY idNegocio ASC");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

}