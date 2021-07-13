<?php

class Negocios{

	public function seleccionarArticulosController(){

		$respuesta = NegocioModels::seleccionarNegocioModel("negocio");

		foreach ($respuesta as $row => $item){

			echo '<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

					<img src="backend/'.$item["imagenNegocio"].'" class="img-thumbnail">
					<h1>'.$item["nombreNegocio"].'</h1>
					<p>'.$item["introduccion"].'</p>
					<b>Telefono: </b><p>'.$item["telefono"].'</p>
					<b>Correo: </b><h4>'.$item["correo"].'</h4>
					<b>Direccion: </b><h5>'.$item["direccion"].'</h5>
					<h6 style="display:none">'.$item["ubicacion"].'</h6>
					<a href="#negocio'.$item["idNegocio"].'" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
					</a>

					<hr>

				</li>

				<div id="negocio'.$item["idNegocio"].'" class="modal fade">
      
					<div class="modal-dialog modal-content">

						<div class="modal-header" style="border:1px solid #eee">
			            
			   				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  		 		<h3 class="modal-title">'.$item["nombreNegocio"].'</h3>
			            
						</div>

						<div class="modal-body" style="border:1px solid #eee">
			            
			    			<img src="backend/'.$item["imagenNegocio"].'" width="50%" style="margin-bottom:20px">
			    			<p class="parrafoContenido text-justify">'.$item["contenido"].'</p>
			            
						</div>

							<div class="modal-footer" style="border:1px solid #eee">
			            
			    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			            
							</div>

					</div>

				</div>';

		}


	}


}