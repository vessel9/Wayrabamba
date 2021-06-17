<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:ingreso");

	exit();

}

include "views/modules/botonera.php";
include "views/modules/cabezote.php";

?>
<!--=====================================
TIPO DE SERVICIO ADMINISTRABLE          
======================================-->
<div id="seccionArticulos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
	
	<button id="btnAgregarArticulo" class="btn btn-info btn-lg">Agregar Tipo Servicio/Producto</button>

	<!--==== AGREGAR TIPO SERVICIO  ====-->

	<div id="agregarArtículo" style="display:none">
		
		<form method="post" enctype="multipart/form-data">

			<input name="nombreTipo" type="text" placeholder="Nombre de categoria" class="form-control" required>
			<input name="nombreTipo" type="text" placeholder="Nombre de categoria" class="form-control" required>

	


			<input type="submit" id="guardarTipoProductoServicio" value="Guardar Tipoproductoservicio" class="btn btn-primary">

		</form>

	</div>

	<?php

		$mostrarTipoProductoServicio = new GestorTipoProductoServicio();
		$mostrarTipoProductoServicio -> guardarTipoProductoServicioController();
		// $mostrarTipoProductoServicio -> mostrarTipoProductoServicioController();
	?>

	<hr>

	<!--==== EDITAR ARTÍCULO  ====-->

	<ul id="editarArticulo">

	<?php

		// $mostrarCategoria = new gestorCategorias();
		// $mostrarCategoria -> mostrarCategoriaController();
		// $mostrarArticulo -> borrarArticuloController();
		// $mostrarArticulo -> editarArticuloController();

	?>

	</ul>
</div>