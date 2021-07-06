<?php

class GestorProductoServicio{

	#MOSTRAR IMAGEN PRODUCTO SERVICIO
	#------------------------------------------------------------
	public function mostrarImagenController($datos){

		list($ancho, $alto) = getimagesize($datos);

		if($ancho < 800 || $alto < 400){

			echo 0;

		}

		else{

			$aleatorio = mt_rand(100, 999);
			$ruta = "../../views/images/productoservicios/temp/productoservicio".$aleatorio.".jpg";
			$origen = imagecreatefromjpeg($datos);
			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
			imagejpeg($destino, $ruta);

			echo $ruta;
		}

	}

	#GUARDAR PRODUCTO SERVICIO
	#-----------------------------------------------------------

	public function guardarProductoServicioController(){

		if(isset($_POST["nombreProductoServicio"])){

			$imagen = $_FILES["imagen"]["tmp_name"];

			$borrar = glob("views/images/productoservicios/temp/*");

			foreach($borrar as $file){

				unlink($file);

			}

			$aleatorio = mt_rand(100, 999);

			$ruta = "views/images/productoservicios/productoservicio".$aleatorio.".jpg";

			$origen = imagecreatefromjpeg($imagen);

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);

			imagejpeg($destino, $ruta);

		$datosController = array("nombreProductoServicio"=>$_POST["nombreProductoServicio"],
			 	                      "descripcion"=>$_POST["descripcion"],
									  "imagenRuta"=>$ruta,
									  "precio"=>$_POST["precio"],
			 	                      "cantidad"=>$_POST["cantidad"],
                                      "disponibles"=>$_POST["disponibles"],
									  "idTipoProductoServicio"=>$_POST["idTipoProductoServicio"],
									  "idCategoria"=>$_POST["idCategoria"],
									  "idNegocio"=>$_POST["idNegocio"]);

			$respuesta = GestorProductoServicioModel::guardarProductoServicioModel($datosController, "productoservicio");

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El artículo ha sido creado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "productoservicios";
							  } 
					});


				</script>';

			}

			else{

				echo $respuesta;

			}

		}

	}

	#MOSTRAR PRODUCTO SERVICIO
	#-----------------------------------------------------------

	public function mostrarProductoServicioController(){

		$respuesta = GestorProductoServicioModel::mostrarProductoServicioModel("productoservicio", "negocio", "tipoproductoservicio");	
		$respuesta5 = GestorTipoProductoServicioModel::mostrarTipoProductoServicioModel("tipoproductoservicio");	
		$respuesta6 = GestorCategoriasModel::mostrarCategoriasModel("categorias");	
		$respuesta7 = GestorNegocioModel::mostrarNegocioModel("negocio");
		
		// $mostrarProductoServicio = new GestorProductoServicio();
		// $mostrarProductoServicio -> mostrarProductoServicioController5(); 
		// $mostrarProductoServicio -> mostrarProductoServicioController6();





		// var_dump($respuesta);

		foreach($respuesta as $row => $item) {
	
		
			echo ' <li id="'.$item["idproductoServicio"].'" class="bloqueNegocio">
		
					<span class="handleArticle">
					<a href="index.php?action=productoservicios&idBorrar='.$item["idproductoServicio"].'&rutaImagen='.$item["imagenRuta"].'">
						<i class="fa fa-times btn btn-danger"></i>
					</a>';
					echo '<a href="#agregarproductoservicio'.$item["idproductoServicio"].'" data-toggle="modal">
					<button  class="btn btn-primary btn-lg">Actualizar Servicio/Producto</button></a></span>';
	
					echo '<img src="'.$item["imagenRuta"].'" class="img-thumbnail">
					<h1>'.$item["nombreProductoServicio"].'</h1>
					<h2>'.$item["descripcion"].'</h2>
					<h3>Precio: $'.$item["precio"].'</h3>
					<h4>Cantidad:'.$item["cantidad"].'</h4>
					<h5>Disponibles:'.$item["disponibles"].'</h5>
					<h5>tipo:'.$item["nombreTipo"].'<h5>
					<p>Categoria:'.$item["nombreCategoria"].'</p>
					<ul>Negocio:'.$item["nombreNegocio"].'</ul>
					';
					echo ' <input type="hidden" value="'.$item["nombreTipo"].'">
                    <input type="hidden" value="'.$item["nombreCategoria"].'">
					<a href="#productoservicio'.$item["idproductoServicio"].'" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
					</a>
					<hr>
				</li>';
				    echo '<div id="agregarproductoservicio'.$item["idproductoServicio"].'" class="modal fade">
				    <div class="modal-dialog modal-content">
				    <button type="button" class="close" data-dismiss="modal">&times;</button>';
					echo '<form method="post" enctype="multipart/form-data">';
					echo '<div id="editarImagen"><input style="display:none" type="file" id="subirNuevaFoto" class="btn btn-default">
					<div id="nuevaFoto">
					<img src="'.$item["imagenRuta"].'" class="img-thumbnailb">
					</div></div>';						
						echo '<input type="file" name="editarImagen" class="btn btn-default" id="subirNuevaFoto" required>';
					
					echo '<input name="editarNombreProductoServicio" type="text" placeholder="Nombre producto" class="form-control" value="'.$item["nombreProductoServicio"].'" required>
						<input name="editarDescripcion" type="text" placeholder="descripcion" class="form-control" value="'.$item["descripcion"].'"required>
						<input name="editarPrecio" type="text" placeholder="precio" class="form-control" value="'.$item["precio"].'"required>
						<input name="editarCantidad" type="text" placeholder="cantidad" class="form-control" value="'.$item["cantidad"].'"required>
						<input name="editarDisponibles" type="text" placeholder="disponibles" class="form-control" value="'.$item["disponibles"].'" required>';
						
						echo '<select editarProductoServicio name="editarIdTipoProductoServicio" class="form-control">
						<option value="'.$item["idTipoProductoServicio"].'">'.$item["nombreTipo"].'</option>';
						foreach($respuesta5 as $row5 => $item5){
						echo '<option value="'.$item5["idTipoProductoServicio"].'">'.$item5["nombreTipo"].'</option>';}
						echo'</select>';

						echo '<select name="editarIdCategoria" class="form-control">
						<option value="'.$item["idCategoria"].'">'.$item["nombreCategoria"].'</option>';
						foreach($respuesta6 as $row6 => $item6){
						echo '<option value="'.$item6["idCategoria"].'">'.$item6["nombreCategoria"].'</option>';}
						echo '</select>';

						echo'<select name="editarIdNegocio" class="form-control">
						<option value="'.$item["idNegocio"].'">'.$item["nombreNegocio"].'</option>';
						foreach($respuesta7 as $row7 => $item7){
						echo'<option value="'.$item7["idNegocio"].'">'.$item7["nombreNegocio"].'</option>';}
						echo'</select>
						
						<input type="hidden" value="'.$item["idproductoServicio"].'" name="idProductoServicio">
						
                        <hr>
						';
						echo '<input style="width:20%; padding:5px 0; margin-top:4px" id="actualizarProductoServicio" type="submit" class="btn btn-primary pull-right" value="Actualizar"></span>
						</form>
				<div class="modal-footer" style="border:1px solid #eee">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</div>
				</div>';  
				

				echo '<div id="productoservicio'.$item["idproductoServicio"].'" class="modal fade">

					<div class="modal-dialog modal-content">

						<div class="modal-header" style="border:1px solid #eee">
				        
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						 <h3 class="modal-title">'.$item["nombreProductoServicio"].'</h3>
			        
						</div>

						<div class="modal-body" style="border:1px solid #eee">
			        
							<img src="'.$item["imagenRuta"].'" width="100%" style="margin-bottom:20px">
							<p class="parrafoContenido">'.$item["nombreProductoServicio"].'</p>
			        
						</div>

						<div class="modal-footer" style="border:1px solid #eee">
			        
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        
						</div>

					</div>

				</div>';

		}
		

	}
   #MOSTRAR PARA GUARDAR SELECTS OPTION DE TIPO PRODUCTO SERVICIO/ CATEGORIAS/ NEGOCIO
	#------------------------------------
	public function mostrarProductoServicioController2(){
		$respuesta = GestorTipoProductoServicioModel::mostrarTipoProductoServicioModel("tipoproductoservicio");	
			echo'		
			<select name="idTipoProductoServicio" class="form-control" required>
			<option value="0">Elija Tipo</option>';
			foreach($respuesta as $row => $item){
			echo'<option value="'.$item["idTipoProductoServicio"].'">'.$item["nombreTipo"].'</option>';
		}
        echo'</select>';
	}
		
	public function mostrarProductoServicioController3(){
		$respuesta = GestorCategoriasModel::mostrarCategoriasModel("categorias");	
			echo'			
			<select name="idCategoria" class="form-control" required>
			<option value="0">Escoja Categoria</option>';
			foreach($respuesta as $row => $item){
			echo'<option value="'.$item["idCategoria"].'">'.$item["nombreCategoria"].'</option>';
		}
            echo'</select>';
	}
	public function mostrarProductoServicioController4(){
		$respuesta = GestorNegocioModel::mostrarNegocioModel("negocio");
			echo'			
			<select name="idNegocio" class="form-control" required>
			<option value="0">Seleccione Negocio</option>';
			foreach($respuesta as $row => $item){
			echo'<option value="'.$item["idNegocio"].'">'.$item["nombreNegocio"].'</option>';
		}
            echo'</select>';
	}
	

	#BORRAR PRODUCTO SERVICIO
	#------------------------------------

	public function borrarProductoServicioController(){
		

		if(isset($_GET["idBorrar"])){

			unlink($_GET["rutaImagen"]);

			$datosController = $_GET["idBorrar"];
            $respuesta = GestorProductoServicioModel::borrarProductoServicioModel($datosController, "productoservicio");


			if($datosController){

				echo'<script>

				swal({
					  title: "¡OK!",
					  text: "¡El producto Servicio ha sido borrado correctamente!",
					  type: "success",
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
				},

				function(isConfirm){
						 if (isConfirm) {	   
							window.location = "productoservicios";
						  } 
				});


			</script>';



			}
			
		
	}
}
	#ACTUALIZAR PRODUCTO SERVICIO
	#-----------------------------------------------------------

	public function editarProductoServicioController(){

	
			$datosController = array( "idproductoServicio"=>$_POST["idProductoServicio"],
				                      "nombreProductoServicio"=>$_POST["editarNombreProductoServicio"],
			 	                      "descripcion"=>$_POST["editarDescripcion"],
									  "imagenRuta"=>$ruta,
									  "precio"=>$_POST["editarPrecio"],
			 	                      "cantidad"=>$_POST["editarCantidad"],
                                      "disponibles"=>$_POST["editarDisponibles"],
									  "idTipoProductoServicio"=>$_POST["editarIdTipoProductoServicio"],
									  "idCategoria"=>$_POST["editarIdCategoria"],
									  "idNegocio"=>$_POST["editarIdNegocio"]);
			$respuesta = GestorProductoServicioModel::editarProductoServicioModel($datosController, "productoservicio");
			// var_dump($respuesta);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El producto ha sido actualizado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "productoservicios";
							  } 
					});


				</script>';

			}

			else{

				echo $respuesta;

			}

		

	}

	
	public function editarProductoServicioController2(){

		$ruta = "";
		

		if(isset($_POST["editarNombreProductoServicio"])){

			if(isset($_FILES["editarImagen"]["tmp_name"])){	

				$imagen = $_FILES["editarImagen"]["tmp_name"];

				$aleatorio = mt_rand(100, 999);

				$ruta = "views/images/productoservicios/productoservicio".$aleatorio.".jpg";

				$origen = imagecreatefromjpeg($imagen);

				$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);

				imagejpeg($destino, $ruta);

				$borrar = glob("views/images/productoservicios/temp/*");

				foreach($borrar as $file){

						unlink($file);
					}
			}


			if($ruta == ""){

				// $ruta = $_POST["fotoAntigua"];

			}

			else{


				// unlink($_POST["editarImagen"]);

			}
			$datosController = array( "idproductoServicio"=>$_POST["idProductoServicio"],	       
									  "imagenRuta"=>$ruta);
						
			$respuesta = GestorProductoServicioModel::editarProductoServicioModel2($datosController, "productoservicio");
			// var_dump($respuesta);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡La imagen del producto o Servicio se ha sido actualizado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "productoservicios";
							  } 
					});


				</script>';

			}

			else{

				echo $respuesta;

			}

		}

	}


	
}