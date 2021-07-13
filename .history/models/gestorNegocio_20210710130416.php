<?php

require_once "backend/models/conexion.php";

class ProductoServicioModels{

	public function seleccionarProductoServicioModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT idNegocio, nombreNegocio, imagenNegocio, telefono, correo, direccion, ubicacion FROM $tabla ORDER BY idNegocio ASC");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

}