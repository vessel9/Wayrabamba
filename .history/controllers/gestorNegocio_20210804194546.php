<?php

class Negocios{

	public function seleccionarNegocioController(){

		$respuesta = NegocioModels::seleccionarNegocioModel("negocio");

		foreach ($respuesta as $row => $item){

			echo '<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

					
					<h1>'.$item["nombreNegocio"].'</h1>
					
					<div class="col-xs-3 col-sm-3 col-md-3">
					<label><spam class="fa fa-phone fa-lg" aria-hidden="true"></spam> Telefono:</label>
				    </div>
				    <div class="col-xs-9 col-sm-9 col-md-9">
				    <p>'.$item["telefono"].'</p>
				    </div>
					<div class="col-xs-3 col-sm-3 col-md-3">
					<label><spam class="fa fa-whatsapp fa-lg" aria-hidden="true"></spam> WhatsApp:</label>
				    </div>
					<div class="col-xs-9 col-sm-9 col-md-9">
				    <p><a href="'.$item["linkWhatsApp"].'">'.$item["linkWhatsApp"].'</a></p>
				    </div>
					<div class="col-xs-3 col-sm-3 col-md-3">
					<label><spam class="fa fa-envelope-o fa-lg" aria-hidden="true"></spam> Correo:</label>
				    </div>
					<div class="col-xs-9 col-sm-9 col-md-9">
				    <h4>'.$item["correo"].'</h4>
				    </div>
					<div class="col-xs-3 col-sm-3 col-md-3">
					<label><spam class="fa fa-exchange fa-lg" aria-hidden="true"></spam> Direccion:</label>
				    </div>
					<div class="col-xs-9 col-sm-9 col-md-9">
				    <h5>'.$item["direccion"].'</h5>
				    </div>
					<a href="#negocio'.$item["idNegocio"].'" data-toggle="modal">
					<button class="btn btn-default">Ver ubicacion...</button>
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
							<h5><b>Direccion:</b> '.$item["direccion"].'</h5>
							<b>Ubicacion: </b><div class="col-md-10 col-md-offset-2">'.$item["ubicacion"].'</div>
			            
						</div>

							<div class="modal-footer" style="border:1px solid #eee">
			            
			    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			            
							</div>

					</div>

				</div>';

		}


	}


}