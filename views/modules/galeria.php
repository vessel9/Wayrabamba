<div class="row" id="galeria">

	<hr><hr>
	
	<h1 class="text-center text-info" style="color:#229922;"><b><span class="glyphicon glyphicon-picture" ></span> GALERÍA DE IMÁGENES</b></h1>

	<hr>

	<ul>

		<?php

			$galeria = new Galeria();
			$galeria -> seleccionarGaleriaController();
			
		?>

	</ul>

</div>