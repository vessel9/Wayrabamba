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
<div id="editarPerfil" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
	
	<button id="btnAgregarCategoria" class="btn btn-info btn-lg">Agregar Categoria</button>

	<!--==== AGREGAR ARTÍCULO  ====-->

	<div id="agregarCategoria" style="display:none">
		
		<form method="post" enctype="multipart/form-data">

			<input name="nombresCategorias" type="text" style="text-transform:capitalize;" placeholder="Nombre de categoria" class="form-control" required>

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

		// $mostrarCategoria = new GestorCategorias();
		// $mostrarCategoria -> mostrarCategoriasController();
		// $mostrarCategoria -> borrarCategoriasController();
		// $mostrarCategoria -> editarCategoriasController();

	?>

	</ul>
</div>