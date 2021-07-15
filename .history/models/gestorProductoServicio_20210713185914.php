<?php

require_once "backend/models/conexion.php";

class ProductoServicioModels{

	public function seleccionarProductoServicioModel($tabla1, $tabla2, $tabla3, $tabla4){

		$stmt = Conexion::conectar()->prepare("SELECT idproductoServicio, nombreProductoServicio, descripcion, imagenRuta, precio, cantidad, disponibles, nombreNegocio, nombreTipo, nombreCategoria, ps.idNegocio, ps.idTipoProductoServicio, ps.idCategoria FROM $tabla1 AS ps INNER JOIN $tabla2 AS n ON n.idNegocio= ps.idNegocio INNER JOIN $tabla3 AS tps ON tps.idTipoProductoServicio = ps.idTipoProductoServicio INNER JOIN $tabla4 AS c ON ps.idCategoria = c.idCategoria WHERE estado='publico' ORDER BY idproductoServicio ASC" );

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

}