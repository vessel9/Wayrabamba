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
	
	<button id="btnAgregarProductoServicio" class="btn btn-info btn-lg"><a style="color:white;"><span class="fa fa-plus-square"></span> Servicio/Producto</a></button>
	
	<button  class="btn btn-success btn-lg" style="background:#D6D455;color: white;border: 2px solid #D6D455;"><a href="tipoproductoservicio" style="color:white;"><span class="fa fa-newspaper-o"></span> Tipos o Categorias</a></button>
	<button  class="btn btn-warning btn-lg"><a href="negocios" style="color:white;"><span class="fa fa-briefcase"></span> Negocios</a></button>


	<!--==== AGREGAR TIPO SERVICIO  ====-->

	<div id="agregarProductoServicio" style="display:none">
		
		<form method="post" enctype="multipart/form-data">

			<input name="nombreProductoServicio" type="text" style="text-transform:capitalize;" placeholder="Nombre producto" class="form-control" required>
			
			<input type="file" name="imagen" class="btn btn-default" id="subirFoto" required>

            <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
			<div id="arrastreImagenProductoServicio"></div>	
			<input name="descripcion" type="text" placeholder="descripcion" class="form-control" required>
			
            <!-- <input type="text" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();">  -->
            <input name="precio" type="number" min="0" max="900000000" onkeydown="return event.keyCode !== 69"  step="0.01" placeholder="precio" class="form-control" required>
			<input name="cantidad" type="number" min="0" max="9000000" onkeydown="return event.keyCode !== 69" placeholder="cantidad" class="form-control" required>
			<input name="disponibles" type="number" min="0" max="9000000" onkeydown="return event.keyCode !== 69" placeholder="disponibles" class="form-control" required>
			
			<div class="form-group">
			<?php
		     $mostrarProductoServicio = new GestorProductoServicio();
			 $mostrarProductoServicio -> mostrarProductoServicioController2(); 
		     $mostrarProductoServicio -> mostrarProductoServicioController3();
		     $mostrarProductoServicio -> mostrarProductoServicioController4();	
		    ?>
			</div>
			<div class="form-group">
			if($_SESSION["rol"] == 0){
				             <select name="editarEstado" class="form-control">';
							 <option value="'.$item["estado"].'"><?php $item["estado"]?> </option>';
							 <option value="publico">Publico</option>
							 <option value="privado">Privado</option>

						  </select>';}				
							  else{
								echo'<input type="hidden" value="'.$item["estado"].'" name="editarEstado">';}
			</div>	
			<input type="submit" id="guardarProductoServicio" value="Guardar Productoservicio" class="btn btn-primary">

		</form>
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
		$mostrarProductoServicio -> editarProductoServicioController();
		$mostrarProductoServicio -> editarProductoServicioController2();
		$mostrarProductoServicio -> confirmarBorrarProductoServicioController();
		$mostrarProductoServicio -> borrarProductoServicioController();




		// $mostrarCategoria = new gestorCategorias();
		// $mostrarCategoria -> mostrarCategoriaController();
		// $mostrarArticulo -> editarArticuloController();
	

	?>

	</ul>

</div>