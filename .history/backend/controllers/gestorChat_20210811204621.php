<?php

class GestorChat{



	#GUARDAR CHATBOT
	#-----------------------------------------------------------

	public function guardarChatController(){

		if(isset($_POST["tituloArticulo"])){

			
			$datosController = array("pregunta"=>$_POST["preguntaChat"],
				                     "respuesta"=>$_POST["respuestaChat"]);

			$respuesta = GestorChatModel::guardarChatModel($datosController, "chatbot");

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡Pregunta y respuesta ha sido creado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "articulos";
							  } 
					});


				</script>';

			}

			else{

				echo $respuesta;

			}

		}

	}

	#MOSTRAR CHATBOT
	#-----------------------------------------------------------

	public function mostrarChatController(){

		$respuesta = GestorChatModel::mostrarChatModel("chatbot");	
	

		foreach($respuesta as $row => $item) {

			echo ' <tr>
			<td>'.$item["pregunta"].'</td>
			<td>'.$item["respuesta"].'</td>
			<td><a href="#tipo'.$item["id"].'" data-toggle="modal"><span class="btn btn-info fa fa-pencil"></span></a>
			<a href="index.php?action=chatbot&idConfirmarChat'.$item["id"].'"><i class="fa fa-times btn btn-danger"></i></span></a></td>
		  </tr>
		   <div id="tipo'.$item["id"].'" class="modal fade">
				   <div class="modal-dialog modal-content">
					<div class="modal-header" style="border:1px solid #eee">
						<button type="button" class="close" data-dismiss="modal">X</button>
						<h3 class="modal-title">Editar pregunta y respuesta</h3>
					</div>
					<div class="modal-body" style="border:1px solid #eee">
						<form style="padding:0px 10px" method="post" enctype="multipart/form-data">
							  <input name="idTipoProductoServicio" type="hidden" value="'.$item["id"].'">
							 <div class="form-group">
							  <input name="editarNombreTipo" type="text" class="form-control" value="'.$item["pregunta"].'" required>
                              <input name="editarNombreTipo" type="text" class="form-control" value="'.$item["respuesta"].'" required>

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

	#CONFIRMAR BORRAR CHATBOT
	#------------------------------------

	public function confirmarBorrarChatController(){
		


		if(isset($_GET["idConfirmarChat"])){


            $respuesta = GestorChatModel::mostrarChatModel("chatbot");	
				foreach($respuesta as $row => $item) {
					echo('<script>

					swal({
						  title: "Cuidado!",
						  text: "¡Desea borrar Articulo!",
						  showCancelButton: true,
						  confirmButtonClass: "btn-danger",
						  confirmButtonText: "Si, borrar!",
						  cancelButtonText: "No, cancelar!",
						  closeOnConfirm: false,
						  closeOnCancel: false
					},

					function(isConfirm){
							 if (isConfirm) {							
								window.location.href="index.php?action=articulos&idBorrar='.$_GET["idConfirmarChat"].'";							
							  } else {
								swal("Cancelled", "registro a salvo :)", "error");
								event.preventDefault();	
								setTimeout(()=>{
									window.location = "chatbot";
								},1000);							
							  }
						
					
					});

				</script>');

			}
		
		
	}
}
#BORRAR CHATBOT
	#------------------------------------

	public function borrarChatController(){
		

		if(isset($_GET["idBorrar"])){


			// unlink($_GET["rutaImagen"]);

			$datosController = $_GET["idBorrar"];
			$respuesta = GestorChatModel::borrarChatModel($datosController, "chatbot");


			if($datosController){

				echo'<script>

				swal({
					  title: "¡OK!",
					  text: "¡El artículo ha sido borrado correctamente ahora!",
					  type: "success",
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
				},

				function(isConfirm){
						 if (isConfirm) {	   
							window.location = "chatbot";
						  } 
				});


			</script>';


			}
			
		
	}
}
	#ACTUALIZAR CHATBOT
	#-----------------------------------------------------------

	public function editarChatController(){

	

		if(isset($_POST["editarTitulo"])){

	

			$datosController = array("id"=>$_POST["id"],
			                       "pregunta"=>$_POST["preguntaChat"],
				                     "respuesta"=>$_POST["respuestaChat"]));

			$respuesta = GestorChatModel::editarChatModel($datosController, "chatbot");

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
							    window.location = "chatbot";
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