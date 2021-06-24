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
NEGOCIO ADMINISTRABLE          
======================================-->
<div id="seccionArticulos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
	
	<button id="btnAgregarNegocio" class="btn btn-info btn-lg">Agregar Negocio</button>

	<!--==== AGREGAR ARTÍCULO  ====-->

	<div id="agregarNegocio" style="display:none">
		
		<form method="post" enctype="multipart/form-data">

			<input name="nombresNegocio" type="text" placeholder="Nombre de Negocio" class="form-control" required>
			

			<input type="file" name="imagen" class="btn btn-default" id="subirFoto" required>

            <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
			<input name="telefonoNegocio" type="text" placeholder="Teléfono" class="form-control" required>
			<input name="direccionNegocio" type="text" placeholder="Dierección" class="form-control" required>
			<input name="ubicacionNegocio" type="text" placeholder="Ubicación" class="form-control" required>



			<input type="submit" id="guardarNegocio" value="Guardar negocio" class="btn btn-primary">

		</form>

	</div>

	<?php

		$guardarNegocio = new GestorNegocio();
		$guardarNegocio -> guardarNegocioController();
	
	?>

	<hr>

	<!--==== EDITAR ARTÍCULO  ====-->

	<ul id="editarArticulo">

	<?php
		$mostrarNegocio = new GestorNegocio();
		$mostrarNegocio -> mostrarNegociosController();

		// $mostrarCategoria = new gestorCategorias();
		// $mostrarCategoria -> mostrarCategoriaController();
		// $mostrarArticulo -> borrarArticuloController();
		// $mostrarArticulo -> editarArticuloController();

	?>

	</ul>
</div>