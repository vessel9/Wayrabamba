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
	
	<button id="btnAgregarTipoProductoServicio" class="btn btn-info btn-lg">Agregar Tipo Servicio/Producto</button>

	<!--==== AGREGAR TIPO SERVICIO  ====-->

	<div id="agregarTipoProductoServicio" style="display:none">
		
		<form method="post" enctype="multipart/form-data">

			<input name="nombresTipoProductoServicio" style="text-transform:capitalize;" type="text" placeholder="Nombre de Tipo Producto" class="form-control" required>

			<input type="submit" id="guardarTipoProductoServicio" value="Guardar Tipo Producto/servicio" class="btn btn-primary">

		</form>

	</div>

	<?php

		$guardarTipoProductoServicio = new GestorTipoProductoServicio();
		$guardarTipoProductoServicio -> guardarTipoProductoServicioController();
		// $mostrarTipoProductoServicio -> mostrarTipoProductoServicioController();
	?>

	<hr>

	<!--==== EDITAR ARTÍCULO  ====-->

	<ul id="editarArticulo">

	<?php

	  $mostrarTipoProductoServicio = new GestorTipoProductoServicio();
	  $mostrarTipoProductoServicio -> mostrarTipoProductoServicioController();
	  $mostrarTipoProductoServicio -> borrarTipoProductoServicioController();
	  $mostrarTipoProductoServicio -> editarTipoProductoServicioController();

	?>

	</ul>
</div>