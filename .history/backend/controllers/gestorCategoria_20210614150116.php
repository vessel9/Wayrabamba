<?php

class GestorCategoria{

    
	#GUARDAR CATEGORIA
	#-----------------------------------------------------------
    public function guardaCategoriaController()
    
        if(isset($_POST["nombresCategorias"])){
            $datosController = array("nombreCategoria"=>$_POST["nombresCategoria"]);
				       
			$respuesta = GestorCategoriaModel::guardaCategoriaModel($datosController, "categorias");
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
		#MOSTRAR CATEGORIA
	#-----------------------------------------------------------

	public function mostrarCategoriaController(){
		$respuesta = GestorCategoriaModel::mostrarCategoriaModel("categorias");	

		foreach($respuesta as $row => $item) {

			echo ' <li id="'.$item["idCategoria"].'" class="bloqueArticulo">
					<span class="handleArticle">
				
					<i class="fa fa-pencil btn btn-primary editarArticulo"></i>	
					</span>
				
					<h1>'.$item["nombreCategoria"].'</h1>

					<hr>

				</li>

				<div id="categoria'.$item["idCategoria"].'" class="modal fade">

					<div class="modal-dialog modal-content">

						<div class="modal-header" style="border:1px solid #eee">
				        
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						 <h3 class="modal-title">'.$item["titulo"].'</h3>
			        
						</div>

						<div class="modal-body" style="border:1px solid #eee">
			        
							<img src="'.$item["ruta"].'" width="100%" style="margin-bottom:20px">
							<p class="parrafoContenido">'.$item["contenido"].'</p>
			        
						</div>

						<div class="modal-footer" style="border:1px solid #eee">
			        
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        
						</div>

					</div>

				</div>';

		}

    
}