<?php

class GestorTipoProductoServicio{

    
	#GUARDAR TIPO PRODUCTO/SERVICIO
	#-----------------------------------------------------------
    public function guardarTipoProductoServicioController(){
    
        if(isset($_POST["nombresTipoProductoServicio"])){
            $datosController = array("nombreTipo"=>$_POST["nombresTipoProductoServicio"]);
				       
			$respuesta = GestorTipoProductoServicioModel::guardarTipoProductoServicioModel($datosController, "tipoproductoservicio");
            if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡Tipo de Product/Servicio ha sido creada correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "tipoproductoservicio";
							  } 
					});


				</script>';

			}

			else{

				echo $respuesta;

			}
        }
	}


		#MOSTRAR TIPO PRODUCTO/SERVICIO
	#-----------------------------------------------------------

	public function mostrarTipoProductoServicioController(){

		$respuesta = GestorTipoProductoServicioModel::mostrarTipoProductoServicioModel("tipoproductoservicio");	
		// var_dump($respuesta);
		foreach($respuesta as $row => $item) {
			// echo "<script>console.log('consoila tipoproductoservicio: " . $respuesta . "' );</script>";

			echo ' <tr>
			<td>'.$item["usuario"].'</td>
			<td>'.$rol.'</td>
			<td>'.$item["email"].'</td>
			<td><a href="#perfil'.$item["id"].'" data-toggle="modal"><span class="btn btn-info fa fa-pencil"></span></a>
				<a href="index.php?action=perfil&idBorrar='.$item["id"].'&borrarImg='.$item["photo"].'"><span class="btn btn-danger fa fa-times"></span></a></td>
		  </tr>

		   <div id="perfil'.$item["id"].'" class="modal fade">

				   <div class="modal-dialog modal-content">

					<div class="modal-header" style="border:1px solid #eee">

						<button type="button" class="close" data-dismiss="modal">X</button>

						<h3 class="modal-title">Editar Perfil</h3>

					</div>

					<div class="modal-body" style="border:1px solid #eee">
					
						<form style="padding:0px 10px" method="post" enctype="multipart/form-data">

							  <input name="idPerfil" type="hidden" value="'.$item["id"].'">
							
							 <div class="form-group">
							   
							  <input name="editarUsuario" type="text" class="form-control" value="'.$item["usuario"].'" required>

							 </div>

							  <div class="form-group">

								  <input name="editarPassword" type="password" placeholder="Ingrese la Contraseña hasta 10 caracteres" maxlength="10" class="form-control" required>

							  </div>

							  <div class="form-group">

								 <input name="editarEmail" type="email" value="'.$item["email"].'" class="form-control" required>

							  </div>

							  <div class="form-group">

								<select name="editarRol" class="form-control" required>

									<option value="">Seleccione el Rol</option>
									<option value="0">Administrador</option>
									<option value="1">Editor</option>

								</select>

							  </div>

							   <div class="form-group text-center">

									   <div style="display:block;">

										 <img src="'.$item["photo"].'" width="20%" class="img-circle">

											<input type="hidden" value="'.$item["photo"].'" name="editarPhoto">

									   </div>	    
								<input type="file" class="btn btn-default" name="editarImagen" style="display:inline-block; margin:10px 0">
								  <p class="text-center" style="font-size:12px">Tamaño recomendado de la imagen: 100px * 100px, peso máximo 2MB</p>
							   </div>
								<div class="form-group text-center">
									<input type="submit" id="guardarPerfil" value="Actualizar Perfil" class="btn btn-primary">
								</div>
						</form>
					</div>
					<div class="modal-footer" style="border:1px solid #eee">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				   </div>
		   </div>';

				
			echo ' <li id="'.$item["idTipoProductoServicio"].'" class="bloqueArticulo">
			<span class="handleArticle">
			<a href="index.php?action=tipoproductoservicio&idBorrarTipo='.$item["idTipoProductoServicio"].'">
			<i class="fa fa-times btn btn-danger"></i>
			</a>
			<i class="fa fa-pencil btn btn-primary editarTipoProductoServicio"></i>	
			</span>	
			<h1>'.$item["nombreTipo"].'</h1>
		    </li>';

				

		}
		
	}
	#ACTUALIZAR TIPO PRODUCTO/SERVICIO
	#-----------------------------------------------------------

	public function editarTipoProductoServicioController(){
		if(isset($_POST["editarNombreTipo"])){
	

			$datosController = array("idTipoProductoServicio"=>$_POST["idTipoProductoServicio"],
								     "nombreTipo"=>$_POST["editarNombreTipo"]);

			$respuesta = GestorTipoProductoServicioModel::editarTipoProductoServicioModel($datosController, "tipoproductoservicio");

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El artículo ha sido actualizado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "tipoproductoservicio";
							  } 
					});


				</script>';

			}

			else{

				echo $respuesta;

			}

		

	}
}
#BORRAR TIPO PRODUCTO/SERVICIO
	#------------------------------------

	public function borrarTipoProductoServicioController(){
		

		if(isset($_GET["idBorrarTipo"])){


			

			// unlink($_GET["rutaImagen"]);

			$datosController = $_GET["idBorrarTipo"];
            $respuesta = GestorTipoProductoServicioModel::borrarTipoProductoServicioModel($datosController, "tipoproductoservicio");


			if($datosController){

				echo'<script>

				swal({
					  title: "¡OK!",
					  text: "¡El Tipo de Servicio o producto ha sido borrado correctamente!",
					  type: "success",
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
				},

				function(isConfirm){
						 if (isConfirm) {	   
							window.location = "tipoproductoservicio";
						  } 
				});


			</script>';


			}
			
		
	}
}
}