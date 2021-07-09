<?php

class GestorCategorias{

    
	#GUARDAR CATEGORIA
	#-----------------------------------------------------------
    public function guardarCategoriasController(){
    
        if(isset($_POST["nombresCategorias"])){
            $datosController = array("nombreCategoria"=>$_POST["nombresCategorias"]);
				       
			$respuesta = GestorCategoriasModel::guardarCategoriasModel($datosController, "categorias");
            if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡La categoria ha sido creada correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "categorias";
							  } 
					});


				</script>';

			}

			else{

				echo $respuesta;

			}
        }
	}


		#MOSTRAR CATEGORIA
	#-----------------------------------------------------------

	public function mostrarCategoriasController(){



		$respuesta = GestorCategoriasModel::mostrarCategoriasModel("categorias");	
		// var_dump($respuesta);

		foreach($respuesta as $row => $item) {
			echo ' <tr>
			<td>'.$item["idCategoria"].'</td>
			<td>'.$item["nombreCategoria"].'</td>
			<td><a href="#categoria'.$item["idCategoria"].'" data-toggle="modal"><span class="btn btn-info fa fa-pencil"></span></a>
			<a href="index.php?action=categorias&idBorrarCategoria='.$item["idCategoria"].'"><i class="fa fa-times btn btn-danger"></i></span></a></td>
		  </tr>
		   <div id="categoria'.$item["idCategoria"].'" class="modal fade">
				   <div class="modal-dialog modal-content">
					<div class="modal-header" style="border:1px solid #eee">
						<button type="button" class="close" data-dismiss="modal">X</button>
						<h3 class="modal-title">Editar Categoria</h3>
					</div>
					<div class="modal-body" style="border:1px solid #eee">
						<form style="padding:0px 10px" method="post" enctype="multipart/form-data">
							  <input name="idCategoria" type="hidden" value="'.$item["idCategoria"].'">
							 <div class="form-group">
							  <input name="editarNombreTipo" type="text" class="form-control" value="'.$item["nombreTipo"].'" required>
							 </div>
								<div class="form-group text-center">
									<input type="submit" id="guardarPerfil" value="Actualizar categoria" class="btn btn-primary">
								</div>
						</form>
					</div>
					<div class="modal-footer" style="border:1px solid #eee">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				   </div>
		   </div>';
			echo ' <li id="'.$item["idCategoria"].'" class="bloqueArticulo">
					<span class="handleArticle">
					<a href="index.php?action=categorias&idBorrarCategoria='.$item["idCategoria"].'">
					<i class="fa fa-times btn btn-danger"></i>
				    </a>
					<i class="fa fa-pencil btn btn-primary editarCategoria"></i>	
					</span>	
					<h1>'.$item["nombreCategoria"].'</h1>
				</li>';
				

		}
		
	}

	#ACTUALIZAR CATEGORIAS
	#-----------------------------------------------------------

	public function editarCategoriasController(){
		if(isset($_POST["editarNombre"])){
	

			$datosController = array("idCategoria"=>$_POST["idCategoria"],
								     "nombreCategoria"=>$_POST["editarNombre"]);

			$respuesta = GestorCategoriasModel::editarCategoriasModel($datosController, "categorias");

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
							    window.location = "categorias";
							  } 
					});


				</script>';

			}

			else{

				echo $respuesta;

			}

		

	}
}
#BORRAR NEGOCIO
	#------------------------------------

	public function borrarCategoriasController(){
		

		if(isset($_GET["idBorrarCategoria"])){


			

			// unlink($_GET["rutaImagen"]);

			$datosController = $_GET["idBorrarCategoria"];
            $respuesta = GestorCategoriasModel::borrarCategoriasModel($datosController, "categorias");


			if($datosController){

				echo'<script>

				swal({
					  title: "¡OK!",
					  text: "¡El artículo ha sido borrado correctamente!",
					  type: "success",
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
				},

				function(isConfirm){
						 if (isConfirm) {	   
							window.location = "categorias";
						  } 
				});


			</script>';


			}
			
		
	}
}
}