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
<div class="row">
<div id="seccionArticulos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
	
	<button id="btnAgregarProductoServicio" class="btn btn-info btn-lg">Agregar Servicio/Producto</button>

	<!--==== AGREGAR TIPO SERVICIO  ====-->

	<div id="agregarProductoServicio" style="display:none">
		
		<form method="post" enctype="multipart/form-data">

			<input name="nombreProductoServicio" type="text" placeholder="Nombre producto" class="form-control" required>
			
			<input type="file" name="imagen" class="btn btn-default" id="subirFoto" required>

            <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
			<div id="arrastreImagenProductoServicio"></div>	
			<input name="descripcion" type="text" placeholder="descripcion" class="form-control" required>
            <input name="precio" type="text" placeholder="precio" class="form-control" required>
			<input name="cantidad" type="text" placeholder="cantidad" class="form-control" required>
			<input name="disponibles" type="text" placeholder="disponibles" class="form-control" required>
			<?php
		     $mostrarProductoServicio = new GestorProductoServicio();$mostrarProductoServicio -> mostrarProductoServicioController2(); 
		     $mostrarProductoServicio -> mostrarProductoServicioController3();
		     $mostrarProductoServicio -> mostrarProductoServicioController4();	
		    ?>
			<input type="submit" id="guardarProductoServicio" value="Guardar Productoservicio" class="btn btn-primary">

		</form>
	</div>
	<div id="seccionArticulos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
	
	<button id="btnActualizarProductoServicio" class="btn btn-info btn-lg">Actualizar Servicio/Producto</button>

	<!--==== ACTUALIZAR TIPO SERVICIO  ====-->
	<div id="actualizarProductoServicio" style="display:none">
		
		<form method="post" enctype="multipart/form-data">

			<input name="nombreProductoServicio" type="text" placeholder="Nombre producto" class="form-control" required>
			
			<input type="file" name="imagen" class="btn btn-default" id="subirFoto" required>

            <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
			<div id="arrastreImagenProductoServicio"></div>	
			<input name="descripcion" type="text" placeholder="descripcion" class="form-control" required>
            <input name="precio" type="text" placeholder="precio" class="form-control" required>
			<input name="cantidad" type="text" placeholder="cantidad" class="form-control" required>
			<input name="disponibles" type="text" placeholder="disponibles" class="form-control" required>
			<?php
		     $mostrarProductoServicio = new GestorProductoServicio();$mostrarProductoServicio -> mostrarProductoServicioController2(); 
		     $mostrarProductoServicio -> mostrarProductoServicioController3();
		     $mostrarProductoServicio -> mostrarProductoServicioController4();	
		    ?>
			<input type="submit" id="guardarProductoServicio" value="Guardar Productoservicio" class="btn btn-primary">

		</form>
	</div>
	</div>


	<?php
		$guardarProductoServicio = new GestorProductoServicio();
		$guardarProductoServicio -> guardarProductoServicioController();
	?>

	<hr>

	<!--==== EDITAR ARTÍCULO  ====-->

	<ul id="editarArticulo">

	<?php
	    $mostrarProductoServicio = new GestorProductoServicio(); 
		$mostrarProductoServicio -> mostrarProductoServicioController();


		// $mostrarCategoria = new gestorCategorias();
		// $mostrarCategoria -> mostrarCategoriaController();
		// $mostrarArticulo -> borrarArticuloController();
		// $mostrarArticulo -> editarArticuloController();
	

	?>
		<select name="nuevoRol" class="form-control" required><option value="">Seleccione el Rol</option><?php foreach($respuesta as $row => $item){?><option value="0"><?php echo $item["nombreTipo"] ?></option><?php }?></select>

	</ul>

</div>