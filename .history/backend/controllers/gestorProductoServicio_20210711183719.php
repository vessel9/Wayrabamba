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

		$respuesta = GestorProductoServicioModel::mostrarProductoServicioModel("productoservicio", "negocio", "tipoproductoservicio", "categorias");
		$respuesta5 = GestorTipoProductoServicioModel::mostrarTipoProductoServicioModel("tipoproductoservicio");
		$respuesta6 = GestorCategoriasModel::mostrarCategoriasModel("categorias");
		$respuesta7 = GestorNegocioModel::mostrarNegocioModel("negocio");
		$respuesta8 = GestorProductoServicioModel::mostrarProductoServicioModel2("productoservicio");

		
	
		// $mostrarProductoServicio = new GestorProductoServicio();
		// $mostrarProductoServicio -> mostrarProductoServicioController5(); 
		// $mostrarProductoServicio -> mostrarProductoServicioController6();

		// var_dump($respuesta);


		foreach($respuesta as $row => $item) {
	
			echo ' <li id="'.$item["idproductoServicio"].'" class="bloqueNegocio">
					<span class="handleArticle">
					<a href="index.php?action=productoservicios&idConfirmarProductoServicio">
						<i class="fa fa-times btn btn-danger"></i>
					</a>';
					echo '<a href="#imagenProductoservicio'.$item["idproductoServicio"].'" data-toggle="modal">
					<i class="fa fa-picture-o btn btn-primary"></i></a>';
					echo '<a href="#agregarproductoservicio'.$item["idproductoServicio"].'" data-toggle="modal">
					<i class="fa fa-pencil-square-o btn btn-primary"></i></a>
					';
					echo '<img src="'.$item["imagenRuta"].'" class="img-thumbnail">
					<h1>'.$item["nombreProductoServicio"].'</h1>
					<h3><p>'.$item["descripcion"].'</p></h2>
					<h4><b>Precio: $</b>'.$item["precio"].'</h4>
					<h5><b>Cantidad: </b>'.$item["cantidad"].'</h5>
					<h5><b>Disponibles: </b>'.$item["disponibles"].'</h5>
					<h5><b>tipo: </b>'.$item["nombreTipo"].'<h5>
					<h5><b>Categoria: </b>'.$item["nombreCategoria"].'</h5>
					<h5><b>Negocio: </b>'.$item["nombreNegocio"].'</h5>
					';
					echo ' <input type="hidden" value="'.$item["nombreTipo"].'">
                    <input type="hidden" value="'.$item["nombreCategoria"].'">
					<a href="#productoservicio'.$item["idproductoServicio"].'" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
					</a>
				    </li>';
					echo '<div id="imagenProductoservicio'.$item["idproductoServicio"].'" class="modal fade">
				    <div class="modal-dialog modal-content">
				    <button type="button" class="close" data-dismiss="modal">&times;</button>';
					echo '<form method="post" enctype="multipart/form-data">';	
					echo'   
					<div id="editarImagen"><input style="display:none" type="file" id="subirNuevaFoto" class="btn btn-default">
					<div id="nuevaFoto">
					<img src="'.$item["imagenRuta"].'" class="img-thumbnail">
					<input type="hidden" value="'.$item["idproductoServicio"].'" name="editarIdproductoServicio">
					<input type="hidden" value="'.$item["imagenRuta"].'" name="fotoAntigua"></div></div>
					<input type="file" class="btn btn-default" name="editarImagen" style="display:inline-block; margin:10px 0">
					<p class="text-center" style="font-size:12px">Tamaño recomendado de la imagen: 100px * 100px, peso máximo 2MB</p>';	
					echo '<input type="submit" id="actualizarProductoServicio" value="Actualizar imagen" class="btn btn-primary">
						</form>
				<div class="modal-footer" style="border:1px solid #eee">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</div>
				</div>'; 

				    echo '<div id="agregarproductoservicio'.$item["idproductoServicio"].'" class="modal fade">
				    <div class="modal-dialog modal-content">
				    <button type="button" class="close" data-dismiss="modal">&times;</button>';
					echo '<form method="post" enctype="multipart/form-data">';									
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
						echo'</select>';
							if($_SESSION["rol"] == 0){
				              echo'<select name="editarRol" class="form-control">';
							  foreach($respuesta8 as $row8 => $item8){
							  echo'<option value="'.$item8["estado"].'">'.$item8["estado"].'</option>';}
							  echo'<option value="publico">Publico</option>
							  <option value="privado">Privado</option>

						  </select>';}				
							  else{
								echo'<input type="hidden" value="'.$item["estado"].'" name="idProductoServicio">';}
							  
							
						echo'<input type="hidden" value="'.$item["idproductoServicio"].'" name="idProductoServicio">
                        <hr>
						';

						echo '<input type="submit" id="actualizarProductoServicio" value="Actualizar Producto" class="btn btn-primary">
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
			<option value="">Elija Tipo</option>';
			foreach($respuesta as $row => $item){
			echo'<option value="'.$item["idTipoProductoServicio"].'">'.$item["nombreTipo"].'</option>';
		}
        echo'</select>';
	}
		
	public function mostrarProductoServicioController3(){
		$respuesta = GestorCategoriasModel::mostrarCategoriasModel("categorias");	
			echo'			
			<select name="idCategoria" class="form-control" required>
			<option value="">Escoja Categoria</option>';
			foreach($respuesta as $row => $item){
			echo'<option value="'.$item["idCategoria"].'">'.$item["nombreCategoria"].'</option>';
		}
            echo'</select>';
	}
	public function mostrarProductoServicioController4(){
		$respuesta = GestorNegocioModel::mostrarNegocioModel("negocio");
			echo'			
			<select name="idNegocio" class="form-control" required>
			<option value="">Seleccione Negocio</option>';
			foreach($respuesta as $row => $item){
			echo'<option value="'.$item["idNegocio"].'">'.$item["nombreNegocio"].'</option>';
		}
            echo'</select>';
	}
	

	#CONFIRMAR BORRAR PRODUCTOSERVICIO
	#------------------------------------

	public function confirmarBorrarProductoServicioController(){
		


		if(isset($_GET["idConfirmarProductoServicio"])){
			$respuesta = GestorProductoServicioModel::mostrarProductoServicioModel("productoservicio", "negocio", "tipoproductoservicio", "categorias");
				foreach($respuesta as $row => $item) {
					echo('<script>

					swal({
						  title: "Cuidado!",
						  text: "¡Desea borrar Producto o Servicio!",
						  showCancelButton: true,
						  confirmButtonClass: "btn-danger",
						  confirmButtonText: "Si, borrar!",
						  cancelButtonText: "No, cancelar!",
						  closeOnConfirm: false,
						  closeOnCancel: false
					},

					function(isConfirm){
							 if (isConfirm) {							
								window.location.href="index.php?action=productoservicios&idBorrar='.$item["idproductoServicio"].'&rutaImagen='.$item["imagenRuta"].'";							
							  } else {
								event.preventDefault();
								swal("Cancelled", "registro a salvo :)", "error");
								setTimeout(()=>{
									window.location = "productoservicios";
								},1000);
							  }
					});

				</script>');

			}
		
		
	}
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

		if(isset($_POST["editarNombreProductoServicio"])){
			$datosController = array( "idproductoServicio"=>$_POST["idProductoServicio"],
				                      "nombreProductoServicio"=>$_POST["editarNombreProductoServicio"],
			 	                      "descripcion"=>$_POST["editarDescripcion"],
									  "precio"=>$_POST["editarPrecio"],
			 	                      "cantidad"=>$_POST["editarCantidad"],
                                      "disponibles"=>$_POST["editarDisponibles"],
									  "estado"=>$_POST["editarDisponibles"],
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

		}
	}

	
	public function editarProductoServicioController2(){

		$ruta = "";
		
		if(isset($_POST["editarIdproductoServicio"])){

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

				$ruta = $_POST["fotoAntigua"];

			}

			else{


				unlink($_POST["fotoAntigua"]);

			}
			$datosController = array( "idproductoServicio"=>$_POST["editarIdproductoServicio"],	       
									  "imagenRuta"=>$ruta);
			$respuesta = GestorProductoServicioModel::editarProductoServicioModel2($datosController, "productoservicio");
			// var_dump($respuesta);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡La imagen del producto/Servicio se ha sido actualizado correctamente!",
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