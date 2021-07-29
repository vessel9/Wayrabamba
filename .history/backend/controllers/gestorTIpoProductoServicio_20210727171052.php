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
			<td>'.$item["idTipoProductoServicio"].'</td>
			<td>'.$item["nombreTipo"].'</td>
			<td><a href="#tipo'.$item["idTipoProductoServicio"].'" data-toggle="modal"><span class="btn btn-info fa fa-pencil"></span></a>
			<a href="index.php?action=tipoproductoservicio&idConfirmar"><i class="fa fa-times btn btn-danger"></i></span></a></td>
		  </tr>
		   <div id="tipo'.$item["idTipoProductoServicio"].'" class="modal fade">
				   <div class="modal-dialog modal-content">
					<div class="modal-header" style="border:1px solid #eee">
						<button type="button" class="close" data-dismiss="modal">X</button>
						<h3 class="modal-title">Editar Tipo de Producto o Servicio</h3>
					</div>
					<div class="modal-body" style="border:1px solid #eee">
						<form style="padding:0px 10px" method="post" enctype="multipart/form-data">
							  <input name="idTipoProductoServicio" type="hidden" value="'.$item["idTipoProductoServicio"].'">
							 <div class="form-group">
							  <input name="editarNombreTipo" type="text" class="form-control" value="'.$item["nombreTipo"].'" required>
							 </div>
								<div class="form-group text-center">
									<input type="submit" id="guardarPerfil" value="Actualizar tipo" class="btn btn-primary">
								</div>
						</form>
					</div>
					<div class="modal-footer" style="border:1px solid #eee">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				   </div>
		   </div>';

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
						  text: "¡El Tipo ha sido actualizado correctamente!",
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
#CONFIRMAR BORRAR PRODUCTO/SERVICIO
	#------------------------------------

	public function confirmarBorrarTipoController(){
		


		if(isset($_GET["idConfirmarTipo"])){

			$respuesta = GestorTipoProductoServicioModel::mostrarTipoProductoServicioModel("tipoproductoservicio");	

				foreach($respuesta as $row => $item) {
					echo('<script>

					swal({
						  title: "Cuidado!",
						  text: "¡Desea borrar el Tipo!",
						  showCancelButton: true,
						  confirmButtonClass: "btn-danger",
						  confirmButtonText: "Si, borrar!",
						  cancelButtonText: "No, cancelar!",
						  closeOnConfirm: false,
						  closeOnCancel: false
					},

					function(isConfirm){
							 if (isConfirm) {							
								window.location.href="index.php?action=tipoproductoservicio&idBorrarTipo='.$item["idTipoProductoServicio"].'";							
							  } else {
								swal("Cancelled", "registro a salvo :)", "error");
								event.preventDefault();	
								setTimeout(()=>{
									window.location = "tipoproductoservicio";
								},1000);							
							  }
						
					
					});

				</script>');

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