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
CATEGORIAS ADMINISTRABLE          
======================================-->
<div id="seccionArticulos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
	
	<button id="btnAgregarCategoria" class="btn btn-info btn-lg">Agregar Categoria</button>

	<!--==== AGREGAR ARTÍCULO  ====-->

	<div id="agregarCategoria" style="display:none">
		
		<form method="post" enctype="multipart/form-data">

			<input name="nombresCategorias" type="text" placeholder="Nombre de categoria" class="form-control" required>

	


			<input type="submit" id="guardarCategoria" value="Guardar Categoria" class="btn btn-primary">

		</form>

	</div>

	<?php

		$guardarCategorias = new GestorCategorias();
		$guardarCategorias -> guardarCategoriasController();
	?>

	<hr>

	<!--==== EDITAR ARTÍCULO  ====-->

	<ul>

	<?php

		$mostrarCategoria = new GestorCategorias();
		// $mostrarCategoria -> mostrarCategoriasController();
		// $mostrarCategoria -> mostrarPruebasController();
		$mostrarCategoria -> mostrarArticulosController1();
		// $mostrarArticulo -> borrarArticuloController();
		// $mostrarArticulo -> editarArticuloController();

	?>

	</ul>
</div>