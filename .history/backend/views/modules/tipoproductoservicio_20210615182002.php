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
	
	<button id="btnAgregarArticulo" class="btn btn-info btn-lg">Agregar Artículo</button>

	<!--==== AGREGAR TIPO SERVICIO  ====-->

	<div id="agregarArtículo" style="display:none">
		
		<form method="post" enctype="multipart/form-data">

			<input name="nombreCategoria" type="text" placeholder="Nombre de categoria" class="form-control" required>

	


			<input type="submit" id="guardarCategoria" value="Guardar Categoria" class="btn btn-primary">

		</form>

	</div>

	<?php

		$mostrartipoproductoservicio = new gestorTipoProductoServicio();
		$mostrartipoproductoservicio -> guardar();
		$mostrarCategorias -> mostrarCategoriasController();
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