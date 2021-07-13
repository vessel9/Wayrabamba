<?php

class Negocios{

	public function seleccionarProductoServicioController(){

		$respuesta = NegocioModels::seleccionarProductoServicioModel("productoservicio", "negocio", "tipoproductoservicio", "categorias");

		foreach ($respuesta as $row => $item){

			echo '<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

					
					<h1>'.$item["nombreProductoServicio"].'</h1>
					<img src="backend/'.$item["imagenRuta"].'" class="img-thumbnail">
					<b>Telefono: </b><p>'.$item["descripcion"].'</p>
                    <h4><b>Precio: $</b>'.$item["precio"].'</h4>
					<h5><b>Cantidad: </b>'.$item["cantidad"].'</h5>
					<h5><b>Disponibles: </b>'.$item["disponibles"].'</h5>
					<h5><b>tipo: </b>'.$item["nombreTipo"].'<h5>
					<h5><b>Categoria: </b>'.$item["nombreCategoria"].'</h5>
					<h5><b>Negocio: </b>'.$item["nombreNegocio"].'</h5>
                    <a href="#negocio'.$item["idNegocio"].'" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
					</a>

					<hr>

				</li>

				<div id="negocio'.$item["idproductoServicio"].'" class="modal fade">
      
					<div class="modal-dialog modal-content">

						<div class="modal-header" style="border:1px solid #eee">
			            
			   				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  		 		<h3 class="modal-title">'.$item["nombreNegocio"].'</h3>
			            
						</div>

						<div class="modal-body" style="border:1px solid #eee">
			            
			    			<img src="backend/'.$item["imagenRuta"].'" width="50%" style="margin-bottom:20px">
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