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
		    <label> Nombre del Producto</label>
			<input name="nombreProductoServicio" type="text" style="text-transform:none;" placeholder="Nombre producto" class="form-control" required>
			<label> Imagen del Producto</label>
			<input type="file" name="imagen" class="btn btn-default" id="subirFoto" required>

            <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
			<div id="arrastreImagenProductoServicio"></div>	
			<label> Descripción</label>
			<input name="descripcion" type="text" placeholder="descripcion" class="form-control" required>
            <!-- <input type="text" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();">  -->
			<label> Precio</label>
			<input name="precio" type="number" min="0" max="900000000" onkeydown="return event.keyCode !== 69"  step="0.01" placeholder="precio" class="form-control" required>
			<label> Cantidad</label>
			<input name="cantidad" type="number" min="0" max="9000000" onkeydown="return event.keyCode !== 69" placeholder="cantidad" class="form-control" required>
			<label> Disponibilidad</label>
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
			<?php	
			if($_SESSION["rol"] == 0){?>
				             <select name="estado" class="form-control" required>';
							 <option value="">Opcione Estado</option>';
							 <option value="publico">Publico</option>
							 <option value="privado">Privado</option>

						  </select>				
			<?php } else{?>
							<input type="hidden" value="privado" name="estado">
							<?php } ?>
			</div>	
			<input type="submit" id="guardarProductoServicio" value="Guardar Productoservicio" class="btn btn-primary">

		</form>
	</div>
		<?php
	echo '<div id="agregarproductoservicio'.$item["idproductoServicio"].'" class="modal fade">
				    <div class="modal-dialog modal-content">
					<div class="modal-header" style="border:0px solid #eee">
				    <button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Editar Producto o Servicio</h3>
					</div>';
					
					echo '<form method="post" enctype="multipart/form-data">';									
					echo '<div class="modal-body">
					    <div class="form-group">
					    <label> Nombre del Producto</label>
					    <input name="editarNombreProductoServicio" type="text" placeholder="Nombre producto" class="form-control" value="'.$item["nombreProductoServicio"].'" required>
						</div>
						<div class="form-group">
						<label id="titulosModal"> Descripción</label>
						<input name="editarDescripcion" type="text" placeholder="descripcion" class="form-control" value="'.$item["descripcion"].'"required>
						</div>
						<div class="form-group">
						<label id="titulosModal"> Precio</label>
						<input name="editarPrecio" type="text" placeholder="precio" class="form-control" value="'.$item["precio"].'"required>
						</div>
						<div class="form-group">
						<label id="titulosModal"> Cantidad</label>
						<input name="editarCantidad" type="text" placeholder="cantidad" class="form-control" value="'.$item["cantidad"].'"required>
						</div>
						<div class="form-group">
						<label id="titulosModal"> Disponibilidad</label>
						<input name="editarDisponibles" type="text" placeholder="disponibles" class="form-control" value="'.$item["disponibles"].'" required></div>';
						
						echo '<label id="titulosModal"> Tipo</label><select editarProductoServicio name="editarIdTipoProductoServicio" class="form-control">
						<option value="'.$item["idTipoProductoServicio"].'">'.$item["nombreTipo"].'</option>';
						foreach($respuesta5 as $row5 => $item5){
						echo '<option value="'.$item5["idTipoProductoServicio"].'">'.$item5["nombreTipo"].'</option>';}
						echo'</select>';

						echo '<label id="titulosModal"> Categoria</label><select name="editarIdCategoria" class="form-control">
						<option value="'.$item["idCategoria"].'">'.$item["nombreCategoria"].'</option>';
						foreach($respuesta6 as $row6 => $item6){
						echo '<option value="'.$item6["idCategoria"].'">'.$item6["nombreCategoria"].'</option>';}
						echo '</select>';

						echo'<label id="titulosModal"> Negocio</label><select name="editarIdNegocio" class="form-control">
						<option value="'.$item["idNegocio"].'">'.$item["nombreNegocio"].'</option>';
						foreach($respuesta7 as $row7 => $item7){
						echo'<option value="'.$item7["idNegocio"].'">'.$item7["nombreNegocio"].'</option>';}
						echo'</select>';
							if($_SESSION["rol"] == 0){
				        echo'<label id="titulosModal"> Estado</label><select name="editarEstado" class="form-control">';
						echo'<option value="'.$item["estado"].'">'.$item["estado"].'</option>';
						echo'<option value="publico">Publico</option>
						     <option value="privado">Privado</option>
						  </select>';}				
							  else{
								echo'<input type="hidden" value="'.$item["estado"].'" name="editarEstado">';}
							  
							
						echo'<input type="hidden" value="'.$item["idproductoServicio"].'" name="idProductoServicio">
                        <hr>
						';

						echo '<input type="submit" id="actualizarProductoServicio" value="Actualizar Producto" class="btn btn-primary">
						</form>
				        <div class="modal-footer" style="border:1px solid #eee">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				        </div>
						</div>
				        </div>';  
				

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
		// $mostrarProductoServicio -> editarProductoServicioController();
		// $mostrarProductoServicio -> editarProductoServicioController2();
		$mostrarProductoServicio -> confirmarBorrarProductoServicioController();
		$mostrarProductoServicio -> borrarProductoServicioController();




		// $mostrarCategoria = new gestorCategorias();
		// $mostrarCategoria -> mostrarCategoriaController();
		// $mostrarArticulo -> editarArticuloController();
	

	?>

	</ul>
	<?php
	    $mostrarProductoServicio = new GestorProductoServicio(); 
	    $mostrarProductoServicio -> editarProductoServicioController();
		$mostrarProductoServicio -> editarProductoServicioController2();
		?>
</div>